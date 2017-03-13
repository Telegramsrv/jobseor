@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Страница соискателя
@endsection

@section('home_content')
    <div class="container">
        <h3>Страница соискателя</h3>
        <div id="rezumecenter" class="rezumeblock">
            <div class="editblock1">
                <div class="avatarvacanse">
                    <img alt="Аватар {{ $user->name }}" title="Avatar" src="/{{ $user->image }}">
                </div>

                <h1>
                    <span class="div.second">{{ $user->name }}</span>
                </h1>
                <p>
                    Email: {{ $user->email }}
                </p>
                <p>
                    Тип:
                    @if ($company->agency)
                            Кадровое агенство
                        @else
                            Прямой работодатель
                    @endif
                </p>
                <p>
                    Веб-сайт: <a href="{{ $company->website }}"> {{ $company->website }}</a>
                </p>
            </div>

            <div class="editblock1">
                <h3>О компании: </h3>
                <p>
                    <span class="edittext"> {!! $company->description !!} </span>
                </p>
            </div>
        </div>
    </div>
@endsection