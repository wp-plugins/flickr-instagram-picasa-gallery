<?php

if ( !defined('ABSPATH') )
wp_die();

if ( !class_exists('PI_ABOUT_WILOKE') )
{

define('PI_ABOUT_WILOKE_URL', plugin_dir_url(__FILE__) . 'source/img/');

class PI_ABOUT_WILOKE
{
	public $aData = array(
		'plugins'=>array(
			array(
				'image'			=> 'flickr-instagram-picasa-gallery.png',
				'title'			=> 'Flickr Instagram Picasa Gallery',
				'description'	=> 'Ingrate Flickr/Instagram/Picasa Gallery in your website',
				'link'			=> 'https://wordpress.org/plugins/flickr-instagram-picasa-gallery/'
			),
			array(
				'image'			=> 'gallery-lightbox.png',
				'title'			=> 'Gallery Lightbox',
				'description'	=> 'This plugin allows you to implement a gallery page into your website',
				'link'			=> 'https://wordpress.org/plugins/wiloke-gallery-lightbox/'
			),
			
			array(
				'image'			=> 'wiloke-vimeo-gallery.png',
				'title'			=> 'Wiloke Vimeo Gallery',
				'description'	=> 'The easiest way to create beautiful Vimeo galleries in your website site.',
				'link'			=> 'https://wordpress.org/plugins/flickr-instagram-picasa-gallery/'
			),
			
			array(
				'image'			=> 'flickr-instagram-picasa-gallery.png',
				'title'			=> 'Flickr Instagram Picasa Gallery',
				'description'	=> 'Ingrate Flickr/Instagram/Picasa Gallery in your website',
				'link'			=> 'https://wordpress.org/plugins/wiloke-vimeo-gallery/'
			),

			array(
				'image'			=> 'wiloke-twitter-feed.jpg',
				'title'			=> 'Wiloke Twitter Feed',
				'description'	=> 'Display twitter feed in your sidebar',
				'link'			=> 'https://wordpress.org/plugins/wiloke-twitter-feed/'
			)
		),	
		'themes'=>array(
			array(
				'image'			=> 'arvios.jpg',
				'title'			=> 'Arvios',
				'description'	=> 'A modern and beautiful multi purpose wordpress theme',
				'link'			=> 'https://creativemarket.com/wiloke/232079-Arvios-Multi-Purpose-Wordpress-Theme'
			),
			array(
				'image'			=> 'hercules.jpg',
				'title'			=> 'Hercules',
				'description'	=> 'Onepage Wordpress Theme',
				'link'			=> 'http://wiloke.com/blog/hercules-onepage-wordpress-theme/'
			),
		)
	);

	public function __construct()
	{
		add_action('admin_menu', array($this, 'pi_create_wiloke_menu'));
		add_action('admin_enqueue_scripts', array($this, 'pi_wiloke_enqueue_scripts'));
	}

	public function pi_create_wiloke_menu()
	{
		add_menu_page('Wiloke', 'Wiloke', 'read', 'about-wiloke', array($this, 'pi_about_wiloke'), 'dashicons-smiley');
	}

	public function pi_about_wiloke()
	{
		?>
		<div id="page-wrap" class="onepage">
			<div class="row">
				<div class="col-md-12">
					<h1>Welcome To Wiloke</h1>
					<p>First Of all, thanks for using our plugin! If you have any ideas or face any issues, feel free tell us at <a href="mailto:piratesmorefun@gmail.com">piratesmorefun@gmail.com</a></p>
					<p>Interested in keeping up to date with Wiloke's future projects and releases? Follow us on <a href="https://www.facebook.com/wilokewp" target="_blank">Facebook.</a></p>
				</div>
			</div>

			<div class="row">

			    <!-- PORTFOLIO -->
			    <section id="portfolio" class="portfolio">
			        <div class="container">
			            <div class="st-heading text-center">
			                <h3 class="h3">Themes And Plugins</h3>
			            </div>
			            
			            <div id="filters" class="text-center">
			                <ul>
			                    <li class="select-filter"><a href="#" class="h-btn" data-filter="*" id="all">All</a></li>
			                    <li><a href="#" class="h-btn" data-filter=".wiloke_plugins">Plugins</a></li>
			                    <li><a href="#" class="h-btn" data-filter=".wiloke_themes">Themes</a></li>
			                </ul>
			            </div>
			        </div>

			        <div id="portfolio-wrap">
			            <!-- PORTFOLO ITEM -->
			            <?php 
			            	foreach ( $this->aData['plugins'] as $key => $aPlugin ) :
			            ?>
			            <figure class="portfolio-item style1 col-xs-12 col-sm-6 col-md-3 md-work-zoomLg  wiloke_plugins">
			                <a class="image-wrap" href="<?php echo esc_url($aPlugin['link']) ?>" target="_blank">
			                    <img src="<?php echo esc_url( PI_ABOUT_WILOKE_URL . $aPlugin['image']); ?>" alt="" class="image">
			                </a>
			                <figcaption class="caption">
			                    <div class="tb">
			                        <div class="tb-cell">
			                            <h2><a href="<?php echo esc_url($aPlugin['link']) ?>" target="_blank"><?php echo esc_html($aPlugin['title']); ?></a></h2>
			                            <p><?php echo esc_html($aPlugin['description']); ?></p>
			                        </div>
			                    </div>
			                </figcaption>
			            </figure>
			       	 	<?php endforeach; ?>

			       	 	<?php 
			            	foreach ( $this->aData['themes'] as $key => $aPlugin ) :
			            ?>
			            <figure class="portfolio-item style1 col-xs-12 col-sm-6 col-md-3 md-work-zoomLg  wiloke_themes">
			                <a class="image-wrap" href="<?php echo esc_url($aPlugin['link']) ?>" target="_blank">
			                    <img src="<?php echo esc_url( PI_ABOUT_WILOKE_URL . $aPlugin['image']); ?>" alt="" class="image">
			                </a>
			                <figcaption class="caption">
			                    <div class="tb">
			                        <div class="tb-cell">
			                            <h2><a href="<?php echo esc_url($aPlugin['link']) ?>" target="_blank"><?php echo esc_html($aPlugin['title']); ?></a></h2>
			                            <p><?php echo esc_html($aPlugin['description']); ?></p>
			                        </div>
			                    </div>
			                </figcaption>
			            </figure>
			       	 	<?php endforeach; ?>

			            <!-- END / PORTFOLO ITEM -->
			        </div>
			    </section>
			    <!-- END / PORTFOLIO -->
			</div>
		</div>
		<?php 
	}

	public function pi_wiloke_enqueue_scripts()
	{
		$screen = get_current_screen();
		if ( isset($screen->base) && preg_match('/page_about-wiloke/', $screen->base) )
		{
			wp_register_style('bootstrap', plugin_dir_url(__FILE__) . 'assets/bootstrap.css', array(), '1.0');
			wp_enqueue_style('bootstrap');
			
			wp_register_style('custom', plugin_dir_url(__FILE__) . 'source/css/style.css', array(), '1.0');
			wp_enqueue_style('custom');

			wp_register_script('isotope', plugin_dir_url(__FILE__) . 'assets/isotope.pkgd.min.js', array(), '1.0', true);
			wp_enqueue_script('isotope');

			wp_register_script('custom', plugin_dir_url(__FILE__) . 'source/js/scripts.js', array(), '1.0', true);
			wp_enqueue_script('custom');
		}
	}

}
new PI_ABOUT_WILOKE;
}