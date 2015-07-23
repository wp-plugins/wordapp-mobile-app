<?php

class WordAppClass_json  {
	
	 /*--  JSON RETURN --*/
 public function __construct() {
		
	}
   
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
}