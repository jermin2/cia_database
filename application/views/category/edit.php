<?php echo form_open('category/edit/'.$category['category_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="category_name" class="col-md-4 control-label">Category Name</label>
		<div class="col-md-8">
			<input type="text" name="category_name" value="<?php echo ($this->input->post('category_name') ? $this->input->post('category_name') : $category['category_name']); ?>" class="form-control" id="category_name" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>