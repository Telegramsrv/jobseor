@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Визы в {{ $country->name }}</h3>
                <small>Регион : <a href="{{ route('region.index',['slug' => $country->region->slug]) }}">{{ $country->region->name }}</a></small>
                <p>
                    {!! $country->body !!}
                </p>
            </div>
        </div>
    </div>
@endsection