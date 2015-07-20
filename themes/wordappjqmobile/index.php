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
	
	
	 	
	if (have_posts()): ?>
		
			<?php while (have_posts()) : the_post(); ?>
				<div class="box" style="text-align: left;">
					<a href="<?php the_permalink() ?>"  class="boxLink">
						
						
						<div class="boxImgDiv">
							<?php 
		$default_attr = array(
	
	'class' => "imgBox"
);
		the_post_thumbnail($default_attr,array(200, 200)) ?> 
						
						 <h2 class="boxH2"><span class="boxH2span"><?php the_title(); ?></span></h2></div>
						
					
						<p><strong><?php the_author(); ?></strong></p>
						  <p class="txtBox"><?php the_excerpt(); ?></p>
						
						<div class="boxFoot"><span class="time"><?php the_time('Y-m-d'); ?></span></div>
						
						
					</a>
				</div>
			<?php endwhile; ?>


		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
	<?php else: ?>
		<h2>Not Found</h2>
	<?php endif;
}else{
	
	if (have_posts()): ?>
	
		<ul data-role="listview" data-inset="true"<?php jqmobileWordApp('post');?>>
			<?php while (have_posts()) : the_post(); ?>
				<li<?php if(is_sticky()) {jqmobileWordApp('sticky');} ?>>
					<a href="<?php the_permalink() ?>">
						<?php the_post_thumbnail(array(100, 100)) ?>
						<p class="ui-li-aside"><?php the_time('Y-m-d'); ?></p>
						<h3><?php the_title(); ?></h3>
						<p><strong><?php the_author(); ?></strong></p>
						<div><?php the_excerpt(); ?></div>
						<?php if (comments_open()): ?>
							<span class="ui-li-count"><?php comments_number('0', '1', '%' );?></span>
						<?php endif; ?>
					</a>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
	<?php else: ?>
		<h2>Not Found</h2>
	<?php endif;
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
