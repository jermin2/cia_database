

<br />
<div class="md-col-12">
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