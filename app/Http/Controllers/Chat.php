<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelChat;
use App\Models\ModelDetailChat;
use App\Models\ModelLog;
use Illuminate\Http\Request;

class Chat extends Controller
{

    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->public_path = 'chat';
        $this->ModelUser = new ModelUser();
        date_default_timezone_set('Asia/Jakarta');
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

        
        $daftarChat = ModelChat::with('userSatu', 'userDua')
            ->orWhere('id_user_satu', Session()->get('id_user'))
            ->orWhere('id_user_dua', Session()->get('id_user'))
            ->whereYear('updated_at', date('Y', strtotime($month)))
            ->whereMonth('updated_at', '=', date('m', strtotime($month)))
            ->orderBy('updated_at', 'DESC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Chat',
            'subTitle'          => 'Chat',
            'filterMonth'       => $month,
            'daftarChat'        => $daftarChat,
            'daftarUser'        => ModelUser::all(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Chat.';
        $log->feature   = 'CHAT';
        $log->save();
        
        return view('chat.index', $data);
    }

    public function detail($id_chat)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(Request()->filterDate) {
            $date = Request()->filterDate;
        } else {
            $date = date('Y-m-d');
        }

        if (Request()->filterMonth) {
            $month = Request()->filterMonth;
            $detailChat = ModelDetailChat::with('chat', 'user')
                ->whereYear('created_at', date('Y', strtotime($month)))
                ->whereMonth('created_at', '=', date('m', strtotime($month)))
                ->orderBy('created_at', 'ASC')
                ->where('id_chat', $id_chat)
                ->get();
        } else {
            $month = date('Y-m', strtotime($date));
            $detailChat = ModelDetailChat::with('chat', 'user')
                ->whereDate('created_at', $date)
                ->orderBy('created_at', 'ASC')
                ->where('id_chat', $id_chat)
                ->get();
        }

        $data = [
            'title'             => 'Data Chat',
            'subTitle'          => 'Chat',
            'filterMonth'       => $month,
            'filterDate'        => $date,
            'detailChat'        => $detailChat,
            'chat'              => ModelChat::with('userSatu', 'userDua')->find($id_chat),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail chat.';
        $log->feature   = 'CHAT';
        $log->save();

        return view('chat.detail', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $chat = new ModelChat();
        $chat->id_user_satu = Session()->get('id_user');
        $chat->id_user_dua  = $request->id_user_dua;
        $chat->save();

        $userDua = ModelUser::find($request->id_user_dua);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = "Menambah Chat ke $userDua->nama_user";
        $log->feature   = 'CHAT';
        $log->save();

        return redirect()->route('daftar-chat')->with('success', 'Chat Berhasil Ditambahkan!');
    }

    public function prosesTambahDetailChat(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailChat = new ModelDetailChat();
        $detailChat->id_user = Session()->get('id_user');
        $detailChat->id_chat  = $request->id_chat;
        $detailChat->message  = $request->message;
        $detailChat->save();

        $chat = ModelChat::find($request->id_chat);
        $chat->updated_at = date('Y-m-d H:i:s');
        $chat->save();

        return redirect('/detail-chat/'.$request->id_chat)->with('success', 'Chat Berhasil Ditambahkan!');
    }

    public function prosesHapus($id_chat)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $chat = ModelChat::with('userSatu', 'userDua')->find($id_chat);
        $detailChat = ModelDetailChat::where('id_chat', $id_chat)->get();

        if (!$detailChat->isEmpty()) {
            $detailChat->each->delete();
        }
        if ($chat) {
            $chat->delete();
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = "Menghapus Data Chat ke " . $chat->userDua->nama_user . ".";
        $log->feature   = 'CHAT';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
