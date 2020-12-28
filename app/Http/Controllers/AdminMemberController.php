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

}
