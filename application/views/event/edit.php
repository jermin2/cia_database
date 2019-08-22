<?php echo form_open('event/edit/'.$event['event_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="event_type_id" class="col-md-2 control-label">Event Type</label>
		<div class="col-md-4">
			<select name="event_type_id_sel" class="form-control" disabled="disabled">
				<option value="">select event type</option>
				<?php 
				foreach($all_event_types as $event_type)
				{
					$selected = ($event_type['event_type_id'] == $event['event_type_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$event_type['event_type_id'].'" '.$selected.'>'.$event_type['event_type'].'</option>';
				} 
				?>
			</select>
			<input name="event_type_id" hidden="true" id="event_type_id"  value="<?php echo $event['event_type_id'] ?>" />
		</div>
	</div>
	<div class="form-group row">
		<label for="category_id" class="col-md-2 control-label">Category</label>
		<div class="col-md-4">
			<select name="category_id_sel" class="form-control" disabled="disabled">
				<option value="">select category</option>
				<?php 
				foreach($all_categories as $category)
				{
					$selected = ($category['category_id'] == $event['category_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$category['category_id'].'" '.$selected.'>'.$category['category_name'].'</option>';
				} 
				?>
			</select>
			
			<input name="category_id" hidden="true" id="category_id"  value="<?php echo $event['category_id'] ?>" />
		</div>
	</div>
	<div class="form-group row">
		<label for="hall" class="col-md-2 control-label">Hall</label>
		<div class="col-md-4">
			<select name="hall_id_sel" class="form-control" disabled="disabled">
				<option value="">select hall</option>
				<?php 
				foreach($all_halls as $hall)
				{
					$selected = ($hall['hall_id'] == $event['hall_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$hall['hall_id'].'" '.$selected.'>'.$hall['hall_name'].'</option>';
				} 
				?>
			</select>
			<input name="hall_id" hidden="true" id="hall_id"  value="<?php echo $event['hall_id'] ?>" />
		</div>
	</div>
	<div class="form-group row">
		<label for="event_name" class="col-md-2 control-label">Name</label>
		<div class="col-md-4">
			<input type="text" name="event_name" value="<?php echo ($this->input->post('event_name') ? $this->input->post('event_name') : $event['event_name']); ?>" class="form-control" id="event_name" />
		</div>
	</div>
	<div class="form-group row">
		<label for="date" class="col-md-2 control-label">Date</label>
		<div class="col-md-4">
			<input type="datetime-local" name="date" value="<?php echo ($this->input->post('datetime') ? $this->input->post('datetime') : $event['datetime']); ?>" class="form-control" id="date" />
		</div>
	</div>
	<div class="form-group row">
		<label for="location" class="col-md-2 control-label">Location</label>
		<div class="col-md-4">
			<input type="text" name="location" value="<?php echo ($this->input->post('location') ? $this->input->post('location') : $event['location']); ?>" class="form-control" id="location" />
		</div>
	</div>
	<div class="form-group row">
		<label for="comments" class="col-md-2 control-label">Comments</label>
		<div class="col-md-4">
			<input type="text" name="comments" value="<?php echo ($this->input->post('comments') ? $this->input->post('comments') : $event['comments']); ?>" class="form-control" id="comments" />
		</div>
	</div>
		
	
	<div>
	<label for="comment" class="col-md-2 control-label">
		<h4> Attendence </h4></label>
		</div>

<table class="table table-striped table-bordered" >
    <tr >
		<th>Full Name</th>
		<th>Event Name</th>
		<th>Attendence</th>
		<th>Comment</th>
		<th>Actions</th>
    </tr>
	<?php foreach($event_people as $c){ ?>
    <tr>
		<td><?php echo $c['full_name']; ?></td>
		<td><?php echo $c['event_name']; ?></td>
		<td><a href="#" class="btn btn-xs <?php echo ($c['registered']==1 ? 'btn-success' : 'btn-secondary' )?>">Reg</a> 
				<a href="#" class="btn btn-xs <?php echo ($c['attended']==1 ? 'btn-success' : 'btn-secondary' )?>">Atten</a>		
				<a href="#" class="btn btn-xs <?php echo ($c['paid']==1 ? 'btn-success' : 'btn-secondary' )?>">Paid</a>		</td>
		<td><input type="text" name="comment[]" value="<?php echo $c['comment']; ?>"></td>
		<td>
            <a href="<?php echo site_url('event_person/edit/'.$c['event_people_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('event_person/remove/'.$c['event_people_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
	
	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>


<script type="text/javascript">
function EditData(button){
	
	if (button.getElementsByTagName("input")[0].value == "0")
	{
		button.style.backgroundColor="green";
		button.getElementsByTagName("input")[0].value="1";
	} else
	{
		button.style.backgroundColor="white";
		button.getElementsByTagName("input")[0].value="0";		
	}
}
</script>