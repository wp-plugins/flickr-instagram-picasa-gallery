<div id="pi-ifg-popup-wrapper" style="display:none;">
	<div class="container-fluid" style="width: 100%; max-width:100%">
		<div class="row">

			<form action="" id="pi-ifg-form-flicrk" class="pi_flickr pi_only_one pi_form_setting" data-form="flickr">
				<div class="form-group">
					<label  class="form-label"><?php _e('Flickr Id: *', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item pi_required" name="pi_user_id" value="">
					<a href="http://idgettr.com/" target="_blank"><?php _e('Get Flickr Id', 'wiloke'); ?></a>
				</div>
				
				<div class="form-group">
					<label  class="form-label"><?php _e('Photo Set', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item" name="pi_photo_set" value="">
					<code class="help"><?php _e("Display only the specified photoID,Enter 'none' to display all photo stream, leave empty to display albumn", "wiloke") ?></code>
				</div>

				<div class="form-group">
					<input type="hidden" class="form-control pi_item" name="pi_type" value="flickr">
				</div>
			</form>
			
			<form action="" id="pi-ifg-form-custom" class="pi_custom pi_only_one pi_form_setting" data-form="custom">
				<div class="form-group pi-wrap-upload">
					<input type="text" class="form-control pi_item pi_required pi_insert_val" name="pi_image_ids" value="">
					<input type="hidden" data-url="true" class="form-control pi_item pi_insert_urls" name="pi_insert_urls" value="">
					<div class="pi-awesome-gallery clearfix">
						
					</div>
					<button class="button button-primary pi_awesome_gallery" data-multiple="true" data-insertto=".pi-awesome-gallery"><?php _e('Upload', 'wiloke') ?></button>
				</div>
				
				<div class="form-group">
					<input type="hidden" class="form-control pi_item" name="pi_type" value="custom">
				</div>
			</form>

			<form action="" id="pi-ifg-form-instagram" class="pi_instagram pi_only_one pi_form_setting" data-form="instagram">
				<div class="form-group">
					<label id="pi_instagram_get"  class="form-label"><?php _e('Get', 'wiloke') ?></label>
					<select name="pi_instagram_get" id="pi_instagram_get" class="pi_instagram_get form-control pi_item">
						<option value="popular"><?php _e("Images from popular page", "wiloke"); ?></option>
						<option value="tag"><?php _e("Images with the specific tag", "wiloke"); ?></option>
						<option value="users"><?php _e("Images with a user", "wiloke"); ?></option>
					</select>
				</div>

				<div class="form-group pi_instagram_setting pi_tag">
					<label  class="form-label"><?php _e('Tag Name - Name of the tag to get.', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item" name="pi_instagram_tagname" value="">
				</div>

				<div class="form-group pi_instagram_setting pi_popular">
					<label  class="form-label"><?php _e('Client ID', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item" name="pi_instagram_client_id" value="">
					<code class="help"><?php _e('Find Client ID at', 'wiloke'); ?><a target="_blank" style="color:red" href="http://darkwhispering.com/how-to/get-a-instagram-client_id-key">( darkwhispering )</a></code>
				</div>
			
				<div class="form-group pi_instagram_setting pi_users">
					<label  class="form-label"><?php _e('User ID - Unique id of a user to get.', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item" name="pi_instagram_user_id" value="">
					<code class="help"><?php _e('Find User ID at', 'wiloke'); ?><a target="_blank" style="color:red" href="http://jelled.com/instagram/lookup-user-id">( jelled )</a></code>
				</div>

				<div class="form-group pi_instagram_setting pi_users pi_tag">
					<label  class="form-label"><?php _e('Access Token - A valid oAuth token.', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item" name="pi_instagram_access_token" value="">
					<span class="help"><?php _e('How to get access token', 'wiloke');?><a target="_blank" style="color:red" href="http://jelled.com/instagram/access-token">( jelled )</a></span>
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control pi_item" name="pi_type" value="instagram">
				</div>
			</form>

			<form action="" id="pi-ifg-form-picasa" class="pi_picasa pi_only_one pi_form_setting" data-form="picasa">
				<div class="form-group pi_picasa_settings">
					<label  class="form-label"><?php _e('User ID - Unique id of a user to get.', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item" name="pi_user_id" value="">
					<code class="help"><?php _e('Find User ID at', 'wiloke'); ?><a target="_blank" style="color:red" href="http://01241.com/04/09/find-the-picasa-user-id/"> Picasa User id </a></code>
				</div>
				<div class="form-group pi_picasa_settings">
					<label  class="form-label"><?php _e('Album ID- To display only the specified album', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item" name="pi_album_id" value="">
				</div>
				<div class="form-group pi_picasa_settings pi_sort_album">
					<label  class="form-label"><?php _e('Sort', 'wiloke') ?></label>
					<select name="pi_sort_album" id="pi_sort_album" class="form-control pi_item">
						<option value="standard">standard</option>
						<option value="reversed">reversed</option>
						<option value="random">random</option>
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control pi_item" name="pi_type" value="picasa">
				</div>
			</form>
			
			<div class="pi_general_settings">
				<h3 class="pi_fig_click_toggle"><?php _e("General Settings", "wiloke") ?></h3>
				<form action="" id="pi-ifg-form-general"  class="pi_general pi_form_setting">
					<div class="form-group">
						<label  class="form-label"><?php _e('Theme', 'wiloke') ?></label>
						<select name="pi_theme" id="pi_theme" class="form-control pi_item">
							<option value="light"><?php _e("Light", "wiloke"); ?></option>
							<option value="default"><?php _e("Dark", "wiloke"); ?></option>
							<option value="clean"><?php _e("Clean", "wiloke"); ?></option>
						</select>
					</div>

					<div class="form-group">
						<label  class="form-label"><?php _e('Sets the thumbnail alignment', 'wiloke') ?></label>
						<select name="pi_thumbnail_alignment" id="pi_thumbnail_alignment" class="form-control pi_item">
							<option value="justified"><?php _e("Justified", "wiloke"); ?></option>
							<option value="center"><?php _e("Center", "wiloke"); ?></option>
							<option value="left"><?php _e("Left", "wiloke"); ?></option>
							<option value="right"><?php _e("Right", "wiloke"); ?></option>
						</select>
					</div>

					<div class="form-group">
						<label  class="form-label"><?php _e('Lazy load of thumbnails image', 'wiloke') ?></label>
						<select name="pi_thumbnail_lazyload" id="pi_thumbnail_lazyload" class="form-control pi_item">
							<option value="true"><?php _e("True", "wiloke"); ?></option>
							<option value="false"><?php _e("False", "wiloke"); ?></option>
						</select>
					</div>

				</form>
			</div>

			<div class="pi_advanced_settings">
				<h3 class="pi_fig_toggle"><?php _e("Advanced Settings", "wiloke") ?></h3>
				<form action="" id="pi-ifg-form-advanced" class="pi_general pi_form_setting">
					<div class="row">

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail Width', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="thumbnail_width" value="">
							<code class="help"><?php _e("0: auto", "wiloke") ?></code>
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail Height', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="thumbnail_height" value="">
							<code class="help"><?php _e("0: auto", "wiloke") ?></code>
						</div>

					
						<div class="form-group">
							<label  class="form-label"><?php _e('Maximum number of thumbnail lines per page', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="pagination_max_thumbnail_lines_per_page" value="">
							<code class="help"><?php _e("0: pagination is disabled. Note: Ignored when thumbnail  width='auto' or  thumbnail  height='auto'", "wiloke") ?></code>
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail Gutter Height', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="thumbnail_gutter_height" value="">
						</div>
	
						<div class="form-group">
							<label  class="form-label"><?php _e('Max Item Per Line', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="max_item_per_line" value="">
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Breadcrumb', 'wiloke') ?></label>
							<select name="pi_breadcrumb" class="form-control pi_item">
								<option value="true"><?php _e("True", "wiloke") ?></option>
								<option value="false"><?php _e("False", "wiloke") ?></option>
							</select>
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail Label', 'wiloke') ?></label>
							<select name="pi_thumbnail_label" class="form-control pi_item">
								<option value="true"><?php _e("True", "wiloke") ?></option>
								<option value="false"><?php _e("False", "wiloke") ?></option>
							</select>
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail label alignment', 'wiloke') ?></label>
							<select name="pi_thumbnail_label_alignment" id="pi_thumbnail_label_alignment" class="form-control pi_item">
								<option value="center"><?php _e("Center", "wiloke"); ?></option>
								<option value="justified"><?php _e("Justified", "wiloke"); ?></option>
								<option value="left"><?php _e("Left", "wiloke"); ?></option>
								<option value="right"><?php _e("Right", "wiloke"); ?></option>
							</select>
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail label position', 'wiloke') ?></label>
							<select name="pi_thumbnail_label_position" id="pi_thumbnail_label_position" class="form-control pi_item">
								<option value="overImageOnBottom"><?php _e("overImageOnBottom", "wiloke"); ?></option>
								<option value="overImageOnTop"><?php _e("overImageOnTop", "wiloke"); ?></option>
								<option value="overImageOnMiddle"><?php _e("overImageOnMiddle", "wiloke"); ?></option>
								<option value="onBottom"><?php _e("onBottom", "wiloke"); ?></option>
							</select>
						</div>

						
						<div class="form-group">
							<label  class="form-label"><?php _e('Max width', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="pi_max_width" value="">
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Gallery color scheme', 'wiloke') ?></label>
							<select name="pi_color_scheme" class="form-control pi_item">
								<option value="none"><?php _e("none", "wiloke") ?></option>
								<option value="dark"><?php _e("dark", "wiloke") ?></option>
								<option value="darkRed"><?php _e("darkRed", "wiloke") ?></option>
								<option value="darkGreen"><?php _e("darkGreen", "wiloke") ?></option>
								<option value="darkBlue"><?php _e("darkBlue", "wiloke") ?></option>
								<option value="darkOrange"><?php _e("darkOrange", "wiloke") ?></option>
								<option value="light"><?php _e("light", "wiloke") ?></option>
								<option value="lightBackground"><?php _e("lightBackground", "wiloke") ?></option>
							</select>
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail mouse hover effect.', 'wiloke') ?></label>
							<select name="pi_thumbnail_hover_effect" class="form-control pi_item">
								<option value="slideUp"><?php _e("slideUp", "wiloke") ?></option>
								<option value="slideDown"><?php _e("slideDown", "wiloke") ?></option>
								<option value="slideRight"><?php _e("slideRight", "wiloke") ?></option>
								<option value="slideLeft"><?php _e("slideLeft", "wiloke") ?></option>
								<option value="borderLighter"><?php _e("borderLighter", "wiloke") ?></option>
								<option value="borderDarker"><?php _e("borderDarker", "wiloke") ?></option>
								<option value="scale120"><?php _e("scale120", "wiloke") ?></option>
								<option value="scaleLabelOverImage"><?php _e("scaleLabelOverImage", "wiloke") ?></option>
								<option value="overScale"><?php _e("overScale", "wiloke") ?></option>
								<option value="rotateCornerBL"><?php _e("rotateCornerBL", "wiloke") ?></option>
								<option value="rotateCornerBR"><?php _e("rotateCornerBR", "wiloke") ?></option>
								<option value="imageScale150"><?php _e("imageScale150", "wiloke") ?></option>
								<option value="imageScaleIn80"><?php _e("imageScaleIn80", "wiloke") ?></option>
								<option value="imageScale150Outside"><?php _e("imageScale150Outside", "wiloke") ?></option>
								<option value="imageSplit4"><?php _e("imageSplit4", "wiloke") ?></option>
								<option value="imageSlideUp"><?php _e("imageSlideUp", "wiloke") ?></option>
								<option value="imageSlideDown"><?php _e("imageSlideDown", "wiloke") ?></option>
								<option value="imageSlideRight"><?php _e("imageSlideRight", "wiloke") ?></option>
								<option value="imageSlideLeft"><?php _e("imageSlideLeft", "wiloke") ?></option>
								<option value="imageRotateCornerBL"><?php _e("imageRotateCornerBL", "wiloke") ?></option>
								<option value="imageRotateCornerBR"><?php _e("imageRotateCornerBR", "wiloke") ?></option>
								<option value="imageFlipHorizontal"><?php _e("imageFlipHorizontal", "wiloke") ?></option>
								<option value="imageFlipVertical"><?php _e("imageFlipVertical", "wiloke") ?></option>
								<option value="labelAppear"><?php _e("labelAppear", "wiloke") ?></option>
								<option value="labelAppear75"><?php _e("labelAppear75", "wiloke") ?></option>
								<option value="labelOpacity50"><?php _e("labelOpacity50", "wiloke") ?></option>
								<option value="descriptionAppear"><?php _e("descriptionAppear", "wiloke") ?></option>
								<option value="descriptionSlideUp"><?php _e("descriptionSlideUp", "wiloke") ?></option>
								<option value="labelSlideUpTop"><?php _e("labelSlideUpTop", "wiloke") ?></option>
								<option value="labelSlideUp"><?php _e("labelSlideUp", "wiloke") ?></option>
								<option value="labelSlideDown"><?php _e("labelSlideDown", "wiloke") ?></option>
								<option value="labelSplit4"><?php _e("labelSplit4", "wiloke") ?></option>
								<option value="labelAppearSplit4"><?php _e("labelAppearSplit4", "wiloke") ?></option>
								<option value="labelAppearSplitVert"><?php _e("labelAppearSplitVert", "wiloke") ?></option>
								<option value="none"><?php _e("None", "wiloke") ?></option>
							</select>
							<code class="help"><?php _e('Please note that some effects can not be combined (for example: \'imageSlideUp\' and \'imageFlipHorizontal\').', 'wiloke'); ?></code>
						</div>


						<div class="form-group">
							<label  class="form-label"><?php _e('Enables thumbnail selection', 'wiloke') ?></label>
							<select name="pi_item_selectable" id="pi_item_selectable" class="form-control pi_item">
								<option value="false"><?php _e("False", "wiloke") ?></option>
								<option value="true"><?php _e("True", "wiloke") ?></option>
							</select>
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('RTL', 'wiloke') ?></label>
							<select name="pi_rtl" class="form-control pi_item">
								<option value="false"><?php _e("False", "wiloke") ?></option>
								<option value="true"><?php _e("True", "wiloke") ?></option>
							</select>
						</div>

					</div>
				</form>
			</div>

			<div class="form-group">
				<button id="pi-ifg-save" class="button button-primary pi-popup-save"><?php _e('Save', 'wiloke') ?></button>
				<button id="pi-ifg-cancel" class="button button-primary pi-popup-cancel"><?php _e('Cancel', 'wiloke') ?></button>
			</div>
		</div>
	</div>
</div>