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
<body @yield('_body') role="document" id="body">

	@yield('content')
	@include('crudadminlte::admin._tmpl.required.scripts')
	@yield('_scripts')

</body>
</html>
