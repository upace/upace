<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo ROOT;?>js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
                    get_acl();
			if (!window.jQuery) {
				document.write('<script src="<?php echo ROOT;?>js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo ROOT;?>js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo ROOT;?>js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?php echo ROOT;?>js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo ROOT;?>js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo ROOT;?>js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo ROOT;?>js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?php echo ROOT;?>js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?php echo ROOT;?>js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo ROOT;?>js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo ROOT;?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?php echo ROOT;?>js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo ROOT;?>js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo ROOT;?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?php echo ROOT;?>js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo ROOT;?>js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?php echo ROOT;?>js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?php echo ROOT;?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="<?php echo ROOT;?>js/smart-chat-ui/smart.chat.manager.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) -->

		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="<?php echo ROOT;?>js/plugin/flot/jquery.flot.cust.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/flot/jquery.flot.resize.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/flot/jquery.flot.fillbetween.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/flot/jquery.flot.orderBar.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/flot/jquery.flot.pie.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/flot/jquery.flot.time.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/flot/jquery.flot.tooltip.min.js"></script>
                
                <!-- PAGE RELATED PLUGIN(S) -->
		<script src="<?php echo ROOT;?>js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo ROOT;?>js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
                
                <!--         Notifybar       -->
                <script src="<?php echo ROOT;?>js/jquery.notifyBar.js"></script>
                <link href="<?php echo ROOT?>css/notifyBar.css" rel="stylesheet">
                
<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
<script>
$(document).ready(function() {
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var current = Parse.User.current();
	if(current){
	var users = Parse.Object.extend('User');
	var u = new Parse.Query(users);
	u.equalTo('userType', 'user');
	u.equalTo('universityGymId', current.get('universityGymId'));
	u.descending('createdAt');
	u.find({
          success: function(results){
          	for(i in results){
                        var uu = results[i];
                       if(i<3)
                       { 
                         var row='<li><a href="javascript:void(0);">'+uu.get('firstname')+' '+uu.get('lastname')+'</a></li>';
                         $('#recent').append(row);
                       }  
               }         
          }
      });
     }
});
</script>                
                
