
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	<div class="sidebar-sticky">
		<ul class="nav flex-column">
			<?php if($auth_level>=4)
			{
				echo '
			<li class="nav-item">
				<a class="nav-link active" href="/welcome/index">
					Dashboard <span class="sr-only">(current)</span>
				</a>
			</li>

			<li class="active nav-item">
				<a href="#peopleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">People</a>
				<ul class="nav collapse" id="peopleSubmenu">';
				
				if($auth_level > 4)
				{
				echo '<li><a class="nav-link" href="/person/add">&nbsp; Create New</a></li>';
				}
				
				echo 
					'<li><a class="nav-link" href="/person/view_by_hall">&nbsp; View My Hall</a></li>';
				if($serving_primary) echo '<li><a class="nav-link" href="/person/view_primary">&nbsp; Children</a></li>';	
				if($serving_hs) echo '<li><a class="nav-link" href="/person/view_hs">&nbsp; Highschoolers</a></li>';
				if($serving_int) echo '<li><a class="nav-link" href="/person/view_int">&nbsp; Intermediates</a></li>';
				if($serving_campus) echo '<li><a class="nav-link" href="/person/view_campus">&nbsp; Campus</a></li>';	
				if($auth_level==9)
				{
					echo
					'
					<li><a class="nav-link" href="/person/index">&nbsp; View All</a></li>
					';
				}
					echo
					'
				</ul>
			</li>';
			}
			?>
			<?php if($auth_level>=4)
			{
				echo '
			<li class="active nav-item">
				<a href="#eventSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">Events</a>
				<ul class="nav collapse list-unstyled" id="eventSubmenu">';
				
				if($auth_level > 4)
				{
					echo '<li><a class="nav-link" href="/event/add">&nbsp; Create New</a></li>';
					echo '<li><a class="nav-link" href="/event/index">&nbsp; View All</a></li>';
				}
				
				if($serving_primary) echo '<li><a class="nav-link" href="/event/view_primary">&nbsp; View Children</a></li>';	
				if($serving_hs) echo '<li><a class="nav-link" href="/event/view_hs">&nbsp; View Highschoolers</a></li>';
				if($serving_int) echo '<li><a class="nav-link" href="/event/view_int">&nbsp; View Intermediates</a></li>';
				if($serving_campus) echo '<li><a class="nav-link" href="/event/view_campus">&nbsp; View Campus</a></li>';	

				echo '
				</ul>
			</li>';
			}
			?>
			<?php if($auth_level==1)
			{
			echo '
			<li class="active nav-link">
				<a href="/Event_person/viewself">Attendence</a>
			</li>';
			}
				?>
			<?php if($auth_level == 9)
			{
			echo '
			<li class="active nav-item">
				<a href="#attendSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">Attendence</a>
				<ul class="nav collapse list-unstyled" id="attendSubmenu">
					<li><a class="nav-link" href="/Event_person/add">&nbsp; Create New</a></li>
					<li><a class="nav-link" href="/Event_person/index">&nbsp; View All</a></li>
				</ul>
			</li>';
			
				echo '
			<li class="active nav-item">
				<a href="#hallSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">Hall</a>
				<ul class="nav collapse list-unstyled" id="hallSubmenu">
					<li><a class="nav-link" href="/hall/add">&nbsp; Create New</a></li>
					<li><a class="nav-link" href="/hall/index">&nbsp; View All</a></li>
				</ul>
			</li>
			
			

			<li class="nav-item">
				<a class="nav-link" href="#">
					Users
				</a>
			</li>';
			}
			?>
		</ul>

<!--
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
			<span>Saved reports</span>
			<a class="d-flex align-items-center text-muted" href="#">
			</a>
		</h6>
		<ul class="nav flex-column mb-2">
			<li class="nav-item">
				<a class="nav-link" href="#">
					Placeholder 1
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					Placeholder 2
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					Placeholder 3
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					Placeholder 4
				</a>
			</li>
		</ul> -->
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
			<span>Settings</span>
			<a class="d-flex align-items-center text-muted" href="#">
			</a>
		</h6>
		<ul class="nav flex-column mb-2">		
			<a class="nav-link" href="/person/editself">
					My Profile
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					Settings
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/auth/logout">
					Logout
				</a>
			</li>
		</ul>
	</div>
</nav>

