@extends('layouts.main')

@section("title", $event->title)

@section('main_title', $event->title)

@section('page', 'showEvent')

@section("content")
    <section class="introduction">
        <figure><img src="{{$event->image}}" alt="imagem do evento {{$event->title}}"></figure>
        <div class="details">
        <h1>{{$event->title}}</h1>
        <p><b>Local: </b> {{$event->city}}</p>
        <p><b>Planejado por</b> <a href="/user/${owner->id}">{{$owner->name}}</a></p>
        @if ($userJoined)
            <a class="btn join-btn leave" href="/events/{{$event->id}}/leave">Cancelar Participação</a>
        @else
            <a class="btn join-btn" href="/events/{{$event->id}}/join">Participar</a>
        @endif
        <p class="short-description">{{ $event->description }}</p>
    </section>
    @if ($event->private)
        <div class="private-warning">
            <p> Somente você pode ver esse evento</p>
        </div>
    @endif
@endsection
