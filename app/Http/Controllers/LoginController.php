<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }
 
    public function verify(Request $req){

        /* $user = DB::table('employees') 
        -> where('password', $req->password)
        ->where('username',$req->username)
        ->get(); */

 $user =Employee::where('password', $req->password)
                 ->where('username',$req->username)
              ->get(); 

          if($req->username == "" || $req->password == ""){
            // $req->session()->flash('msg','Invalid');
             return redirect('/login');
          }elseif(count($user) > 0 ){
         
    
       // $req->session()->put('username',$req->username);
        return redirect('/dashboard');
   
               } else{
   
                 // $req->session()->flash('msg','Invalid');
                    return redirect('/login');
   
               }
   
   }
    }


