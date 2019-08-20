<h2> Event Information </h2>
<?php echo form_open('event/edit/'.$event['event_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="event_type_id" class="col-md-2 control-label">Event Type</label>
		<label for="event_type_id" class="col-md-4 form-control"><?php echo $event['event_type'] ?></label>
	</div>
	<div class="form-group row">
		<label for="category_id" class="col-md-2 control-label">Category</label>
		<label for="category_id" class="col-md-4 form-control"><?php echo $event['category'] ?></label>
	</div>
	<div class="form-group row">
		<label for="hall" class="col-md-2 control-label">Hall</label>
		<label for="hall_name" class="col-md-4 form-control"><?php echo $event['hall_name'] ?></label>
	</div>
	<div class="form-group row">
		<label for="event_name" class="col-md-2 control-label">Name</label>
		<label for="event_name" class="col-md-4 form-control"><?php echo $event['event_name'] ?></label>
	</div>
	<div class="form-group row">
		<label for="date" class="col-md-2 control-label">Date</label>
		<label for="date" class="col-md-4 form-control"><?php echo $event['datetime'] ?></label>
	</div>
	<div class="form-group row">
		<label for="location" class="col-md-2 control-label">Location</label>
		<label for="location" class="col-md-4 form-control"><?php echo $event['location'] ?></label>
	</div>
	<div class="form-group row">
		<label for="comments" class="col-md-2 control-label">Comments</label>
		<label for="comments" class="col-md-4 form-control"><?php echo $event['comments'] ?></label>
	</div>
		
	
	<div>
	<label for="comment" class="col-md-2 control-label">
		<h2> Attendence </h2></label>
		</div>

<table class="col-md-6 table table-striped table-bordered text-center" >
    <tr >
		<th>Full Name</th>
		<th>Attended</th>
    </tr>
	<?php foreach($event_people as $c){ ?>
    <tr>
		<td><?php echo $c['full_name']; ?></td>
		<td><input type="hidden" name="attended[]" value="<?php echo ($c['attended'] )?>" class="form-control" id="attended"  readonly/>
		        <a href="#" class="btn btn-xs <?php echo ($c['registered']==1 ? 'btn-success' : 'btn-secondary' )?>">Reg</a> 
						<a href="#" class="btn btn-xs <?php echo ($c['attended']==1 ? 'btn-success' : 'btn-secondary' )?>">Atten</a>
		</td>
    </tr>
	<?php } ?>
</table>

	
<?php echo form_close(); ?>
