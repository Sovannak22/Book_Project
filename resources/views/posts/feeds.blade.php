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
            <div class="form-group row upload-group col-10">
              <form class="" enctype="multipart/form-data" action="{{ route('feeds.store') }}" method="POST">
                @csrf
                <input class="status-upload upload-input" type="text" name="description" placeholder=" Tell us! What's in your mind!?">
                <button class="btn btn-success upload-btn" name="button-upload" type="submit">Upload</button>
              </form>
            </div>
          </div>
          @foreach ($posts as $post)
            <div class="d-flex justify-content-center">
              <div class="post-status col-10">
                <div class="post">
                  <div class="row">
                    <div class="col-11">
                      <div class="user-btn">
                        <a href="{{route('profile.index', $post->user_id)}}">
                          <img src="/images/cats_blue_eyes_animals_pets_4288x2848.jpg" style="width:50px;height:50px;margin-left:15px;margin-top:15px;border-radius: 50%;" alt="">
                        </a>
                        <a class="" href="{{route('profile.index', $post->user_id)}}">
                          <p style="margin-top:20px;margin-left: 10px;font-size:20pt;">{{$post->user->name}}</p>
                        </a>
                      </div>
                    </div>
                    <div class="col-1">
                      @if (Auth::user()->id != $post->user->id)
                        <div class="col-5">
                          <a href="{{route('post.edit', $post->id)}}" class="btn"><i class="far fa-edit"></i></a>
                          <a href="{{route('post.delete', $post->id)}}" class="btn"><i class="far fa-trash-alt"></i></a>
                        </div>
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
                          <p>
                            1.2k
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
        </div>
      </div>
    </div>
  </div>
@endsection
