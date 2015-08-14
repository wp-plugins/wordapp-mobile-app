<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';
?>

	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'Welcome to ').APPNAME_FRIENDLY; ?></span></h3>

						<div class="inside">
							

<div style="width:100%;height:100%;height: 400px; float: none; clear: both; margin: 2px auto;">
  <embed src="<?php echo $activate->homeVideo; ?>?version=3&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;autoplay=0" wmode="transparent" type="application/x-shockwave-flash" width="100%" height="400px" allowfullscreen="true" title="Adobe Flash Player">
</div>
						<center>	<p><?php echo __('Welcome to ').APPNAME_FRIENDLY.__(', Convert your wordpress site/blog in to a mobile app & mobile site within minutes'); ?></p>
							
						<table style="width:100%;  text-align: center;">
							<tr>
								<td style="width:33%"><img src="<?php echo plugins_url(APPNAME.'/images/target.png'); ?>"><h3><?php echo __('Fast & Reliable');?></h3><?php echo __('Build your mobile app within minutes. It\'s as easy as 1-2-3');?></td>
								<td style="width:33%"><img src="<?php echo plugins_url(APPNAME.'/images/dev.png'); ?>"><h3><?php echo __('No programming skills.');?></h3><?php echo __('No programming skills needed. You don’t need to be a computer wiz-kid to use ').APPNAME;?></td>
								<td style="width:33%"><img src="<?php echo plugins_url(APPNAME.'/images/heart.png'); ?>"><h3><?php echo __('Our Community');?></h3><?php echo __('We started as a bunch of geek and now we have an amazing mobile rockstars community.');?></td>
							</tr>
							</table>
							<h1>Invite your friends and get your android app for FREE!</h1>
									
<input class="button-primary" type="button" name="send"  id="goToWordApp" style="margin: 12px;width: 300px;height: 54px;font-size: 21px;" value="Get started now!">
		
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

						<h3><span><?php echo __(
									'Quick Links'
								); ?></span></h3>

						<div class="inside">
							<p>
							<ul>
								<li><a href="http://mobile-rockstar.com/"><?php echo APPNAME_FRIENDLY ?> <?php echo __('webiste') ?> </a></li>
								<li><a href="https://wordpress.org/support/plugin/wordapp-mobile-app"><?php echo __('Mobile Marketing Community') ?> </a></li>
								<li><a href="http://mobile-rockstar.com/about/"><?php echo APPNAME_FRIENDLY ?> <?php echo __('About Mobile Rockstar') ?> </a></li>
								<li><a href="https://wordpress.org/plugins/wordapp-mobile-app/changelog/"><?php echo APPNAME_FRIENDLY ?> <?php echo __('Changelog') ?> </a></li>
							</ul>
							</p>
				
						</div>
					
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				<div class="postbox" >

						<h3><span><?php echo __(
									'Latest News'
								); ?></span></h3>

						<div class="inside">
							<div style="">
							<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=315852465241124";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
							<div class="fb-page" data-href="https://www.facebook.com/WordAppMobileApp" data-width="275" data-height="600" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/WordAppMobileApp"><a href="https://www.facebook.com/WordAppMobileApp">WordApp</a></blockquote></div></div>
							</div>
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