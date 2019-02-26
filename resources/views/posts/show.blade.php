@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px;
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
<?php

  $users=$post->users()->get();
  $count = count($users);?>
<div class="container">
  <div class="row justify-content-center">
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
                <p>{{$count}}</p>
              </div>
            </div>
          </div>
          <div class="col-2">
            <p>
              {{ $comment->where('post_id', $post->id)->count() }}
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
            {{--  <button type="button" class="btn btn-secondary button-like-show">like</button>  --}}
            <a class="like-btn btn btn-secondary" href="{{ route('feeds.like', $post->id) }}">like</a>
          </div>
          <div class="col">
            <button type="button" class="btn btn-secondary button-share-show">share</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-10" style="background:#E8E2E0;border:none;margin-top:10px;border-radius:10px;">
      <div class="card" style="background:none;border:none;">
        <div class="card-body">
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
                <div class="row form-group">
                  <div class="col">
                    <input type="text" name="cmt-text" class="form-control" placeholder=" Add comment"/>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                  </div>
                  <div class="col-2">
                    <input type="submit" class="btn btn-warning" value="Add Comment" />
                  </div>
              </div>
            </form>
          @include('posts.comments_replies', ['comments' => $post->comments, 'post_id' => $post->id])
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
