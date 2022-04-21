@extends('layouts.main')

@section("title", "event")

@section("content")
    @if(isset($id))
        <h1> O id é {{$id}}</h1>
    @endif
@endsection