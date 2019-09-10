<!-- Sidebar -->
<nav id="sidebar" class="bg-dark mCustomScrollbar">
	
	<ul class="list-unstyled components">
				<?php if($auth_level>=1)
				{
				echo '
				<li class="active">
					<a href="/Event_person/viewself">My Attendence</a>
				</li>';
				}
				?>
				
				<?php if($auth_level>=4)
				{
					echo '
				<li>
					<a href="/welcome/index">Dashboard <span class="sr-only">(current)</span></a>
					
				</li> ';
				}
				?>
				
				<?php if($auth_level>=4)
				{
					echo '
				<li class="active">
					<a href="#eventSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Events</a>
					<ul class="collapse list-unstyled" id="eventSubmenu">';
					
					if($auth_level >= 5)
					{
						echo '<li><a href="/event/add">&nbsp; Create New</a></li>';
						echo '<li><a href="/event/index">&nbsp; View All</a></li>';
					}
					
					if($auth_level == 4)
					{
						echo '<li><a href="/event/index">&nbsp; View My Events</a></li>';
					}
					
					if($serving_primary) echo '<li><a href="/event/view_primary">&nbsp; View Children</a></li>';	
					if($serving_hs) echo '<li><a href="/event/view_hs">&nbsp; View Highschoolers</a></li>';
					if($serving_int) echo '<li><a href="/event/view_int">&nbsp; View Intermediates</a></li>';
					if($serving_campus) echo '<li><a href="/event/view_campus">&nbsp; View Campus</a></li>';	

					echo '
					</ul>
				</li>';
				}
				?>
				
				<?php if($auth_level>=4)
				{
					echo '
				<li class="active">
					
					<a href="#peopleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">People</a>
					<ul class="collapse list-unstyled" id="peopleSubmenu">';
					
					if($auth_level > 4)
					{
						echo '<li><a href="/person/add">&nbsp; Create New</a></li>';
					}
					
					echo '<li><a href="/person/view_by_hall">&nbsp; View My Hall</a></li>';
					
					if($serving_primary) echo '<li><a href="/person/view_primary">&nbsp; Children</a></li>';	
					if($serving_hs) echo '<li><a href="/person/view_hs">&nbsp; Highschoolers</a></li>';
					if($serving_int) echo '<li><a href="/person/view_int">&nbsp; Intermediates</a></li>';
					if($serving_campus) echo '<li><a href="/person/view_campus">&nbsp; Campus</a></li>';	
					if($auth_level==9)
					{
						echo
						'
						<li><a href="/person/index">&nbsp; View All</a></li>
						';
					}
						echo
						'
					</ul>
				</li>';
				}
				?>
				
				<?php if($auth_level == 9)
				{
				echo '
				<li class="active">
					<a href="#attendSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attendence</a>
					<ul class="collapse list-unstyled" id="attendSubmenu">
						<li><a class="nav-link" href="/Event_person/add">&nbsp; Create New</a></li>
						<li><a class="nav-link" href="/Event_person/index">&nbsp; View All</a></li>
					</ul>
				</li>';
				
					echo '
				<li class="active">
					<a href="#hallSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Hall</a>
					<ul class="collapse list-unstyled" id="hallSubmenu">
						<li><a href="/hall/add">&nbsp; Create New</a></li>
						<li><a href="/hall/index">&nbsp; View All</a></li>
					</ul>
				</li>
				
				<li class="active">
					<a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
					<ul class="collapse list-unstyled" id="userSubmenu">
						<li><a href="/user/add">&nbsp; Create New</a></li>
						<li><a href="/user/index">&nbsp; View All</a></li>
					</ul>
				</li>';
				}
				?>
			</ul>
			<h6 class="sidebar-heading">
				<span>Settings</span>
				<a class="d-flex align-items-center text-muted" href="#">
				</a>
			</h6>
			<ul class="flex-column">		
				<li><a href="/person/editself">My Profile</a></li>
				<li><a href="#">Settings</a></li>
				<li><a href="/auth/logout">Logout</a></li>
			</ul>
</nav>


<script>

var hammertime = new Hammer(sidebar);
hammertime.on('panleft', function(ev) {
	toggleSidebar();
});

function toggleSidebar() {
	        // open or close navbar
        $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
				
				// fade in the overlay
        $('.overlay').toggleClass('active');
	
}

$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
         theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
			toggleSidebar();
    });

});
</script>
