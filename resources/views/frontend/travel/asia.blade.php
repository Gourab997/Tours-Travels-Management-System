@extends('frontend.layouts.master')

@section('main-content')



<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2>Most Popular Destination</h2>
                <p>You can pick the most attractive place here!</p>
            </div>
        </div>
        <div class="row">
        @foreach ($trips as $trip)
        <div class="col-lg-4 col-md-4 col-sm-6">
            <a href="images/01.jpg" class="fh5co-card-item image-popup">
                <figure>
                    <div class="overlay"><i class="ti-plus"></i></div>
                    <img src="images/02.jpg" alt="Image" class="img-responsive">
                </figure>
                <div class="fh5co-text">
                    <h2>{{ $trip->title }}</h2>
                    <p>{{ $trip->description }}</p>
                    <p>Location : {{ $trip->city }}, {{ $trip->country }}</p>
                    <a href="{{ route('view.Trip', $trip->id) }}"><p><span class="btn btn-primary">View Trip</span></p></a>

                </div>
            </a>
        </div>

        @endforeach

        </div>
    </div>
</div>

<div id="gtco-features">
    <div class="gtco-container">
        <div class="row">

        </div>

            </div>


        </div>
    </div>
</div>


<div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="gtco-container text-center">
        <div class="display-t">
            <div class="display-tc">
                <h1>We have high quality services that you will surely love!</h1>
            </div>
        </div>
    </div>
</div>

<div id="gtco-counter" class="gtco-section">
    <div class="gtco-container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>Our Success</h2>
                <p>One step closer to your dream of journey.</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-center">
                    <span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Destination</span>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-center">
                    <span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Hotels</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-center">
                    <span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Travelers</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-center">
                    <span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Happy Customer</span>

                </div>
            </div>

        </div>
    </div>
</div>



<div id="gtco-subscribe">
    <div class="gtco-container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2>Subscribe</h2>

            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-inline">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
