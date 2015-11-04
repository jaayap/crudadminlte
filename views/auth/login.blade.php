@extends('crudadminlte::admin._tmpl.blank')

@section('_scripts')

<!-- iCheck -->
<script src="{{ asset( config('vendor.CrudAdminLte.adminltesource.scripts.icheck') ) }}"></script>
<script>
	$(function () {
		/*
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
		*/
	});
</script>
@stop

@section('_styles')
<!-- iCheck -->
<link href="{{ asset( config('vendor.CrudAdminLte.adminltesource.styles.icheck.1') ) }}" rel="stylesheet" type="text/css" />
@stop

@section('_body')
	class="login-page"
@stop

@section('content')

@define $lastLogin = Request::cookie('lastLogin');

<div class="login-box">

	<div class="login-logo"></div><!-- /.login-logo -->

	<div class="login-box-body">

		<p class="login-box-msg">Please sign in.</p>

		<form role="form" method="POST" action="{{ route('crud_auth_check') }}" autocomplete="off">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@if (isset($lastLogin))
				<div class="form-group has-feedback">
					<input type="hidden" name="email" value="{{ $lastLogin['email'] }}" />
					<!-- lockscreen image -->
					<div class="lockscreen-image" style="position:relative; text-align:center;left:0; top:0;">
						<img style="width:150px; height:150px;" src="{{ url('/profile/suvi_thammasarn-250x250.jpg') }}" alt="user image"/>
					</div>
					<!-- /.lockscreen-image -->
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password" />
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
			@else
			<div class="form-group has-feedback">
				<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" />
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			@endif

			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
							<?php /*
							<input type="checkbox" name="remember"> Remember Me
							*/ ?>
							<a href="{{ url('/sentry/password/email') }}">I forgot my password</a>
					</div>
				</div><!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div><!-- /.col -->
				@if (isset($lastLogin))
				<div class="col-xs-12">
					<a href="{{ route('auth_reset') }}">Not {{ $lastLogin['name'] }}? Sign in as someone else.</a>
				</div><!-- /.col -->
				@endif
				</div>
		</form>

	</div><!-- /.login-box-body -->
</div><!-- /.login-box -->

@endsection
