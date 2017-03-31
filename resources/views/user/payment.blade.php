@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Способ оплаты
@endsection

@section('home_content')
    <div class="container">
        {!! Form::open([ 'method' => 'post']) !!}
        <div class="row">
            <div class="mainrow">
                <h1>Сумма оплаты</h1>
                {!! Form::number('amount','1', [ 'class' => 'input_width', 'required']) !!} $
                <hr/>
                <h1>Способ оплаты</h1>

                {{--<input type="radio" checked name="raz"/>--}}
                Использовать карту: <img title="Cпособ оплаты" alt="Visa Master Cart Maestro" src="img/payment.png"
                                         style="width: 120px;">
                <p>Номер карты</p>
                <p>
                    {!! Form::text('card_id', '', [ 'class' => 'input_width', 'required', 'placeholder' => '0000 1111 2222 3333']) !!}
                </p>
                <div style="width: 100%; display: inline-block;">
                    <div class="twoblock">
                        Срок действия карты
                        <p>
                            {!! Form::select('card_exp_month', $exp_month, '', [ 'class' => 'twoinput', 'required', 'placeholder' => 'MM', 'maxlength' => '2']) !!}
                            /
                            {!! Form::select('card_exp_year', $exp_year, '', [ 'class' => 'twoinput', 'required', 'placeholder' => 'ГГ', 'maxlength' => '2']) !!}
                        </p>
                    </div>
                    <div class="twoblock">
                        Код CVV
                        <p>
                            {!! Form::number('card_cvv', '', [ 'required', 'placeholder' => '123', 'maxlength' => '3']) !!} <br/>
                            <small>Три цифры(указаные на обратной стороне карты)</small>
                        </p>
                    </div>
                </div>
                <p>Владелец карты</p>
                <p>
                    {!! Form::text('card_owner', '', [ 'class' => 'input_width', 'required', 'placeholder' => 'Имя и Фамилия']) !!}
                    <br/>
                    <small>Латинскими буквами,как указано на карте</small>
                </p>
                <p>Номер телефона</p>
                <p>
                    {!! Form::text('card_phone', '', [ 'class' => 'input_width', 'required', 'placeholder' => '+380950000001']) !!}
                    <br/>
                    <small>На данный номер телефона прийдет пароль подтверждения платежа</small>
                </p>
                <p style="margin: 20px 0px;">
                    {!! Form::submit('Оплатить') !!}
                    {{--<a href="">Оплатить</a>--}}
                </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection