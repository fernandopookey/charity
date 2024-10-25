<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Cause;
use App\Models\CauseImage;
use App\Models\FooterContent;
use App\Models\MediaSocial;
use App\Models\NavbarContent;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        $data = [
            'causes'    => Cause::all(),
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'content'   => 'user/donate/index'
        ];

        return view('user.layouts.wrapper', $data);
    }

    public function show($id)
    {
        $test = Cause::find($id);
        $payments = $test->causePayment;
        $prices = [];
        foreach ($payments as $payment) {
            $prices[] = $payment->price;
        }
        $jml = array_sum($prices);
        $jml = intval($jml);
        // $raised = ($prices) ? $test->goal - $jml : $jml;
        $data = [
            'cause'         => Cause::find($id),
            'causeImages'   => CauseImage::where('cause_id', $id) // Filter berdasarkan cause_id
                ->where(function ($query) {
                    $query->where('image', 'like', '%.jpg')
                        ->orWhere('image', 'like', '%.jpeg')
                        ->orWhere('image', 'like', '%.png');
                })
                ->get(),
            'causeVideos'   => CauseImage::where('cause_id', $id)
                ->where('image', 'like', '%.mp4') // Filter hanya file video .mp4
                ->get(),
            'causePayment'  => Cause::with('causePayment')->where('id', $id)->get(),
            'raised'        => $jml,
            'causes'        => Cause::all(),
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'content'       => 'user/donate/detail',
        ];

        return view('user.layouts.wrapper', $data);
    }


    public function process(Request $request)
    {
        return 'Halo';
        // dd($request);
    }
}
