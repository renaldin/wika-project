<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\LaporanHseDetails;
use App\Models\LaporanHseSubDetails;
use Illuminate\Http\Request;

class LaporanHseSubDetail extends Controller
{
    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_dokumen_Hse';
    }

    public function index($id_laporan_hse_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Ambil detail laporan keuangan berdasarkan ID
        $laporanHseDetail = LaporanHseDetails::with('dokumen', 'laporanHseSubDetails')->find($id_laporan_hse_details);
        
        // Pastikan bahwa data ditemukan
        if (!$laporanHseDetail) {
            return redirect()->back()->with('error', 'Data laporan HSE tidak ditemukan.');
        }
    
        $data = [
            'title' => 'Data Detail Laporan HSE',
            'subTitle' => 'Sub Detail Laporan HSE',
            'laporanHseDetail' => $laporanHseDetail, // Mengirimkan $laporanKeuanganDetail
            'detail' => $laporanHseDetail,
            'daftar' => LaporanHseSubDetails::with('LaporanHseDetail')
                ->where('id_laporan_hse_details', $id_laporan_hse_details)
                ->get(),
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('qhse/laporanHseSubDetail.index', $data);
    }
    
    

    public function tambah($id_laporan_hse_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $data = [
            'title' => 'Data Laporan HSE',
            'subTitle' => 'Tambah Sub Detail HSE',
            'form' => 'Tambah',
            'LaporanHseDetail' => LaporanHseDetails::with('dokumen', 'laporanHseSubDetails')->find($id_laporan_hse_details), // This variable name is correct
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('qhse/laporanHseSubDetail.form', $data);
    }
    

    public function prosesTambah(Request $request, $id_laporan_hse_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanHseDetail = new LaporanHseSubDetails();
        $LaporanHseDetail->id_laporan_Hse_details = $id_laporan_hse_details;
        $LaporanHseDetail->nama_dokumen_Hse = $request->nama_dokumen_hse;
        $LaporanHseDetail->tanggal_dokumen_Hse = $request->tanggal_dokumen_hse;

        if ($request->file_dokumen_hse <> "") {
            $file = $request->file_dokumen_hse;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_hse . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanHseDetail->file_dokumen_hse = $fileName;
        }

        $LaporanHseDetail->save();

        return redirect("/sub-detail-laporan-hse/$id_laporan_hse_details")->with('success', 'Data berhasil ditambahkan!');
    }

 
    public function detail($id)
    {
        // Ambil data laporan akuntansi detail berdasarkan ID
        $laporanHseDetails = LaporanHseDetails::find($id);

        // Cek apakah data ditemukan
        if (!$laporanHseDetails) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil sub detail menggunakan metode yang benar
        $subDetails = $laporanHseDetails->laporanHseSubDetails;

        // Kirim data ke view
        return view('qhse.detail', compact('laporanHseDetails', 'subDetails'));
    }

    public function edit($id_laporan_hse_details, $id_laporan_hse_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan HSE',
            'subTitle'          => 'Edit Sub Detail Laporan HSE',
            'form'              => 'Edit',
            'LaporanHseDetail'    => LaporanHseDetails::with('dokumen', 'laporanHse')->find($id_laporan_hse_details),
            'detail'            => LaporanHseSubDetails::with('LaporanHseDetail')->find($id_laporan_hse_sub_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/laporanHseSubDetail.form', $data);
    }

    

    public function prosesEdit(Request $request, $id_laporan_hse_details, $id_laporan_hse_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporaHseDetail = LaporanHseSubDetails::find($id_laporan_hse_sub_details);
        $LaporanHseDetail->nama_dokumen_Hse = $request->nama_dokumen_hse;
        $LaporanHseDetail->tanggal_dokumen_Hse = $request->tanggal_dokumen_hse;

        if ($request->file_dokumen_hse <> "") {
            if ($LaporanHseDetail->file_dokumen_hse <> "") {
                unlink(public_path($this->public_path) . '/' . $LaporanHseDetail->file_dokumen_hse);
            }

            $file = $request->file_dokumen_hse;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_Hse . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanHseDetail->file_dokumen_Hse = $fileName;
        }

        $LaporanHseDetail->save();

        return redirect("/sub-detail-laporan-hse/$id_laporan_hse_details")->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_laporan_hse_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $LaporanHseSubDetail = LaporanHseSubDetails::find($id_laporan_hse_sub_details);
        
        // Cek jika data ditemukan
        if (!$LaporanHseSubDetail) {
            return back()->with('error', 'Data tidak ditemukan!');
        }
    
        if ($LaporanHseSubDetail->file_dokumen_hse !== "") {
            unlink(public_path($this->public_path) . '/' . $LaporanHseSubDetail->file_dokumen_hse);
        }
    
        $LaporanHseSubDetail->delete();
    
        return back()->with('success', 'Data berhasil dihapus!');
    }
    

    public function downloadFile($id_laporan_hse_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanHseSubDetails::find($id_laporan_hse_sub_details);

        $fileName = $data->file_dokumen_hse;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
