<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShareButtonController extends Controller
{
    public function share()
    {
        $data = [
            'id'            => 1,
            'title'         => 'First test',
            'description'   => 'First description'
        ];

        $shareButtons = \Share::page(
            url('/post'),
            'here is the text'
        )
            ->facebook()
            ->telegram()
            ->linkedin()
            ->whatsapp();

        return view('admin.cause.share', compact('data', 'shareButtons'));
    }
}
