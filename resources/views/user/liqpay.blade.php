@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Способ оплаты
@endsection

@section('home_content')
    <div class="container">
        <div class="row">
            <div class="mainrow">
                <h1>Сумма оплаты</h1>
                {!! Form::number('amount','1', [ 'class' => 'input_width', 'required']) !!} $
                <hr/>
                <p style="margin: 20px 0px;">
                    {!! Form::button('Оплатить', [ 'class' => 'button-main']) !!}
                </p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('.button-main').on("click", function () {
                var amount = $('input[name*="amount"]').val();

                $.ajax({
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        amount: amount
                    },
                    success: function (data) {
                        $('.mainrow').append(data);
                    }
                });
            })

        });
    </script>
@endsection