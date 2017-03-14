@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Просмотр резюме
@endsection

@section('home_content')
    <div class="container preview">
        <div class="block">
            <div class="row">
                <div class="col-xs-12">
                    <div class="info_employer">
                        <div class="clearfix">
                            <div class="image_employer">
                                <img alt="employer image" src="/{{ $user->image }}">
                            </div>
                            <div class="how_find_employer">
                                <h3>Должность: {{ $summary->title }}</h3>
                                <h2><strong>Основная информация:</strong></h2>
                                <p>Страна: {{ $user->applicant->country->name }}</p>
                                <p>Город: {{ $user->applicant->city }}</p>
                                @foreach( $user->applicant->education as $item)
                                    <p>Образование: {{ $item->type->name }}, {{ $item->name }}, {{ $item->year_start }}-{{ $item->year_end }} год, {{ $item->specialize }}.</p>
                                @endforeach
                                <p>Год рождения: {{ $user->applicant->birthday }}</p>
                                <p>Желаемая заработная плата: {{ $summary->salary }} {{ $summary->currency->name }}</p>
                                <h3>Опыт работы:</h3>
                                @foreach( $user->applicant->experience as $item)
                                    <p>{{ $item->name }}, {{ $item->year_start }}-{{ $item->year_end}} год, {{ $item->position }}.</p>
                                @endforeach
                                <h3>Контактная информация:</h3>
                                <div class="info_o contacts">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text_employer">
                        <h3 style="margin-left: 10px;">Дополнительная информация:</h3>
                        <p style="margin-left: 10px;"> {!! $summary->information !!}</p>
                    </div>
                </div>
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