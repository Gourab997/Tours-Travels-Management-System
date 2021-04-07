<?php

namespace App\Http\Controllers\employee;

use App\Models\User;
use App\Models\Tourguide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TourguideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('employee.dashboard.tourguide.addtourguide',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $tourguide = new Tourguide();
        $tourguide->fullname = $req->fullname;
        $tourguide->username = $req->username;
        $tourguide->email = $req->email;
        $tourguide->phone = $req->phone;
        $tourguide->password = $req->password;
        $tourguide->save();

        return redirect('/employee/dashboard/viewtourguide');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourguide  $tourguide
     * @return \Illuminate\Http\Response
     */
    public function show(Tourguide $tourguide)
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $tourguidelist = Tourguide::paginate(5);
        return view('employee.dashboard.tourguide.viewtourguide',$data)->with('tourguidelist',$tourguidelist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tourguide  $tourguide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $tourguide = Tourguide::find($id);
        return view('employee.dashboard.tourguide.edittourguide',$data)->with('tourguide',$tourguide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tourguide  $tourguide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $tourguide = Tourguide::find($id);
        $tourguide->fullname = $req->fullname;
        $tourguide->email = $req->email;
        $tourguide->phone = $req->phone;
        $tourguide->username = $req->username;
        $tourguide->save();

        return redirect('/employee/dashboard/viewtourguide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourguide  $tourguide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Tourguide::destroy($id)){
            return redirect('/employee/dashboard/viewtourguide');
        } 
    }
    
    public function search(Request $req)
    { $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $search = $req->get('search');
        $tourguidelist = DB::table('tourguides')->where('username' , 'like' , '%'.$search.'%')->paginate(5);
        return view('employee.dashboard.tourguide.viewtourguide',$data)->with('tourguidelist',$tourguidelist);
    }
}
