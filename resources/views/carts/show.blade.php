@extends('layouts.store_2')


@section('content')
<div class="container">    
    <h1>
        Your cart
    </h1>
    <hr>
    <div>
    @if (count($books)>0)
        @foreach ($books as $book)
            <div class="bg-primary py-3 px-5 my-3 rounded ">
                <div class="row">
                    <img class="mr-5" width="100px" height="150px" src="storage/book_img/{{$book->book_img}}" alt="">
                    <div>
                        <div>
                            <a href=""><h1>{{$book->title}}</h1></a>
                        </div>
                        <p>
                            {{$book->description}}
                        </p>
                        <small class="text-secondary">By: {{$book->author}}</small>
                        <h4>
                            @php
                                $store = DB::table('stores')->where('id',$book->store_id)->get();
                            @endphp
                            Store: {{$store[0]->store_name}}
                        </h4>
                    </div>
                    <div class="ml-auto">
                        <button class="btn btn-success round-img">
                            <i class="fa fa-money"></i>
                        </button>
                        <button class="btn btn-danger round-img">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        
    @endif
    </div>
</div>
@endsection