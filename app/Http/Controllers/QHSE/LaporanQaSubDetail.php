<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\LaporanQaDetails;
use App\Models\LaporanQaSubDetails;
use Illuminate\Http\Request;

class LaporanQaSubDetail extends Controller
{
    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_dokumen_Qa';
    }

    public function index($id_laporan_qa_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Ambil detail laporan keuangan berdasarkan ID
        $laporanQaDetail = LaporanQaDetails::with('dokumen', 'laporanQaSubDetails')->find($id_laporan_qa_details);
        
        // Pastikan bahwa data ditemukan
        if (!$laporanQaDetail) {
            return redirect()->back()->with('error', 'Data laporan QA tidak ditemukan.');
        }
    
        $data = [
            'title' => 'Data Detail Laporan QA',
            'subTitle' => 'Sub Detail Laporan QA',
            'laporanQaDetail' => $laporanQaDetail, // Mengirimkan $laporanKeuanganDetail
            'detail' => $laporanQaDetail,
            'daftar' => LaporanQaSubDetails::with('LaporanQaDetail')
                ->where('id_laporan_qa_details', $id_laporan_qa_details)
                ->get(),
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('qhse/laporanQaSubDetail.index', $data);
    }
    
    

    public function tambah($id_laporan_qa_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $data = [
            'title' => 'Data Laporan QA',
            'subTitle' => 'Tambah Sub Detail QA',
            'form' => 'Tambah',
            'LaporanQaDetail' => LaporanQaDetails::with('dokumen', 'laporanQaSubDetails')->find($id_laporan_qa_details), // This variable name is correct
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('qhse/laporanQaSubDetail.form', $data);
    }
    

    public function prosesTambah(Request $request, $id_laporan_qa_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporanQaDetail = new LaporanQaSubDetails();
        $LaporanQaDetail->id_laporan_Qa_details = $id_laporan_qa_details;
        $LaporanQaDetail->nama_dokumen_Qa = $request->nama_dokumen_qa;
        $LaporanQaDetail->tanggal_dokumen_Qa = $request->tanggal_dokumen_qa;

        if ($request->file_dokumen_qa <> "") {
            $file = $request->file_dokumen_qa;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_qa . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanQaDetail->file_dokumen_qa = $fileName;
        }

        $LaporanQaDetail->save();

        return redirect("/sub-detail-laporan-qa/$id_laporan_qa_details")->with('success', 'Data berhasil ditambahkan!');
    }

 
    public function detail($id)
    {
        // Ambil data laporan akuntansi detail berdasarkan ID
        $laporanQaDetails = LaporanQaDetails::find($id);

        // Cek apakah data ditemukan
        if (!$laporanQaDetails) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil sub detail menggunakan metode yang benar
        $subDetails = $laporanQaDetails->laporanQaSubDetails;

        // Kirim data ke view
        return view('qhse.detail', compact('laporanQaDetails', 'subDetails'));
    }

    public function edit($id_laporan_qa_details, $id_laporan_qa_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan QA',
            'subTitle'          => 'Edit Sub Detail Laporan QA',
            'form'              => 'Edit',
            'LaporanQaDetail'    => LaporanQaDetails::with('dokumen', 'laporanQa')->find($id_laporan_qa_details),
            'detail'            => LaporanQaSubDetails::with('LaporanQaDetail')->find($id_laporan_qa_sub_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/laporanQaSubDetail.form', $data);
    }

    

    public function prosesEdit(Request $request, $id_laporan_qa_details, $id_laporan_qa_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $LaporaQaDetail = LaporanQaSubDetails::find($id_laporan_qa_sub_details);
        $LaporanQaDetail->nama_dokumen_qa = $request->nama_dokumen_qa;
        $LaporanQaDetail->tanggal_dokumen_qa = $request->tanggal_dokumen_qa;

        if ($request->file_dokumen_qa <> "") {
            if ($LaporanQaDetail->file_dokumen_qa <> "") {
                unlink(public_path($this->public_path) . '/' . $LaporanQaDetail->file_dokumen_qa);
            }

            $file = $request->file_dokumen_qa;
            $fileName = date('mdYHis') . ' ' . $request->nama_dokumen_qa . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);
            $LaporanQaDetail->file_dokumen_Qa = $fileName;
        }

        $LaporanQaDetail->save();

        return redirect("/sub-detail-laporan-qa/$id_laporan_qa_details")->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_laporan_qa_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $LaporanQaSubDetail = LaporanQaSubDetails::find($id_laporan_qa_sub_details);
        
        // Cek jika data ditemukan
        if (!$LaporanQaSubDetail) {
            return back()->with('error', 'Data tidak ditemukan!');
        }
    
        if ($LaporanQaSubDetail->file_dokumen_qa !== "") {
            unlink(public_path($this->public_path) . '/' . $LaporanQaSubDetail->file_dokumen_qa);
        }
    
        $LaporanQaSubDetail->delete();
    
        return back()->with('success', 'Data berhasil dihapus!');
    }
    

    public function downloadFile($id_laporan_qa_sub_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanQaSubDetails::find($id_laporan_qa_sub_details);

        $fileName = $data->file_dokumen_qa;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
