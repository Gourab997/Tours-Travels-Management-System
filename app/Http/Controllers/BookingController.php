<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\Booking;
use App\Models\Tourguide;
use App\Models\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $packagelist = Package::all();
        return view('dashboard.booking.indexbooking')->with('packagelist',$packagelist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($p_id)
    {    $package = Package::find($p_id);
        return view('dashboard.booking.createbooking')->with('package',$package);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $booking = new booking();
        $booking->pro_id = $req->pro_id;
        $booking->travel_date_start = $req->travel_date_start;
        $booking->travel_date_end = $req->travel_date_end;
        $booking->person = $req->person;
        $booking->username = $req->username;
        $booking->email = $req->email;
        $booking->status = 0;
        $booking->tour_username = null;
        $booking->save();
        return redirect('/dashboard');
   ;
    }
 
   public function storebooking($b_id, Request $req)
   {
    $booking = booking::find($b_id);
     
      
       $booking->status= 1;
       $booking->status = $req->status;
       $booking->save();
     
       return redirect('/dashboard/viewbooking');
  ;
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $bookinglist =  DB::table('bookings')
        ->join('packages','packages.p_id','=','bookings.pro_id')
        ->get();
        $packages= Package::get();

       $data =['packages' => $packages,
    'bookinglist' =>  $bookinglist,

    ];
        return view('dashboard.booking.viewbooking')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
