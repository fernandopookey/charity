<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\FooterContent;
use App\Models\HelpReason;
use App\Models\HomeVideo;
use App\Models\MediaSocial;
use App\Models\NavbarContent;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $causes = Cause::with('causeImage')->get();

        // foreach ($causes as $cause) {
        //     if ($cause->causeImage) {
        //         echo $cause->causeImage->image; // Mengakses kolom 'image' dari tabel cause_images
        //     } else {
        //         echo "No image available for this cause.";
        //     }
        // }

        $data = [
            'content'       => 'user/home/index',
            'slider'        => Slider::first(),
            'helpReasons'   => HelpReason::all(),
            'homeVideo'     => HomeVideo::first(),
            'navbarContent' => NavbarContent::first(),
            'footerContent' => FooterContent::first(),
            'mediaSocials'  => MediaSocial::all(),
            'causes'        => Cause::with('causeImage')->get()
        ];

        return view('user.layouts.wrapper', $data);
    }
}
