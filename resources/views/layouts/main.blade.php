<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,400;0,700;1,200;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css" >
    </head>
    <body>
        <header class="main_nav">
            <nav>
                <ul>
                    <li>
                        <a href="/">Eventos</a>
                    </li>
                    <li>
                        <a href="/events/create">Criar evento</a>
                    </li>
                    @guest
                        <li>
                        <a href="/register">Cadastrar</a>
                    </li>
                    @endguest
                    @auth
                        <li>
                            <a href="/dashboard">Meus eventos</a> 
                        </li>
                        <li>
                            <form method="post" action="/logout">
                                @csrf
                                <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav> 
        </header>
        @if(View::hasSection('main_title'))
            <h1 class="main_title">
                <svg width="45" height="45" viewbox="0 0 120 120" xmlns="http://www.w3.org/2000/svg"><path style="opacity:1;fill:#f55291;fill-opacity:1;stroke:#f55291;stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M53.1 58.9s-9.3 13.2.5 14.7c9.7 1.4 8.8-6.3 8.8-6.3s.4-1-3.7-8.1z" transform="translate(-116.8 -116.3) scale(3.15017)"/><path style="fill:#f55291;fill-opacity:1;stroke:#f55291;stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M53.5 53.3s-13.3-9.3-14.8.5c-1.4 9.7 6.3 8.8 6.3 8.8s1.1 0 8.1-3.7z" transform="translate(-116.8 -116.3) scale(3.15017)"/><path style="fill:#f55291;fill-opacity:1;stroke:#f55291;stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M59 53.6s9.3-13.2-.5-14.7c-9.7-1.4-8.7 6.3-8.7 6.3s-.8 1 3.7 8.1zM58.7 59.2s13.2 9.3 14.7-.5C74.8 49 67 50 67 50s-1-.7-8.1 3.7z" transform="translate(-116.8 -116.3) scale(3.15017)"/><path style="opacity:1;fill:#f55291;fill-opacity:1;stroke:#f55291;stroke-width:.331228;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M53.2 53h6v6.1h-6z" transform="translate(-116.8 -116.3) scale(3.15017)"/></svg>
                 @yield('main_title')         
                <svg width="45" height="45" viewbox="0 0 120 120" xmlns="http://www.w3.org/2000/svg"><path style="opacity:1;fill:#f55291;fill-opacity:1;stroke:#f55291;stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M53.1 58.9s-9.3 13.2.5 14.7c9.7 1.4 8.8-6.3 8.8-6.3s.4-1-3.7-8.1z" transform="translate(-116.8 -116.3) scale(3.15017)"/><path style="fill:#f55291;fill-opacity:1;stroke:#f55291;stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M53.5 53.3s-13.3-9.3-14.8.5c-1.4 9.7 6.3 8.8 6.3 8.8s1.1 0 8.1-3.7z" transform="translate(-116.8 -116.3) scale(3.15017)"/><path style="fill:#f55291;fill-opacity:1;stroke:#f55291;stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M59 53.6s9.3-13.2-.5-14.7c-9.7-1.4-8.7 6.3-8.7 6.3s-.8 1 3.7 8.1zM58.7 59.2s13.2 9.3 14.7-.5C74.8 49 67 50 67 50s-1-.7-8.1 3.7z" transform="translate(-116.8 -116.3) scale(3.15017)"/><path style="opacity:1;fill:#f55291;fill-opacity:1;stroke:#f55291;stroke-width:.331228;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M53.2 53h6v6.1h-6z" transform="translate(-116.8 -116.3) scale(3.15017)"/></svg>
            </h1>
        @endif
        <main>
            @if(session('msg'))
            <div class="msg">
                <p>{{session('msg')}}</p>
            </div>
            @endif
            @yield('content')
        </main>
    </body>
</html>

