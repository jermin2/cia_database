<?php echo form_open('event_person/edit/'.$event_person['event_people_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="people_id" class="col-md-2 control-label">Person</label>
		<div class="col-md-4">
			<select name="people_id" class="form-control">
				<option value="">select person</option>
				<?php 
				foreach($all_people as $person)
				{
					$selected = ($person['people_id'] == $event_person['people_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$person['people_id'].'" '.$selected.'>'.$person['first_name'].' '.$person['last_name'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('people_id');?></span>
		</div>
	</div>
	<div class="form-group row">
		<label for="event_id" class="col-md-2 control-label">Event</label>
		<div class="col-md-4">
			<select name="event_id" class="form-control">
				<option value="">select event</option>
				<?php 
				foreach($all_events as $event)
				{
					$selected = ($event['event_id'] == $event_person['event_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$event['event_id'].'" '.$selected.'>'.$event['event_name'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('event_id');?></span>
		</div>
	</div>
	<div class="form-group row">
		<label for="registered" class="col-md-2 control-label">Registered</label>
		<div class="col-md-4">
			<input type="checkbox" name="registered" value="1" class="form-control" id="registered" <?php echo ($event_person['registered']==1 ? 'checked' : ''); ?>/>
		</div>
	</div>
	<div class="form-group row">
		<label for="attended" class="col-md-2 control-label">Attended</label>
		<div class="col-md-4">
			<input type="checkbox" name="attended" value="1" class="form-control" id="attended" <?php echo ($event_person['attended']==1 ? 'checked' : ''); ?>/>
		</div>
	</div>
	<div class="form-group row">
		<label for="paid" class="col-md-2 control-label">Paid</label>
		<div class="col-md-4">
			<input type="checkbox" name="paid" value="1" class="form-control" id="paid" <?php echo ($event_person['paid'] ? 'checked' : ''); ?>/>
		</div>
	</div>
	<div class="form-group row">
		<label for="comment" class="col-md-2 control-label">Comment</label>
		<div class="col-md-4">
			<input type="text" name="comment" value="<?php echo ($this->input->post('comment') ? $this->input->post('comment') : $event_person['comment']); ?>" class="form-control" id="comment" />
			<span class="text-danger"><?php echo form_error('comment');?></span>
		</div>
	</div>


	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>