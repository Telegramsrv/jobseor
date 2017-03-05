<div class="editblock1">
        <div class="clone2">
            <h3>Добавить образование:</h3>
            <p>
                Учебное заведение:
                {!! Form::text('name', '', [ 'class' => 'input_width']) !!}
            </p>
            <p>
                Годы обучения
                {!! Form::number('year_start', '', [ 'class' => 'input_width']) !!}
                {!! Form::number('year_end', '', [ 'class' => 'input_width']) !!}
            </p>
            <p>
                Специальность:
                {!! Form::text('specialize', '', [ 'class' => 'input_width']) !!}
            </p>
            <p>
                Тип:
                {!! Form::select('education_type_id', $educations, '', [ 'class' => 'input_width', 'id' => 'select_education']) !!}
            </p>

        </div>
        <p class="edsub">
            {!! Form::button('Сохранить', [ 'class' => 'input_width', 'onclick' => 'addEducation(this);']) !!}
            {!! Form::button('Удалить', [ 'class' => 'input_width btn-link', 'onclick' => 'deleteNew(this);']) !!}
        </p>
</div>
<script>
    function deleteNew(button) {
        var div = $(button).parent().parent();
        div.remove();
    }

    function addEducation(button) {
        var div = $(button).parent().parent();

        var name = div.find("input[name*='name']").val();
        var year_start = div.find("input[name*='year_start']").val();
        var year_end = div.find("input[name*='year_end']").val();
        var specialize = div.find("input[name*='specialize']").val();
        var education_type_id = div.find("#select_education").val();

        $.ajax({
            url: '{{ route("user.add.education") }}',
            method: "POST",
            data: { _token: '{{ csrf_token() }}', name: name, year_start: year_start, year_end: year_end, specialize: specialize, education_type_id: education_type_id},
            success: function (data) {
                alert(data);
            }
        })
    }
</script>