<?php

namespace App\Http\Controllers\customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UCustomerController extends Controller
{
    function userdashboard(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('customer.dashboard', $data);
    }
    function usersettings(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('customer.settings', $data);
    }

    function userprofile(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('customer.profile', $data);
    }
}
