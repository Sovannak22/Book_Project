@extends('layouts.app')

@section('content')
    <form action="/books" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="form-label" for='title'>
                Title
            </div>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <div class="form-label" for="author">
                Author
            </div>
            <input type="text" name="author" id="author" class="form-control">
        </div>
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
        <div class="form-group">
            <div class="form-label">
                Description
            </div>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
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