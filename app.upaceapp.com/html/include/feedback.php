<div class="overlay overflow_scroll feedback_page" style="display: none">
    <div class="container feed_pop">
        <div class="login-pg signup-pg terms feedback">
            <div class="row">
                <div class="col-lg-12">
                    <h1>FEEDBACK</h1>
                    <a href="javascript:voide(0);" class="cancel close_feedback"><img src="img/cancel.png" alt=""></a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Please leave us your feedback!</h2>
                    <div class="clearfix"></div>
                    <h3>How was your Pilates class?</h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
					<input type="hidden" id="fedd_cid" class="fedd_cid">
					<input type="hidden" id="fedd_sid" class="fedd_sid">
					<input type="hidden" id="fedd_rid" class="fedd_rid">
<!--                    <a class="custom pull-left" href=""><i class="fa fa-star">&nbsp;</i></a>
                    <a class="custom pull-left" href=""><i class="fa fa-star">&nbsp;</i></a>
                    <a class="custom pull-left" href=""><i class="fa fa-star">&nbsp;</i></a>
                    <a class="custom pull-left" href=""><i class="fa fa-star">&nbsp;</i></a>
                    <a class="custom pull-left" href=""><i class="fa fa-star">&nbsp;</i></a>-->
                    <div style="display: inline-block">
                        <input id="star_rate" value="0" type="number" min=0 max=5 step=0.5 data-size="xl" >
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 feedback">
                    <textarea id="feedback_text" name="feedback_text"></textarea>
                </div>
            </div> 
         </div>
     </div>
    <div class="row common_feedback feed_in">
        <input type="button" class="btn" value="SUBMIT FEEDBACK" onclick="save_feedback();">
    </div>
</div>
<link href="<?php echo ROOT; ?>css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="<?php echo ROOT; ?>js/star-rating.js" type="text/javascript"></script>

<script>
    $(function(){
        $("#star_rate").rating({
            showClear:false,
            showCaption:false
        });
        $('.close_feedback').on('click',function(){
            $('.feedback_page').hide('slide',400);
        })
    })
</script>