<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,400;0,700;1,200;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/styles.css" >
    </head>
    <body>
        <header class="main_nav">
            <navbar>
                <ul>
                    <li>
                        <a href="/">Eventos</a>
                    </li>
                    <li>
                        <a href="/events/create">Criar meu evento</a>
                    </li>
                </ul>
            </navbar> 
        </header>
       @yield('content')
    </body>
</html>

