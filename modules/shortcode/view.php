<?php

add_shortcode('pi_ifg', 'pi_ifg');

function pi_ifg($atts)
{
	$atts = shortcode_atts( array(
		'pi_user_id'							 => '',
		'pi_image_ids'							 => '',
		'pi_type' 								 => 'flickr',
		'pi_photo_set'							 => "",
		'pi_theme' 							 	 => 'light',
		'flickr_photo_id'						 => 20,
		'thumbnail_width'						 => 0,
		'thumbnail_height'						 => 0,
		'pagination_max_thumbnail_lines_per_page'=> 0,
		'thumbnail_gutter_height'				 => '',
		'max_item_per_line'						 => '',
		'pi_breadcrumb'						 	 => true,
		'pagination_max_thumbnail_lines_per_page'=> '',
		'max_items_per_line'					 => '',
		'pi_rtl'								 => false,
		'pi_max_width'							 => '',
		'pi_instagram_client_id'				 => '',
		'pi_instagram_user_id'					 => '',
		'pi_instagram_access_token'			 	 => '',
		'pi_instagram_get'						 => 'popular',
		'pi_instagram_tagname'					 => '',
		'pi_thumbnail_label'					 => false,
		'pi_color_scheme'						 => 'none',
		'pi_item_selectable'					 => false,
		'pi_thumbnail_alignment'				 => 'justified',
		'pi_thumbnail_hover_effect'				 => 'slideUp',
		'pi_thumbnail_lazyload'					 => true,
		'pi_thumbnail_label_alignment'			 => 'center',
		'pi_thumbnail_label_position'			 => 'overImageOnMiddle'
	), $atts);
	
	$class = $atts['pi_type'] == 'flickr' || $atts['pi_type'] == 'picasa' ? 'fop' : 'instagram';

	if ( $atts['pi_type'] != 'custom' )
	{
		$output = "<div class=\"pi_nano_gallery ".$class."\" data-settings='".json_encode($atts)."'></div>";
	}else{
		$imgs = "";

		if (  !empty($atts['pi_image_ids']) )
		{
			$aIds = explode(",", $atts['pi_image_ids']);
			
			if ( $atts['thumbnail_width'] > 150 && $atts['thumbnail_width'] <= 300 )
			{
				$size = "medium";
			}elseif($atts['thumbnail_width'] > 300){
				$size = "large";
			}else{
				$size = "thumbnail";
			}

			foreach ( $aIds as $id )
			{
				$aInfo = pi_attachment_info($id);
				$imgAtts = wp_get_attachment_image_src( $id, $size, false ); // returns an array
				$imgs .= '<a href="'.wp_get_attachment_url($id).'" data-ngthumb="'.$imgAtts[0].'" data-ngdesc="'.$aInfo['caption'].'">'.$aInfo['title'].'</a>';
			}

			$output = "<div class=\"pi_nano_gallery custom\" data-settings='".json_encode($atts)."'>".$imgs."</div>";
			return $output;
		}
	}

	return $output;
}

function pi_attachment_info($id)
{
	$aInfo = array('title'=>'', 'caption'=>'');

  	$attachment = get_post( $id );
  	
 	if ( $attachment ) 
 	{
      	$aInfo['title'] 	= $attachment->post_title;
      	$aInfo['caption']	= $attachment->post_excerpt;
 	}

 	return $aInfo;
}