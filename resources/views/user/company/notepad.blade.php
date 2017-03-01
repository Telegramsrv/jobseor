@extends('layouts.app')
@section('content')
    <div class="full-width_blue-background">
        <div class="container" id="breadcumps">
            <a href="http://jobseor.com/">Главная</a> -&gt; Мои вакансии
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-left: 0; margin-right: 0;">
            <div class="headervakanse">
                Всего: {{$vacancies->count()}} вакансий.
            </div>
            @foreach($vacancies as $vacancy)
            <div class="vakanceblock">
                <div class="avatarvacanse">
                    <img src="/{{ $user->image }}" alt="Аватар без фото" title="{{ $vacancy->title }}">
                </div>
                <h2><a href="/rezume-blank.php">{{ $vacancy->title }}</a></h2>
                <p>{{ $user->name }}</p>
                <p>{{ $vacancy->employment->name }} занятость. Опыт работы : {{ $vacancy->experience_type->name }}. {{ $vacancy->education->name }} образование.
                    • {{ str_limit($vacancy->description, 97) }}…</p>
            </div>
            @endforeach
            <div class="col-md-12">
            </div>
        </div>
    </div>
@endsection