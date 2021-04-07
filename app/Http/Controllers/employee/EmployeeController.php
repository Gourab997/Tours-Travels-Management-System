<?php

namespace App\Http\Controllers\employee;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        
        //return view('dashboard.profile',compact('employee'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }
    public function dashboard(Request $req)
    {

      /*   $count  =DB::table('customers')->count(); */
      $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('employee.dashboard.index',$data);/* ->with('employee',$employee); */
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ,Request $req)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
       return view('employee.dashboard.profile.editprofile', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $req)
    {

        

        $user = User::find($id);   
            $user->fullname     = $req->fullname;
          
            $user->email        = $req->email;
            $user->phone        = $req->phone;
            $user->address      = $req->address;
            /**$user->facebook     = $req->facebook;*/
            if ($req->hasFile('myfile')) {
                $file = $req->file('myfile');
                $fileName =  $req->session()->get('LoggedUser') . '.' .  $file->getClientOriginalExtension();
                if ($file->move(public_path('upload'), $fileName)) {
                    $user->profile_img  = $fileName;
                    $user->save();
                   
                } else {
                 
                    return redirect("employee/dashboard/editprofile/{id}")->with('fail','Profile Information Update Succesfull');
                }

               
            }    
            $user->save();
    return redirect("employee/dashboard/profile")->with('success','Profile Information Update Succesfull');
    
   
      
            
            

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
    public function profile(Request $req){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        
        return view('employee.dashboard.profile.profile',$data);
       
    }
}
