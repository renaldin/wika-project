<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\LaporanBulananDetails;
use App\Models\LaporanBulananSubDetails;
use Illuminate\Http\Request;

class LaporanBulananSubDetail extends Controller
{
    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_dokumen_Bulanan';
    }

    public function index($id_laporan_bulanan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Ambil detail laporan keuangan berdasarkan ID
        $laporanBulananDetail = LaporanBulananDetails::with('dokumen', 'laporanBulananSubDetails')->find($id_laporan_bulanan_details);
        
        // Pastikan bahwa data ditemukan
        if (!$laporanBulananDetail) {
            return redirect()->back()->with('error', 'Data laporan HSE tidak ditemukan.');
        }
    
        $data = [
            'title' => 'Data Detail Laporan Bulanan',
            'subTitle' => 'Sub Detail Laporan Bulanan',
            'laporanBulananDetail' => $laporanBulananDetail, // Mengirimkan $laporanKeuanganDetail
            'detail' => $laporanBulananDetail,
            'daftar' => LaporanBulananSubDetails::with('LaporanBulananDetail')
                ->where('id_laporan_bulanan_details', $id_laporan_bulanan_details)
                ->get(),
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('qhse/laporanBulananSubDetail.index', $data);
    }
    
    

    public function tambah($id_laporan_bulanan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $data = [
            'title' => 'Data Laporan Bulanan',
            'subTitle' => 'Tambah Sub Detail Bulanan',
            'form' => 'Tambah',
            'LaporanBulananDetail' => LaporanBulananDetails::with('dokumen', 'laporanBulananSubDetails')->find($id_laporan_bulanan_details), // This variable name is correct
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('qhse/laporanBulananSubDetail.form', $data);
    }
    

    public function prosesTambah(Request $request, $id_laporan_bulanan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanBulananDetail = new LaporanBulananSubDetails();
        $LaporanBulananDetail->id_laporan_Bulanan_details = $id_laporan_bulanan_details;
        $LaporanBulananDetail->nama_dokumen_Bulanan = $request->nama_dokumen_bulanan;
        $LaporanBulananDetail->tanggal_dokumen_Bulanan = $request->tanggal_dokumen_bulanan;

        if ($request->file_dokumen_bulanan <> "") {
            $file = $request->file_dokumen_bulanan;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_bulanan . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanBulananDetail->file_dokumen_bulanan = $fileName;
        }

        $LaporanBulananDetail->save();

        return redirect("/sub-detail-laporan-bulanan/$id_laporan_bulanan_details")->with('success', 'Data berhasil ditambahkan!');
    }

 
    public function detail($id)
    {
        // Ambil data laporan akuntansi detail berdasarkan ID
        $laporanBulananDetails = LaporanBulananDetails::find($id);

        // Cek apakah data ditemukan
        if (!$laporanBulananDetails) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil sub detail menggunakan metode yang benar
        $subDetails = $laporanBulananDetails->laporanBulananSubDetails;

        // Kirim data ke view
        return view('qhse.detail', compact('laporanBulananDetails', 'subDetails'));
    }

    public function edit($id_laporan_bulanan_details, $id_laporan_bulanan_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan Bulanan',
            'subTitle'          => 'Edit Sub Detail Laporan Bulanan',
            'form'              => 'Edit',
            'LaporanBulananDetail'    => LaporanBulananDetails::with('dokumen', 'laporanBulanan')->find($id_laporan_bulanan_details),
            'detail'            => LaporanBulananSubDetails::with('LaporanBulananDetail')->find($id_laporan_bulanan_sub_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/laporanBulananSubDetail.form', $data);
    }

    

    public function prosesEdit(Request $request, $id_laporan_bulanan_details, $id_laporan_bulanan_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporaBulananDetail = LaporanBulananSubDetails::find($id_laporan_bulanan_sub_details);
        $LaporanBulananDetail->nama_dokumen_Bulanan = $request->nama_dokumen_bulanan;
        $LaporanBulananDetail->tanggal_dokumen_Bulanan = $request->tanggal_dokumen_bulanan;

        if ($request->file_dokumen_bulanan <> "") {
            if ($LaporanBulananDetail->file_dokumen_bulanan <> "") {
                unlink(public_path($this->public_path) . '/' . $LaporanBulananDetail->file_dokumen_bulanan);
            }

            $file = $request->file_dokumen_bulanan;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_Bulanan . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanBulananDetail->file_dokumen_Bulanan = $fileName;
        }

        $LaporanBulananDetail->save();

        return redirect("/sub-detail-laporan-bulanan/$id_laporan_bulanan_details")->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_laporan_bulanan_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $LaporanBulananSubDetail = LaporanBulananSubDetails::find($id_laporan_bulanan_sub_details);
        
        // Cek jika data ditemukan
        if (!$LaporanBulananSubDetail) {
            return back()->with('error', 'Data tidak ditemukan!');
        }
    
        if ($LaporanBulananSubDetail->file_dokumen_bulanan !== "") {
            unlink(public_path($this->public_path) . '/' . $LaporanBulananSubDetail->file_dokumen_bulanan);
        }
    
        $LaporanBulananSubDetail->delete();
    
        return back()->with('success', 'Data berhasil dihapus!');
    }
    

    public function downloadFile($id_laporan_bulanan_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanBulananSubDetails::find($id_laporan_bulanan_sub_details);

        $fileName = $data->file_dokumen_bulanan;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
