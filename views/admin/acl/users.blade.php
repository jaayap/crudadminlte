@extends('crudadminlte::admin._tmpl.layout')

@section('_scripts')
@stop

@section('_styles')
@stop

@section('content')

	{{-- \_e::pre($config) --}}

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- / PAGE HEADER -->
		<h1>
			{{ $config['heading']['main'] }}
				@if (isset($config['heading']['sub'])) <small>{{ $config['heading']['sub'] }} : <strong>{{ $_data->name }}</strong></small> @endif
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab_1" data-toggle="tab">Tab 1</a>
				</li>
				<li>
					<a href="#tab_2" data-toggle="tab">Tab 2</a>
				</li>
				<?php /*
				<li class="pull-right">
					<a href="#" class="text-muted"><i class="fa fa-gear"></i></a>
				</li>
				*/ ?>
			</ul>

			<form role="form" class="form-inline form-block">
				<div class="tab-content">

					<div class="tab-pane active" id="tab_1">

						<div class="box-body">

							<div class="row form-group">
		            <div class="col-sm-2">
									<label for="xxx">Email address</label>
								</div><!-- /.col -->
		            <div class="col-sm-10">
									<input type="email" class="form-control frm_lrg" id="xxx" placeholder="Enter email">
								</div><!-- /.col -->
							</div><!-- /.row -->
							<div class="row form-group">
		            <div class="col-sm-2">
									<label for="xxx">Email address</label>
								</div><!-- /.col -->
		            <div class="col-sm-10">
									<input type="email" class="form-control frm_lrg" id="xxx" placeholder="Enter email">
								</div><!-- /.col -->
							</div><!-- /.row -->
							<div class="row form-group">
		            <div class="col-sm-2">
									<label for="xxx">Email address</label>
								</div><!-- /.col -->
		            <div class="col-sm-10">
									<input type="email" class="form-control frm_lrg" id="xxx" placeholder="Enter email">
								</div><!-- /.col -->
							</div><!-- /.row -->

							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control frm_lrg" id="" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="text" class="form-control frm_med" id="" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="text" class="form-control frm_sm" id="" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control frm_xs" id="" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="exampleInputFile">File input</label>
								<input type="file" id="exampleInputFile">
								<p class="help-block">Example block-level help text here.</p>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox"> Check me out
								</label>
							</div>

						</div><!-- /.box-body -->

					</div><!-- /.tab-pane -->
					<div class="tab-pane" id="tab_2">
						The European languages are members of the same family. Their separate existence is a myth.
						For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
						in their grammar, their pronunciation and their most common words. Everyone realizes why a
						new common language would be desirable: one could refuse to pay expensive translators. To
						achieve this, it would be necessary to have uniform grammar, pronunciation and more common
						words. If several languages coalesce, the grammar of the resulting language is more simple
						and regular than that of the individual languages.
					</div><!-- /.tab-pane -->
				</div><!-- /.tab-content -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>

		</div><!-- /.nav-tabs-custom -->
		</form>

	</section><!-- /.content -->

@stop
