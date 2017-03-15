@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Мои диалоги
@endsection

@section('home_content')
    <div class="col-md-12">
        @foreach($dialogs as $message)
            <div class="preview">

                @if ($message->sender->user_id != $user->user_id)
                    <a href="{{ route('message.user', [ 'id' => $message->sender->user_id]) }}">
                        <div class="col-md-4">
                            {{ $message->sender->name }}
                        </div>
                    </a>
                @else
                    <a href="{{ route('message.user', [ 'id' => $message->recipient->user_id]) }}">
                        <div class="col-md-4">
                            {{ $message->recipient->name }}
                        </div>
                    </a>
                @endif

                <div class="col-md-8">
                    <p class="pull-left">{{ $message->message }}</p>
                    <small class="pull-right">{{ $message->updated_at }}</small>
                </div>
            </div>

        @endforeach
    </div>
@endsection