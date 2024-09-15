<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\TimelineDetails;
use App\Models\TimelineSubDetails;
use Illuminate\Http\Request;

class TimelineSubDetail extends Controller
{

    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_timeline';
    }

    public function index($id_timeline_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Sub Detail Timeline',
            'detail'            => TimelineDetails::with('dokumen', 'timeline')->find($id_timeline_detail),
            'daftar'            => TimelineSubDetails::with('timelineDetail')->where('id_timeline_detail', $id_timeline_detail)->get(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp/timelineSubDetail.index', $data);
    }

    public function tambah($id_timeline_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Tambah Sub Detail Timeline',
            'form'              => 'Tambah',
            'timelineDetail'    => TimelineDetails::with('dokumen', 'timeline')->find($id_timeline_detail),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp/timelineSubDetail.form', $data);
    }

    public function prosesTambah(Request $request, $id_timeline_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $timelineDetail = new TimelineSubDetails();
        $timelineDetail->id_timeline_detail = $id_timeline_detail;
        $timelineDetail->nama_dokumen       = $request->nama_dokumen;
        $timelineDetail->tanggal_timeline   = $request->tanggal_timeline;

        if ($request->file_dokumen <> "") {

            $file = $request->file_dokumen;
            $fileName = date('mdYHis') .' '. $request->nama_dokumen . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $timelineDetail->file_dokumen = $fileName;
        }

        $timelineDetail->save();

        return redirect("/sub-detail-timeline/$id_timeline_detail")->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_timeline_detail, $id_timeline_sub_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Edit Sub Detail Timeline',
            'form'              => 'Edit',
            'timelineDetail'    => TimelineDetails::with('dokumen', 'timeline')->find($id_timeline_detail),
            'detail'            => TimelineSubDetails::with('timelineDetail')->find($id_timeline_sub_detail),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp/timelineSubDetail.form', $data);
    }

    public function prosesEdit(Request $request, $id_timeline_detail, $id_timeline_sub_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $timelineDetail = TimelineSubDetails::find($id_timeline_sub_detail);
        $timelineDetail->nama_dokumen       = $request->nama_dokumen;
        $timelineDetail->tanggal_timeline   = $request->tanggal_timeline;

        if ($request->file_dokumen <> "") {
            if ($timelineDetail->file_dokumen <> "") {
                unlink(public_path($this->public_path) . '/' . $timelineDetail->file_dokumen);
            }

            $file = $request->file_dokumen;
            $fileName = date('mdYHis') .' '. $request->nama_dokumen . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $timelineDetail->file_dokumen = $fileName;
        }

        $timelineDetail->save();

        return redirect("/sub-detail-timeline/$id_timeline_detail")->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_timeline_sub_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $timelineSubDetail = TimelineSubDetails::find($id_timeline_sub_detail);
        
        if ($timelineSubDetail->file_dokumen <> "") {
            unlink(public_path($this->public_path) . '/' . $timelineSubDetail->file_dokumen);
        }

        $timelineSubDetail->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }

    public function downloadFile($id_timeline_sub_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = TimelineSubDetails::find($id_timeline_sub_detail);

        $fileName = $data->file_dokumen;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
