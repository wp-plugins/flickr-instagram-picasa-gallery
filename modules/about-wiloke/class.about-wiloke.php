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
			array(
				'image'			=> 'winters.jpg',
				'title'			=> 'Winters',
				'description'	=> 'Creative Blog',
				'link'			=> 'http://themeforest.net/item/winters-blog-wordpress-theme/11012757'
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
		add_menu_page('Wiloke', 'Wiloke', 'read', 'about-wiloke', array($this, 'pi_only_yourjourney'), 'dashicons-smiley');
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

    public function pi_only_yourjourney()
    {
        ?>
        <div id="pi-wrap" style="margin-top: 20px;">
            <!-- PRELOADER -->
            <div id="preloader">
                <div class="inner">
                    <div class="clock">
                        <div class="minute"></div>
                        <div class="house"></div>
                    </div>
                    <span>Loading</span>
                </div>
            </div>
            <!-- END / PRELOADER -->

            <!-- PAGE WRAP -->
            <div id="page-wrap">
            <section class="featured">
                <div id="ri-grid" class="ri-grid ri-grid-size-3">
                    <ul class="pi-thumbs">
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/1.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/2.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/3.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/4.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/5.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/6.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/7.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/8.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/9.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/10.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/11.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/12.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/13.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/14.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/15.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/16.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/17.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/18.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/19.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/20.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/21.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/22.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/23.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/24.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/25.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/26.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/27.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/28.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/29.jpg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://wiloke.net/wp-demo/yourjourney/images/post/30.jpg"/>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="content">
                    <div class="inner">
                        <h1 style="color:#fff">Your Journey</h1>
                        <p style="color:#fff; font-size: 15px;">You can login to test this theme: <strong><a href="http://yourjourney.wiloke.net/wp-admin/" target="_blank">yourjourney.wiloke.net/wp-admin</a></strong></p>
                        <ul>
                            <li><strong style="color:#fff; font-size: 15px;">User: yourjourney</strong></li>
                            <li><strong style="color:#fff; font-size: 15px;">Password: yourjourney</strong></li>
                        </ul>
                    </div>
                </div>
            </section>

            <div class="landing-body">
            <div class="container-custom">
            <div class="landing-content">
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/map/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/2.jpg" alt="">
                    </div>
                    <h4>Map</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/1.jpg" alt="">
                    </div>
                    <h4>Grid Rotator</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-left-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/3.jpg" alt="">
                    </div>
                    <h4>1 Large Then Grid Left Sidebar ( White Box )</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/4.jpg" alt="">
                    </div>
                    <h4>1 Large Then Grid Right Sidebar ( White Box )</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-blog-no-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/5.jpg" alt="">
                    </div>
                    <h4>1 Large Then Grid No Sidebar ( White box )</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/standard-left-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/6.jpg" alt="">
                    </div>
                    <h4>Standard Left Sidebar (White box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/standard-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/7.jpg" alt="">
                    </div>
                    <h4>Standard Right Sidebar (White box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/standard-no-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/8.jpg" alt="">
                    </div>
                    <h4>Standard No Sidebar (White box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-2-left-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/9.jpg" alt="">
                    </div>
                    <h4>Masonry Left Sidebar (White box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-2-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/10.jpg" alt="">
                    </div>
                    <h4>Masonry Right Sidebar (White box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-2-no-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/11.jpg" alt="">
                    </div>
                    <h4>Masonry No Sidebar (White box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/listing-left-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/12.jpg" alt="">
                    </div>
                    <h4>Listing Left Sidebar (White box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/blog-listing-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/13.jpg" alt="">
                    </div>
                    <h4>Listing Right Sidebar (White box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/listing-no-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/14.jpg" alt="">
                    </div>
                    <h4>Listing No Sidebar (White box)</h4>
                </a>
            </div>

            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-left-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/15.jpg" alt="">
                    </div>
                    <h4>1 Large Then Grid Left Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-right-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/16.jpg" alt="">
                    </div>
                    <h4>1 Large Then Grid Right Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-no-sidebar-white-box/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/17.jpg" alt="">
                    </div>
                    <h4>1 Large Then Grid No Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/standard-left-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/18.jpg" alt="">
                    </div>
                    <h4>Standard Left Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/standard-right-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/19.jpg" alt="">
                    </div>
                    <h4>Standard Right Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/standard-no-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/20.jpg" alt="">
                    </div>
                    <h4>Standard No Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-2-left-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/21.jpg" alt="">
                    </div>
                    <h4>Masonry Left Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-right-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/22.jpg" alt="">
                    </div>
                    <h4>Masonry Right Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/masonry-2-no-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/23.jpg" alt="">
                    </div>
                    <h4>Masonry No Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/listing-left-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/24.jpg" alt="">
                    </div>
                    <h4>Listing Left Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/listing-right-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/25.jpg" alt="">
                    </div>
                    <h4>Listing Right Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/listing-no-sidebar/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/26.jpg" alt="">
                    </div>
                    <h4>Listing No Sidebar (Border box)</h4>
                </a>
            </div>
            <div class="item">
                <a target="_blank" href="http://yourjourney.wiloke.net/comingsoon/">
                    <div class="image-wrap">
                        <img src="http://wiloke.net/wp-demo/yourjourney/images/27.jpg" alt="">
                    </div>
                    <h4>Comingsoon</h4>
                </a>
            </div>
            </div>
            <div class="buy-now">
                <a href="#">Buy Now</a>
            </div>
            </div>
            </div>
            <footer id="footer">
                <p class="copyright">Copyrights © 2014 all rights reserved by Wiloke</p>
            </footer>
            </div>
            <!-- END / PAGE WRAP -->
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

            wp_register_style('googlefont', '//fonts.googleapis.com/css?family=Raleway:700,900,400,300', array(), '1.0');
            wp_enqueue_style('googlefont');

			wp_register_style('custom', plugin_dir_url(__FILE__) . 'source/css/style.css', array(), '1.0');
			wp_enqueue_style('custom');

            wp_register_style('imagegrid', plugin_dir_url(__FILE__) . 'assets/imagegrid.css', array(), '1.0');
            wp_enqueue_style('imagegrid');

            wp_register_script('modernizr', plugin_dir_url(__FILE__) . 'assets/modernizr.custom.js', array(), '1.0', false);
            wp_enqueue_script('modernizr');

			wp_register_script('gridrotator', plugin_dir_url(__FILE__) . 'assets/jquery.gridrotator.js', array(), '1.0', true);
			wp_enqueue_script('gridrotator');

			wp_register_script('custom', plugin_dir_url(__FILE__) . 'source/js/script.js', array(), '1.0', true);
			wp_enqueue_script('custom');
		}
	}

}
new PI_ABOUT_WILOKE;
}