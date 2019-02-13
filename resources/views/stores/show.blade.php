@extends('layouts.store_2')

@section('content')
    <div class="container">
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
                    <h1>{{$store->store_name}}</h1>
                    @foreach($books as $book)
                        <h4>
                            <div class="row">
                                <div>
                                    <img src="" alt="">
                                </div>
                            </div>
                        </h4>
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