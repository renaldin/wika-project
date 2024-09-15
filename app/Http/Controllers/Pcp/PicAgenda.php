<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\Agendas;
use App\Models\ModelUser;
use App\Models\PicAgendas;
use App\Models\PicMonthlyReportPcps;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PicAgenda extends Controller
{

    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index($id_agenda)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $data = [
            'title'                         => 'Data Agenda',
            'subTitle'                      => 'Daftar PIC',
            'agenda'                        => Agendas::find($id_agenda),
            'daftarPic'                     => PicAgendas::with('pic')->where('id_agenda', $id_agenda)->get(),
            'id_agenda'                     => $id_agenda,
            'user'                          => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp.picAgenda.index', $data);
    }

    public function tambah($id_agenda)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Agenda',
            'subTitle'          => 'Tambah Pic Agenda',
            'form'              => 'Tambah',
            'id_agenda'         => $id_agenda,
            'agenda'            => Agendas::find($id_agenda),
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen'])->get(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('pcp.picAgenda.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            
            foreach ($request->id_pic as $item) {
                $pic = new PicAgendas();
                $pic->id_agenda         = $request->id_agenda;
                $pic->id_pic            = $item;
                $pic->save();
            }
    
            DB::commit();
            return redirect("/pic-agenda/$request->id_agenda")->with('success', 'Data berhasil ditambahkan!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi Kesalagan Sistem!');
        }
    }

    public function prosesHapus($id_pic_agenda)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $pic = PicAgendas::find($id_pic_agenda);
        $pic->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
