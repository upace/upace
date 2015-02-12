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
    
</head>

<body>
	<section class="reservation-bg">
             <?php require_once('include/settings.php');?>
    <!-- Page Content -->
    <div class="container">
      <?php require_once('include/inner_header.php');?>
      <div class="menu-title">
        <h3>Equipment</h3>
        <h3 class="pull-right">
            <select name="gym" class="gym_select" id="gym">
                <option value="">All Gyms</option>
            </select>
        </h3>
       
<!--        <div class="pull-right">
          <ul class="options">
            <li><a href="#"><i class="fa fa-align-left fa-4x"></i></a></li>
            <li><a href="#"><i class="fa fa-sitemap fa-4x"></i></a></li>
            <li><a href="javascript:void(0);" class="search_link" ><i class="fa fa-clock-o fa-4x"></i></a></li>
            <li><a href="#"><i class="fa fa-map-marker fa-4x"></i></a></li>
            <li><a href="#"><i class="fa fa-cogs fa-4x"></i></a></li>
          </ul>
        </div>-->
      </div>
      <div class="listings" style="padding-bottom:13%;">                                                    
        <div class="list-single-form" style="display: none">
          <h5>Enter a time</h5>
          <span><input type="text" placeholder="Start Time" class="form-control search_text"></span>
        </div>
      </div>
<!--      <div class="menu-title">
        
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
<!--    <section class="bottom_link">
     <div class="container">
            <div class="row">
              <ul class="options2">
                <li><a href="#"><i class="fa fa-align-left fa-4x"></i></a></li>
                <li><a href="#" class="search_link"><i class="fa fa-clock-o fa-4x"></i></a></li>
                <li><a href="#" class="selected"><i class="fa fa-sitemap fa-4x"></i></a></li>
                <li><a href="#"><i class="fa fa-map-marker fa-4x"></i></a></li>
                <li><a href="javascript:void(0);" class="multiselect_btn"><i class="fa fa-cogs fa-4x"></i></a></li>
              </ul>
            </div>
        </div>
    </section>-->
    <section class="bottom_link">
        <div class="row bottom_link_top" style="display: none;">
            <a href="javascript:void(0);" role="button" class="btn btn-reserve pull-left">RESERVE ALL</a>
            <a href="javascript:void(0);" role="button" class="btn btn-cancel pull-right">CANCEL ALL</a>
        </div>
        <div class="row bottom_link_bottom">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="options2">
                        <li><a href="#"><i class="fa fa-align-left fa-4x"></i></a></li>
                        <li><a href="#" class="search_link"><i class="fa fa-clock-o fa-4x"></i></a></li>
                        <li><a href="#" class="selected"><i class="fa fa-sitemap fa-4x"></i></a></li>
                        <li><a href="#"><i class="fa fa-map-marker fa-4x"></i></a></li>
                        <li><a href="javascript:void(0);" class="multiselect_btn"><i class="fa fa-cogs fa-4x"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
  <!-- /.container -->
  </section>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo ROOT?>js/moment.js"></script>	
    <script type="text/javascript" src="<?php echo ROOT?>js/inner.js"></script>	
    <script>
        getAllGym();
        //get_equipments();
        var urlDate;
        <?php if(isset($_GET['dt']) && !empty($_GET['dt']))
        	{
        		?>
        		get_equipmentsByDate('<?php echo $_GET["dt"]?>');
                        
                        urlDate = '<?php echo $_GET["dt"]?>';
        		<?php 
        	}else{?>
        		get_equipments();
        <?php	}
        ?>
    </script>
   <?php require_once('include/footer.php');?>

</body>
<script>
    var is_multiselect = 0;
    $(function(){
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
                //alert(filter);
                $(".listings .list-single").each(function () {
                    if ($(this).find('span').text().search(new RegExp(filter, "i")) < 0) {
                        $(this).hide();
                    } else {
                        $(this).show()
                    }
                });
            });
        });
        
        $('.multiselect_btn').on('click',function(){
            if($(this).hasClass('selected'))
            {
                $('.bottom_link_top').hide('slide');
                $('.pos-multiselect').hide('scale',{ percent: 0 },500);
                $(this).removeClass('selected');
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
                    save_res_single(this);
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
                        cancel_res(this);
                    })
                    
                }
            }
            else
            {
                showError('Please select minimum one equipment.');
            }
        })
    });
    
    function view_equip(elem)
    {
        if(is_multiselect == 0)
        {
            var slotId=$(elem).data('id');
            if(urlDate)
            {
                window.location='view_equipment?slot=' + slotId + '&dt=' + urlDate; 
                
            }
            else
            {
                window.location='view_equipment?slot=' + slotId;
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
    .gym_select
    {
        
    }
</style>
</html>
