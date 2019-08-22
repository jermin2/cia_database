<h3 class="h3 text-center "><?php echo $full_name; ?></h3>
<h3 class="h3 text-center" ><?php echo $hall_name; ?></h3>
<h3 class="h3 text-center">
</h3>

<div class="text-center">
<?php  
$default = true;
if(($serving_primary)){
	echo '<input type="button" class="cat_sel btn ' . ($default ? 'btn-success' : '') . '" value="CHL"/>';
	$default=false;
}
if(($serving_hs)){
	echo '<input type="button" class="cat_sel btn ' . ($default ? 'btn-success' : '') . '" value="HS"/>';
	$default=false;
}
if(($serving_int)){
	echo '<input type="button" class="cat_sel btn ' . ($default ? 'btn-success' : '') . '" value="INT"/>';
	$default=false;
}
if(($serving_campus)){
	echo '<input type="button" class="cat_sel btn ' . ($default ? 'btn-success' : '') . '" value="CAMPUS"/>';
	$default=false;
}
?>
</div>


<br />

<div class="text-center">

<!-- <a href='#collapseExample' class="h3 center" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Highschool</a>

<div class="collapse" id="collapseExample">-->
<h4 class="h3 center" >Weekly Meeting</h4>
	<a href="<?php echo site_url('event/quick_add/' . HALL_3 .'/'. EVENT_GROUPMEET .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-success navlink">New</a> 
	<a href="<?php echo site_url('event/view/'. HALL_3 .'/'. EVENT_GROUPMEET .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-primary navlink">Previous</a> 
<hr />
	<h4 class="h3 center" >Small Group</h4>
	<a href="<?php echo site_url('event/quick_add/' . HALL_3 .'/'. EVENT_SMALLGROUP .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-success navlink" id="test">New</a> 
	<a href="<?php echo site_url('event/view/'. HALL_3 .'/'. EVENT_SMALLGROUP .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-primary navlink">Previous</a> 
	<hr />
<h4 class="h3 center" >Appointment</h4>
	<a href="<?php echo site_url('event/quick_add/' . HALL_3 .'/'. EVENT_APPOINT .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-success navlink">New</a> 
	<a href="<?php echo site_url('event/view/'. HALL_3 .'/'. EVENT_APPOINT .'/'. CATEGORY_HS); ?>" class="col-md-2 btn btn-primary navlink">Previous</a> 
	
</div>	
	
</div>

<script>


$(function(){
	var y = document.getElementsByClassName('cat_sel');
	console.log(y.length);
	
	 for(i=0; i<y.length; i++){
		 
		 if(y[i].classList.contains("btn-success")){
			 
			 
			 var default_val = y[i].value;
			 
			 switch( default_val) {
				 case "CHL":
					cat_type_id = "<?php echo CATEGORY_PRI ?>";
					break;
				 case "INT":
					cat_type_id = "<?php echo CATEGORY_INT ?>";
					break;
				case "HS":
					cat_type_id = "<?php echo CATEGORY_HS ?>";
					break;	
				case "CAMPUS":
					cat_type_id = "<?php echo CATEGORY_CAMPUS ?>";
					break;
						
			 }
			
			//Update all the links to match the category (replace the last number)
			 var x = document.getElementsByClassName("navlink");
			 for(i=0; i<x.length; i++){
				 var link = x[i].href;
				 x[i].href = link.substring(0, link.length-1) + cat_type_id;
			 }

		 }
	 }	
});



//Changes all the links depending on the category selected
$('input[type=button]').click(function() {
   $('input[type=button]').removeClass('btn-success');
   $(this).addClass('btn-success');
	 
	 var cat_type_id = "<?php echo CATEGORY_INT ?>"
	 
	 switch( $(this).val()) {
		 case "INT":
			cat_type_id = "<?php echo CATEGORY_INT ?>";
			break;
		case "HS":
			cat_type_id = "<?php echo CATEGORY_HS ?>";
			break;	
		case "CAMPUS":
			cat_type_id = "<?php echo CATEGORY_CAMPUS ?>";
			break;					
	 }

	//Update all the links to match the category (replace the last number)
	 var x = document.getElementsByClassName("navlink");
	 for(i=0; i<x.length; i++){
		 var link = x[i].href;
		 x[i].href = link.substring(0, link.length-1) + cat_type_id;
	 }
});	 


</script>
