<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use http\Env\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(LoginRequest $loginRequest)
    {
        $credemtials = $loginRequest->only('email', 'password');
        if (\Auth::attempt($credemtials)) {
            return redirect()->route('get.home');
        } else {
            return redirect()->back();
        }
        
    }
    public function getLogout(){
        \Auth::logout();
        return redirect()->route('get.home');
    }


}
