@extends('layouts.main')

@section("title", "Dashboard")

@section("content")
    <section class="event_section">
        <form method="GET">
            <input type="text" name="search" value="{{$search}}" placeholder="busca"/>
            <button>Busca</button>
        </form>
        @if($search)
            <h3 class="search-title">Busca por: <span>{{$search}}</span></h3>
        @endif
        <ul class="event_list">
        @foreach($events as $event)
            <li class="event">
                <figure>
                    <img src="https://via.placeholder.com/60" alt="{{$event->title}}" />
                </figure>
                <h3>{{$event->title}}</h3>
                <p> Data de acontecimendo: {{ date('d/m/y', strtotime($event->date)) }}</p>
                <form method="POST" action="/events/{{$event->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="remove-btn">Remover</button>
                </form>
                <a class="edit-btn" href="events/edit/">Editar</a>
            </li>
        @endforeach
        </ul>
    </section>
@endsection