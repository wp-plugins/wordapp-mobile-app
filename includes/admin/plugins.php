<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';

$request = wp_remote_get('http://mobile-rockstar.com/app/plugins.php?site_id='.base64_encode(site_url()));

$posts = json_decode(wp_remote_retrieve_body( $request ));

?>
	
	<div id="poststuff">
		
		<div id="the-list">
				
		<?		
		foreach ($posts as $post) {
			?>
<div class="plugin-card plugin-card-akismet">
			<div class="plugin-card-top wordapp-plugin-card-top">
				<span class="plugin-icon"><img src="<?php echo $post->thumbnail_small; ?>"></span>
				<div class="name column-name">
					<h4><?php echo $post->title; ?></h4>
				</div>
				<div class="action-links">
					<ul class="plugin-action-buttons"><li><a href="http://mobile-rockstar.com/app/payPlugin.php?plugin=<?php echo urlencode($post->title); ?>&price=<?php echo $post->price; ?>" class=" install-now button" href="" aria-label="Buy Now" data-name="Buy Now">Buy Now</a></li><li>$ <?php echo $post->price; ?> USD</li></ul>				</div>
				<div class="desc column-description">
					<p><?php echo $post->description; ?></p>
					
				</div>
			</div>
			<div class="plugin-card-bottom">
				<div class="vers column-rating">
					</div>
				<div class="column-updated">
					<strong>Last Updated:</strong> <span title="15 May 2015 @ 11:01">
						<?php echo $post->updated; ?>					</span>
				</div>
				<div class="column-downloaded">
									</div>
				<div class="column-downloaded">
					<cite>By <a href="<?php echo $post->user_url; ?>"><?php echo $post->user_name; ?></a></cite>
								</div>
				<div class="column-compatibility">
					<span class="compatibility-<?php echo strtolower($post->compatibility); ?>"><strong><?php echo $post->compatibility; ?></strong> with your version of WordApp</span>				</div>
			</div>
		</div>

<?
		}
?>

			</div>
</div> <!-- .wrap -->

<div style="clear:both"></div>
* All plugins will be delivered as a zip to your admins email address within 24 hours.
<hr>
<div style="clear:both"></div>
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>
