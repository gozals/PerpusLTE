@extends('layouts.auth')

@section('content')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{url('')}}"><b>Perpus</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          {{ csrf_field() }}
      <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
        <input name="name" type="text" class="form-control" placeholder="Full name">
          @if ($errors->has('name'))
              <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
          @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input name="email" type="email" class="form-control" placeholder="Email">
          @if ($errors->has('email'))
              <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
          @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input name="password" type="password" class="form-control" placeholder="Password">
          @if ($errors->has('password'))
              <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
          @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input name="password_confirmation" type="password" class="form-control" placeholder="Retype password">
          @if ($errors->has('password_confirmation'))
              <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
          @endif
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input name="terms" type="checkbox"> I agree to the <a data-toggle="modal" href="#termsModal">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{url('login')}}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

@include('layouts.partials.scripts_auth')

@include('auth.terms')

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
@endsection