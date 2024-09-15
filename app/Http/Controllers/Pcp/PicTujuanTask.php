<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\PicTujuanTasks;
use App\Models\TaskPcps;
use Illuminate\Http\Request;

class PicTujuanTask extends Controller
{

    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index($id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarPicTujuan = PicTujuanTasks::with('tujuan', 'taskPcp')
            ->where('id_task_pcp', $id_task_pcp)
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Task PCP',
            'subTitle'          => 'PIC Tujuan (Per Orang)',
            'daftarPicTujuan'   => $daftarPicTujuan,
            'taskPcp'           => TaskPcps::find($id_task_pcp),
            'daftarUser'        => $this->ModelUser->dataUser(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman PIC Tujuan Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();
        
        return view('pcp/picTujuanTask.index', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $picTujuanTask = new PicTujuanTasks();
        $picTujuanTask->id_tujuan           = $request->id_tujuan;
        $picTujuanTask->id_task_pcp         = $request->id_task_pcp;
        $picTujuanTask->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data PIC Tujuan Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesHapus($id_pic_tujuan_task)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $picTujuanTask = PicTujuanTasks::find($id_pic_tujuan_task);
        $picTujuanTask->delete();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data PIC Tujuan Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
