<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';

$request = wp_remote_get('http://mobile-rockstar.com/app/plugins.php?site_id='.base64_encode(site_url()));

$postas = json_decode(wp_remote_retrieve_body( $request ),true);

?>
	
	<div id="poststuff">
		
		<div id="the-list">
			<?php
				if(isset($_GET['install']) && $_GET['install'] == '1'){
							$id = $_GET['id'];
							$my_post = array(
								  'post_title'    => $postas[$id]['title'],
								 'post_type'    => 'wordapp_plugins',
								  'post_content'  =>  $postas[$id]['content'],
								  'post_status'   => 'publish'
							);
					wp_insert_post( $my_post );
				}
			?>	
		<?php		
		foreach ($postas as $posta) {
			if(!isset($posta['title'])) $posta['title'] ='';
			if(!isset($posta['thumbnail_small'])) $posta['thumbnail_small'] ='';
			if(!isset($posta['price'])) $posta['price'] ='';
			if(!isset($posta['description'])) $posta['description'] ='';
			if(!isset($posta['updated'])) $posta['updated'] ='';
			if(!isset($posta['user_url'])) $posta['user_url'] ='';
			if(!isset($posta['user_name'])) $posta['user_name'] ='';
			if(!isset($posta['compatibility'])) $posta['compatibility'] ='';
			?>
<div class="plugin-card plugin-card-akismet">
			<div class="plugin-card-top wordapp-plugin-card-top">
				<span class="plugin-icon"><img src="<?php echo $posta['thumbnail_small']; ?>"></span>
				<div class="name column-name">
					<h4><?php echo $posta['title']; ?></h4>
				</div>
				<div class="action-links">
					<?php if($posta['price'] == "FREE"): ?>
						<ul class="plugin-action-buttons"><li><a href="?page=WordAppPluginsAndThemes&install=1&id=<?php echo $posta['id']; ?>" class=" install-now button"  aria-label="Install Now" data-name="Install Now">Install Now</a></li><li>FREE</li></ul>				</div>
				
					<?php else: ?>
					<ul class="plugin-action-buttons"><li><a href="http://mobile-rockstar.com/app/payPlugin.php?plugin=<?php echo urlencode($posta['title']); ?>&price=<?php echo $posta['price']; ?>" class=" install-now button"  aria-label="Buy Now" data-name="Buy Now">Buy Now</a></li><li>$ <?php echo $posta['price']; ?> USD</li></ul>				</div>
				<?php endif; ?>
				<div class="desc column-description">
					<p><?php echo $posta['description']; ?></p>
					
				</div>
			</div>
			<div class="plugin-card-bottom">
				<div class="vers column-rating">
					</div>
				<div class="column-updated">
					<strong>Last Updated:</strong> <span title="15 May 2015 @ 11:01">
						<?php echo $posta['updated']; ?>					</span>
				</div>
				<div class="column-downloaded">
									</div>
				<div class="column-downloaded">
					<cite>By <a href="<?php echo $posta['user_url']; ?>"><?php echo $posta['user_name']; ?></a></cite>
								</div>
				<div class="column-compatibility">
					<span class="compatibility-<?php echo strtolower($posta['compatibility']); ?>"><strong><?php echo $posta['compatibility']; ?></strong> with your version of WordApp</span>				</div>
			</div>
		</div>

<?php
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
