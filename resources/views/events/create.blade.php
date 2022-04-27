@extends('layouts.main')

@section("title", "event")

@section("content")
    <section class="event_section">
       <form action="/events" method="POST" class="event_create-form"  enctype="multipart/form-data">
           @csrf
            <div>
                <label for="event_img">Imagem do evento</label> 
                <input type="file" name="event_img"/>
            </div>
            <div>
                <label for="input_title">Titulo</label>
                <input type="text" name="title" id="input_title" />
            </div>
            <div>
                <label for="input_desc">descrição</label>
                <textarea name="desc" id="input_desc"></textarea>
            </div>
            <div>
                <label for="input_city">cidade</label>
                <input type="text" name="city" id="input_city" />
            </div>
            <div>
                <label for="target_date">Data de acontecimento</label>
                <input type="date" name="target_date" id="target_date" />
            </div>
            <label>Privado? <input type="checkbox" name="private"> </label>
            <button>Enviar</button>
        </form>
    </section>
@endsection