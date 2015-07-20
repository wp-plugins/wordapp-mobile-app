<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';
?>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content"  style="width: 85%;">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						
						<div class="inside">
							
							

  
  <form method="post" action="options.php">
  <h3>Add your own CSS to your app</h3>
    <?php 

$varCSS = (array)get_option( 'WordApp_css' );
 		settings_fields( 'WordApp_main_css' );	
if($varCSS['css'] == ""){
	
	$varCSS['css'] ="/*********************************/
/* Enter your custom css here */
/*********************************/

body{

}";
}

	  ?>
	  <textarea   id="WordApp_css" name="WordApp_css[css]"><?php echo $varCSS['css']; ?></textarea></p>
   
			
  	
   	<?php submit_button(); ?>

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
			<div id="postbox-container-1" class="postbox-container" style="width: 47%;max-width:400px;">

				<div class="meta-box-sortables">

					<div class="postbox" style="max-height: 749px;">

						<h3><span><?php echo __(
									'Preview my app'
								); ?></span></h3>
<center><small><?php echo __(
									'Clicking deactivated in demo'
								); ?></small></center>
						<div class="inside"> 
							
							
        	
         	<div id="preview">
					
				
				<div class="ios-device ios-device--large ios-device--black iphone-6--large" style="max-width:350px;width: 100%;
  height: 620px">
					<div class="ios-device__screen" ><iframe width="100%" height="100%" src="<?php bloginfo('wpurl'); ?>/?WordApp_demo=1"></iframe></div>
</div>
				<hr><center> <input type="button" class="button button-primary" value="Preview app in mobile browser" id="previewApp" > </center>
				</div>
			<div style="" id="myPreview" style=";">
				<center><h1 style="font-size: 10px;">Preview my app in mobile browser</h1>
				<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo urlencode(get_bloginfo('url')) ?>&choe=UTF-8" title="" />
				<br> Scan this QR code with your mobile phone to view your app in your mobile browser.
					<hr><b>	PLEASE NOTE : You must set <u>mobile site</u> active in settings.</b>
				</center>
			
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
<hr>





						

<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>
</div>	
<style>

.completed {
  color: #49b26f;
  text-decoration: line-through!important;
}
.completedNoLine {
  color: #49b26f!important;

}
	#myPreview{
		
		display: none!important
	}
</style>

 <script type="text/javascript">
        jQuery(document).ready(function() {
            var editor = CodeMirror.fromTextArea(document.getElementById("WordApp_css"), {
                lineNumbers: true,
                mode: "text/css",
                theme: "blackboard"
            });
        })
    </script>
