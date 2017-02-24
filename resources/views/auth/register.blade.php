@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'register', 'method' => 'post']) !!}

                        {!! Form::token() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'id' => 'name', 'required', 'autofocus']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'id' => 'email', 'required']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                {!! Form::password('password',[ 'class' => 'form-control', 'id' => 'password', 'required']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation',[ 'class' => 'form-control', 'id' => 'password-confirm', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role-1" class="col-md-4 control-label">Компания</label>
                            <div class="col-md-6">
                                {!! Form::radio('role_id', '2', false, [ 'class' => 'form-control', 'id' => 'role-1', 'required']) !!}
                            </div>
                            <br/>
                            <label for="role-4" class="col-md-4 control-label">Соискатель</label>
                            <div class="col-md-6">
                                {!! Form::radio('role_id', '3', false, [ 'class' => 'form-control', 'id' => 'role-2', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Register',['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
