<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Midtrans\Transaction;

class TransactionReportController extends Controller
{
    public function index()
    {
        $fromDate   = Request()->input('fromDate');
        $toDate     = Request()->input('toDate');

        if (!$fromDate || !$toDate) {
            $fromDate = NowDate();
            $toDate = NowDate();
        }

        // $fromDate = Carbon::create('2024-10-19')->format('Y-m-d H:i:s');
        // $toDate = Carbon::create('2024-10-22')->format('Y-m-d H:i:s');
        // dd($fromDate);

        $payments = Payment::whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)->get();
        // $payments = Payment::whereDate('created_at', $fromDate)->get();
        // $payments = Payment::all();

        // dd($payments);




        $data = [
            'title'         => 'Transaction Report',
            'transactions'  => $payments,
            'fromDate'      => $fromDate,
            'toDate'        => $toDate,
            'content'       => 'admin/transaction-report/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function pdf()
    {
        dd("PDF");
    }

    // public function destroy($id)
    // {
    //     $transaction = Payment::find($id);
    //     dd($item);
    // }
}
