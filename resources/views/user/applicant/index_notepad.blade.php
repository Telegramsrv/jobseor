@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Мои резюме
@endsection

@section('home_content')
    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="headervakanse">
            Всего: {{$summaries->count()}} резюме.
        </div>
        @foreach($summaries as $summary)
            <div class="vakanceblock">
                <div class="avatarvacanse">
                    <img src="/{{ $user->image }}" alt="Аватар без фото" title="{{ $summary->title }}">
                </div>
                <h2><a href="">{{ $summary->title }}</a></h2>
                <p>{{ $user->name }}</p>
                <p>Опыт работы : {{ $user->applicant->experience_year() }} год.
                    • {{ str_limit($summary->information, 97) }}…</p>
            </div>
        @endforeach
        <div class="col-md-12">
        </div>
    </div>
@endsection