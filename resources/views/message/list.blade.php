@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Мои диалоги
@endsection

@section('home_content')
    <div class="col-md-12">
        @foreach($messages as $message)
            <div class="row">

                <a href="{{ route('user.index', [ 'id' => $message->sender->user_id]) }}">
                    <div class="col-md-2">
                        {{ $message->sender->name }}
                    </div>
                </a>

                <div class="col-md-10">
                    <p class="pull-left">{{ $message->message }}</p>
                    <small class="pull-right">{{ $message->updated_at }}</small>
                </div>

            </div>
        @endforeach

        @if ($user->user_id == $message->sender->user_id)
            {!! Form::open([ 'route' => [ 'message.send', 'id' => $message->recipient->user_id] , 'method' => 'post']) !!}
        @else
            {!! Form::open([ 'route' => [ 'message.send', 'id' => $message->sender->user_id] , 'method' => 'post']) !!}
        @endif
        {!! Form::textarea('message', '', [ 'class' => 'input_width', 'required']) !!}
        {!! Form::submit('Отправить', [ 'class' => 'button-main']) !!}
        {!! Form::close() !!}
    </div>
@endsection