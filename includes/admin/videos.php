<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';
$url = "http://vimeo.com/api/v2/".VIMEO_VIDEO."/videos.json";
$request = file_get_contents($url);

$posts = json_decode( $request );

?>
	
	<div id="poststuff">
		
		<div id="the-list">
				
		<?		
		foreach ($posts as $post) {
			?>
<div class="plugin-card plugin-card-akismet">
			<div class="plugin-card-top wordapp-plugin-card-top">
				<a href="https://player.vimeo.com/video/<?php echo $post->id; ?>?TB_iframe=true&amp;width=772&amp;height=259" class="thickbox plugin-icon"><img src="<?php echo $post->thumbnail_small; ?>"></a>
				<div class="name column-name">
					<h4><a href="https://player.vimeo.com/video/<?php echo $post->id; ?>?TB_iframe=true&amp;width=772&amp;height=259" class="thickbox"><?php echo $post->title; ?></a></h4>
				</div>
				<div class="action-links">
					<ul class="plugin-action-buttons"><li><a href="https://player.vimeo.com/video/<?php echo $post->id; ?>?TB_iframe=true&amp;width=772&amp;height=259" class="thickbox install-now button" href="" aria-label="Watch Now" data-name="Watch Now">Watch Now</a></li><li></li></ul>				</div>
				<div class="desc column-description">
					<p><?php echo $post->description; ?></p>
					<p class="authors"> <cite>By <a href="<?php echo $post->user_url; ?>"><?php echo $post->user_name; ?></a></cite></p>
				</div>
			</div>
			<div class="plugin-card-bottom wordapp-plugin-card-bottom">
				
				<div class="column-updated">
					<strong><?php echo __('Duration'); ?></strong> <span title="6 Jul 2015 @ 23:44">
						<?php echo round($post->duration/60,2); ?> mins				</span>
				</div>
				
				<div class="wordapp-column-compatibility">
					<span class=""><strong><?php echo __('Tags'); ?> :</strong> <?php echo $post->tags; ?></span>				</div>
			</div>
		</div>

<?
		}
?>

			</div>
</div> <!-- .wrap -->
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>
