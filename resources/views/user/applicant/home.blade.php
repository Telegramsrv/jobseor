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
                <a href="{{ route('user.notepad') }}" style="padding: 10px;">Мои резюме</a>
                <a href="{{ route('user.edit') }}" style="cursor: pointer; padding: 10px;">Настройки</a>
            </p>
        </div>
        <div class="headervakanse" id="balance">
            <p style="font-size: 19px;">Баланс: <span style="color: orange;">{{ $user->balance }}</span> Seorik
                <button class="button-main">Пополнить</button>
            </p>
        </div>
        <div id="rezumecenter" class="rezumeblock">
            <div class="editblock1">
                <p class="editpersonal"><a onclick="enableEdit(this);">Редактировать</a></p>
                <div class="avatarvacanse">
                    <img alt="Аватар {{ $user->name }}" title="Avatar" src="/{{ $user->image }}">
{{--                    {!! Form::file('image', [ 'class' => 'input_width hidden']) !!}--}}
                </div>

                <h1>
                    <span class="div.second edittext">{{ $user->name }}</span>
                    {!! Form::text('name', $user->name, [ 'class' => 'input_width hidden', 'required']) !!}
                </h1>
                <p>
                    Email: <span class="edittext">{{ $user->email }}</span>
                    {!! Form::email('email', $user->email, [ 'class' => 'input_width hidden', 'required']) !!}
                </p>
                <p>
                    Телефон:
                        <span class="edittext">{{ $user->contacts->phone }}</span>
                    {!! Form::text('phone', $user->contacts->phone, [ 'class' => 'input_width hidden', 'required']) !!}
                </p>
                <p>
                    Страна:
                    @if($applicant->country)
                        <span class="edittext">{{ $applicant->country->name }}</span>
                    @endif
                    {!! Form::select('country_id', $countries, $user->applicant->country_id, [ 'class' => 'input_width hidden', 'id' => 'select_country']) !!}
                </p>
                <p>
                    Город: <span class="edittext">{{ $applicant->city }}</span>
                    {!! Form::text('city', $user->applicant->city, [ 'class' => 'input_width hidden', 'required']) !!}
                </p>
                <p>
                    Дата рождения: <span class="edittext">{{ $applicant->birthday }}</span>
                    {!! Form::date('birthday', $user->applicant->birthday, ['class' => 'input_width hidden', 'required']) !!}
                </p>

                <p class="edsub">
                    {!! Form::button('Сохранить', [ 'class' => 'input_width hidden', 'onclick' => 'updateInfo(this);']) !!}
                    {!! Form::button('Не сохранять', [ 'class' => 'input_width btn-link hidden', 'onclick' => 'disableEdit(this);']) !!}
                </p>
            </div>

            <div class="editblock1">
                <p class="editpersonal">
                    <a onclick="addEducation(this);">Добавить</a> /
                    <a onclick="enableEdit(this);">Редактировать</a>
                </p>
                @foreach( $applicant->education as $item)
                    <div class="clone2">
                        <h3>Образование:</h3>
                        {!! Form::hidden('education_id', $item->education_id) !!}
                        <p>
                            Учебное заведение: <span class="edittext"> {{ $item->name }}</span>
                            {!! Form::text('name', $item->name, [ 'class' => 'input_width hidden', 'required']) !!}
                        </p>
                        <p>
                            Годы обучения <span class="edittext">с {{ $item->year_start}}по {{ $item->year_end }}</span>
                            {!! Form::number('year_start', $item->year_start, [ 'class' => 'input_width hidden', 'required']) !!}
                            {!! Form::number('year_end', $item->year_end, [ 'class' => 'input_width hidden', 'required']) !!}
                        </p>
                        <p>
                            Специальность: <span class="edittext">{{ $item->specialize }}</span>
                            {!! Form::text('specialize', $item->specialize, [ 'class' => 'input_width hidden', 'required']) !!}
                        </p>
                        <p>
                            Тип: <span class="edittext">{{ $item->type->name }}</span>
                            {!! Form::select('education_type_id', $educations, $item->education_type_id, [ 'class' => 'input_width hidden', 'id' => 'select_education']) !!}
                        </p>

                    </div>
                    <p class="edsub">
                        {!! Form::button('Сохранить', [ 'class' => 'input_width hidden', 'onclick' => 'updateEducation(this);']) !!}
                        {!! Form::button('Не сохранять', [ 'class' => 'input_width btn-link hidden', 'onclick' => 'disableEdit(this);']) !!}
                        {!! Form::button('Удалить', [ 'class' => 'input_width btn-link hidden', 'onclick' => "removeEducation($item->education_id);"]) !!}
                    </p>
                @endforeach
            </div>
            <div class="editblock1">
                <p class="editpersonal">
                    <a onclick="addExperience(this);">Добавить</a> /
                    <a onclick="enableEdit(this);">Редактировать</a>
                </p>
                @foreach( $applicant->experience as $item)
                    <div class="clone3">
                        <h3>Опыт работы:</h3>
                        {!! Form::hidden('experience_id', $item->experience_id) !!}
                        <p>
                            Компания: <span class="edittext"> {{ $item->name }}</span>
                            {!! Form::text('name', $item->name, [ 'class' => 'input_width hidden', 'required']) !!}
                        </p>
                        <p>
                            Период работы <span class="edittext"> с {{ $item->year_start}}
                                по {{ $item->year_end }}</span>
                            {!! Form::number('year_start', $item->year_start, [ 'class' => 'input_width hidden', 'required']) !!}
                            {!! Form::number('year_end', $item->year_end, [ 'class' => 'input_width hidden', 'required']) !!}
                        </p>
                        <p>
                            Должность: <span class="edittext"> {{ $item->position }}</span>
                            {!! Form::text('position', $item->position, [ 'class' => 'input_width hidden', 'required']) !!}
                        </p>
                    </div>
                    <p class="edsub">
                        {!! Form::button('Сохранить', [ 'class' => 'input_width hidden', 'onclick' => 'updateExperience(this);']) !!}
                        {!! Form::button('Не сохранять', [ 'class' => 'input_width btn-link hidden', 'onclick' => 'disableEdit(this);']) !!}
                        {!! Form::button('Удалить', [ 'class' => 'input_width btn-link hidden', 'onclick' => "removeExperience($item->experience_id);"]) !!}
                    </p>
                @endforeach
            </div>
            <div class="editblock1">
                <p class="editpersonal"><a onclick="enableEdit(this);">Редактировать</a></p>
                <h3>О себе: </h3>
                <p>
                    <span class="edittext"> {!! $applicant->description !!} </span>
                    {!! Form::textarea('description', $applicant->description, [ 'class' => 'input_width hidden']) !!}
                </p>

                <p class="edsub">
                    {!! Form::button('Сохранить', [ 'class' => 'input_width hidden']) !!}
                    {!! Form::button('Не сохранять', [ 'class' => 'input_width btn-link hidden', 'onclick' => 'disableEdit(this);']) !!}
                </p>
            </div>
        </div>
        <div class="two-big_button">
            <div class="row">
                <div class="col-sm-7 col-xs-12">
                    <a href="/base-cadrovuh-agenstv.php" class="button-main">Поиск работы с помощью кадрового
                        агентства</a>
                </div>
                <div class="col-sm-5 col-xs-12">
                    <button class="button-main">Удалить аккаунт</button>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
                var phone = div.find("input[name*='phone']").val();
                var country_id = div.find("#select_country").val();
                var city = div.find("input[name*='city']").val();
                var birthday = div.find("input[name*='birthday']").val();


                $.ajax({
                    url: '{{ route("user.edit.info") }}',
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        email: email,
                        phone: phone,
                        country_id: country_id,
                        city: city,
                        birthday: birthday
                    },
                    success: function (data) {
                        showNotificantion(data);
                        disableEdit(button);
                    }
                })
            }

            //        EDUCATION
            function updateEducation(button) {
                var div = $(button).parent().prev();

                var education_id = div.find("input[name*='education_id']").val();
                var name = div.find("input[name*='name']").val();
                var year_start = div.find("input[name*='year_start']").val();
                var year_end = div.find("input[name*='year_end']").val();
                var specialize = div.find("input[name*='specialize']").val();
                var education_type_id = div.find("#select_education").val();

                $.ajax({
                    url: '{{ route("education.edit") }}',
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        education_id: education_id,
                        name: name,
                        year_start: year_start,
                        year_end: year_end,
                        specialize: specialize,
                        education_type_id: education_type_id
                    },
                    success: function (data) {
                        showNotificantion(data);
                        disableEdit(button);
                    }
                })
            }

            function addEducation(button) {
                var div = $(button).parent().parent();

                $.ajax({
                    url: '{{ route("education.new") }}',
                    method: "POST",
                    data: {_token: '{{ csrf_token() }}'},
                    success: function (data) {
                        $(div).after(data);
                    }
                })
            }

            function removeEducation(id) {
                $.ajax({
                    url: '{{ route("education.remove") }}',
                    method: "POST",
                    data: {_token: '{{ csrf_token() }}', education_id: id},
                    success: function (data) {
                        location.reload();
                    }
                })
            }

            //        EXPERIENCE
            function updateExperience(button) {
                var div = $(button).parent().prev();

                var experience_id = div.find("input[name*='experience_id']").val();
                var name = div.find("input[name*='name']").val();
                var year_start = div.find("input[name*='year_start']").val();
                var year_end = div.find("input[name*='year_end']").val();
                var position = div.find("input[name*='position']").val();

                $.ajax({
                    url: '{{ route("experience.edit") }}',
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        experience_id: experience_id,
                        name: name,
                        year_start: year_start,
                        year_end: year_end,
                        position: position
                    },
                    success: function (data) {
                        showNotificantion(data);
                        disableEdit(button);
                    }
                })
            }

            function addExperience(button) {
                var div = $(button).parent().parent();

                $.ajax({
                    url: '{{ route("experience.new") }}',
                    method: "POST",
                    data: {_token: '{{ csrf_token() }}'},
                    success: function (data) {
                        $(div).after(data);
                    }
                })
            }

            function removeExperience(id) {
                $.ajax({
                    url: '{{ route("experience.remove") }}',
                    method: "POST",
                    data: {_token: '{{ csrf_token() }}', experience_id: id},
                    success: function (data) {
                        location.reload();
                    }
                })
            }
        </script>
@endsection