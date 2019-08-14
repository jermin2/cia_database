<div class="pull-right">
	<a href="<?php echo site_url('category/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Category Id</th>
		<th>Category Name</th>
		<th>Actions</th>
    </tr>
	<?php foreach($categories as $c){ ?>
    <tr>
		<td><?php echo $c['category_id']; ?></td>
		<td><?php echo $c['category_name']; ?></td>
		<td>
            <a href="<?php echo site_url('category/edit/'.$c['category_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('category/remove/'.$c['category_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
