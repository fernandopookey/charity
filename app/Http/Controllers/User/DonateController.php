<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Cause;
use App\Models\CauseImage;
use App\Models\Donation;
use App\Models\FooterContent;
use App\Models\MediaSocial;
use App\Models\NavbarContent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonateController extends Controller
{
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
            'causes'    => Cause::where('status', 1)->get(),
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'causesWithRaised' => $pricesByCause,
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
