

<div class="pull-right">
	<?php if($auth_level > 4){
		echo '<a href="' . site_url('person/add') . '" class="btn btn-success">Add</a> ';
	}?>
	
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Full Name</th>
		<th class="hide-small">Gender</th>
		<th>Age Group Id</th>
		<th>Hall</th>
		<th class="hide-small">Email</th>
		<th class="hide-small">Mobile</th>
		<th>Actions</th>
    </tr>
	<?php foreach($people as $c){ ?>
    <tr>
		<td><a href="<?php echo site_url('person/edit/'.$c['people_id']); ?>"><?php echo $c['first_name']." ".$c['last_name']; ?></a></td>
		<td class="hide-small"><?php echo $c['gender']; ?></td>
		<td><?php echo $c['age_group_name']; ?></td>
		<td><?php echo $c['hall_id']; ?></td>
		<td class="hide-small"><?php echo $c['email']; ?></td>
		<td class="hide-small"><?php echo $c['mobile']; ?></td>
		<td>
			<a href="<?php echo site_url('event_person/view/'.$c['people_id']); ?>" class="btn btn-success btn-xs">View</a> 
			<a href="<?php echo site_url('person/edit/'.$c['people_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
						<?php if($auth_level > 4){
							echo '<a href="' . site_url('person/remove/' . $c['people_id']) . '" class="btn btn-danger btn-xs">Delete</a>';
						}?>
        </td>
    </tr>
	<?php } ?>
</table>
