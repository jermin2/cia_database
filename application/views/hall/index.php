<div class="pull-right">
	<a href="<?php echo site_url('hall/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Hall Id</th>
		<th>Actions</th>
    </tr>
	<?php foreach($halls as $h){ ?>
    <tr>
		<td><?php echo $h['hall_id']; ?></td>
		<td>
            <a href="<?php echo site_url('hall/edit/'.$h['hall_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('hall/remove/'.$h['hall_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
