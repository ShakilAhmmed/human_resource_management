<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_data=User::findOrFail(Auth::user()->id);
        $user_data->update(['is_active'=>'1']);
        Toastr::success("Welcome Back $user_data->name", '', ["positionClass" => "toast-top-right"]);
        return view('Admin.home');
    }
}
