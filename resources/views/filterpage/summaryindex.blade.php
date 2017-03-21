@extends('layouts.app')

@section('content')
    <div class="full-width_blue-background">
        <div class="container" id="breadcumps">
            <a href="/">Главная</a> -&gt; Поиск резюме
        </div>
    </div>
    <div class="sortvakanse">
        <div class="container">
            {!! Form::open() !!}
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
                {!! Form::select('education_type_id', $education_types, '5') !!}
            </div>
            <div class="rowsort">
                <p>Опыт работы:</p>
                {!! Form::select('experience_type_id', $experience_types, '-1') !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script>
        $(document).ready(function () {
            updateFilter();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function updateFilter() {
            $.ajax({
                url: '{{ route("summary.filter") }}',
                method: "POST",
                data: $('form').serialize(),
                success: function (data) {
                    $('.headervakanse').parent().remove();
                    $('.sortvakanse').after(data);
                }
            });
        }

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

        $(window).change(function () {
            updateFilter();
        });
    </script>
@endsection