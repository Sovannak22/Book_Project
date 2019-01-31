@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/bookIndex.css') }}">
@endsection
@section('content')


<div class="container ">

    <div class="row">
        <h1 class="col-md-9 text-success">Book Store</h1>
        <div class="col-md-3 dropdown show  font-weight-bold mt-auto  text-success">
            Sorb by
            <a class="dropbtn btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Interested
            </a>

            <div class="dropdown-content" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Interested</a>
                <a class="dropdown-item" href="#">Date</a>
                <a class="dropdown-item" href="#">Name</a>
            </div>
        </div>
        <div>
                <div class="col-sm-3 my-3">

                        <div class="card" style="width: 3rem !important;">
                            <a href="#">
                                <img style="height:3rem; width:3rem;" class="card-img-top img-thumbnail" src="storage/book_img/add_more.png" alt="Card image cap" title="Add Book">
                            </a>
                            {{-- <div class="card-body text-center">
                                <h5 class="card-title">add Book</h5>
        
                            </div> --}}                 
                        </div>
                </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="text-success">
            Example1
        </div>
        <div class="row">

            @foreach ($books as $book)
            
            <div class="col-sm-3 my-3">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="storage/book_img/{{ $book->img }}" alt="card image"></p>
                                            <h4 class="card-title">{{ $book->title }}</h4>
                                            <p class="card-text">Author: <b>{{ $book->author }}</b> </p>
                                            {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> --}}
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
                                            <a href="#" ><img src="storage/book_img/add_to_card.png" title="Add to Card"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{-- 
                <div class="card" style="width: 10rem;">
                    <img class="card-img-top img-thumbnail" src="storage/book_img/{{ $book->img }}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $book->title }}</h5>

                    </div>
                    <div class="card-footer text-center">
                        <a style="text-decoration: none;" href="#">View Detail</a>
                    </div>
                </div> --}}

            </div>
            @endforeach($books as $book)

            

        </div>

    </div>




</div>
@endsection
