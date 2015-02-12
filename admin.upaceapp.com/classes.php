
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
        <h3>Classes</h3>
<!--         <h3 class="pull-right">
            <select name="gym" class="gym_select" id="gym">
                <option value="">All Gyms</option>
            </select>
        </h3>-->
        <h3 class="pull-right">
            <span style="cursor:pointer" onClick="$('.listings .list-single').show();">all gyms</span>
        </h3>
      </div>
      <div class="listings" style="padding-bottom:13%;">                                                    
        <div class="list-single-form" style="display: none">
          <h5>Enter a time</h5>
          <span><input type="text" placeholder="Start Time" class="form-control search_text" style="width:80%;float:left;">
          
            <select name="clock_time" class="clock_time" id="" >
                  <option value="am">Am</option>
                  <option value="pm">Pm</option>
              </select>
          
          </span>
        </div>
      </div> 
        <!-- <div class="menu-title">
        
       <div class="pull-right">
          <ul class="options">
              <li ><a href="#" style="background-color: none !important;">&nbsp;</a></li>
            
          </ul>
        </div>
      </div>  -->
        <div class="pos-multiselect" style="display: none;">
          <a class="btn btn-multi close_multiple" role="button" href="javascript:void(0);">
            <i class="fa fa-times-circle-o fa-2x">&nbsp;</i>   
            Multiselect Rows
         </a>
        </div>
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
					<div class="col-lg-10 col-md-10 col-sm-10">
                    <ul class="options2">
                        <li>
						<a href="javascript:void(0);" class="search_link"><img src="../img/icon_clock.png"></a>
						<h3 class="footer-text" style="    color: #fff !important;    margin: 0;    padding: 0;    text-align: center; font-family:'ProximaNova-Semibold'">TIMES</h3>
						</li>
                      <!--  <li><a href="#"><img src="../img/icon_map.png"></a></li>-->
                        <li><a href="javascript:void(0);" class="page-gym-link"><img src="../img/icon_location.png"></a>
						<h3 class="footer-text" style="    color: #fff !important;    margin: 0;    padding: 0;    text-align: center; font-family:'ProximaNova-Semibold'">LOCATIONS</h3></li>
                        <li><a href="/myreservations"><img src="../img/icon_plus.png"></a>
						<h3 class="footer-text" style="    color: #fff !important;    margin: 0;    padding: 0;    text-align: center; font-family:'ProximaNova-Semibold'">RESERVE</h3></li>
                        <li><a href="javascript:void(0);" class="multiselect_btn"><img src="../img/icon_gears.png" class="set_top"></a><h3 class="footer-text" style="    color: #fff !important;    margin: 0;    padding: 0;    text-align: center; font-family:'ProximaNova-Semibold'">SETTINGS</h3></li>
                    </ul>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1"></div>
                </div>
            </div>
        </div>
    </section>
  </section>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo ROOT?>js/moment.js"></script>	
    <script type="text/javascript" src="<?php echo ROOT?>js/inner.js"></script>	
    <script>
        //get_equipments();
        //getAllGym();
        getPopupGym();
        var urlDate;
        <?php if(isset($_GET['dt']) && !empty($_GET['dt']))
        	{
        		?>
        		get_classesByDate('<?php echo $_GET["dt"]?>');
                        urlDate = '<?php echo $_GET["dt"]?>';
        		<?php 
        	}else{?>
        		get_classes();
        <?php	}
        ?>
       // get_classes();
    </script>
   <?php require_once('include/footer.php');?>

