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
			<a href="index" title="Reporting"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Reporting</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-university"></i> <span class="menu-item-parent">Universities</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addUniversity') {?>class="active"<?php }?>>
					<a href="addUniversity">Add University</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'universities') {?>class="active"<?php }?>>
					<a href="universities">View Universities</a> 
				</li>
						
			</ul>
		</li>
		
		<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'user') {?>class="active"<?php }?>>
			<a href="users" title="Dashboard"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Users</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-graduation-cap"></i> <span class="menu-item-parent">Gym</span></a>
			<ul>
				
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addGym') {?>class="active"<?php }?>>
					<a href="<?php echo $UNIVROOT;?>addGym">Add Gym</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewGym' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'editGym') {?>class="active"<?php }?>>
					<a href="<?php echo $UNIVROOT;?>viewGym">View Gym</a>
				</li>		
			</ul>
		</li>
		<li>
			<a href="#"><img src="<?php echo ROOT;?>img/facility_map.png" style="height: 18px;padding-right: 9px;padding-left: 6px;" alt=""> <span class="menu-item-parent">Facility</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'editRoom') {?>class="active"<?php }?>>
					<a href="#">Rooms</a>
					<ul>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addRoom') {?>class="active"<?php }?>>
							<a href="<?php echo $GYMROOT;?>addRoom">Add Room</a>
						</li>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewRooms' ) {?>class="active"<?php }?>>
							<a href="<?php echo $GYMROOT;?>viewRooms">View Rooms</a>
						</li>
						
					</ul>
				</li>
				
			</ul>
		</li>
		<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'listOccupancy' ) {?>class="active"<?php }?>>
			<a href="<?php echo $GYMROOT;?>listOccupancy"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">Occupancy</span>				</a>
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
			<a href="#"><i class="fa fa-lg fa-fw"><img src="<?php echo ROOT;?>img/classes.png" style="height:18px;" alt=""></i><span class="menu-item-parent">Classes</span></a>
			<ul>
			
                                <li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addClass') {?>class="active"<?php }?>>
					<a href="addClass">Add Class </a>
				</li>
                                 <li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewClass') {?>class="active"<?php }?>>
					<a href="viewClass">View Class </a>
				</li>
				
				<!--</li>
                                 <li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'feedback' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'viewFeedback') {?>class="active"<?php }?>>
					<a href="feedback">Feedback </a>
				</li>-->
				
			</ul>
		</li>
		
		<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'feedback' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'viewFeedback') {?>class="active"<?php }?>>
			<a href="feedback"><i class="fa fa-lg fa-fw fa-archive"></i> <span class="menu-item-parent">Feedback</span>				</a>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw "><img src="<?php echo ROOT;?>img/reservations.png" style="height:18px;" alt=""></i> <span class="menu-item-parent">Reservation</span></a>
			<ul>
			
				<li >
					<a href="#">Class</a>
					<ul>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addClassReservation') {?>class="active"<?php }?>>
							<a href="<?php echo $GYMROOT;?>addClassReservation">Add Reservation</a>
						</li>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewClassReservation' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'editClassReservation' ) {?>class="active"<?php }?>>
							<a href="<?php echo $GYMROOT;?>viewClassReservation">View Reservation</a>
						</li>
						
					</ul>
				</li>
				
				<li>
					<a href="#">Equipment</a>
					<ul>
						<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'occupancy' ) {?>class="active"<?php }?>>
							<a href="occupancy">Add Reservation</a>
						</li>
					 	<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewOccupancy' ) {?>class="active"<?php }?>>
							<a href="viewOccupancy">View Reservation</a>
						</li>
						
					</ul>
				</li>
				
			</ul>
		</li>
		<!--<li >
			<a href="#"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Reservation</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'addClassReservation') {?>class="active"<?php }?>>
					<a href="<?php echo $GYMROOT;?>addClassReservation">Add Reservation</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'viewClassReservation' || $REQUEST_PARAMS['REQUEST_PAGE'] == 'editClassReservation' ) {?>class="active"<?php }?>>
					<a href="<?php echo $GYMROOT;?>viewClassReservation">View Reservation</a>
				</li>
				
			</ul>
		</li>-->

		<li>
			<a href="#"><img src="<?php echo ROOT;?>img/equipment1.png" style="height:14px;padding-right:4px;" alt=""> <span class="menu-item-parent">Equipment</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_ARTICLE_ID'] == 'addEquipments' ) { ?>class="active"<?php }?>>
					<a href="<?php echo $GYMROOT;?>addEquipments">Add Equipment</a>
				</li>
				<li <?php if($REQUEST_PARAMS['REQUEST_ARTICLE_ID'] == 'viewEquipments' ) {?>class="active"<?php }?>>
					<a href="<?php echo $GYMROOT;?>viewEquipments">View Equipment</a>
				</li>
				
				
				
				<!--<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'contactUs' ) {?>class="active"<?php }?>>
					<a href="contactUs">Contact Us</a>
				</li>-->
				
			</ul>
		</li>
		<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'contactUs' ) {?>class="active"<?php }?>>
			<a href="contactUs"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Contact Us</span>				</a>
		</li>
		<li> 
			<a href="#"><i class="fa fa-lg fa-fw fa-question"></i> <span class="menu-item-parent">How To</span></a>
			<ul>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'helpDashboard' ) {?>class="active"<?php }?>><a href="helpDashboard">Dashboard</a></li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'helpSettings' ) {?>class="active"<?php }?>><a href="helpSettings">Settings</a></li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'helpUsers' ) {?>class="active"<?php }?>><a href="helpUsers">Users</a></li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'helpFacility' ) {?>class="active"<?php }?>><a href="helpFacility">Facility</a></li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'helpStaff' ) {?>class="active"<?php }?>><a href="helpStaff">Staff</a></li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'helpClasses' ) {?>class="active"<?php }?>><a href="helpClasses">Classes</a></li>
				<li <?php if($REQUEST_PARAMS['REQUEST_PAGE'] == 'helpEquipment' ) {?>class="active"<?php }?>><a href="helpEquipment">Equipment</a></li>
			</ul>
		</li>
	</ul>
</nav>

