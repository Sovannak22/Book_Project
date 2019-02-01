@extends('layouts.store_master')
@section('css')
    <link href='https://fonts.googleapis.com/css?family=Devonshire' rel='stylesheet'>
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
            font-family: 'Devonshire';
            color: rgb(255, 255, 255);
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
                <form class="form-inline">
                    <input class="form-control w-75 mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            
        </div>
        <div class="row">

            @foreach ($books as $book)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div style="height:350px" class="card mt-3">
                        <img style="width:75%;height:200px;margin: 0 auto;" class="card-img-top mt-1" src="storage/book_img/{{$book->book_img}}" alt="Card image" style="width:100%">
                        <div class="card-body">
                        <h4 class="card-title">{{$book->title}}</h4>
                        <small class="card-text">by {{$book->author}}</small>
                        <p class="card-text">{{ str_limit($book->description, $limit = 50, $end = '...') }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection