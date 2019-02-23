@extends('layouts.app')

@section('content')
    <select id="e1">
        <option value="AL">Alabama</option>
        <option value="WY">Wyoming</option>
    </select>
@endsection
@section('js')
    <script>

        $(document).ready(function() { $("#e1").select2(); });
    </script>
@endsection