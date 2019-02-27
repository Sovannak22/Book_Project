@extends('layouts.store_2')

@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div style="height:10rem" class="text-center bg-danger rounded pt-5">
                    <h1>Sold: {{$sold}}</h1>
                    <h4 class="text-light">
                        Income: @php echo sprintf("%.2f", $income); @endphp
                    </h4>
                </div>
            </div>
            
            @if (count($store->books)>0)
            <div class="row col-lg-8 col-md-8 col-sm-12 col-12">
                @if(count($books)>0)
                    @if($bookSide>0)
                        <div style="height:10rem" class="col-lg-{{$bookSide}} col-md-{{$bookSide}} col-sm-{{$bookSide}} col-{{$bookSide}} bg-primary pt-5">
                            <h1 class="text-center">
                                Book: {{count($store->books)}}
                            </h1>
                        </div>
                    @endif
                    @if((12-$bookSide)>0)
                        <div style="height:10rem" class="rounded col-lg-{{12-$bookSide}} col-md-{{12-$bookSide}} col-sm-{{12-$bookSide}} col-{{12-$bookSide}} bg-success pt-5">
                            <h1 class="text-center">
                                Free: {{$store->store_type->amount - count($store->books)}}
                            </h1>
                        </div>
                    @endif
                @endif
            </div>
            @else
            <div class="row col-lg-8 col-md-8 col-sm-12 col-12">
                <div style="height:10rem" class="bg-success col-lg-12 col-md-12 pt-5">
                    <h1 class="text-center">
                        Free: {{$store->store_type->amount - count($store->books)}}
                    </h1>
                </div>
            </div>
            @endif
        </div>
        <div>
            <div class="row">
                
                <div style="height:40rem" class="rounded mt-5 pt-5 text-muted col-lg-6 col-md-6 col-sm-12 col-12 bg-light">
                    <div >
                        <h1 class="text-muted mt-5">Store Info</h1>
                        <h1 class="text-muted mt-5">
                            {{$store->store_name}}
                        </h1>
                        <h3 class="mt-5">
                            Address: {{$store->address}}
                        </h3>
                        <h3 class="mt-5">
                            Phone number: {{$store->phone_number}}
                        </h3>
                        <h3 class="mt-5">
                            Email: {{$store->email}}
                        </h3>
                        <a href="" class="btn btn-primary w-100 mt-5">Edit store info</a>
                    </div>
                </div>
                                
                <div style="height:40rem" class="rounded mt-5 pt-5 col-lg-6 col-md-6 col-sm-12 col-12 bg-primary">
                    <div >
                        <h1 class="mt-5">Store Info</h1>
                        <div style="height: 25rem">
                            @if(count($store->books)>0)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Book</th>
                                            <th>Author</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <th>{{$book->title}}</th>
                                                <th>{{$book->author}}</th>
                                                <th>{{ str_limit($book->description, $limit = 25, $end = '...') }}</th>
                                                <th>
                                                    <a class="btn btn-secondary" href="/books/{{$book->id}}/edit">Edit</a>
                                                </th>
                                                <th>
                                                    <button class="btn btn-danger rounded py-1" onclick="alertDelete(this,'{{csrf_token()}}')" value="{{$book->id}}">
                                                        <i class="fa fa-trash my-1 mx-2"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                {{-- {{$books->links()}} --}}
                            @else
                                <h1>No book found</h1>
                            @endif
                        </div>
                        <a href="/books/create" class="btn btn-success mt-1 w-100">Add book</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('js/deleteBook.js') }}"></script>
@endsection