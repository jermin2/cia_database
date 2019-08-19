<h3 class="h3 text-center "><?php echo $full_name; ?></h3>
<h3 class="h3 text-center" ><?php echo $hall_name; ?></h3>
<h3 class="h3 text-center">
</h3>

<div class="text-center">
<?php  
$default = true;
if(isset($serving_hs)){
	echo '<input type="button" class="btn ' . ($default ? 'btn-success' : '') . '" value="HS"/>';
	$default=false;
}
if(isset($serving_int)){
	echo '<input type="button" class="btn ' . ($default ? 'btn-success' : '') . '" value="INT"/>';
	$default=false;
}
if(isset($serving_uni)){
	echo '<input type="button" class="btn ' . ($default ? 'btn-success' : '') . '" value="CAMPUS"/>';
	$default=false;
}
?>
</div>


<br />

<div class="text-center">

<!-- <a href='#collapseExample' class="h3 center" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Highschool</a>

<div class="collapse" id="collapseExample">-->
<h4 class="h3 center" >Weekly Meeting</h4>
	<a href="<?php echo site_url('event/quick_add/' . HALL_3 .'/'. EVENT_GROUPMEET .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-success">New</a> 
	<a href="<?php echo site_url('event/view/'. HALL_3 .'/'. EVENT_GROUPMEET .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-primary">Previous</a> 
<hr />
	<h4 class="h3 center" >Small Group</h4>
	<a href="<?php echo site_url('event/quick_add/' . HALL_3 .'/'. EVENT_SMALLGROUP .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-success">New</a> 
	<a href="<?php echo site_url('event/view/'. HALL_3 .'/'. EVENT_SMALLGROUP .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-primary">Previous</a> 
	<hr />
<h4 class="h3 center" >Appointment</h4>
	<a href="<?php echo site_url('event/quick_add/' . HALL_3 .'/'. EVENT_APPOINT .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-success">New</a> 
	<a href="<?php echo site_url('event/view/'. HALL_3 .'/'. EVENT_APPOINT .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-primary">Previous</a> 
	
</div>	
	
</div>

<script>
$('input[type=button]').click(function() {
   $('input[type=button]').removeClass('btn-success');
   $(this).addClass('btn-success');
});
</script>
