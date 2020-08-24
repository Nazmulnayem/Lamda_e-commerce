<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function login(){
        return view('FrontEnd.userLogin.login');
    }
    public function register(){
        return view('FrontEnd.userLogin.register');
    }
    public function manageUser(){
       $users = User::all();
        return view('admin.User.manageUser',[
            'users' => $users
        ]);
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('User-manage')->with('message','User deleted successful');
    }

}
