

<div data-role="page" id="" data-theme="">

	<div data-role="header"  data-position="fixed" >
		<a href="#" data-icon="back"  data-iconpos="notext" data-rel="back" title="Go back">Back</a>
		<h1 role="heading"><?php
		$data = (array)get_option( 'WordApp_options' );
	
if($data['logo'] == ""){
 if (is_home()) echo get_bloginfo('name'). " | ". get_bloginfo('description'); else wp_title('',true); 
}else{
echo '<img src="'.esc_url($data['logo']).'" style="height:20px">';
}
?></h1>
		
	</div><!-- /header -->

	<div data-role="content" data-theme="a">
		