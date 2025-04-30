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
    // public function index(Request $request)
    // {
    //     $status = $request->input('status');

    //     $causes = Cause::getCauseList("");
    //     dd($causes);
    //     // $causes = Cause::getCauseList("", $status);
    //     // dd($status);

    //     $data = [
    //         'title'             => 'Cause',
    //         'causes'            => $causes,
    //         'content'           => 'admin/cause/index'
    //     ];

    //     return view('admin.layout.wrapper', $data);
    // }

    public function index(Request $request)
    {
        $status = $request->input('status');         // Running / over / Not Started
        $visibility = $request->input('visibility'); // 1 / 0

        // Ambil semua data dari model (dengan query SQL)
        $causes = Cause::getCauseListActive();

        // Lakukan filter secara collection (di PHP)
        $filteredCauses = collect($causes)->filter(function ($cause) use ($status, $visibility) {
            $statusMatch = $status ? $cause->active_status === $status : true;
            $visibilityMatch = $visibility !== null && $visibility !== ''
                ? $cause->visibility_status == $visibility
                : true;

            return $statusMatch && $visibilityMatch;
        });

        return view('admin.layout.wrapper', [
            'title'   => 'Cause',
            'causes'  => $filteredCauses,
            'content' => 'admin/cause/index'
        ]);
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
        $cause = Cause::create($data);
        // dd($cause);
        Alert::success('Success!', 'Cause Created Successfully, please add image');
        return redirect()->route('cause-image-upload', $cause->id);
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
        $causeById = Cause::getCauseListById($id);

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
            dd("Hallo");
            dd($th);
            Alert::error('Error!', 'Cause Deleted Failed');
            return redirect()->back();
        }
    }
}
