<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    @yield('content')
    @include('layouts.Scripts')

    </body>

	<!-- end::Body -->
</html>
