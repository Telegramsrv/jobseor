@extends('layouts.app')
@section('content')
    <div class="full-width_blue-background">
        <div class="container" id="breadcumps">
            <a href="/">Главная</a> -&gt; Личный кабинет
        </div>
    </div>

    <div class="container">
        <div class="headervakanse" style="min-height: 50px;">
            <p style="float: right; ">

                <a style="cursor: pointer; padding: 10px;">Мои предложения</a>
                <a style="cursor: pointer; padding: 10px;">Мои отклики</a>
                <a href="{{ route('user.notepad.history') }}" style="cursor: pointer; padding: 10px;">История</a>
                <a href="{{ route('user.notepad.viewers') }}" style="cursor: pointer; padding: 10px;">Просмотры ваканий</a>
                <a href="{{ route('user.notepad') }}" style="padding: 10px;">Мои вакансии</a>
                <a style="cursor: pointer; padding: 10px;">Настройки</a>

            </p>
        </div>
        <div class="headervakanse" id="balance">
            <p style="font-size: 19px;">Баланс: <span style="color: orange;">{{ $user->balance }}</span> Seorik <button  class="button-main">Пополнить</button></p>
        </div>
        <div class="rezumeblock">
            <p class="editpersonal"><a onclick="enableEdit(this);" >Редактировать</a></p>
            <div class="avatarvacanse">
                <img alt="Аватар {{ $user->name }}" title="Avatar" src="/{{ $user->image }}">
            </div>
            <h1>
                <span class="edittext">{{ $user->name }}</span>
                {!! Form::text('name', $user->name, [ 'class' => 'input_width hidden', 'required']) !!}
            </h1>

            <p>Тип:
                <span class="edittext">
                    @if ($company->agency)
                        Кадровое агенство
                        @else
                        Прямой работодатель
                    @endif
                </span>
                {!! Form::select('agency', $agency, $company->agency, [ 'class' => 'input_width hidden']) !!}
            </p>


            <p>Email:
                <span class="edittext">{{ $user->email }}</span>
                {!! Form::email('email', $user->email, [ 'class' => 'input_width hidden', 'required']) !!}
            </p>

            <p>Веб-сайт:
                <span class="edittext"><a href="{{ $company->website }}"> {{ $company->website }}</a></span>
                {!! Form::text('website', $company->website, [ 'class' => 'input_width hidden', 'required']) !!}
            </p>

            <h3>О компании: </h3>
            <p>
                <span class="edittext">{!! $company->description !!}</span>
                {!! Form::textarea('description', $company->description, [ 'class' => 'input_width hidden', 'required']) !!}
            </p>
            <p class="edsub">
                {!! Form::button('Сохранить', [ 'class' => 'input_width hidden', 'onclick' => 'updateInfo(this);']) !!}
                {!! Form::button('Не сохранять', [ 'class' => 'input_width btn-link hidden', 'onclick' => 'disableEdit(this);']) !!}
            </p>
        </div>
        <div class="two-big_button">
            <div class="row">
                <div class="col-sm-5 col-xs-12">
                    <button class="button-main">Удалить аккаунт</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showNotificantion(response) {
            var status = JSON.parse(response);
            var msg = '<div class="alert alert-' + status["class"] + '" role="alert"><strong>' + status["message"] + '</strong></div>';
            $('.headervakanse#balance').after(msg);

            $(window).scrollTop($('.alert').offset().top);//speed?
        }

        function enableEdit(button) {
            var div = $(button).parent().parent();

            var inputs = div.find('.input_width').removeClass('hidden');
            var text = div.find('.edittext').addClass('hidden');
        }

        function disableEdit(button) {
            var div = $(button).parent().parent();

            var inputs = div.find('.input_width').addClass('hidden');
            var text = div.find('.edittext').removeClass('hidden');
        }

        function updateInfo(button) {
            var div = $(button).parent().parent();

            var name = div.find("input[name*='name']").val();
            var email = div.find("input[name*='email']").val();
            var website = div.find("input[name*='website']").val();
            var description = div.find("input[name*='description']").val();

            $.ajax({
                url: '{{ route("user.edit.info") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', name: name, email: email, website: website, description: description},
                success: function (data) {
                    showNotificantion(data);
                    disableEdit(button);
                    location.reload();//add timer 2 sec
                }
            })
        }
    </script>
@endsection