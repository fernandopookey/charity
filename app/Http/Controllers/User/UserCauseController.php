<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use Illuminate\Http\Request;

class UserCauseController extends Controller
{
    public function show($id)
    {
        $item = Cause::find($id);
        dd($item);
        $data = [
            'cause'     => Cause::find($id),
            'content'   => 'user/donate/detailll',
        ];

        return view('user.layouts.wrapper', $data);
    }
}
