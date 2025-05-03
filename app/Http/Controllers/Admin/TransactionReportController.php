<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Midtrans\Transaction;

class TransactionReportController extends Controller
{
    public function index()
    {
        $fromDate   = Request()->input('fromDate');
        $toDate     = Request()->input('toDate');
        $pdf        = Request()->input('pdf');

        if (!$fromDate || !$toDate) {
            $fromDate = NowDate();
            $toDate = NowDate();
        }

        $payments = Payment::whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)->get();

        // if ($pdf && $pdf == '1') {
        //     $pdf = Pdf::loadView('admin/transaction-report/index', ['transactions'   => $payments]);
        //     return $pdf->stream('transaction-report.pdf');
        // }

        if ($pdf && $pdf == '1') {
            $pdf = Pdf::loadView('admin/transaction-report/index', [
                'transactions'   => $payments,
            ]);
            return $pdf->stream('Report-member-checkin, ' . $fromDate . '-' . $toDate . '.pdf');
        }

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
}
