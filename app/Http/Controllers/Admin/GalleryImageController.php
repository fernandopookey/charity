<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    public function index($id)
    {
        $data = [
            'title'         => 'Gallery Image & Video Upload',
            'galleries'     => Gallery::find($id),
            'galleryImages'   => GalleryImage::where('gallery_id', $id)
                ->where(function ($query) {
                    $query->where('image', 'like', '%.jpg')
                        ->orWhere('image', 'like', '%.jpeg')
                        ->orWhere('image', 'like', '%.png');
                })
                ->get(),
            'galleryVideos'  => GalleryImage::where('gallery_id', $id)
                ->where('image', 'like', '%.mp4')
                ->get(),
            'content'       => 'admin/gallery/image-upload',
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(Request $request, $id)
    {
        try {
            $request->validate([
                'image.*' => 'required|mimes:png,jpg,jpeg,webp,mp4,mov,avi'
            ]);
            // dd($request);

            $gallery = Gallery::findOrFail($id);

            $imageData = [];

            // if ($files = $request->file('image')) {
            //     foreach ($files as $key => $file) {

            //         $extension = $file->getClientOriginalExtension();
            //         $fileName = $key . '-' . time() . '.' . $extension;

            //         $path = "uploads/gallery/";

            //         $file->move($path, $fileName);

            //         $imageData[] = [
            //             'gallery_id'  => $gallery->id,
            //             'image'     => $path . $fileName
            //         ];
            //     }
            // }

            // if ($request->hasFile('image')) {
            //     if ($request->image != null) {
            //         $realLocation = "storage/" . $request->icon;
            //         if (file_exists($realLocation) && !is_dir($realLocation)) {
            //             unlink($realLocation);
            //         }
            //     }
            //     $image = $request->file('image');
            //     $file_name = time() . '-' . $image->getClientOriginalName();

            //     $data['image'] = $request->file('image')->store('assets/gallery', 'public');
            // } else {
            //     $data['image'] = $request->icon;
            // }

            if ($request->hasFile('image')) {
                if ($request->icon != null) {
                    $realLocation = "storage/" . $request->icon;
                    if (file_exists($realLocation) && !is_dir($realLocation)) {
                        unlink($realLocation);
                    }
                }

                foreach ($request->file('image') as $key => $image) {
                    $extension = $image->getClientOriginalExtension();
                    $fileName = $key . '-' . time() . '.' . $extension;

                    $path = $image->storeAs('assets/gallery', $fileName, 'public');

                    $imageData[] = [
                        'gallery_id' => $gallery->id,
                        'image' => $path
                    ];
                }
            } else {
                $imageData[] = [
                    'gallery_id' => $gallery->id,
                    'image' => $request->icon
                ];
            }

            GalleryImage::insert($imageData);
            Alert::success('Success!', 'Image Upload Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        $galleryImage = GalleryImage::find($id);
        try {
            if ($galleryImage->image != null) {
                $realLocation = "storage/" . $galleryImage->image;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            Storage::delete($galleryImage->image);
            $galleryImage->delete();
            Alert::success('Success!', 'Image Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Image Deleted Failed');
            return redirect()->back();
        }
    }
}
