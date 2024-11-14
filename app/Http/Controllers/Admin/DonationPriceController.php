<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DonationPriceController extends Controller
{
    public function index()
    {

        $price = Donation::all();

        $data = [
            'title'             => 'Cause',
            'prices'            => $price,
            'content'           => 'admin/donation-price/index'
        ];

        return view('admin.layout.wrapper', $data);
    }


    public function create()
    {
        $data = [
            'title'     => 'Create Donation Price',
            'content'   => 'admin/donation-price/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'price'      => 'required',
        ]);

        $price = $request->price;
        $price = str_replace(['Rp', '.'], '', $price);
        $price = (int)$price;
        // dd($price);
        $data['price'] = $price;

        Donation::create($data);
        Alert::success('Success!', 'Donation Price Created Successfully');
        return redirect()->route('donation-price.index');
    }

    public function destroy($id)
    {
        $item = Donation::find($id);
        // dd($item);

        $item->delete();
        Alert::success('Success!', 'Donation Price Deleted Successfully');
        return redirect()->back();
    }
}
