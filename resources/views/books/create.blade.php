@extends('layouts.store_2')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3">

    </div>
    <div class="jumbotron col-lg-6 col-md-6 col-sm-12 col-12">
        <h1 class="text-dark">Add book to your store</h1>
        <form action="/books" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Book title --}}
            <div class="form-group">
                <div class="form-label" for='title'>
                    Title
                </div>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            {{-- Book author --}}
            <div class="form-group">
                <div class="form-label" for="author">
                    Author
                </div>
                <input type="text" name="author" id="author" class="form-control">
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
                    <select class="form-control" name="condition" aria-placeholder="SELECT BOOK CONDITION">
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
                    <select class="form-control" name="for" aria-placeholder="SELECT BOOK CONDITION">
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
                <input class="form-control" type="number" name="price" id="price" step="0.01">
            </div>
            {{-- Book description --}}
            <div class="form-group">
                <div class="form-label">
                    Description
                </div>
                <textarea name="description" id="description" class="form-control"></textarea>
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

    $(document).ready(function() {
        $('#select-category').select2({
            
        });
       
    });
    </script>
@endsection
{{-- {!! Form::open(['action' => 'BookController@store','method' => 'POST']) !!}
<div class="form-group">
    {!! Form::label('title','Title',['class' => 'form-label']) !!}
    {!! Form::text('title','',['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('author','Author',['class' => 'form-lable']) !!}
    {!! Form::label('author','',['class' => 'form-control']) !!}
</div>
{!! Form::close() !!} --}}