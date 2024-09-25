<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelTask;
use App\Models\ModelLog;
use Illuminate\Http\Request;

class Task extends Controller
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

        if (Session()->get('role') == 'Manajemen' || Session()->get('role') == 'Coordinator') {
            $daftarTask = ModelTask::with('personil', 'manajemen')
                ->whereYear('created_at', date('Y', strtotime($month)))
                ->whereMonth('created_at', '=', date('m', strtotime($month)))
                ->orderBy('created_at', 'DESC')
                ->limit(300)
                ->get();
        } else {
            $daftarTask = ModelTask::with('personil', 'manajemen')
                ->where('id_personil', Session()->get('id_user'))
                ->whereYear('created_at', date('Y', strtotime($month)))
                ->whereMonth('created_at', '=', date('m', strtotime($month)))
                ->orderBy('created_at', 'DESC')
                ->limit(200)
                ->get();
        }
        
        $data = [
            'title'             => 'Data Task',
            'subTitle'          => 'Task',
            'filterMonth'       => $month,
            'daftarTask'        => $daftarTask,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Task.';
        $log->feature   = 'Manajemen TASK';
        $log->save();
        
        return view('task.index', $data);
    }

    public function detail($id_task)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Task',
            'subTitle'          => 'Detail Task',
            'form'              => 'Detail',
            'detail'            => ModelTask::with('personil', 'manajemen')->find($id_task),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Task.';
        $log->feature   = 'Manajemen TASK';
        $log->save();

        return view('task.form', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Task',
            'subTitle'          => 'Tambah Task',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Task.';
        $log->feature   = 'Manajemen TASK';
        $log->save();

        return view('task.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $validateData = $request->validate([
            'item_task'     => 'required',
            'timeline'      => 'required',
            'status'        => 'required',
            'file'          => 'mimes:pdf|max:2048'
        ], [
            'item_task.required'    => 'Item task harus diisi!',
            'timeline.required'     => 'Timeline harus diisi!',
            'status.required'       => 'Status harus diisi!',
            'file.mimes'            => 'Format file harus pdf!',
            'file.max'              => 'Ukuran file maksimal 2 mb',
        ]);

        $task = new ModelTask();
        $task->item_task    = $validateData['item_task'];
        $task->timeline     = $validateData['timeline'];
        $task->status       = $validateData['status'];
        $task->id_personil  = Session()->get('id_user');

        if (array_key_exists('file', $validateData) && $validateData['file'] <> "") {
            $file = $validateData['file'];
            $fileName = date('mdYHis') . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $task->file = $fileName;
        }

        $task->save();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Task.';
        $log->feature   = 'Manajemen TASK';
        $log->save();

        return redirect()->route('daftar-task')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_task)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if (Session()->get('role') == 'Manajemen' || Session()->get('role') == 'Coordinator') {
            $subTitle = 'Komentar Task';
        } else {
            $subTitle = 'Edit Task';
        }

        $data = [
            'title'             => 'Data Task',
            'subTitle'          => $subTitle,
            'form'              => 'Edit',
            'detail'            => ModelTask::with('personil', 'manajemen')->find($id_task),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Task.';
        $log->feature   = 'Manajemen TASK';
        $log->save();

        return view('task.form', $data);
    }

    public function prosesEdit(Request $request, $id_task)
    {
    if (!Session()->get('role')) {
        return redirect()->route('login');
    }

    $task = ModelTask::with('personil', 'manajemen')->find($id_task);

    // Tambahkan pengecekan kondisi "if" terlebih dahulu sebelum "elseif"
    if (Session()->get('role') == 'Head Office') {
        $validateData = $request->validate([
            'item_task'     => 'required',
            'timeline'      => 'required',
            'status'        => 'required',
            'file'          => 'mimes:pdf|max:2048'
        ], [
            'item_task.required'    => 'Item task harus diisi!',
            'timeline.required'     => 'Timeline harus diisi!',
            'status.required'       => 'Status harus diisi!',
            'file.mimes'            => 'Format file harus pdf!',
            'file.max'              => 'Ukuran file maksimal 2 mb',
        ]);

        $task->item_task    = $validateData['item_task'];
        $task->timeline     = $validateData['timeline'];
        $task->status       = $validateData['status'];
        $task->id_personil  = Session()->get('id_user');
        
        if ($request->hasFile('file')) {
            if ($task->file <> "") {
                unlink(public_path($this->public_path) . '/' . $task->file);
            }

            $file = $validateData['file'];
            $fileName = date('mdYHis') . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $task->file = $fileName;
        }
    } elseif (Session()->get('role') == 'Manajemen' || Session()->get('role') == 'Head Office' && Session()->get('jabatan') == 'Coordinator') {
        $validateData = $request->validate([
            'item_task'     => 'required',
            'timeline'      => 'required',
            'status'        => 'required',
            'file'          => 'mimes:pdf|max:2048'
        ], [
            'item_task.required'    => 'Item task harus diisi!',
            'timeline.required'     => 'Timeline harus diisi!',
            'status.required'       => 'Status harus diisi!',
            'file.mimes'            => 'Format file harus pdf!',
            'file.max'              => 'Ukuran file maksimal 2 mb',
        ]);

        $task->item_task    = $validateData['item_task'];
        $task->timeline     = $validateData['timeline'];
        $task->status       = $validateData['status'];
        $task->id_personil  = Session()->get('id_user');
        
        if ($request->hasFile('file')) {
            if ($task->file <> "") {
                unlink(public_path($this->public_path) . '/' . $task->file);
            }

            $file = $validateData['file'];
            $fileName = date('mdYHis') . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $task->file = $fileName;
        }
    } elseif (Session()->get('role') == 'Manajemen') {
        $validateData = $request->validate([
            'komentar'             => 'required'
        ], [
            'komentar.required'    => 'Komentar harus diisi!'
        ]);

        $task->komentar = $validateData['komentar'];
        $task->id_manajemen = Session()->get('id_user');
    }

    $task->save();

    $log            = new ModelLog();
    $log->id_user   = Session()->get('id_user');
    $log->activity  = 'Mengedit Data Task.';
    $log->feature   = 'Manajemen TASK';
    $log->save();

    return redirect()->route('daftar-task')->with('success', 'Data berhasil diedit!');
}

    public function prosesHapus($id_task)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $task = ModelTask::find($id_task);

        if (!$task) {
            return back()->with('fail', 'Data tidak ada!');
        }

        if ($task->file <> "") {
            unlink(public_path($this->public_path) . '/' . $task->file);
        }

        $task->delete();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Task.';
        $log->feature   = 'Manajemen TASK';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
