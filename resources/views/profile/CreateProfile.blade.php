@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row ">
			<div class="col-1">
				
			</div>
			<div class="col-2 d-flex justify-content-center">
				<img src="/images/yoobro.jpg" style="border-radius: 50%;width: 125px;height: 125px" alt="..." class="img-thumbnail">
			</div>
			<div class="col-6">
				<div class="row">
					<div class="col-4">
						<b><h2>username</h2></b>
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
				<button style="background-color: green">Follow</button>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-3">
				
			</div>
			<div class="col-6">
				<div class="row">
					<div class="col-4 d-flex justify-content-center">
						<i class="fas fa-store-alt btn" style="font-size: 30px"></i>
					</div>
					<div class="col-4 d-flex justify-content-center">
						<i class="fas fa-clipboard btn" style="font-size: 30px"></i>
					</div>
					<div class="col-4 d-flex justify-content-center">
						<i class="fas fa-book-reader btn" style="font-size: 30px"></i>
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
						<p>Library</p>
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
					<div class="col-4">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src=".../100px180/" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <a href="#" class="btn btn-primary">Buy</a>
						    <a href="#" class="btn btn-primary">Add to Library</a>
						  </div>
						</div>
					</div>
					<div class="col-4">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src=".../100px180/" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <a href="#" class="btn btn-primary">Go somewhere</a>
						  </div>
						</div>
					</div>
					<div class="col-4">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src=".../100px180/" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <a href="#" class="btn btn-primary">Go somewhere</a>
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src=".../100px180/" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <a href="#" class="btn btn-primary">Go somewhere</a>
						  </div>
						</div>
					</div>
					<div class="col-4">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src=".../100px180/" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <a href="#" class="btn btn-primary">Go somewhere</a>
						  </div>
						</div>
					</div>
					<div class="col-4">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src=".../100px180/" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <a href="#" class="btn btn-primary">Go somewhere</a>
						  </div>
						</div>
					</div>
				</div>

			</div>
			<div class="col-2">
				
			</div>
		</div>
	</div>
@endsection