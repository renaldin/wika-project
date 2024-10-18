<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\LaporanPajakDetails;
use App\Models\LaporanPajakSubDetails;
use Illuminate\Http\Request;

class LaporanPajakSubDetail extends Controller
{
    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_dokumen_Pajak';
    }

    public function index($id_laporan_pajak_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Ambil detail laporan keuangan berdasarkan ID
        $laporanPajakDetail = LaporanPajakDetails::with('dokumen', 'laporanPajakSubDetails')->find($id_laporan_pajak_details);
        
        // Pastikan bahwa data ditemukan
        if (!$laporanPajakDetail) {
            return redirect()->back()->with('error', 'Data laporan akuntansi tidak ditemukan.');
        }
    
        $data = [
            'title' => 'Data Detail Laporan Pajak',
            'subTitle' => 'Sub Detail Laporan Pajak',
            'laporanPajakDetail' => $laporanPajakDetail, // Mengirimkan $laporanKeuanganDetail
            'detail' => $laporanPajakDetail,
            'daftar' => LaporanPajakSubDetails::with('LaporanPajakDetail')
                ->where('id_laporan_pajak_details', $id_laporan_pajak_details)
                ->get(),
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('keuangan/laporanPajakSubDetail.index', $data);
    }
    
    

    public function tambah($id_laporan_pajak_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $data = [
            'title' => 'Data Laporan Pajak',
            'subTitle' => 'Tambah Sub Detail Pajak',
            'form' => 'Tambah',
            'LaporanPajakDetail' => LaporanPajakDetails::with('dokumen', 'laporanPajakSubDetails')->find($id_laporan_pajak_details), // This variable name is correct
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('keuangan/laporanPajakSubDetail.form', $data);
    }
    

    public function prosesTambah(Request $request, $id_laporan_pajak_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanPajakDetail = new LaporanPajakSubDetails();
        $LaporanPajakDetail->id_laporan_pajak_details = $id_laporan_pajak_details;
        $LaporanPajakDetail->nama_dokumen_pajak = $request->nama_dokumen_pajak;
        $LaporanPajakDetail->tanggal_dokumen_pajak = $request->tanggal_dokumen_pajak;

        if ($request->file_dokumen_pajak <> "") {
            $file = $request->file_dokumen_pajak;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_pajak . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanPajakDetail->file_dokumen_pajak = $fileName;
        }

        $LaporanPajakDetail->save();

        return redirect("/sub-detail-laporan-pajak/$id_laporan_pajak_details")->with('success', 'Data berhasil ditambahkan!');
    }

 
    public function detail($id)
    {
        // Ambil data laporan akuntansi detail berdasarkan ID
        $laporanPajakDetails = LaporanPajakDetails::find($id);

        // Cek apakah data ditemukan
        if (!$laporanPajakDetails) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil sub detail menggunakan metode yang benar
        $subDetails = $laporanPajakDetails->laporanPajakSubDetails;

        // Kirim data ke view
        return view('Pajak.detail', compact('laporanAkuntansiDetails', 'subDetails'));
    }

    public function edit($id_laporan_pajak_details, $id_laporan_pajak_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan Pajak',
            'subTitle'          => 'Edit Sub Detail Laporan pajak',
            'form'              => 'Edit',
            'LaporanPajakDetail'    => LaporanPajakDetails::with('dokumen', 'laporanAkuntansi')->find($id_laporan_pajak_details),
            'detail'            => LaporanPajakSubDetails::with('LaporanAkuntansiDetail')->find($id_laporan_pajak_sub_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanPajakSubDetail.form', $data);
    }

    

    public function prosesEdit(Request $request, $id_laporan_pajak_details, $id_laporan_pajak_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporaPajakDetail = LaporanPajakSubDetails::find($id_laporan_pajak_sub_details);
        $LaporanPajakDetail->nama_dokumen_pajak = $request->nama_dokumen_pajak;
        $LaporanPajakDetail->tanggal_dokumen_pajak = $request->tanggal_dokumen_pajak;

        if ($request->file_dokumen_pajak <> "") {
            if ($LaporanPajakDetail->file_dokumen_pajak <> "") {
                unlink(public_path($this->public_path) . '/' . $LaporanPajakDetail->file_dokumen_pajak);
            }

            $file = $request->file_dokumen_pajak;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_pajak . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanPajakDetail->file_dokumen_Pajak = $fileName;
        }

        $LaporanPajakDetail->save();

        return redirect("/sub-detail-laporan-pajak/$id_laporan_pajak_details")->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_laporan_pajak_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $LaporanPajakSubDetail = LaporanPajakSubDetails::find($id_laporan_pajak_sub_details);
        
        // Cek jika data ditemukan
        if (!$LaporanPajakSubDetail) {
            return back()->with('error', 'Data tidak ditemukan!');
        }
    
        if ($LaporanPajakSubDetail->file_dokumen_pajak !== "") {
            unlink(public_path($this->public_path) . '/' . $LaporanPajakSubDetail->file_dokumen_pajak);
        }
    
        $LaporanPajakSubDetail->delete();
    
        return back()->with('success', 'Data berhasil dihapus!');
    }
    

    public function downloadFile($id_laporan_pajak_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanPajakSubDetails::find($id_laporan_pajak_sub_details);

        $fileName = $data->file_dokumen_pajak;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
