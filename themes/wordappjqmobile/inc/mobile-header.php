

<!-- Start of second page: #two -->
<div data-role="page" id="two" data-theme="a">

	<div data-role="header">
		<a href="#" data-icon="back"  data-iconpos="notext" data-rel="back" title="Go back">Back</a>
		<h1 role="heading"><?php
if($data['logo'] == ""){
 if (is_home()) echo get_bloginfo('name'). " | ". get_bloginfo('description'); else wp_title('',true); 
}else{
echo '<img src="'.esc_url($data['logo']).'" style="height:20px">';
}
?></h1>
		
	</div><!-- /header -->

	<div data-role="content" data-theme="a">
		