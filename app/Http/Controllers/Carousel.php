<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelCarousel;
use App\Models\ModelLog;

class Carousel extends Controller
{

    private $ModelUser, $public_path, $ModelCarousel;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelCarousel = new ModelCarousel();
        $this->public_path = 'carousel';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Carousel',
            'daftarCarousel'       => $this->ModelCarousel->data('All'),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Carousel.';
        $log->feature   = 'CAROUSEL';
        $log->save();

        return view('admin.carousel.index', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'item' => 'required|mimes:jpeg,png,jpg,mp4,mov,avi|max:4096'
        ], [
            'item.required'       => 'Carousel Anda harus diisi!',
            'item.mimes'          => 'Format Carousel harus jpg/jpeg/png/mp4/mov!',
            'item.max'             => 'Ukuran File maksimal 4 mb',
        ]);

        $item = Request()->item;
        $itemName = date('mdYHis') . '.' . $item->extension();
        $item->move(public_path($this->public_path), $itemName);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'item'        => $itemName,
            'is_active'     => $isActive,
            'tanggal_input' => date('Y-m-d H:i:s'),
            'id_user'       => Session()->get('id_user')
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Carousel.';
        $log->feature   = 'CAROUSEL';
        $log->save();

        $this->ModelCarousel->tambah($data);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_carousel)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'item' => 'required|mimes:jpeg,png,jpg,mp4,mov,avi|max:4096'
        ], [
            'item.mimes'          => 'Format Carousel harus jpg/jpeg/png/mp4/mov!',
            'item.max'             => 'Ukuran File maksimal 4 mb',
        ]);

        $detail = $this->ModelCarousel->detail($id_carousel);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'id_carousel'      => $id_carousel,
            'is_active'     => $isActive,
            'id_user'       => Session()->get('id_user')
        ];

        if (Request()->item <> "") {
            if ($detail->item <> "") {
                unlink(public_path($this->public_path) . '/' . $detail->item);
            }

            $item = Request()->item;
            $itemName = date('mdYHis') . '.' . $item->extension();
            $item->move(public_path($this->public_path), $itemName);

            $data['item'] = $itemName;
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Carousel.';
        $log->feature   = 'CAROUSEL';
        $log->save();

        $this->ModelCarousel->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_carousel)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detail = $this->ModelCarousel->detail($id_carousel);

        if ($detail->item <> "") {
            unlink(public_path($this->public_path) . '/' . $detail->item);
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Carousel.';
        $log->feature   = 'CAROUSEL';
        $log->save();

        $this->ModelCarousel->hapus($id_carousel);
        return back()->with('success', 'Data berhasil dihapus !');
    }
}
