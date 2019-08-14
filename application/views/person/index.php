<div class="pull-right">
	<a href="<?php echo site_url('person/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>People Id</th>
		<th>Age Group Id</th>
		<th>Hall</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Dob</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Address</th>
		<th>Actions</th>
    </tr>
	<?php foreach($people as $c){ ?>
    <tr>
		<td><?php echo $c['people_id']; ?></td>
		<td><?php echo $c['age_group_id']; ?></td>
		<td><?php echo $c['hall']; ?></td>
		<td><?php echo $c['first_name']; ?></td>
		<td><?php echo $c['last_name']; ?></td>
		<td><?php echo $c['gender']; ?></td>
		<td><?php echo $c['dob']; ?></td>
		<td><?php echo $c['email']; ?></td>
		<td><?php echo $c['mobile']; ?></td>
		<td><?php echo $c['address']; ?></td>
		<td>
            <a href="<?php echo site_url('person/edit/'.$c['people_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('person/remove/'.$c['people_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
