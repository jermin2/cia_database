<div role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<br />
<?php
if(file_exists(APPPATH.'views/'.$_view.'.php'))
{
	$this->load->view($_view);
} else
{
	show_404();
}
?>
</div>