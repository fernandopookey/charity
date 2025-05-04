<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Cause;
use App\Models\CauseImage;
use App\Models\Donation;
use App\Models\FooterContent;
use App\Models\HelpReason;
use App\Models\HomeVideo;
use App\Models\MediaSocial;
use App\Models\NavbarContent;
use App\Models\Payment;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    // public function index()
    // {
    //     $causes = Cause::with('causePayment')->get();

    //     $pricesByCause = [];

    //     foreach ($causes as $cause) {
    //         foreach ($cause->causePayment as $payment) {
    //             if (isset($pricesByCause[$cause->id])) {
    //                 $pricesByCause[$cause->id] += $payment->price;
    //             } else {
    //                 $pricesByCause[$cause->id] = $payment->price;
    //             }
    //         }
    //     }

    //     $data = [
    //         'causes'    => Cause::where('status', 1)->get(),
    //         'navbarContent' => NavbarContent::first(),
    //         'footerContent' => FooterContent::first(),
    //         'mediaSocials'  => MediaSocial::all(),
    //         'about'         => About::first(),
    //         'causesWithRaised' => $pricesByCause,
    //         'content'   => 'user/donate/index'
    //     ];

    //     return view('user.layouts.wrapper', $data);
    // }

    public function index()
    {
        $causes = Cause::getCauseListActive("");

        $data = [
            'slider'        => Slider::first(),
            'helpReasons'   => HelpReason::all(),
            'user'          => User::all(),
            'homeVideo'     => HomeVideo::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'transaction'   => Payment::count(),
            'causeCount'    => Cause::count(),
            'causes'        => $causes,
            'content'   => 'user/donate/index'
        ];

        return view('user.layouts.wrapper', $data);
    }

    public function show($slug)
    {
        $donatePrices = Donation::all();
        $causes = Cause::getCauseList3("", "");
        $causeById = Cause::getCauseList3("", $slug);
        $causeList = Cause::getCauseList3("", $slug);
        $now = Carbon::now()->tz('Asia/Jakarta');

        // Share
        $shareButtons = \Share::page(
            url()->current(),
            $causeById[0]->title
        )
            ->whatsapp()
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram();

        $data = [
            'causes'        => $causes,
            'causeById'     => $causeById[0],
            'causesList'    => $causeList,
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'now'           => $now,
            // 'shareButtons'  => $shareButtons,
            'donatePrices'  => $donatePrices,
            'causeVideos'   => CauseImage::where('cause_id', $causeById[0]->id)
                ->where('image', 'like', '%.mp4')
                ->get(),
            'content'       => 'user/donate/detail',
        ];

        return view('user.layouts.wrapper', $data);
    }

    public function process(Request $request)
    {
        return 'Halo';
    }
}
