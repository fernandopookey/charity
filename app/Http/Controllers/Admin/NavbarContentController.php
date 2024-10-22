<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContent;
use App\Models\NavbarContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class NavbarContentController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Konten Navigasi Bar',
            'navbarContent' => NavbarContent::first(),
            'content'       => 'admin/navbar-content/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, $id)
    {
        $item = FooterContent::find($id);
        $data = $request->validate([
            'phone_number'  => 'nullable',
            'email'         => 'nullable',
            'address'       => 'nullable',
            'description'   => 'nullable',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        if ($request->hasFile('logo')) {

            if ($item->logo != null) {
                $realLocation = "storage/" . $item->logo;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $logo = $request->file('logo');
            $file_name = time() . '-' . $logo->getClientOriginalName();

            $data['logo'] = $request->file('logo')->store('assets/footer-content', 'public');
        } else {
            $data['logo'] = $item->logo;
        }

        $item->update($data);
        Alert::success('Success!', 'Footer Content Updated Successfully');
        return redirect()->route('footer-contents.index');
    }
}
