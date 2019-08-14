<?php echo form_open('event_type/edit/'.$event_type['event_type_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="event_type" class="col-md-4 control-label">Event Type</label>
		<div class="col-md-8">
			<input type="text" name="event_type" value="<?php echo ($this->input->post('event_type') ? $this->input->post('event_type') : $event_type['event_type']); ?>" class="form-control" id="event_type" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>