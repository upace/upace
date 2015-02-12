<?php
$URL = isset($_SERVER['HTTPS']) ? 'https://'.$_SERVER['SERVER_NAME'] : 'http://'.$_SERVER['SERVER_NAME'];

// get parameters from url
$request = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));

$REQUEST_PARAMS = array(
	'REQUEST_PAGE' => $request[0],
	'REQUEST_ARTICLE_ID' => $request[1],
	'REQUEST_ARTICLE_SLUG' => $request[2]
);
?>
<nav>
	<ul>
		<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'index') {?>class="active"<?php }?>>
			<a href="/index" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent">Settings</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'socialLinks') {?>class="active"<?php }?>>
					<a href="/socialLinks">Social Links</a>
				</li>		
			</ul>
		</li>
		<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'user') {?>class="active"<?php }?>>
			<a href="/users" title="Dashboard"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Users</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Facility</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'basicInformation') {?>class="active"<?php }?>>
					<a href="/basicInformation">Basic Information</a>
				</li>
				<li>
					<a href="#">Locations</a>
					<ul>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addLocation') {?>class="active"<?php }?>>
							<a href="/addLocation">Add Location</a>
						</li>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewLocations' ) {?>class="active"<?php }?>>
							<a href="/viewLocations">View Locations</a>
						</li>
						
					</ul>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'editRoom') {?>class="active"<?php }?>>
					<a href="#">Rooms</a>
					<ul>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addRoom') {?>class="active"<?php }?>>
							<a href="/addRoom">Add Room</a>
						</li>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewRooms' ) {?>class="active"<?php }?>>
							<a href="/viewRooms">View Rooms</a>
						</li>
						
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Staff</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addStaff') {?>class="active"<?php }?>>
					<a href="/addStaff">Add Staff</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewStaff' ) {?>class="active"<?php }?>>
					<a href="/viewStaff">View Staff</a>
				</li>
				
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-calendar"></i><span class="menu-item-parent">Classes</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'calendar') {?>class="active"<?php }?>>
					<a href="/calendar">Calendar </a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'instructorProfile'  ) {?>class="active"<?php }?>>
					<a href="#"><span class="menu-item-parent">Instructors</span></a>
					<ul>
						<li <?php if( $REQUEST_PARAMS['REQUEST_PAGE'] == 'addInstructor') {?>class="active"<?php }?>>
							<a href="/addInstructor">Add Instructor</a>
						</li>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewInstructor' ) {?>class="active"<?php }?>>
							<a href="/viewInstructor">View Instructor</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent">Equipment</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addEquipments' ) {?>class="active"<?php }?>>
					<a href="/addEquipments">Add Equipment</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewEquipments' ) {?>class="active"<?php }?>>
					<a href="/viewEquipments">View Equipment</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'occupancy' ) {?>class="active"<?php }?>>
					<a href="/occupancy">Occupancy</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>