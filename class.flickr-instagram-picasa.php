<?php 
/*
Plugin Name: Flickr Instagram  Picasa Gallery
Plugin URI: http://test.wiloke.com/flickr-instagram-picasa-gallery-plugin/
Author: wiloke
Author URI: http://wiloke.com
Version: 1.4.1
Description: Flickr Instagram  Picasa Gallery

License: Under GPL2

Copyright 2014 wiloke (email : piratesmorefun@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( !defined('ABSPATH') )
{	
	exit();
}

function pi_admin_notice() {
	if ( isset($_POST['pi_dismiss']) )
	{
		update_option('pi_fig_dismiss', true);
	}

	if ( get_option('pi_fig_dismiss') === false )
	{
    ?>
    <div class="updated">
        <p><?php _e( 'Now, It supports self hosted images', 'wiloke' ); ?>
        <form action="" method="POST">
        	<input type="hidden" name="pi_dismiss">
        	<button><?php _e('Dismiss', 'wiloke');?></button>
        </form>
        </p>
    </div>
    <?php
	}
}
add_action( 'admin_notices', 'pi_admin_notice' );

define( 'PI_IFG_MD_DIR', plugin_dir_path(__FILE__) . 'modules/' );
define( 'PI_IFG_MD_URL', plugin_dir_url(__FILE__) . 'modules/' );
define( 'PI_IFG_SO_URL', plugin_dir_url(__FILE__) . 'source/' );
define( 'PI_IFG_SO_AS',  plugin_dir_url(__FILE__) . 'assets/' );


/*admin scripts*/
add_action('admin_enqueue_scripts', 'pi_include_js');
function pi_include_js()
{
	wp_register_style('pi_bootstrap', PI_IFG_SO_AS . 'bootstrap/bootstrap.css', array(), '1.0');
	wp_enqueue_style('pi_bootstrap');

	wp_register_style('pi_main', PI_IFG_SO_URL . 'css/main.css', array(), '1.0');
	wp_enqueue_style('pi_main');

	wp_enqueue_media();

	wp_enqueue_style('thickbox');
	wp_enqueue_script('thickbox');

	wp_register_script('pi_main', PI_IFG_MD_URL . 'shortcode/js/main.js', array(), '1.0');
	wp_enqueue_script('pi_main');
	wp_localize_script('pi_main', 'PIFIPIURL', plugin_dir_url(__FILE__) . 'modules/shortcode/img/');
}

/*front-end scripts*/
add_action('wp_enqueue_scripts', 'pi_fe_include_js');
function pi_fe_include_js()
{
	wp_register_style('pi_nanogallery', PI_IFG_SO_AS . 'nano-gallery/css/nanogallery.min.css', array(), '1.0');
	wp_enqueue_style('pi_nanogallery');

	wp_register_style('pi_nanogallery_light', PI_IFG_SO_AS . 'nano-gallery/css/themes/light/nanogallery_light.min.css', array(), '1.0');
	wp_enqueue_style('pi_nanogallery_light');

	wp_register_style('pi_nanogallery_clean', PI_IFG_SO_AS . 'nano-gallery/css/themes/clean/nanogallery_clean.min.css', array(), '1.0');
	wp_enqueue_style('pi_nanogallery_clean');

	wp_register_script('pi_nanogallery', PI_IFG_SO_AS . 'nano-gallery/jquery.nanogallery.min.js', array(), '1.0', true);
	wp_enqueue_script('pi_nanogallery');

	wp_register_script('pi_main', PI_IFG_SO_URL . 'js/main.js', array(), '1.0', true);
	wp_enqueue_script('pi_main');

	
}

/*=========================================*/
/* Create Shortcode Button	
/*=========================================*/
require_once( PI_IFG_MD_DIR . 'shortcode/setting.php' );
require_once( PI_IFG_MD_DIR . 'shortcode/view.php' );


$themeName = wp_get_theme();

if (  $themeName->Name != 'Your Journey' )
{
    require_once( PI_IFG_MD_DIR . 'about-wiloke/class.about-wiloke.php' );
}


