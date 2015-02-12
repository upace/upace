<div class="overlay overflow_scroll search_overlay">
    	<div class="container">
        	<div class="login-pg signup-pg terms settings">
            	<div class="row">
                	<div class="col-lg-12">
        				<h1>SETTINGS</h1>
                        <a href="javascript:void(0);" onclick="show_settings('hide')" class="cancel"><img src="img/cancel.png" alt=""></a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    	<input type="button" class="btn btn-block setting_btn" value="Profile">
                        <div class="col-lg-12 col-md-12 col-sm-12 set_con">
                            <input type="text" name="firstname" id="firstname" placeholder="First Name">
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name">
                            <input type="email" id="settings_email" name="settings_email" placeholder="Email">
                            <select name="settings_gym" id="settings_gym">
<!--                                <option value="">Select University</option>-->
                            </select>
                            <!-- <input type="text" placeholder="Rutgear University">
                            <input type="text" placeholder="Member Type">
                            <input type="text" placeholder="Male / Female">-->
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    	<input type="button" class="btn btn-block setting_btn" value="Password">
                        <div class="col-lg-12 col-md-12 col-sm-12 set_con">
<!--                        	<input type="password" name="old_password" id="old_password" placeholder="Old Password">
                       -->
                        	<input type="password" name="new_password" id="new_password" placeholder="New Password">
                        
                        	<input type="password" name="retype_password" id="retype_password" placeholder="Retype Password">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    	<input type="button" class="btn btn-block setting_btn" value="Terms & Privacy Policy">
                        <div class="col-lg-12 col-md-12 col-sm-12 set_con">
                            <textarea disabled >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    	<input type="button" class="btn btn-block setting_btn" value="Nofications">
                        <div class="set_con">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <p class="fnt_30">Class Reminder</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                      <p>
                                        <input id="class_noti" name="class_noti" class="noti_switch" type="checkbox">
                                      </p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <p class="fnt_30">Daily Exercise Reminder</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                      <p>
                                        <input id="daily_exercise" class="noti_switch" type="checkbox">
                                      </p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <p class="fnt_30">General Notifications</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                      <p>
                                        <input id="general_noti" class="noti_switch" type="checkbox">
                                      </p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <p class="fnt_30">Send to me via email</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                      <p>
                                        <input id="via_email" class="noti_switch" type="checkbox">
                                      </p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <p class="fnt_30">Send to me via text</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                      <p>
                                        <input id="via_text" class="noti_switch" type="checkbox">
                                      </p>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    	<input type="button" class="btn btn-block setting_btn" value="Support">
                        <div class="col-lg-12 col-md-12 col-sm-12 set_con">
                        	<p class="support">Need Assistance? <br> Contact us at <br><span>info@upaceapp.com</span></p>
                        </div>
                    </div>
                </div>
                
                	<div class="row">
                		<div class="col-lg-12 col-md-12 col-sm-12">
                        	<input type="button" class="save_butn" value="SAVE" onclick="update_setting()">
                    		<input type="button" class="signup" value="LOGOUT" onclick="window.location='<?php echo ROOT; ?>logout'">
                        </div>
                    </div>
                </div>
              	</div>
           	</div>
<script src="<?php echo ROOT; ?>js/main.js"></script>
<script src="<?php echo ROOT; ?>js/settings.js"></script>
<script>
    get_profile_details();
    $(function(){
        $('.setting_btn').on('click',function(){
            $(this).parent().find('.set_con').slideToggle('400');
        })
    })
</script>
<style>
    #settings_gym
    {
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
        border: medium none;
        color: #fff;
        font-size: 30px;
        height: auto;
        margin-bottom: 10px;
        padding: 10px;
        width: 100%;
    }
    .set_con
    {
        display:none;
    }
</style>
