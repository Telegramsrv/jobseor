@extends('layouts.app')
@section('content')
<div class="reg_wrapper">
      <div class="container">
          {!! Form::open(['route' => 'register', 'method' => 'post']) !!}
            {!! Form::token() !!}
          <div class="main_form new">
            <div class="block">
              <div class="row">
                
                <div class="col-xs-7" style="width: 100%; text-align: center;">
                  <div class="input">
                     {!! Form::radio('role_id', '2', false, [ 'class' => 'form-control', 'id' => 'applicant', 'required']) !!} Соискатель
                  </div>
                  <div class="input">
                    {!! Form::radio('role_id', '3', false, [ 'class' => 'form-control', 'id' => 'employer', 'required']) !!} Работодатель
                  </div>
                  <div class="">
                  </div>
                </div>
              </div>
              </div>
            <div class="block">
              <div class="row">
                <div class="email">
                  <div class="col-xs-5">
                    <p>email <span>*</span></p>
                  </div>
                  <div class="col-xs-7 ">  
                       {!! Form::email('email', old('email'), [ 'class' => 'input_width', 'id' => 'email', 'required']) !!}
                       @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="password">
                  <div class="col-xs-5">
                    <p>Пароль <span>*</span></p>
                  </div>
                  <div class="col-xs-7">
                      {!! Form::password('password', [ 'class' => 'input_width', 'id' => 'password', 'required']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="password">
                  <div class="col-xs-5">
                    <p>Повторите пароль <span>*</span></p>
                  </div>
                  <div class="col-xs-7">
                      {!! Form::password('confirm', [ 'class' => 'input_width', 'id' => 'password', 'required']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="block">
              <div class="row">
                <div class="full_name">
                  <div class="col-xs-5">
                    <p>Ф.И.О <span>*</span></p>
                  </div>
                  <div class="col-xs-7">
                         {!! Form::text('name', old('name'), [ 'class' => 'input_width']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="phone_number">
                  <div class="col-xs-5">
                    <p>Телефон</p>
                  </div>
                  <div class="col-xs-7">
                     {!! Form::text('telephone', old('name'), [ 'class' => 'input_width']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="reg_submit">
                  
                  <div class="col-xs-7" style="text-align: center; width: 100%;">
                    <div class="">
                        
                  <p>  {!! Form::checkbox('accept') !!} Согласен с <a href="#">правилами сайта</a> и <a href="#">политикой конфиденциальности</a></p><br> 
                        {!! Form::submit('Регистрация',['class' => 'btn btn-primary']) !!} 
                    </div>
                    <div class="button_reg_sub">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         {!! Form::close() !!}
        </div>
      </div>
@endsection