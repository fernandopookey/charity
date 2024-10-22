<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\CauseImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CauseImageController extends Controller
{
    //

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
                ->where('image', 'like', '%.mp4') // Filter hanya file dengan ekstensi .jpg
                ->get(),
            'content'       => 'admin/cause/image-upload',
        ];

        return view('admin.layout.wrapper', $data);
    }

    // public function indexVideos($id)

    public function store(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'images.*' => 'required|mimes:png,jpg,jpeg,webp,mp4,mov,avi'
        ]);

        $cause = Cause::findOrFail($id);

        $imageData = [];
        // dd($imageData);
        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {

                $extension = $file->getClientOriginalExtension();
                $fileName = $key . '-' . time() . '.' . $extension;

                $path = "uploads/products/";

                $file->move($path, $fileName);

                $imageData[] = [
                    'cause_id'  => $cause->id,
                    'image'     => $path . $fileName
                ];
            }
        }

        CauseImage::insert($imageData);
        Alert::success('Success!', 'Image Upload Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $causeImages = CauseImage::findOrFail($id);

        if (File::exists($causeImages->image)) {
            File::delete($causeImages->image);
        }

        $causeImages->delete();

        Alert::success('Success!', 'Image Deleted Successfully');
        return redirect()->back();
    }
}
