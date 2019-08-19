<?php echo form_open('event/edit/'.$event['event_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="event_type_id" class="col-md-2 control-label">Event Type</label>
		<div class="col-md-4">
			<select name="event_type_id" class="form-control">
				<option value="">select event type</option>
				<?php 
				foreach($all_event_types as $event_type)
				{
					$selected = ($event_type['event_type_id'] == $event['event_type_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$event_type['event_type_id'].'" '.$selected.'>'.$event_type['event_type'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="category_id" class="col-md-2 control-label">Category</label>
		<div class="col-md-4">
			<select name="category_id" class="form-control">
				<option value="">select category</option>
				<?php 
				foreach($all_categories as $category)
				{
					$selected = ($category['category_id'] == $event['category_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$category['category_id'].'" '.$selected.'>'.$category['category_name'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="hall" class="col-md-2 control-label">Hall</label>
		<div class="col-md-4">
			<select name="hall_id" class="form-control">
				<option value="">select hall</option>
				<?php 
				foreach($all_halls as $hall)
				{
					$selected = ($hall['hall_id'] == $event['hall_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$hall['hall_id'].'" '.$selected.'>'.$hall['hall_name'].'</option>';
				} 
				?>
			</select>
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
		<th>ID</th>
		<th>Full Name</th>
		<th>Event Name</th>
		<th>Registered</th>
		<th>Attended</th>
		<th>Paid</th>
		<th>Comment</th>
		<th>Actions</th>
    </tr>
	<?php foreach($event_people as $c){ ?>
    <tr>
		<td><input type="text" name="event_people_id[]" value="<?php echo $c['event_people_id']; ?>" readonly></td>
		<td><?php echo $c['full_name']; ?></td>
		<td><?php echo $c['event_name']; ?></td>
		<td onclick="EditData(this)" style="background-color: <?php echo ($c['registered']==1 ? 'green' : 'white' )?>"><input type="hidden" name="registered[]" value="<?php echo ($c['registered'] )?>" class="form-control" id="registered"  readonly/></td>
		<td onclick="EditData(this)" style="background-color: <?php echo ($c['attended']==1 ? 'green' : 'white' )?>"><input type="hidden" name="attended[]" value="<?php echo ($c['attended'] )?>" class="form-control" id="attended"  readonly/></td>
		<td onclick="EditData(this)" style="background-color: <?php echo ($c['paid']==1 ? 'green' : 'white' )?>"><input type="hidden" name="paid[]" value="<?php echo ($c['paid'] )?>" class="form-control" id="paid"  readonly/></td>
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