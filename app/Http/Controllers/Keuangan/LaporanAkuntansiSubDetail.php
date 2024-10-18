<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\LaporanAkuntansiDetails;
use App\Models\LaporanAkuntansiSubDetails;
use Illuminate\Http\Request;

class LaporanAkuntansiSubDetail extends Controller
{
    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_dokumen_Akuntansi';
    }

    public function index($id_laporan_akuntansi_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Ambil detail laporan keuangan berdasarkan ID
        $laporanAkuntansiDetail = LaporanAkuntansiDetails::with('dokumen', 'laporanAkuntansiSubDetails')->find($id_laporan_akuntansi_details);
        
        // Pastikan bahwa data ditemukan
        if (!$laporanAkuntansiDetail) {
            return redirect()->back()->with('error', 'Data laporan akuntansi tidak ditemukan.');
        }
    
        $data = [
            'title' => 'Data Detail Laporan Akuntansi',
            'subTitle' => 'Sub Detail Laporan Akuntansi',
            'laporanAkuntansiDetail' => $laporanAkuntansiDetail, // Mengirimkan $laporanKeuanganDetail
            'detail' => $laporanAkuntansiDetail,
            'daftar' => LaporanAkuntansiSubDetails::with('LaporanAkuntansiDetail')
                ->where('id_laporan_akuntansi_details', $id_laporan_akuntansi_details)
                ->get(),
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('keuangan/laporanAkuntansiSubDetail.index', $data);
    }
    
    

    public function tambah($id_laporan_akuntansi_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $data = [
            'title' => 'Data Laporan Akuntansi',
            'subTitle' => 'Tambah Sub Detail Akuntansi Keuangan',
            'form' => 'Tambah',
            'LaporanAkuntansiDetail' => LaporanAkuntansiDetails::with('dokumen', 'laporanAkuntansiSubDetails')->find($id_laporan_akuntansi_details), // This variable name is correct
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('keuangan/laporanAkuntansiSubDetail.form', $data);
    }
    

    public function prosesTambah(Request $request, $id_laporan_akuntansi_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanAkuntansiDetail = new LaporanAkuntansiSubDetails();
        $LaporanAkuntansiDetail->id_laporan_akuntansi_details = $id_laporan_akuntansi_details;
        $LaporanAkuntansiDetail->nama_dokumen_akuntansi = $request->nama_dokumen_akuntansi;
        $LaporanAkuntansiDetail->tanggal_dokumen_akuntansi = $request->tanggal_dokumen_akuntansi;

        if ($request->file_dokumen_akuntansi <> "") {
            $file = $request->file_dokumen_akuntansi;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_akuntansi . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanAkuntansiDetail->file_dokumen_akuntansi = $fileName;
        }

        $LaporanAkuntansiDetail->save();

        return redirect("/sub-detail-laporan-akuntansi/$id_laporan_akuntansi_details")->with('success', 'Data berhasil ditambahkan!');
    }

 
    public function detail($id)
    {
        // Ambil data laporan akuntansi detail berdasarkan ID
        $laporanAkuntansiDetails = LaporanAkuntansiDetails::find($id);

        // Cek apakah data ditemukan
        if (!$laporanAkuntansiDetails) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil sub detail menggunakan metode yang benar
        $subDetails = $laporanAkuntansiDetails->laporanAkuntansiSubDetails;

        // Kirim data ke view
        return view('Akuntansi.detail', compact('laporanAkuntansiDetails', 'subDetails'));
    }

    public function edit($id_laporan_akuntansi_details, $id_laporan_akuntansi_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan Akuntansi',
            'subTitle'          => 'Edit Sub Detail Laporan Akuntansi',
            'form'              => 'Edit',
            'LaporanAkuntansiDetail'    => LaporanAkuntansiDetails::with('dokumen', 'laporanAkuntansi')->find($id_laporan_akuntansi_details),
            'detail'            => LaporanAkuntansiSubDetails::with('LaporanAkuntansiDetail')->find($id_laporan_akuntansi_sub_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanAkuntansiSubDetail.form', $data);
    }

    

    public function prosesEdit(Request $request, $id_laporan_akuntansi_details, $id_laporan_akuntansi_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanAkuntansiDetail = LaporanAkuntansiSubDetails::find($id_laporan_akuntansi_sub_details);
        $LaporanAkuntansiDetail->nama_dokumen_akuntansi = $request->nama_dokumen_akuntansi;
        $LaporanAkuntansiDetail->tanggal_dokumen_akuntansi = $request->tanggal_dokumen_akuntansi;

        if ($request->file_dokumen_akuntansi <> "") {
            if ($LaporanAkuntansiDetail->file_dokumen_akuntansi <> "") {
                unlink(public_path($this->public_path) . '/' . $LaporanAkuntansiDetail->file_dokumen_akuntansi);
            }

            $file = $request->file_dokumen_akuntansi;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_akuntansi . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanAkuntansiDetail->file_dokumen_akuntansi = $fileName;
        }

        $LaporanAkuntansiDetail->save();

        return redirect("/sub-detail-laporan-akuntansi/$id_laporan_akuntansi_details")->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_laporan_akuntansi_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $LaporanAkuntansiSubDetail = LaporanAkuntansiSubDetails::find($id_laporan_akuntansi_sub_details);
        
        // Cek jika data ditemukan
        if (!$LaporanAkuntansiSubDetail) {
            return back()->with('error', 'Data tidak ditemukan!');
        }
    
        if ($LaporanAkuntansiSubDetail->file_dokumen_akuntansi !== "") {
            unlink(public_path($this->public_path) . '/' . $LaporanAkuntansiSubDetail->file_dokumen_akuntansi);
        }
    
        $LaporanAkuntansiSubDetail->delete();
    
        return back()->with('success', 'Data berhasil dihapus!');
    }
    

    public function downloadFile($id_laporan_akuntansi_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanAkuntansiSubDetails::find($id_laporan_akuntansi_sub_details);

        $fileName = $data->file_dokumen_akuntansi;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
