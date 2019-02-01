@extends('layouts.app')

@section('content')
    @if($user->has_store==0)
        <h5>
            Click on button below to create your own store
        </h5>
        <a href="stores/create" class="btn btn-success">Create Store</a>
    @endif
    <hr>
    @if(count($stores)>0)
        @foreach($stores as $store)
            <div class="jumbotron">
                <h3><a href="/stores/{{$store->id}}">{{$store->user->name}}'s store<a></h3>
                <p>{{$store->description}}</p>
            </div>
        @endforeach
    @else
        <h1>No store available</h1>
    @endif
@endsection