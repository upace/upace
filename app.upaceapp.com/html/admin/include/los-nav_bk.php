<?php
$URL = isset($_SERVER['HTTPS']) ? 'https://'.$_SERVER['SERVER_NAME'] : 'http://'.$_SERVER['SERVER_NAME'];

// get parameters from url
$request = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));

$REQUEST_PARAMS = array(
	'REQUEST_PAGE' => $request[1],
	'REQUEST_ARTICLE_ID' => $request[2],
	'REQUEST_ARTICLE_SLUG' => $request[3]
);
$req =  explode('?',$REQUEST_PARAMS['REQUEST_PAGE']);
$REQUEST_PARAMS['REQUEST_PAGE'] = $req[0];
?>
<nav>
	<ul>
		
		<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'index') {?>class="active"<?php }?>>
			<a href="<?php echo UNIVROOT;?>index" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
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
			<a href="users" title="Dashboard"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Users</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Gym</span></a>
			<ul>
				<!--<li>
					<a href="#">Locations</a>
					<ul>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addLocation') {?>class="active"<?php }?>>
							<a href="<?php echo $UNIVROOT;?>addLocation">Add Location</a>
						</li>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewLocation' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'editLocation') {?>class="active"<?php }?>>
							<a href="<?php echo $UNIVROOT;?>viewLocation">View Locations</a>
						</li>
						
					</ul>
				</li>-->
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addGym') {?>class="active"<?php }?>>
					<a href="<?php echo $UNIVROOT;?>addGym">Add Gym</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewGym' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'editGym') {?>class="active"<?php }?>>
					<a href="<?php echo $UNIVROOT;?>viewGym">View Gym</a>
				</li>		
			</ul>
		</li>
		<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'editRoom') {?>class="active"<?php }?>>
					<a href="#"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Rooms</span></a>
					<ul>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addRoom') {?>class="active"<?php }?>>
							<a href="<?php echo $GYMROOT;?>addRoom">Add Room</a>
						</li>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewRooms' ) {?>class="active"<?php }?>>
							<a href="<?php echo $GYMROOT;?>viewRooms">View Rooms</a>
						</li>
						
					</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Staff</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addStaff') {?>class="active"<?php }?>>
					<a href="<?php echo $GYMROOT;?>addStaff">Add Staff</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'staff' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'viewStaff' ) {?>class="active"<?php }?>>
					<a href="<?php echo $GYMROOT;?>staff">View Staff</a>
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
							<a href="<?php echo $GYMROOT;?>addInstructor">Add Instructor</a>
						</li>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewInstructor' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'instructor' ) {?>class="active"<?php }?>>
							<a href="<?php echo $GYMROOT;?>instructor">View Instructor</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent">Equipment</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_ARTICLE_ID'] == 'addEquipments' ) { ?>class="active"<?php }?>>
					<a href="<?php echo $GYMROOT;?>addEquipments">Add Equipment</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_ARTICLE_ID'] == 'viewEquipments' ) {?>class="active"<?php }?>>
					<a href="<?php echo $GYMROOT;?>viewEquipments">View Equipment</a>
				</li>
				<!--
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'occupancy' ) {?>class="active"<?php }?>>
					<a href="occupancy">Add Occupancy</a>
				</li>
                <li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewOccupancy' ) {?>class="active"<?php }?>>
					<a href="viewOccupancy">View Occupancy</a>
				</li>
				-->
			</ul>
		</li>
	</ul>
</nav>
