<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin : </title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	@include('crudadminlte::admin._tmpl.required.styles')
	@yield('_styles')

	<!-- jQuery 2.1.3 -->
	<script src="{{ asset( config('vendor.CrudAdminLte.adminltesource.scripts.jquery') ) }}"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="{{ asset( config('vendor.CrudAdminLte.adminltesource.scripts.html5shiv') ) }}"></script>
	<script src="{{ asset( config('vendor.CrudAdminLte.adminltesource.scripts.respond') ) }}"></script>
	<![endif]-->

</head>
<body class="skin-black fixed
	@if (!Auth::user())
		sidebar-collapse
	@endif
" role="document" id="body">

		<div class="wrapper">

			@if (Auth::user())
			<header class="main-header">

				<!-- Logo -->
				<a href="{{ route('crud_admin') }}" class="logo"><strong>suvilicious</strong>.com</a>

				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						@include('crudadminlte::admin._tmpl.partials.header')
					</div>
				</nav>
			</header>

			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					{{-- @include('crudadminlte::admin._tmpl.partials.searchbar') --}}
					@include('crudadminlte::admin._tmpl.partials.router')
				</section>
				<!-- /.sidebar -->
			</aside>
			@endif

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				{!! \Msg::getHtml() !!}
				@yield('content')
			</div><!-- /.content-wrapper -->

			@include('crudadminlte::admin._tmpl.partials.footer')

		</div><!-- ./wrapper -->

	@include('crudadminlte::admin._tmpl.required.scripts')
	@yield('_scripts')

{!! \UI::_renderScripts($_sysScripts) !!}

{!! \UI::_renderScripts($_scripts) !!}

</body>
</html>
