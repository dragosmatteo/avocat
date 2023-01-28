<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard | WEBCRAFT</title>

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/cpanel/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/cpanel/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="/cpanel/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/cpanel/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="/cpanel/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="/cpanel/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="/cpanel/vendor/morris/morris.css" />
		<link rel="stylesheet" href="/cpanel/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="/cpanel/vendor/select2/select2.css" />
		<link rel="stylesheet" href="/cpanel/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="/cpanel/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="/cpanel/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="/cpanel/vendor/dropzone/css/basic.css" />
		<link rel="stylesheet" href="/cpanel/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="/cpanel/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="/cpanel/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="/cpanel/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="/cpanel/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="/cpanel/vendor/codemirror/theme/monokai.css" />
		<link rel="stylesheet" href="/cpanel/vendor/isotope/jquery.isotope.css" />
		<link rel="stylesheet" href="/cpanel/vendor/pnotify/pnotify.custom.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="/cpanel/vendor/select2/select2.css" />
		<link rel="stylesheet" href="/cpanel/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/cpanel/stylesheets/theme.css?{{time()}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/cpanel/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/cpanel/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="/cpanel/vendor/modernizr/modernizr.js"></script>



		<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>



	</head>
	<body>
		<section class="body">

			<!-- start: header -->
				@include('cpanel.app.parts.header')
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
					@include('cpanel.app.parts.sidebar')
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					@yield('content')
				</section>

			</div>
		</section>

		<!-- Vendor -->
		<script src="/cpanel/vendor/jquery/jquery.js"></script>
		<script src="/cpanel/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/cpanel/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/cpanel/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/cpanel/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/cpanel/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="/cpanel/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="/cpanel/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="/cpanel/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="/cpanel/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="/cpanel/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="/cpanel/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="/cpanel/vendor/flot/jquery.flot.js"></script>
		<script src="/cpanel/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="/cpanel/vendor/flot/jquery.flot.pie.js"></script>
		<script src="/cpanel/vendor/flot/jquery.flot.categories.js"></script>
		<script src="/cpanel/vendor/flot/jquery.flot.resize.js"></script>
		<script src="/cpanel/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="/cpanel/vendor/raphael/raphael.js"></script>
		<script src="/cpanel/vendor/morris/morris.js"></script>
		<script src="/cpanel/vendor/gauge/gauge.js"></script>
		<script src="/cpanel/vendor/snap-svg/snap.svg.js"></script>
		<script src="/cpanel/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="/cpanel/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="/cpanel/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="/cpanel/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="/cpanel/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="/cpanel/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="/cpanel/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="/cpanel/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="/cpanel/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="/cpanel/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		<script src="/cpanel/vendor/select2/select2.js"></script>
		<script src="/cpanel/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="/cpanel/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="/cpanel/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="/cpanel/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="/cpanel/vendor/fuelux/js/spinner.js"></script>
		<script src="/cpanel/vendor/dropzone/dropzone.js"></script>
		<script src="/cpanel/vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="/cpanel/vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="/cpanel/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="/cpanel/vendor/codemirror/lib/codemirror.js"></script>
		<script src="/cpanel/vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="/cpanel/vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="/cpanel/vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="/cpanel/vendor/codemirror/mode/xml/xml.js"></script>
		<script src="/cpanel/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="/cpanel/vendor/codemirror/mode/css/css.js"></script>
		<script src="/cpanel/vendor/summernote/summernote.js"></script>
		<script src="/cpanel/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="/cpanel/vendor/ios7-switch/ios7-switch.js"></script>
		<script src="/cpanel/vendor/isotope/jquery.isotope.js"></script>

		<!-- Specific Page Vendor -->
		<script src="/cpanel/vendor/select2/select2.js"></script>
		<script src="/cpanel/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="/cpanel/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="/cpanel/vendor/pnotify/pnotify.custom.js"></script>

		<!-- Theme Custom -->
		<script src="/cpanel/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="/cpanel/javascripts/theme.init.js"></script>

		<!-- Examples -->
		<script src="/cpanel/javascripts/tables/examples.datatables.editable.js?{{time()}}"></script>
		<script src="/cpanel/javascripts/ui-elements/examples.modals.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="/cpanel/javascripts/theme.js"></script>

		<script src="/cpanel/vendor/unisharp/laravel-ckeditor/ckeditor.js?{{ time() }}"></script>
		<script src="/cpanel/vendor/unisharp/laravel-ckeditor/adapters/jquery.js?{{ time() }}"></script>

		<script>
				//$('textarea').ckeditor();
				$('.textarea').ckeditor(); // if class is prefered.
		</script>

		<script type="text/javascript">
		$('#products').dataTable( {
			"lengthMenu": [ 200, 250, 500, 750 ]
		} );
		$('#orders').dataTable( {
			"lengthMenu": [ 200, 250, 500, 750 ],
			"order": [[ 0, "desc" ]]
		} );
		</script>

		<script>
			// admin alert
		 function confirm_delete() {
			 return confirm('Подтвердить действие на сайте');
		 }
		</script>

		@yield('script')
	</body>
</html>
