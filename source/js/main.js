;(function($, window, document, undefined){
	"use strict"
	$(document).ready(function(){
		var $piFlickrNanoGallery = $(".pi_nano_gallery"), $settings, $putSettings = {}, $id = "", $piInstagram = $(".pi_nano_gallery.instagram"), $this;

		/*Flickr and picasa*/
		$piFlickrNanoGallery.each(function()
		{
			$this = $(this);
			$settings = $this.data("settings");

			if ( $settings != "" && typeof $settings != 'undefined' )
			{
				
				/*=========================================*/
				/*	General Settings
				/*=========================================*/
				$putSettings = {
					breadcrumbAutoHideTopLevel: $settings.pi_breadcrumb,
					photoset: $settings.pi_photo_set != '' ?  $settings.pi_photo_set : "",
					thumbnailWidth:  $settings.thumbnail_width  == 0   || $settings.thumbnail_width == '' ? 'auto'  : $settings.thumbnail_width,
					thumbnailHeight: $settings.thumbnail_height == 0   || $settings.thumbnail_height == '' ? 120 : $settings.thumbnail_height,
			        viewerDisplayLogo:true,
			        locationHash:false,
					// thumbnailHoverEffect:[{'name':'labelSlideUp','duration':300},{'name':'borderDarker'}],
					thumbnailLabel:{display:false,position:'overImageOnBottom',descriptionMaxLength:50, hideIcons: true},
			        thumbnailLazyLoad: $settings.pi_thumbnail_lazyload == 'false' ? false : true,
			        theme:$settings.pi_theme,
			        colorScheme:$settings.pi_color_scheme,
			        itemsSelectable: $settings.pi_item_selectable == 'true' ? true : false,
			        thumbnailAlignment: $settings.pi_thumbnail_alignment,
			        thumbnailHoverEffect: $settings.pi_thumbnail_hover_effect
				};



				if ( $settings.pagination_max_thumbnail_lines_per_page != '' )
				{
					$putSettings.paginationMaxLinesPerPage = parseInt($settings.pagination_max_thumbnail_lines_per_page);
				}

				if ( $settings.max_item_per_line != '' )
				{
					$putSettings.maxItemsPerLine = parseInt($settings.max_item_per_line);
				}

				if ( $settings.pi_rtl == 'true' )
				{
					$putSettings.RTL = true;
				}

				if (  $settings.pi_thumbnail_label == 'true' )
				{
					$putSettings.thumbnailLabel.display = true;
					$putSettings.thumbnailLabel.position = $settings.pi_thumbnail_label_position;
					$putSettings.align 	= $settings.pi_thumbnail_label_alignment;
				}else{
					$putSettings.thumbnailLabel.display = false;
				}

				if ( $settings.pi_max_width != '' )
				{
					$putSettings.maxWidth = parseInt($settings.pi_max_width);
				}


				/*	If the width is auto and set max-item-perline, cal */
				// if ( $putSettings.thumbnailWidth == 'auto' &&  $settings.max_item_per_line !='' && $settings.max_item_per_line != 0 )
				// {
				// 	var _parentWidth = $this.parent().innerWidth();
				// 		$putSettings.thumbnailWidth = Math.floor(_parentWidth/($settings.max_item_per_line));
				// }

				console.log($putSettings.thumbnailAlignment);
				/*=========================================*/
				/*	Flickr and Picasa Settings
				/*=========================================*/
				if ( $this.hasClass("fop") )
				{
					$putSettings.userID  = $settings.pi_user_id;
					$putSettings.kind    = $settings.pi_type;
					$putSettings.display = true;
					$this.nanoGallery($putSettings);
				}else if($this.hasClass("instagram") ){
					pi_get_instagram($settings, $putSettings, $this);
				}else{
					$this.nanoGallery($putSettings);
				}


				/*=========================================*/
				/* Instagram Settings
				/*=========================================*/
			}
		})
	
		$.fn.piInstagramNanoGallery = function(contentGallery)
		{	
			$(this).nanoGallery(contentGallery);
		}
	
		/*Instagram*/
		function pi_get_instagram($data, $putSettings, $this)
		{
			var url = "";
			
			switch ( $data.pi_instagram_get )
			{
				case 'tag':
					
					url = 'https://api.instagram.com/v1/tags/'+$data.pi_instagram_tagname+'/media/recent?access_token='+$data.pi_instagram_access_token;
					break;

				case 'users':
					url = "https://api.instagram.com/v1/users/"+$data.pi_instagram_user_id+"/media/recent/?access_token="+$data.pi_instagram_access_token;
					break;

				default:
					
					url = 'https://api.instagram.com/v1/media/popular?client_id='+$data.pi_instagram_client_id;
					break;
			}

			var piLoading = setTimeout(function(){
				alert("Request timeout");
			}, 60000);

			$.ajax({
			  	dataType: "jsonp",
			  	cache: false,
			  	crossDomain: true,
			  	url: url,
			  	success: function(data)
			  	{	
				  	clearTimeout(piLoading);
				  	
				  	if ( data.meta.code == 200 )
				  	{
				  		var _oData = data.data,
				  		 	_oGallery = [],
				  		 	_imgs = "";

				  		for ( var i = 0, max = _oData.length;  i < max; i++ )
				  		{
				  			_imgs = _oData[i].images;
				  			_oGallery.push({ title: _oData[i].caption.text, src: _imgs.standard_resolution.url, srct: _imgs.thumbnail.url});
				  		}

				  		$putSettings.items = _oGallery;
				  		
				  		$this.piInstagramNanoGallery($putSettings);
				  	}else{
				  		alert(data.meta.error_message);
				  	}
				  	
			  	}
			});

		}

	})

})(jQuery, window, document);

