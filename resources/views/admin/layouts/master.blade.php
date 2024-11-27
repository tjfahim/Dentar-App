<!DOCTYPE html>
<html lang="en">

<head>
	@include('admin.layouts.head')
</head>

<body>
	<div class="container-scroller">

		@include('admin.layouts.header')

		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">

					@yield('content')

				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				@include('admin.layouts.footer')
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	@include('admin.layouts.scripts')
</body>

</html>