<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Keuangan\LaporanKeuangan;
use App\Models\ModelUser;
use App\Models\LaporanKeuanganDetails;
use Illuminate\Http\Request;

class LaporanKeuanganDetail extends Controller
{

    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_laporan_keuangan';
    }

    public function edit($id_laporan_keuangan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan Keuangan',
            'subTitle'          => 'Edit Detail Laporan Keuangan',
            'form'              => 'Edit',
            'detail'            => LaporanKeuanganDetails::with('dokumen', 'laporan_keuangan')->find($id_laporan_keuangan_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanKeuanganDetail.form', $data);
    }

    public function prosesEdit(Request $request, $id_laporan_keuangan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $laporanKeuanganDetail = LaporanKeuanganDetails::find($id_laporan_keuangan_details);
        $laporanKeuanganDetail->nama_dokumen_keuangan       = $request->nama_dokumen_keuangan;
        $laporanKeuanganDetail->tanggal_dokumen_keuangan   = $request->tanggal_dokumen_keuangan;

        if ($request->file_dokumen <> "") {
            if ( $laporanKeuanganDetail->file_dokumen <> "") {
                unlink(public_path($this->public_path) . '/' .  $laporanKeuanganDetail->file_dokumen);
            }

            $file = $request->file_dokumen;
            $fileName = date('mdYHis') .' '. $request->nama_dokumen . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $laporanKeuanganDetail->file_dokumen = $fileName;
        }

        $laporanKeuanganDetail->save();

        return redirect("/edit-laporan-keuangan/ $laporanKeuanganDetail->id_laporan_keuangan")->with('success', 'Data berhasil diedit!');
    }

    public function downloadFile($id_laporan_keuangan_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanKeuanganDetails::find($id_laporan_keuangan_details);

        $fileName = $data->file_dokumen;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
