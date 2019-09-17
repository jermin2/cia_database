<div class="pull-right">
	<a href="<?php echo site_url('event/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-sm table-striped table-bordered">
    <tr>
		<th>Name</th>
		<th class="hide-small">Event Type</th>
		<th class="hide-small">Category</th>
		
		<?php if($auth_level > 4){
			echo '<th>Hall</th>';
		}	?>
		
		<th>Date</th>
		<th>Location</th>
		<th>Actions</th>
    </tr>
	<?php foreach($events as $c){ ?>
    <tr>
		<td><u><a href="<?php echo site_url('event/edit/'.$c['event_id']); ?>"><?php echo $c['event_name']; ?></a></u></td>
		<td class="hide-small"><?php echo $c['event_type']; ?></td>
		<td class="hide-small"><?php echo $c['category_name']; ?></td>
		
		<?php if($auth_level > 4){
			echo '<td>' . $c['hall_name'] . '</td>';
		}	?>

		<td><?php echo date("d/m h:m", strtotime($c['date'])); ?></td>
		<td><?php echo $c['location']; ?></td>
		<td>
						<a href="<?php echo site_url('event/duplicate/'.$c['event_id']); ?>" class="btn btn-success btn-xs">Repeat</a>  

        </td>
    </tr>
	<?php } ?>
</table>
