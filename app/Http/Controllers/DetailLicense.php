<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelSoftware;
use App\Models\ModelLicense;
use App\Models\ModelDetailLicense;
use App\Models\ModelLog;

class DetailLicense extends Controller
{

    private $ModelUser, $public_path, $ModelSoftware, $ModelLicense, $ModelDetailLicense;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSoftware = new ModelSoftware();
        $this->ModelLicense = new ModelLicense();
        $this->ModelDetailLicense = new ModelDetailLicense();
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailLicense = $this->ModelDetailLicense->checkSoftware(Request()->id_software, Request()->id_license);
        if ($detailLicense) {
            return back()->with('fail', 'Data software sudah ada. Silahkan input yang lain!');
        }

        $data = [
            'id_software'       => Request()->id_software,
            'id_license'        => Request()->id_license,
            'status'            => Request()->status,
            'expired_date'      => Request()->expired_date,
            'tanggal_input'     => date('Y-m-d')
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Detail License.';
        $log->feature   = 'DETAIL LICENSE';
        $log->save();

        $this->ModelDetailLicense->tambah($data);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_detail_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_detail_license' => $id_detail_license,
            'status'            => Request()->status
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Detail License.';
        $log->feature   = 'DETAIL LICENSE';
        $log->save();

        $this->ModelDetailLicense->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_detail_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Detail License.';
        $log->feature   = 'DETAIL LICENSE';
        $log->save();

        $this->ModelDetailLicense->hapus($id_detail_license);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
