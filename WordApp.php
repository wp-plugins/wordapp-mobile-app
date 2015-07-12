<?php
/*
  Plugin Name: WordApp - Wordpress to Mobile App for Free
  Plugin URI: http://mobile-rockstar.com/
  Description: Convert your wordpress site/blog in to a mobile app for Free. 
  Version:1.0.1
  Author:Mobile-Rockstar.com
  Author URI: http://mobile-rockstar.com/
  License: GPLv3
  Copyright: Mobile Rockstar
*/
define('APPNAME', 'wordapp-mobile-app');
define('APPNAME_FRIENDLY', 'WordApp');
define('PLUGIN_URL', 'http://mobile-rockstar.com/app/main/app.php');
define('MAINURL', 'admin.php?page=WordApp');
define('DEFAULT_WordApp_THEME', 'wordappjqmobile');

class WordAppClass
{


static private $class = null;


  function __construct()
	{
		// actions
	  
 		$this->WordApp_mobile_detect();
		$this->init();
		add_action('init', array($this, 'init'), 1);
		
		/*- import needed scripts & styles -*/
		wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script('jquery');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('wptuts-upload');
       
        /*- actions & filters -*/
		add_action( 'admin_enqueue_scripts', array($this, 'WordApp_add_color_picker'));
		add_filter( 'json_prepare_post',  array($this, 'api_to_wordapp'), 10, 3 );
		add_action( 'admin_menu',  array($this, 'register_WordApp_menu') );
		add_action( 'admin_init',  array($this, 'WordAppSettingValues') );
		add_action('init', array($this, 'WordApp_produce_my_json'));
	  	
	  	add_action('plugins_loaded', array($this, 'WordApp_mobile_detect'));
	  
		 /*- WP REST API -*/
		//$this->include_wp_rest_api();
	  

  /*-- Theme switch for mobile sites --*/
		
	}
 function init()
  {
   
  }
function WordApp_mobile_detect(){
	  /*-- Theme switch for mobile sites --*/
	
	if ( ! class_exists( 'Mobile_Detect' ) ){
		require plugin_dir_path( __FILE__ ).'third/Mobile_Detect.php';
		$detect = new Mobile_Detect;

		$is_mobile = $detect->isMobile();
			
	}
	$varGA = (array)get_option( 'WordApp_ga' ); 
	
	  		if ( $_GET['WordApp_mobile_site'] === 'desktop' ) {

				setcookie( 'WordApp_mobile_site','desktop', time()+3600*6, '/' );

				$_COOKIE['WordApp_mobile_site'] = 'desktop';

			}
	  		if ( $is_mobile == true && ($_GET['WordApp_mobile_site'] === 'mobile'  || $_GET['WordApp_mobile_site']  =='' )) {

				setcookie( 'WordApp_mobile_site','mobile', time()+3600*6, '/' );

				$_COOKIE['WordApp_mobile_site'] = 'mobile';

			}
	  
			if ( $_GET['WordApp_mobile_app'] === 'app' ) {

				setcookie( 'WordApp_mobile_app',true, time()+3600*6, '/' );

				$_COOKIE['WordApp_mobile_app'] = true;
			}
	 	 if ( $_GET['WordApp_goodbye_mobile'] === '1' ) {

				  setcookie( 'WordApp_mobile_app', true, time()-100, '/' );

				unset( $_COOKIE['WordApp_mobile_app'] );
			}
	
	
  if($_GET['WordApp_demo'] == '1' || ($_COOKIE['WordApp_mobile_site'] == 'mobile' &&  $varGA['mobilesite'] == "on") || $_COOKIE['WordApp_mobile_app'] == true)  {
		add_filter( 'theme_root',array( $this, 'WordApp_change_theme_root' ) );
		add_filter( 'stylesheet_directory_uri', array( $this, 'WordApp_change_theme_root_css_uri' ) );
		add_filter( 'template_directory_uri', array( $this, 'WordApp_change_theme_root_uri' ) );
		add_filter( 'template', array( $this, 'WordApp_fxn_change_theme' ) );
		add_filter( 'stylesheet', array( $this, 'WordApp_fxn_change_theme' ) );
		  show_admin_bar(false);
	  }	
  }
	
function WordApp_change_theme_root()
{
    // Return the new theme root
    return plugin_dir_path( __FILE__ ) . 'themes';
}

function WordApp_change_theme_root_uri()
{ 
     // Return the new theme root uri
     return plugins_url('themes/wordappjqmobile', __FILE__ );
}
	function WordApp_change_theme_root_css_uri()
{ 
     // Return the new theme root uri
     return plugins_url('themes/wordappjqmobile', __FILE__ );
}
	
	
	function WordApp_fxn_change_theme($theme) {

 
    $theme = DEFAULT_WordApp_THEME;
  
  	return $theme;
	}
	
	
	
/* -- On install  -- */
function WordApp_activate() {

	 //file_get_contents("http://mobile-rockstar.com/app/activate.php?user=".get_bloginfo('admin_email')."&url=".urlencode(get_bloginfo('url'))."&longUrl=&format=json");
}

/* ----  Admin Pages ------ */
function WordAppHomepage(){

	include plugin_dir_path( __FILE__ ).'includes/admin/index_page.php';
}
function WordAppBuilder(){

	//echo "hello";
	include plugin_dir_path( __FILE__ ).'includes/admin/home.php';
}
function WordAppPN(){

			include plugin_dir_path( __FILE__ ).'includes/admin/push_notes.php';
}

function WordAppStats(){

	echo "Stats";	
}
function WordAppSettings(){
	
	include plugin_dir_path( __FILE__ ).'includes/admin/settings.php';
}
function WordAppMoreDownloads(){

	include plugin_dir_path( __FILE__ ).'includes/admin/more_downloads.php';
}
function WordAppCrowd(){

		
		include plugin_dir_path( __FILE__ ).'includes/admin/the_crowd.php';
}
function WordAppPluginsAndThemes(){

			include plugin_dir_path( __FILE__ ).'includes/admin/more_downloads.php';
}


/* ----  /Admin Pages ------ */

/*--  JSON RETURN --*/
function WordApp_produce_my_json() {
  if (!empty($_GET['wp_apppp'])) {
    $jsonpost = array();
    	$jsonpost["id"] = "mobileApp";
    	
    	
    	
    	$varColor = (array)get_option( 'WordApp_options' );
    	$varGA = (array)get_option( 'WordApp_ga' ); // Settings page
     	$varMenu = (array)get_option( 'WordApp_menu' );
     	$varStructure = (array)get_option( 'WordApp_structure' );
	  	$varSlideshow = (array)get_option( 'WordApp_slideshow' );
     
    	$jsonpost["name"] = get_bloginfo('name');
    	
    	
     	$jsonpost["title"] 		= $varColor['Title'];
     	$jsonpost["color"]		= $varColor['Color'];
      	$jsonpost["logo"] 		= $varColor['logo'];
      	$jsonpost["style"] 		= $varColor['style'];
        $jsonpost["page_id"]	= $varColor['page_id'];
      	
      	
      	$jsonpost["menu"] 		= $varMenu['menu'];
      	$jsonpost["menuTop"] 	= $varMenu['menuTop'];
      	$jsonpost["menuBottom"] = $varMenu['menuBottom'];
      	$jsonpost["bottom"] 	= $varMenu['bottom'];
      	$jsonpost["side"] 		= $varMenu['side'];
      	$jsonpost["top"] 		= $varMenu['top'];
      	
      	$jsonpost["google"] 	= $varGA['google'];
      	
	  	$jsonpost["slideActive"] 	= $varSlideshow['onoff'];
	  	$jsonpost["slide"][0] 	= $varSlideshow['one'];
	  	$jsonpost["slide"][1]	= $varSlideshow['two'];
	  	$jsonpost["slide"][2]	= $varSlideshow['three'];
	  	$jsonpost["slide"][3]	= $varSlideshow['four'];
	  	$jsonpost["slide"][4]	= $varSlideshow['five'];
	  
	  	$jsonpost["icon"] = $varStructure['icon'];
      	$jsonpost["splash"] 	= $varStructure['splash'];
      	$jsonpost["description"] 		= $varStructure['description'];
      	$jsonpost["cat"] 		= $varStructure['cat'];
	  	$jsonpost["keywords"] 		= $varStructure['keywords'];
      
      //$menuItems = wp_get_nav_menu_items($varMenu['bottom']);
     $menuItems =   wp_get_nav_menu_items(  $varMenu['menuBottom'] );

      
      $jsonpost["bottomIconCount"] =   count($menuItems);
      
      //print_r($menuItems);
        for ($i = 0; $i < count($menuItems); ++$i) {
       $jsonpost["bottomIcon"][$i]  = $varMenu['bottomIcon'][$i];
   		 }
   		 
   		 
    $encoded=json_encode($jsonpost);
    header( 'Content-Type: application/json' );
    echo $encoded;
    exit;
  }
}

/*--  /JSON RETURN-- */


/* -- Registering forms --*/
function WordAppSettingValues(){
//echo "Registering settings";
add_settings_section('WordApp_main', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppColor', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main');
register_setting( 'WordApp_main', 'WordApp_options' );

add_settings_section('WordApp_main_ga', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppGA', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_ga');
register_setting( 'WordApp_main_ga', 'WordApp_ga' );


add_settings_section('WordApp_main_menu', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppMenu', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_menu');
register_setting( 'WordApp_main_menu', 'WordApp_menu' );


add_settings_section('WordApp_main_structure', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppStucutre', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_structure');
register_setting( 'WordApp_main_structure', 'WordApp_structure' );

	
	
add_settings_section('WordApp_main_slideshow', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppSlideshow', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_slideshow');
register_setting( 'WordApp_main_slideshow', 'WordApp_slideshow' );


		
		}
function plugin_section_text() { //TO RENAME
echo '<p>Main description of this section here.</p>';
}

function WordAppColor_display() { //TO RENAME
//$options = get_option('WordAppColor');
//echo "<input id='WordAppColor' name='WordAppColor' size='40' type='text' value='".$options."' />";
} 

function plugin_options_validate($input) { //RENAME
$newinput['text_string'] = trim($input['text_string']);
if(!preg_match('/^[a-z0-9]{32}$/i', $newinput['text_string'])) {
$newinput['text_string'] = '';
}
return $newinput;
}

/* -- /Registering Forms -- */	


/* ----  Admin Menu ------ */


