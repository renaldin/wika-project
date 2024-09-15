<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\TimelineDetails;
use Illuminate\Http\Request;

class TimelineDetail extends Controller
{

    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'file_timeline';
    }

    public function edit($id_timeline_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Timeline',
            'subTitle'          => 'Edit Detail Timeline',
            'form'              => 'Edit',
            'detail'            => TimelineDetails::with('dokumen', 'timeline')->find($id_timeline_detail),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp/timelineDetail.form', $data);
    }

    public function prosesEdit(Request $request, $id_timeline_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $timelineDetail = TimelineDetails::find($id_timeline_detail);
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

        return redirect("/edit-timeline/$timelineDetail->id_timeline")->with('success', 'Data berhasil diedit!');
    }

    public function downloadFile($id_timeline_detail)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = TimelineDetails::find($id_timeline_detail);

        $fileName = $data->file_dokumen;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }

}
