<h1><img src="<?php echo plugins_url('/images/bedbooking-icon.png', __FILE__); ?>" />&nbsp;Bedbooking</h1>
<div class="error hidden credentials-error"><p><?php _e('Username or password are invalid', bedbooking_Text_Domain); ?></p></div>
<div class="updated  hidden data-save"><p><?php _e('Save successfull', bedbooking_Text_Domain); ?></p></div>

<?php $data = unserialize(get_option(bedbooking_OptionName)); ?>

 

		<div class="wp-bbregister wpbbactive"><center><p><?php _e('Register', bedbooking_Text_Domain); ?></p></center></div>
		<div class="wp-bblogin wpbbunactive"><center><p><?php _e('Login', bedbooking_Text_Domain); ?></p></center></div>
			<div style="clear:both;"><!-- --></div>
		
    <div id="widgets-left">
                        <div class="sidebars-column-1">
                            <div class="widgets-holder-wrap">
                                <div id="primary-widget-area" class="widgets-sortables ui-sortable" style="">
									<br/>
									<p class="txt-info"><?php _e('A new user?', bedbooking_Text_Domain); ?></p>
									<p class="txt-info"><?php _e('Download application and create account', bedbooking_Text_Domain); ?></p><br/>
									<a href="https://play.google.com/store/apps/details?id=com.rst.bedbooking" target="_blank" class="img-left"><img src="<?php echo plugins_url('/images/google-play.png', __FILE__); ?>" /></a><br/>
									<a href="https://itunes.apple.com/US/app/id826280602?mt=8" target="_blank" class="img-left"><img src="<?php echo plugins_url('/images/apple.png', __FILE__); ?>" /></a><br/>
									<a href="https://www.windowsphone.com/pl-pl/store/app/bedbooking/7f2561b5-474a-41bd-9153-08cf963dd39c" target="_blank" class="img-left"><img src="<?php echo plugins_url('/images/windows-store.png', __FILE__); ?>" /></a><br/>
									<br/>
									<p class="txt-info"><?php _e('Do you need help?', bedbooking_Text_Domain); ?></p>
									<a href="mailto:office@bed-booking.com" target="_blank" class="wp-link">office@bed-booking.com</a><br/>
									<a href="http://www.bed-booking.com" target="_blank" class="wp-link">www.bed-booking.com</a>

                                </div>
                                
                                
                            </div>
                        </div>
                    </div>





    <div id="widgets-right" style="display:none;">
                        <div class="sidebars-column-1">
                            <div class="widgets-holder-wrap">
                                <div id="primary-widget-area" class="widgets-sortables ui-sortable" style="">
									<br/>
									<p class="txt-info"><?php _e('You have a registered account?', bedbooking_Text_Domain); ?></p>
									<p class="txt-info"><?php _e('Enter your account details and click Login', bedbooking_Text_Domain); ?></p><br/>
   
                                    <div class="widget-content">
                                        <div style="padding-left:30px; padding-top:5px;">
                                            <p>
                                                <label for="widget-ecccalculator_widget-2-title"><?php _e('Username', bedbooking_Text_Domain); ?>:</label> <br/>
                                                <input class="widefat " id="bedbooking-username" name="" type="text" value="<?php echo $data['username'];?>">
                                            </p>
                                            <p>
                                                <label for="widget-ecccalculator_widget-2-title"><?php _e('Password', bedbooking_Text_Domain); ?>:</label> <br/>
                                                <input class="widefat " id="bedbooking-password" name="" type="password" value="<?php echo $data['password'];?>">
                                            </p>
											
											
											
											<a href="https://panel.bed-booking.com/index/forgot/" target="_blank" class="wp-link" style="margin-left:0px !important;"><?php _e('Forgot your password?', bedbooking_Text_Domain); ?></a>											
							                                
											<!--Banner Places--> 
												<div class="clear save-row">
													<input type="submit" name="savewidget" id="bedbooking-saveall" class="button button-primary widget-control-save left" value="<?php _e('Save', bedbooking_Text_Domain); ?>">
													<span class="spinner" style=""></span>
												</div>				
									
                                            <p class="bedbooking-complete <?php if(!isset($data['username'])) echo 'hidden'; ?>">
                                                <a href="<?php echo admin_url('/widgets.php');?>"/><?php _e('Go to widgets to complete the configuration', bedbooking_Text_Domain); ?></a>
                                            </p>
                                        </div>

                                    </div>
                                </div>
	

									<br/>
									<p class="txt-info"><?php _e('Do you need help?', bedbooking_Text_Domain); ?></p>
									<a href="mailto:office@bed-booking.com" target="_blank" class="wp-link">office@bed-booking.com</a><br/>
									<a href="http://www.bed-booking.com" target="_blank" class="wp-link">www.bed-booking.com</a>
								
                                
                            </div>
                        </div>
                    </div>
    
<!--</div>-->
