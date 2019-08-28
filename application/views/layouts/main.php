<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ROOTSJARDINERIA.CL | WAREHOUSE MANAGEMENT</title>

	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- WMS CSS -->
	<link rel="stylesheet" type="text/css" href="<?=assets_url()?>css/sidebar-navbar.css">
	<link rel="stylesheet" type="text/css" href="<?=assets_url()?>css/box-info.css">
	<link rel="stylesheet" type="text/css" href="<?=assets_url()?>css/button-circle.css">
	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<!-- WMS CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


	<!-- jQuery CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<!-- Optional -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Instancia -->
	<script>
	    var WMS = {};
	    WMS.base_url = "<?=base_url()?>";
	</script>
</head>

<body>


	<div class="wrapper">
		
		
		<?php if($sidebar) { echo $sidebar; } ?>	

		<div id="content">

			<?php if($header){ echo $header; } ?>
			<?php if($page) { echo $page; } ?>
				
		</div>		

	</div>

	<div class="overlay"></div>

	<!-- .JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- jQuery Custom Scroller CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
	<!-- Navbar -->
	<script src="<?=assets_url()?>js/sidebar-navbar.js?ver=<?=rand()?>"></script>
	<!-- Alertify -->
	<script src="<?=assets_url()?>js/alone.alertyfy.js?ver=<?=rand()?>"></script>

	<!-- Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


</body>
</html>