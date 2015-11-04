@extends('crudadminlte::admin._tmpl.layout')

@section('_scripts')
@stop

@section('_styles')
@stop

@section('content')

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- / PAGE HEADER -->
		<h1>
			{{ $_data['heading']['main'] }}
				@if (isset($_data['heading']['sub'])) <small>{{ $_data['heading']['sub'] }}</small> @endif
		</h1>
		<!-- / BREADCRUMBS -->
		<?php /*
		{!! Breadcrumbs::render('home') !!}
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> admin</a></li>
			<li><a href="#">acl</a></li>
			<li class="active">user</li>
		</ol>
		*/ ?>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					{!! \UI::drawListViewHeader($_data) !!}
					{!! \UI::drawDataTable($_data) !!}

					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								@include('crudadminlte::pagination', ['paginator' => $_data['data']])
								{!! \UI::_drawAction($_data['actions'],$_data['current']); !!}
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.box-body -->

				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->

	<a id="top-link" href="#body" class="btn btn-default btn-lg" style="display: inline;"><span class="fa fa-arrow-up"></span></a>

@stop
