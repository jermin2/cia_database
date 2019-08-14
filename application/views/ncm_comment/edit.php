<?php echo form_open('ncm_comment/edit/'.$ncm_comment['comment_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="event_id" class="col-md-2 control-label">Event</label>
		<div class="col-md-4">
			<select name="event_id" class="form-control">
				<option value="">select event</option>
				<?php 
				foreach($all_events as $event)
				{
					$selected = ($event['event_id'] == $ncm_comment['event_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$event['event_id'].'" '.$selected.'>'.$event['event_id'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="songs" class="col-md-2 control-label">Songs</label>
		<div class="col-md-4">
			<input type="text" name="songs" value="<?php echo ($this->input->post('songs') ? $this->input->post('songs') : $ncm_comment['songs']); ?>" class="form-control" id="songs" />
		</div>
	</div>
	<div class="form-group row">
		<label for="brief report" class="col-md-2 control-label">Brief Report</label>
		<div class="col-md-4">
			<input type="text" name="brief report" value="<?php echo ($this->input->post('brief report') ? $this->input->post('brief report') : $ncm_comment['brief report']); ?>" class="form-control" id="brief report" />
		</div>
	</div>
	<div class="form-group row">
		<label for="notes for improvements" class="col-md-2 control-label">Notes For Improvements</label>
		<div class="col-md-4">
			<input type="text" name="notes for improvements" value="<?php echo ($this->input->post('notes for improvements') ? $this->input->post('notes for improvements') : $ncm_comment['notes for improvements']); ?>" class="form-control" id="notes for improvements" />
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>