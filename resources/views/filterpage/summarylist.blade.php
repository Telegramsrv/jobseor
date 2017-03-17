<div class="container">
    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="headervakanse">
            Найдено: {{ $summaries->count() }} резюме.
        </div>

        @foreach($summaries as $summary)
            <div class="vakanceblock">
                <div class="avatarvacanse">
                    <img src="/{{ $summary->user->image }}" alt="Аватар без фото" title="{{ $summary->title }}">
                </div>
                <h2><a href=" {{ route('summary.view', [ 'id' => $summary->summary_id]) }}">{{ $summary->title }}</a>
                </h2>
                <p>{{ $summary->user->name }}</p>
                <p>Опыт работы : {{ $summary->user->applicant->experience_year() }} год.
                    • {{ str_limit($summary->information, 97) }}… • Зарплата
                    от {{ $summary->salary }} {{ $summary->currency->name }} </p>
            </div>
        @endforeach

        <div class="col-md-12">
        </div>
    </div>
</div>