<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthenticateController extends Controller
{
    public function login(){
        return view('login');
    }

   public function loginProcess(Request $request){

    $urse = $request->get('urse');
    $pass= $request->get('pass');


    try {
        $admin = admin::where('name',$urse)->where('pass',$pass)->firstOrFail();
        $request->session()->put('id',$admin->id);
        $request->session()->put('name', $admin->name);
        return Redirect::route('dashboard');


    } catch (Exception $e) {

        return Redirect::route('login')->with('error', 'Sai tài khoản hoặc mật khẩu');
    }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return Redirect::route('login');
    }

}


