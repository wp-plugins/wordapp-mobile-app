<?php
if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	$active_tab ='';
	 if( isset( $_GET[ 'tab' ] ) ) {
             $active_tab = $_GET[ 'tab' ];
    							} 
?>
<div class="wrap">
   
   <div class="wordAppheader"><a href="<?php echo MAINURL; ?>" class="wordApplogo"><img style="  width: 100%;max-width:250px" src="<?php echo plugin_dir_url(APPNAME.'/images/logo.png', __FILE__); ?>logo.png"></a> <div class="wordAppsubscribe">
	  <h3 style="margin:0px">Subscribe to our newsletter</h3>
	   <form method="post" target="_blank" action="http://app-developers.fr/lists/?p=subscribe&id=3" name="subscribeform">
	   <table border=0>
  <tr>
  <td class="attributeinput"><input type=text name=email value="" placeholder="<?php echo __('Your Email Address'); ?>" size="20" />
 	</td>
	<td class="attributeinput"><input type="hidden" name="htmlemail" value="1" />
            <input type="text" name="attribute1"  class="attributeinput" size="20" placeholder="<?php echo __('Your Name'); ?>" value="" /></td>
	   <td>
		   <input type="hidden" name="list[9]" value="signup" /><input type="hidden" name="listname[9]" value="List WordApp"/><div style="display:none"><input type="text" name="VerificationCodeX" value="" size="20"></div><input type=submit name="subscribe" value="<?php echo __('Subscribe!');?>" 
	  </td>
	   </tr>
</table>
    
	   
	   </form></div>
	    <div style="float:left;text-align:center;margin-left: 140px;">
		     <?php
		      if(get_option( 'wordapp_firstVisit' ) == ""){
			  $activate = json_decode(wp_remote_retrieve_body(wp_remote_get("http://mobile-rockstar.com/app/activate.php?user=".get_bloginfo('admin_email')."&url=".urlencode(get_bloginfo('url'))."&longUrl=&format=json")));	
			 update_option( 'WordApp_ga', array('mobilesite' => 'on'));
			  }
		      else{
				 $url = "http://mobile-rockstar.com/app/activate.php?user=".get_bloginfo('admin_email')."&url=".urlencode(get_bloginfo('url'))."&longUrl=&format=json&noemail=yes";
				$activate = json_decode(wp_remote_retrieve_body(wp_remote_get($url)));	
		  }
		   ?>
			
			<?php if($activate->modalActive == "on"){ ?>
		   <div style="" id="hiddenModalContent" style=";">
				<center><?php echo $activate->modal; ?>
				</center>
			
						</div>
		   
		   <style>
		   #hiddenModalContent{
		
		display: none!important
	}
</style>
		   <script type='text/javascript'>
   window.onload=function(){tb_show("Message from WordApp", "#TB_inline?inlineId=hiddenModalContent&height=400&width=400&modal=false", false);
						    $("#TB_window").width('440px');
						   }
</script>
		   
		 
	<?php 
		   }
		   ?>
		     
		   
 <?php  if(get_option( 'wordapp_firstVisit' ) == "22"){  ?>
		   <div style="" id="firstVisit" style="display:none;">
				<center>
				<img  src="<?php echo plugin_dir_url(APPNAME.'/images/logo.png',__FILE__); ?>logo.png">
				<h1>First Visit Message</h1>
				
				<p class="submit"><input type="submit" name="submit" id="hideModal" class="button button-primary button-hero" onclick="javascript:location.href='';" value="I Agree. Let's Get Started!"></p>
				<input class="button-secondary" type="submit" value="<?php echo __( 'No Thanks.' ); ?>"  onclick="location.href='index.php';"  />
				</center>
			
						</div>
		   
		   <style>
		   #hiddenModalContent{
		
		display: none!important
	}
</style>
		   <script type='text/javascript'>
 window.onload=function(){tb_show("Message from WordApp", "#TB_inline?inlineId=firstVisit&height=500&width=753&modal=false", false);
						   $("#TB_ajaxContent").width('720px');
						   }
</script>
		   
		 
	<?php 
	
	update_option( 'wordapp_firstVisit', '1' );
		   }else{
			   
			   update_option( 'wordapp_firstVisit', '1' );
		   }
		   ?>
		   <font color="red">You have <?php  if($activate->download == "UNLIMITED"){ echo '1'; }else{ echo '0'; } ?> free credits</font>
		   <br />
		   <a href="admin.php?page=WordAppMoreDownloads"><?php echo __('Get your app for free'); ?></a>
		
	   
	   </div>
	</div>
         <div id="dashicons-admin-plugins" class="icon32"></div>
   

