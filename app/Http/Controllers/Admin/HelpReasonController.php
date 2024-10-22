<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HelpReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HelpReasonController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Reason of Helping',
            'helpReasons'   => HelpReason::all(),
            'content'       => 'admin/help-reasons/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create Reason of Helping',
            'content'   => 'admin/help-reasons/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required',
            'description'   => 'required',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($request->image != null) {
                $realLocation = "storage/" . $request->image;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }
            $image = $request->file('image');
            $file_name = time() . '-' . $image->getClientOriginalName();

            $data['image'] = $request->file('image')->store('assets/help-reason', 'public');
        } else {
            $data['image'] = $request->photos;
        }

        HelpReason::create($data);
        Alert::success('Success!', 'Help Reason Created Successfully');
        return redirect()->route('help-reasons.index');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'title'         => 'Edit Reason of Helping',
            'helpReason'    => HelpReason::find($id),
            'content'       => 'admin/help-reasons/edit'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = HelpReason::find($id);
        $data = $request->validate([
            'title'     => 'nullable',
            'description'  => 'nullable',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        if ($request->hasFile('image')) {

            if ($item->image != null) {
                $realLocation = "storage/" . $item->image;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $image = $request->file('image');
            $file_name = time() . '-' . $image->getClientOriginalName();

            $data['image'] = $request->file('image')->store('assets/help-reason', 'public');
        } else {
            $data['image'] = $item->image;
        }

        $item->update($data);
        Alert::success('Success!', 'Help Reason Updated Successfully');
        return redirect()->route('help-reasons.index');
    }

    public function show(Request $request, $id)
    {
        $data = [
            'title'         => 'Reason of Helping Detail',
            'helpReason'    => HelpReason::find($id),
            'content'       => 'admin/help-reasons/show'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function destroy($id)
    {
        $helpReason = HelpReason::find($id);
        try {
            if ($helpReason->image != null) {
                $realLocation = "storage/" . $helpReason->image;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            Storage::delete($helpReason->image);
            $helpReason->delete();
            Alert::success('Success!', 'Help Reason Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Help Reason Deleted Failed');
            return redirect()->back();
        }
    }
}
