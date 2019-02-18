@extends('layouts.store_2')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3">

    </div>
    <div class="jumbotron col-lg-6 col-md-6 col-sm-12 col-12">
        <h1 class="text-dark">Edit {{$book->title}}</h1>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <img src="/storage/book_img/{{$book->book_img}}" class="rounded" alt="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 bg-success p-3 rounded">
                <h3>Title: {{$book->title}}</h3>
                <p>Author: {{$book->author}}</p>
                <p>Category: @foreach($book->categories as $category) <span class="bg-primary rounded p-1">{{$category->category}}</span> @endforeach</p>
                <p>Condition: {{$book->condition->condition}}</p>
                <p>For: {{$book->for->for}}</p>
                <p class="card-text">{{ str_limit($book->description, $limit = 200, $end = '...') }}</p>
            </div>
        </div>
        <form action="/books" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Book title --}}
            <div class="form-group">
                <div class="form-label" for='title'>
                    Title
                </div>
                <input type="text" name="title" id="title" class="form-control" value="{{$book->title}}">
            </div>
            {{-- Book author --}}
            <div class="form-group">
                <div class="form-label" for="author">
                    Author
                </div>
                <input type="text" name="author" id="author" class="form-control" value="{{$book->author}}">
            </div>
            {{-- Book category --}}
            <div class="form-group">
                <div class="form-label">
                    Category
                </div>
                <div>
                    <select id="select-category" class="form-control" multiple name="categories[]" aria-placeholder="SELECT BOOK CATEGORIES">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Book condition --}}
            <div class="form-group">
                <div class="form-label">
                    Condition
                </div>
                <div>
                    <select id="condition-box" class="form-control" name="condition" aria-placeholder="SELECT BOOK CONDITION">
                        @foreach ($conditions as $condition)
                            <option value="{{$condition->id}}">{{$condition->condition}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Book for --}}
            <div class="form-group">
                <div class="form-label">
                    This book for
                </div>
                <div>
                    <select id="for-box" class="form-control" name="for" aria-placeholder="SELECT BOOK CONDITION">
                        @foreach ($fors as $for)
                            <option value="{{$for->id}}">{{$for->for}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Book price --}}
            <div class="form-group">
                <div class="form-label">
                    Price
                </div>
                <input class="form-control" type="number" name="price" id="price" step="0.01" value="{{$book->price}}">
            </div>
            {{-- Book description --}}
            <div class="form-group">
                <div class="form-label">
                    Description
                </div>
                <textarea name="description" id="description" class="form-control">{{$book->description}}</textarea>
            </div>
            {{-- Book cover --}}
            <div class="form-group">
                <div class="form-label">
                    Book Cover
                </div>
                <input type="file" name="book_img" id="book_img">
            </div>
            <div class="form-group">
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <div class="col-lg-3 col-md-3">

    </div>
</div>
@endsection
@section('js')
    <script>
    @foreach($book->categories as $category)
    $('#select-category option[value="{{$category->id}}"]').prop("selected", true);
    @endforeach
    $("#condition-box").val({{$book->condition_id}});
    $("#for-box").val({{$book->for_id}});
    $(document).ready(function() {
        $('#select-category').select2({
            
        });
       
    });
    </script>
@endsection
