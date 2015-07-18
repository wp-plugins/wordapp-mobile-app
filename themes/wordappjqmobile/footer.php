<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordAppjqmobile
 */

?>
<div  class="widget-area" role="complementary">	<?php
	
 dynamic_sidebar( 'wordapp-mobile-sidebar-footer' ); 
			?>
</div>
			</div>
			
	

<?php
$varMenu = (array)get_option( 'WordApp_menu' );

  if($varMenu['menuBottom'] !== "" && $varMenu['bottom'] == "on" ) {
 echo '<div data-role="footer" data-position="fixed"  data-tap-toggle="false"><div data-role="navbar" data-iconpos="top"><ul>';
	
		$menu_items = wp_get_nav_menu_items($varMenu['menuBottom']);

	$i =0;
	foreach ( (array) $menu_items as $key => $menu_item ) {
   
		
		if($menu_item->object == "custom"){
        	$thedddURL = $menu_item->url;
        	$target = 'rel="external" target="_blank"';
       }
       	else{
       		$thedddURL = $menu_item->url;
       		$target = "";
       }
		 
       ?>
       
       <li data-filtertext="wai-aria voiceover accessibility screen reader">
							<a class="bottomBar" href="<?php echo $thedddURL; ?>" <?php echo $target; ?> data-icon="<?php echo $varMenu['bottomIcon'][$i]; ?>"><?php echo $menu_item->title; ?></a>
						</li>
     <?php
		   $i++;
    }
    echo "</ul></div></div>";
    }
   ?>
   


			<?php wp_footer(); 

$data = (array)get_option( 'WordApp_options' );
    	?>
		</div>


<style>

.ui-bar-a, .ui-page-theme-a .ui-bar-inherit, html .ui-bar-a .ui-bar-inherit, html .ui-body-a .ui-bar-inherit, html body .ui-group-theme-a .ui-bar-inherit {
  background-color: <?php echo $data['Color']; ?>;
  border-color: #ddd;
  color: #333;
  text-shadow: 0 1px 0 #eee;
  font-weight: 700;
  color: $txtColor!important;
}
/* Get rid of the annoying outer circle on listview alt links */
.ui-li-link-alt span.ui-btn-corner-all {
  border-style: hidden;
  -webkit-box-shadow: none;
  /* Additional browser-specific box-shadow CSS should go here */
  background: transparent;
  }
.topBtn {
  background-color: transparent!important;
  border-color: #ddd;
  color: #333;
  text-shadow: 0 1px 0 #f3f3f3border-width: 0px;
  border-width: 0px!important;
  }
  img{
  max-width:100%;
  }
  .bottomBar{
    background-color: <?php echo $data['Color']; ?>!important;
 	color: white!important;
  	text-shadow: 0 0px 0 #f3f3f3!important;
  }
  .topText{
  color: white!important;
  	text-shadow: 0 0px 0 #f3f3f3!important;
  }
  
.ui-content {
  border-width: 0;
  overflow: visible;
  overflow-x: hidden;
  padding: 0.3em;
}
</style>
<?php
if($_GET['WordApp_demo'] == '1' && $_GET['WordApp_demo_dave'] !== "1"){
	?>
<script>
jQuery(document).ready(function(){
	
	/* DISABLE ALL CLICKS FOR DEMO */ 
	
	$('a').on('click.myDisable', function() { return false; });
	
	/* DISABLE ALL CLICKS FOR DEMO */ 
	
});
</script>

<?php
	
}
?>
</body>
</html>

