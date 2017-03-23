@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; VIP аккаунт
@endsection

@section('home_content')
    <div id="balance" class="headervakanse">
        <p style="font-size: 19px;">
            Баланс:
            <span style="color: orange;">{{ $user->balance }}</span> Seorik
            <button class="button-main">Пополнить</button>
        </p>
    </div>
    <div class="status">
    </div>
    <div class="container">
        <div class="block">
            <h3>VIP аккаунт</h3>
            <div class="row">
                <div class="col-xs-12">
                    @if ($VIP)
                        <h3>
                            До окончания VIP аккаунта осталось -
                            {!! $VIP->timeleft()->format('%d Дней %h Часов %i Минут %s Секунд') !!}
                        </h3>
                    @else
                        <h4>
                            Подключить VIP аккаунт на
                            {!! Form::select('vip_id', $vip_type, '') !!}
                            {!! Form::submit('Подключить', [ 'class' => 'input_width']) !!}
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>

        $(document).ready(function () {
                $('input[type=submit]').bind('click', function () {
                    var vip_id = $('select[name=vip_id]').val();

                    $.ajax({
                        url: '{{ route("user.vip.post") }}',
                        method: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            vip_id: vip_id
                        },
                        success: function (data) {
                            data = JSON.parse(data);
                            $('.status').addClass('alert alert-' + data['class']).append(data['message']);
                        }
                    });
                });
            }
        )
    </script>
@endsection