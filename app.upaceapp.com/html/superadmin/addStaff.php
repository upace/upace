<?php require_once('include/config.php'); ?>
<html lang="en-us">
	<head>
		<?php require_once('include/header.php');?>
	</head>
	
	
	<body class="">

		<!-- HEADER -->
		<?php
				require_once('include/los-header.php');
		?>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<?php
				require_once('include/los-userInfo.php');
			?>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<?php
				require_once('include/los-nav.php');
			?>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your details." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">


<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-bar-chart-o"></i> 
				Staff
			<span>>  
				Add Staff
			</span>
		</h1>
	</div>
	
	
</div>

<!-- widget grid -->
<section id="widget-grid" class="">


	<!-- START ROW -->

	<div class="row">

		

		<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" data-widget-editbutton="false" data-widget-custombutton="false">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
					
					data-widget-colorbutton="false"	
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true" 
					data-widget-sortable="false"
					
				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Add Staff form </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="result-msg"></div>
						<form id="smart-form-register" class="smart-form">
							<header>
								Add Staff
							</header>

							
							<fieldset>
								<div class="row">
                                                                        <section class="col col-6">
                                                                            <label class="select">
                                                                                <select name="university" id="university" onchange="get_gyms(this.value);">
                                                                                            <option value="0" selected="" disabled="">Select University</option>
                                                                                    </select> <i></i> </label>
                                                                        </section>
									<section class="col col-6">
										<label class="select">
											<select name="gym" id="gym">
												<option value="0" selected="" disabled="">Select Gym</option>
											</select> <i></i> </label>
									</section>
								</div>
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="firstname" id="firstname" placeholder="First Name">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="lastname" id="lastname" placeholder="Last Name">
										</label>
									</section>
								</div>
								
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-lg fa-fw  fa-pencil"></i>
											<input type="text" name="title"  id="title"placeholder="Title">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="tel" name="phone" id="phone" placeholder="Phone number" data-mask="(999) 999-9999">
										</label>
									</section>
								</div>	
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
											<input type="email" name="email" id="email" placeholder="E-mail">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-6">
										<label class="radio">
											<input type="radio" name="type" value="staff" checked>
											<i></i>Staff </label>
										<label class="radio">
											<input type="radio" name="type" value="manager" >
											<i></i>Fitness Manager </label>
											
										<label class="radio">
											<input type="radio" name="type" value="instructor" >
											<i></i>Instructor </label>	
									</section>
								</div>
								
							</fieldset>
							<fieldset>
								<section>
									<label class="textarea"> 										
										<textarea name="ckeditor" id="ckeditor" placeholder="Description"  style="height:150px;"></textarea>
									</label>
								</section>
							</fieldset>
							
							<footer>
								<button type="button" id="Submit" class="btn btn-primary">
									Add Staff
								</button>
							</footer>
						</form>						
						
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->
		

		</article>
		<!-- END COL -->		

	</div>

	<!-- END ROW -->

</section>
<!-- end widget grid -->




			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

	

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<?php
		require_once('include/los-shortcut.php');
		?>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<?php require_once('include/footer.php');?>
		
		<?php require_once('include/functions.php');?>
		<!--<script src="<?php echo ROOT;?>js/plugin/ckeditor/ckeditor.js"></script>-->

		

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		/*$(document).ready(function() {
			
			CKEDITOR.replace( 'ckeditor', { height: '380px', startupFocus : true} );
		
		})*/

		</script>
		<script type="text/javascript" src="js/site.js"></script>
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			//getAllGym();
                        /***********
                         * Get All university * 
                         */
                        getAllUniversity();
                        
			pageSetUp();
			var validateError = 0;
					
			var $registerForm = $("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
                                         university : {
						required : true
					},
					firstname : {
						required : true
					},
					lastname : {
						required : true
					},
					email : {
						required : true,
					},
					title : {
						required : true,
					},
					phone : {
						required : true,
					},
					gym : {
						required : true
					}
				},
	
				// Messages for form validation
				messages : {
					 university : {
						required : 'Please select university.'
					},
					title : {
						required : 'Please enter Title'
					},
					firstname : {
						required : 'Please enter First Name'
					},
					lastname : {
						required : 'Please enter Last Name',
					},
					email : {
						required : 'Please enter the Email ',
					},
					phone : {
						required : 'Please enter Phone number',
					},
					gym : {
						required : 'Please Select Gym'
					}
					
				},
				invalidHandler: function(event, validator) {
				    // 'this' refers to the form
				    var errors = validator.numberOfInvalids();
				    if(errors)
					{
						validateError = 1;
					}
					else{
						validateError = 0;
						
					}
				  },
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
			//Code to add location
			$('#Submit').click(function() {
			   if ($('#smart-form-register').valid()) {
				 $('.result-msg').html('');
				 var $form = $(this);
				 var form = $( "form" ).serializeArray();
				// console.log(form);
				document.getElementById('Submit').style.pointerEvents = 'none';
		    		document.getElementById('Submit').style.opacity = '0.50';
				 addStaff(form);
				
						
			   } else {
				  
			   }
		    });
	
			
			


		
		})

		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
				_gaq.push(['_trackPageview']);
			
			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

		</script>

	</body>

</html>
