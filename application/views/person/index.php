<input class="form-control" id="myInput" type="text" placeholder="Search for a person..">
<br/>

<table class="table table-sm table-striped table-bordered">
	<thead>
    <tr>
		<th>Full Name</th>
		<th class="hide-small">Gender</th>
		<th>Age Group</th>
		<th>Hall</th>
		<th class="hide-small">Email</th>
		<th class="hide-small">Mobile</th>
		<th>Actions</th>
    </tr>
	</thead>
	<tbody id="myTable">
	<?php foreach($people as $c){ ?>
    <tr>
		<td><u><a href="<?php echo site_url('person/edit/'.$c['people_id']); ?>"><?php echo $c['first_name']." ".$c['last_name']; ?></a></u></td>
		<td class="hide-small"><?php echo $c['gender']; ?></td>
		<td><?php echo $c['age_group_name']; ?></td>
		<td><?php echo $c['hall_id']; ?></td>
		<td class="hide-small"><?php echo $c['email']; ?></td>
		<td class="hide-small"><?php echo $c['mobile']; ?></td>
		<td>
			<a href="<?php echo site_url('event_person/view/'.$c['people_id']); ?>" class="btn btn-success btn-xs">View</a> 
        </td>
    </tr>
	<?php } ?>
	</tbody>
</table>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>