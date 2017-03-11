@extends('layouts.app')

@section('content')
    <div class="container preview">
        <div class="block">
            <h3>Кто смотрел мои вакансии</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="info_employer">
                        <div class="clearfix">
                            @foreach($vacancies as $vacancy)
                                @foreach($vacancy->viewers as $view)
                                    <div class="row container">
                                        <div class="col-md-8 pull-left">
                                            <h4><a href="{{ route('user.index', ['id' => $view->user_id]) }}"> {{ $view->user->name }}</a></h4>
                                            <p><a href="{{ route('vacancy.view', ['id' => $view->vacancy_id]) }}" >{{ $view->vacancy->title }}</a></p>
                                        </div>
                                        <div class="col-md-4 pull-right">
                                            <p>{{ $view->updated_at }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection