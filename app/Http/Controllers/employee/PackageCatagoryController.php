<?php

namespace App\Http\Controllers\employee;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\packagecatagory;
use App\Http\Controllers\Controller;

class PackageCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('employee.dashboard.package.packagecatagory.createpackagecatagory',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $packagecatagory =  new packagecatagory();
       
        $packagecatagory->packagecatagory = $req->packagecatagory;
   
        $packagecatagory->save();

        return redirect('/employee/dashboard/viewpackagecatagory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $pclist = packagecatagory::all();
        return view('employee.dashboard.package.packagecatagory.indexpackagecatagory',$data)->with('pclist',$pclist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pc_id)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $pscatagory = packagecatagory::findOrFail($pc_id);
        
        return view('employee.dashboard.package.packagecatagory.editpackagecatagory',$data,compact('pscatagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $pc_id)
    {
        $packagecata = packagecatagory::find($pc_id);

        $packagecata->packagecatagory = $req->packagecatagory;
  
       $packagecata->save();

       return redirect('/employee/dashboard/viewpackagecatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($pc_id)
    {
        if(packagecatagory::destroy($pc_id)){
            return redirect('/employee/dashboard/viewpackagecatagory');
        } 
    }
    }

