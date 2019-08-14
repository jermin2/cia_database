<div class="pull-right">
	<a href="<?php echo site_url('event_type/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Event Type Id</th>
		<th>Event Type</th>
		<th>Actions</th>
    </tr>
	<?php foreach($event_types as $c){ ?>
    <tr>
		<td><?php echo $c['event_type_id']; ?></td>
		<td><?php echo $c['event_type']; ?></td>
		<td>
            <a href="<?php echo site_url('event_type/edit/'.$c['event_type_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('event_type/remove/'.$c['event_type_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
