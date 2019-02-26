@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row ">
			<div class="col-1">

			</div>
<!-- profile image ------------------------------------------------------------------------------------------>
			<div class="col-2 d-flex justify-content-center">
				<div class="btn">
					<img data-toggle="modal" data-target="#imageButton" src="/images/{{$user->profile_img}}" style="border-radius: 50%;width: 125px;height: 125px" alt="..." class="img-thumbnail">
				</div>
			</div>
			<div class="col-6">
				<div class="row">
<!-- username -------------------------------------------------------------------------------------------->
					<div class="col-4">
						<b><h2>{{$user->name}}</h2></b>
					</div>
<!-- follower ----------------------------------------------------------------------------------=====---->
					<div class="col-4">
						<p class="btn" data-toggle="modal" data-target="#followerButton">{{$follower}} Following</p>
					</div>
<!-- following---------------------------------------------------------------------------------------->
					<div class="col-4">
						<p class="btn" data-toggle="modal" data-target="#followingButton">{{$following}} Follower</p>
					</div>
				</div>
<!-- description--------------------------------------------------------------------------------------->
				<div class="row">
					<p>{{Auth::user() ->bio}}</p>
				</div>
			</div>
			<div class="col-2">
				<a href="{{ route('editprofile.edit',Auth::user()->id)}}" class="btn btn-success">Edit</a>
				<!-- <button style="background-color: green" class="btn btn-success">Edit</button> -->
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
	<!-- line hr =========================================================== -->
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
	<div class="container-fluid" id="store_content">
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
	<div class="container-fluid" id="feed_content" style="display: none;">
		<div class="row">
			<div class="col-2">

			</div>
			<div class="col-8">
				<div class="row" style="margin-bottom : 10px">
					 <div class="container post-feeds">
						  <div class="row">
						    <div class="col d-flex justify-content-center">
					        <div class="container feeds">
										@foreach ($posts as $post)
									<?php
									$users=$post->users()->get();
									$count = count($users);?>
									<div class="d-flex justify-content-center">
										<div class="post-status col">
											<div class="post">
												<div class="row">
													<div class="col-8">
														<div class="row">
															<a href="{{route('profile.index', $post->user_id)}}">
																<img src="/images/cats_blue_eyes_animals_pets_4288x2848.jpg" style="width:50px;height:50px;margin-left:15px;margin-top:15px;border-radius: 50%;" alt="">
															</a>
															<a class="" href="{{route('profile.index', $post->user_id)}}">
																<p style="margin-top:20px;margin-left: 10px;font-size:20pt;">{{$post->user->name}}</p>
															</a>
														</div>
													</div>
													<div class="col-4">
														<div class="row">
															<div class="col-8">
																{{-- <button type="button" name="button" style="margin-top:20px;margin-left:50px;">follow</button> --}}
																<a href="#" class="btn btn-primary" style="margin-top:20px;margin-left:70px;">follow</a>
															</div>
															<div class="col-2">
																@if (Auth::user()->id == $post->user->id)
																	<div class="col">
																		<a href="{{route('post.edit', $post->id)}}" class="btn"><i class="far fa-edit"></i></a>
																		<a href="{{route('post.delete', $post->id)}}" class="btn"><i class="far fa-trash-alt"></i></a>
																	</div>
																@endif
															</div>
														</div>
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
																<p>
																	{{$count}}
																</p>
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
														<a class="like-btn btn btn-secondary" href="{{ route('feeds.like', $post->id) }}"	style="width:115%;">like</a>
													</div>
													<div class="col">
														<a class="comment-btn btn btn-secondary" href="{{ route('feeds.show', $post->id) }}" style="width:120%;margin-left:-16px;">comment</a>
													</div>
													<div class="col">
														<a class="share-btn btn btn-secondary" style="width:111.5%;">share</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
					        </div>
					      </div>
					    </div>
					  </div>
				</div>
			</div>
			<div class="col-2">

			</div>
		</div>
	</div>
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
						@foreach($followingNotCount as $user)
	      			<div class="row">

							<div class="col-4 d-flex justify-content-center">
							<img src="images/default.jpg" alt="tktk" style="border-radius: 50%;width: 30px;height: 30px">
							</div>
							<div class="col-4 d-flex justify-content-center">
								<p>{{$user->name}}</p>
							</div>
							<div class="col-4 d-flex justify-content-center">
								<button style="background-color:;height: 30px" class="btn btn-light">Following</button>
							</div>
						@endforeach
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
					@foreach($followerUsers as $user)
	      		<div class="container">
	      			<div class="row">
							@php
								$hasFollow=0;
								$user_1 = DB::table('users')->where('id',$user->follower_id)->get();
								$user_name = ($user_1[0]->name);
								foreach ($followingNotCount as $following){
									//dd($user);
									if ($following->user_id==$user->follower_id){
										$hasFollow=1;
										break;
									}
								}
							@endphp
							<div class="col-4 d-flex justify-content-center">
							<img src="images/default.jpg" alt="tktk" style="border-radius: 50%;width: 30px;height: 30px">
							</div>
							<div class="col-4 d-flex justify-content-center">
								<p>{{$user_name}}</p>
							</div>
							<div class="col-4 d-flex justify-content-center">
								@if($hasFollow)
								<a style="background-color:;height: 30px" class="btn btn-light" href="#">Following</a>
								@else
								<a style="background-color:;height: 30px" class="btn btn-primary" href="#">Follow</a>
								@endif
							</div>
						@endforeach
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
        			<div class="col-12 ">
					    <form action="{{ route('profile.destroy', Auth::user()->id)}}" method="post" id="form_change_img" >
	                 		@csrf
	                  		@method('DELETE')
	                  		<button class="btn btn-danger btn-remove col-12" type="submit" id="change_img">Remove Current Profile</button>
                		</form>
					</div>
        		</div>
        	</div>
      </div>
    </div>
  </div>
</div>
@endsection
