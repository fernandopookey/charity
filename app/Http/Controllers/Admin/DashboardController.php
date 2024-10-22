<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        $data = [
            'title'         => 'Dashboard',
            'transactions'  => Payment::count(),
            'causes'        => Cause::count(),
            'users'         => User::count(),
            'content'       => 'admin/dashboard/index'
        ];

        return view('admin.layout.wrapper', $data);
    }
}