

<table class="table table-striped table-bordered">
    <tr>
		<th>Username</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Access Level</th>
		<th>Serving</th>
		<th>Actions</th>
    </tr>
	<?php foreach($users as $c){ ?>
    <tr>
		<td><a href="<?php echo site_url('user/edit/'.$c['user_id']); ?>"><?php echo $c['username']; ?></a></td>
		<td><?php echo $c['first_name']; ?></td>
		<td><?php echo $c['last_name']; ?></td>
		<td><?php echo $c['email']; ?></td>
		<td><?php echo $c['auth_level']; ?></td>
		<td><a href="#" class="btn btn-xs <?php echo ($c['serving_primary']==1 ? 'btn-success' : 'btn-secondary' )?>">C</a> 
				<a href="#" class="btn btn-xs <?php echo ($c['serving_int']==1 ? 'btn-success' : 'btn-secondary' )?>">I</a>		
				<a href="#" class="btn btn-xs <?php echo ($c['serving_hs']==1 ? 'btn-success' : 'btn-secondary' )?>">H</a>
				<a href="#" class="btn btn-xs <?php echo ($c['serving_campus']==1 ? 'btn-success' : 'btn-secondary' )?>">U</a></td>
		<td>            
		<a href="<?php echo site_url('user/edit/'.$c['user_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
						<?php if($auth_level > 4){
							echo '<a href="' . site_url('user/remove/' . $c['user_id']) . '" class="btn btn-danger btn-xs">Delete</a>';
						}?>
						</td>
    </tr>
	<?php } ?>
</table>
