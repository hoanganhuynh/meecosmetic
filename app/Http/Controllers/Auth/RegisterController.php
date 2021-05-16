<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends AdminController
{
   public function getRegister(){
       return view('auth.register');
   }

    public function postRegister(RegisterRequest $registerRequest)
    {

        $user = New User();
        $user->name = $registerRequest->name;
        $user->email = $registerRequest->email;
        $user->password = bcrypt($registerRequest->password);
        $user->remember_token = $registerRequest->_token;
        $user->save();

        return redirect()->route('get.login');

    }

}
