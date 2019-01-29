@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>

@section('CSS')
  <link rel="stylesheet" href="/css/custom-feeds.css">
    <link rel="stylesheet" href="/css/custom-show.css">
@endsection
@section('JS')
  <script type="text/javascript" src="{{asset('js/feeds.js')}}"></script>
@endsection

@section('content')

<div class="container">
  <div class="row justify-content-center">
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
            <button type="button" class="btn btn-light button-like-show">like</button>
          </div>
          <div class="col">
            <button type="button" class="btn btn-light button-share-show">share</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="cmt-block">
      <div class="col add-cmt">
        <form method="post" >
          @csrf
          <input type="text" name="cmt-text" class="cmt-input" >
          <input type="hidden" name="post_id" value="{{ $post->id }}" />
          <button type="submit" name="button-add-cmt" class="btn btn-success add-cmt-btn">comment</button>
        </form>
      </div>
      <div class="show-cmt">
        <hr/>
        <h4>Display Comments</h4>
        @include('posts.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
        <hr />
      </div>
    </div>
  </div>
</div>
@endsection
