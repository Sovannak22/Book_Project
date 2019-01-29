@extends('layouts.app')

@section('CSS')
  <link rel="stylesheet" href="/css/custom-feeds.css">
@endsection
@section('JS')
  <script type="text/javascript" src="{{asset('js/feeds.js')}}"></script>
@endsection

@section('content')
  <div class="container post-feeds">
	  <div class="row">
	    <div class="col d-flex justify-content-center">
        <div class="container feeds">
          <div class="d-flex justify-content-center">
            <div class="form-group row upload-group">
              <form class="" enctype="multipart/form-data" action="{{ route('feeds.store') }}" method="POST">
                @csrf
                <input class="status-upload upload-input" type="text" name="description" placeholder=" Tell us! What's in your mind!?">
                <button class="btn btn-success upload-btn" name="button-upload" type="submit">Upload</button>
              </form>
            </div>
          </div>
          @foreach ($posts as $post)
            <div class="d-flex justify-content-center">
              <div class="post-status">
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
                      <p>99 + comments</p>
                    </div>
                  </div>
                  <div class="row cmt-share-btn-group">
                    <div class="col">
                      <button type="button" class="like-btn btn btn-light" name="button-like">like</button>
                    </div>
                    <div class="col">
                      <button type="button" class="comment-btn btn btn-light button-comment" name="button-comment">comment</button>
                    </div>
                    <div class="col">
                      <button type="button" class="share-btn btn btn-light" name="button-share">share</button>
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
@endsection
