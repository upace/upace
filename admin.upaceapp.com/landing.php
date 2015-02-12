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
    
    <link href="css/jquery.circliful.css" rel="stylesheet" type="text/css" />
	
</head>

<body class="landing_body">
	<section class="land_page">
            <?php require_once('include/settings.php');?>
			<?php 
				if((!empty($_GET['first'])) && ($_GET['first']==true))
				{ 
					include_once('include/feedback.php');
					?>
					<script>
						$(function(){
								var current = Parse.User.current();
								var ClassOccup = Parse.Object.extend("class_reservation");
								var equipoccup = new Parse.Query(ClassOccup);
								equipoccup.equalTo('user',current);
								//equipoccup.equalTo('equipmentId',equip);
								//equipoccup.equalTo('slotId',slot);
								equipoccup.include('slot');
								equipoccup.descending('updatedAt');
								equipoccup.equalTo('checkin',true);
								//equipoccup.notEqualTo('feedback',true);
								equipoccup.first({
									success:function(is_fgiven){
										if(is_fgiven && is_fgiven.get('feedback')!=true)
										{
											$('.feedback_page').show();
											$('.fedd_cid').val(is_fgiven.get('classId'));
											$('.fedd_sid').val(is_fgiven.get('slotId'));
											$('.fedd_rid').val(is_fgiven.id);
										}
									}
								});
							
						})
					</script>
				<?php 
			} ?>
    <!-- Page Content -->
    <div class="row top_land_page">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <a href=""><img src="img/g_logo.png" alt="" class="img-responsive pull-left land_logo"></a>
                <div class="right_link">
                    <!--<a href="javascript:void(0);"><i class="fa fa-map-marker fa-4x"></i></a>
                    <a href="javascript:void(0);"><i id="menu-toggle" class="fa fa-align-justify fa-4x"></i></a>-->
                    <!--<a href="javascript:void(0);"><i class=""><img src="img/map_icon.png"></i></a>-->
                    <a href="javascript:void(0);"><i id="menu-toggle"><img src="img/nav_icon.png"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php
        include('include/sidebar.php');
    ?>
    <div class="row middle_land_page">
    	<div class="container">
        	<div class="col-lg-12 col-md-12 col-sm-12">
        		<a href=""><img src="img/u_pace_logo.png" alt="" class="img-responsive pull-left land_logo"> </a>
                <div class="col-md-6 col-sm-6 pull-right">
                	<div class="three_round_area">
                    	<img src="img/green_round.png" alt="" class="img-responsive pull-left">
                        <img src="img/yellow_round.png" alt="" class="img-responsive pull-left">
                        <img src="img/red_round.png" alt="" class="img-responsive pull-left">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 big_round_hold">
            	<div class="big_round bg_green big_green">
                	<h1></h1>
                    <h2></h2>
                    <p></p>
                </div>
                
            </div>
        </div>
    </div>

	    <div class="row circular-bg">
	        <div id="myCarousel" class="top_circular-bg carousel slide" data-type="multi" data-ride="carousel" data-interval="false">
	        <div class="container">
            <div class="circular_item carousel-inner class_occup">
                
