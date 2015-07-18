<?php 
	$varMenu = (array)get_option( 'WordApp_menu' );
	$data = (array)get_option( 'WordApp_options' );
    	
?>

<div data-role="panel" id="mypanel" data-position-fixed="false" data-display="reveal">
	 <p><img src="<?php echo esc_url($data['logo']) ?>" style="max-width:90%;padding:5px"></p>
	<div id="widget-search" class="widget widget_search"  data-role="">
			
			<?php get_search_form(); ?>
		</div>
	<?php 
if($varMenu['side'] == "on"){
	$menu_items = wp_get_nav_menu_items($varMenu['menu']);

	$menu_list = '<ul data-role="listview"  style="" class="nav-search" >';

	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $title = $menu_item->title;
	    $url = $menu_item->url;
	    $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
	}
	$menu_list .= '</ul>';
 
echo $menu_list;
}
	?>
	<hr>
	<center><a href="http://mobile-rockstar.com" target="_blank" class="poweredBy">Made with <img class="emoji" draggable="false" alt="❤" src="http://s.w.org/images/core/emoji/72x72/2764.png"> using WordApp for wordpress</a>
	</center>
</div>