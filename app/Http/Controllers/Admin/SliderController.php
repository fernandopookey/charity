<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Slider',
            'slider'    => Slider::first(),
            'content'   => 'admin/slider/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, $id)
    {
        $item = Slider::find($id);
        $data = $request->validate([
            'title'         => 'nullable',
            'sub_title'     => 'nullable',
            'description'   => 'nullable',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::delete($item->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('sliders', 'public');
            $data['image'] = $imagePath;
        }

        $item->update($data);
        Alert::success('Success!', 'Image Upload Successfully');
        return redirect()->back();
    }
}
