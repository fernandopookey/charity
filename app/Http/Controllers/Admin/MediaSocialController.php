<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MediaSocialController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Media Sosial',
            'mediaSocials'  => MediaSocial::all(),
            'content'       => 'admin/media-social/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create Media Social',
            'content'   => 'admin/media-social/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required',
            'link'      => 'required',
            'icon'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('icon')) {
            if ($request->icon != null) {
                $realLocation = "storage/" . $request->icon;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }
            $icon = $request->file('icon');
            $file_name = time() . '-' . $icon->getClientOriginalName();

            $data['icon'] = $request->file('icon')->store('assets/media-socials', 'public');
        } else {
            $data['icon'] = $request->icon;
        }

        MediaSocial::create($data);
        Alert::success('Success!', 'Social Media Created Successfully');
        return redirect()->route('media-socials.index');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'title'         => 'Edit Social Media',
            'mediaSocials'  => MediaSocial::find($id),
            'content'       => 'admin/media-social/edit'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = MediaSocial::find($id);
        $data = $request->validate([
            'title'     => 'nullable',
            'link'      => 'nullable',
            'icon'     => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        if ($request->hasFile('icon')) {

            if ($item->icon != null) {
                $realLocation = "storage/" . $item->icon;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $image = $request->file('image');
            $file_name = time() . '-' . $image->getClientOriginalName();

            $data['icon'] = $request->file('icon')->store('assets/media-social', 'public');
        } else {
            $data['icon'] = $item->icon;
        }

        $item->update($data);
        Alert::success('Success!', 'Media Social Updated Successfully');
        return redirect()->route('media-socials.index');
    }

    public function destroy($id)
    {
        $mediaSocial = MediaSocial::find($id);
        try {
            if ($mediaSocial->icon != null) {
                $realLocation = "storage/" . $mediaSocial->icon;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            Storage::delete($mediaSocial->icon);
            $mediaSocial->delete();
            Alert::success('Success!', 'Media Social Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Media Social Deleted Failed');
            return redirect()->back();
        }
    }
}