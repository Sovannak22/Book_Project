@extends('layouts.app')

@section('content')


    <div class="container">
        {!! Form::open(['action' => 'StoreController@store', 'method' => 'POST']) !!}
            {{-- DESCRIPTION --}}
            <div class="form-group">
            {!! Form::label('description', 'Description',['class' => 'form-label']) !!}
            {!! Form::textarea('description','',['class' => 'form-control']) !!}
            </div>
            {{-- SUBMIT BUTTON --}}
            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection