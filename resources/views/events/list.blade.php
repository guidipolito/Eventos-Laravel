@extends('layouts.main')

@section("title", "event")

@section('main_title', "Eventos")

@section("content")
    <section class="event_section">
        <form method="GET" class="main_search">
            <input type="text" name="search" value="{{$search}}" placeholder="busca"/>
            <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" viewBox="0 0 512 512">
                <path d="M416 208C416 253.9 401.1 296.3 375.1 330.7L502.6 457.4C515.1 469.9 515.1 490.1 502.6 502.6C490.1 515.1 469.9 515.1 457.4 502.6L330.7 375.1C296.3 401.1 253.9 416 208 416C93.12 416 0 322.9 0 208C0 93.12 93.12 0 208 0C322.9 0 416 93.12 416 208zM240.1 119C231.6 109.7 216.4 109.7 207 119C197.7 128.4 197.7 143.6 207 152.1L238.1 184H120C106.7 184 96 194.7 96 208C96 221.3 106.7 232 120 232H238.1L207 263C197.7 272.4 197.7 287.6 207 296.1C216.4 306.3 231.6 306.3 240.1 296.1L312.1 224.1C322.3 215.6 322.3 200.4 312.1 191L240.1 119z"/>
            </svg>
            </button>
        </form>
        @if($search)
            <h3 class="search-title">Busca por: <span>{{$search}}</span></h3>
        @endif
        <ul class="event_list">
        @foreach($events as $event)
            <li class="event">
                <a class="figure" href="/events/{{$event->id}}">
                    <img src="{{$event->thumbnail ? $event->thumbnail : 'https://via.placeholder.com/60'}}" alt="{{$event->title}}" />
                </a>
                <div class="details">
                    <h3><a href="/events/{{$event->id}}">{{$event->title}}</a></h3>
                    <p>{{$event->description}}</p>
                    <p>{{$event->usersJoined()->count()}} pessoas planejam participar</p>
                    <p><span class="primary">Data:</span> {{ date('d/m/y', strtotime($event->date)) }}</p>
                </div>
                <a class="participar" href="/events/{{$event->id}}">
                    <span>Participar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 0 448 512"><path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
                </a>
            </li>
        @endforeach
        </ul>
    </section>
@endsection
