<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\TermsConditions as ModelsTermsConditions;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\FooterContent;
use App\Models\HomeVideo;
use App\Models\MediaSocial;
use App\Models\NavbarContent;

class TermsConditions extends Controller
{
    public function index()
    {
        $data = [
            'title'             => 'Terms & Conditions',
            'termsConditions'   => ModelsTermsConditions::all(),
            'content'           => 'admin/terms-conditions/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create Terms & Conditions',
            'content'   => 'admin/terms-conditions/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => 'required',
            'description'   => 'required'
        ]);

        ModelsTermsConditions::create($data);
        Alert::success('Success!', 'Terms & Conditions Created Successfully');
        return redirect()->route('terms-conditions.index');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'title'             => 'Edit Terms & Conditions',
            'termsConditions'   => ModelsTermsConditions::find($id),
            'content'           => 'admin/terms-conditions/edit'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = ModelsTermsConditions::find($id);
        $data = $request->validate([
            'title'         => 'nullable',
            'description'   => 'nullable'
        ]);

        $item->update($data);
        Alert::success('Success!', 'Terms & Conditions Updated Successfully');
        return redirect()->route('terms-conditions.index');
    }

    public function show(Request $request, $id)
    {
        $data = [
            'title'             => 'Terms & Conditions Detail',
            'termsConditions'   => ModelsTermsConditions::find($id),
            'content'           => 'admin/terms-conditions/show'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function destroy($id)
    {
        $termsConditions = ModelsTermsConditions::find($id);
        try {
            $termsConditions->delete();
            Alert::success('Success!', 'Terms & Conditions Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terms & Conditions Deleted Failed');
            return redirect()->back();
        }
    }

    public function userTermsConditions()
    {
        // $about = About::first();
        // $terms = ModelsTermsConditions::all();
        // dd($terms);

        $data = [
            'termsConditions'   => ModelsTermsConditions::all(),
            'about'             => About::first(),
            'homeVideo'         => HomeVideo::first(),
            'navbarContent'     => NavbarContent::first(),
            'footerContent'     => FooterContent::first(),
            'mediaSocials'      => MediaSocial::all(),
            'content'           => 'user/terms-conditions/index',
        ];

        return view('user.layouts.wrapper', $data);
    }
}
