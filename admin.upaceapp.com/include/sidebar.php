<link href="<?php echo ROOT; ?>css/stylish-portfolio.css" rel="stylesheet">
<div class="top-blue-common-head">
<nav id="sidebar-wrapper">
          <ul class="sidebar-nav">
              <!--<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
                <i class="fa fa-times"></i>
              </a>-->
              <li class="sidebar-brand">
                  <a href="javascript:void(0);" onClick="show_search('show')"><i class=""><img src="../img/searchy.png" alt="" /></i> Search</a>
              </li>
              <li>
                  <a href="<?php echo ROOT; ?>myreservations" class="alink" data-ajax="false"><i class=""><img src="../img/reservation.png" alt="" /></i> Reservations</a>
              </li>
              <li>
                  <a href="<?php echo ROOT; ?>classes"  class="alink"  data-ajax="false"><i class=""><img src="../img/class.png" alt="" /></i> Classes</a>
              </li>
              <li>
                  <a href="<?php echo ROOT; ?>equipment"  class="alink"  data-ajax="false"><i class=""><img src="../img/equipment.png" alt="" /></i> Equipment</a>
              </li>
              <li>
                 <a href="javascript:void(0);" onClick="show_hours('show')"><i class=""><img src="../img/icon_clock_blue.png" alt="" /></i> Hours</a>
              </li>
              <!--<li>
                  <a href="#"><i class="fa fa-road fa-4x">&nbsp;</i>&nbsp; Tracking</a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-map-marker fa-4x">&nbsp;</i>&nbsp; Facility Map</a>
              </li>-->
              <li>
                  <a href="javascript:void(0);" onClick="show_settings('show')" data-ajax="false"><i class=""><img src="../img/settings.png" alt="" /></i> Settings</a>
              </li>
              <li>
                  <a href="<?php echo ROOT; ?>logout" data-ajax="false"><i class=""><img src="../img/logout.png" alt="" /></i> Logout</a>
              </li>
          </ul>
      </nav>
</div>
<script>
    $(function() {
        $("#menu-close").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });

        // Opens the sidebar menu
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
		
    });
	
</script>
<style>
	.sidebar-nav img {
    float: left;
    margin-right: 0;
    width: 60px;
    margin-top:2%;
}
</style>
