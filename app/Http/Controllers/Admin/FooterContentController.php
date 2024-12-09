<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FooterContentController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Konten Footer',
            'footerContent' => FooterContent::first(),
            'content'       => 'admin/footer-content/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, $id)
    {
        $item = FooterContent::find($id);
        // dd($item);
        $data = $request->validate([
            'phone_number'  => 'nullable',
            'email'         => 'nullable',
            'address'       => 'nullable',
            'description'   => 'nullable',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            if ($item->logo) {
                Storage::delete($item->logo);
            }

            $imagePath = $request->file('logo')->store('footer-content', 'public');
            $data['logo'] = $imagePath;
        }

        $item->update($data);
        Alert::success('Success!', 'Kontent Footer Berhasil diupload');
        return redirect()->back();
    }
}
