<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->
<?php require_once('include/config.php');?>
<script type="text/javascript" src="<?php echo ROOT?>js/parse-1.2.12.min.js"></script>	
<head>

    <?php require_once('include/header.php');?>
   <?php require_once('include/check_login.php');?>
</head>

<body>
	<section class="reservation-bg">
	<div class="overlay share_popup" style="display:none;">
          <div class="container">
               <div class="login-pg signup-pg terms">
                    <div class="row">
                         <div class="col-lg-12">
                              <h1>SHARE <a class="cancel" href="javascript:void(0);" onclick="$('.share_popup').hide(400);"><img alt="" src="img/cancel.png"></a></h1>
                              <h5>Share this class</h5>
                              <div class="wall">
                                <h2></h2>
                                <p class="rm1"></p>
                                <p class="dt1"></p>
                              </div>
                         </div>
                    </div>
                    <div class="row" style="text-align:center;margin-top:30px;">
						<!-- <div class="col-lg-12" style="width:250px;margin:0px auto;float:none;"> 
                            
						
							
								<a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url=http%3A%2F%2Fserver3-upace.vm-host.net&pubid=ra-54ae7c7c01ba1c3b&ct=1&title=Upace&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"/></a>
								<a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url=http%3A%2F%2Fserver3-upace.vm-host.net&pubid=ra-54ae7c7c01ba1c3b&ct=1&title=Upace&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
								<a href="https://api.addthis.com/oexchange/0.8/forward/pinterest/offer?url=http%3A%2F%2Fserver3-upace.vm-host.net&pubid=ra-54ae7c7c01ba1c3b&ct=1&title=Upace&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/pinterest.png" border="0" alt="Pinterest"/></a>
								<a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=http%3A%2F%2Fserver3-upace.vm-host.net&pubid=ra-54ae7c7c01ba1c3b&ct=1&title=Upace&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0" alt="Twitter"/></a>
								<a href="https://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url=http%3A%2F%2Fserver3-upace.vm-host.net&pubid=ra-54ae7c7c01ba1c3b&ct=1&title=Upace&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/linkedin.png" border="0" alt="LinkedIn"/></a>

							
                         </div> -->
                         <div class="col-lg-12"> 
                            <div class="custom">
                              <a href="javascript:void(0);" onclick="send_mail_to();"><img src="../img/ic1.png" alt=""/></a>
                              <a href="javascript:void(0);" onclick="facebook_share();"><img src="../img/ic2.png" alt=""/></a>
                              <!-- <a href=""><img src="../img/ic3.png" alt=""/></a> -->
                              <a  href="javascript:void(0);" onclick="twShare();"><img src="../img/ic4.png" alt=""/></a>
                              <a href="javascript:void(0);" onclick="lnShare()"><img src="../img/ic5.png" alt=""/></a>
                              <a href="javascript:void(0);" onclick="google_share();"><img src="../img/ic6.png" alt=""/></a>
                            </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
            <?php include('include/feedback.php'); ?>
    <!-- Page Content -->
    <div class="container">
    	<div class="poweryoga">
        	<div class="col-lg-10 col-md-10 col-sm-10 equip-div">
            	<h1></h1>
                <h3 class="gym_class"></h3>
                <h3 class="gym_time"></h3>
                <h3 class="yellow_text"><span></span> Spots</h3>
                <p></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 rererico">
            	<img alt="" src="img/close_sign.png" onclick="window.location='<?php echo ROOT; ?>classes'">
