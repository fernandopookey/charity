<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Payment Transaction',
            'transactions'  => Payment::all(),
            'content'       => 'admin/transaction/index'
        ];

        return view('admin.layout.wrapper', $data);
    }
}
