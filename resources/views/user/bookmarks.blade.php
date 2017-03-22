@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Мои закладки
@endsection

@section('home_content')
    <div class="container preview">
        <div class="block">
            <h3>Мои закладки</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="info_employer">
                        <div class="clearfix">
                            @foreach($bookmarks as $bookmark)
                                <div class="row container">
                                    <div class="col-md-8 pull-left">
                                        @if($bookmark->vacancy)
                                            <h4>
                                                <a href="{{ route('vacancy.view', ['id' => $bookmark->item_id]) }}">{{ $bookmark->vacancy->title }}</a>
                                            </h4>
                                        @else
                                            <h4>
                                                <a href="{{ route('summary.view', ['id' => $bookmark->item_id]) }}">{{ $bookmark->summary->title }}</a>
                                            </h4>
                                        @endif
                                        <p>
                                            <a href="{{ route('user.index', ['id' => $bookmark->item->user->user_id]) }}"> {{ $bookmark->item->user->name }}</a>
                                        </p>
                                    </div>
                                    <div class="col-md-4 pull-right">
                                        <p>{{ $bookmark->updated_at }}</p>
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