<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\LaporanKeuanganDetails;
use App\Models\LaporanKeuanganSubDetails;
use Illuminate\Http\Request;

class LaporanKeuanganSubDetail extends Controller
{
    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_dokumen_Keuangan';
    }

    public function index($id_laporan_keuangan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Ambil detail laporan keuangan berdasarkan ID
        $laporanKeuanganDetail = LaporanKeuanganDetails::with('dokumen', 'laporanKeuanganSubDetails')->find($id_laporan_keuangan_details);
        
        // Pastikan bahwa data ditemukan
        if (!$laporanKeuanganDetail) {
            return redirect()->back()->with('error', 'Data laporan keuangan tidak ditemukan.');
        }
    
        $data = [
            'title' => 'Data Detail Laporan Keuangan',
            'subTitle' => 'Sub Detail Laporan Keuangan',
            'laporanKeuanganDetail' => $laporanKeuanganDetail, // Mengirimkan $laporanKeuanganDetail
            'detail' => $laporanKeuanganDetail,
            'daftar' => LaporanKeuanganSubDetails::with('LaporanKeuanganDetail')
                ->where('id_laporan_keuangan_details', $id_laporan_keuangan_details)
                ->get(),
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('keuangan/laporanKeuanganSubDetail.index', $data);
    }
    
    

    public function tambah($id_laporan_keuangan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title' => 'Data Laporan Keuangan',
            'subTitle' => 'Tambah Sub Detail Laporan Keuangan',
            'form' => 'Tambah',
            'LaporanKeuanganDetail' => LaporanKeuanganDetails::with('dokumen', 'laporanKeuanganSubDetails')->find($id_laporan_keuangan_details),
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/laporanKeuanganSubDetail.form', $data);
    }

    public function prosesTambah(Request $request, $id_laporan_keuangan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanKeuanganDetail = new LaporanKeuanganSubDetails();
        $LaporanKeuanganDetail->id_laporan_keuangan_details = $id_laporan_keuangan_details;
        $LaporanKeuanganDetail->nama_dokumen_keuangan = $request->nama_dokumen_keuangan;
        $LaporanKeuanganDetail->tanggal_dokumen_keuangan = $request->tanggal_dokumen_keuangan;

        if ($request->file_dokumen_keuangan <> "") {
            $file = $request->file_dokumen_keuangan;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_keuangan . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanKeuanganDetail->file_dokumen_keuangan = $fileName;
        }

        $LaporanKeuanganDetail->save();

        return redirect("/sub-detail-laporan-keuangan/$id_laporan_keuangan_details")->with('success', 'Data berhasil ditambahkan!');
    }

 
    public function detail($id)
    {
        // Ambil data laporan keuangan detail berdasarkan ID
        $laporanKeuanganDetails = LaporanKeuanganDetails::find($id);

        // Cek apakah data ditemukan
        if (!$laporanKeuanganDetails) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil sub detail menggunakan metode yang benar
        $subDetails = $laporanKeuanganDetails->laporanKeuanganSubDetails;

        // Kirim data ke view
        return view('keuangan.detail', compact('laporanKeuanganDetails', 'subDetails'));
    }

    public function edit($id_laporan_keuangan_details, $id_laporan_keuangan_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan Keuangan',
            'subTitle'          => 'Edit Sub Detail Laporan Keuangan',
            'form'              => 'Edit',
            'LaporanKeuanganDetail'    => LaporanKeuanganDetails::with('dokumen', 'laporanKeuangan')->find($id_laporan_keuangan_details),
            'detail'            => LaporanKeuanganSubDetails::with('LaporanKeuanganDetail')->find($id_laporan_keuangan_sub_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanKeuanganSubDetail.form', $data);
    }

    

    public function prosesEdit(Request $request, $id_laporan_keuangan_details, $id_laporan_keuangan_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanKeuanganDetail = LaporanKeuanganSubDetails::find($id_laporan_keuangan_sub_details);
        $LaporanKeuanganDetail->nama_dokumen_keuangan = $request->nama_dokumen_keuangan;
        $LaporanKeuanganDetail->tanggal_dokumen_keuangan = $request->tanggal_dokumen_keuangan;

        if ($request->file_dokumen_keuangan <> "") {
            if ($LaporanKeuanganDetail->file_dokumen_keuangan <> "") {
                unlink(public_path($this->public_path) . '/' . $LaporanKeuanganDetail->file_dokumen_keuangan);
            }

            $file = $request->file_dokumen_keuangan;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_keuangan . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanKeuanganDetail->file_dokumen_keuangan = $fileName;
        }

        $LaporanKeuanganDetail->save();

        return redirect("/sub-detail-laporan-keuangan/$id_laporan_keuangan_details")->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_laporan_keuangan_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $LaporanKeuanganSubDetail = LaporanKeuanganSubDetails::find($id_laporan_keuangan_sub_details);
        
        // Cek jika data ditemukan
        if (!$LaporanKeuanganSubDetail) {
            return back()->with('error', 'Data tidak ditemukan!');
        }
    
        if ($LaporanKeuanganSubDetail->file_dokumen_keuangan !== "") {
            unlink(public_path($this->public_path) . '/' . $LaporanKeuanganSubDetail->file_dokumen_keuangan);
        }
    
        $LaporanKeuanganSubDetail->delete();
    
        return back()->with('success', 'Data berhasil dihapus!');
    }
    

    public function downloadFile($id_laporan_keuangan_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanKeuanganSubDetails::find($id_laporan_keuangan_sub_details);

        $fileName = $data->file_dokumen_keuangan;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
