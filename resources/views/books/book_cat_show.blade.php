
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
                            <p class="card-text">Store: <b>{{ $book->store->store_name }}</b></p>
                        </div>
                    </div>
                </div>
                <div class="backside">
                    <div class="card">
                        <div class="card-body mt-4">
                            <h4 class="card-title">{{ $book->title }}</h4>
                            <p class="card-text">By: {{$book->author}}</p>
                            <p class="card-text">Category:  @foreach($book->categories as $category) <span class="bg-primary rounded p-1">{{$category->category}}</span> @endforeach</p>
                            <p class="card-text">{{ str_limit($book->description, $limit = 75, $end = '...') }}</p>
                            <a href=""><small class="card-text">Store: {{$book->store->store_name}}</small></a>
                        </div>
                        <div class="card-footer text-center">
                            @if($book->store->user->id != Auth::user()->id)
                            <button class="btn btn-warning rounded py-1" onclick="alertAddToCart(this)" value="{{$book->id}}">
                                <i class="fa fa-cart-plus"></i>
                            </button>
                            <a href="" class="btn btn-success rounded"><i class="fa fa-check"></i></a>
                            @else
                            <div class="d-flex justify-content-center">
                                {{-- {!!Form::open(['action'=> ['BookController@destroy',$book->id],'method' => 'POST'])!!}
                                {!!Form::hidden('_method','DELETE')!!}
                                {!!Form::button('<i class="fa fa-trash"></i>',['type'=>'submit','class' => 'btn btn-danger'])!!}
                                {!!Form::close()!!} --}}
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                <a href="/books/{{$book->id}}/edit" class="btn btn-warning"><i class="fa fa-pencil-square"></i></a>
                            </div>
                            @endif
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