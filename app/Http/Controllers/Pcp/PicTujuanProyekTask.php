<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\ModelProyek;
use App\Models\PicTujuanProyekTasks;
use App\Models\TaskPcps;
use Illuminate\Http\Request;

class PicTujuanProyekTask extends Controller
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

        $daftarPicTujuan = PicTujuanProyekTasks::with('proyek', 'taskPcp')
            ->where('id_task_pcp', $id_task_pcp)
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Task PCP',
            'subTitle'          => 'PIC Tujuan (Proyek)',
            'daftarPicTujuan'   => $daftarPicTujuan,
            'taskPcp'           => TaskPcps::find($id_task_pcp),
            'daftarProyek'      => ModelProyek::get(),
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman PIC Tujuan Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();
        
        return view('pcp/picTujuanProyekTask.index', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $picTujuanProyekTask = new PicTujuanProyekTasks();
        $picTujuanProyekTask->id_proyek           = $request->id_proyek;
        $picTujuanProyekTask->id_task_pcp         = $request->id_task_pcp;
        $picTujuanProyekTask->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data PIC Tujuan Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesHapus($id_pic_tujuan_proyek_task)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $picTujuanProyekTask = PicTujuanProyekTasks::find($id_pic_tujuan_proyek_task);
        $picTujuanProyekTask->delete();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data PIC Tujuan Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
