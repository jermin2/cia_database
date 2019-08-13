<div class="pull-right">
	<a href="<?php echo site_url('person/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Dob</th>
		<th>Hall</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Address</th>
		<th>Actions</th>
    </tr>
	<?php foreach($people as $p){ ?>
    
		<tr>
		<td><?php echo $p['people_id']; ?></td>
		<td><a href="<?php echo site_url('person/edit/'.$p['people_id']); ?>"><?php echo $p['first_name']; ?></a></td>
		<td><?php echo $p['last_name']; ?></td>
		<td><?php echo $p['gender']; ?></td>
		<td><?php echo $p['dob']; ?></td>
		<td><?php echo $p['hall']; ?></td>
		<td><?php echo $p['email']; ?></td>
		<td><?php echo $p['mobile']; ?></td>
		<td><?php echo $p['address']; ?></td>
		<td>
            <a href="<?php echo site_url('person/edit/'.$p['people_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('person/remove/'.$p['people_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
				
    </tr>
		
	<?php } ?>
</table>
