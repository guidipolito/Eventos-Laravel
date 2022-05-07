@extends('layouts.main')

@section("title", "event")
@section("main_title", isset($event) ? "Editando: ".$event->title : "Criar Evento" )

@section("content")
    <section class="event_section">
       <form action="/events" method="POST" class="event_create-form"  enctype="multipart/form-data">
           @csrf
           @isset($event)
            @method('PUT')
            <input name="id" type="hidden" value="{{$event->id}}">
           @endisset
            <div>
                <label for="event_img">Imagem do evento</label>
                <input type="file" name="event_img" id="event_img"/>
                @if(isset($event) && isset($event->image))
                    <img src="{{$event->image}}" />
                @endif
            </div>
            <div>
                <label for="input_title">Titulo</label>
                <input type="text" name="title" id="input_title" value="{{isset($event) ? $event->title : '' }}" />
            </div>
            <div>
                <label for="input_desc">descrição</label>
                <textarea name="desc" id="input_desc">{{isset($event) ? $event->desc : '' }}</textarea>
            </div>
            <div>
                <label for="input_city">cidade</label>
                <input type="text" name="city" id="input_city" value="{{isset($event) ? $event->city : ''}}" />
            </div>
            <div>
                <label for="target_date">Data de acontecimento</label>
                <input type="date" name="target_date" id="target_date" value="{{isset($event) ? date("Y-m-d", strtotime($event->date)) : '' }}" />
            </div>
            <label>Privado? <input type="checkbox" name="private" {{ isset($event) && $event->private ? 'checked' : ''}}> </label>
            <button>Enviar</button>
        </form>
    </section>
@endsection
