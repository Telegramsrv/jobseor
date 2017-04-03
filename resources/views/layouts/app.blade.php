<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/js.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-2" id="logo">
                    <a href="/">
                        <img title="Поиск вакансий в Европе" src="/image/jobseor.png" alt="Логотип компании"
                             class="logotype"/>
                    </a>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-6 float_right" style="margin-left: -15px;" id="headermenu">
                    <div class="enter">
                        <a href="/country" style="padding-left: 10px; padding-right: 10px">Визы и страны</a>
                        <a href="/summary" style="padding-left: 10px; padding-right: 10px;">Найти резюме</a>
                        <a href="/vacancy" style="padding-left: 10px; padding-right: 10px;">Найти вакансию</a>
                        @if (Auth::guest())
                            <a href="{{ route('login') }}" style="padding-left: 10px; padding-right: 10px;">Войти</a>
                        @else
                            <a href="{{ route('user.home') }}">Личный кабинет</a>

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Выйти
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="footer_logo">
            <a href="">
                <img title="Поиск вакансий, доска вакансий" src="/image/jobseor-company.png"
                     alt="Доска поиска вакансий"/>
            </a>
        </div>
        <div class="footer_right">
            <p><a href="/support.php">Техническая поддержка </a></p>
            <p>Все права защищены ®</p>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
