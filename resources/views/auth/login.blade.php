@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="row new">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 col-xs-12">
                    <div class="login-wrapper">
                        <h3>Вход в личный кабинет</h3>
                        <div class="block">
                              {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                                {!! Form::token() !!}
                                <div class="my-row">
                                    <div class="text-zona">
                                        <p>E-mail <span> *</span></p>
                                    </div>
                                    <div class="input-zona">
                                          {!! Form::email('email', old('email'), [ 'class' =>'input_width', 'id' => 'email', 'required', 'autofocus']) !!} 
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="my-row">
                                    <div class="text-zona">
                                        <p>Пароль <span> *</span></p>
                                    </div>
                                    <div class="input-zona">
                                        {!! Form::password('password',[ 'class' => 'input_width', 'id' => 'password', 'required']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                              
                                <div class="my-row">
                                    <div class="auto_input">
                                       <p>  {!! Form::checkbox('remember', 1,old('remember') ? 'checked' : '') !!}  Запомнить меня</p> <br>
                                          <p> {!! Form::submit('Войти',[ 'class' => 'btn btn-primary']) !!} </p> <br>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Забыли пароль?
                                        </a>
                                        <a class="btn btn-link" href="{{ route('register') }}">
                                        Регистрация
                                        </a>
                                           
                                    </div>
                                </div>
                             {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>

        </div>
@endsection