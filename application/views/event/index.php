<div class="pull-right">
	<a href="<?php echo site_url('event/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Event Id</th>
		<th>Event Type Id</th>
		<th>Category Id</th>
		<th>Hall</th>
		<th>Name</th>
		<th>Date</th>
		<th>Location</th>
		<th>Comments</th>
		<th>Actions</th>
    </tr>
	<?php foreach($events as $c){ ?>
    <tr>
		<td><?php echo $c['event_id']; ?></td>
		<td><?php echo $c['event_type_id']; ?></td>
		<td><?php echo $c['category_id']; ?></td>
		<td><?php echo $c['hall']; ?></td>
		<td><?php echo $c['name']; ?></td>
		<td><?php echo $c['date']; ?></td>
		<td><?php echo $c['location']; ?></td>
		<td><?php echo $c['comments']; ?></td>
		<td>
            <a href="<?php echo site_url('event/edit/'.$c['event_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('event/remove/'.$c['event_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
