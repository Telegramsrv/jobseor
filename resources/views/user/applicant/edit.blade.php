@extends('layouts.app')
@section('content')
<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -&gt; Личный кабинет
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="my_money">
                <div class="my_money-score">
                    <p>Ваш счет:</p>
                    <h2>{{ $user->balance }}</h2>
                </div>
                <div class="my_money-button">
                    <button onclick="window.location.href='/pay.php'" type="button" name="button">пополнить счет</button>
                </div>
            </div>
        </div>
    </div>
    <div class="personal">
        <div class="block">
            <div class="row">
                <div class="col-xs-5">
                    <p><strong>Личный кабинет</strong></p>
                </div>
                <div class="col-xs-7"></div>
            </div>
            <div class="personal_name">
                <div class="row">
                    <div class="col-xs-5">
                        <p>ФИО</p>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::text('name', $user->name, [ 'class' => 'input_width', 'required']) !!}
                        {!! Form::button('Изменить',[ 'class' => 'button-main', 'onclick' => 'editName()']) !!}
                    </div>
                </div>
            </div>
            <div class="change_password">
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
                        {!! Form::button('Изменить',[ 'class' => 'button-main', 'onclick' => 'editPwd()']) !!}
                    </div>
                </div>
            </div>
            <div class="personal_email-tel">
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Изменить E-mail/Телефон</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Телефон</p>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::text('telephone', $user->contacts->phone, [ 'class' => 'input_width']) !!}
                        <small>(телефон указывается в международном формате)</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Старый e-mail</p>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::email('oldemail', $user->email, [ 'class' => 'input_width']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Новый e-mail</p>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::email('email', '', [ 'class' => 'input_width']) !!}
                        <button class="button-main">Изменить</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="row">
                <div class="col-xs-5">
                    <p>Дата рождения</p>
                </div>
                <div class="col-xs-7">
                    {!! Form::date('birthday', $user->applicant->birthday) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5">
                    <p>Страна проживания</p>
                </div>
                <div class="col-xs-7">
                    {!! Form::select('country_id', $countries, $user->applicant->country_id, [ 'class' => 'input_width']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5">
                    <p>Город проживания</p>
                </div>
                <div class="col-xs-7">
                    {!! Form::text('city', $user->applicant->city, [ 'class' => 'input_width']) !!}
                </div>
            </div>
        </div>
        <div class="block">
            <div class="row">
                <div class="col-xs-12">
                    <p><strong>Образование</strong></p>
                </div>
            </div>

            @foreach( $user->applicant->education as $education)
            <div class="row">
                <div class="col-xs-5">
                    <p>Название учебного заведения</p>
                </div>
                <div class="col-xs-7">
                    {!! Form::text('education_name', $education->name, [ 'class' => 'input_width']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-5">
                    <p>Годы обучения</p>
                </div>
                <div class="col-xs-7">
                    С {!! Form::number('education_year_start', $education->year_start) !!}
                    по {!! Form::number('education_year_end', $education->year_end) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-5">
                    <p>Специальность</p>
                </div>
                <div class="col-xs-7">
                    {!! Form::text('education_specialize', $education->specialize, [ 'class' => 'input_width']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-5">
                    <p>Тип образования</p>
                </div>
                <div class="col-xs-7">
                    {!! Form::select('education_type_id', $educations, $education->education_type_id, [ 'class' => 'input_width']) !!}
                    <button class="button-main">Изменить</button>
                </div>
            </div>
            @endforeach
        </div>

        <div class="block">
            <div class="row">
                <div class="col-xs-12">
                    <p><strong>Опыт работы</strong></p>
                </div>
            </div>

            @foreach( $user->applicant->experience as $experience)
                <div class="row">
                    <div class="col-xs-5">
                        <p>Название компании</p>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::text('experience_name', $experience->name, [ 'class' => 'input_width']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5">
                        <p>Период работы</p>
                    </div>
                    <div class="col-xs-7">
                        С {!! Form::number('experience_year_start', $experience->year_start) !!}
                        по {!! Form::number('experience_year_end', $experience->year_end) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5">
                        <p>Должность</p>
                    </div>
                    <div class="col-xs-7">
                        {!! Form::text('experience_position', $experience->position, [ 'class' => 'input_width']) !!}
                        <button class="button-main">Изменить</button>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-xs-5"></div>
                <div class="col-xs-7">
                    <div class="castom_input">
                        <div class="default_input">
                            <input id="will_click-js" type="file">
                        </div>
                        <div id="new_input" class="changed_input">
                            <button type="button" name="button">Загрузить Резюме</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="two-big_button">
        <div class="row">
            <div class="col-sm-7 col-xs-12">
                <a href="/base-cadrovuh-agenstv.php" class="button-main">Поиск работы с помощью кадрового агентства</a>
            </div>
            <div class="col-sm-5 col-xs-12">
                <button class="button-main">Удалить аккаунт</button>
            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function editName() {
        var name = $("input[name*='name']").val();
        $.ajax({
            url: '/settings/name',
            method: "POST",
            data: {_token: '{{ csrf_token() }}', name : name},
            success: function (data) {
                alert(data);
            }
        })
    }

    function editPwd() {
        var new_password = $("input[name*='new_password']").val();
        var password = $("input[name*='password']").val();
        $.ajax({
            url: '/settings/pwd',
            method: "POST",
            data: {_token: '{{ csrf_token() }}', new_password : new_password, password : password},
            success: function (data) {
                alert(data);
            }
        })
    }
</script>

@endsection