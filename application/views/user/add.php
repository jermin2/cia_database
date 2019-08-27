<?php echo form_open('user/add',array("class"=>"form-horizontal")); ?>
<br />

	<div class="form-group row">
		<label for="username" class="col-md-2 control-label">User name</label>
		<div class="col-md-4">
			<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-md-2 control-label">Email</label>
		<div class="col-md-4">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group row">
		<label for="people_id" class="col-md-2 control-label">Person</label>
		<div class="col-md-6">
			<select name="people_id" class="form-control" >
				<option value="">select associated person</option>
				<?php 
				if(isset($user_profile['people_id']))
				{
						echo '<option value="'.$user_profile['people_id'].'" selected="selected">'.$user_profile['people_id'].' - '.$person['first_name']." ".$person['last_name'].'</option>';
				}
				foreach($people as $person_t)
				{

					echo '<option value="'.$person_t['people_id'].'" '.'>'.$person_t['people_id'].' - '.$person_t['first_name']." ".$person_t['last_name'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-md-2 control-label">Password</label>
		<div class="col-md-4">
			<input type="text" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>