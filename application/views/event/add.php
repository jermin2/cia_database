<?php echo form_open('event/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="event_type_id" class="col-md-2 control-label">Event Type</label>
		<div class="col-md-4">
			<select name="event_type_id" class="form-control">
				<option value="">select event type</option>
				<?php 
				foreach($all_event_types as $event_type)
				{
					$selected = ($event_type['event_type_id'] == $this->input->post('event_type_id')) ? ' selected="selected"' : "";

					echo '<option value="'.$event_type['event_type_id'].'" '.$selected.'>'.$event_type['event_type'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="category_id" class="col-md-2 control-label">Category</label>
		<div class="col-md-4">
			<select name="category_id" class="form-control">
				<option value="">select category</option>
				<?php 
				foreach($all_categories as $category)
				{
					$selected = ($category['category_id'] == $this->input->post('category_id')) ? ' selected="selected"' : "";

					echo '<option value="'.$category['category_id'].'" '.$selected.'>'.$category['category_name'].'</option>';
				} 
				?>
			</select>
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
					$selected = ($hall['hall_id'] == $this->input->post('hall')) ? ' selected="selected"' : "";

					echo '<option value="'.$hall['hall_id'].'" '.$selected.'>'.$hall['hall_name'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-md-2 control-label">Name</label>
		<div class="col-md-4">
			<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
		</div>
	</div>
	<div class="form-group row">
		<label for="date" class="col-md-2 control-label">Date</label>
		<div class="col-md-4">
			<input type="text" name="date" value="<?php echo $this->input->post('date'); ?>" class="form-control" id="date" />
		</div>
	</div>
	<div class="form-group row">
		<label for="location" class="col-md-2 control-label">Location</label>
		<div class="col-md-4">
			<input type="text" name="location" value="<?php echo $this->input->post('location'); ?>" class="form-control" id="location" />
		</div>
	</div>
	<div class="form-group row">
		<label for="comments" class="col-md-2 control-label">Comments</label>
		<div class="col-md-4">
			<input type="text" name="comments" value="<?php echo $this->input->post('comments'); ?>" class="form-control" id="comments" />
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>