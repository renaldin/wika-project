<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\ProyekUsers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Proyek extends Controller
{
    private $ModelProyek, $ModelTimProyek, $ModelDetailTimProyek, $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelProyek          = new ModelProyek();
        $this->ModelTimProyek       = new ModelTimProyek();
        $this->ModelDetailTimProyek = new ModelDetailTimProyek();
        $this->ModelUser            = new ModelUser();
        $this->public_path          = 'proyek';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Data Proyek',
            'subTitle'                  => 'Daftar Proyek',
            'daftarProyek'              => ModelProyek::orderBy('id_proyek', 'DESC')->get(),
            'user'                      => ModelUser::find(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Proyek.';
        $log->feature   = 'PROYEK';
        $log->save();

        return view('admin.proyek.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Proyek',
            'subTitle'          => 'Tambah Proyek',
            'daftarTimProyek'   => $this->ModelTimProyek->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Proyek.';
        $log->feature   = 'PROYEK';
        $log->save();

        return view('admin.proyek.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_proyek'       => 'required',
            'tanggal'           => 'required',
            'tipe_konstruksi'   => 'required',
            'prioritas'         => 'required',
            'status'            => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required',
            'deskripsi_proyek'  => 'required',
            'gambar'            => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_proyek.required'      => 'Nama proyek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'latitude.required'         => 'Latitude harus diisi!',
            'longitude.required'        => 'Longitude harus diisi!',
            'deskripsi_proyek.required' => 'Deskripsi harus diisi!',
            'gambar.required'           => 'Gambar Anda harus diisi!',
            'gambar.mimes'              => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $file = Request()->gambar;
        $fileName = date('mdYHis') . ' ' . Request()->nama_proyek . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileName);

        $data = [
            'nama_proyek'       => Request()->nama_proyek,
            'kode_spk'          => Request()->kode_spk,
            'tanggal'           => Request()->tanggal,
            'tipe_konstruksi'   => Request()->tipe_konstruksi,
            'prioritas'         => Request()->prioritas,
            'status'            => Request()->status,
            'id_tim_proyek'     => Request()->id_tim_proyek,
            'latitude'          => Request()->latitude,
            'longitude'         => Request()->longitude,
            'deskripsi_proyek'  => Request()->deskripsi_proyek,
            'gambar'            => $fileName,
        ];

        $this->ModelProyek->tambah($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Proyek.';
        $log->feature   = 'PROYEK';
        $log->save();

        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil ditambahkan!');
    }

    public function edit($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Proyek',
            'subTitle'          => 'Edit Proyek',
            'form'              => 'Edit',
            'user'              => ModelUser::find(Session()->get('id_user')),
            'detail'            => ModelProyek::find($id_proyek)
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Proyek.';
        $log->feature   = 'PROYEK';
        $log->save();

        return view('admin.proyek.form', $data);
    }

    public function prosesEdit($id_proyek)
    {
        Request()->validate([
            'nama_proyek'       => 'required',
            'tanggal'           => 'required',
            'tipe_konstruksi'   => 'required',
            'prioritas'         => 'required',
            'status'            => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required',
            'deskripsi_proyek'  => 'required',
            'gambar'            => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_proyek.required'      => 'Nama proyek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'latitude.required'         => 'Latitude harus diisi!',
            'longitude.required'        => 'Longitude harus diisi!',
            'deskripsi_proyek.required' => 'Deskripsi harus diisi!',
            'gambar.mimes'              => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        if (Request()->gambar <> "") {
            $file = Request()->gambar;
            $fileName = date('mdYHis') . ' ' . Request()->nama_proyek . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $data = [
                'nama_proyek'       => Request()->nama_proyek,
                'kode_spk'          => Request()->kode_spk,
                'tanggal'           => Request()->tanggal,
                'tipe_konstruksi'   => Request()->tipe_konstruksi,
                'prioritas'         => Request()->prioritas,
                'status'            => Request()->status,
                'id_tim_proyek'     => Request()->id_tim_proyek,
                'latitude'          => Request()->latitude,
                'longitude'         => Request()->longitude,
                'deskripsi_proyek'  => Request()->deskripsi_proyek,
                'gambar'            => $fileName,
            ];
            ModelProyek::where('id_proyek', $id_proyek)->update($data);
        } else {
            $data = [
                'nama_proyek'       => Request()->nama_proyek,
                'kode_spk'          => Request()->kode_spk,
                'tanggal'           => Request()->tanggal,
                'tipe_konstruksi'   => Request()->tipe_konstruksi,
                'prioritas'         => Request()->prioritas,
                'status'            => Request()->status,
                'id_tim_proyek'     => Request()->id_tim_proyek,
                'latitude'          => Request()->latitude,
                'longitude'         => Request()->longitude,
                'deskripsi_proyek'  => Request()->deskripsi_proyek,
            ];
            ModelProyek::where('id_proyek', $id_proyek)->update($data);
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Proyek.';
        $log->feature   = 'PROYEK';
        $log->save();

        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil diupdate!');
    }

    public function hapus($id_proyek)
    {
        ModelProyek::where('id_proyek', $id_proyek)->delete();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Proyek.';
        $log->feature   = 'PROYEK';
        $log->save();

        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil dihapus!');
    }

    public function exportExcel()
    {
        $data = $this->ModelProyek->data();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Proyek');
        $sheet->setCellValue('C1', 'Kode SPK');
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Tipe Konstruksi');
        $sheet->setCellValue('F1', 'Prioritas');
        $sheet->setCellValue('G1', 'Status');
        $sheet->setCellValue('H1', 'Latitude');
        $sheet->setCellValue('I1', 'Longitude');

        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item->nama_proyek);
            $sheet->setCellValue('C' . $row, $item->kode_spk);
            $sheet->setCellValue('D' . $row, $item->tanggal);
            $sheet->setCellValue('E' . $row, $item->tipe_konstruksi);
            $sheet->setCellValue('F' . $row, $item->prioritas);
            $sheet->setCellValue('G' . $row, $item->status);
            $sheet->setCellValue('H' . $row, $item->latitude);
            $sheet->setCellValue('I' . $row, $item->longitude);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'daftar-proyek.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