	function register_WordApp_menu(){
		$page_title = "WordApp";
		$menu_title = "WordApp";
		$capability = 1;
		$menu_slug  = "WordApp";
		$function  	= "WordAppHomepage";
		
	
	add_menu_page( __('Getting Started'), $menu_title, $capability, $menu_slug, array($this, $function), plugins_url( APPNAME.'/images/app20x20.png' ), 66 ); 
	
	add_submenu_page( $menu_slug, __('App Builder'), __('App Builder'), $capability, 'WordAppBuilder', array($this, 'WordAppBuilder') );
	
	
	
	add_submenu_page( $menu_slug, __('Push Notifications'), __('Push Notifications'), $capability, 'WordAppPN', array($this, 'WordAppPN') );
	add_submenu_page( $menu_slug, __('Tell a friend'), __('Tell a friend'), $capability, 'WordAppMoreDownloads', array($this, 'WordAppMoreDownloads') );
	// add_submenu_page( $menu_slug, __('Stats'), __('Stats'), $capability, 'WordAppStats', array($this, 'WordAppStats') ); // USING GA until find a better solution
	add_submenu_page( $menu_slug, __('Settings'), __('Settings'), $capability, 'WordAppSettings', array($this, 'WordAppSettings') );
	//add_submenu_page( $menu_slug, __('Plugins & Themes'), __('Plugins & Themes'), $capability, 'WordAppPluginsAndThemes', array($this, 'WordAppPluginsAndThemes') );
	add_submenu_page( $menu_slug, __('The Crowd'), __('The Crowd'), $capability, 'WordAppCrowd', array($this, 'WordAppCrowd') );

	
		
		}
/* ----  /Admin Menu ------ */




/* ---Adding WP REST API --- */
	function api_to_wordapp( $_post, $post, $context ) {

	   
	}

	
	 function include_wordApp_rest_api() {
		
		  
		 
	}


/* -- /Adding WP REST API --- */


/* ------------------
* IMPORT CSS & EXTRA LIBS
------------------- */	


/* -- Color Picker --*/
function WordApp_add_color_picker( $hook ) {
// Make sure to add the wp-color-picker dependecy to js file
    wp_enqueue_script( 'cpa_custom_js', plugins_url( 'js/scripts.js?'.date('YmdHsi').'', __FILE__ ), array( 'jquery', 'wp-color-picker','media-upload','thickbox' ), '', true  );
 	wp_enqueue_script( 'wordapp_custom_js',  plugins_url( 'js/jquery.simplyCountable.js', __FILE__ ), array( 'jquery' ), '', true  );
	wp_enqueue_script( 'wordapp_custom_js',  plugins_url( 'js/jquery.simplyCountable.js', __FILE__ ), array( 'jquery' ), '', true  );
	
	wp_register_style( 'custom_wordapp_admin_css',  plugins_url( 'css/style.css', __FILE__ ), false, '1.0.0' );
    wp_enqueue_style( 'custom_wordapp_admin_css' );
}

function WordApp_options_enqueue_scripts() {
 
}

/* -- /Color Picker --*/


}//END CLASS



