@extends('layouts.main')

@section("title", "event")

@section("content")
    <section class="event_section">
        <ul class="event_list">
        @foreach($events as $event)
            <li class="event">
                <figure>
                    <img src="https://via.placeholder.com/60" alt="{{$event->title}}" />
                </figure>
                <h3>{{$event->title}}</h3>
                <p>{{$event->description}}</p>
                <p>X pessoas planejam participar</p>
                <p> Data de acontecimendo </p>
                <button data-event-id="{{$event->id}}">Participar</button>
            </li>
        @endforeach
        </ul>
    </section>
@endsection