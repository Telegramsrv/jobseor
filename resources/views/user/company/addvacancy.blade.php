@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Добавить вакансию
@endsection

@section('home_content')
    <div class="add_vac">
        <div class="container">
            <div class="row new">
                <div class="col-xs-12">
                    <div class="info">
                        <p>Максимально заполните все предлагаемые поля. Чем шире информация о вакансии, тем больше шансов привлечь толковых специалистов</p>
                    </div>
                </div>
            </div>
            <div class="main_form new">
                @if (empty($vacancy->title))
                    {!! Form::open([ 'route' => 'vacancy.add.post', 'method' => 'POST']) !!}
                @else
                    {!! Form::open([ 'route' => 'vacancy.edit.post', 'method' => 'POST']) !!}
                    {!! Form::hidden('vacancy_id', $vacancy->vacancy_id) !!}
                @endif
                <form id="form_for_all">
                    <div class="block">
                        <div class="info_vac">
                            <div class="row">
                                <div class="col-xs-5">
                                    <h4>Информация о вакансии</h4>
                                </div>
                                <div class="col-xs-7 right">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="row">
                            <div class="name_vac">
                                <div class="col-xs-5">
                                    <P>Название вакансии <span>*</span></P>
                                </div>
                                <div class="col-xs-7">
                                    {!! Form::text('title', $vacancy->title, [ 'class' => 'input_width', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="category_vac">
                                <div class="col-xs-5">
                                    <p>Категория размещения вакансии<span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    <div class="select_category border_illusion">
                                        {!! Form::select('category_id', $categories, $vacancy->category_id, [ 'onchange' => 'updateProfession(this.value);', 'id' => 'select_category']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="category_vac">
                                <div class="col-xs-5">
                                    <p>Спецыальность<span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    <div class="select_category border_illusion specialize">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="country_vac">
                                <div class="col-xs-5">
                                    <p>Страна <span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    <div class="select_category select_vac_country">
                                        {!! Form::select('country_id', $countries, $vacancy->country_id, [ 'id' => 'select_country']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="vac_town">
                                <div class="col-xs-5">
                                    <p>Город<span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    <div class="town">
                                        {!! Form::text('city', $vacancy->city, [ 'class' => 'border_illusion', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="vac_worktime">
                                <div class="col-xs-5">
                                    <p>Образование<span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    {!! Form::select('education_type_id', $education_types, $vacancy->education_type_id, [ 'class' => 'border_illusion', 'id' => 'select_education']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="vac_worktime">
                                <div class="col-xs-5">
                                    <p>Занятость<span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    {!! Form::select('employment_id', $employments, $vacancy->employment_id, [ 'class' => 'border_illusion', 'id' => 'select_employment']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="money_vac">
                                <div class="col-xs-5">
                                    <p>Заработная пaлата</p>
                                </div>
                                <div class="col-xs-7">
                                    <div>
                                        {!! Form::number('salary', $vacancy->salary, [ 'class' => 'border_illusion']) !!}

                                        {!! Form::select('currency_id', $currencies, $vacancy->currency_id,  [ 'class' => 'border_illusion', 'id' => 'select_currency']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="experience">
                                <div class="col-xs-5">
                                    <p>Опыт работы<span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    {!! Form::select('experience_type_id', $experience_types, $vacancy->experience_type_id, [ 'class' => 'border_illusion', 'id' => 'select_experience']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="age">
                                <div class="col-xs-5">
                                    <p>Возраст</p>
                                </div>
                                <div class="col-xs-7">
                                    <p>от {!! Form::number('age_min', $vacancy->age_min, [ 'class' => 'border_illusion']) !!}</p>
                                    <p>до {!! Form::number('age_max', $vacancy->age_max, [ 'class' => 'border_illusion']) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="row">
                            <div class="col-xs-5">
                                <p>Описание вакансии<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="textarea">
                                    {!! Form::textarea('description', $vacancy->description, [ 'class' => 'border_illusion', 'required', 'maxlength' => '4000','placeholder' => 'Требования, обязаности,...']) !!}
                                </div>
                            </div>
                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-5">--}}
                                {{--<div class="load_img">--}}
                                    {{--<button type="button" name="button">Добавить фотографии</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-7">--}}
                                {{--<div class="img-uploads-wrapper">--}}
                                    {{--<div class="img-uploads-wrapper__inputs">--}}
                                        {{--<input type="file" name="imgUpload1" id="imgUpload" multiple>--}}
                                    {{--</div>--}}

                                    {{--<div class="img-uploads-wrapper__add-buttons">--}}
                                        {{--<div class="button-in-block">--}}
                                            {{--<div class="add-button"></div>--}}
                                            {{--<div class="add-button"></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="button-in-block">--}}
                                            {{--<div class="add-button"></div>--}}
                                            {{--<div class="add-button"></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>

                    <div class="block">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="post">
                                    <h3>VIP-объявление</h3>
                                    <p>Чтобы получить резюме лучших соискателей, Ваши вакансии всегда должны быть на высоте</p>
                                    <p>
                                        <input type="checkbox"><strong> Заказать VIP-пакет и обеспечить привлечения лучших кандидатов в компанию</strong>
                                    </p>
                                    <img src="/img/VIP.png" alt="vip">
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="load_img">
                                    {!! Form::button('Предосмотр', [ 'class' => 'button_width', 'onclick' => 'preview();']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                @if (empty($vacancy->title))
                                    {!! Form::submit('Добавить вакансию', [ 'class' => 'button_width']) !!}
                                    @else
                                    {!! Form::submit('Изменить', [ 'class' => 'button_width']) !!}
                                @endif
                                    {{--<button class="button_width" type="submit" onclick="window.location.href='/pay.php'"   form="form_for_all">Добавить вакансию</button>--}}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var value = $('#select_category').val();

            updateProfession(value);
        });

        function updateProfession(value)
        {
            $('.specialize').empty();

            $.ajax({
                url: '{{ route("vacancy.profession") }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: value
                },
                success: function (data) {
                    $('.specialize').append(data);
                }
            });
        }

        function preview()
        {
            $('.preview').remove();
            var title = $("input[name*='title']").val();
            var salary = $("input[name*='salary']").val();
            var category_id = $("#select_category").val();
            var profession_id = $("#select_profession").val();
            var country_id = $("#select_country").val();
            var city = $("input[name*='city']").val();
            var education_type_id = $("#select_education").val();
            var employment_id = $("#select_employment").val();
            var currency_id = $("#select_currency").val();
            var experience_type_id = $("#select_experience").val();
            var age_min = $("input[name*='age_min']").val();
            var age_max = $("input[name*='age_max']").val();
            var description = $("textarea").val();

            $.ajax({
                url: '{{ route("vacancy.preview") }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    title: title,
                    salary: salary,
                    category_id: category_id,
                    profession_id: profession_id,
                    country_id: country_id,
                    city: city,
                    education_type_id: education_type_id,
                    employment_id: employment_id,
                    currency_id: currency_id,
                    exepience_type_id: experience_type_id,
                    age_min: age_min,
                    age_max: age_max,
                    description: description
                },
                success: function (data) {
                    $('.add_vac').after(data);
                    $(window).scrollTop($('.preview').offset().top);//speed?
                }
            });
        }

    </script>
@endsection