@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Работа За Границей</h3>
            @foreach( $simplecategory as $item)
                <div class="md-2">
                    <a href="{{ route('category.index',[ 'slug' => $item->slug]) }}">
                        <img src="/{{ $item->image }}" alt="{{ $item->name }}">
                        <h4>{{ $item->name }}</h4>
                    </a>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="col-md-8">
            <h3>Вакансии для специалистов</h3>
            @foreach( $specialistscategory as $item)
                <div class="md-2">
                    <a href="{{ route('category.index',[ 'slug' => $item->slug]) }}">
                        <img src="/{{ $item->image }}" alt="{{ $item->name }}">
                        <h4>{{ $item->name }}</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
