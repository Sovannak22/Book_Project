@extends('layouts.app')

@section('content')
    @if($errors->any())
    <h4 class="alert alert-danger">{{$errors->first()}}. <a href="/stores/create">click here</a> to create your own store</h4>
    @endif
@endsection