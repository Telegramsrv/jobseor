@extends('layouts.app')

@section('content')
    <div class="container preview">
        <div id="preview" class="preview">
            <div class="block">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="menu_employer ">
                            <a href="#">
                                <div class="menushka">VIP-Статус</div>
                            </a>
                            <a href="#">
                                <div class="menushka selected_menu">Описание</div>
                            </a>
                            <a href="#">
                                <div class="menushka">Фото</div>
                            </a>
                            <a href="#">
                                <div class="menushka">Отзывы</div>
                            </a>
                        </div>
                        <div class="info_employer">
                            <h2 id="writte_main-name">{{ $vacancy->title }}</h2>
                            <div class="clearfix">
                                <div class="image_employer">
                                    <img title="Имя Фамилия" alt="employer image" src="{{ $user->image }}">
                                </div>
                                <div class="how_find_employer">
                                    <h5><strong>Связаться с автором обьявления:</strong></h5>
                                    <div class="info_o">
                                        <p id="writte_pip">{{ $user->name }}</p>
                                        <img src="/img/man.png" title="Логотип человек" alt="phone">
                                    </div>
                                    <div class="info_o">
                                        <p>{{ $vacancy->country->name }} - {{ $vacancy->city }}</p>
                                        <img src="/img/here.png" title="Страна" alt="phone">
                                    </div>
                                    <div class="info_o">
                                        <p id="writte_email">{{ $user->email }}</p>
                                        <img src="/img/mail.png" title="Логотип email" alt="phone">
                                    </div>
                                    <div class="info_o">
                                        <p>Категория {{ $vacancy->category->name }}</p>
                                    </div>
                                    <div class="info_o">
                                        <p>Спецыальность {{ $vacancy->profession->name }}</p>
                                    </div>
                                    <div class="info_o">
                                        <p>Зарплата от {{ $vacancy->salary }} {{ $vacancy->currency->name }}</p>
                                    </div>
                                    <div class="info_o">
                                        <p>Стаж: {{ $vacancy->experience_type->name }}</p>
                                    </div>
                                    <div class="info_o">
                                        <p>Тип образования: {{ $vacancy->education->name }}</p>
                                    </div>
                                    <div class="info_o">
                                        <p>Тип зайнятости: {{ $vacancy->employment->name }}</p>
                                    </div>
                                    <div class="info_o">
                                        <p>Возраст от {{ $vacancy->age_min }} до {{ $vacancy->age_max }}</p>
                                    </div>
                                    <hr/>
                                    <div class="info_o contacts">
                                    </div>
                                </div>
                            </div>

                            <div class="text_employer">
                                <p id="text_written">
                                    {!! $vacancy->description !!}
                                </p>
                            </div>
                        </div>

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