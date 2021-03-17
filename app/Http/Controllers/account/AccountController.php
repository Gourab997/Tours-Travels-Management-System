<?php

namespace App\Http\Controllers\account;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    function accountdashboard(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('account.dashboard', $data);
    }
}
