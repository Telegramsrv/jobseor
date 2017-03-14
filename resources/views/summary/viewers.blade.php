@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Кто смотрел мои резюме
@endsection

@section('home_content')
    <div class="container preview">
        <div class="block">
            <h3>Кто смотрел мои резюме</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="info_employer">
                        <div class="clearfix">
                            @foreach($summaries as $summary)
                                @foreach($summary->viewers()->orderBy('updated_at','desc')->get() as $view)
                                    <div class="row container">
                                        <div class="col-md-8 pull-left">
                                            <h4><a href="{{ route('user.index', ['id' => $view->user_id]) }}"> {{ $view->user->name }}</a></h4>
                                            <p><a href="{{ route('summary.view', ['id' => $view->summary_id]) }}" >{{ $view->summary->title }}</a></p>
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