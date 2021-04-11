<?php

namespace App\Http\Controllers\customer;

use App\Models\BookedTrip;
use App\Models\Trip;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controller;
use App\Http\Controllers\Controller as ControllersController;
use Illuminate\Support\Facades\Auth;

class TripController extends ControllersController
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
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleTrip = Trip::where('id', $id)->get();

        return view('frontend.travel.singlepageTrip')->with('singleTrip', $singleTrip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }

    public function payment(Request $req)
    {
        $trip = new BookedTrip;

        //$user = user::where('id', '=', session('LoggedUser'))->first();
        $trip->user_id = session('LoggedUser');
        $trip->trip_id = $req->tripid;

        if ($trip->save()) {
            return view('frontend.travel.thankYou');
        }


        return back();
    }
    public function paymentform($id)
    {

        return view('frontend.travel.payment', compact('id'));
    }
}
