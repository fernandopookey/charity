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

    public function show($id)
    {
        $donatePrices = Donation::all();

        $causes = Cause::getCauseListById("");
        $causeById = Cause::getCauseListById($id);
        $causeList = Cause::getCauseListById($id);
        $now = Carbon::now()->tz('Asia/Jakarta');

        $test = CauseImage::where('cause_id', $id)
            ->where('image', 'like', '%.mp4') // Filter hanya file video .mp4
            ->get();

        $data = [
            'causes'        => $causes,
            'causeById'     => $causeById[0],
            'causesList'    => $causeList,
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'now'           => $now,
            'donatePrices'  => $donatePrices,
            'causeVideos'   => CauseImage::where('cause_id', $id)
                ->where('image', 'like', '%.mp4') // Filter hanya file video .mp4
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
