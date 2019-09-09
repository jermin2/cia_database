<div class="pull-right">
	<a href="<?php echo site_url('event/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-sm table-striped table-bordered">
    <tr>
		<th>Name</th>
		<th class="hide-small">Event Type Id</th>
		<th class="hide-small">Category Id</th>
		
		<?php if($auth_level > 4){
			echo '<th>Hall</th>';
		}	?>
		
		<th>Date</th>
		<th>Location</th>
		<th>Actions</th>
    </tr>
	<?php foreach($events as $c){ ?>
    <tr>
		<td><a href="<?php echo site_url('event/edit/'.$c['event_id']); ?>"><?php echo $c['event_name']; ?></a></td>
		<td class="hide-small"><?php echo $c['event_type']; ?></td>
		<td class="hide-small"><?php echo $c['category_name']; ?></td>
		
		<?php if($auth_level > 4){
			echo '<td>' . $c['hall_name'] . '</td>';
		}	?>

		<td><?php echo date("d/m h:m", strtotime($c['date'])); ?></td>
		<td><?php echo $c['location']; ?></td>
		<td>
						<a href="<?php echo site_url('event/duplicate/'.$c['event_id']); ?>" class="btn btn-success btn-xs">Repeat</a> 
            <a href="<?php echo site_url('event/edit/'.$c['event_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <?php if($auth_level >= 5)
						{
							echo '<a href="'.site_url('event/remove/'.$c['event_id']).'" class="btn btn-danger btn-xs">Delete</a>';
						}?>
        </td>
    </tr>
	<?php } ?>
</table>
