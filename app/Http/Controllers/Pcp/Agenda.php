<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\Agendas;
use App\Models\ModelProyek;
use App\Models\PicAgendas;
use Illuminate\Http\Request;

class Agenda extends Controller
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

        $daftarAgenda = Agendas::with('createdBy', 'proyek')
            ->where('status_task', 'Kegiatan')
            ->orderBy('created_at', 'DESC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Agenda',
            'subTitle'          => 'Daftar Agenda',
            'daftarAgenda'      => $daftarAgenda,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Agenda.';
        $log->feature   = 'Agenda';
        $log->save();
        
        return view('pcp/agenda.index', $data);
    }

    public function detail($id_agenda)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Agenda',
            'subTitle'          => 'Detail Agenda',
            'form'              => 'Detail',
            'daftarProyek'      => ModelProyek::get(),
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen'])->get(),
            'detail'            => Agendas::with('createdBy', 'proyek')->find($id_agenda),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Agenda.';
        $log->feature   = 'Agenda';
        $log->save();

        return view('pcp/agenda.form', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Agenda',
            'subTitle'          => 'Tambah Agenda',
            'form'              => 'Tambah',
            'daftarProyek'      => ModelProyek::get(),
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen'])->get(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Agenda.';
        $log->feature   = 'Agenda';
        $log->save();

        return view('pcp/agenda.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $agenda = new Agendas();
        $agenda->nama_kegiatan      = $request->nama_kegiatan;
        $agenda->tanggal_kegiatan   = $request->tanggal_kegiatan;
        $agenda->catatan_agenda     = $request->catatan_agenda;
        $agenda->status_agenda      = $request->status_agenda;
        $agenda->link               = $request->link;
        if ($request->id_proyek) {
            $agenda->id_proyek      = $request->id_proyek;
        }
        $agenda->status_task        = 'Kegiatan';
        $agenda->created_by         = Session()->get('id_user');
        $agenda->save();

        $agendaLast = Agendas::latest()->first();
        
        foreach ($request->id_pic as $item) {
            $pic = new PicAgendas();
            $pic->id_agenda = $agendaLast->id;
            $pic->id_pic    = $item;
            $pic->save();
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Agenda.';
        $log->feature   = 'Agenda';
        $log->save();

        return redirect()->route('daftar-agenda')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_agenda)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Agenda',
            'subTitle'          => 'Edit Agenda',
            'form'              => 'Edit',
            'daftarProyek'      => ModelProyek::get(),
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen'])->get(),
            'detail'            => Agendas::with('createdBy', 'proyek')->find($id_agenda),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Agenda.';
        $log->feature   = 'Agenda';
        $log->save();

        return view('pcp/agenda.form', $data);
    }

    public function prosesEdit(Request $request, $id_agenda)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $agenda = Agendas::with('createdBy')->find($id_agenda);
        $agenda->nama_kegiatan      = $request->nama_kegiatan;
        $agenda->tanggal_kegiatan   = $request->tanggal_kegiatan;
        $agenda->catatan_agenda     = $request->catatan_agenda;
        $agenda->status_agenda      = $request->status_agenda;
        $agenda->link               = $request->link;
        $agenda->status_task        = 'Kegiatan';
        if ($request->id_proyek) {
            $agenda->id_proyek      = $request->id_proyek;
        }
        $agenda->created_by         = Session()->get('id_user') ;
        $agenda->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Agenda.';
        $log->feature   = 'Agenda';
        $log->save();

        return redirect()->route('daftar-agenda')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_agenda)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $agenda = Agendas::find($id_agenda);
        $agenda->delete();

        $picAgenda = PicAgendas::where('id_agenda', $id_agenda)->get();
        foreach ($picAgenda as $item) {
            $item->delete();
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Agenda.';
        $log->feature   = 'Agenda';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }

    public function kalender()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarAgenda = Agendas::with('createdBy', 'proyek')
            ->limit(200)
            ->get();
        
        $proyekAgenda = Agendas::with('createdBy', 'proyek')
            ->select('id_proyek')
            ->distinct()
            ->limit(200)
            ->get();
        $idProyek = [];
        foreach($proyekAgenda as $item) {
            if ($item->id_proyek != null) {
                $idProyek[] = $item->id_proyek;
            }
        }
        
        $data = [
            'title'             => 'Kalender',
            'subTitle'          => 'Kalender',
            'daftarProyek'      => ModelProyek::whereIn('id_proyek', $idProyek)->get(),
            'daftarAgenda'      => $daftarAgenda,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp/agenda.kalender', $data);
    }

    public function getAgenda()
    {
        $agenda = Agendas::with('proyek')
            ->get();
        return response()->json($agenda);
    }

    public function getAgendaProyek($id_proyek)
    {
        $idProyek = $id_proyek;
        $agenda = Agendas::with('proyek')
            ->whereHas('proyek', function ($query) use ($idProyek) {
                $query->where('id_proyek', $idProyek);
            })
            ->get();
        return response()->json($agenda);
    }
}