<!--              <a href="javascript:void(0);" onClick="$('.feedback_page').show('slide',400);">
              <img alt="Favourite" src="img/icc2n.png"></a>
              <a href="javascript:void(0);" onClick="fav_class()">
              </a>-->
              <img alt="Favourite" class ='add_to_fav' src="img/new_fab.png" height='50' style='display: none;cursor:pointer' onclick='fav_class()'>
              <img alt="Favourite" class ='fav_added' src="img/new_yellow_fab.png" height='50' style='display: none;cursor:pointer;' onclick='remove_fav()'>
              <!--<a href=""><img alt="" src="img/icc1n.png"></a>-->
              <img alt="" class="sicon" src="img/new_share.png" onclick="$('.share_popup').show(400);" height="50" style="display:none">
            </div>
            <div class="clearfix"></div>
			<div class="col-lg-12 col-md-12 col-sm-12">
                <a href="javascript:void(0);" role="button" class="btn common_cancl_btn margin_minus cancel_res" style="display:none;" onClick="delete_class_res()">CANCEL RESERVATION</a>
                <a href="javascript:void(0);" role="button" class="btn common_cancl_btn margin_minus save_res" onClick="save_class_res()" style="display:none;">SAVE RESERVATION</a>
				<a href="javascript:void(0);" role="button" class="btn common_cancl_btn margin_minus notify_res" onclick="notify_class_res()" style="display:none;">NOTIFY ME IF AVAILABLE</a> 
            </div>
			
			<div class="poweryoga text-center">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h1>Today | <?php echo date('M Y'); ?></h1>
			  </div>
			</div>
        </div>
		
            
        
        <input type="hidden" name="class_id" id="class_id">
        <input type="hidden" name="slot" id="slot">
        <input type="hidden" name="occupId" id="occupId">
        <input type="hidden" id="rootUrl" value="<?php echo ROOT; ?>">
      
       
      <div id="myCarousel" class="top-next-blue carousel slide" data-ride="carousel" data-interval="false">
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
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?slot=<?php echo $_GET['slot']; ?>&dt=<?php echo $temp_date;?>" class="<?php echo ($day==$d)?'active':''; ?>">
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
                
            } ?>
        </div>
       <a href="#myCarousel" data-slide="prev" class="left prev"><i class="fa fa-chevron-left fa-3x"></i></a>
        <a href="#myCarousel" data-slide="next" class="right next"><i class="fa fa-chevron-right fa-3x"></i></a>
      </div>
      
      
      <div class="menu-title">
        <h3>Reservation<span></span></h3>
<!--        <div class="pull-right">
          <ul class="options">
            <li><a href="#"><i class="fa fa-plus fa-4x"></i></a></li>
            <li><a href="#"><i class="fa fa-map-marker fa-4x"></i></a></li>
            <li><a href="#"><i class="fa fa-cogs fa-4x"></i></a></li>
          </ul>
        </div>-->
      </div>
      <div class="listings">
        <div class="list-single list-singley current_res" >
          <h3>Current Reservation</h3>
<!--          <h4>12:35-1:35pm</h4>-->
        </div>
      
        <div class="list-single list-singley other_slot">
          <h3>Other available times</h3>
<!--          <h4>12:35-1:35pm</h4>-->
        </div>
<!--        <div>
            <div class="pos-btns-one">
              <a class="btn btn-reserve margin_minus" role="button" href="">Save RESERVation</a>
            </div>
        </div>  -->
      </div>
    </div>
  <!-- /.container -->
  </section>
    <?php include('include/footer.php'); ?>
    <script type="text/javascript" src="<?php echo ROOT?>js/moment.js"></script>	
    <script type="text/javascript" src="<?php echo ROOT?>js/inner.js"></script>	
	<div id="fb-root"></div>
