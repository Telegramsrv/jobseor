<div class="editblock1">
    <div class="clone2">
        <h3>Добавить место работы:</h3>
        <p>
            Компания:
            {!! Form::text('name', '', [ 'class' => 'input_width', 'required']) !!}
        </p>
        <p>
            Период работы
            {!! Form::number('year_start', '', [ 'class' => 'input_width', 'required']) !!}
            {!! Form::number('year_end', '', [ 'class' => 'input_width', 'required']) !!}
        </p>
        <p>
            Должность:
            {!! Form::text('position', '', [ 'class' => 'input_width', 'required']) !!}
        </p>

    </div>
    <p class="edsub">
        {!! Form::button('Сохранить', [ 'class' => 'input_width', 'onclick' => 'addExperience(this);']) !!}
        {!! Form::button('Удалить', [ 'class' => 'input_width btn-link', 'onclick' => 'closeAddExperience(this);']) !!}
    </p>
</div>
<script>
    function closeAddExperience(button) {
        var div = $(button).parent().parent();
        div.remove();
    }

    function addExperience(button) {
        var div = $(button).parent().parent();

        var name = div.find("input[name*='name']").val();
        var year_start = div.find("input[name*='year_start']").val();
        var year_end = div.find("input[name*='year_end']").val();
        var position = div.find("input[name*='position']").val();

        $.ajax({
            url: '{{ route("experience.add") }}',
            method: "POST",
            data: { _token: '{{ csrf_token() }}', name: name, year_start: year_start, year_end: year_end, position: position},
            success: function (data) {
                showNotificantion(data);
                disableEdit(button);
                location.reload();//Idea for fix
            }
        })
    }
</script>