<?php

namespace App\Http\Controllers\employee;

use App\Models\User;

use Illuminate\Http\Request;

use App\Models\feedbackcatagory;
use App\Http\Controllers\Controller;

class FeedbackcatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('employee.dashboard.feedback.feedbackcatagory.createfeedbackcatagory',$data);
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
    public function store(Request $req)
    { $feedbackcatagory =  new feedbackcatagory();
       
        $feedbackcatagory->feedbackcatagory = $req->fCatagory;
   
        $feedbackcatagory->save();

        return redirect('/employee/dashboard/viewfeedbackcatagory');
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
        $fclist = feedbackcatagory::all();
        return view('employee.dashboard.feedback.feedbackcatagory.indexfeedbackcatagory',$data)->with('fclist',$fclist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fc_id)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $fscatagory = feedbackcatagory::findOrFail($fc_id);
        
        return view('employee.dashboard.feedback.feedbackcatagory.editfeedbackcatagory',$data,compact('fscatagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $fc_id)
    {
        $feedbackcatagory = feedbackcatagory::find($fc_id);

         $feedbackcatagory->feedbackcatagory = $req->fCatagory;
   
        $feedbackcatagory->save();

        return redirect('/employee/dashboard/viewfeedbackcatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fc_id)
    {
        if(feedbackcatagory::destroy($fc_id)){
            return redirect('/employee/dashboard/viewfeedbackcatagory');
        } 
    }
}
