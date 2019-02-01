@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row ">
			<div class="col-1">
				
			</div>
			<div class="col-2 d-flex justify-content-center">
				<img src="images/{{Auth::user() ->profile_img}}" style="border-radius: 50%;width: 125px;height: 125px" alt="..." class="img-thumbnail">
			</div>
			<div class="col-6">
				<div class="row">
					<div class="col-4">
						<b><h2>{{$username}}</h2></b>
					</div>
					<div class="col-4">
						<p class="btn">Follower {{$follower}}</p>
					</div>
					<div class="col-4">
						<p class="btn">Following {{$following}}</p>
					</div>
				</div>
				<div class="row">
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
					</p>
				</div>
			</div>
			<div class="col-2">
				<button style="background-color: green">Edit</button>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-3">
				
			</div>
			<div class="col-6">
				<div class="row" id="myDIV">
					<div class="col-4 d-flex justify-content-center button btn1-active" id="fbtn">
						<i class="fas fa-store-alt btn" style="font-size: 30px"></i>
					</div>
					<div class="col-4 d-flex justify-content-center button" id="sbtn">
						<i class="fas fa-clipboard btn" style="font-size: 30px"></i>
					</div>
					<div class="col-4 d-flex justify-content-center button" id="tbtn">
						<i class="fas fa-cart-arrow-down btn" style="font-size: 30px"></i>
					</div>
				</div>
				<div class="row">
					<div class="col-4 d-flex justify-content-center">
						<p>Store</p>
					</div>
					<div class="col-4 d-flex justify-content-center">
						<p>Feed</p>
					</div>
					<div class="col-4 d-flex justify-content-center">
						<p>Cart</p>
					</div>
				</div>
			</div>
			<div class="col-3">
				
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2">
			
			</div>
			<div class="col-8" style="margin-top: -15px">
				<hr>
			</div>
			<div class="col-2">
				
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2">
				
			</div>
			<div class="col-8">
				<div class="row" style="margin-bottom : 10px">
					@foreach($books as $book)
					<div class="col-4" style="height:350px">
						<div class="card">
						  	<img class="card-img-top" src="images/{{$book->book_img}}" alt="Card image cap" style="width:75%;height:200px;margin: 0 auto;">
						  	<div class="card-body">
						    	<h5 class="card-title">{{$book->title}}</h5>
						    	<p class="card-text">{{str_limit($book->description,$limit = 100, $end = '...')}}</p>
						    	<div style="text-align: center;">
						    		<a href="#" class="btn btn-success">Edit</a>
						    		<a href="#" class="btn btn-danger">delete</a>
						    	</div>
						  	</di100
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-2">
				
			</div>
		</div>
	</div>
@endsection