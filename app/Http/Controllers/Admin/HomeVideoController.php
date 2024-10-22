<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HomeVideoController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Home Video',
            'homeVideo'     => HomeVideo::first(),
            'content'       => 'admin/home-video/index',
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = HomeVideo::find($id);
        $data = $request->validate([
            'title'         => 'nullable',
            'description'   => 'nullable',
            'video'         => 'nullable|mimes:webp,mp4,mov,avi|max:1500',
        ]);

        if ($request->hasFile('video')) {
            if ($item->video) {
                Storage::delete($item->video);
            }

            $videoPath = $request->file('video')->store('home-video', 'public');
            $data['video'] = $videoPath;
        }

        $item->update($data);
        Alert::success('Success!', 'Home Video Updated Successfully');
        return redirect()->route('home-video.index');
    }
}
