@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['action' => 'StoreController@store', 'method' => 'POST']) !!}
            {{-- STORE NAME --}}
            <div class="form-group">
            {!! Form::label('store_name', 'Store name',['class' => 'form-label']) !!}
            {!! Form::text('store_name','',['class' => 'form-control']) !!}
            </div>
            {{-- STORE PHONE NUMBER --}}
            <div class="form-group">
                {!! Form::label('phone_number', 'Phone number',['class' => 'form-label']) !!}
                {!! Form::text('phone_number','',['class' => 'form-control']) !!}
            </div>
            {{-- STORE PHONE NUMBER --}}
            <div class="form-group">
                {!! Form::label('email', 'Email',['class' => 'form-label']) !!}
                {!! Form::text('email','',['class' => 'form-control']) !!}
            </div>
            {{-- STORE ADDRESS --}}
            <div class="form-group">
            {!! Form::label('address', 'Address',['class' => 'form-label']) !!}
            {!! Form::text('address','',['class' => 'form-control']) !!}
            </div>
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