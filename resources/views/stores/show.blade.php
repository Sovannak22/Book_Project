@extends('layouts.store_2')
@section('css')
    <link href="{{ asset('css/book_page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bookIndex.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <h1>{{$store->store_name}}</h1>
        @if(!Auth::guest())
            @if( (Auth::user()->id) == ($store->user->id) )
                <a href="/managestore/{{Auth::user()->store->id}}" class="btn btn-primary">
                    Manage Store
                </a>
            
            @endif
        @endif
            <?php $books=$store->books; ?>
            <hr>
            <div style="height:30rem">
                @if(count($books)>0)
                    @foreach($books as $book)
                    <div class="col-sm-3 my-3">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img style="border-radius:0% !important" class="img-fluid" src="/storage/book_img/{{$book->book_img}}" alt="{{$book->book_img}}">
                                            <h4 class="card-title">{{ $book->title }}</h4>
                                            <p class="card-text">Store: <b>{{ $book->store->store_name }}</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="backside">
                                        <div class="card rounded">
                                            <div class="card-body mt-4">
                                                <h4 class="card-title">{{ $book->title }}</h4>
                                                <p class="card-text">By: {{$book->author}}</p>
                                                <p class="card-text">Category:  @foreach($book->categories as $category) <span class="bg-primary rounded p-1">{{$category->category}}</span> @endforeach</p>
                                                <p class="card-text">{{ str_limit($book->description, $limit = 50, $end = '...') }}</p>
                                                <a href=""><small class="card-text">Store: {{$book->store->store_name}}</small></a>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if($book->store->user->id != Auth::user()->id)
                                                <button class="btn btn-warning rounded py-1" onclick="alertAddToCart(this)" value="{{$book->id}}">
                                                    <i class="fa fa-cart-plus"></i>
                                                </button>
                                                <a href="" class="btn btn-success rounded"><i class="fa fa-check"></i></a>
                                                @else 
                                                <button class="btn btn-danger rounded py-1" onclick="alertAddToCart(this)" value="{{$book->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <a href="/books/{{$book->id}}/edit" class="btn btn-warning rounded"><i class="fa fa-pencil-square"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else 
                    <h1>
                        No book found
                    </h1>
                @endif
            </div>
    </div>
    @include('etc.footer')
@endsection