@extends('layouts.app')
@section('content')
    <div class="full-width_blue-background">
        <div class="container" id="breadcumps">
            @yield('breadcrumbs')
        </div>
    </div>

    <div class="container">
        <div class="headervakanse" style="min-height: 50px;">
            <p style="float: right; ">
                <a style="cursor: pointer; padding: 10px;">Мои предложения</a>
                <a style="cursor: pointer; padding: 10px;">Мои отклики</a>
                <a href="{{ route('user.notepad.history') }}" style="cursor: pointer; padding: 10px;">История</a>
                <a href="{{ route('user.notepad.viewers') }}" style="cursor: pointer; padding: 10px;">Просмотры резюме</a>
                <a href="{{ route('user.notepad') }}" style="padding: 10px;">Мои резюме и вакансии</a>
                <a href="{{ route('user.edit') }}" style="cursor: pointer; padding: 10px;">Настройки</a>
            </p>
        </div>
        @yield('home_content')
    </div>
@endsection