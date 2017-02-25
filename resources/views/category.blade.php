@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>{{ $category->name }}</h3>
                @foreach( $subcategories as $item)
                    <div class="md-2">
                        <a href="#">
                            <img src="/{{ $item->image }}" alt="{{ $item->name }}">
                            <h4>{{ $item->name }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
