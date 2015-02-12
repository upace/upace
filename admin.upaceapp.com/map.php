<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->
<?php require_once('include/config.php');?>
<script type="text/javascript" src="<?php echo ROOT?>js/parse-1.2.12.min.js"></script>	

<head>
<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
var currentUser = Parse.User.current();
if (currentUser) {
    //window.location = 'myreservations' ;
}   
</script>
   <?php require_once('include/header.php');?>
   <?php require_once('include/check_login.php');?>
     <style>
        .page-gym .wall h2
        {
            margin-top:10px !important;
            text-align: left !important;
            font-size:38px !important;
            line-height:45px !important;
            cursor:pointer  !important;
            margin-left:4%  !important;
        }
    </style>
</head>

<body>
	<section class="reservation-bg">
            <?php require_once('include/settings.php');?>
            <div class="overlay page-gym" style="display:none;">
                <div class="container">
                     <div class="login-pg signup-pg terms">
                          <div class="row">
                               <div class="col-lg-12 page-gym-popup">
                                    <h1>SELECT GYM <a class="cancel cancel-page-gym" href="javascript:void(0);" ><img alt="" src="img/cancel.png"></a></h1>
                                                                       
                               </div>
                          </div>
                          
                     </div>
                </div>
           </div>
		   	<div class="overlay page-gym1" style="display:none;">
                <div class="container">
                     <div class="login-pg signup-pg te rms">
                          <div class="row">
                               <div class="col-lg-12">
							   <a class="cancel cancel-page-gym1" href="javascript:void(0);" style="float:right" ><img alt="" src="img/cancel.png"></a>
                                    <h1>Class sign ups will not be available until Jan, 19th 2015
</h1><br>
                                     <center><img src="/img/g_logo.png" class="img-responsive"> </center>
                               </div>
                          </div>
                          
                     </div>
                </div>
           </div>
    <!-- Page Content -->
    <div class="container">
      <?php require_once('include/inner_header.php');?>
      <div class="menu-title">
        <h3>Map</h3>
<!--         <h3 class="pull-right">
            <select name="gym" class="gym_select" id="gym">
                <option value="">All Gyms</option>
            </select>
        </h3>-->
        
      </div>
      <div class="listings" style="padding-bottom:13%;">                                                    
        <div class="map-container" style="padding:0px !important">
			<div class="window-mockup">
				<div class="window-bar"></div>
			</div>
			<div id="mapplic"></div>
		</div>
      </div> 
        <!-- <div class="menu-title">
        
       <div class="pull-right">
          <ul class="options">
              <li ><a href="#" style="background-color: none !important;">&nbsp;</a></li>
            
          </ul>
        </div>
      </div>  -->
        
    </div>
  <!-- /.container -->
  <section class="bottom_link">
        <div class="row bottom_link_top" style="display: none;">
            <a href="javascript:void(0);" role="button" class="btn btn-reserve pull-left">RESERVE ALL</a>
            <a href="javascript:void(0);" role="button" class="btn btn-cancel pull-right">CANCEL ALL</a>
        </div>
        <div class="row bottom_link_bottom">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12">
				<div class="col-lg-1 col-md-1 col-sm-1"></div>
                    <!--<ul class="options2">
                        <li><a href="javascript:void(0);" class="search_link"><i class="fa fa-clock-o fa-4x"></i></a></li>
                        <li><a href="#"><i class="fa fa-map-marker fa-4x"></i></a></li>
                        <li><a href="javascript:void(0);" class="page-gym-link"><i class="fa fa-sitemap fa-4x"></i></a></li>
                        <li><a href="/myreservations"><i class="fa fa-plus fa-4x"></i></a></li>
                        <li><a href="javascript:void(0);" class="multiselect_btn"><i class="fa fa-cogs fa-4x"></i></a></li>
                    </ul>-->
					
					<div class="col-lg-1 col-md-1 col-sm-1"></div>
                </div>
            </div>
        </div>
    </section>
  </section>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo ROOT?>js/moment.js"></script>	
    <script type="text/javascript" src="<?php echo ROOT?>js/inner.js"></script>	

	<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>css/map.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>mapplic/mapplic.css">
	<!-- <script type="text/javascript" src="<?php echo ROOT; ?>js/map/js/jquery-1.11.0.min.js"></script> -->
	<script type="text/javascript" src="<?php echo ROOT; ?>js/map/js/hammer.js"></script>
	<script type="text/javascript" src="<?php echo ROOT; ?>js/map/js/jquery.easing.js"></script>
	<script type="text/javascript" src="<?php echo ROOT; ?>js/map/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo ROOT; ?>js/map/mapplic/mapplic.js"></script>
	<script type="text/javascript" src="js/equi_map.js"></script>
    <script>
        
    </script>
   <?php require_once('include/footer.php');?>

</body>
<script>
    var is_multiselect=0;
    $(function(){

     
        
		
		
		
    })
    
   
</script>
    
<style>
    
    .list-single span{
        width:28% !important;
    }
    .list-single h4{
        width:35% !important;
    }
    .clock_time 
    {
        padding: 38px 20px;
        float:left;
        font-size: 30px;
    }
</style>
</html>
