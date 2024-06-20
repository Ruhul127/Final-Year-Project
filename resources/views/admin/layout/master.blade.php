<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="">
	<title>Panel</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	{{-- Begin::LINK --}}
	@include('admin.partials.links')
	{{-- End::LINK --}}

</head>
<!--end::Head-->
<!--begin::Body-->

<body class="skin-blue fixed-layout">



	@include('admin.partials.header')

	<div id="main-wrapper">

		@yield('content')
	</div>

	{{-- SCRIPTS here --}}
	@include('admin.partials.script')

	@yield('script')
</body>
<!--end::Body-->

</html>