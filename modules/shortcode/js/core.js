;(function($, window, document, undefined)
{
	"use strict";

	$(document).ready(function(){

		var _oFormControl = {
			flickr: "#pi-ifg-form-flicrk",
			instagram: "#pi-ifg-form-instagram",
			picasa: "#pi-ifg-form-picasa"
		},
		_popupID = "pi-ifg-popup-wrapper";

		tinymce.PluginManager.add('pi_ifg', function( editor, url ) 
		{
			editor.addButton('pi_ifg', 
			{
			 	text: 'Flickr Instagram Gallery',
		       	icon: false,
		       	type: 'menubutton',
		       	menu: 
		       	[
		       		{	
						text: 'Flickr',
						onclick: function()
						{ 	
							$(".pi_general").slideUp('fast');
							tb_show("Settings", "#TB_inline?height=800&amp;width=1000&amp;inlineId="+_popupID);
							$(".pi_form_setting").removeClass("active");
							$(".pi_only_one").addClass("hidden");
							$("#pi-ifg-form-flicrk").addClass("active").removeClass("hidden");
						},
					},

					{	
						text: 'Instagram',
						onclick: function()
						{ 	
							$(".pi_general").slideUp('fast');
							tb_show("Settings", "#TB_inline?height=800&amp;width=1000&amp;inlineId="+_popupID);
							$(".pi_form_setting").removeClass("active");
							$(".pi_only_one").addClass("hidden");
							$("#pi-ifg-form-instagram").addClass("active").removeClass("hidden");
							pi_instagram_switcher();
						},
					},
					{	
						text: 'Picasa',
						onclick: function()
						{ 	
							$(".pi_general").slideUp('fast');
							tb_show("Settings", "#TB_inline?height=800&amp;width=1000&amp;inlineId="+_popupID);
							$(".pi_form_setting").removeClass("active");
							$(".pi_only_one").addClass("hidden");
							$("#pi-ifg-form-picasa").addClass("active").removeClass("hidden");
						},
					}
					// {	
					// 	text: 'Upload Images',
					// 	onclick: function()
					// 	{ 	
					// 		$(".pi_general").slideUp('fast');
					// 		tb_show("Settings", "#TB_inline?height=800&amp;width=1000&amp;inlineId=pi-ifg-popup-wrapper");
					// 		$(".pi_form_setting").removeClass("active");
					// 		$(".pi_only_one").addClass("hidden");
					// 		$("#pi-ifg-form-upload").addClass("active").removeClass("hidden");
					// 	},
					// },
		       	]
			})

			editor.onBeforeSetContent.add(function(ed, o)
			{
				o.content = piReplaceShortcodeWithImg(o.content, ed);
			})

			editor.onPostProcess.add(function(ed, o) 
			{
				if (o.get)
				{
					o.content = piReplaceImgWithShortcode(o.content);
				}
			});

			editor.onExecCommand.add( function(ed, cmd)
			{
				if (cmd === 'mceInsertContent')
				{	
					var _getContent = tinyMCE.activeEditor.getContent();
					tinyMCE.activeEditor.setContent( piReplaceShortcodeWithImg(_getContent, ed) );
				}
			})

			editor.onInit.add(function(ed)
			{
				piEditShortcode(ed);
			})
		});
		
		function piReplaceShortcodeWithImg(co, ed)
		{
			var reg, image;

			reg = new RegExp('\\[(pi_ifg)([^\\]]*)\\]', 'g');
			return co.replace( reg, function(match, shortcode, attr)
			{
				if ( match.search('flickr') != -1 )
				{
					image = 'flickr.png';
				}else if ( match.search('instagram') != -1 )
				{
					image = 'instagram.png';
				}else{
					image = 'picasa.png';
				}

				return "<img data-shortcodeid='pi_ifg' data-mce-placeholder='true' src='"+PIFIPIURL+image+"' class=\'pi-edit-ifg-gallery data-mce-placeholder mceItem\'  data-shortcodes='"+tinymce.DOM.encode(attr)+"' data-command=\'pi-ifg-edit\'>";
			})
		}
		
		function piEditShortcode(ed)
		{
			
			var _self = this, $oInfo = {}, _params = ['pi_theme', 'pi_instagram_get', 'pi_instagram_tagname', 'pi_instagram_client_id', 'pi_instagram_user_id', 'pi_instagram_access_token', 'pi_user_id', 'pi_type', 'pi_photo_set', 'thumbnail_width', 'thumbnail_height', 'pagination_max_thumbnail_lines_per_page', 'thumbnail_gutter_height', 'max_item_per_line', 'pi_breadcrumb'];
			ed.on( 'mousedown', function( event ) 
			{
				var _target,  _getData, $shortcodeId, parseData, _regex, $control = $("#"+_popupID), $formControl="";
				_target = event.target;
				if ( _target && $(_target).data("shortcodeid") == "pi_ifg"  )
				{
					parseData = function(s, n)
					{
						n = new RegExp(n + '=[\"\']([^\"\']+)[\'\"]', 'g').exec(s);
						return n ? tinymce.DOM.decode(n[1]) : '';
					}

				 	if($(_target).attr("data-mce-selected") == 1)
					{
						_getData = $(_target).data("shortcodes");
						$shortcodeId = parseData(_getData, 'data_shortcodeid');						
						
						for ( var i in _params )
						{
							_regex 	= new RegExp(_params[i]+"=\"([^\"]*)", 'g');
							_target = _regex.exec(_getData)
							
							_target = _target ? _target[1] : "";

							/*=========================================*/
							/*	Hidden Other Setting
							/*=========================================*/
							if ( _params[i] == 'pi_type' )
							{
								$("#"+_popupID + " .pi_only_one").addClass("hidden");
								$(_oFormControl[_target]).addClass("active").removeClass("hidden");

								if ( _target == 'instagram' )
								{
									pi_instagram_switcher();
								}
							}

							$control.find("[name='"+_params[i]+"']").val(_target);

						}
						tb_show("Settings", "#TB_inline?height=800&amp;width=1000&amp;inlineId="+_popupID);
					}
				}		
			})
		}

		function piReplaceImgWithShortcode(co)
		{
			var _gAttrs, _shortcode;
			function getAttrs(s, n)
			{
				n = new RegExp(n + '=\"([^\"]+)\"', 'g').exec(s);
				if ( n )
				{
					return tinymce.DOM.decode(n[1]);
				}else{
					return '';
				}
			};

			function getShortcode(s, n)
			{
				n = new RegExp(n + '=[\"\']([^\"\']+)[\'\"]', 'g').exec(s);
				return n  ? tinymce.DOM.decode(n[1]) : '';
			}

			return co.replace(/(?:<p[^>]+>)*(<img[^>]+>)(?:<\/p>)*/g, function(match, img)
			{
			 	_gAttrs      = getAttrs(img, 'data-shortcodes');
			 	_shortcode   = getShortcode(img, 'data-shortcodeid');

				if ( _shortcode == 'pi_ifg' )
				{
					return '[pi_ifg data_shortcodeid=\'pi_ifg\' '+tinymce.trim(_gAttrs)+']';
				}
				return match;
			})			
		}

		function pi_instagram_switcher()
		{
			$(".pi_instagram_get").change(function()
			{
				var _val = $(this).val();
				$(".pi_instagram_setting").fadeOut();
				switch (_val)
				{
					case 'users':
						$(".pi_users").fadeIn();
						break;

					case 'tag':
						$(".pi_tag").fadeIn();
						break;

					default:
						$(".pi_popular").fadeIn();
						break;
				}
			}).trigger("change");
		}
		

		$.fn.pi_fig_toggle = function()
		{
			var _class = "";
			$(this).click(function()
			{	
				_class = $(this).data("pattern");
				if ( typeof _class !='undefined' )
				{
					$(this).nextUntil(_class).slideToggle();
				}else{
					$(this).nextAll().slideToggle();
				}
				
				return false;
			});
		}	
		

		$(".pi_fig_toggle").pi_fig_toggle();
		$(".pi_fig_click_toggle").pi_fig_toggle();


		$("#pi-ifg-save").click(function()
		{
			var _settings = "", _generalSettings="", _currentHandle, _allow=true;

			_currentHandle = $(".pi_form_setting.active").data("form");

			switch ( _currentHandle )
			{
				case 'flickr':
					if ( $("[name='flickr_id']").val() == "" )
					{
						_allow = false;
					}
				break;
			}

			if ( _allow == true )
			{
				_settings = $(".pi_form_setting.active").getContent();
				_generalSettings = $("#pi-ifg-form-general").getContent();
				_settings = '<div class="pi_wrap_fipg">[pi_ifg ' + _settings + ' ' +_generalSettings+']</div>&nbsp;';

				tinyMCE.activeEditor.execCommand('mceInsertContent', 0, _settings);
				pi_reset();
				tb_remove();
			}else{
				alert("Please fill all required");
			}
			return false;
		})

		$("#pi-ifg-cancel").click(function(){
			pi_reset();
			tb_remove();
		})


		function pi_reset()
		{
			document.getElementById("pi-ifg-form-flicrk").reset();
			document.getElementById("pi-ifg-form-general").reset();		
		}


		if ( !$().getContent )
		{
			$.fn.getContent = function()
			{
				var $items = $(this).find(".pi_item"), _aSettings = [], _setting;
				
				$items.each(function()
				{
					_setting  = $(this).attr("name") + '="' + $(this).val() + '"';
					_aSettings.push(_setting);
				})
				
				_setting = _aSettings.join(" ");
				_setting = _setting.trim();

				return _setting;
			}
		}

	})

})(jQuery, window, document);