</body>
<script>
    var is_multiselect=0;
    $(function(){
	//$('.page-gym1').show(400);
        
        
        $('.cancel-page-gym1').on('click',function(){
            $('.page-gym1').hide(400);
        });
		
        $('.search_link').on('click',function(){
            if($(this).hasClass('active'))
            {
                $(this).removeClass('active')
                $('.list-single-form').hide('400');
            }
            else
            {
                $(this).addClass('active')
                $('.list-single-form').show('400');
            }

            $(".search_text").keyup(function () {
                var filter = $(this).val();
                //alert($('.clock_time').val());
                $(".listings .list-single").each(function () {
                    //alert($(this).find('span').text().search(new RegExp($('.clock_time').val(), "i")));
                    if ($(this).find('span').text().search(new RegExp(filter, "i")) < 0 || $(this).find('span').text().search(new RegExp($('.clock_time').val(), "i")) < 0) {
                        $(this).hide();
                    } else {
                        $(this).show()
                    }
                });
            });
            
            $(".clock_time").on('change',function () {
                var filter = $(this).val();
                //alert($('.clock_time').val());
                $(".listings .list-single").each(function () {
                    //alert($(this).find('span').text().search(new RegExp($('.clock_time').val(), "i")));
                    if ($(this).find('span').text().search(new RegExp(filter, "i")) < 0 || $(this).find('span').text().search(new RegExp($('.search_text').val(), "i")) < 0) {
                        $(this).hide();
                    } else {
                        $(this).show()
                    }
                });
            });

        })
        
        $('.multiselect_btn').on('click',function(){
            if($(this).hasClass('selected'))
            {
                $('.bottom_link_top').hide('slide');
                $('.pos-multiselect').hide('scale',{ percent: 0 },500);
                $(this).removeClass('selected');
				$('.list-single').removeClass('select');
                is_multiselect = 0;
            }
            else
            {
                $('.bottom_link_top').show('slide');
                $(this).addClass('selected');
                $('.pos-multiselect').show('scale',{ percent: 100 },500);
                is_multiselect = 1;
            }
        });
        
        $('.close_multiple').on('click',function(){
            $('.bottom_link_top').hide('slide');
            $('.pos-multiselect').hide('scale',{ percent: 0 },500);
            $('.multiselect_btn').removeClass('selected');
			$('.list-single').removeClass('select');
            is_multiselect = 0;
        });
        
         $('#gym').on('change',function(){
                //alert($(this).val());
                if($(this).val()=='')
                {
                    $('.list-single').show(400);
                }
                else
                {
                    $('.list-single').hide(200);
                    $('.gym-' + $(this).val()).show(200);
                }
            });
            
            $('.btn-reserve').on('click',function(){
            //alert($('.listings .select').length);
            if($('.listings .select').length>0)
            {
                $('.listings .select').each(function(){
                    //console.log($(this).data('equipid'));
                    //console.log($(this).data('id'));
                    //save_res_single(this);
                    save_class_single(this);
                })
                
            }
            else
            {
                showError('Please select minimum one equipment.');
            }
        });
        
        $('.btn-cancel').on('click',function(){
            if($('.listings .select').length>0)
            {
                if(confirm('Are you sure, you want to cancel your selected reservations?'))
                {
                    
                    $('.listings .select').each(function(){
                        //console.log($(this).data('equipid'));
                        //console.log($(this).data('id'));
                        //cancel_res(this);
                        cancel_class_single(this);
                    })
                    
                }
            }
            else
            {
                showError('Please select minimum one equipment.');
            }
        })
        
         $('.page-gym-link').on('click',function(){
            $('.page-gym').show(400);
        })
        
        $('.cancel-page-gym').on('click',function(){
            $('.page-gym').hide(400);
        }) 
		
		
		
		
    })
    
     function view_class(elem)
    {
        if(is_multiselect == 0)
        {
            var slotId=$(elem).data('id');
            if(urlDate)
            {
                window.location='view_class?slot=' + slotId + '&dt=' + urlDate;
            }
            else
            {
                window.location='view_class?slot=' + slotId; 
            }
        }
        else
        {
            if($(elem).hasClass('select'))
            {
                $(elem).removeClass('select');
            }
            else
            {
                $(elem).addClass('select');
            }
        }
    }
    
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
