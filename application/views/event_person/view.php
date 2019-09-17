<h2 class="h2 text-center">Attendence</h2>
<h3 class="h3 text-center"><?php echo $person['first_name']." ".$person['last_name']; ?></h3>

<table class="table table-sm table-striped table-bordered" >
    <tr >
		<th>Event Name</th>
		<th>Date</th>
		<th class="hide-small">Location</th>
		<th>Event Type</th>
		<th>Attendence</th>
    </tr>
	<?php foreach($event_people as $c){ ?>
    <tr>
		<td><a href="/event/view_by_id/<?php echo $c['event_id'] ?>"><?php echo $c['event_name']; ?></a></td>
		<td><?php echo date("d/m/y", strtotime($c['date'])); ?></td>
		<td class="hide-small"><?php echo $c['location']; ?></td>
		<td><?php echo $c['event_type']; ?></td>
		<td>
				
				<a href="#" class="btn btn-xs <?php echo ($c['attended']==1 ? 'btn-success' : 'btn-secondary' )?>">Atten</a>		
						
						</td>
    </tr>
	<?php } ?>
</table>
