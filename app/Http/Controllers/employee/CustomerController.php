<?php

namespace App\Http\Controllers\employee;

use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Imports\CustomersExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
    }
    public function confirmstatus($id, Request $req)
    {
     $customer = Customer::find($id);
      
       
        $customer->status= 1;
        $customer->status = $req->status;
        $customer->save();
     
        return redirect('/employee/dashboard/view')->with("Confirm_status",'Confirm status succeessfully');
   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('employee.dashboard.customer.adduser',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $customer = new Customer();
        $customer->fullname = $req->fullname;
        $customer->username = $req->username;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone = $req->phone;
        $customer->password = $req->password;
        $customer->gender = $req->gender;
        $customer->save();

        return redirect('/employee/dashboard');

    }
 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $customerlist = Customer::paginate(5);
        return view('employee.dashboard.customer.viewuser',$data)->with('customerlist',$customerlist);
    }


    public function search(Request $req)
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $search = $req->get('search');
        $customerlist = DB::table('customers')->where('username' , 'like' , '%'.$search.'%')->paginate(5);
        return view('employee.dashboard.customer.viewuser',$data)->with('customerlist',$customerlist);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $customer = Customer::find($id);
        return view('employee.dashboard.customer.edituser',$data)->with('customer',$customer);
    }
    public function import(Request $req)
    {
        $file = $req->file('file')->store('import');
        Excel::import(new CustomersExport, $file);
        return back()->withStatus('Excel File import successfully');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $customer = Customer::find($id);
        $customer->fullname = $req->fullname;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone = $req->phone;
        $customer->password = $req->password;
        $customer->gender = $req->gender;
        $customer->save();

        return redirect('/employee/dashboard/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Customer::destroy($id)){
            return redirect('/employee/dashboard/view');
        } 
    }
}
