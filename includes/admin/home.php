<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar.php';
?>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content"  style="width: 85%;">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						
						<div class="inside">
							
							

  
  <form method="post" action="options.php">
    <?php  
    		$varColor = (array)get_option( 'WordApp_options' );
 			
       		$varMenu = (array)get_option( 'WordApp_menu' );
 			
        	$varStructure = (array)get_option( 'WordApp_structure' );
 			
        	$varSlideshow = (array)get_option( 'WordApp_slideshow' );
 			


	  ?>
  	
  	<?php
  	if( $active_tab == ""){
  	settings_fields( 'WordApp_main' );
		
		
			if(!isset($varColor['Title'])) $varColor['Title']='';
			if(!isset($varColor['Color'])) $varColor['Color']='';
			if(!isset($varColor['logo'])) $varColor['logo']='';
			if(!isset($varColor['style'])) $varColor['style']='';
		
			if(!isset($varColor['page_id'])) $varColor['page_id']='';
		
  	?>
	  <h3>Colors   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Top & bottom bar colors</span>	</h3>
				
	<hr>
	<p>  	<label for="WordApp_options[Color]"><?php echo __('App Color' ); ?></label>
 	<input type="text" id="WordAppColor_Color" name="WordApp_options[Color]"  class="cpa-color-picker" value="<?php echo $varColor['Color']; ?>"/></p>
	
	  <h3>Top toolbar configuration</h3>
	  <span style="float:right" class="spanHelp"></span>				
	<hr> 
	  <p> 	<label for="WordApp_options[Title]"><?php echo __('App Name' ); ?></label>
   	<input type="text" id="WordAppColor_Title" name="WordApp_options[Title]" value="<?php echo $varColor['Title']; ?>"/></p>
   
   	<p> 	<label for="WordApp_options[logo]"><?php echo __('App Logo' ); ?></label>
  <input type="text" id="WordAppColor_logo" name="WordApp_options[logo]" value="<?php echo esc_url(  $varColor['logo'] ); ?>" />
        <input id="upload_logo_button" type="button" class="button" value="<?php echo __( 'Upload Logo' ); ?>" />
        <br />
        <?php
        if($varColor['logo'] == ""){
        $img_url = plugins_url(APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varColor['logo'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;" alt="" id="logo_url" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 
         <h3>Content style   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> How the content is displayed on the homepage</span>	</h3>
				
	<hr>
          <p>
        <label for="WordApp_options[style]"><?php echo __('Post list style' ); ?></label>
       <div style="left: 150px;top: -70px;position: relative;">
			<input type="radio" name="WordApp_options[style]" id="listStyle" value="list" <?php echo ($varColor['logo'] == 'list' ? 'checked' : '')?>><?php echo __('List of posts'); ?><br>
			
			 <p id="pageInfoList" style="<?php echo ($varColor['style'] !== 'list' ? 'display:none' : '')?>">
       				  
		   </p>
		   
		   
		   	<input type="radio" name="WordApp_options[style]" id="tilesStyle" value="tiles" <?php echo ($varColor['style'] == 'tiles' ? 'checked' : '')?>><?php echo __('Large Tiles'); ?><br>
		   
			 <p id="pageInfoTiles" style="<?php echo ($varColor['style'] !== 'tiles' ? 'display:none' : '')?>">
       				  
		   </p>
			</div>
		    <label for="WordApp_options[style]"><?php echo __('Redirect to page :' ); ?></label>
		   <div style="left: 150px;top: -50px;position: relative;">
		   	<input type="radio" name="WordApp_options[style]" id="pageStyle" value="page" <?php echo ($varColor['style'] == 'page' ? 'checked' : '')?>><?php echo __('A page'); ?>
       
        <p id="pageInfo" style="<?php echo ($varColor['style'] !== 'page' ? 'display:none' : '')?>">
        <?php 
        
        if($varColor['page_id'] == ""){
        $varColor['page_id'] = 0;
        }
        $args = array(
    'depth'                 => 0,
    'child_of'              => 0,
    'selected'              => $varColor['page_id'],
    'echo'                  => 1,
    'name'                  => 'WordApp_options[page_id]',
    'id'                    => null, // string
    'show_option_none'      => __('Select a page'), // string
    'show_option_no_change' => null, // string
    'option_none_value'     => null, // string
);
        
        wp_dropdown_pages( $args );
         ?> 
        </p>
       	</div> </p>
        
        <?php
        }
        else if( $active_tab == "step2"){
        settings_fields( 'WordApp_main_menu' );
			
			
		
			if(!isset($varMenu['side'])) $varMenu['side']='';
			if(!isset($varMenu['top'])) $varMenu['top']='';
			if(!isset($varMenu['menu'])) $varMenu['menu']='';
			if(!isset($varMenu['menuTop'])) $varMenu['menuTop']='';
			if(!isset($varMenu['bottom'])) $varMenu['bottom']='';
			if(!isset($varMenu['menuBottom'])) $varMenu['menuBottom']='';
			if(!isset($varMenu['menuTop'])) $varMenu['menuTop']='';
       ?>
					 <h3>Side Menu 	</h3>
	<hr>
       <p>
		   <label for="WordApp_menu[side]"><?php echo __('Side Menus' ); ?></label>
        
         <input type="radio" name="WordApp_menu[side]" id="sideBarOff" value="" <?php echo ($varMenu['side'] == '' ? 'checked' : '')?>><?php echo __('off'); ?> 
		<input type="radio" name="WordApp_menu[side]" id="sideBarOn" value="on" <?php echo ($varMenu['side'] == 'on' ? 'checked' : '')?>><?php echo __('on'); ?>
       
        </p><p id="sideInfo" style="left: 156px;top: -21px;position: relative;<?php echo ($varMenu['side'] !== 'on' ? 'display:none' : '')?>">
       <?php 
    WordApp_nav_menu_drop_down( 'WordApp_menu[menu]', $varMenu['menu']);    
		?> <img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="18px"  height="18px">Choose a <a href="nav-menus.php">menu</a> to attach to this navigation bar
        </p>
					 <h3>Side Menu 	</h3>
	<hr>
         <p>
			  <label for="WordApp_menu[top]"><?php echo __('Top Menus' ); ?></label>
      
        <input type="radio" name="WordApp_menu[top]" id="topBarOff" value="" <?php echo ($varMenu['top'] == '' ? 'checked' : '')?>><?php echo __('off'); ?> 
		<input type="radio" name="WordApp_menu[top]" id="topBarOn" value="on" <?php echo ($varMenu['top'] == 'on' ? 'checked' : '')?>><?php echo __('on'); ?>
         </p><p id="topInfo" style="left: 156px;top: -21px;position: relative;<?php echo ($varMenu['top'] !== 'on' ? 'display:none' : '')?>">
       <?php 
    WordApp_nav_menu_drop_down( 'WordApp_menu[menuTop]', $varMenu['menuTop']);    
		?> <img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="18px"  height="18px">Choose a <a href="nav-menus.php">menu</a> to attach to this navigation bar
        </p>
					 <h3>Bottom Navigation   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px">Activate & choice of icons</span>	</h3>
	<hr>
         <p>
			  <label for="WordApp_menu[bottom]"><?php echo __('Bottom Menus' ); ?></label>
      
        <input type="radio" name="WordApp_menu[bottom]" id="bottomBarOff" value="" <?php echo ($varMenu['bottom'] == '' ? 'checked' : '')?>><?php echo __('off'); ?> 
		<input type="radio" name="WordApp_menu[bottom]" id="bottomBarOn" value="on" <?php echo ($varMenu['bottom'] == 'on' ? 'checked' : '')?>><?php echo __('on'); ?>
         </p><div id="bottomInfo" style="left: 156px;top: -21px;position: relative;<?php echo ($varMenu['bottom'] !== 'on' ? 'display:none' : '')?>">
       <?php 
    WordApp_nav_menu_drop_down( 'WordApp_menu[menuBottom]', $varMenu['menuBottom']);    
					?> <img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="18px"  height="18px">Choose a <a href="nav-menus.php">menu</a> to attach to this navigation bar <br> Save to update icons</span>
		<br / >
		
		<ul style="position: relative;top: 0px;left: 50px;">
		
		<?php
						
			
   
			
			
						
	if(!isset($menu_item)) $menu_item='';
	//if(!isset($menu_items)) $menu_items='';
	//if(!isset($menu_item->title)) $menu_item->title='';
	if(!isset($title)) $title='';
						
						
						
						
						
	$menu_items = wp_get_nav_menu_items($varMenu['menuBottom']);

			
	$i =0;
	foreach ($menu_items as $key => $menu_item ) {
   	
		if(!isset($varMenu['bottomIcon'][$i])) $varMenu['bottomIcon'][$i]='';
			if(!isset($varMenu['bottomIcon'][$i]) && $varMenu['bottomIcon'][$i] !="") $varMenu['bottomIcon'][$i]='';
			
		echo "<li><span>";
    		if(isset($menu_item->title)  && $menu_item->title !=''){
					echo $menu_item->title;
			}
		echo "</span>";
    		// echo $varMenu['bottomIcon'][$i];
     ?>
     
		<select name="WordApp_menu[bottomIcon][<?php echo $i; ?>]">
		<?php echo listOfIcons($varMenu['bottomIcon'][$i]); ?>
		</select><br></li>
		<?php
   $i++;
	}
			
					?></ul>
		
		<input style="position: relative;float: right;top: -223px;right: 210px;" id="jqIcons" type="button" class="button" value="<?php echo __( 'Preview Icons' ); ?>" />
        </div>
        <?php
        }else if($active_tab == "step3"){
			
			
			if(!isset($varStructure['icon'])) $varStructure['icon']='';
			if(!isset($varStructure['splash'])) $varStructure['splash']='';
			if(!isset($varStructure['description'])) $varStructure['description']='';
			if(!isset($varStructure['keywords'])) $varStructure['keywords']='';
			if(!isset($varStructure['cat'])) $varStructure['cat']='';
			
        settings_fields( 'WordApp_main_structure' );
       
        ?>
			
			
			<h3>App Icon   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Icon size must be 512px x 512px</span>	</h3>
				
	<hr>
         	<p> 	<label for="WordApp_structure[icon]"><?php echo __('App Icon' ); ?></label>
 		 <input type="text" id="WordAppColor_icon" name="WordApp_structure[icon]" value="<?php echo esc_url(  $varStructure['icon'] ); ?>" />
        <input id="upload_logo_button_icon" type="button" class="button" value="<?php echo __( 'Upload Icon' ); ?>" />
        <br />
        <?php
        if($varStructure['icon'] == ""){
        $img_url = plugins_url(APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varStructure['icon'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;" alt="" id="icon_url" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 
        <h3>App Splash Screen   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Splash size must be 640px x 1136px</span>	</h3>
				
	<hr>
        <p> 	<label for="WordApp_options[splash]"><?php echo __('App Splash' ); ?></label>
  		<input type="text" id="WordAppColor_splash" name="WordApp_structure[splash]" value="<?php echo esc_url(  $varStructure['splash'] ); ?>" />
        <input id="upload_logo_button_splash" type="button" class="button" value="<?php echo __( 'Upload Splash' ); ?>" />
        <br />
        <?php
        if($varStructure['splash'] == ""){
        $img_url = plugins_url(APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varStructure['splash'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;" alt="" id="splash_url" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 
 <h3><?php echo  __('App Meta'); ?>  <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Info used in the app store listings</span></h3>
	  <span style="float:right" class="spanHelp"></span>				
	<hr> 
	  <p> 	<label for="WordApp_structure[description]"><?php echo __('App Description' ); ?></label>
   	<textarea style="width:60%"  id="WordApp_structure[description]" name="WordApp_structure[description]"><?php echo $varStructure['description']; ?></textarea></p>
   
			
		
	  <p> 	<label for="WordApp_structure[keywords]"><?php echo __('App Keywords' ); ?></label>
   	<textarea style="width:60%"  id="WordApp_structure[keywords]" name="WordApp_structure[keywords]"><?php echo $varStructure['keywords']; ?></textarea></p>
   
		<p> 	<label for="WordApp_structure[cat]"><?php echo __('App Category' ); ?></label>
			
			
			<select class="gwt-ListBox"  name="WordApp_structure[cat]">
				<option value="">Select a category</option>
				
				<option value="<?php echo $varStructure['cat']; ?>" selected><?php echo $varStructure['cat']; ?></option>
				<option value="BOOKS_AND_REFERENCE">Books &amp; Reference</option>
				<option value="BUSINESS">Business</option>
				<option value="COMICS">Comics</option>
				<option value="COMMUNICATION">Communication</option>
				<option value="EDUCATION">Education</option>
				<option value="ENTERTAINMENT">Entertainment</option>
				<option value="FINANCE">Finance</option>
				<option value="HEALTH_AND_FITNESS">Health &amp; Fitness</option>
				<option value="LIBRARIES_AND_DEMO">Libraries &amp; Demo</option>
				<option value="LIFESTYLE">Lifestyle</option>
				<option value="MEDIA_AND_VIDEO">Media &amp; Video</option>
				<option value="MEDICAL">Medical</option>
				<option value="MUSIC_AND_AUDIO">Music &amp; Audio</option>
				<option value="NEWS_AND_MAGAZINES">News &amp; Magazines</option>
				<option value="PERSONALIZATION">Personalisation</option>
				<option value="PHOTOGRAPHY">Photography</option>
				<option value="PRODUCTIVITY">Productivity</option>
				<option value="SHOPPING">Shopping</option>
				<option value="SOCIAL">Social</option>
				<option value="SPORTS">Sports</option>
				<option value="TOOLS">Tools</option>
				<option value="TRANSPORTATION">Transport</option>
				<option value="TRAVEL_AND_LOCAL">Travel &amp; Local</option>
				<option value="WEATHER">Weather</option>
			</select>
			</p>
        <?php
        
		}
else if($active_tab == "slideshow"){
        settings_fields( 'WordApp_main_slideshow' );
       
	if(!isset($varSlideshow['onoff'])) $varSlideshow['onoff']='';
	if(!isset($varSlideshow['one'])) $varSlideshow['one']='';
	if(!isset($varSlideshow['two'])) $varSlideshow['two']='';
	if(!isset($varSlideshow['three'])) $varSlideshow['three']='';
	if(!isset($varSlideshow['four'])) $varSlideshow['four']='';
	if(!isset($varSlideshow['five'])) $varSlideshow['five']='';
        ?>
			 <p>
			  <label for="WordApp_menu[top]"><?php echo __('Activate the slideshow ?' ); ?></label>
      
			 <input type="radio" name="WordApp_slideshow[onoff]" id="bottomSlideOff" value="" <?php echo ($varSlideshow['onoff'] == '' ? 'checked' : '')?>><?php echo __('off'); ?> 
		<input type="radio" name="WordApp_slideshow[onoff]" id="bottomSlideOn" value="on" <?php echo ($varSlideshow['onoff'] == 'on' ? 'checked' : '')?>><?php echo __('on'); ?>			
</p>
			<h3>Slide #1  <span style="float:right" class="spanHelp"> 
       <img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Landscape photos work the best</span>	</h3>
					
			<hr>
         	<p> 	<label for="WordApp_slideshow[one]"><?php echo __('Slide Image #1' ); ?></label>
 		 <input type="text" id="WordApp_slideshow_1" name="WordApp_slideshow[one]" value="<?php echo esc_url(  $varSlideshow['one'] ); ?>" />
        <input id="upload_slideshow_one" type="button" class="button" value="<?php echo __( 'Upload Image' ); ?>" />
        <br />
        <?php
        if( $varSlideshow['one'] == ""){
        $img_url = plugins_url(APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varSlideshow['one'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;" alt="" id="icon_urlss_one" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 



		<h3>Slide #2   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Landscape photos work the best</span>	</h3>
				
		<hr>
        <p> 	<label for="WordApp_slideshow[tow]"><?php echo __('Slide Image #2' ); ?></label>
 		<input type="text" id="WordApp_slideshow_2" name="WordApp_slideshow[two]" value="<?php echo esc_url(  $varSlideshow['two'] ); ?>" />
        <input id="upload_slideshow_two" type="button" class="button" value="<?php echo __( 'Upload Image' ); ?>" />
        <br />
        <?php
        if( $varSlideshow['two'] == ""){
        $img_url = plugins_url(APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varSlideshow['two'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;" alt="" id="icon_urlss_two" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 


		<h3>Slide #3   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Landscape photos work the best</span>	</h3>
				
		<hr>
        <p> 	<label for="WordApp_slideshow[three]"><?php echo __('Slide Image #3' ); ?></label>
 		<input type="text" id="WordApp_slideshow_3" name="WordApp_slideshow[three]" value="<?php echo esc_url(  $varSlideshow['three'] ); ?>" />
        <input id="upload_slideshow_three" type="button" class="button" value="<?php echo __( 'Upload Image' ); ?>" />
        <br />
        <?php
        if( $varSlideshow['three'] == ""){
        $img_url = plugins_url(APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varSlideshow['three'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;" alt="" id="icon_urlss_three" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 

		<h3>Slide #4   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Landscape photos work the best</span>	</h3>
				
		<hr>
        <p> 	<label for="WordApp_slideshow[four]"><?php echo __('Slide Image #4' ); ?></label>
 		<input type="text" id="WordApp_slideshow_4" name="WordApp_slideshow[four]" value="<?php echo esc_url(  $varSlideshow['four'] ); ?>" />
        <input id="upload_slideshow_four" type="button" class="button" value="<?php echo __( 'Upload Image' ); ?>" />
        <br />
        <?php
        if( $varSlideshow['four'] == ""){
        $img_url = plugins_url(APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varSlideshow['four'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;" alt="" id="icon_urlss_four" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 
        
        <h3>Slide #5   <span style="float:right" class="spanHelp"><img src="<?php echo plugins_url(APPNAME.'/images/help.png')?>" style="vertical-align: middle;" width="24px"  height="24px"> Landscape photos work the best</span>	</h3>
				
		<hr>
        <p> 	<label for="WordApp_slideshow[five]"><?php echo __('Slide Image #5' ); ?></label>
 		<input type="text" id="WordApp_slideshow_5" name="WordApp_slideshow[five]" value="<?php echo esc_url(  $varSlideshow['five'] ); ?>" />
        <input id="upload_slideshow_five" type="button" class="button" value="<?php echo __( 'Upload Image' ); ?>" />
        <br />
        <?php
        if( $varSlideshow['five'] == ""){
        $img_url = plugins_url(APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varSlideshow['five'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;" alt="" id="icon_urlss_five" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 




        <?php
        
		}
else if($active_tab == "step4"){
			
	if(!isset($varColor['Title'])) $varColor['Title']='';
	if(!isset($varStructure['description'])) $varStructure['description']='';
	if(!isset($varStructure['cat'])) $varStructure['cat']='';
	if(!isset($varStructure['icon'])) $varStructure['icon']='';
	if(!isset($varStructure['splash'])) $varStructure['splash']='';
	if(!isset($varStructure['certificate'])) $varStructure['certificate']='';
	
			?><center>
<h1><?php echo __('This is where it gets complicated!');?></h1>
<h2><?php echo __('but that is why we are here, right?');?></h2>
<h2><?php echo __('Watch this short video to see how it works.');?></h2>
<div style="width:100%;height:100%;height: 400px; float: none; clear: both; margin: 2px auto;">
  <embed src="<?php echo $activate->pubVideo; ?>?version=3&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;autoplay=0" wmode="transparent" type="application/x-shockwave-flash" width="100%" height="400px" allowfullscreen="true" title="Adobe Flash Player">
</div>							
<h2><?php echo __('Get your first month for free !');?></h2>



<p><strong><?php echo __('Check List');?></strong></p>
<table class="widefat">
	
	
	
	
	
	<?php 
	$u = '';
	if($varColor['Title'] ==""){
		$tickOnOff = "tickOn.png";
		$completed = "";
		$completedNoLine = "";
		$completedTxt = "";
	} else {
		$tickOnOff = "tick.png";
		$completed = "completed";
		$completedNoLine = "completedNoLine";
		$completedTxt = "Completed";
		$u++;
	}
	?>
	<tr>
		<td><img src="<?php echo plugins_url(APPNAME.'/images/'.$tickOnOff); ?>"></td>
		<td><a href="admin.php?page=WordAppBuilder&tab=" class="<?php echo $completed ?>"><?php echo __( 'Give your app a title' ); ?></a></td>
		<td class="<?php echo $completedNoLine ?>"><?php echo __( $completedTxt ); ?></td>
	</tr>
	
	<?php 
	if($varStructure['description'] ==""){
		$tickOnOff = "tickOn.png";
		$completed = "";
		$completedNoLine = "";
		$completedTxt = "";
	} else {
		$tickOnOff = "tick.png";
		$completed = "completed";
		$completedNoLine = "completedNoLine";
		$completedTxt = "Completed";
		$u++;
	}
	?>
	<tr>
		<td><img src="<?php echo plugins_url(APPNAME.'/images/'.$tickOnOff); ?>"></td>
		<td><a href="admin.php?page=WordAppBuilder&tab=step3" class="<?php echo $completed ?>"><?php echo __( 'Write a description about your app' ); ?></a></td>
		<td class="<?php echo $completedNoLine ?>"><?php echo __( $completedTxt ); ?></td>
	</tr>
	
		<?php 
	if($varStructure['cat'] ==""){
		$tickOnOff = "tickOn.png";
		$completed = "";
		$completedNoLine = "";
		$completedTxt = "";
	} else {
		$tickOnOff = "tick.png";
		$completed = "completed";
		$completedNoLine = "completedNoLine";
		$completedTxt = "Completed";
		$u++;
	}
	?>
	<tr>
		<td><img src="<?php echo plugins_url(APPNAME.'/images/'.$tickOnOff); ?>"></td>
		<td><a href="admin.php?page=WordAppBuilder&tab=step3" class="<?php echo $completed ?>"><?php echo __( 'Choose an app category' ); ?></a></td>
		<td class="<?php echo $completedNoLine ?>"><?php echo __( $completedTxt ); ?></td>
	</tr>
	
	
		<?php 
	if($varStructure['icon'] ==""){
		$tickOnOff = "tickOn.png";
		$completed = "";
		$completedNoLine = "";
		$completedTxt = "";
	} else {
		$tickOnOff = "tick.png";
		$completed = "completed";
		$completedNoLine = "completedNoLine";
		$completedTxt = "Completed";
		$u++;
	}
	?>
	<tr>
		<td><img src="<?php echo plugins_url(APPNAME.'/images/'.$tickOnOff); ?>"></td>
		<td><a href="admin.php?page=WordAppBuilder&tab=step3" class="<?php echo $completed ?>"><?php echo __( 'Upload app icon' ); ?></a></td>
		<td class="<?php echo $completedNoLine ?>"><?php echo __( $completedTxt ); ?></td>
	</tr>
	
	
	
	
		<?php 
	if($varStructure['splash'] ==""){
		$tickOnOff = "tickOn.png";
		$completed = "";
		$completedNoLine = "";
		$completedTxt = "";
	} else {
		$tickOnOff = "tick.png";
		$completed = "completed";
		$completedNoLine = "completedNoLine";
		$completedTxt = "Completed";
		$u++;
	}
	?>
	<tr>
		<td><img src="<?php echo plugins_url(APPNAME.'/images/'.$tickOnOff); ?>"></td>
		<td><a href="admin.php?page=WordAppBuilder&tab=step3" class="<?php echo $completed ?>"><?php echo __( 'Upload app splash screen' ); ?></a></td>
		<td class="<?php echo $completedNoLine ?>"><?php echo __( $completedTxt ); ?></td>
	</tr>
	
	
	
	
	
		<?php 
	if($varStructure['certificate'] ==""){
		$tickOnOff = "tickOn.png";
		$completed = "";
		$completedNoLine = "";
		$completedTxt = "";
	} else {
		$tickOnOff = "tick.png";
		$completed = "completed";
		$completedNoLine = "completedNoLine";
		$completedTxt = "Completed";
		$u++;
	}
	
	
	?>
	<tr>
		<td><img src="<?php echo plugins_url(APPNAME.'/images/'.$tickOnOff); ?>"></td>
		<td><a href="#" class="<?php echo $completed ?>"><?php echo __( 'Upload PEM certificates for apple' ); ?></a>
		<br> Requested via email after publishing</td>
		<td class="<?php echo $completedNoLine ?>"><?php echo __( $completedTxt ); ?> <font color="orange"><?php echo __('Optional') ?></font></td>
	</tr>
</table>



<?php
		
		
		
	if($u >= 5){
		?>
<h3>To which email address would you like us to send your app ?</h3><br>
	<input type="text" name="email" id="email" style="width: 400px;text-align: center;height: 50px;margin: 11px;font-size: 20px;" placeholder="Your email address" value="<?php echo get_bloginfo('admin_email') ?>"><br>
								<input type="hidden" name="url" id="url" value="<?php echo get_bloginfo('url') ?>">
								
								<input type="hidden" name="user" id="user" placeholder="Your Name" value="<?php echo get_bloginfo('name') ?>">
							
		<?php /*	
								
<table class="widefat" width="30%" style="  width: 36%;">
	<thead>
	<tr>
		<th class="row-title"><?php echo __( 'Publish Your App' ); ?></th>

	</tr>
	</thead>
	<tbody>
		<tr class="alternate">
		<td class="row-title"><?php echo __( 'App on iOS & Android' ); ?></td>
	
	</tr>
	<tr>
		<td class="row-title"><?php echo __( 'Unlimited push notifications' ); ?></td>
		
	</tr>
	<tr class="alternate">
		<td class="row-title"><?php echo __( 'Schedule push notes (July)' ); ?></td>
	
	</tr>
	<tr>
		<td class="row-title"><?php echo __( 'HTML Rich windows' ); ?></td>
		
	</tr>
		<tr class="alternate">
		<td class="row-title"><?php echo __( 'Unlimited Downloads' ); ?></td>
	
	</tr>
	<tr>
		<td class="row-title"><?php echo __( 'We will upload your app for you'); ?></td>
		
	</tr>
	</tbody>
	<tfoot>
	<tr>
		<th class="row-title" style="color:green"><center><?php echo __( 'Only $9.99 USD per month' ); ?></center></th>
	
	</tr>
		<tr>
		<th class="row-title" style="color:green"><center><?php echo __( 'First Month on android for free!' ); ?></center></th>
	
	</tr>
	</tfoot>
</table>
				*/ 
if($activate->download =='UNLIMITED'){
			echo '<h3 style="color:red;background-color:yellow;">Your android app is now free!<br /> Hit publish below!<br />';
			echo'	<input type="hidden" name="download" id="download"  value="">';
			echo'	<input class="button-primary" type="button" name="send"  id="submitPub" style="margin: 12px;width: 300px;height: 54px;font-size: 21px;" value="Publish Android App!"></h3>';

		}else{
			echo '<h3 style="color:red;background-color:yellow;">Invite some friends & get your app for free</h3>';
			echo '<h4><a href="admin.php?page=WordAppMoreDownloads">Get your app for free!</a></h4>';
			echo'	<input type="hidden" name="download" id="download"  value="0">';
			echo'	<hr>Or Pay $19.99 per month for our premium service.<br />';
			echo'	<input class="button-primary" type="button" name="send"  id="pushNoteSend" style="margin: 12px;width: 300px;height: 54px;font-size: 21px;" value="Upgrage to Premium">';

		}
?>				<input type="hidden" name="url" id="url"  value="<?php echo get_bloginfo('url') ?>">
							
<?php 
			if($activate->download =='0') { 
			// echo '<hr> Your first month for free (Android App + Web App)! <br /><input value="Use my credits" id="submitPub"  type="button" class="button button-primary" name="publish">'; 
	   echo '<h4><a href="admin.php?page=WordAppMoreDownloads">Get your app for free!</a></h4>';
											}
		
			
			/* <input value="Publish my app!" id="submitPub"  type="button" class="button button-primary" name="publish"> */
?><h4>Note: During the free priod your iOS app will <i>not</i> be published.</h4>
	   <?php
	}
			
		} // END Step 4
        ?></center>
<?php if($active_tab == "step4"){
			
		}else{
?>
   <center>
   	<?php submit_button(); ?>
<?php }
?> 
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
<?php
/* --- Create selector --- */

function WordApp_nav_menu_drop_down( $name, $selected = '', $print = TRUE )
{
    // array of menu objects
    $menus = wp_get_nav_menus();
    $out   = '';

    // No menu found.
    if ( empty ( $menus ) or is_a( $menus, 'WP_Error' )  )
    {
        // Give some feedback …
        $out .= __( 'There are no menus.' );

        // … and make it usable …
        if ( current_user_can( 'edit_theme_options' ) )
        {
            $out .= sprintf(
                __( ' <a href="%s">Create one</a>.' ),
                admin_url( 'nav-menus.php' )
            );
        }
        // … and stop.
        $print and print $out;
        return $out;
    }
if(!isset($title)) $title='';
	if(!isset($active)) $active='';
    // Set name and ID to let you use a <label for='id_$name'>
    $out = "<select name='$name' id='id_$name'>\n";
  $out .= "\t<option value='' $active $title>".__('Select a menu')."</option>\n";
  //print_r($menus);
    foreach ( $menus as $menu )
    {
        // Preselect the active menu
        $active = $selected == $menu->term_id ? 'selected' : '';
        // Show the description
        $title  = empty ( $menu->description ) ? '' : esc_attr( $menu->description );

        $out .= "\t<option value='$menu->term_id' $active $title>$menu->name</option>\n";
    }

    $out .= '</select>';

    $print and print $out;
    return $out;
}


function listOfIcons($selected){

$selected = $selected;
$vals = '<option  '.($selected == "" ? "selected" : "").'  >- no icon -</option>
			<option  '.($selected == "action" ? "selected" : "").'  >action</option>
			<option '.($selected == "alert" ? "selected" : "").' >alert</option>
			<option  '.($selected == "arrow-d" ? "selected" : "").'  >arrow-d</option>
			<option  '.($selected == "arrow-d-l" ? "selected" : "").'  >arrow-d-l</option>
			<option  '.($selected == "arrow-d-r" ? "selected" : "").'  >arrow-d-r</option>
			<option  '.($selected == "arrow-l" ? "selected" : "").'  >arrow-l</option>
			<option  '.($selected == "arrow-r" ? "selected" : "").'  >arrow-r</option>
			<option  '.($selected == "arrow-u" ? "selected" : "").'  >arrow-u</option>
			<option  '.($selected == "arrow-u-l" ? "selected" : "").'  >arrow-u-l</option>
			<option  '.($selected == "arrow-u-r" ? "selected" : "").'  >arrow-u-r</option>
			<option  '.($selected == "audio" ? "selected" : "").'  >audio</option>
			<option  '.($selected == "back" ? "selected" : "").'  >back</option>
			<option  '.($selected == "bars" ? "selected" : "").'  >bars</option>
			<option  '.($selected == "bullets" ? "selected" : "").'  >bullets</option>
			<option  '.($selected == "calendar" ? "selected" : "").'  >calendar</option>
			<option  '.($selected == "camera" ? "selected" : "").'  >camera</option>
			<option  '.($selected == "carat-d" ? "selected" : "").'  >carat-d</option>
			<option  '.($selected == "carat-l" ? "selected" : "").'  >carat-l</option>
			<option  '.($selected == "carat-r" ? "selected" : "").'  >carat-r</option>
			<option  '.($selected == "carat-u" ? "selected" : "").'  >carat-u</option>
			<option  '.($selected == "check" ? "selected" : "").'  >check</option>
			<option  '.($selected == "clock" ? "selected" : "").'  >clock</option>
			<option  '.($selected == "cloud" ? "selected" : "").'  >cloud</option>
			<option  '.($selected == "comment" ? "selected" : "").'  >comment</option>
			<option  '.($selected == "delete" ? "selected" : "").'  >delete</option>
			<option  '.($selected == "edit" ? "selected" : "").'  >edit</option>
			<option  '.($selected == "eye" ? "selected" : "").'  >eye</option>
			<option  '.($selected == "forbidden" ? "selected" : "").'  >forbidden</option>
			<option  '.($selected == "forward" ? "selected" : "").'  >forward</option>
			<option  '.($selected == "gear" ? "selected" : "").'  >gear</option>
			<option  '.($selected == "grid" ? "selected" : "").'  >grid</option>
			<option  '.($selected == "heart" ? "selected" : "").'  >heart</option>
			<option  '.($selected == "home" ? "selected" : "").'  >home</option>
			<option  '.($selected == "info" ? "selected" : "").'  >info</option>
			<option  '.($selected == "location" ? "selected" : "").'  >location</option>
			<option  '.($selected == "lock" ? "selected" : "").'  >lock</option>
			<option  '.($selected == "mail" ? "selected" : "").'  >mail</option>
			<option  '.($selected == "minus" ? "selected" : "").'  >minus</option>
			<option  '.($selected == "navigation" ? "selected" : "").'  >navigation</option>
			<option  '.($selected == "phone" ? "selected" : "").'  >phone</option>
			<option  '.($selected == "plus" ? "selected" : "").'  >plus</option>
			<option  '.($selected == "power" ? "selected" : "").'  >power</option>
			<option  '.($selected == "recycle" ? "selected" : "").'  >recycle</option>
			<option  '.($selected == "refresh" ? "selected" : "").'  >refresh</option>
			<option  '.($selected == "search" ? "selected" : "").'  >search</option>
			<option  '.($selected == "shop" ? "selected" : "").'  >shop</option>
			<option  '.($selected == "star" ? "selected" : "").'  >star</option>
			<option  '.($selected == "tag" ? "selected" : "").'  >tag</option>
			<option  '.($selected == "user" ? "selected" : "").'  >user</option>
			<option  '.($selected == "video" ? "selected" : "").'  >video</option>';
return $vals;
}
/* --- /create selector ----*/
?>