<script src="//connect.facebook.net/en_US/all.js"></script>
    <script>
        get_class_slot('<?php echo $_REQUEST['slot']; ?>');
       var user = Parse.User.current();
       
        function show_slot(slotId)
        {
            dt = getParameterByName('dt');
            if(dt)
            {
                window.location='view_equipment?slot=' + slotId + "&dt=" +dt; 
            }
            else
            {
                window.location='view_equipment?slot=' + slotId; 
            }  
        }
        function fav_class()
        {
            
            var r = Parse.Object('User');
            r.id = user.id;
            if(user.get('fav_class'))
            {
                r.set("fav_class", "," + $('#class_id').val());
            }
            else
            {
                r.set("fav_class", $('#class_id').val());
            }
            if(r.save())
            {
                showSuccess('Added to favorite.');
                $('.add_to_fav').hide();
                $('.fav_added').show();
            }
            else
            {
                showError('Try agin later.');
            }
        }
        function remove_fav()
        {
            if(confirm('Are you sure you want to remove from favorite?'))
            {
                var userAgain = Parse.Object.extend("User");
                var UA = new Parse.Query(userAgain);
                UA.equalTo("objectId",user.id);
                UA.first({
                    success:function(curUser){
                        var r = Parse.Object('User');
                        r.id = user.id;
                        isFav=curUser.get('fav_class');
                        if(isFav)
                        {
                            r.set("fav_class", isFav.replace($('#class_id').val(),''));
                        }

                        if(r.save())
                        {
                            showSuccess('Removed from favorite.');
                            $('.add_to_fav').show();
                            $('.fav_added').hide();
                        }
                        else
                        {
                            showError('Try agin later.');
                        }
                    }
                });
            }
        }

		/************* Page details *****************/
		/*var url = '<?php echo $_SERVER['SERVER_NAME'];?>';
		var title = $('.share_popup .wall h2').html();
		var descr = $('.share_popup .wall .rm1').html() + " | " + $('.share_popup .wall .dt1').html();
		var image = '<?php echo $_SERVER['SERVER_NAME'];?>/img/g_logo.png';
		var winWidth = 520;
		var winHeight = 350;*/
		/******************* Twitter Share ******************/
		function twShare() {
			var url = '<?php echo $_SERVER['SERVER_NAME'];?>';
			var title = $('.share_popup .wall h2').html();
			//var descr = $('.share_popup .wall .rm1').html() + " | " + $('.share_popup .wall .dt1').html();
			var datetime = $('.share_popup .wall .dt1').html();
			var descr = 'Just signed up for ' + title + '  on ' + datetime.replace('|' , '@')+ ' through @upaceapp. Sign up to come: www.upaceapp.com';
			var image = '<?php echo $_SERVER['SERVER_NAME'];?>/img/g_logo.png';
			var winWidth = 520;
			var winHeight = 350;
			var winTop = (screen.height / 2) - (winHeight / 2);
			var winLeft = (screen.width / 2) - (winWidth / 2);
			window.open('//twitter.com/share?url=' + encodeURI(url) + '&text=' + encodeURI(descr ), 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
		}


		/*********** Linked In Share ***********************/
		function lnShare() {
			var url = '<?php echo $_SERVER['SERVER_NAME'];?>';
			var title = $('.share_popup .wall h2').html();
			var datetime =  $('.share_popup .wall .dt1').html();
			var descr = 'Just signed up for ' + title + ' on ' + datetime.replace('|' , '@') + '. Sign up to join me: www.upaceapp.com'
			var image = '<?php echo $_SERVER['SERVER_NAME'];?>/img/g_logo.png';
			var winWidth = 520;
			var winHeight = 350;
			var articleUrl = encodeURIComponent(url);
			var articleTitle = encodeURIComponent(title);
			var articleSummary = encodeURIComponent(descr);
			var articleSource = encodeURIComponent('upace');
			var goto = '//www.linkedin.com/shareArticle?mini=true'+
					'&url='+
					'&summary='+articleSummary+
					'&source='+articleSource;
			window.open(goto, "LinkedIn", "width=800,height=400,scrollbars=no;resizable=no");       
		}

		/************ Facebook Share *******************/
		function facebook_share()
		{
				var url = '<?php echo $_SERVER['SERVER_NAME'];?>';
				var title = $('.share_popup .wall h2').html();
				var datetime = $('.share_popup .wall .dt1').html();
				var descr = 'Just signed up for ' + title + ' on ' + datetime.replace('|' , '@') + '. Sign up to join me: www.upaceapp.com'
				var image = '<?php echo $_SERVER['SERVER_NAME'];?>/img/g_logo.png';
				var winWidth = 520;
				var winHeight = 350;
				FB.init({
				appId:'513297188812943',
				cookie:true,
				status:true,
				xfbml:true
				});
				FB.ui(
				{
				method: 'feed',
				name: 'upace',
				link: url,
				picture: image,
				description: descr
				},
				function(response){
				  if (response && response.post_id) {
				  } else {
				  }
				})
		}

		/**************** Googleplus Share ********************/
		function google_share()
		{
			var url = '<?php echo $_SERVER['SERVER_NAME'];?>';
			var title = $('.share_popup .wall h2').html();
			var datetime = $('.share_popup .wall .rm1').html() + " | " + $('.share_popup .wall .dt1').html();
			var descr = 'Just signed up for ' + title + ' on ' + datetime.replace('|' , '@') + '. Sign up to join me: www.upaceapp.com'
			var image = '<?php echo $_SERVER['SERVER_NAME'];?>/img/g_logo.png';
			var winWidth = 520;
			var winHeight = 350;
			window.open('https://plus.google.com/share?url=' + url,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;
		}

		function send_mail_to()
		{

			var url = '<?php echo $_SERVER['SERVER_NAME'];?>';
			var title = $('.share_popup .wall h2').html();
			var datetime =  $('.share_popup .wall .dt1').html();
			var descr = 'Just signed up for ' + title + ' on ' + datetime.replace('|' , '@') + '. Sign up to join me: www.upaceapp.com';
			var image = '<?php echo $_SERVER['SERVER_NAME'];?>/img/g_logo.png';
			var winWidth = 520;
			var winHeight = 350;
			Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    
			console.log(currentUser.get('email'));
			var email = currentUser.get('email');
			//var v="mailto:xyz@something.com?subject=" +  descr;
			var v="mailto:"+email+"?subject=Upace Reservation Reminder&body="+descr;
			

			 document.location =v ;
			 
		}
    </script>
    
 
</body>

</html>
