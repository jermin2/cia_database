<?php echo form_open('event/edit/'.$event['event_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group row">
		<label for="event_type_id" class="col-md-2 control-label">Event Type</label>
		<div class="col-md-4">
			<select name="event_type_id_sel" class="form-control" disabled="disabled">
				<option value="">select event type</option>
				<?php 
				foreach($all_event_types as $event_type)
				{
					$selected = ($event_type['event_type_id'] == $event['event_type_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$event_type['event_type_id'].'" '.$selected.'>'.$event_type['event_type'].'</option>';
				} 
				?>
			</select>
			<input name="event_type_id" hidden="true" id="event_type_id"  value="<?php echo $event['event_type_id'] ?>" />
		</div>
	</div>
	<div class="form-group row">
		<label for="category_id" class="col-md-2 control-label">Category</label>
		<div class="col-md-4">
			<select name="category_id_sel" class="form-control" disabled="disabled">
				<option value="">select category</option>
				<?php 
				foreach($all_categories as $category)
				{
					$selected = ($category['category_id'] == $event['category_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$category['category_id'].'" '.$selected.'>'.$category['category_name'].'</option>';
				} 
				?>
			</select>
			
			<input name="category_id" hidden="true" id="category_id"  value="<?php echo $event['category_id'] ?>" />
		</div>
	</div>
	<div class="form-group row">
		<label for="hall" class="col-md-2 control-label">Hall</label>
		<div class="col-md-4">
			<select name="hall_id_sel" class="form-control" disabled="disabled">
				<option value="">select hall</option>
				<?php 
				foreach($all_halls as $hall)
				{
					$selected = ($hall['hall_id'] == $event['hall_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$hall['hall_id'].'" '.$selected.'>'.$hall['hall_name'].'</option>';
				} 
				?>
			</select>
			<input name="hall_id" hidden="true" id="hall_id"  value="<?php echo $event['hall_id'] ?>" />
		</div>
	</div>
	<div class="form-group row">
		<label for="event_name" class="col-md-2 control-label">Name</label>
		<div class="col-md-4">
			<input type="text" name="event_name" value="<?php echo ($this->input->post('event_name') ? $this->input->post('event_name') : $event['event_name']); ?>" class="form-control" id="event_name" />
		</div>
	</div>
	<div class="form-group row">
		<label for="date" class="col-md-2 control-label">Date</label>
		<div class="col-md-4">
			<input type="datetime-local" name="date" value="<?php echo ($this->input->post('datetime') ? $this->input->post('datetime') : $event['datetime']); ?>" class="form-control" id="date" />
		</div>
	</div>
	<div class="form-group row">
		<label for="location" class="col-md-2 control-label">Location</label>
		<div class="col-md-4">
			<input type="text" name="location" value="<?php echo ($this->input->post('location') ? $this->input->post('location') : $event['location']); ?>" class="form-control" id="location" />
		</div>
	</div>
	<div class="form-group row">
		<label for="comments" class="col-md-2 control-label">Comments</label>
		<div class="col-md-4">
			<input type="text" name="comments" value="<?php echo ($this->input->post('comments') ? $this->input->post('comments') : $event['comments']); ?>" class="form-control" id="comments" />
		</div>
	</div>
		
	<div class="form-group row">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>		
		<div>
		<label for="comment" class="col-md-2 control-label">
			<h4> Attendence </h4>
			<br />
		</label>
	</div>
	<div class="form-group row">
		<label for="autocomplete" class="col-md-3 control-label">Add a person</label>
		<div class="col-md-4">
			<input id="autocomplete" class="form-control">
		</div>
		<input id="people_id" type="text" name="people_id" hidden="hidden" >
	</div>

<table id="attendenceTable" class="table table-striped table-bordered" >
    <tr >
		<th>Full Name</th>
		<th>Attendence</th>
		<th>Comment</th>
		<th>Actions</th>
    </tr>
	<?php foreach($event_people as $c){ ?>
    <tr>
		<td><?php echo $c['full_name']; ?></td>
		<td>
			<!-- <a href="#" class="btn btn-xs <?php echo ($c['registered']==1 ? 'btn-success' : 'btn-secondary' )?>">Reg</a> -->
			<a href="#" class="btn btn-xs <?php echo ($c['attended']==1 ? 'btn-success' : 'btn-secondary' )?>">Atten</a>		
			<!-- <a href="#" class="btn btn-xs <?php echo ($c['paid']==1 ? 'btn-success' : 'btn-secondary' )?>">Paid</a>		-->
		</td>
		<td><input type="text" name="comment[]" value="<?php echo $c['comment']; ?>"></td>
		<td>
            <!-- <a href="<?php echo site_url('event_person/edit/'.$c['event_people_id']); ?>" class="btn btn-info btn-xs">Edit</a> 	-->
            <a href="<?php echo site_url('event_person/remove/'.$c['event_people_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
	

<script type="text/javascript">
var namelist = <?php echo json_encode($namelist); ?>;

$( "#autocomplete" ).autocomplete({
  source: <?php echo json_encode($namelist) ?>,
	
	select: function( event, ui ) {

		document.getElementById('people_id').value = ui.item.people_id;
		
		full_name = ui.item.value;
		people_id = ui.item.people_id;

		//Add data to the database
		event_type_id = ajaxcall(people_id, full_name);
		
		//Reset the textfield
		$( "#autocomplete" ).autocomplete( "close");
		document.getElementById('autocomplete').value="";
		return false;
	},
	
	_renderItem: function( ul, item ) {
		console.log(item.value);
  return $( "<li>" )
    .attr( "data-value", item.value )
    .append( item.label )
    .appendTo( ul );
}
});
function addRow(id, full_name){
	var table = document.getElementById('attendenceTable');
	var row = table.insertRow(1);
	
	// Insert rows
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	
	//Add some text to the new cells
	cell1.innerHTML = full_name;
	cell2.innerHTML = ' <a href="#" class="btn btn-xs btn-success">Atten</a>';
	cell3.innerHTML = "";
	cell4.innerHTML = ' <a href="/event_person/remove/'.concat(id,'" class="btn btn-danger btn-xs">Delete</a>');	
	
}
function ajaxcall(people_id, full_name){
	var event_id = <?php echo $event['event_id']; ?>;
	var event_type_id = 1;
	$.ajax({
		 url: '/ajax-requestPost',
		 type: 'POST',
		 data: {people_id: people_id, event_id: event_id},
		 error: function() {
				alert('Something is wrong');
		 },
		 success: function(data) {
			event_type_id = data;
			
			console.log(event_type_id);
			//alert(data); 	
			
			//Add the rows to the table
			addRow(event_type_id, full_name);
		 }
	});
	return event_type_id;

}
</script>