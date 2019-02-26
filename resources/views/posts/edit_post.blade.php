@extends('layouts.app')

@section('CSS')
  <link rel="stylesheet" href="/css/custom-feeds.css">
@endsection
@section('JS')
  <script type="text/javascript" src="{{asset('js/feeds.js')}}"></script>
@endsection

@section('content')
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
        </div>
        <div class="status-post-update">
          <form class="" enctype="multipart/form-data" action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            <input class="status-upload update-input" type="text" name="description" value="{{$post->description}}">
            <button class="btn btn-success update-btn" name="button-upload" type="submit">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
