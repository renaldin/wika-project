<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Keuangan\LaporanAkuntansi;
use App\Models\ModelUser;
use App\Models\LaporanKeuanganDetails;
use Illuminate\Http\Request;

class LaporanAkuntansiDetail extends Controller
{

    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_laporan_akuntansi';
    }

    public function edit($id_laporan_akuntansi_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Laporan Akuntansi',
            'subTitle'          => 'Edit Detail Laporan Akuntansi',
            'form'              => 'Edit',
            'detail'            => LaporanAkuntansiDetails::with('dokumen', 'laporan_akuntansi')->find($id_laporan_akuntansi_details),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanAkuntansiDetail.form', $data);
    }

    public function prosesEdit(Request $request, $id_laporan_akuntansi_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $laporanAkuntansiDetail = LaporanAkuntansiDetails::find($id_laporan_akuntansi_details);
        $laporanAkuntansiDetail->nama_dokumen_akuntansi       = $request->nama_dokumen_akuntansi;
        $laporanAkuntansiDetail->tanggal_dokumen_akuntansi   = $request->tanggal_dokumen_akuntansi;

        if ($request->file_dokumen <> "") {
            if ( $laporanAkuntansiDetail->file_dokumen <> "") {
                unlink(public_path($this->public_path) . '/' .  $laporanAkuntansiDetail->file_dokumen);
            }

            $file = $request->file_dokumen;
            $fileName = date('mdYHis') .' '. $request->nama_dokumen . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $laporanAkuntansiDetail->file_dokumen = $fileName;
        }

        $laporanAkuntansiDetail->save();

        return redirect("/edit-laporan-akuntansi/ $laporanAkuntansiDetail->id_laporan_akuntansi")->with('success', 'Data berhasil diedit!');
    }

    public function downloadFile($id_laporan_akuntansi_details)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = LaporanAkuntansiDetails::find($id_laporan_akuntansi_details);

        $fileName = $data->file_dokumen;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
