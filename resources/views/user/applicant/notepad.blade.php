@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Мои резюме
@endsection

@section('home_content')
    <div class="row" style="margin-left: 0; margin-right: 0;">
        <a href="{{ route('summary.add') }}" style="padding: 10px;">Добавить резюме</a>
        <div class="headervakanse">
            Всего: {{$summaries->count()}} резюме.
        </div>
        @foreach($summaries as $summary)
            <div class="vakanceblock">
                <div class="col-md-10">
                    <div class="avatarvacanse">
                        <img src="/{{ $user->image }}" alt="Аватар без фото" title="{{ $summary->title }}">
                    </div>
                    <h2>
                        <a href=" {{ route('summary.view', [ 'id' => $summary->summary_id]) }}">{{ $summary->title }}</a>
                    </h2>
                    <p>{{ $user->name }}</p>
                    <p>Опыт работы : {{ $user->applicant->experience_year() }} год.
                        • {{ str_limit($summary->information, 97) }}… • Зарплата
                        от {{ $summary->salary }} {{ $summary->currency->name }} </p>
                </div>
                <div class="col-md-2 pull-right">
                    <a href="{{ route('summary.edit', ['id' => $summary->summary_id]) }}"> Редактировать</a>
                    {!! Form::open([ 'route' => [ 'summary.remove', $summary->summary_id], 'method' => 'POST']) !!}
                    {!! Form::submit('Удалить', [ 'class' => 'button_width']) !!}
                    {!! Form::close() !!}
                    @if($summary->isVip())
                        <p>
                            Осталось -
                            {!! $summary->isVip()->timeleft()->format('%d Дней %h Часов %i Минут') !!}
                        </p>
                        @else
                        <a href="{{ route('summary.vip', [ 'id' => $summary->summary_id]) }}">Сделать VIP</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection