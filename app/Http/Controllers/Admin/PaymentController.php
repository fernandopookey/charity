<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function create(Request $request, $id)
    {
        $userData = Auth::user();
        $userName = ($userData) ? $userData->name : 'Anonymous';
        $userEmail = ($userData) ? $userData->email : 'Anonymous';
        $causeData = Cause::find($id);

        $payments = $causeData->causePayment;
        $prices = [];
        foreach ($payments as $payment) {
            $prices[] = $payment->price;
        }
        $jml = array_sum($prices);
        $jml = intval($jml);
        $causeGoal = $causeData->goal;
        $request->validate([
            'price' => 'required|numeric',
            // 'item_name' => 'required|string',
            // 'customer_name' => 'required|string',
            // 'customer_email' => 'required|email',
        ]);
        $rep = $request['price'];

        $replacePrice = preg_replace("/[^0-9]/", "", "$rep");
        $replacePrice = (int)$replacePrice;
        // dd(intval($replacePrice));

        $result = $replacePrice + $jml;
        // dd(intval($result));

        if ($result > $causeGoal) {
            // dd("Sudah tidak bisa");
            Alert::error('Gagal!', 'Jumlah yang didonasikan tidak boleh lebih dari target donasi!');
            return redirect()->back();
        } else {
            if ($replacePrice <= 50000) {
                $params = [
                    'transaction_details' => [
                        'order_id' => Str::uuid(),
                        'gross_amount' => $replacePrice,
                        'cause_id'  => $causeData->id
                    ],
                    'item_details' => [
                        [
                            'price' => $replacePrice,
                            'quantity' => 1,
                            // 'name' => $causeData->title,
                            'name' => $causeData->id,
                        ],
                    ],
                    'customer_details' => [
                        'customer_name' => $userName,
                        'customer_email' => $userEmail,
                    ],
                    'enabled_payments' => ['gopay'],
                ];
            } else {
                $params = [
                    'transaction_details' => [
                        'order_id' => Str::uuid(),
                        'gross_amount' => $replacePrice,
                        'cause_id'  => $causeData->id
                    ],
                    'item_details' => [
                        [
                            'price' => $replacePrice,
                            'quantity' => 1,
                            // 'name' => $causeData->title,
                            'name' => $causeData->id,
                        ],
                    ],
                    'customer_details' => [
                        'customer_name' => $userName,
                        'customer_email' => $userEmail,
                    ],
                    // 'enabled_payments' => ['bca_va', 'bni_va', 'bri_va'],
                ];
            }
            // dd($params['item_details']);

            $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

            // Sandbox
            // $response = Http::withHeaders([
            //     'Content-Type' => 'application/json',
            //     'Authorization' => "Basic $auth",
            // ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);

            // Production
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Basic $auth",
            ])->post('https://app.midtrans.com/snap/v1/transactions', $params);

            if ($response->failed()) {
                return response()->json(['error' => 'Payment request failed', 'details' => $response->body()], 500);
            }

            $response = json_decode($response->body());

            $token = $response->token ?? null;
            $redirectUrl = $response->redirect_url ?? null;

            if (!$token || !$redirectUrl) {
                return response()->json(['error' => 'Token or redirect URL is missing'], 500);
            }

            $payment = new Payment;
            $payment->order_id = $params['transaction_details']['order_id'];
            $payment->cause_id = $causeData->id;
            $payment->status = 'pending';
            $payment->price = $replacePrice;
            $payment->customer_name = $userName;
            // $payment->customer_name = $request->customer_name;
            $payment->customer_email = $userEmail;
            // $payment->customer_email = $request->customer_email;
            $payment->item_name = $causeData->title;
            $payment->checkout_link = $redirectUrl;
            $payment->save();

            // return response()->json([
            //     'token' => $token,
            //     'redirect_url' => $redirectUrl,
            // ]);

            return Redirect::away($payment->checkout_link);
        }
    }

    public function webhook(Request $request)
    {
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->get("https://api.sandbox.midtrans.com/v2/{$request->order_id}/status");

        $response = json_decode($response->body());

        $payment = Payment::where('order_id', $response->order_id)->first();

        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        if ($payment->status === 'settlement' || $payment->status === 'capture') {
            return response()->json('Payment has been already processed');
        }

        if ($response->transaction_status === 'capture') {
            $payment->status = 'capture';
        } else if ($response->transaction_status === 'settlement') {
            $payment->status = 'settlement';
        } else if ($response->transaction_status === 'pending') {
            $payment->status = 'pending';
        } else if ($response->transaction_status === 'deny') {
            $payment->status = 'deny';
        } else if ($response->transaction_status === 'expire') {
            $payment->status = 'expire';
        } else if ($response->transaction_status === 'cancel') {
            $payment->status = 'cancel';
        }

        $payment->status = $response->transaction_status;
        $payment->save();

        return response()->json('Payment status updated successfully');
    }

    public function finish()
    {
        dd("Tes");
        // return response()->json('Transaksi anda sedang diproses');
        // Alert::success('Success!', 'Terima kasih atas donasi anda!!');
        return redirect()->route('donate');
        // return redirect()->back();
    }

    public function unfinish()
    {
        // return response()->json('Transaksi anda sedang diproses');
        Alert::success('warning!', 'Terima kasih, transaksi anda sedang diproses!!');
        return redirect()->route('donate');
    }

    public function error()
    {
        // return response()->json('Transaksi anda gagal');
        Alert::success('error!', 'Mohon maaf, transaksi anda gagal!!');
        return redirect()->route('donate');
    }
}
