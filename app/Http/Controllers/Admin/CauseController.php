<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CauseStoreRequest;
use App\Http\Requests\CauseUpdateRequest;
use App\Models\Cause;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CauseController extends Controller
{
    // public function index()
    // {
    //     $now = Carbon::now()->tz('Asia/Jakarta');
    //     $causes = Cause::with('causePayment')->get();
    //     $pricesByCause = [];
    //     foreach ($causes as $cause) {
    //         $cause->expired_date = Carbon::parse($cause->created_at)->addDays($cause->days)->format('Y-m-d');

    //         foreach ($cause->causePayment as $payment) {
    //             if (isset($pricesByCause[$cause->id])) {
    //                 $pricesByCause[$cause->id] += $payment->price;
    //             } else {
    //                 $pricesByCause[$cause->id] = $payment->price;
    //             }
    //         }
    //     }
    //     dd($cause->pluck('expired_date'));

    //     $exDa = date_create($cause->expired_date);
    //     dd($exDa);
    //     $diff = date_diff($now, $exDa);
    //     dd($diff);

    //     $data = [
    //         'title'             => 'Cause',
    //         'causes'            => $causes,
    //         'causesWithRaised'  => $pricesByCause,
    //         'now'               => $now,
    //         'daysLeft'          => $diff,
    //         'content'           => 'admin/cause/index'
    //     ];

    //     return view('admin.layout.wrapper', $data);
    // }

    public function index()
    {
        // $now = Carbon::now()->tz('Asia/Jakarta');
        // $causes = Cause::with('causePayment')->get();
        // $pricesByCause = [];
        // $daysLeftByCause = [];

        // foreach ($causes as $cause) {
        //     // Menghitung tanggal kadaluwarsa
        //     $expiredDate = Carbon::parse($cause->created_at)->addDays($cause->days);
        //     $cause->expired_date = $expiredDate->format('Y-m-d');

        //     // Menghitung jumlah total price untuk setiap cause
        //     foreach ($cause->causePayment as $payment) {
        //         if (isset($pricesByCause[$cause->id])) {
        //             $pricesByCause[$cause->id] += $payment->price;
        //         } else {
        //             $pricesByCause[$cause->id] = $payment->price;
        //         }
        //     }

        //     // Menghitung sisa hari antara sekarang dan expired date
        //     $diff = (int) $now->diffInDays($expiredDate, false); // Konversi ke integer
        //     $daysLeftByCause[$cause->id] = $diff < 0 ? 0 : $diff; // Ganti nilai negatif dengan 0
        // }

        $causes = Cause::getCauseList("");
        // dd($causes);

        $data = [
            'title'             => 'Cause',
            'causes'            => $causes,
            'content'           => 'admin/cause/index'
        ];

        return view('admin.layout.wrapper', $data);
    }


    public function create()
    {
        $data = [
            'title'     => 'Create Cause',
            'content'   => 'admin/cause/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(CauseStoreRequest $request)
    {
        $data = $request->all();
        // $data['user_id'] = Auth::user()->id;
        Cause::create($data);
        Alert::success('Success!', 'Cause Created Successfully');
        return redirect()->route('cause.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Cause',
            'causes'    => Cause::find($id),
            'content'   => 'admin/cause/edit',
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(CauseUpdateRequest $request, string $id)
    {
        $item = Cause::find($id);
        $data = $request->all();
        $item->update($data);
        Alert::success('Success!', 'Cause Updated Successfully');
        return redirect()->route('cause.index');
    }

    public function show($id)
    {
        $causeById = Cause::getCauseList($id);
        // dd($causeById);

        $data = [
            'title'         => 'Cause Detail',
            'cause'         => $causeById[0],
            'content'       => 'admin/cause/show'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function destroy($id)
    {
        $item = Cause::find($id);
        try {
            $item->delete();
            Alert::success('Success!', 'Cause Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Cause Deleted Failed');
            return redirect()->back();
        }
    }
}
