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
            'title'         => 'Visi & Misi',
            'visions'       => HelpReason::first(),
            'content'       => 'admin/help-reasons/index'
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
}
