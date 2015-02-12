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
            <?php include('include/feedback.php'); ?>
    <!-- Page Content -->
    <div class="container">
    	<div class="poweryoga">
        	<div class="col-lg-10 col-md-10 col-sm-10 equip-div">
            	<h1></h1>
                <h3 class="gym_class"></h3>
                <h3 class="gym_time"></h3>
                <h3 class="yellow_text"><span></span> Spots</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsa</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
            	<a href="<?php echo ROOT; ?>classes"><img alt="" src="img/cancel.png"></a>
              <a href="javascript:void(0);" onClick="$('.feedback_page').show('slide',400);">
              <img alt="" src="img/icc2n.png"></a>
              <a href=""><img alt="" src="img/icc1n.png"></a>
            </div>
        </div>
	<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <a href="javascript:void(0);" role="button" class="btn common_cancl_btn margin_minus cancel_res" style="display:none;" onClick="delete_class_res()">CANCEL RESERVATION</a>
                <a href="javascript:void(0);" role="button" class="btn common_cancl_btn margin_minus save_res" onClick="save_class_res()" style="display:none;">SAVE RESERVATION</a>
            </div>
        </div>
        <input type="hidden" name="class_id" id="class_id">
        <input type="hidden" name="slot" id="slot">
        <input type="hidden" name="occupId" id="occupId">
        <div class="poweryoga text-center">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<h1>Today | <?php echo date('M Y'); ?></h1>
          </div>
        </div>
      
       
      <div id="myCarousel" class="top-next-blue carousel slide" data-ride="carousel" data-interval="false">
        <div class="calender carousel-inner">
             <?php 
            $j=0;
            $k=0;
            $day = date('d');
            $last_day = date('t');
            for ($i=0;$i<$last_day;$i++)
            { 
                $d=$i + 1;
                $temp_date=date("m/$d/Y");
                if($j==0)
                { ?>
                    <div class="item<?php echo ((($i)<=$day) && ((($i)+7)>=$day))?' active':' '.$i.' '.$k; ?>">
                    <?php
                } ?>
                        <a href="#" class="<?php echo (date('d')==$d)?'active':''; ?>">
                                <b><?php echo $d; ?><span><?php echo date('D',  strtotime($temp_date)); ?></b></span>
                        </a>
                    
                 <?php
                  $j++;
                 if($j==7 || $i==($last_day-1))
                 { ?>
                    </div>
                    <?php  
                    $j=0;
                    $k++;
                 }
                
            } ?>
        </div>
<!--        <a href="#myCarousel" data-slide="prev" class="left prev"><i class="fa fa-chevron-left fa-3x"></i></a>
        <a href="#myCarousel" data-slide="next" class="right next"><i class="fa fa-chevron-right fa-3x"></i></a>-->
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
    <script>
        get_class_slot('<?php echo $_REQUEST['slot']; ?>');
        
        function show_slot(slotId)
        {
           
             window.location='view_equipment?slot=' + slotId;   
        }
    </script>
    
 
</body>

</html>
