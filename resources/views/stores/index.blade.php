@extends('layouts.store_2')

@section('content')
    <div class="container">
            {{-- If user didn't have store ask them to create store --}}
        @if(Auth::check())
            @if(Auth::user()->has_store==0)
                <h5>
                    Click on button below to create your own store
                </h5>
                <a href="stores/create" class="btn btn-success">Create Store</a>
            @endif
        @endif
        <hr>
        {{-- Test if has store available or not? --}}
        @if(count($stores)>0)
            @foreach($stores as $store)
                <div class="bg-light p-3 rounded mt-3">
                    <h3><a href="/stores/{{$store->id}}">{{$store->store_name}}<a></h3>
                    <p>{{$store->store_description}}</p>
                    <div class="row text-muted">
                        <img width="25px" height="25px" class="ml-3 round-img" src="/images/{{$store->user->profile_img}}" alt="">
                        <p class="pt-1 ml-1">{{$store->user->name}}</p>
                    </div>
                </div>
            @endforeach
        @else
            <h1>No store available</h1>
        @endif
            
    </div>
@endsection