@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach($regions as $region)
                    <h3>{{ $region->name }}</h3>
                    @foreach( $region->countries as $item)
                        <div class="md-2">
                            <a href="{{ route('country.index', [ 'slug' => $item->slug]) }}">
                                <img src="/{{ $item->image }}" alt="{{ $item->name }}">
                                <h4>{{ $item->name }}</h4>
                            </a>
                        </div>
                    @endforeach
                    <hr/>
                @endforeach
            </div>
        </div>
    </div>
@endsection
