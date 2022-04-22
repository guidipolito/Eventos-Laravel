@extends('layouts.main')

@section("title", "event")

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
                <p>{{$event->description}}</p>
                <p>X pessoas planejam participar</p>
                <p> Data de acontecimendo: {{ date('d/m/y', strtotime($event->date)) }}</p>
                <button data-event-id="{{$event->id}}">Participar</button>
            </li>
        @endforeach
        </ul>
    </section>
@endsection