<!--                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="myStat pull-left" data-dimension="290" data-text="35%" data-width="30" data-fontsize="38" data-percent="35" data-fgcolor="#17df33" data-bgcolor="#eee" data-fill="#ddd"></div>
                        <h4>Green Room</h4>
                    </div>-->
                    
                   
              </div>                
            </div>
     
            <a href="#myCarousel" data-slide="prev" class="left prev"><i class="fa fa-chevron-left fa-3x"></i></a>
            <a href="#myCarousel" data-slide="next" class="right next"><i class="fa fa-chevron-right fa-3x"></i></a>
        </div>														
	    </div>
    
    <!--<div style="border-top: 1px solid #696663;width:100%;height:auto;overflow: hidden;">
    	<img src="img/ads.jpg" alt="" class="img-responsive">
    </div>-->
    <div class="row on_deck">
	<div id="myCarousel_10" class="top_circular-bg carousel slide" data-type="multi" data-ride="carousel" data-interval="false">
		<div class="gym_item carousel-inner" id="deck">
		 <!--<div class="item active">
        	<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
		</div>
		<div class="item">
        	<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
		</div>
		<div class="item">
        	<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
			<div class="col-lg-3 col-md-3 col-sm-3 bg_black">
            	<h1>ON</h1>
                <h2>DECK</h2>
            </div>
		</div>-->
       </div>  
	   <a href="#myCarousel_10" data-slide="prev" class="left prev"><!--<i class="fa fa-chevron-left fa-3x"></i>--></a>
       <a href="#myCarousel_10" data-slide="next" class="right next"><!--<i class="fa fa-chevron-right fa-3x"></i>--></a>
            <!-- <div class="col-lg-3 col-md-3 col-sm-3">
            	<h3>02:50</h3>
                <h4>THU 10/23</h4>
                <p>Cycle 90 <br> Blue Room</p>
            </div> -->
    	</div>
    </div>
    <div class="row other_gym">
    	<h1>Other Gym Locations</h1>
    </div>
    <div class="row gym_location">
    	
        <div id="myCarousel_gym" class="carousel slide" data-ride="carousel" data-interval="false">
        	<div class="container_green_sec">
            <div class="gym_item carousel-inner">
                <div class="item active">
                    <div class="col-lg-12 col-md-12 col-sm-12 bottom_gym">
                        <ul>
                            
                        </ul>
                    </div>
                </div>
			<!--<div class="item">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul>
                            <li>
                                <div class="col-lg-3 col-md-3 col-sm-3 no-padd">
                                    <h1 class="yellow_bg">50%</h1>
                                    <p>SMITH</p>
                                </div>
                            </li>
                            <li>
                            	<div class="col-lg-3 col-md-3 col-sm-3 no-padd">
                                    <h1 class="green_bg">55%</h1>
                                    <p>SMITH</p>
                                </div>
                            </li>
                            <li>
                            	<div class="col-lg-3 col-md-3 col-sm-3 no-padd">
                                    <h1 class="red_bg">80%</h1>
                                    <p>JACKOBSON</p>
                                </div>
                            </li>
                            <li>
                            	<div class="col-lg-3 col-md-3 col-sm-3 no-padd">
                                    <h1 class="green_bg">4%</h1>
                                    <p>THOMAS</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>-->
            </div>
     		</div>
            <a href="#myCarousel_gym" data-slide="prev" class="left prev"><i class="fa fa-chevron-left fa-3x"></i></a>
            <a href="#myCarousel_gym" data-slide="next" class="right next"><i class="fa fa-chevron-right fa-3x"></i></a>
        </div>
			
    </div>
    
    <!-- /.container -->
    </section>

  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo ROOT?>js/moment.js"></script>	
   
    <?php require_once('include/footer.php');?>
    <!-- Circleful JavaScript -->
    <script src="js/jquery.circliful.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT?>js/inner.js"></script>	
   <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
	 <script src="https://raw.github.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script> 
    <script>
        <?php if(isset($_REQUEST['rid']) && !empty($_REQUEST['rid'])){?>
        	get_room_percentage_ById('<?php echo $_REQUEST["rid"] ?>');
        <?php }else{?>
        	get_room_percentage();
        <?php }?>

		my_on_deck();
	$( document ).ready(function() {
        $('.myStathalf').circliful();
		$('.myStat').circliful();
		$('.myStathalf2').circliful();
		$('.myStat2').circliful();
		$('.myStat3').circliful();
		$('.myStat4').circliful();
		$('.myStathalf3').circliful();
  		//$('.circular-bg canvas,.circle-text,.circliful').css('width','100%');

		$("#myCarousel,#myCarousel_gym,#myCarousel_10").swiperight(function() {
		 $(this).carousel('prev');
		});
		$("#myCarousel,#myCarousel_gym,#myCarousel_10").swipeleft(function() {
		  $(this).carousel('next');
	   });
		
    })
    $(document).bind("mobileinit", function () {
        // jQuery Mobile's Ajax navigation does not work in all cases (e.g.,
        // when navigating from a mobile to a non-mobile page), especially when going back, hence disabling it.
        $.extend($.mobile, {
            ajaxEnabled: false
        });
    }); 
	$( ".selector" ).button({
disabled: true
});

/*$(document).bind('mobileinit',function(){
      $.mobile.keepNative = "select,input"; 
      //$.mobile.page.prototype.options.keepNative = "select, input"; / jQuery Mobile 1.4 and lower /
 });
 $(document).on("mobileinit", function () {
    $.mobile.ignoreContentEnabled=true;
});*/

</script>
<style>
    .carousel-inner h4{
        color:#FFF;
    }
    
    @media only screen and (min-width: 320px) and (max-width: 767px) {
    .top-blue-common-head #sidebar-wrapper {
    		margin-top: 78px !important;
	}
    }
    
</style>
</body>

</html>
