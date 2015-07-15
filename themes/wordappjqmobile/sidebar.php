

<div data-role="panel" id="mypanelRight" data-position-fixed="false" data-position="right" data-display="reveal">
	<?php
$widgets = get_option('sidebars_widgets');

foreach ($widgets as $widget => $widget_val) {
	if($widget == 'wp_inactive_widgets' || $widget ==  'array_version'){
		
	}else{
		
		echo '<div id="sidebar-'.$widget.'" class="sidebar">';
	if (dynamic_sidebar($widget)) { } else {
	echo '<div class="pre-widget">
		
	</div>';
	}
		echo "</div>";
	}
			//echo $widget."".$widget_id;
}
			?>

</div>
