

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