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
            <p style="font-size: 19px;">Баланс: <span style="color: orange;">{{ $user->balance }}</span> Seorik <button  class="button-main">Пополнить</button></p>
        </div>
        <div id="rezumecenter" class="rezumeblock">
            <div class="editblock1">
            <p class="editpersonal"><a onclick="enableEdit(this);" >Редактировать</a></p>
                <div class="avatarvacanse">
                        <img alt="Аватар {{ $user->name }}" title="Avatar" src="/{{ $user->image }}" >
                </div>
                <p id="downloadphoto" style="display: none; text-align: center;"><a href="">Загрузить фото</a></p>

            <h1>
                <span class="div.second edittext">{{ $user->name }}</span>
                {!! Form::text('name', $user->name, [ 'class' => 'input_width hidden']) !!}
            </h1>
            <p>
                Email: <span class="edittext">{{ $user->email }}</span>
                {!! Form::email('email', $user->email, [ 'class' => 'input_width hidden']) !!}
            </p>
            <p>
                Телефон:  <span class="edittext">{{ $user->contacts->phone }}</span>
                {!! Form::text('phone', $user->contacts->phone, [ 'class' => 'input_width hidden']) !!}
            </p>
            <p>
                Страна: <span class="edittext">{{ $applicant->country->name }}</span>
                {!! Form::select('country_id', $countries, $user->applicant->country_id, [ 'class' => 'input_width hidden', 'id' => 'select_country']) !!}
            </p>
            <p>
                Город: <span class="edittext">{{ $applicant->city }}</span>
                {!! Form::text('city', $user->applicant->city, [ 'class' => 'input_width hidden']) !!}
            </p>
            <p>
                Дата рождения: <span class="edittext">{{ $applicant->birthday }}</span>
                {!! Form::date('birthday', $user->applicant->birthday, ['class' => 'input_width hidden']) !!}
            </p>

            <p class="edsub">
                {!! Form::button('Сохранить', [ 'class' => 'input_width hidden', 'onclick' => 'updateInfo(this);']) !!}
                {!! Form::button('Не сохранять', [ 'class' => 'input_width btn-link hidden', 'onclick' => 'disableEdit(this);']) !!}
            </p>
        </div>

        <div class="editblock1">
            <p class="editpersonal"><a onclick="enableEdit(this);">Редактировать</a></p>
            @foreach( $applicant->education as $item)
                <div class="clone2">
                    <h3>Образование:</h3>
                    <p>
                        Учебное заведение: <span class="edittext"> {{ $item->name }}</span>
                        {!! Form::text('name', $item->name, [ 'class' => 'input_width hidden']) !!}
                    </p>
                    <p>
                        Годы обучения <span class="edittext">с {{ $item->year_start}} по {{ $item->year_end }}</span>
                        {!! Form::number('year_start', $item->year_start, [ 'class' => 'input_width hidden']) !!}
                        {!! Form::number('year_end', $item->year_end, [ 'class' => 'input_width hidden']) !!}
                    </p>
                    <p>
                        Специальность: <span class="edittext">{{ $item->specialize }}</span>
                        {!! Form::text('specialize', $item->specialize, [ 'class' => 'input_width hidden']) !!}
                    </p>
                    <p>
                        Тип: <span class="edittext">{{ $item->type->name }}</span>
                        {!! Form::select('education_type_id', $educations, $item->education_type_id, [ 'class' => 'input_width hidden']) !!}
                    </p>

                </div>
                <p class="edsub">
                    {!! Form::button('Сохранить', [ 'class' => 'input_width hidden']) !!}
                    {!! Form::button('Не сохранять', [ 'class' => 'input_width btn-link hidden', 'onclick' => 'disableEdit(this);']) !!}
                </p>

        </div>
        <div class="editblock1">
            @endforeach
            <p class="editpersonal"><a onclick="enableEdit(this);">Редактировать</a></p>
            @foreach( $applicant->experience as $item)
                <h3>Опыт работы:</h3>
                <p>
                    Компания: <span class="edittext"> {{ $item->name }}</span>
                    {!! Form::text('name', $item->name, [ 'class' => 'input_width hidden']) !!}
                </p>
                <p>
                    Период работы <span class="edittext"> с {{ $item->year_start}} по {{ $item->year_end }}</span>
                    {!! Form::number('year_start', $item->year_start, [ 'class' => 'input_width hidden']) !!}
                    {!! Form::number('year_end', $item->year_end, [ 'class' => 'input_width hidden']) !!}
                </p>
                <p>
                    Должность: <span class="edittext"> {{ $item->position }}</span>
                    {!! Form::text('position', $item->position, [ 'class' => 'input_width hidden']) !!}
                </p>
                <p class="edsub">
                    {!! Form::button('Сохранить', [ 'class' => 'input_width hidden']) !!}
                    {!! Form::button('Не сохранять', [ 'class' => 'input_width btn-link hidden', 'onclick' => 'disableEdit(this);']) !!}
                </p>

        </div>
        <div class="editblock1">
            @endforeach
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
                <a href="/base-cadrovuh-agenstv.php" class="button-main">Поиск работы с помощью кадрового агентства</a>
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
            var div = $(button).parent().parent().css('background-color','red');

            var name = div.find("input[name*='name']").val();
            var email = div.find("input[name*='email']").val();
            var phone = div.find("input[name*='phone']").val();
            var country_id = div.find("#select_country").val();
            var city = div.find("input[name*='city']").val();
            var birthday = div.find("input[name*='birthday']").val();


            {{--$.ajax({--}}
                {{--url: '{{ route("user.edit.info") }}',--}}
                {{--method: "POST",--}}
                {{--data: { _token: '{{ csrf_token() }}', birthday : birthday, country_id : country_id, city : city},--}}
                {{--success: function (data) {--}}
                    {{--alert(data);--}}
                {{--}--}}
            {{--})--}}
        }
    </script>
@endsection