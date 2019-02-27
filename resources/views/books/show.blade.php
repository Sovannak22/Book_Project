@extends('layouts.store_2')


@section('content')
<style>
    .checked {
    color: orange;
    }
</style>
    <div class="container bg-fav p-3 rounded mb-3">
        <div class="row bg-fav" style="height:25rem;margin-top:10%;margin-bottom:10%;">
            <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center bg-fav">
                <img class="rounded" src="/storage/book_img/{{$book->book_img}}" class="h-100 w-75" alt="{{$book->book_img}}">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 bg-fav text-light">
                <h1 class=" my-3">Title: {{$book->title}}</h1>
                <h4 class=" my-3">By: {{$book->author}}</h4>
                <div class="text-light row">
                        
                    <h1 class="col-md-3">Rate:</h1>
                    <h1 class="col-md-2">{!! floor(($book->averageRating())*10)/10; !!}</h1>
                    <h1>
                        <span class="fa fa-star checked"></span>
                    </h1>
                </div>
                <h5 class="rounded w-50 p-3 my-3 bg-primary ">
                    Price: {{$book->price}}$
                </h5>
                <h4 class=" my-3"></h4>
                <h4><a href="" class="text-light">Store: {{$store->store_name}}</a></h4>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 bg-fav">
                <a href="" class="btn btn-success w-100 p-3 mt-5"><h3><i class="fa fa-check mt-1 mr-1"></i>Buy</h3></a>
                <button class="btn btn-warning w-100 p-3 mt-5 text-light" onclick="alertAddToCart(this)"><h3><i class="fa fa-cart-plus"></i>Add To Cart</h3></button>
            </div>
        </div>
        <div >
            {!! Form::open(['route' => ['books.rate',$book->id], 'method' => 'POST']) !!}
                    <div class="ml-2">
                        @include('books.here');
                        
                    </div>

                    <div class="form-group ">
                        
                        {!! Form::submit('Rate',['class'=>'btn btn-primary']) !!}
                    </div>
    
            {!! Form::close() !!}

        </div>

    </div>
    <div class="container-fluid" style="position:relative">
        @include('etc.footer')
    </div>
@endsection