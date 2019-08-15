<div class="pull-right">
	<a href="<?php echo site_url('event_person/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered" >
    <tr >
		<th>ID</th>
		<th>Full Name</th>
		<th>Event Name</th>
		<th>Registered</th>
		<th>Attended</th>
		<th>Paid</th>
		<th>Comment</th>
		<th>Actions</th>
    </tr>
	<?php foreach($event_people as $c){ ?>
    <tr>
		<td><?php echo $c['event_people_id']; ?></td>
		<td><?php echo $c['full_name']; ?></td>
		<td><?php echo $c['event_name']; ?></td>
		<td <?php echo ($c['registered']==1 ? 'bgcolor="success">Y' : '>'); ?></td>
		<td <?php echo ($c['attended']==1 ? 'bgcolor="success">Y' : '>'); ?></td>		
		<td <?php echo ($c['paid']==1 ? 'bgcolor="success">Y' : '>'); ?></td>				
		<td><?php echo $c['comment']; ?></td>
		<td>
            <a href="<?php echo site_url('event_person/edit/'.$c['event_people_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('event_person/remove/'.$c['event_people_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
