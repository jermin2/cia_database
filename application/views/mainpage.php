<?php	$this->load->view('templates/header'); ?>
<div class="container-fluid">
<div class="row">


<!-- HERE comes side bar -->
<?php $this->load->view('templates/sidebar'); ?>

<!-- HERE comes Main content -->
<!-- <?php echo $_view; ?> -->
<?php $data['_view'] = $_view; ?>
<?php $this->load->view('templates/maincontent', $data) ?>
</div>
</div>
<?php $this->load->view('templates/footer'); ?>