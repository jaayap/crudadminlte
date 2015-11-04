@extends('crudadminlte::admin._tmpl.layout')

@section('_scripts')
@stop

@section('_styles')
@stop

@section('content')

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Settings
			<small>Settings</small>
		</h1>
    <?php /*
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Settings</li>
		</ol>
    */ ?>
	</section>

	<!-- Main content -->
	<section class="content">

		{!! \DrawField::test() !!}

	</section><!-- /.content -->

@stop
