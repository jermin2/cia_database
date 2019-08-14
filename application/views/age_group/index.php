<div class="pull-right">
	<a href="<?php echo site_url('age_group/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Age Group Id</th>
		<th>Age Group Name</th>
		<th>Actions</th>
    </tr>
	<?php foreach($age_groups as $c){ ?>
    <tr>
		<td><?php echo $c['age_group_id']; ?></td>
		<td><?php echo $c['age_group_name']; ?></td>
		<td>
            <a href="<?php echo site_url('age_group/edit/'.$c['age_group_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('age_group/remove/'.$c['age_group_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
