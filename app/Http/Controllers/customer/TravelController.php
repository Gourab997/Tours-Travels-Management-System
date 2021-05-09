<?php

namespace App\Http\Controllers\customer;


use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controller;
use App\Http\Controllers\Controller as ControllersController;

class TravelController extends ControllersController
{
    public function asia()
    {
        $trips = Trip::where('country', 'Asia')
            ->orWhere('country', 'asia')
            ->get();

        return view('frontend.travel.asia', compact('trips'));
    }
    public function america()
    {
        $trips = Trip::where('country', 'USA')
            ->orWhere('country', 'usa')
            ->get();
        return view('frontend.travel.america')->with('trips', $trips);
    }
    public function europe()
    {
        $trips = Trip::where('country', 'Europe')
            ->orWhere('country', 'europe')
            ->get();
        return view('frontend.travel.europe', [
            'trips' => $trips,
        ]);
    }
    public function canada()
    {
        $trips = Trip::where('country', 'Canada')
            ->orWhere('country', 'canada')
            ->get();

        return view('frontend.travel.canada')->with('trips', $trips);
    }
}
