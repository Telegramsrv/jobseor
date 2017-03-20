@extends('layouts.home')

@section('breadcrumbs')
    <a href="/">Главная</a> -&gt; Добавить резюме
@endsection

@section('home_content')
    <div class="add_vac">
        <div class="container">
            <div class="main_form new">
                @if(empty($summary->title))
                    {!! Form::open(['route' => 'summary.add.post', 'method' => 'post']) !!}
                    @else
                    {!! Form::open(['route' => 'summary.edit.post', 'method' => 'post']) !!}
                    {!! Form::hidden('summary_id', $summary->summary_id) !!}
                @endif
                <div class="block">
                    <div class="info_vac">
                        <div class="row">
                            <div class="col-xs-5">
                                <h4>Добавить резюме</h4>
                            </div>
                            <div class="col-xs-7 right">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="row">
                        <div class="vac_town">
                            <div class="col-xs-5">
                                <p>Желаемая должность<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town">
                                    {!! Form::text('title', $summary->title , [ 'class' => 'input_width', 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="vac">
                            <div class="col-xs-5">
                                <p>Категория<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town">
                                    {!! Form::select('category_id', $categories, $summary->category_id, [ 'class' => 'input_width', 'required', 'onchange' => 'updateProfession();']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="vac">
                            <div class="col-xs-5">
                                <p>Профессия<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town profession">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="vac">
                            <div class="col-xs-5">
                                <p>Тип занятости<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town">
                                    {!! Form::select('employment_id', $employments, $summary->employment_id, [ 'class' => 'input_width', 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="money_vac">
                            <div class="col-xs-5">
                                <p>Желаемая заработная пaлата</p>
                            </div>
                            <div class="col-xs-7">
                                <div>
                                    {!! Form::number('salary', $summary->salary,  [ 'class' => 'input_width']) !!}
                                    {!! Form::select('currency_id', $currencies, $summary->currency_id, [ 'class' => 'input_width']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="experience">
                            <div class="col-xs-5">
                                <p>Дополнительные навыки</p>
                            </div>

                            <div class="col-xs-7">
                                {!! Form::textarea('information', $summary->information, [ 'cols' => '70', 'rows' => '8']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="load_img">
                                {!! Form::button('Предосмотр', [ 'class' => 'button_width', 'onclick' => 'preview();']) !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="load_img ">
                                @if(empty($summary->title))
                                    {!! Form::submit('Добавить резюме', [ 'class' => 'button_width']) !!}
                                    @else
                                    {!! Form::submit('Редактировать резюме', [ 'class' => 'button_width']) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            updateProfession();
        });

        function updateProfession() {
            var category_id = $('select[name=category_id]').val();
            $('.profession').empty();
            $.ajax({
                url: '{{ route("vacancy.profession") }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: category_id
                },
                success: function (data) {
                    $('.profession').append(data);
                }
            });
        }

        function preview() {
            $('.preview').remove();
            var title = $("input[name*='title']").val();
            var salary = $("input[name*='salary']").val();
            var category_id = $("select[name=category_id]").val();
            var currency_id = $("select[name=currency_id]").val();
            var information = $("textarea").val();


            $.ajax({
                url: '{{ route("summary.preview") }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    title: title,
                    salary: salary,
                    category_id: category_id,
                    currency_id: currency_id,
                    information: information
                },
                success: function (data) {
                    $('.add_vac').after(data);
                    $(window).scrollTop($('.preview').offset().top);
                }
            });
            return false;
        }
    </script>
@endsection