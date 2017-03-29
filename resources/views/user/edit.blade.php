@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Настройки
@endsection

@section('home_content')
    <div class="personal">
        <div class="block">
            <div class="change_password">
                {!! Form::open([ 'route' => 'user.edit.pwd', 'method' => 'post']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Изменить пароль</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Старый пароль</p>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::password('password', [ 'class' => 'input_width', 'required']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Новый пароль</p>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::password('new_password', [ 'class' => 'input_width', 'required']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5"></div>
                    <div class="col-xs-7">
                        <p><input type="checkbox"> Показывать пароль</p>
                        {!! Form::submit('Изменить', [ 'class' => 'button-main']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="block">
            <div class="change_password">
                {!! Form::open([ 'route' => 'user.edit.notification', 'method' => 'post']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Настройки рассылки</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Новые сообщения</p><small>(Уведомление о новых сообщениях)</small>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::checkbox('message_notification', '1', $user->getMessageNotificaion, [ 0, 1]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5"></div>
                    <div class="col-xs-7">
                        {!! Form::submit('Изменить', [ 'class' => 'button-main']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection