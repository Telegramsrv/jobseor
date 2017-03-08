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
                            <h3>Должность: {{ $title }}</h3>
                            <h2><strong>Основная информация:</strong></h2>
                            <p>Страна: {{ $user->applicant->country->name }}</p>
                            <p>Город: {{ $user->applicant->city }}</p>
                            @foreach( $user->applicant->education as $item)
                                <p>Образование: {{ $item->type->name }}, {{ $item->name }}, {{ $item->year_start }}-{{ $item->year_end }} год, {{ $item->specialize }}.</p>
                            @endforeach
                            <p>Год рождения: {{ $user->applicant->birthday }}</p>
                            <p>Желаемая заработная плата: {{ $salary }} {{ $currency->name }}</p>
                            <h3>Опыт работы:</h3>
                            @foreach( $user->applicant->experience as $item)
                                <p>{{ $item->name }}, {{ $item->year_start }}-{{ $item->year_end}} год, {{ $item->position }}.</p>
                            @endforeach
                            <h3>Контактная информация:</h3>
                            <p>Телефон: {{ $user->contacts->phone }}</p>
                            <p>Email: {{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="text_employer">
                    <h3 style="margin-left: 10px;">Дополнительная информация:</h3>
                    <p style="margin-left: 10px;"> {!! $information !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>