<?php

namespace App\Http\Controllers\account;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    function accountdashboard(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('account.dashboard.index', $data);
    }


     public function edit( $id ,Request $req)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
       $user = User::find($id);
       return view('account.dashboard.profile.editprofile',$data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $req)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];

        $user = User::find($id);   
            $user->fullname     = $req->fullname;
            $user->email        = $req->email;
            $user->phone        = $req->phone;
            $user->address      = $req->address;
            /**$user->facebook     = $req->facebook;*/
           if ($req->hasFile('myfile')) {
                $file = $req->file('myfile');
                $Name = $req->session('LoggedUser')->get('id');
                $fileName =$Name.'.'. $file->getClientOriginalExtension();
                if ($file->move('uploads', $fileName)) {
                    $user->profile_img  = $fileName;
                    $user->save();
                   
                } else {
                 
                    return redirect(route('account.dashboard'));
                }

               
            }    
            $user->save();
    return redirect(route('account.dashboard'));
    
   
      
            

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function profile(Request $req){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $user = User::where('username',$req->session('LoggedUser')->get('username'))->first();
        return view('account.dashboard.profile.profile',$data);
    }
}
