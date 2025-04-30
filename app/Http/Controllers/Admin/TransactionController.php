<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function destroy($id)
    {
        $transaction = Payment::find($id);

        try {
            $transaction->delete();
            Alert::success('Success!', 'Transaction Delete Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Transaction Deleted Failed');
            return redirect()->back();
        }
    }
}
