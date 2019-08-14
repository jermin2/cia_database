<?php echo form_open('person/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="age_group_id" class="col-md-4 control-label">Age Group</label>
		<div class="col-md-8">
			<select name="age_group_id" class="form-control">
				<option value="">select age_group</option>
				<?php 
				foreach($all_age_groups as $age_group)
				{
					$selected = ($age_group['age_group_id'] == $this->input->post('age_group_id')) ? ' selected="selected"' : "";

					echo '<option value="'.$age_group['age_group_id'].'" '.$selected.'>'.$age_group['age_group_id'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="hall" class="col-md-4 control-label">Hall</label>
		<div class="col-md-8">
			<select name="hall" class="form-control">
				<option value="">select hall</option>
				<?php 
				foreach($all_halls as $hall)
				{
					$selected = ($hall['hall_id'] == $this->input->post('hall')) ? ' selected="selected"' : "";

					echo '<option value="'.$hall['hall_id'].'" '.$selected.'>'.$hall['hall_id'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="first_name" class="col-md-4 control-label">First Name</label>
		<div class="col-md-8">
			<input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" class="form-control" id="first_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="last_name" class="col-md-4 control-label">Last Name</label>
		<div class="col-md-8">
			<input type="text" name="last_name" value="<?php echo $this->input->post('last_name'); ?>" class="form-control" id="last_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="gender" class="col-md-4 control-label">Gender</label>
		<div class="col-md-8">
			<input type="text" name="gender" value="<?php echo $this->input->post('gender'); ?>" class="form-control" id="gender" />
		</div>
	</div>
	<div class="form-group">
		<label for="dob" class="col-md-4 control-label">Dob</label>
		<div class="col-md-8">
			<input type="text" name="dob" value="<?php echo $this->input->post('dob'); ?>" class="form-control" id="dob" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label">Mobile</label>
		<div class="col-md-8">
			<input type="text" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-4 control-label">Address</label>
		<div class="col-md-8">
			<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>