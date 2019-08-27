<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset = "utf-8"> 
	<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo asset_url(); ?>css/bootstrap.min.css?version=1"> 
	<script type = 'text/javascript' src = "<?php echo asset_url(); 
    ?>js/sample.js"></script> 
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- jQuery Custom Scroller CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


	<!-- Custom style for this template -->
	<link href= "<?php echo asset_url(); ?>css/sidebar.css?version=9" rel="stylesheet">
	
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Church in Auckland</a>
	<button type="button" id="sidebarCollapse" class="btn btn-info left">
			<i class="fas fa-align-left"></i>
			<span>Toggle Sidebar</span>
	</button>
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<a class="nav-link" href="/auth/logout">Sign out</a>
		</li>
	</ul>
</nav>