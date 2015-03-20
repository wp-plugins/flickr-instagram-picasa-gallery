<?php

add_shortcode('pi_ifg', 'pi_ifg');

function pi_ifg($atts)
{
	$atts = shortcode_atts( array(
		'pi_user_id'							 => '',
		'pi_type' 								 => 'flickr',
		'pi_photo_set'							 => "",
		'pi_theme' 							 => 'default',
		'flickr_photo_id'						 => 20,
		'thumbnail_width'						 => 0,
		'thumbnail_height'						 => 0,
		'pagination_max_thumbnail_lines_per_page'=> 0,
		'thumbnail_gutter_height'				 => '',
		'max_item_per_line'						 => '',
		'pi_breadcrumb'						 => true,
		'pagination_max_thumbnail_lines_per_page'=> '',
		'max_items_per_line'					 => '',
		'pi_rtl'								 => false,
		'pi_max_width'							 => '',
		'pi_instagram_client_id'				 => '',
		'pi_instagram_user_id'					 => '',
		'pi_instagram_access_token'			 => '',
		'pi_instagram_get'						 => 'popular',
		'pi_instagram_tagname'					 => ''
	), $atts);
	
	$class = $atts['pi_type'] == 'flickr' || $atts['pi_type'] == 'picasa' ? 'fop' : 'instagram';

	$output = "<div class=\"pi_nano_gallery ".$class."\" data-settings='".json_encode($atts)."'></div>";
	return $output;
}