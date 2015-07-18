

<div data-role="panel" id="mypanelRight" data-position-fixed="false" data-position="right" data-display="reveal">
<div  class="widget-area" role="complementary">	<?php
	if ( ! is_active_sidebar( 'wordapp-mobile-sidebar-right' ) ) {
	return;
}
 dynamic_sidebar( 'wordapp-mobile-sidebar-right' ); 
			?>
</div>
</div>
