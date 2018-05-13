<h2>{{__('Login')}}</h2>
@if (session('confirmation-success'))
    <div class="alert alert-success">
        {{ session('confirmation-success') }}
    </div>
@endif
@if (session('confirmation-danger'))
    <div class="alert alert-danger">
        {!! session('confirmation-danger') !!}
    </div>
@endif
<form class=" form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-3 control-label">{{__('E-Mail Address')}}</label>

        <div class="col-md-9">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-3 control-label">{{__('Password')}}</label>

        <div class="col-md-9">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{__('Remember Me')}}
                </label>
            </div>
        </div>
    </div>

    <div class="row form-group text-center">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                {{__('Login')}}
            </button>

            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                {{__('Forgot Your Password?')}}
            </a>
        </div>
    </div>
    <div class="row form-group text-center">
        <div class="col-md-12">
            <a class="btn btn-social btn-github" href="{{route('social.login','github')}}">
                <span class="fa fa-github"></span>{{__(' Sign in with Github')}}
            </a>

        </div>
        {{--<div class="col-md-12">--}}
            {{--<a class="btn btn-social btn-google" href="{{route('social.login','google')}}">--}}
                {{--<span class="fa fa-google"></span>{{__(' Sign in with Google')}}--}}
            {{--</a>--}}

        {{--</div>--}}
    </div>
</form>