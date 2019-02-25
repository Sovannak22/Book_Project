@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row ">
			<div class="col-1">
				
			</div>
<!-- profile image ------------------------------------------------------------------------------------------>
			<div class="col-2 d-flex justify-content-center">
				<div class="btn">
					<img data-toggle="modal" data-target="#imageButton" src="/images/{{Auth::user() ->profile_img}}" style="border-radius: 50%;width: 125px;height: 125px" alt="..." class="img-thumbnail">
				</div>
			</div>
			<div class="col-6">
				<div class="row">
<!-- username -------------------------------------------------------------------------------------------->
					<div class="col-4">
						<b><h2>{{$username}}</h2></b>
					</div>
<!-- follower ----------------------------------------------------------------------------------=====---->
					<div class="col-4">
						<p class="btn" data-toggle="modal" data-target="#followerButton">{{$follower}} Follower</p>
					</div>
<!-- following---------------------------------------------------------------------------------------->
					<div class="col-4">
						<p class="btn" data-toggle="modal" data-target="#followingButton">{{$following}} Following</p>
					</div>
				</div>
<!-- description--------------------------------------------------------------------------------------->
				<div class="row">
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
					</p>
				</div>
			</div>
			<div class="col-2">
				<button style="background-color: green" class="btn btn-success">Edit</button>
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
	<!-- line hr ===========================================================-->
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
	<!-- midle content=============================================================== -->

	<!-- store======================================================================= -->
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
						  	</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-2">
				
			</div>
		</div>
	</div>
	<!-- feed=========================================================================== -->
	<!-- <div>
	@foreach ($posts as $post)
            <div class="d-flex justify-content-center">
              <div class="post-status col-10">
                <div class="post">
                  <div class="row">
                    <div class="col">
                      <div class="user-btn">
                        <a href="#">
                          <div class="row">
                            <img src="/images/cats_blue_eyes_animals_pets_4288x2848.jpg" class="user-img-btn" alt=" ">
                            <p class="user-name-btn">
                              {{ $post->user->name }}
                            </p>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-3">
                      @if (Auth::user()->id != $post->user->id)
                        <button type="button" class="follow-btn btn btn-primary" name="button-follow">
                          + follow
                        </button>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col status-post">
                      <p class="status-text">
                        {{ $post->description }}
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="row like-count">
                        <div class="">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <div class="like-num">
                          <p>1.2 k</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-2">
                      <p>{{ $comment->where('post_id', $post->id)->count() }}
                        @if ($comment->where('post_id', $post->id)->count() <= 1)
                          comment
                        @else
                          comments
                        @endif
                      </p>
                    </div>
                  </div>
                  <div class="row cmt-share-btn-group">
                    <div class="col">
                      <a class="like-btn btn btn-secondary" href="{{ route('feeds.like', $post->id) }}">like</a>
                    </div>
                    <div class="col">
                      <a class="comment-btn btn btn-secondary" href="{{ route('feeds.show', $post->id) }}">comment</a>
                    </div>
                    <div class="col">
                      <a class="share-btn btn btn-secondary">share</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
	</div> -->
	<!-- card=========================================================================== -->
<!-- follower alert===================================================================== -->
<div class="modal fade" id="followerButton" tabindex="-1" role="dialog" aria-labelledby="followerButton" aria-hidden="true" style="margin-top: 5%;">
	<div class="modal-dialog" role="document">
	   <div class="modal-content">
	     <div class="modal-header">
	     	<div class="col-4"></div>
	     	<h5 class="col-4 modal-title text-center" id="followerButton">Follower</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	     </div>
	    	<div class="modal-body" id="followModal">
	      		<div class="container">
	      			<div class="row">
	      				<div class="col-4 d-flex justify-content-center">
							<img src="images/default.jpg" alt="tktk" style="border-radius: 50%;width: 30px;height: 30px">
						</div>
						<div class="col-4 d-flex justify-content-center">
							<p>usename</p>
						</div>
						<div class="col-4 d-flex justify-content-center">
							<button style="height: 30px" class="btn btn-primary">Follow</button>
						</div>

						<div class="col-4 d-flex justify-content-center">
							<img src="images/default.jpg" alt="tktk" style="border-radius: 50%;width: 30px;height: 30px">
						</div>
						<div class="col-4 d-flex justify-content-center">
							<p>usename</p>
						</div>
						<div class="col-4 d-flex justify-content-center">
							<button style="background-color:;height: 30px" class="btn btn-light">Following</button>
						</div>
	      			</div>
	      		</div>
	      	</div>
	   </div>
	  </div>
</div>
<!-- following alert====================================================================== -->
<div class="modal fade" id="followingButton" tabindex="-1" role="dialog" aria-labelledby="followingButton" aria-hidden="true" style="margin-top: 5%;">
	<div class="modal-dialog" role="document">
	   <div class="modal-content">
	     <div class="modal-header">
	     	<div class="col-4"></div>
	     	<h5 class="col-4 modal-title text-center" id="followingButton">Follower</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	     </div>
	    	<div class="modal-body" id="followModal">
	      		<div class="container">
	      			<div class="row">
	      				<div class="col-4 d-flex justify-content-center">
							<img src="images/default.jpg" alt="tktk" style="border-radius: 50%;width: 30px;height: 30px">
						</div>
						<div class="col-4 d-flex justify-content-center">
							<p>usename</p>
						</div>
						<div class="col-4 d-flex justify-content-center">
							<button style="background-color:;height: 30px" class="btn btn-light">Following</button>
						</div>

						<div class="col-4 d-flex justify-content-center">
							<img src="images/default.jpg" alt="tktk" style="border-radius: 50%;width: 30px;height: 30px">
						</div>
						<div class="col-4 d-flex justify-content-center">
							<p>usename</p>
						</div>
						<div class="col-4 d-flex justify-content-center">
							<button style="background-color:;height: 30px" class="btn btn-light">Following</button>
						</div>
	      			</div>
	      		</div>
	      	</div>
	   </div>
	  </div>
</div>
<!-- change image alert==================================================================== -->
<div class="modal fade" id="imageButton" tabindex="-1" role="dialog" aria-labelledby="imageButton" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="height: 40%">
      <div class="modal-header">
      	<div class="col-4"></div>
        <h5 class="modal-title col-4" id="imageButton">Change Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<div class="container">
        		<div class="row">
        			<div class="btn btn-primary btn-file col-12">
        				<form enctype="multipart/form-data" action="{{ route('profile.update',Auth::user()->id) }}" id="form_change_img" method="post">
        					@method('PATCH')
        					@csrf
					    	Upload Photo <input type="file" id="change_img" name="profile_img">
        				</form>
					</div>
        		</div>
        		<hr>
        		<div class="row">
							<a href="{{route('profile.destroy',Auth::user()->id)}}" name="delete_profile" class="btn btn-danger btn-remove col-12">Remove Current Profile</a>
        		</div>
        	</div>
      </div>
    </div>
  </div>
</div>
@endsection