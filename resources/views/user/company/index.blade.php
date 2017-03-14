@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Страница пользователя
@endsection

@section('home_content')
    <div class="container">
        <h3>Страница соискателя</h3>
        <div id="rezumecenter" class="rezumeblock">
            <div class="editblock1">
                <div class="avatarvacanse">
                    <img alt="Аватар {{ $user->name }}" title="Avatar" src="/{{ $user->image }}">
                </div>

                <h1>
                    <span class="div.second">{{ $user->name }}</span>
                </h1>
                <div class="info_o contacts">
                </div>
                <p>
                    Тип:
                    @if ($company->agency)
                            Кадровое агенство
                        @else
                            Прямой работодатель
                    @endif
                </p>
                <p>
                    Веб-сайт: <a href="{{ $company->website }}"> {{ $company->website }}</a>
                </p>
            </div>

            <div class="editblock1">
                <h3>О компании: </h3>
                <p>
                    <span class="edittext"> {!! $company->description !!} </span>
                </p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route("contact.index") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', user_id: '{{ $user->user_id }}' },
                success: function (data) {
                    $('.contacts').append(data);
                }
            })
        });

        function getContact() {
            $.ajax({
                url: '{{ route("contact.open") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', user_id: '{{ $user->user_id }}' },
                success: function (data) {
                    $('.contacts').empty();
                    $('.contacts').appendChild(data);
                }
            })
        }
    </script>
@endsection