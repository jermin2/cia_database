<?php echo form_open('age_group/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="age_group_name" class="col-md-4 control-label">Age Group Name</label>
		<div class="col-md-8">
			<input type="text" name="age_group_name" value="<?php echo $this->input->post('age_group_name'); ?>" class="form-control" id="age_group_name" />
			<span class="text-danger"><?php echo form_error('age_group_name');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>