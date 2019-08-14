<?php echo form_open('hall/edit/'.$hall['hall_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="hall_name" class="col-md-2 control-label">Hall Name</label>
		<div class="col-md-4">
			<input type="text" name="hall_name" value="<?php echo ($this->input->post('hall_name') ? $this->input->post('hall_name') : $hall['hall_name']); ?>" class="form-control" id="hall_name" />
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>