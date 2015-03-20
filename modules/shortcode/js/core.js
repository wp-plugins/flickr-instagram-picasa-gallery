;(function($, window, document, undefined)
{
	"use strict";


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
						tb_show("Settings", "#TB_inline?height=800&amp;width=1000&amp;inlineId=pi-ifg-popup-wrapper");
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
						tb_show("Settings", "#TB_inline?height=800&amp;width=1000&amp;inlineId=pi-ifg-popup-wrapper");
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
						tb_show("Settings", "#TB_inline?height=800&amp;width=1000&amp;inlineId=pi-ifg-popup-wrapper");
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
	});
	
	
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
		
	$.fn.pi_toggle = function()
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

	$(".pi_toggle").pi_toggle();
	$(".pi_click_toggle").pi_toggle();

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
			_settings = "[pi_ifg " + _settings + " " +_generalSettings+"]";
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


	

})(jQuery, window, document);