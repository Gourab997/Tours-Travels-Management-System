@extends('frontend.layouts.master')

@section('main-content')



<div class="gtco-section">
    @foreach ($singleTrip as $trip)
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                 <img src="..." class="card-img-top" alt="...">
                <h2>{{ $trip->title }}</h2>
                <p>{{ $trip->description }}</p>
                <p class="card-text"><small class="text-muted">Location: {{ $trip->city }}, {{ $trip->country }}</small></p>
                <a href="{{ route('trip.Payment.form', $trip->id) }}"><p><span class="btn btn-primary">Make Payment</span></p></a>
            </div>
        </div>
        <div class="row">



        </div>
    </div>
    @endforeach

</div>


@endsection
