<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\CauseImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CauseImageController extends Controller
{
    public function index($id)
    {
        $data = [
            'title'         => 'Cause Image & Video Upload',
            'causes'        => Cause::find($id),
            'causeImages'   => CauseImage::where('cause_id', $id)
                ->where(function ($query) {
                    $query->where('image', 'like', '%.jpg')
                        ->orWhere('image', 'like', '%.jpeg')
                        ->orWhere('image', 'like', '%.png');
                })
                ->get(),
            'causeVideos'  => CauseImage::where('cause_id', $id)
                ->where('image', 'like', '%.mp4')
                ->get(),
            'content'       => 'admin/cause/image-upload',
        ];

        return view('admin.layout.wrapper', $data);
    }

    // public function store(Request $request, $id)
    // {
    //     $request->validate([
    //         'images.*' => 'required|mimes:png,jpg,jpeg,webp,mp4,mov,avi'
    //     ]);

    //     $cause = Cause::findOrFail($id);

    //     $imageData = [];

    //     if ($request->hasFile('images')) {
    //         if ($request->images != null) {
    //             $realLocation = "storage/" . $request->images;
    //             if (file_exists($realLocation) && !is_dir($realLocation)) {
    //                 unlink($realLocation);
    //             }
    //         }
    //         $images = $request->file('images');
    //         $fileName = time() . '-' . $images->getClientOriginalName();

    //         $data['images'] = $request->file('images')->store('assets/cause-images', 'public');
    //         $imageData[] = [
    //             'cause_id'  => $cause->id,
    //             'image'     => $fileName
    //         ];
    //     } else {
    //         $data['images'] = $request->images;
    //     }

    //     CauseImage::insert($imageData);
    //     Alert::success('Success!', 'Image Upload Successfully');
    //     return redirect()->back();
    // }

    public function store(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'required|mimes:png,jpg,jpeg,webp,mp4,mov,avi'
        ]);

        $cause = Cause::findOrFail($id);

        $imageData = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $fileName = time() . '-' . $file->getClientOriginalName();
                $path = $file->store('assets/cause-images', 'public');

                $imageData[] = [
                    'cause_id' => $cause->id,
                    'image'    => $path
                ];
            }
        }

        if (!empty($imageData)) {
            CauseImage::insert($imageData);
        }

        Alert::success('Success!', 'Image Upload Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $causeImage = CauseImage::find($id);
        try {
            if ($causeImage->image != null) {
                $realLocation = "storage/" . $causeImage->image;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            Storage::delete($causeImage->image);
            $causeImage->delete();
            Alert::success('Success!', 'Cause Image Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Cause Image Deleted Failed');
            return redirect()->back();
        }
    }
}
