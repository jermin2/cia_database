<?php echo form_open('category/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="category_name" class="col-md-2 control-label">Category Name</label>
		<div class="col-md-4">
			<input type="text" name="category_name" value="<?php echo $this->input->post('category_name'); ?>" class="form-control" id="category_name" />
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>