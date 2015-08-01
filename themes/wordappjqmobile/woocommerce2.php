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
	
	<?php woocommerce_content(); ?>
	
	
	


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
