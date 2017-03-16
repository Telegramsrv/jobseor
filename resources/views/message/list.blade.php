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
                    @if($message->read)
                        <p>{{ $message->message }}
                            <small>{{ $message->created_at }}</small>
                        </p>
                    @else
                        <p style="background-color: #acadab">{{ $message->message }}
                            <small>{{ $message->created_at }}</small>
                        </p>
                    @endif
                </div>

            </div>
        @endforeach
        {!! Form::open([ 'method' => 'post']) !!}
        {!! Form::textarea('message', '', [ 'class' => 'input_width', 'required']) !!}
        {!! Form::submit('Отправить', [ 'class' => 'button-main']) !!}
        {!! Form::close() !!}
    </div>
@endsection