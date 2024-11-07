<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Cause;
use App\Models\CauseImage;
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
        $causes = Cause::getCauseList3("");
        $causeById = Cause::getCauseList3($id);
        $causeList = Cause::getCauseList3($id);
        $now = Carbon::now()->tz('Asia/Jakarta');
        // dd($now);
        // dd($causeById[0]->all_videos);
        // dd($causeById[0]);
        // dd($causeById);
        // dd($causeList);
        // dd($causeById[0]);

        $test = CauseImage::where('cause_id', $id)
            ->where('image', 'like', '%.mp4') // Filter hanya file video .mp4
            ->get();

        $data = [
            // 'cause'         => Cause::find($id),
            'causes'        => $causes,
            'causeById'     => $causeById[0],
            'causesList'    => $causeList,
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'now'           => $now,
            'causeVideos'   => CauseImage::where('cause_id', $id)
                ->where('image', 'like', '%.mp4') // Filter hanya file video .mp4
                ->get(),
            'content'       => 'user/donate/detail',
        ];

        return view('user.layouts.wrapper', $data);
    }

    // public function show($id)
    // {
    //     // Ambil data Cause berdasarkan ID
    //     $cause = Cause::with(['causePayment', 'causeImage'])->find($id);

    //     // Jika cause tidak ditemukan, bisa menambahkan penanganan error
    //     if (!$cause) {
    //         abort(404);
    //     }

    //     // Hitung total harga dari causePayment
    //     $jml = $cause->causePayment->sum('price');
    //     $raised = intval($jml);

    //     // Pisahkan causeImages menjadi dua kategori: gambar dan video
    //     $causeImages = $cause->causeImages->filter(function ($image) {
    //         return preg_match('/\.(jpg|jpeg|png)$/i', $image->image);
    //     });

    //     $causeVideos = $cause->causeImages->filter(function ($image) {
    //         return preg_match('/\.mp4$/i', $image->image);
    //     });

    //     $data = [
    //         'cause'         => $cause,
    //         'causeImages'   => $causeImages,
    //         'causeVideos'   => $causeVideos,
    //         'raised'        => $raised,
    //         'causes'        => Cause::all(),
    //         'navbarContent' => NavbarContent::first(),
    //         'footerContent' => FooterContent::first(),
    //         'mediaSocials'  => MediaSocial::all(),
    //         'about'         => About::first(),
    //         'content'       => 'user/donate/detail',
    //     ];

    //     return view('user.layouts.wrapper', $data);
    // }


    public function process(Request $request)
    {
        return 'Halo';
        // dd($request);
    }
}
