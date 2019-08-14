<div class="pull-right">
	<a href="<?php echo site_url('event_person/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>People Id</th>
		<th>Events Id</th>
		<th>Registered</th>
		<th>Attended</th>
		<th>Paid</th>
		<th>Comment</th>
		<th>Actions</th>
    </tr>
	<?php foreach($event_people as $c){ ?>
    <tr>
		<td><?php echo $c['id']; ?></td>
		<td><?php echo $c['people_id']; ?></td>
		<td><?php echo $c['events_id']; ?></td>
		<td><?php echo $c['registered']; ?></td>
		<td><?php echo $c['attended']; ?></td>
		<td><?php echo $c['paid']; ?></td>
		<td><?php echo $c['comment']; ?></td>
		<td>
            <a href="<?php echo site_url('event_person/edit/'.$c['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('event_person/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
