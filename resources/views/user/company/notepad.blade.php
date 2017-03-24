@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Мои вакансии
@endsection

@section('home_content')
    <div class="row" style="margin-left: 0; margin-right: 0;">
        <a href="{{ route('vacancy.add') }}" style="padding: 10px;">Добавить вакансию</a>
        <div class="headervakanse">
            Всего: {{$vacancies->count()}} вакансий.
        </div>
        @foreach($vacancies as $vacancy)
            <div class="vakanceblock">
                <div class="avatarvacanse">
                    <img src="/{{ $user->image }}" alt="Аватар без фото" title="{{ $vacancy->title }}">
                </div>
                <div class="col-md-10">
                    <h2><a href="{{ route('vacancy.view', [ 'id' => $vacancy->vacancy_id]) }}">{{ $vacancy->title }}</a>
                    </h2>
                    <p>{{ $user->name }}</p>
                    <p>{{ $vacancy->employment->name }} занятость. Опыт работы
                        : {{ $vacancy->experience_type->name }}. {{ $vacancy->education->name }} образование.
                        • {{ str_limit($vacancy->description, 97) }}…</p>
                </div>
                <div class="col-md-2 pull-right">
                    <a href="{{ route('vacancy.edit', ['id' => $vacancy->vacancy_id]) }}"> Редактировать</a>
                    {!! Form::open([ 'route' => [ 'vacancy.remove', $vacancy->vacancy_id], 'method' => 'POST']) !!}
                    {!! Form::submit('Удалить', [ 'class' => 'button_width']) !!}
                    {!! Form::close() !!}
                    @if($vacancy->isVip())
                        <p>
                            Осталось -
                            {!! $vacancy->isVip()->timeleft()->format('%d Дней %h Часов %i Минут') !!}
                        </p>
                    @else
                        <a href="{{ route('vacancy.vip', [ 'id' => $vacancy->vacancy_id]) }}">Сделать VIP</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection