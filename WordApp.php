<?php
/*
  Plugin Name: WordApp - Wordpress to Mobile App for WooCommerce & BuddyPress
  Plugin URI: http://mobile-rockstar.com/
  Description: Convert your wordpress site/blog to mobile app WooCommerce
  Version:1.8
  Author:Mobile-Rockstar.com
  Author URI: http://mobile-rockstar.com/
  License: GPLv3
  Copyright: Mobile Rockstar
*/
define('APPNAME', 'wordapp-mobile-app');
define('APPNAME_FRIENDLY', 'WordApp');
define('PLUGIN_URL', 'http://mobile-rockstar.com/app/main/app.php');
define('VIMEO_VIDEO', 'WordApp');
define('MAINURL', 'admin.php?page=WordApp');
define('DEFAULT_WordApp_THEME', 'wordappjqmobile');
define( 'WORDAPP_DIR',dirname( __FILE__ ) );


require_once WORDAPP_DIR. '/includes/classes/widgets.php';
require_once WORDAPP_DIR. '/includes/classes/create_json.php';
require_once WORDAPP_DIR. '/includes/classes/front_end_widgets.php';
//require_once WORDAPP_DIR. '/includes/classes/plugins.php';

$widgets = new WordAppClass_widgets;  // include the custom posts and meta boxes
$createJson = new WordAppClass_json; 
//$wordappWidget = new WordApp_widget; 
//$orgPlugins = new WordAppClass_org_plugins;
class WordAppClass
{


static private $class = null;

