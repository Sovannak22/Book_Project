@extends('layouts.store_master')
@section('css')
    <link href='https://fonts.googleapis.com/css?family=Devonshire' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/bookIndex.css') }}">
    <style>
        .masthead {
        /* margin-bottom: 50px; */
        background: no-repeat center center;
        background-color: #868e96;
        position: relative;
        height: 25rem;
        background-size: cover;
        /* padding-top: 20%; */
        }
        .background-header{
            background-image: url('storage/site_image/book_wallpaper.jpg');
            background-repeat: no-repeat;
            background-position: center; 
            filter: blur(8px);
            -webkit-filter: blur(5px);
            height: 100%;
            background-size: cover;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        @media only screen and (max-width: 1000px) {
            .navbar-expand-lg {
                background: rgba(0,0,0,0.5) !important;
            }
        }
        #site_name{
            position: absolute;
            z-index: 1;
            top: 10%;
            left: 50%;
            margin-top: 10px;
            margin-left: -145px;
            color: rgb(255, 255, 255);
        }
        #site_name>h1,#site_name>p{
            font-family: 'Devonshire';
        }
        #site_name>h1{
            font-size: 5rem;
        }
        #site_name>p{
            font-size: 2rem;
        }
    </style>
@endsection

@section('header')
    <header class="masthead" style="">
        <div class="background-header"></div>
    </header>
@endsection

@section('content')
    <!-- Page Header -->


    <div class="container">
        <div>
            <div id="site_name" class="text-center">
                <h1><b>Site name</b></h1>
                <p>Hey!we have that book you like.</p>
                <form action="\searchBooks" class="form-inline" method="GET">
                    <input name="searchBook" class="form-control w-75 mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success mt-1" type="submit">Search</button>
                </form>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Categories
                    </button>
                    <div class="dropdown-menu">
                        <button id="cat0" class="dropdown-item" value="0">All</button>
                        @foreach ($categories as $category)
                            <button id="cat{{$category->id}}" class="dropdown-item" value="{{$category->id}}">{{$category->category}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="books_show">
            @if(count($books)>0)
                @foreach ($books as $book)
                <div class="col-sm-3 my-3">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img style="border-radius:0% !important" class="img-fluid" src="storage/book_img/{{$book->book_img}}" alt="card image">
                                            <h4 class="card-title">{{ $book->title }}</h4>
                                            <p class="card-text">Author: <b>{{ $book->author }}</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title">{{ $book->title }}</h4>
                                            <p class="card-text">{{ $book->description }}</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button class="btn btn-warning rounded" onclick="alertAddToCart(this)" value="{{$book->id}}">
                                                <i class="fa fa-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


            </div>
                @endforeach
            @else
                <div class="container-fluid mt-5">
                    <h1 class="text-center">
                        No book found
                    </h1>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/addToCart.js') }}"></script>
    <script>
        $(document).ready(function(){
            @foreach($categories as $category)
                $("#cat{{$category->id}}").click(function(){
                    var cat = $("#cat{{$category->id}}").val();
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: "{{url('/productCat')}}",
                        data: 'cat_id=' + cat,
                        success:function(response){
                            $("#books_show").html(response);
                        }
                    });
                });
            @endforeach
            $("#cat0").click(function(){
                var cat = $("#cat0").val();
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: "{{url('/productCat')}}",
                    data: 'cat_id=' + cat,
                    success:function(response){
                        console.log(response);
                        $("#books_show").html(response);
                    }
                });
            });
        });
    </script>
@endsection