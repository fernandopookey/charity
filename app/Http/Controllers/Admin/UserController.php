<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Cause',
            'users'     => User::all(),
            'content'   => 'admin/users/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create User',
            'content'   => 'admin/users/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'role'          => 'required',
            'password'      => 'required|min:6'
        ]);

        $data['password']   = bcrypt($request->password);

        User::create($data);
        Alert::success('Success!', 'User Created Successfully');
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        // dd(User::find($id));
        $data = [
            'title'     => 'Edit User',
            'user'      => User::find($id),
            'content'   => 'admin/users/edit'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(Request $request, $id)
    {
        $item = User::find($id);
        $data = $request->validate([
            'name'      => 'nullable',
            'email'     => 'nullable|email',
            'role'      => 'nullable'
        ]);

        $data['password']   = bcrypt($request->password);

        $item->update($data);
        Alert::success('Success!', 'User Updated Successfully');
        return redirect()->route('users.index');
    }
}
