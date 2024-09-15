<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\Timelines;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\TimelineDetails;
use Illuminate\Http\Request;

class TimelineCopy extends Controller
{

    private $ModelUser, $ModelProyek;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $idProyek = [];
        foreach($proyekUser as $item) {
            $idProyek[] = $item->id_proyek;
        }

        if (Session()->get('role') == 'Tim Proyek') {
            $daftarTimeline = Timelines::with('proyek')
                ->whereIn('id_proyek', $idProyek)
                ->where('verifikasi_timeline', 'Sudah Disetujui')
                ->limit(400)
                ->get();
        } elseif (Session()->get('role') == 'Head Office') {
            $daftarTimeline = Timelines::with('proyek')
                ->where('verifikasi_timeline', 'Sudah Disetujui')
                ->where('id_verifikator', Session()->get('id_user'))
                ->limit(400)
                ->get();
        }

        
        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Daftar Timeline',
            'daftarTimeline'    => $daftarTimeline,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Timeline.';
        $log->feature   = 'Timeline';
        $log->save();
        
        return view('pcp/timeline.index', $data);
    }

    public function detail($id_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if (Session()->get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
            $dataProyekByUser = [];
            foreach($proyekUser as $item) {
                $dataProyekByUser[] = ModelProyek::find($item->id_proyek);
            }
        } else {
            $dataProyekByUser = $this->ModelProyek->data();
        }
        
        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Detail Timeline',
            'form'              => 'Detail',
            'daftarProyek'      => $dataProyekByUser,
            'detail'            => Timelines::with('proyek')->find($id_timeline),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Timeline.';
        $log->feature   = 'Timeline';
        $log->save();

        return view('pcp/timeline.form', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $dataProyekByUser = [];
        foreach($proyekUser as $item) {
            $dataProyekByUser[] = ModelProyek::find($item->id_proyek);
        }

        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Tambah Timeline',
            'form'              => 'Tambah',
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Timeline.';
        $log->feature   = 'Timeline';
        $log->save();

        return view('pcp/timeline.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $timeline = new Timelines();
        $timeline->id_proyek                    = $request->id_proyek;
        $timeline->tanggal_kontrak_induk        = $request->tanggal_kontrak_induk;
        $timeline->link_kontrak_induk           = $request->link_kontrak_induk;
        $timeline->tanggal_spmk                 = $request->tanggal_spmk;
        $timeline->link_spmk                    = $request->link_spmk;
        $timeline->tanggal_dokumen_rkp          = $request->tanggal_dokumen_rkp;
        $timeline->link_dokumen_rkp             = $request->link_dokumen_rkp;
        $timeline->tanggal_checkpoint_20        = $request->tanggal_checkpoint_20;
        $timeline->link_checkpoint_20           = $request->link_checkpoint_20;
        $timeline->tanggal_checkpoint_50        = $request->tanggal_checkpoint_50;
        $timeline->link_checkpoint_50           = $request->link_checkpoint_50;
        $timeline->tanggal_checkpoint_75        = $request->tanggal_checkpoint_75;
        $timeline->link_checkpoint_75           = $request->link_checkpoint_75;
        $timeline->tanggal_foureyes_principal   = $request->tanggal_foureyes_principal;
        $timeline->link_foureyes_principal      = $request->link_foureyes_principal;
        $timeline->tanggal_dokumen_lps          = $request->tanggal_dokumen_lps;
        $timeline->link_dokumen_lps             = $request->link_dokumen_lps;
        $timeline->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Timeline.';
        $log->feature   = 'Timeline';
        $log->save();

        return redirect()->route('daftar-timeline')->with('success', 'Data berhasil ditambahkan! Tunggu verifikasi dari Head Office dulu!');
    }

    public function edit($id_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $dataProyekByUser = [];
        foreach($proyekUser as $item) {
            $dataProyekByUser[] = ModelProyek::find($item->id_proyek);
        }

        $data = [
            'title'             => 'Data Agenda',
            'subTitle'          => 'Edit Agenda',
            'form'              => 'Edit',
            'daftarProyek'      => $dataProyekByUser,
            'detail'            => Timelines::with('proyek')->find($id_timeline),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Timeline.';
        $log->feature   = 'Timeline';
        $log->save();

        return view('pcp/timeline.form', $data);
    }

    public function prosesEdit(Request $request, $id_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $timeline = Timelines::with('proyek')->find($id_timeline);
        $timeline->tanggal_kontrak_induk        = $request->tanggal_kontrak_induk;
        $timeline->link_kontrak_induk           = $request->link_kontrak_induk;
        $timeline->tanggal_spmk                 = $request->tanggal_spmk;
        $timeline->link_spmk                    = $request->link_spmk;
        $timeline->tanggal_dokumen_rkp          = $request->tanggal_dokumen_rkp;
        $timeline->link_dokumen_rkp             = $request->link_dokumen_rkp;
        $timeline->tanggal_checkpoint_20        = $request->tanggal_checkpoint_20;
        $timeline->link_checkpoint_20           = $request->link_checkpoint_20;
        $timeline->tanggal_checkpoint_50        = $request->tanggal_checkpoint_50;
        $timeline->link_checkpoint_50           = $request->link_checkpoint_50;
        $timeline->tanggal_checkpoint_75        = $request->tanggal_checkpoint_75;
        $timeline->link_checkpoint_75           = $request->link_checkpoint_75;
        $timeline->tanggal_foureyes_principal   = $request->tanggal_foureyes_principal;
        $timeline->link_foureyes_principal      = $request->link_foureyes_principal;
        $timeline->tanggal_dokumen_lps          = $request->tanggal_dokumen_lps;
        $timeline->link_dokumen_lps             = $request->link_dokumen_lps;
        $timeline->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Timeline.';
        $log->feature   = 'Timeline';
        $log->save();

        return redirect()->route('daftar-timeline')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $timeline = Timelines::find($id_timeline);
        $timeline->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }

    public function verifikasi()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $daftarTimeline = Timelines::with('proyek')
            ->where('verifikasi_timeline', 'Belum Disetujui')
            ->limit(400)
            ->get();

        
        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Verifikasi Timeline',
            'daftarTimeline'    => $daftarTimeline,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Verifikasi Timeline.';
        $log->feature   = 'Timeline';
        $log->save();
        
        return view('pcp/timeline.verifikasi', $data);
    }

    public function prosesVerifikasi($id_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $timeline = Timelines::find($id_timeline);
        $timeline->verifikasi_timeline = 'Sudah Disetujui';
        $timeline->id_verifikator = Session()->get('id_user');
        $timeline->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melakukan Verifikasi Timeline.';
        $log->feature   = 'Timeline';
        $log->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }
}
