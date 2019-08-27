<?php	$this->load->view('templates/header'); ?>
<div class="container-fluid">
<div class="row">

<div class="wrapper">
	<!-- HERE comes side bar -->
	<?php $this->load->view('templates/sidebar'); ?>

	<!-- HERE comes Main content -->
	<!-- <?php echo $_view; ?> -->
	<div id="content" role="main" class="text-center center">
		<br />
		<h2 class="h2 text-center"><?php echo isset($title)?$title:''; ?></h2>
		<h3 class="h3 text-center"><?php echo isset($subtitle)?$subtitle:''; ?></h3>
		<?php $data['_view'] = $_view; ?>
		<?php $this->load->view('templates/maincontent', $data) ?>
	</div>
</div>
</div>
<?php $this->load->view('templates/footer'); ?>