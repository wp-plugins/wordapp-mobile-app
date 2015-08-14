<?php
class WordAppClass_mobile_plugin   {
	
	 /* Registering the Widgets */
	public function __construct() {

	}

	
	function wordapp_comstom_posts() {
				add_theme_support( 'post-thumbnails' );
				register_post_type( 'wordapp_plugins', array(
				  'labels' => array(
					'name' => 'Active Plugins',
					'singular_name' => 'Plugin',
					'add_new_item' => 'Add new mobile plugin',
					'all_items ' => 'My mobile plugins',
					'name_admin_bar' => 'Mobile Plugins'
				   ), 
					'show_in_admin_bar' => false,
					'exclude_from_search' => true,
					'description' => 'Active Mobile app plugins',
					'public' => true,
					'show_in_menu' => 'WordApp',
					'supports' => array( 'title'), 
					'capability_type'     => 'post',
					
        'capabilities' => array(
            'create_posts' => true,
			'map_meta_cap'        => true,
			'delete_posts' => true,
        )
				));
	}
	

 function wordapp_addCustomImportButton()
{
    global $current_screen;

    // Not our post type, exit earlier
    // You can remove this if condition if you don't have any specific post type to restrict to. 
    if ('wordapp_plugins' != $current_screen->post_type) {
        return;
    }

    ?>
        <script type="text/javascript">
            jQuery(document).ready( function($)
            {
                jQuery(jQuery(".add-new-h2")[0]).html("Add New Plugin");
				jQuery(jQuery(".add-new-h2")[0]).attr("href","admin.php?page=WordAppPluginsAndThemes");
            });
        </script>
    <?php
}	
}//END
	
?>