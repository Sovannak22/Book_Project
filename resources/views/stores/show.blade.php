@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!Auth::guest())
            @if( (Auth::user()->id) == ($books[0]->store->user->id) )
                <a href="http://" class="btn btn-primary">
                    Manage Store
                </a>
            
            @endif
        @endif
        <hr>
        <h1>{{$books[0]->store->user->name}}'s store</h1>
        @foreach($books as $book)
            <h4>
                <div class="row">
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
            </h4>
        @endforeach
    </div>
@endsection