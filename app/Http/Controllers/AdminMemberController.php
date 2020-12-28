<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminMemberController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','ASC')->get();
        $data = [
            'users' => $users
        ];
        return view('admin.members.index',$data);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data = ['user' => $user];

        return view('admin.members.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('admin.members.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.members.index');
    }
}
