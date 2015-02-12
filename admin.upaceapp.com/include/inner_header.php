<link href="<?php echo ROOT; ?>css/stylish-portfolio.css" rel="stylesheet">
<?php #include ('settings.php'); ?>
<div class="top-blue-common-head">
       <!-- <a href="javascript:void(0);" onClick="gotoback()" class="pull-left"><i class="fa fa-angle-left fa-4x"></i></a>-->
		<a href="landing" class="pull-left"><i class="fa fa-angle-left fa-4x"></i></a>
        <?php
            $current_page = $_SERVER['PHP_SELF'];
            if($current_page=='/classes.php')
            { ?>
                <h2>
                  <strong>Classes</strong>
                  <span>&nbsp; | &nbsp;</span>
                  <span class="day"> Today </span>
                  <span>&nbsp; | &nbsp;</span>
                  <span class="month"> <?php echo date('M Y'); ?></span>
                </h2>
                <?php
            }
            else if($current_page=='/equipment.php')
            { ?>
                <h2>
                  <strong>Equipment</strong>
                  <span>&nbsp; | &nbsp;</span>
                  <span class="day"> Today </span>
                  <span>&nbsp; | &nbsp;</span>
                  <span class="month"> <?php echo date('M Y'); ?></span>
                </h2>
                <?php
            }
			else if($current_page=='/map.php')
            { ?>
                <h2>
                  <strong>Map</strong>
                  <span>&nbsp; | &nbsp;</span>
                  <span class="day"> Today </span>
                  <span>&nbsp; | &nbsp;</span>
                  <span class="month"> <?php echo date('M Y'); ?></span>
                </h2>
                <?php
            }
            else
            { ?>
                <h2>
                  <strong>My Reservations</strong>
                  <span>&nbsp; | &nbsp;</span>
                  <span class="day"> Today </span>
                  <span>&nbsp; | &nbsp;</span>
                  <span class="month"> <?php echo date('M Y'); ?></span>
                </h2>
            <?php             
            } ?>
        <a id="menu-toggle" href="#" class="pull-right toggle"><i class="fa fa-bars fa-4x"></i></a>
        <nav id="sidebar-wrapper">
          <ul class="sidebar-nav">
              <!--<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
                <i class="fa fa-times"></i>
              </a>-->
              <li class="sidebar-brand">
                  <a href="javascript:void(0);" onClick="show_search('show')"><i class=""><img src="../img/searchy.png" alt="" /></i> Search</a>
              </li>
              <li>
                  <a href="<?php echo ROOT; ?>myreservations"><i class=""><img src="../img/reservation.png" alt="" /></i> Reservations</a>
              </li>
              <li>
                  <a href="<?php echo ROOT; ?>classes"><i class=""><img src="../img/class.png" alt="" /></i> Classes</a>
              </li>
              <li>
                  <a href="<?php echo ROOT; ?>equipment"><i class=""><img src="../img/equipment.png" alt="" /></i> Equipment</a>
              </li>
			  <li>
                 <a href="javascript:void(0);" onClick="show_hours('show')"><i class=""><img src="../img/icon_clock_blue.png" alt="" /></i> Hours</a>
              </li>
<!--              <li>
                  <a href="#"><i class="fa fa-flag fa-4x">&nbsp;</i>&nbsp; Challenges</a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-road fa-4x">&nbsp;</i>&nbsp; Tracking</a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-map-marker fa-4x">&nbsp;</i>&nbsp; Facility Map</a>
              </li>-->
              <li>
                  <a href="javascript:void(0);" onClick="show_settings('show')"><i class=""><img src="../img/settings.png" alt="" /></i> Settings</a>
              </li>
              <li>
                  <a href="<?php echo ROOT; ?>logout"><i class=""><img src="../img/logout.png" alt="" /></i> Logout</a>
              </li>
          </ul>
      </nav>
      </div>
	  <?php
	  if($current_page!='/map.php')
      { ?>
      <div id="myCarousel" class="top-next-blue carousel slide" data-interval="false">
        <div class="calender carousel-inner">
            <?php 
            $j=0;
            $k=0;
            if(isset($_GET['dt']) && !empty($_GET['dt']))
            {
            	$dy = explode('/',$_GET['dt']);
            	 $day = $dy[1];
            }
            else{
            	 $day = date('d');
            }
            //$day = date('d');
            $last_day = date('t');
            if($last_day==31)
            {
               $add_more=4;
            }
            else{
               $add_more = 5;
            }
            $next_month = date('m', strtotime('+1 month'));
			
				for ($i=0;$i<$last_day;$i++)
				{ 
					$d=$i + 1;
					$temp_date=date("m/$d/Y");
					$temp_date=date('m/d/Y',strtotime($temp_date));
					$tdt  = date("$d.m.Y");
				   // echo $temp_date;
					if($j==0)
					{ ?>
						<div class="item<?php echo ((($i)<$day) && ((($i)+7)>=$day))?' active':' '.$i.' '.$k; ?>">
						<?php
					} ?>
							<a href="<?php echo $_SERVER['PHP_SELF']; ?>?dt=<?php echo $temp_date;?>" class="<?php echo ($day==$d)?'active':''; ?>">
									<b><?php echo $d; ?><span><?php echo date('D',  strtotime($temp_date)); ?></span></b>
							</a>
						
					 <?php
					  $j++;
					 if($j==7 || $i==($last_day-1))
					 { 
						 if(($i==($last_day-1)))
						 {
							 for($am=1;$am<=$add_more;$am++)
							 {
								 $temp_date1=date("$next_month/$am/Y");
								 $temp_date1=date('m/d/Y',strtotime($temp_date1));
								 ?>
								<a href="<?php echo $_SERVER['PHP_SELF']; ?>?dt=<?php echo $temp_date1;?>" class="">
										<?php echo $am; ?><span><?php echo date('D',  strtotime($temp_date1)); ?></span>
								</a>
								 <?php
							 }
						 }
						 ?>
						</div>
						<?php  
						$j=0;
						$k++;
					 }
					
				}
			?>
            

        </div>
        <a href="#myCarousel" data-slide="prev" class="left prev"><i class="fa fa-chevron-left fa-3x"></i></a>
        <a href="#myCarousel" data-slide="next" class="right next"><i class="fa fa-chevron-right fa-3x"></i></a>
      </div>
	  <?php } ?>
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
    function gotoback()
    {
        var oldURL = document.referrer;
        //window.history.back();
        if(oldURL=='login' || oldURL == 'index')
        {
            window.location='landing';
        }
        else
        {
            window.history.back();
        }
        
    }
</script>

<style>
	.sidebar-nav img {
    float: left;
    margin-right: 0;
    width: 60px;
    margin-top:2%;
}
</style>
