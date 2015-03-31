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
					<code class="help"><?php _e("Display only the specified photoID, 'none' to display all photo stream, leave empty to display albumn", "wiloke") ?></code>
				</div>

				<div class="form-group">
					<input type="hidden" class="form-control pi_item" name="pi_type" value="flickr">
				</div>
			</form>


		<!-- 	<form action="" id="pi-ifg-form-upload" class="pi_upload pi_only_one pi_form_setting" data-form="upload">
				<div class="form-group awe-wrap-upload">
					<label  class="form-label"><?php _e('Upload', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item pi_required awe_insert_val" name="pi_user_id" value="">
					<div class="pi-gallery">
						
					</div>
					<button class="button button-primary js_upload" data-multiple="true" data-insertto="pi-gallery"><?php _e('Upload', 'wiloke') ?></button>
				</div>
				
				<div class="form-group">
					<input type="hidden" class="form-control pi_item" name="pi_type" value="upload">
				</div>
			</form> -->

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
				<div class="form-group pi_picasa_settings pi_users">
					<label  class="form-label"><?php _e('User ID - Unique id of a user to get.', 'wiloke') ?></label>
					<input type="text" class="form-control pi_item" name="pi_user_id" value="">
					<code class="help"><?php _e('Find User ID at', 'wiloke'); ?><a target="_blank" style="color:red" href="http://01241.com/04/09/find-the-picasa-user-id/"> Picasa User id </a></code>
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control pi_item" name="pi_type" value="picasa">
				</div>
			</form>
			
			<div class="pi_general_settings">
				<h3 class="pi_click_toggle"><?php _e("General Settings", "wiloke") ?></h3>
				<form action=""  class="pi_general pi_form_setting">
					<div class="form-group">
						<label  class="form-label"><?php _e('Theme', 'wiloke') ?></label>
						<select name="pi_theme" id="pi_theme" class="form-control pi_item">
							<option value="clean"><?php _e("Clean", "wiloke"); ?></option>
							<option value="light"><?php _e("Light", "wiloke"); ?></option>
						</select>
					</div>
				</form>
			</div>

			<div class="pi_advanced_settings">
				<h3 class="pi_toggle"><?php _e("Advanced Settings", "wiloke") ?></h3>
				<form action="" id="pi-ifg-form-general" class="pi_general pi_form_setting">
					<div class="row">

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail Width', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="thumbnail_width" value="">
							<code class="help"><?php _e("0 mean auto", "wiloke") ?></code>
						</div>

						<div class="form-group">
							<label  class="form-label"><?php _e('Thumbnail Height', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="thumbnail_height" value="">
							<code class="help"><?php _e("0 mean auto", "wiloke") ?></code>
						</div>

					
						<div class="form-group">
							<label  class="form-label"><?php _e('Maximum number of thumbnail lines per page', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="pagination_max_thumbnail_lines_per_page" value="">
							<code class="help"><?php _e("0 mean pagination is disabled. Note: Ignored when thumbnail width='auto' or thumbnail height='auto'", "wiloke") ?></code>
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
							<label  class="form-label"><?php _e('Max width', 'wiloke') ?></label>
							<input type="text" class="form-control pi_item" name="pi_max_width" value="">
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