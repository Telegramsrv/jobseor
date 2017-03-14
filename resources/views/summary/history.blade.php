@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Истроия моих просмотров
@endsection

@section('home_content')
    <div class="container">
        <div class="block">
            <h3>Истроия моих просмотров</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="info_employer">
                        <div class="clearfix preview">
                            @foreach($history as $item)
                                    <div class="row container block">
                                        <div class="col-md-8 pull-left">
                                            <h4><a href="{{ route('user.index', ['id' => $item->summary->user->user_id]) }}"> {{ $item->summary->user->name }}</a></h4>
                                            <p><a href="{{ route('summary.view', ['id' => $item->summary_id]) }}" >{{ $item->summary->title }}</a></p>
                                        </div>
                                        <div class="col-md-4 pull-right">
                                            <p>{{ $item->updated_at }}</p>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection