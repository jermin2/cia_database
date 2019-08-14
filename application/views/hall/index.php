<div class="pull-right">
	<a href="<?php echo site_url('hall/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Hall Id</th>
		<th>Hall Name</th>
		<th>Actions</th>
    </tr>
	<?php foreach($halls as $c){ ?>
    <tr>
		<td><?php echo $c['hall_id']; ?></td>
		<td><?php echo $c['hall_name']; ?></td>
		<td>
            <a href="<?php echo site_url('hall/edit/'.$c['hall_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('hall/remove/'.$c['hall_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
