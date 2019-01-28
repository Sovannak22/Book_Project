@extends('layouts.app')

@section('content')


<div class="container bg-dark">

    <div class="row">
        <h1 class="col-md-9 text-success">Book Store</h1>
        <div class="dropdown show  font-weight-bold mt-auto  text-success">
            Sorb by
            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Interested
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Interested</a>
                <a class="dropdown-item" href="#">Date</a>
                <a class="dropdown-item" href="#">Name</a>
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

                <div class="card" style="width: 10rem;">
                    <img class="card-img-top img-card" src="storage/book_img/{{ $book->img }}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $book->title }}</h5>

                    </div>
                    <div class="card-footer text-center">
                        <a style="text-decoration: none;" href="#">View Detail</a>
                    </div>
                </div>

            </div>
            @endforeach($books as $book)

            

        </div>

    </div>




</div>
@endsection
