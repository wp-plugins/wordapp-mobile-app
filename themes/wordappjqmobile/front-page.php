<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordAppjqmobile
 */

get_header(); ?>

<div class="">
 <?php
	$data = (array)get_option( 'WordApp_options' );
	
	$varSlideshow = (array)get_option( 'WordApp_slideshow' );
    	
	if($varSlideshow['onoff'] =="on"){
	  ?>
     <div class="slider images" style="margin: 0 auto; max-width: 740px">
		 
	<?php	  
		  
  if(isset($varSlideshow['one']) && $varSlideshow['one'] !== "") {
	  
	  echo '<div><div class="image"><img data-lazy="'.$varSlideshow["one"].'"/></div></div>';
  }	
	if(isset($varSlideshow['two']) && $varSlideshow['two'] !== "") {
	  
	  echo '<div><div class="image"><img data-lazy="'.$varSlideshow['two'].'"/></div></div>';
  }	
	if(isset($varSlideshow['three']) && $varSlideshow['three'] !== "") {
	  
	  echo '<div><div class="image"><img data-lazy="'.$varSlideshow['three'].'"/></div></div>';
  }	
	if(isset($varSlideshow['four']) && $varSlideshow['four'] !== "") {
	  
	  echo '<div><div class="image"><img data-lazy="'.$varSlideshow['four'].'"/></div></div>';
  }	
	if(isset($varSlideshow['five']) && $varSlideshow['five'] !== "") {
	  
	  echo '<div><div class="image"><img data-lazy="'.$varSlideshow['five'].'"/></div></div>';
  }	
		 ?>
          
        </div>
    
    
<?php 
		  }
?>
		  
<div  class="widget-area" role="complementary">	<?php
	
 dynamic_sidebar( 'wordapp-mobile-sidebar-header' ); 
			?>
</div>
	
	<?php 

if($data['style'] == 'page'){
	  echo '<h2>'.get_the_title( $data['page_id'] ).'</h2>'; 
  $post = get_post($data['page_id']); 
$post = get_post($data['page_id']); 
$content = apply_filters('the_content', $post->post_content); 
echo $content; 
   } elseif($data['style'] == 'tiles'){
	
	
	 $args = array('category' => $data['tiles_page_id']);
	$recent_posts  = wp_get_recent_posts($args);
	//print_r($recent_posts);
	//exit;
	foreach( $recent_posts as $recent ){
		
		?>

	<div class="box" style="text-align: left;">
					<a href="<?php echo get_permalink($recent["ID"]) ?>"  class="boxLink">
						<div class="boxImgDiv">
							<?php 
		$default_attr = array('class' => "imgBox");
		echo get_the_post_thumbnail($recent["ID"],'post-thumbnail', $default_attr) ?> 
						 <h2 class="boxH2"><span class="boxH2span"><?php echo $recent["post_title"]; ?></span></h2></div>
						<p><strong><?php echo get_the_author($recent["post_author"]); ?></strong></p>
						<p class="txtBox"><?php echo get_the_excerpt($recent["ID"]); ?></p>
						<div class="boxFoot"><span class="time"><?php echo $recent["post_date"]; ?></span></div>	
					</a>
				</div>
	<?php
	
	}
}else{
	
	?>
		<ul data-role="listview" data-inset="true">
			
	<?php
	
	 $args = array('category' => $data['list_page_id']);
	$recent_posts  = wp_get_recent_posts($args);
	
	//print_r($recent_posts);
	//exit;
	foreach( $recent_posts as $recent ){
		
		?>
				<li>
					<a href="<?php echo get_permalink($recent["ID"]) ?>">
						<?php 
				$default_attr = array('class' => "imgBoxList");
		echo get_the_post_thumbnail($recent["ID"],array('200','200'),$default_attr ) ?> 
						<p class="ui-li-aside" style="display:none"><?php echo $recent["post_date"]; ?></p>
						<h3><?php echo $recent["post_title"]; ?></h3>
						<p><strong><?php echo get_the_excerpt($recent["ID"]); ?></strong></p>
						<div style="display:none"><?php echo get_the_excerpt($recent["ID"]); ?></div>
						
					</a>
				</li>
			
			<?php 
				}
			?>
	</ul>
	<?php 
	
	
	
}
	?>
	
	
	


<hr>
	<center><a href="http://mobile-rockstar.com/wordapp/" target="_blank" class="poweredBy">WordApp convert wordpress to mobile app</a>
	</center>

</div>
<script>
	     var beforeChangeFunc = function(slider,index) {
//hide cation before the slider changes slides
$('.slide__caption').hide();
};

var afterChangeFunc = function(slider,index) {
//fades the caption in
$('.slide__caption').fadeIn('slow');
};

$('.images').slick({
    //slick options,
    dots: false,
         autoplay: true,
        infinite: true,
        slide: 'div',
        speed: 300,
    onBeforeChange: function(slider,index){
        beforeChangeFunc(index)
    },
    onAfterChange: function(slider,index){
        afterChangeFunc(index)
    },                      
});
	</script>
<?php get_footer(); ?>
