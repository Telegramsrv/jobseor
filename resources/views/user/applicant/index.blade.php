@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Страница соискателя</h3>
    <div id="rezumecenter" class="rezumeblock">
        <div class="editblock1">
            <div class="avatarvacanse">
                <img alt="Аватар {{ $user->name }}" title="Avatar" src="/{{ $user->image }}">
            </div>

            <h1>
                <span class="div.second">{{ $user->name }}</span>
            </h1>
            <p>
                Email: {{ $user->email }}
            </p>
            <p>
                Телефон: {{ $user->contacts->phone }}
            </p>
            <p>
                Страна: {{ $applicant->country->name }}
            </p>
            <p>
                Город: {{ $applicant->city }}
            </p>
            <p>
                Дата рождения: {{ $applicant->birthday }}
            </p>
        </div>

        <div class="editblock1">
            @foreach( $applicant->education as $item)
                <div class="clone2">
                    <h3>Образование:</h3>
                    <p>
                        Учебное заведение: <span class="edittext"> {{ $item->name }}</span>
                    </p>
                    <p>
                        Годы обучения <span class="edittext">с {{ $item->year_start}}по {{ $item->year_end }}</span>
                    </p>
                    <p>
                        Специальность: <span class="edittext">{{ $item->specialize }}</span>
                    </p>
                    <p>
                        Тип: <span class="edittext">{{ $item->type->name }}</span>
                    </p>
                </div>
            @endforeach
        </div>
        <div class="editblock1">
            @foreach( $applicant->experience as $item)
                <div class="clone3">
                    <h3>Опыт работы:</h3>
                    <p>
                        Компания: <span class="edittext"> {{ $item->name }}</span>
                    </p>
                    <p>
                        Период работы <span class="edittext"> с {{ $item->year_start}}
                            по {{ $item->year_end }}</span>
                    </p>
                    <p>
                        Должность: <span class="edittext"> {{ $item->position }}</span>
                    </p>
                </div>
            @endforeach
        </div>
        <div class="editblock1">
            <h3>О себе: </h3>
            <p>
                <span class="edittext"> {!! $applicant->description !!} </span>
            </p>
        </div>
    </div>
    </div>
@endsection