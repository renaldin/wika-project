<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\DokumenTimelines;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\Timelines;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\TimelineDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Timeline extends Controller
{

    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_timeline';
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
        
        return view('pcp/timeline.index', $data);
    }

    public function detail($id_timeline)
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
            'subTitle'          => 'Detail Timeline',
            'form'              => 'Detail',
            'daftarProyek'      => $dataProyekByUser,
            'timelineDetail'    => TimelineDetails::with(['dokumen', 'timeline'])
                                    ->withCount(['timelineSubDetail' => function ($query) use ($id_timeline) {
                                        $query->where('id_timeline', $id_timeline);
                                    }])
                                    ->where('id_timeline', $id_timeline)
                                    ->get(),
            'timeline'          => Timelines::with('proyek')->find($id_timeline),
            'detail'            => Timelines::with('proyek')->find($id_timeline),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        return view('pcp/timeline.edit', $data);
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
            'dokumenTimeline'   => DokumenTimelines::get(),
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('pcp/timeline.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $timeline = new Timelines();
            $timeline->id_proyek                    = $request->id_proyek;
            $timeline->verifikasi_timeline          = 'Belum Disetujui';
            $timeline->save();

            $timelineLast = Timelines::latest()->first();
            
            $dokumenTimeline = DokumenTimelines::get();
            $no = 1;
            foreach($dokumenTimeline as $item) {
                $timlineDetail = new TimelineDetails();
                $timlineDetail->id_timeline = $timelineLast->id;
                $timlineDetail->id_dokumen_timeline = $item->id;
                // $timlineDetail->nama_dokumen = $request->input('nama_dokumen' . $no);
                // $timlineDetail->tanggal_timeline = $request->input('tanggal_timeline' . $no);

                // $file = $request->file('file_dokumen' . $no);
                // if($file) {
                //     $fileName = date('mdYHis') .' ' . $request->input('nama_dokumen' . $no) . '.' . $file->getClientOriginalExtension();
                //     $file->move(public_path($this->public_path), $fileName);
                //     $timlineDetail->file_dokumen = $fileName;
                // }

                $timlineDetail->save();
                $no++;
            }
            
            DB::commit();
            return redirect()->route('daftar-timeline')->with('success', 'Data berhasil ditambahkan! Tunggu verifikasi dari Head Office dulu!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi kesalahan sistem!');
        }
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
            'title'             => 'Data Timeline',
            'subTitle'          => 'Edit Timeline',
            'form'              => 'Edit',
            'daftarProyek'      => $dataProyekByUser,
            'timelineDetail'    => TimelineDetails::with(['dokumen', 'timeline'])
                                    ->withCount(['timelineSubDetail' => function ($query) use ($id_timeline) {
                                        $query->where('id_timeline', $id_timeline);
                                    }])
                                    ->where('id_timeline', $id_timeline)
                                    ->get(),
            'detail'            => Timelines::with('proyek')->find($id_timeline),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp/timeline.edit', $data);
    }

    // public function prosesEdit(Request $request, $id_timeline)
    // {
    //     if (!Session()->get('role')) {
    //         return redirect()->route('login');
    //     }

    //     $timeline = Timelines::with('proyek')->find($id_timeline);
    //     $timeline->tanggal_kontrak_induk        = $request->tanggal_kontrak_induk;
    //     $timeline->link_kontrak_induk           = $request->link_kontrak_induk;
    //     $timeline->tanggal_spmk                 = $request->tanggal_spmk;
    //     $timeline->link_spmk                    = $request->link_spmk;
    //     $timeline->tanggal_dokumen_rkp          = $request->tanggal_dokumen_rkp;
    //     $timeline->link_dokumen_rkp             = $request->link_dokumen_rkp;
    //     $timeline->tanggal_checkpoint_20        = $request->tanggal_checkpoint_20;
    //     $timeline->link_checkpoint_20           = $request->link_checkpoint_20;
    //     $timeline->tanggal_checkpoint_50        = $request->tanggal_checkpoint_50;
    //     $timeline->link_checkpoint_50           = $request->link_checkpoint_50;
    //     $timeline->tanggal_checkpoint_75        = $request->tanggal_checkpoint_75;
    //     $timeline->link_checkpoint_75           = $request->link_checkpoint_75;
    //     $timeline->tanggal_foureyes_principal   = $request->tanggal_foureyes_principal;
    //     $timeline->link_foureyes_principal      = $request->link_foureyes_principal;
    //     $timeline->tanggal_dokumen_lps          = $request->tanggal_dokumen_lps;
    //     $timeline->link_dokumen_lps             = $request->link_dokumen_lps;
    //     $timeline->save();

    //     $log            = new ModelLog();
    //     $log->id_user   = Session()->get('id_user');
    //     $log->activity  = 'Mengedit Data Timeline.';
    //     $log->feature   = 'Timeline';
    //     $log->save();

    //     return redirect()->route('daftar-timeline')->with('success', 'Data berhasil diedit!');
    // }

    public function prosesHapus($id_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $timeline = Timelines::find($id_timeline);
        $timeline->delete();

        $timelineDetail = TimelineDetails::where('id_timeline', $id_timeline)->get();
        foreach($timelineDetail as $item) {
            if ($item->file_dokumen <> "") {
                unlink(public_path($this->public_path) . '/' . $item->file_dokumen);
            }
            $item->delete();
        }

        return back()->with('success', 'Data berhasil dihapus !');
    }

    public function verifikasi()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $daftarTimeline = Timelines::with('proyek')
            ->limit(400)
            ->get();

        
        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Verifikasi Timeline',
            'daftarTimeline'    => $daftarTimeline,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
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
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesVerifikasiDetail($id_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $timeline = TimelineDetails::find($id_timeline);
        $timeline->status = 1;
        $timeline->id_verifikator = Session()->get('id_user');
        $timeline->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $timeline = TimelineDetails::find($id_timeline);
        $timeline->status = 0;
        $timeline->id_verifikator = Session()->get('id_user');
        $timeline->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }
}
