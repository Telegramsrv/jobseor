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

        @foreach($user->contacts as $contact)
            <p>Телефон: {{ $contact->phone }}</p>
        @endforeach

        <p>Страна: {{ $applicant->country->name }}</p>
        <p>Город: {{ $applicant->city }}</p>
        <p>Дата рождения: {{ $applicant->birthday }}</p>

        @foreach( $applicant->education as $item)
            <h3>Образование:</h3>
            <p>Учебное заведение: {{ $item->name }}</p>
            <p>Годы обучения с {{ $item->year_start}} по {{ $item->year_end }}</p>
            <p>Специальность: {{ $item->specialize }}</p>
            <p>Тип: {{ $item->type->name }}</p>
        @endforeach

        @foreach( $applicant->experience as $item)
            <h3>Опыт работы:</h3>
            <p>Учебное заведение: {{ $item->name }}</p>
            <p>Годы обучения с {{ $item->year_start}} по {{ $item->year_end }}</p>
            <p>Специальность: {{ $item->position }}</p>
        @endforeach

        <h3>О себе: </h3>
        <p>{!! $applicant->description !!} </p>
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