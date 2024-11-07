<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\FooterContent;
use App\Models\MediaSocial;
use App\Models\NavbarContent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'content'       => 'user/contact/index'
        ];

        return view('user.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'message'   => 'required',
            'email'     => 'required|email',
            'subject'   => 'required'
        ]);

        Contact::create($data);
        Alert::success('Success!', 'Pesan Terkirim');
        return redirect()->route('user-contact');
    }
}
