<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function login_index()
    {
        if(auth()->user()->type == '會員')
        {
            return view('home.index');
        }
        else if (auth()->user()->type == '管理員')
        {
            return redirect('admin');
        }
    }

    static public function isAdmin()
    {
        if (isset(auth()->user()->id))
        {
            if(auth()->user()->type == '管理員')
                return 1;
        }

    }

}
