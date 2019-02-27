@extends('layouts.app')

@section('content')
<div class="container" style="background-color: white;">
    <div class="row">
        <div class="col-4 d-flex justify-content-center">
              Profile image
        </div>
        <div class="col-4 d-flex justify-content-center">
            <p>Username</p>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <p>Action</p>
        </div>
    </div>
</div>
@foreach($users as $user)
  @if (Auth::user()->id != $user->id)
    <div class="container" style="background-color: white;">
      <div class="row">
          <div class="col-4 d-flex justify-content-center">
                <img src="images/{{ $user->profile_img }}" alt="tktk" style="border-radius: 50%;width: 30px;height: 30px">
          </div>
          <div class="col-4 d-flex justify-content-center">
              <p>{{ $user->name }}</p>
          </div>
          <div class="col-4 d-flex justify-content-center">
            @php //dd($follows); @endphp
            @if(count($follows)>0)

              @foreach ($follows as $follow)
              @php
                $hasFollow=0;
                //$user=Auth::user();
                foreach ($followingNotCount as $following){
                  
                  if ($following->user_id==$user->id){
                    $hasFollow=1;
                    break;
                  }
                }
              @endphp
              @if ($hasFollow==1)
                <a style="background-color:;height: 30px" class="btn btn-light" href="#">Following</a>
              @else 
                <a style="background-color:;height: 30px" class="btn btn-primary"href="{{route('follow.follow', $user->id)}}">Follow</a>
              @endif
              @endforeach
            @else
             <a style="background-color:;height: 30px" class="btn btn-primary" href="{{route('follow.follow', $user->id)}}">Follow</a>
            @endif
          </div>
        </div> 
    </div>
  @endif

  @endforeach

@endsection