<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';
?>

	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'The Community ').APPNAME_FRIENDLY; ?></span></h3>

						<div class="inside">
							<h2 style="text-align: center;">
							<?php echo __('Become part of a growing mobile marketing community!'); ?>	
							</h2>	
							<p class="message_invite"><?php echo __('Built in 2015 ').APPNAME_FRIENDLY.__(' was a project by lead by mobile & wordpress geeks. We love mobile and the way apps are improving our lives. This is where we thought we could help. By offering a <b><u>FREE</u></b> wordpress plugin that will convert your site/blog in to a beautiful mobile app. A community of enthusiastic people followed the plugin & encouraged us to share our mobile marketing knowledge in a forum.'); ?></p>
							
							<center>
								<hr>
								
								<table style="width:100%;text-align:center"><tr>
									<td><h3>Help you grow</h3>
										
									
										Here are a few free resources :
										<ul>
											<li><a href="https://www.youtube.com/channel/UCmUo6cRgYfXJhSDLoX3Rueg">Mobile Marketing Videos</a></li>
											<li><a href="https://www.youtube.com/channel/UCmUo6cRgYfXJhSDLoX3Rueg">Mobile Marketing Facebook Group</a></li>
											<li><a href="https://www.youtube.com/channel/UCmUo6cRgYfXJhSDLoX3Rueg">Mobile Marketing Videos</a></li>
												
											</td></tr><tr>
									<td><h3>Help us grow</h3>
									
										<p class="message_invite">Thanks to the amazing support of our friends, family & followers we are really proud of WordApp.
										
										<br / >
										If you believe in WordApp the are many ways you can get invovled :
										<ul>
											<li>Tell your friends & family</li>
											<li>Share the love on Facebook & Twitter</li>
											<li>Write a plugin or theme for the marketplace</li>
											<li>Make a donation</li>
										</ul>
										<center><u><b>- Thanks for all your help -</b></u></center>
										</p>
										
										<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="4F5HBJR699H8J">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

									</td>
									</tr>
								</table>
							<input class="button-primary" id="goCommunity" type="button" name="send"  style="margin: 12px;width: 300px;height: 54px;font-size: 21px;" value=" - Join the free community ! - ">
							</center>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">


						<div class="inside">
							<p>
							 <?php include plugin_dir_path( __FILE__ ).'more_info.php'; ?>
							</p>
						</div>
					
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>

<style>
	.message_invite{
		font-family: "Open Sans","lucida grande","Segoe UI",arial,verdana,"lucida sans unicode",tahoma,sans-serif;
  		font-size: 13px;
  		color: #3d464d;
  		font-weight: normal;
		text-align: center;
	}

	</style>