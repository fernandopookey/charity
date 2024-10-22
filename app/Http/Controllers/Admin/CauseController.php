<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CauseStoreRequest;
use App\Http\Requests\CauseUpdateRequest;
use App\Models\Cause;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CauseController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Cause',
            'causes'    => Cause::all(),
            'content'   => 'admin/cause/index'
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
        $data = [
            'title'     => 'Cause Detail',
            'cause'     => Cause::find($id),
            'content'   => 'admin/cause/show'
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
