<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RequestUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::whereRaw(1);
        $users = $users->orderBy('id','DESC')->paginate(12);
        $viewdata = [
          'users' => $users
        ];
        return view('admin.user.index',$viewdata);
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.update',compact('user'));
    }
    public function update(RequestUser $requestUser,$id){
        $this->insertOrUpdate($requestUser,$id);
        return redirect()->route('admin.index.user');
    }
    public function delete($action,$id){
        if($action){
            $user = User::find($id);
                    $user->delete();
        }
        return Redirect()->Route('admin.index.user');
    }

    public function insertOrUpdate(RequestUser $requestUser,$id=''){
        $user = new User();
        if($id) $user = User::find($id);
        $user->name = $requestUser->name;
        $user->email = $requestUser->email;


        $user->save();
    }

}
