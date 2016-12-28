@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form class="form-vertical" role="form" action="{{ route('auth.signup') }}" method="post">
                <div class="form-group has-error{{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="control-label">your email address</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{Request::old('email') ?: ''}}">
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group has-error{{ $errors->has('username') ? 'has-error' : '' }}">
                    <label for="username" class="control-label">choose a username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{Request::old('username') ?: ''}}">

                    @if($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group has-error{{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="control-label">choose a password</label>
                    <input type="text" name="password" class="form-control" id="password" value="">

                    @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type ="submit" class="btn btn-default"name="button">sign up</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@stop