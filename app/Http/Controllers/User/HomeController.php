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
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $causes = Cause::getCauseListActive("");
        // $user = User::all();
        // dd($user);

        $data = [
            'content'       => 'user/home/index',
            'slider'        => Slider::first(),
            'helpReasons'   => HelpReason::all(),
            'user'          => User::all(),
            'homeVideo'     => HomeVideo::first(),
            'mediaSocials'  => MediaSocial::all(),
            'about'         => About::first(),
            'transaction'   => Payment::count(),
            'causeCount'    => Cause::count(),
            'causes'        => $causes
        ];

        return view('user.layouts.wrapper', $data);
    }
}
