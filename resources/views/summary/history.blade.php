@extends('layouts.app')

@section('content')
    <div class="container preview">
        <div class="block">
            <h3>Истроия моих просмотров</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="info_employer">
                        <div class="clearfix">
                            @foreach($history as $item)
                                    <div class="row container">
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