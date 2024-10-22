<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\LaporanProyekDetails;
use App\Models\LaporanProyekSubDetails;
use Illuminate\Http\Request;

class LaporanProyekSubDetail extends Controller
{
    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_dokumen_Proyek';
    }

    public function index($id_laporan_proyek_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Ambil detail laporan keuangan berdasarkan ID
        $laporanProyekDetail = LaporanProyekDetails::with('dokumen', 'laporanProyekSubDetails')->find($id_laporan_proyek_details);
        
        // Pastikan bahwa data ditemukan
        if (!$laporanProyekDetail) {
            return redirect()->back()->with('error', 'Data laporan proyek tidak ditemukan.');
        }
    
        $data = [
            'title' => 'Data Detail Laporan Proyek',
            'subTitle' => 'Sub Detail Laporan Proyek',
            'laporanProyekDetail' => $laporanProyekDetail, // Mengirimkan $laporanKeuanganDetail
            'detail' => $laporanProyekDetail,
            'daftar' => LaporanProyekSubDetails::with('LaporanProyekDetail')
                ->where('id_laporan_proyek_details', $id_laporan_proyek_details)
                ->get(),
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('keuangan/laporanProyekSubDetail.index', $data);
    }
    
    

    public function tambah($id_laporan_proyek_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $data = [
            'title' => 'Data Laporan Proyek',
            'subTitle' => 'Tambah Sub Detail Proyek',
            'form' => 'Tambah',
            'LaporanProyekDetail' => LaporanProyekDetails::with('dokumen', 'laporanProyekSubDetails')->find($id_laporan_proyek_details), // This variable name is correct
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('keuangan/laporanProyekSubDetail.form', $data);
    }
    

    public function prosesTambah(Request $request, $id_laporan_proyek_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanProyekDetail = new LaporanProyekSubDetails();
        $LaporanProyekDetail->id_laporan_proyek_details = $id_laporan_proyek_details;
        $LaporanProyekDetail->nama_dokumen_proyek = $request->nama_dokumen_proyek;
        $LaporanProyekDetail->tanggal_dokumen_proyek = $request->tanggal_dokumen_proyek;

        if ($request->file_dokumen_proyek <> "") {
            $file = $request->file_dokumen_proyek;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_proyek . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanProyekDetail->file_dokumen_proyek = $fileName;
        }

        $LaporanProyekDetail->save();

        return redirect("/sub-detail-laporan-proyek/$id_laporan_proyek_details")->with('success', 'Data berhasil ditambahkan!');
    }

 
    public function detail($id)
    {
        // Ambil data laporan akuntansi detail berdasarkan ID
        $laporanProyekDetails = LaporanProyekDetails::find($id);

        // Cek apakah data ditemukan
        if (!$laporanProyekDetails) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil sub detail menggunakan metode yang benar
        $subDetails = $laporanProyekDetails->laporanProyekSubDetails;

        // Kirim data ke view
        return view('Proyek.detail', compact('laporanProyekDetails', 'subDetails'));
    }

    public function edit($id_laporan_proyek_details, $id_laporan_proyek_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan Proyek',
            'subTitle'          => 'Edit Sub Detail Laporan proyek',
            'form'              => 'Edit',
            'LaporanProyekDetail'    => LaporanProyekDetails::with('dokumen', 'laporanProyek')->find($id_laporan_proyek_details),
            'detail'            => LaporanProyekSubDetails::with('LaporanProyekDetail')->find($id_laporan_proyek_sub_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanProyekSubDetail.form', $data);
    }

    

    public function prosesEdit(Request $request, $id_laporan_proyek_details, $id_laporan_proyek_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporaProyekDetail = LaporanProyekSubDetails::find($id_laporan_proyek_sub_details);
        $LaporanProyekDetail->nama_dokumen_proyek = $request->nama_dokumen_proyek;
        $LaporanProyekDetail->tanggal_dokumen_proyek = $request->tanggal_dokumen_proyek;

        if ($request->file_dokumen_proyek <> "") {
            if ($LaporanProyekDetail->file_dokumen_proyek <> "") {
                unlink(public_path($this->public_path) . '/' . $LaporanProyekDetail->file_dokumen_proyek);
            }

            $file = $request->file_dokumen_proyek;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_proyek . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanProyekDetail->file_dokumen_Proyek = $fileName;
        }

        $LaporanProyekDetail->save();

        return redirect("/sub-detail-laporan-proyek/$id_laporan_proyek_details")->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_laporan_proyek_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $LaporanProyekSubDetail = LaporanProyekSubDetails::find($id_laporan_proyek_sub_details);
        
        // Cek jika data ditemukan
        if (!$LaporanProyekSubDetail) {
            return back()->with('error', 'Data tidak ditemukan!');
        }
    
        if ($LaporanProyekSubDetail->file_dokumen_proyek !== "") {
            unlink(public_path($this->public_path) . '/' . $LaporanProyekSubDetail->file_dokumen_proyek);
        }
    
        $LaporanProyekSubDetail->delete();
    
        return back()->with('success', 'Data berhasil dihapus!');
    }
    

    public function downloadFile($id_laporan_proyek_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanProyekSubDetails::find($id_laporan_proyek_sub_details);

        $fileName = $data->file_dokumen_proyek;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
