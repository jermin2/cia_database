<div class="pull-right">
	<a href="<?php echo site_url('event_person/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered" >
    <tr >
		<th>Full Name</th>
		<th>Event Name</th>
		<th>Attendence</th>
		<th>Comment</th>
		<th>Actions</th>
    </tr>
	<?php foreach($event_people as $c){ ?>
    <tr>
		<td><?php echo $c['full_name']; ?></td>
		<td><?php echo $c['event_name']; ?></td>
		<td><a href="#" class="btn btn-xs <?php echo ($c['registered']==1 ? 'btn-success' : 'btn-secondary' )?>">Reg</a> 
				<a href="#" class="btn btn-xs <?php echo ($c['attended']==1 ? 'btn-success' : 'btn-secondary' )?>">Atten</a>		
				<a href="#" class="btn btn-xs <?php echo ($c['paid']==1 ? 'btn-success' : 'btn-secondary' )?>">Paid</a>		</td>	
		<td><?php echo $c['comment']; ?></td>
		<td>
            <a href="<?php echo site_url('event_person/edit/'.$c['event_people_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('event_person/remove/'.$c['event_people_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
