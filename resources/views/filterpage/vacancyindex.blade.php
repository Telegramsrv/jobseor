@extends('layouts.app')

@section('content')
    <div class="full-width_blue-background">
        <div class="container" id="breadcumps">
            <a href="/">Главная</a> -&gt; Поиск вакансий
        </div>
    </div>
    <div class="sortvakanse">
        <div class="container">
            <div class="rowsort">
                <p>Категория:</p>
                {!! Form::select('category_id', $categories, '-1', [ 'onchange' => 'updateProfession();']) !!}
            </div>
            <div class="rowsort" id="profession">
                <p>Профессия:</p>
                {!! Form::select('profession_id', $professions, '-1') !!}
            </div>
            <div class="rowsort">
                <p>Страна:</p>
                {!! Form::select('country_id', $countries, '-1') !!}
            </div>
            <div class="rowsort">
                <p>Занятость:</p>
                {!! Form::select('employment_id', $employments, '-1') !!}
            </div>
            <div class="rowsort">
                <p>Образование:</p>
                {!! Form::select('education_type_id', $education_types, '-1') !!}
            </div>
            <div class="rowsort">
                <p>Опыт работы:</p>
                {!! Form::select('experience_type_id', $experience_types, '-1') !!}
            </div>
        </div>
    </div>
    <script>
        function updateFilter() {
            var category_id = $('select[name=category_id]').val();
            var country_id = $('select[name=country_id]').val();
            var employment_id = $('select[name=employment_id]').val();
            var education_type_id = $('select[name=education_type_id]').val();
            var experience_type_id = $('select[name=experience_type_id]').val();
            var profession_id = $('select[name=profession_id]').val();

            $.ajax({
                url: '{{ route("vacancy.filter") }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: category_id,
                    profession_id: profession_id,
                    country_id: country_id,
                    employment_id: employment_id,
                    education_type_id: education_type_id,
                    experience_type_id: experience_type_id
                },
                success: function (data) {
                    $('.headervakanse').parent().remove();
                    $('.sortvakanse').after(data);
                }
            });
        }

        $(document).ready(updateFilter());

        $(window).change(function () {
            updateFilter();
        });

        function updateProfession() {
            var category_id = $('select[name=category_id]').val();
            $.ajax({
                url: '{{ route("vacancy.filter.profession") }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: category_id
                },
                success: function (data) {
                    $('select[name=profession_id]').remove();
                    $('#profession').append(data);
                }
            });
        }


    </script>
@endsection