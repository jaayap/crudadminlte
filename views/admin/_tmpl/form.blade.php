@extends('crudadminlte::admin._tmpl.layout')

@section('_scripts')
@stop

@section('_styles')
@stop

@section('content')

	{? $route = explode('@',Route::getCurrentRoute()->getActionName()) ?}
	{? $action = ($type == 'NEW') ? action('\\'.$route[0].'@store') : action('\\'.$route[0].'@update',$_data->id) ?}

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- / PAGE HEADER -->
		<h1>
			{{ $config['heading']['main'] }}
				@if (isset($config['heading']['sub'])) <small>{{ $config['heading']['sub'] }}
					@if (isset($_data->name)) : <strong>{{ $_data->name }}</strong> @endif
				</small> @endif
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">

		<?php /*
		<div class="callout callout-info">
			<h4>Tip!</h4>
			<p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular links instead.</p>
		</div>
		*/ ?>

		@if (count($errors) > 0)
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Form Error!</h4>
			<p>Please check the form and try again.</p>
			<?php /*
			<p><ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul></p>
			*/ ?>
		</div>
		@endif

		{!! \Form::open(array('url'=>$action,'class'=>'form-horizontal')) !!}
			{!! \UI::drawForm($type, $config['form'], $_data, $errors) !!}
			<div class="box-footer">
				<button type="submit" class="btn btn-primary btn-flat">Submit</button>
				<a href="{{ action('\\'.$route[0].'@index') }}" class="btn btn-default btn-flat">Cancel</a>
			</div>
		{!! \Form::close() !!}
	</section><!-- /.content -->

@stop