/* ----  Widgets ------ */

class WordApp_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function WordApp_widget() {
        parent::WP_Widget(false, $name = 'WordAPP Download our app');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
		 $message2 	= $instance['message2'];
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<ul>
								<li><a href="<?php echo $message; ?>"><img src="<?php echo plugins_url(APPNAME.'/images/widget/applestore_en.png')?>"></a></li>
								<li><a href="<?php echo $message2; ?>"><img src="<?php echo plugins_url(APPNAME.'/images/widget/googleplaystore_en.png')?>"></a></li>
							</ul>
<a href="http://mobile-rockstar.com/download/" style="float:right"><img src="<?php echo plugins_url(APPNAME.'/images/widget/poweredby_en.png')?>"></a>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
		$instance['message2'] = strip_tags($new_instance['message2']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
		 $message2	= esc_attr($instance['message2']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('iTunes Link'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo $message; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message2'); ?>"><?php _e('Play Store Link'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message2'); ?>" name="<?php echo $this->get_field_name('message2'); ?>" type="text" value="<?php echo $message2; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class WordApp_widget


add_action('widgets_init', create_function('', 'return register_widget("WordApp_widget");'));


function WordAppClass()
{
	global $WordAppClass;

	if( !isset($WordAppClass) )
	{
		$WordAppClass = new WordAppClass();
	}

	return $WordAppClass;
}

/* ---- / Widgets ------ */
/*--- Install Hook ----*/
register_activation_hook( __FILE__, array('WordAppClass', 'WordApp_activate') );
	  
// initialize
WordAppClass();
