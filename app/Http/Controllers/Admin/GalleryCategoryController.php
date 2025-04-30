<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Galery Category',
            'categories'    => GalleryCategory::all(),
            'content'       => 'admin/gallery-category/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create Category',
            'content'   => 'admin/gallery-category/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
        ]);

        GalleryCategory::create($data);
        Alert::success('Success!', 'Gallery Category Created Successfully');
        return redirect()->route('gallery-categories.index');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'title'         => 'Edit Gallery Category',
            'categories'    => GalleryCategory::find($id),
            'content'       => 'admin/gallery-category/edit'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = GalleryCategory::find($id);
        $data = $request->validate([
            'name'     => 'nullable',
        ]);

        $item->update($data);
        Alert::success('Success!', 'Gallery Category Updated Successfully');
        return redirect()->route('gallery-categories.index');
    }

    public function destroy($id)
    {
        $mediaSocial = GalleryCategory::find($id);
        try {
            $mediaSocial->delete();
            Alert::success('Success!', 'Gallery Category Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Gallery Category Deleted Failed');
            return redirect()->back();
        }
    }
}
