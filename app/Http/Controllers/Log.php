<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use Illuminate\Http\Request;

class Log extends Controller
{

    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->public_path = 'task';
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(Request()->filterMonth) {
            $month = Request()->filterMonth;
        } else {
            $month = date('Y-m');
        }

        if (Request()->filterDate) {
            $date = Request()->filterDate;
            $month = date('Y-m', strtotime(Request()->filterDate));
            $daftarLog = ModelLog::with('user')
                ->whereDate('created_at', $date)
                ->orderBy('created_at', 'DESC')
                ->limit(300)
                ->get();
        } else {
            $date = null;
            $daftarLog = ModelLog::with('user')
                ->whereYear('created_at', date('Y', strtotime($month)))
                ->whereMonth('created_at', '=', date('m', strtotime($month)))
                ->orderBy('created_at', 'DESC')
                ->limit(300)
                ->get();
        }
        
        $data = [
            'title'             => 'Data Log',
            'subTitle'          => 'Daftar Log',
            'filterMonth'       => $month,
            'filterDate'        => $date,
            'daftarLog'         => $daftarLog,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('log.index', $data);
    }

    public function detail($id_log)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Log',
            'subTitle'          => 'Detail Log',
            'form'              => 'Detail',
            'detail'            => ModelLog::with('user')->find($id_log),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('log.form', $data);
    }

    public function prosesHapus($id_log)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $log = ModelLog::find($id_log);

        if (!$log) {
            return back()->with('fail', 'Data tidak ada!');
        }

        $log->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
