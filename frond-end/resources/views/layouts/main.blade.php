<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id=app>
        <nav class="navbar navbar-expand-ms navbar-light bg-light">
            <div class="container">
                <a href="#" class="navbar-brand">Plagi</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">


                        @auth

                             <li>
                                <a style="font-size: 1em;" class="navbar-brand" href="{{route('documents.create')}}"> New Document </a>
                                <a style="font-size: 1em;" class="navbar-brand" href="{{route('documents.index')}}"> Document</a>

                            </li>
                        

                        @if(Auth::user()->is_admin == 1)
                            <li>
                                <a style="font-size: 1em;" class="navbar-brand" href="{{route('admin', Auth::user()->name)}}">admin panel </a>
                            </li>
                        @endif
                        @endauth

                        <li>
                           <a style="font-size: 1em;" class="navbar-brand" href="{{route('questions.index')}}"> FAQ </a>
                        </li>

                        <li>
                           <a style="font-size: 1em;" class="navbar-brand" href="{{route('about')}}"> about </a>
                        </li>

                        <li>
                           <a style="font-size: 1em;" class="navbar-brand" href="{{route('contact')}}"> contact </a>
                        </li>
                    </ul>

                
            </div>
                

                
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
