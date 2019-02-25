
@if(count($books)>0)
    @foreach ($books as $book)
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div style="height:375px" class="card mt-3 py-1">
            <img style="width:75%;height:200px;margin: 0 auto;" class="card-img-top" src="storage/book_img/{{$book->book_img}}" alt="Card image" style="width:100%">
            <div class="card-body">
                <a href=""><h4 class="card-title">{{$book->title}}</h4></a>
                <small class="card-text">by {{$book->author}}</small>
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                        <p class="card-text">
                            {{ str_limit($book->description, $limit = 25, $end = '...') }}
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                        <a href="" class="btn btn-primary round-img"><i class="fa fa-check"></i></a>
                        <a href="" class="btn btn-warning round-img mt-1"><i class="fa fa-cart-plus"></i></a>
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