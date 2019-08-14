<?php echo form_open('event_person/edit/'.$event_person['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="people_id" class="col-md-4 control-label">Person</label>
		<div class="col-md-8">
			<select name="people_id" class="form-control">
				<option value="">select person</option>
				<?php 
				foreach($all_people as $person)
				{
					$selected = ($person['people_id'] == $event_person['people_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$person['people_id'].'" '.$selected.'>'.$person['people_id'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('people_id');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="events_id" class="col-md-4 control-label">Event</label>
		<div class="col-md-8">
			<select name="events_id" class="form-control">
				<option value="">select event</option>
				<?php 
				foreach($all_events as $event)
				{
					$selected = ($event['event_id'] == $event_person['events_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$event['event_id'].'" '.$selected.'>'.$event['event_id'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('events_id');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="registered" class="col-md-4 control-label">Registered</label>
		<div class="col-md-8">
			<input type="text" name="registered" value="<?php echo ($this->input->post('registered') ? $this->input->post('registered') : $event_person['registered']); ?>" class="form-control" id="registered" />
		</div>
	</div>
	<div class="form-group">
		<label for="attended" class="col-md-4 control-label">Attended</label>
		<div class="col-md-8">
			<input type="text" name="attended" value="<?php echo ($this->input->post('attended') ? $this->input->post('attended') : $event_person['attended']); ?>" class="form-control" id="attended" />
		</div>
	</div>
	<div class="form-group">
		<label for="paid" class="col-md-4 control-label">Paid</label>
		<div class="col-md-8">
			<input type="text" name="paid" value="<?php echo ($this->input->post('paid') ? $this->input->post('paid') : $event_person['paid']); ?>" class="form-control" id="paid" />
		</div>
	</div>
	<div class="form-group">
		<label for="comment" class="col-md-4 control-label">Comment</label>
		<div class="col-md-8">
			<input type="text" name="comment" value="<?php echo ($this->input->post('comment') ? $this->input->post('comment') : $event_person['comment']); ?>" class="form-control" id="comment" />
			<span class="text-danger"><?php echo form_error('comment');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>