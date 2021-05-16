<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }
    public  function postLogin(LoginRequest $loginRequest){
        //dd($loginRequest->all());
        $data = $loginRequest->only('email', 'password');
        if (Auth::guard('admins')->attempt($data)) {

            return redirect()->route('api-admin.index');
        }
        else {

            return redirect()->route('admin.login');
        }
    }
    public function getLogout(){
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
