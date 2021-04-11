@extends('frontend.layouts.master')

@section('main-content')


<div class="conainer" styl="margin-left:5rem">
	<div class="row">
	  <div class="col-md-8 ">
		<div class="card card-profile">
	      <div class="card-header">Payment</div>
		      <div class="card-body">
		      	<form action="{{ route('payment.post') }}" method="POST">
					@csrf

                     <input type="text" name="tripid" value="{{ $id }}" class="form-control" hidden>

				  <div class="form-group">
				    <label >Amount</label>
				    <input type="text" name="amount" class="form-control" placeholder="amount">
				  </div>

				  <div >
				  	<select class="form-select" aria-label="Default select example">
		             <option selected>Select payment method</option>lu
		             <option value="1">master card</option>
		             <option value="2">visa card</option>
		             <option value="3">paypal</option>
		             <option value="3">Bank</option>
		            </select>
				  </div>


				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
		      </div>
		    </div>
		</div>
	</div>


</div>
@endsection




















