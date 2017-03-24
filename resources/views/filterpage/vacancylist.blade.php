<div class="container">
    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="headervakanse">
            Найдено: {{ $vacancies->count() }} вакансий.
        </div>
        @if($vips->isNotEmpty())
            <h4>VIP Вакансии</h4>
            @foreach($vips as $vacancy)
                <div class="vakanceblock">
                    <div class="avatarvacanse">
                        <img src="/{{ $vacancy->user->image }}" alt="Аватар без фото" title="name resume">
                    </div>
                    <h2><a href="{{ route('vacancy.view', [ 'id' => $vacancy->vacancy_id]) }}">{{ $vacancy->title }}</a>
                    </h2>
                    <p>{{ $vacancy->user->name }} , {{ $vacancy->country->name }}, {{ $vacancy->city }}</p>
                    <p>{{ $vacancy->employment->name }} занятость. Опыт работы
                        : {{ $vacancy->experience_type->name }}. {{ $vacancy->education->name }} образование.
                        • {{ str_limit($vacancy->description, 97) }}…</p>
                </div>
            @endforeach
            <hr/>
        @endif

        <h4>Вакансии по вашему запросу</h4>

        @foreach($vacancies as $vacancy)
            <div class="vakanceblock">
                <div class="avatarvacanse">
                    <img src="/{{ $vacancy->user->image }}" alt="Аватар без фото" title="name resume">
                </div>
                <h2><a href="{{ route('vacancy.view', [ 'id' => $vacancy->vacancy_id]) }}">{{ $vacancy->title }}</a>
                </h2>
                <p>{{ $vacancy->user->name }} , {{ $vacancy->country->name }}, {{ $vacancy->city }}</p>
                <p>{{ $vacancy->employment->name }} занятость. Опыт работы
                    : {{ $vacancy->experience_type->name }}. {{ $vacancy->education->name }} образование.
                    • {{ str_limit($vacancy->description, 97) }}…</p>
            </div>
        @endforeach

        <div class="col-md-12">
        </div>
    </div>
</div>