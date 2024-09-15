<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\PicDivisiTasks;
use App\Models\TaskPcps;
use Illuminate\Http\Request;

class PicDivisiTask extends Controller
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

        $daftarPicDivisi = PicDivisiTasks::with('divisi', 'taskPcp')
            ->where('id_task_pcp', $id_task_pcp)
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Task PCP',
            'subTitle'          => 'PIC Divisi',
            'daftarPicDivisi'   => $daftarPicDivisi,
            'taskPcp'           => TaskPcps::find($id_task_pcp),
            'daftarUser'        => $this->ModelUser->dataUser(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman PIC Divisi Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();
        
        return view('pcp/picDivisiTask.index', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $picDivisiTask = new PicDivisiTasks();
        $picDivisiTask->id_divisi           = $request->id_divisi;
        $picDivisiTask->id_task_pcp         = $request->id_task_pcp;
        $picDivisiTask->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data PIC Divisi Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesHapus($id_pic_divisi_task)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $picDivisiTask = PicDivisiTasks::find($id_pic_divisi_task);
        $picDivisiTask->delete();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data PIC Divisi Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
