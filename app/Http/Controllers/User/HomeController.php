<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Cause;
use App\Models\CauseImage;
use App\Models\FooterContent;
use App\Models\HelpReason;
use App\Models\HomeVideo;
use App\Models\MediaSocial;
use App\Models\NavbarContent;
use App\Models\Payment;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     $data = [
    //         'content'       => 'user/home/index',
    //         'slider'        => Slider::first(),
    //         'helpReasons'   => HelpReason::all(),
    //         'homeVideo'     => HomeVideo::first(),
    //         'navbarContent' => NavbarContent::first(),
    //         'footerContent' => FooterContent::first(),
    //         'mediaSocials'  => MediaSocial::all(),
    //         'about'         => About::first(),
    //         'transaction'   => Payment::count(),
    //         'causeCount'    => Cause::count(),
    //         'causes'        => Cause::with(['causeImage' => function ($query) {
    //             $query->where('image', 'like', '%.jpg')
    //                 ->orWhere('image', 'like', '%.jpeg')
    //                 ->orWhere('image', 'like', '%.png');
    //         }])->get(),
    //     ];

    //     return view('user.layouts.wrapper', $data);
    // }

    public function index()
    {
        $causes = Cause::with('causePayment')->get();

        $pricesByCause = [];

        foreach ($causes as $cause) {
            foreach ($cause->causePayment as $payment) {
                if (isset($pricesByCause[$cause->id])) {
                    $pricesByCause[$cause->id] += $payment->price;
                } else {
                    $pricesByCause[$cause->id] = $payment->price;
                }
            }
        }

        $data = [
            'content'       => 'user/home/index',
            'slider'        => Slider::first(),
            'helpReasons'   => HelpReason::all(),
            'homeVideo'     => HomeVideo::first(),
            // 'navbarContent' => NavbarContent::first(),
            // 'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'transaction'   => Payment::count(),
            'causeCount'    => Cause::count(),
            'causes'        => Cause::with(['causeImage' => function ($query) {
                $query->where('image', 'like', '%.jpg')
                    ->orWhere('image', 'like', '%.jpeg')
                    ->orWhere('image', 'like', '%.png');
            }])->get(),
            'causesWithRaised' => $pricesByCause,
        ];

        return view('user.layouts.wrapper', $data);
    }
}
