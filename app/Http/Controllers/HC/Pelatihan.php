<?php

namespace App\Http\Controllers\HC;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\Pelatihans;
use App\Models\ModelProyek;
use App\Models\PicPelatihans;
use Illuminate\Http\Request;

class Pelatihan extends Controller
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
    
        $daftarPelatihan = Pelatihans::with(['personilPelatihan' => function ($query) {
            $query->select('id_pelatihan', 'id_pic');
        }])
        ->where('status_task', 'Kegiatan')
        ->orderBy('created_at', 'DESC')
        ->limit(200)
        ->get();
    
        $daftarPelatihan->transform(function ($pelatihan) {
            $pelatihan->personilNames = $pelatihan->personilPelatihan->map(function ($personil) {
                $user = $personil->user; // Ambil user terkait dengan id_pic
                return $user ? $user->nama_user : 'No name available';
            });
            return $pelatihan;
        });
    
        $data = [
            'title'             => 'Data Pelatihan',
            'subTitle'          => 'Daftar Pelatihan',
            'daftarPelatihan'   => $daftarPelatihan,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Pelatihan.';
        $log->feature   = 'Pelatihan';
        $log->save();
    
        return view('HC/pelatihan.index', $data);
    }
    
    

    public function detail($id_pelatihan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Pelatihan',
            'subTitle'          => 'Detail Pelatihan',
            'form'              => 'Detail',
            'daftarProyek'      => ModelProyek::get(),
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen', 'Tim Proyek'])->get(),
            'detail'            => Pelatihans::with('createdBy', 'proyek')->find($id_pelatihan),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Pelatihan.';
        $log->feature   = 'Agenda';
        $log->save();

        return view('HC/pelatihan.form', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Pelatihan',
            'subTitle'          => 'Tambah Pelatihan',
            'form'              => 'Tambah',
            'daftarProyek'      => ModelProyek::get(),
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen', 'Tim Proyek'])->get(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Pelatihan.';
        $log->feature   = 'Pelatihan';
        $log->save();

        return view('HC/pelatihan.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        // Validasi jika user tidak login
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Validasi data
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'status_pelatihan' => 'required|string|max:255',
     
        ]);
    
        // Simpan data pelatihan
        $pelatihan = new Pelatihans();
        $pelatihan->nama_kegiatan = $request->nama_kegiatan;
        $pelatihan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $pelatihan->catatan_pelatihan = $request->catatan_pelatihan;
        $pelatihan->status_pelatihan = $request->status_pelatihan;
        $pelatihan->link = $request->link;
    
        if ($request->id_proyek) {
            $pelatihan->id_proyek = $request->id_proyek;
        }
    
        $pelatihan->status_task = 'Kegiatan';
        $pelatihan->created_by = Session()->get('id_user');
        $pelatihan->save();
    
        // Dapatkan ID pelatihan yang baru saja disimpan
        $pelatihanLast = $pelatihan;
    
       
        foreach ($request->id_pic as $item) {
            $pic = new PicPelatihans();
            $pic->id_pelatihan = $pelatihanLast->id;
            $pic->id_pic    = $item;
            $pic->save();
        }
        // Simpan log aktivitas
        $log = new ModelLog();
        $log->id_user = Session()->get('id_user');
        $log->activity = 'Menambah Data Pelatihan.';
        $log->feature = 'Pelatihan';
        $log->save();
    
        return redirect()->route('daftar-pelatihan')->with('success', 'Data berhasil ditambahkan!');
    }
    

    public function edit($id_pelatihan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        $pelatihan = Pelatihans::with('createdBy', 'proyek')->find($id_pelatihan);
        $relatedPic = $pelatihan->picPelatihans; // Ambil PIC yang terkait dengan pelatihan
    
        $data = [
            'title'             => 'Data Agenda',
            'subTitle'          => 'Edit Agenda',
            'form'              => 'Edit',
            'daftarProyek'      => ModelProyek::get(),
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen'])->get(),
            'detail'            => $pelatihan,
            'relatedPic'        => $relatedPic, // Kirim variabel $relatedPic ke view
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        $log = new ModelLog();
        $log->id_user = Session()->get('id_user');
        $log->activity = 'Melihat Halaman Form Edit Pelatihan.';
        $log->feature = 'Pelatihan';
        $log->save();
    
        return view('HC/pelatihan.form', $data);
    }
    

    public function prosesEdit(Request $request, $id_pelatihan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $pelatihan = Pelatihans::with('createdBy')->find($id_pelatihan);
        $pelatihan->nama_kegiatan      = $request->nama_kegiatan;
        $pelatihan->tanggal_kegiatan   = $request->tanggal_kegiatan;
        $pelatihan->catatan_pelatihan     = $request->catatan_pelatihan;
        $pelatihan->status_pelatihan      = $request->status_pelatihan;
        $pelatihan->link               = $request->link;
        $pelatihan->status_task        = 'Kegiatan';
        if ($request->id_proyek) {
            $pelatihan->id_proyek      = $request->id_proyek;
        }
        $pelatihan->created_by         = Session()->get('id_user') ;
        $pelatihan->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Pelatihan.';
        $log->feature   = 'Pelatihan';
        $log->save();

        return redirect()->route('daftar-pelatihan')->with('success', 'Data berhasil diedit!');
    }
    public function lihatPersonil($id_pelatihan)
{
    // Mendapatkan daftar PIC yang terkait dengan pelatihan ini
    $relatedPic = ModelUser::whereHas('pelatihan', function ($query) use ($id_pelatihan) {
        $query->where('id', $id_pelatihan);
    })->get();

    // Mengembalikan data dalam format JSON agar dapat digunakan di JavaScript di View
    return response()->json($relatedPic);
}


    public function prosesHapus($id_pelatihan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $pelatihan = Pelatihans::find($id_pelatihan);
        $pelatihan->delete();

       
        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Pelatihan.';
        $log->feature   = 'Pelatihan';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }

  

    public function getPelatihan()
    {
        $pelatihan = Pelatihans::with('proyek')
            ->get();
        return response()->json($pelatihan);
    }

    public function getPelatihanProyek($id_proyek)
    {
        $idProyek = $id_proyek;
        $pelatihan = Pelatihans::with('proyek')
            ->whereHas('proyek', function ($query) use ($idProyek) {
                $query->where('id_proyek', $idProyek);
            })
            ->get();
        return response()->json($pelatihan);
    }

    public function kalenderPelatihan()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
      
        $daftarPelatihan = Pelatihans::with('createdBy', 'proyek')
            ->orderBy('tanggal_kegiatan', 'ASC')
            ->limit(200)
            ->get();
      
          
        $proyekPelatihan = Pelatihans::with('createdBy', 'proyek')
            ->select('id_proyek')
            ->distinct()
            ->limit(200)
            ->get();
    
        $idProyek = [];
        foreach ($proyekPelatihan as $item) {
            if ($item->id_proyek != null) {
                $idProyek[] = $item->id_proyek;
            }
        }
    
        $data = [
            'title' => 'Kalender Pelatihan',
            'subTitle' => 'Kalender Pelatihan',
            'daftarProyek' => ModelProyek::whereIn('id_proyek', $idProyek)->get(),
            'daftarPelatihan' => $daftarPelatihan,
            'user' => $this->ModelUser->detail(Session()->get('id_user')),
        ];
    
        return view('hc/pelatihan.kalender', $data);
    }

}
