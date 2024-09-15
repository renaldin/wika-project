<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\Agendas;
use App\Models\AgendaTasks;
use App\Models\ModelUser;
use App\Models\ModelTask;
use App\Models\ModelLog;
use App\Models\PicDivisiTasks;
use App\Models\PicTujuanProyekTasks;
use App\Models\PicTujuanTasks;
use App\Models\ProyekUsers;
use App\Models\TaskPcps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskPcp extends Controller
{

    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarTaskPcp = TaskPcps::with('createdBy')
            ->orderBy('created_at', 'DESC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Task PCP',
            'subTitle'          => 'Task',
            'daftarTaskPcp'     => $daftarTaskPcp,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();
        
        return view('pcp/taskPcp.index', $data);
    }

    public function detail($id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Task PCP',
            'subTitle'          => 'Detail Task PCP',
            'form'              => 'Detail',
            'detail'            => TaskPcps::with('createdBy')->find($id_task_pcp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return view('pcp/taskPcp.form', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Task PCP',
            'subTitle'          => 'Tambah Task PCP',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return view('pcp/taskPcp.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $taskPcp = new TaskPcps();
            $taskPcp->tanggal_permintaan    = $request->tanggal_permintaan;
            $taskPcp->judul_tugas           = $request->judul_tugas;
            $taskPcp->instruksi_pekerjaan   = $request->instruksi_pekerjaan;
            $taskPcp->batas_waktu           = $request->batas_waktu;
            $taskPcp->link_pengumpulan_tugas= $request->link_pengumpulan_tugas;
            $taskPcp->status_tugas          = $request->status_tugas;
            $taskPcp->komentar              = $request->komentar;
            $taskPcp->created_by            = Session()->get('id_user') ;
            $taskPcp->save();

            $agenda = new Agendas();
            $agenda->nama_kegiatan      = $request->judul_tugas;
            $agenda->tanggal_kegiatan   = $request->batas_waktu;
            $agenda->catatan_agenda     = $request->instruksi_pekerjaan;
            $agenda->status_agenda      = 'Belum';
            $agenda->status_task        = 'Task';
            $agenda->created_by         = Session()->get('id_user');
            $agenda->save();

            $lastAgenda = Agendas::latest()->firstOrFail();
            $lastTaskPcp = TaskPcps::latest()->firstOrFail();

            $agendaTask = new AgendaTasks();
            $agendaTask->id_agenda      = $lastAgenda->id;
            $agendaTask->id_task_pcp    = $lastTaskPcp->id;
            $agendaTask->save();

            $log            = new ModelLog();
            $log->id_user   = Session()->get('id_user');
            $log->activity  = 'Menambah Data Task PCP.';
            $log->feature   = 'Task PCP';
            $log->save();

            DB::commit();
            return redirect()->route('daftar-task-pcp')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('daftar-task-pcp')->with('fail', 'Terjadi kesalahan sistem!');
        }
    }

    public function edit($id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Task PCP',
            'subTitle'          => 'Edit Task PCP',
            'form'              => 'Edit',
            'detail'            => TaskPcps::with('createdBy')->find($id_task_pcp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return view('pcp/taskPcp.form', $data);
    }

    public function prosesEdit(Request $request, $id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $taskPcp = TaskPcps::with('createdBy')->find($id_task_pcp);
            $taskPcp->tanggal_permintaan    = $request->tanggal_permintaan;
            $taskPcp->judul_tugas           = $request->judul_tugas;
            $taskPcp->instruksi_pekerjaan   = $request->instruksi_pekerjaan;
            $taskPcp->batas_waktu           = $request->batas_waktu;
            $taskPcp->link_pengumpulan_tugas= $request->link_pengumpulan_tugas;
            $taskPcp->status_tugas          = $request->status_tugas;
            $taskPcp->komentar              = $request->komentar;
            $taskPcp->save();

            $agendaTask = AgendaTasks::where('id_task_pcp', $id_task_pcp)->first();

            $agenda = Agendas::find($agendaTask->id_agenda);
            $agenda->nama_kegiatan      = $request->judul_tugas;
            $agenda->tanggal_kegiatan   = $request->batas_waktu;
            $agenda->catatan_agenda     = $request->instruksi_pekerjaan;
            $agenda->created_by         = Session()->get('id_user');
            $agenda->save();

            $log            = new ModelLog();
            $log->id_user   = Session()->get('id_user');
            $log->activity  = 'Mengedit Data Task PCP.';
            $log->feature   = 'Task PCP';
            $log->save();

            DB::commit();
            return redirect()->route('daftar-task-pcp')->with('success', 'Data berhasil diedit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('daftar-task-pcp')->with('fail', 'Terjadi kesalahan sistem!');
        }
    }

    public function prosesHapus($id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        $agendaTask = AgendaTasks::where('id_task_pcp', $id_task_pcp)->first();
        $agenda = Agendas::find($agendaTask->id_agenda);
        $agenda->delete();
        $agendaTask->delete();
        
        $taskPcp = TaskPcps::find($id_task_pcp);
        $taskPcp->delete();

        $picTujuanTasks = PicTujuanTasks::where('id_task_pcp', $id_task_pcp)->get();
        foreach ($picTujuanTasks as $item) {
            $item->delete();
        }

        $picTujuanProyekTasks = PicTujuanProyekTasks::where('id_task_pcp', $id_task_pcp)->get();
        foreach ($picTujuanProyekTasks as $item) {
            $item->delete();
        }

        $picDivisiTasks = PicDivisiTasks::where('id_task_pcp', $id_task_pcp)->get();
        foreach ($picDivisiTasks as $item) {
            $item->delete();
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        DB::commit();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    // PER ORANG
    public function taskPerOrang()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $id_user = Session()->get('id_user');
        $daftarTaskPcp = TaskPcps::with('createdBy', 'picTujuan')
            ->whereHas('picTujuan', function ($query) use ($id_user) {
                $query->where('id_tujuan', $id_user);
            })
            ->orderBy('created_at', 'DESC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Task PCP (Per Orang)',
            'subTitle'          => 'Daftar',
            'daftarTaskPcp'     => $daftarTaskPcp,
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();
        
        return view('pcp/taskPcp.taskPerOrang', $data);
    }

    public function detailPerOrang($id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Task PCP (Per Orang)',
            'subTitle'          => 'Detail',
            'form'              => 'Detail',
            'detail'            => TaskPcps::with('createdBy')->find($id_task_pcp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return view('pcp/taskPcp.formPerOrang', $data);
    }

    public function editPerOrang($id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Task PCP (Per Orang)',
            'subTitle'          => 'Edit',
            'form'              => 'Edit',
            'detail'            => TaskPcps::with('createdBy')->find($id_task_pcp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return view('pcp/taskPcp.formPerOrang', $data);
    }

    public function prosesEditPerOrang(Request $request, $id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $taskPcp = TaskPcps::with('createdBy')->find($id_task_pcp);
            $taskPcp->status_tugas          = $request->status_tugas;
            $taskPcp->save();

            $log            = new ModelLog();
            $log->id_user   = Session()->get('id_user');
            $log->activity  = 'Mengedit Data Task PCP.';
            $log->feature   = 'Task PCP';
            $log->save();

            DB::commit();
            return redirect()->route('daftar-task-pcp-per-orang')->with('success', 'Data berhasil diedit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('daftar-task-pcp-per-orang')->with('fail', 'Terjadi kesalahan sistem!');
        }
    }
    // TUTUP PER ORANG

    // PROYEK
    public function taskProyek()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $idProyek = [];
        foreach($proyekUser as $item) {
            $idProyek[] = $item->id_proyek;
        }
        
        $daftarTaskPcp = TaskPcps::with('createdBy', 'picTujuanProyek')
            ->whereHas('picTujuanProyek', function ($query) use ($idProyek) {
                $query->whereIn('id_proyek', $idProyek);
            })
            ->orderBy('created_at', 'DESC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Task PCP (Proyek)',
            'subTitle'          => 'Daftar',
            'daftarTaskPcp'     => $daftarTaskPcp,
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();
        
        return view('pcp/taskPcp.taskProyek', $data);
    }

    public function detailProyek($id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Task PCP (Proyek)',
            'subTitle'          => 'Detail',
            'form'              => 'Detail',
            'detail'            => TaskPcps::with('createdBy')->find($id_task_pcp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return view('pcp/taskPcp.formProyek', $data);
    }

    public function editProyek($id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Task PCP (Proyek)',
            'subTitle'          => 'Edit',
            'form'              => 'Edit',
            'detail'            => TaskPcps::with('createdBy')->find($id_task_pcp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Task PCP.';
        $log->feature   = 'Task PCP';
        $log->save();

        return view('pcp/taskPcp.formProyek', $data);
    }

    public function prosesEditProyek(Request $request, $id_task_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $taskPcp = TaskPcps::with('createdBy')->find($id_task_pcp);
            $taskPcp->status_tugas          = $request->status_tugas;
            $taskPcp->save();

            $log            = new ModelLog();
            $log->id_user   = Session()->get('id_user');
            $log->activity  = 'Mengedit Data Task PCP.';
            $log->feature   = 'Task PCP';
            $log->save();

            DB::commit();
            return redirect()->route('daftar-task-pcp-proyek')->with('success', 'Data berhasil diedit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('daftar-task-pcp-proyek')->with('fail', 'Terjadi kesalahan sistem!');
        }
    }
}
