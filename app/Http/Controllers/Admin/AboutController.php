<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\FooterContent;
use App\Models\HomeVideo;
use App\Models\MediaSocial;
use App\Models\NavbarContent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'About Us',
            'about'     => About::first(),
            'content'   => 'admin/about/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, $id)
    {
        $item = About::find($id);
        $data = $request->validate([
            'title'         => 'nullable',
            'description'   => 'nullable',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
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

            $data['logo'] = $request->file('logo')->store('assets/about', 'public');
        } else {
            $data['logo'] = $item->logo;
        }

        $item->update($data);
        Alert::success('Success!', 'About Updated Successfully');
        return redirect()->back();
    }

    public function userAbout()
    {
        $data = [
            'about'         => About::first(),
            'homeVideo'     => HomeVideo::first(),
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'content'       => 'user/about/index',
        ];

        return view('user.layouts.wrapper', $data);
    }
}
