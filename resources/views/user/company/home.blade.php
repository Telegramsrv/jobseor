@extends('layouts.app')
@section('content')
    <div class="full-width_blue-background">
        <div class="container" id="breadcumps">
            <a href="/">Главная</a> -&gt; Личный кабинет
        </div>
    </div>

    <div class="container">
        <div class="headervakanse" style="min-height: 50px;">
            <p style="float: right; ">

                <a style="cursor: pointer; padding: 10px;">Мои предложения</a>
                <a style="cursor: pointer; padding: 10px;">Мои отклики</a>
                <a href="" style="padding: 10px;">Мои резюме</a>
                <a style="cursor: pointer; padding: 10px;">Настройки</a>

            </p>
        </div>
        <div class="headervakanse" id="balance">
            <p style="font-size: 19px;">Баланс: <span style="color: orange;">{{ $user->balance }}</span> Seorik <button  class="button-main">Пополнить</button></p>
        </div>
        <div class="rezumeblock">
            <div class="avatarvacanse">
                <img alt="Аватар {{ $user->name }}" title="Avatar" src="/{{ $user->image }}">
            </div>
            <h1>{{ $user->name }}</h1>

            <p>Email: {{ $user->email }}</p>

            <p>Веб-сайт: <a href="{{ $company->website }}"> {{ $company->website }}</a></p>

            <h3>О компании: </h3>
            <p>{!! $company->description !!} </p>
        </div>
        <div class="two-big_button">
            <div class="row">
                <div class="col-sm-7 col-xs-12">
                    <a href="/base-cadrovuh-agenstv.php" class="button-main">Поиск работы с помощью кадрового агентства</a>
                </div>
                <div class="col-sm-5 col-xs-12">
                    <button class="button-main">Удалить аккаунт</button>
                </div>
            </div>
        </div>
    </div>
@endsection