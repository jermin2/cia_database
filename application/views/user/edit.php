<?php echo form_open('user/edit/'.$user['user_id'],array("class"=>"form-horizontal")); ?>
<div class="h3 col-md-6 center"> Edit a person </div>
<br />
	<div class="form-group row">
		<label for="username" class="col-md-2 control-label">Username</label>
		<div class="col-md-4">
			<input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $user['username']); ?>" class="form-control" id="username" />
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-md-2 control-label">Email</label>
		<div class="col-md-4">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group row">
		<label for="auth_level" class="col-md-2 control-label">Auth Level</label>
		<div class="col-md-4">
			<input type="text" name="auth_level" value="<?php echo ($this->input->post('auth_level') ? $this->input->post('auth_level') : $user['auth_level']); ?>" class="form-control" id="auth_level" />
		</div>
	</div>	
		<div class="form-group row">
		<label for="People_id" class="col-md-2 control-label">People_id</label>
		<div class="col-md-4">
			<select name="people_id" class="form-control" >
				<option value="">select people_id</option>
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
		<label for="serving_primary" class="col-md-2 control-label">serving primary</label>
		<div class="col-md-4">
			<input type="checkbox" name="serving_primary" value="1" class="form-control" id="serving_primary" <?php echo ($user_profile['serving_primary']==1 ? 'checked' : ''); ?>/>
		</div>
	</div>
	<div class="form-group row">
		<label for="serving_int" class="col-md-2 control-label">serving intermediate</label>
		<div class="col-md-4">
			<input type="checkbox" name="serving_int" value="1" class="form-control" id="serving_int" <?php echo ($user_profile['serving_int']==1 ? 'checked' : ''); ?>/>
		</div>
	</div>
	<div class="form-group row">
		<label for="serving_hs" class="col-md-2 control-label">serving highschool</label>
		<div class="col-md-4">
			<input type="checkbox" name="serving_hs" value="1" class="form-control" id="serving_hs" <?php echo ($user_profile['serving_hs']==1 ? 'checked' : ''); ?>/>
		</div>
	</div>
	<div class="form-group row">
		<label for="serving_campus" class="col-md-2 control-label">serving campus</label>
		<div class="col-md-4">
			<input type="checkbox" name="serving_campus" value="1" class="form-control" id="serving_campus" <?php echo ($user_profile['serving_campus']==1 ? 'checked' : ''); ?>/>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>

<script type="text/javascript">
function EditData(button){
	console.log("test");
	if (button.classList.contains("btn-success"))
	{
		button.classList.remove('btn-success');
		button.classList.add('btn-secondary');
	} else
	{
		button.classList.remove('btn-secondary');
		button.classList.add('btn-success');
	}
}
</script>