<h1> Edit Person </h1>
<br />

<?php echo form_open('person/edit/'.$person['people_id'],array("class"=>"form-horizontal")); ?>
	<div class="form-group row">
		<label for="first_name" class="col-md-2 control-label">First Name</label>
		<div class="col-md-4">
			<input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $person['first_name']); ?>" class="form-control" id="first_name" />
		</div>
	</div>
	<div class="form-group row">
		<label for="last_name" class="col-md-2 control-label">Last Name</label>
		<div class="col-md-4">
			<input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $person['last_name']); ?>" class="form-control" id="last_name" />
		</div>
	</div>
	<div class="form-group row">
		<label for="gender" class="col-md-2 control-label">Gender</label>
		<div class="col-md-4">
			<select name="gender" class="form-control">
				<option value="">select</option>
				<?php 
				$gender_values = array(
					'Male','Female',
				);

				foreach($gender_values as $value => $display_text)
				{
					$selected = ($value == $person['gender']) ? ' selected="selected"' : "";

					echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="dob" class="col-md-2 control-label">Dob</label>
		<div class="col-md-4">
			<input type="date" name="dob" value="<?php echo ($this->input->post('dob') ? $this->input->post('dob') : $person['dob']); ?>" class="form-control" id="dob" />
		</div>
	</div>
	<div class="form-group row">
		<label for="hall" class="col-md-2 control-label">Hall</label>
		<div class="col-md-4">
			<select name="hall" class="form-control">
				<option value="">select hall</option>
				<?php 
				foreach($all_halls as $hall)
				{
					$selected = ($hall['hall_id'] == $person['hall']) ? ' selected="selected"' : "";

					echo '<option value="'.$hall['hall_id'].'" '.$selected.'>'.$hall['hall_id'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>	
	<div class="form-group row">
		<label for="email" class="col-md-2 control-label">Email</label>
		<div class="col-md-4">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $person['email']); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group row">
		<label for="mobile" class="col-md-2 control-label">Mobile</label>
		<div class="col-md-4">
			<input type="text" name="mobile" value="<?php echo ($this->input->post('mobile') ? $this->input->post('mobile') : $person['mobile']); ?>" class="form-control" id="mobile" />
		</div>
	</div>
	<div class="form-group row">
		<label for="address" class="col-md-2 control-label">Address</label>
		<div class="col-md-8">
			<input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $person['address']); ?>" class="form-control" id="address" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>