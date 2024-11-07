<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\FooterContent;
use App\Models\Gallery;
use App\Models\MediaSocial;
use App\Models\NavbarContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function index()
    {
        // $images = Gallery::where('image', 'LIKE', '%.jpg')
        //     ->orWhere('image', 'LIKE', '%.png')
        //     ->orWhere('image', 'LIKE', '%.jpeg')->get();

        // $videos = Gallery::where('image', 'LIKE', '%.mp4')
        //     ->orWhere('image', 'LIKE', '%.avi')
        //     ->orWhere('image', 'LIKE', '%.mov')->get();
        // // dd($videos);

        // $data = [
        //     'title'     => 'Gallery',
        //     // 'galleries' => Gallery::all(),
        //     'content'   => 'admin/gallery/index'
        // ];

        // return view('admin.layout.wrapper', $data);

        $data = [
            'title'     => 'Gallery',
            'galleries' => Gallery::all(),
            'content'   => 'admin/gallery/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Upload Image',
            'content'   => 'admin/gallery/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required',
            'image'        => 'required|mimes:jpeg,png,jpg,mp4,mov,avi|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($request->image != null) {
                $realLocation = "storage/" . $request->image;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }
            $image = $request->file('image');
            $file_name = time() . '-' . $image->getClientOriginalName();

            $data['image'] = $request->file('image')->store('assets/gallery', 'public');
        } else {
            $data['image'] = $request->image;
        }

        Gallery::create($data);
        Alert::success('Success!', 'Image Upload Successfully');
        return redirect()->route('gallery.index');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'title'     => 'Edit Image',
            'galleries' => Gallery::find($id),
            'content'   => 'admin/gallery/edit'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Gallery::find($id);
        $data = $request->validate([
            'title'     => 'nullable',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        if ($request->hasFile('image')) {

            if ($item->image != null) {
                $realLocation = "storage/" . $item->image;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $image = $request->file('image');
            $file_name = time() . '-' . $image->getClientOriginalName();

            $data['image'] = $request->file('image')->store('assets/gallery', 'public');
        } else {
            $data['image'] = $item->image;
        }

        $item->update($data);
        Alert::success('Success!', 'Image Updated Successfully');
        return redirect()->route('gallery.index');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        try {
            if ($gallery->image != null) {
                $realLocation = "storage/" . $gallery->image;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            Storage::delete($gallery->image);
            $gallery->delete();
            Alert::success('Success!', 'Image Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Image Deleted Failed');
            return redirect()->back();
        }
    }

    public function userGallery()
    {
        // dd(Gallery::all());
        $data = [
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'galleries'     => Gallery::all(),
            'about'         => About::first(),
            'content'       => 'user/gallery/index'
        ];

        return view('user.layouts.wrapper', $data);
    }
}
