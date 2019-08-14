<div class="pull-right">
	<a href="<?php echo site_url('ncm_comment/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Comment Id</th>
		<th>Event Id</th>
		<th>Songs</th>
		<th>Brief Report</th>
		<th>Notes For Improvements</th>
		<th>Actions</th>
    </tr>
	<?php foreach($ncm_comments as $c){ ?>
    <tr>
		<td><?php echo $c['comment_id']; ?></td>
		<td><?php echo $c['event_id']; ?></td>
		<td><?php echo $c['songs']; ?></td>
		<td><?php echo $c['brief report']; ?></td>
		<td><?php echo $c['notes for improvements']; ?></td>
		<td>
            <a href="<?php echo site_url('ncm_comment/edit/'.$c['comment_id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('ncm_comment/remove/'.$c['comment_id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
