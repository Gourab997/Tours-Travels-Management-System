<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;


class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }
 
    public function verify(Request $req){


 $employee = DB::table('employees')->where('password', $req->password)
                 ->where('username',$req->username)
              ->get(); 

          if($req->username == "" || $req->password == ""){
           // $req->session()->flash('msg','Invalid');
             return redirect('/login');
          }elseif(count($employee) > 0 ){
         
            
       $req->session()->put('username',$req->username);
      
        return redirect('/dashboard');
        Toastr::success('Login Success','Success');
               } else{
                  Toastr::error('Login Faild','Failed');
               
                    return redirect('/login');
   
               }
   
   }
    }