  function __construct()
	{
		// actions
	  global $widgets,$createJson,$orgPlugins;
 		$this->WordApp_mobile_detect();
		$this->init();
		add_action('init', array($this, 'init'), 1);
		
		/*- import needed scripts & styles -*/
	  
		
       // wp_enqueue_script('wptuts-upload'); 
       
        /*- actions & filters -*/
		add_action( 'admin_enqueue_scripts', array($this, 'WordApp_add_color_picker'));
		add_filter( 'json_prepare_post',  array($this, 'api_to_wordapp'), 10, 3 );
		add_action( 'admin_menu',  array($this, 'register_WordApp_menu') );
		add_action( 'admin_init',  array($this, 'WordAppSettingValues') );
		add_action('init', array($createJson, 'WordApp_produce_my_json'));
	  	add_action('init', array($widgets, 'WordApp_register_widget'));
	  	add_action('plugins_loaded', array($this, 'WordApp_mobile_detect'));
	  add_filter( 'init', array( $this, 'WordApp_change_theme_root' ) );
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
	
	  		if ( isset($_GET['WordApp_mobile_site'])  && $_GET['WordApp_mobile_site'] === 'desktop' ) {

				setcookie( 'WordApp_mobile_site','desktop', time()+3600*6, '/' );

				$_COOKIE['WordApp_mobile_site'] = 'desktop';

			}
	  		if (isset($is_mobile) && $is_mobile == true && ($_GET['WordApp_mobile_site'] === 'mobile'  || $_GET['WordApp_mobile_site']  =='' )) {

				setcookie( 'WordApp_mobile_site','mobile', time()+3600*6, '/' );

				$_COOKIE['WordApp_mobile_site'] = 'mobile';

			}
	  
			if (isset($_GET['WordApp_mobile_app'])  && $_GET['WordApp_mobile_app'] === 'app' ) {

				setcookie( 'WordApp_mobile_app',true, time()+3600*6, '/' );

				$_COOKIE['WordApp_mobile_app'] = true;
			}
	 	 if ( isset($_GET['WordApp_goodbye_mobile'])  &&  $_GET['WordApp_goodbye_mobile'] === '1' ) {

				  setcookie( 'WordApp_mobile_app', true, time()-100, '/' );

				unset( $_COOKIE['WordApp_mobile_app'] );
			}
	
	
  if((isset($_GET['WordApp_demo']) && $_GET['WordApp_demo'] == '1') || ((isset($_COOKIE['WordApp_mobile_site']) && $_COOKIE['WordApp_mobile_site'] == 'mobile') &&  $varGA['mobilesite'] == "on") || (isset($_COOKIE['WordApp_mobile_app']) && $_COOKIE['WordApp_mobile_app'] == true))  {
		add_filter( 'theme_root',array( $this, 'WordApp_change_theme_root' ), 99 );
		add_filter( 'stylesheet_directory_uri', array( $this, 'WordApp_change_theme_root_css_uri' ), 99 );
		add_filter( 'template_directory_uri', array( $this, 'WordApp_change_theme_root_uri' ), 99 );
		add_filter( 'template', array( $this, 'WordApp_fxn_change_theme' ), 99 );
		add_filter( 'stylesheet', array( $this, 'WordApp_fxn_change_theme' ), 99 );
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
	global $orgPlugins;
	include plugin_dir_path( __FILE__ ).'includes/admin/settings.php';
}
function WordAppMoreDownloads(){

	include plugin_dir_path( __FILE__ ).'includes/admin/more_downloads.php';
}
function WordAppCrowd(){

		
		include plugin_dir_path( __FILE__ ).'includes/admin/the_crowd.php';
}

function WordAppPluginsAndThemes(){

			include plugin_dir_path( __FILE__ ).'includes/admin/plugins.php';
}
function WordAppVideos(){

			include plugin_dir_path( __FILE__ ).'includes/admin/videos.php';
}
function WordAppCss(){
 
			include plugin_dir_path( __FILE__ ).'includes/admin/css_editor.php';
}

/* ----  /Admin Pages ------ */



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

	
	
add_settings_section('WordApp_main_css', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppCss', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_css');
register_setting( 'WordApp_main_css', 'WordApp_css' );



		
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
		$capability = 'activate_plugins';
		$menu_slug  = "WordApp";
		$function  	= "WordAppHomepage";
		
	
	add_menu_page( __('Getting Started'), $menu_title, $capability, $menu_slug, array($this, $function), plugins_url( APPNAME.'/images/app20x20.png' ), 66 ); 
	
	add_submenu_page( $menu_slug, __('App Builder'), __('App Builder'), $capability, 'WordAppBuilder', array($this, 'WordAppBuilder') );	
	add_submenu_page( $menu_slug, __('Push Notifications'), __('Push Notifications'), $capability, 'WordAppPN', array($this, 'WordAppPN') );
	// add_submenu_page( $menu_slug, __('Stats'), __('Stats'), $capability, 'WordAppStats', array($this, 'WordAppStats') ); // USING GA until find a better solution
	add_submenu_page( $menu_slug, __('CSS Editor'), __('CSS Editor'), $capability, 'WordAppCss', array($this, 'WordAppCss') );
	
	add_submenu_page( $menu_slug, __('Plugins & Themes'), __('Plugins & Themes'), $capability, 'WordAppPluginsAndThemes', array($this, 'WordAppPluginsAndThemes') );
	add_submenu_page( $menu_slug, __('The Crowd'), __('The Crowd'), $capability, 'WordAppCrowd', array($this, 'WordAppCrowd') );
	add_submenu_page( $menu_slug, __('Tell a friend'), __('Tell a friend'), $capability, 'WordAppMoreDownloads', array($this, 'WordAppMoreDownloads') );
	add_submenu_page( $menu_slug, __('Video Tutorials'), __('Video Tutorials'), $capability, 'WordAppVideos', array($this, 'WordAppVideos') );
	add_submenu_page( $menu_slug, __('Settings'), __('Settings'), $capability, 'WordAppSettings', array($this, 'WordAppSettings') );
	
	
		
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
    
	
    wp_register_script('wordapp_codemirror', plugins_url('codemirror/lib/codemirror.js', __FILE__ ));
    wp_register_style('wordapp_codemirror', plugins_url('codemirror/lib/codemirror.css', __FILE__ ));
 
    wp_register_style('wordapp_cm_blackboard', plugins_url('codemirror/theme/blackboard.css', __FILE__ ));
 
    wp_register_script('wordapp_cm_css', plugins_url('codemirror/css/css.js', __FILE__ ));
 		wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script('jquery');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
	 
	  	wp_enqueue_style( 'wp-color-picker');
 		wp_enqueue_script( 'wp-color-picker');
	wp_enqueue_script('wordapp_codemirror');
    wp_enqueue_style('wordapp_codemirror');
 
    wp_enqueue_style('wordapp_cm_blackboard');
 
    wp_enqueue_script('wordapp_cm_css');
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


function wordapp_register_widgets() {
	register_widget( 'WordApp_widget' );
}

add_action( 'widgets_init', 'wordapp_register_widgets' );


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
