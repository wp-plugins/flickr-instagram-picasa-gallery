;(function($, window, document){

	"use strict"

    if ( !$().pi_upload )
    {
    	$.fn.pi_upload  = function()
    	{
    		var _oDefaults = {}, _self, $getData, isMultile = false, file_frame, $insertTo, $insertVal, $parent;
    	
    		$(this).bind("click",function()
    		{
                _self      = $(this);
                $getData   = _self.data();
                $parent    = _self.closest(".awe-wrap-upload");
                $insertTo  = $parent.find($getData.insertto);
                $insertVal = $parent.find(".awe_insert_val");
              	

                if ( typeof $getData.multiple != 'undefined' )
                {
                    isMultile = true;
                }
             	
                /* Create the media frame */
                file_frame = wp.media.frames.file_frame = wp.media(
                {
                    title: $(this).data( 'uploader_title' ),
                    button: {
                        text: $(this).data('uploader_button_title'),
                    },
                    multiple: isMultile,

                })

                /* When an image or many images is selected, run a callback */
                file_frame.on("select", function()
                {
                    var selection = file_frame.state().get('selection');

                    switch (isMultile)
                    {
                        case true:
                            var ids = [], urls = [], idsurls = [];

                            selection.map(function(attachment)
                            {
                                attachment 	= attachment.toJSON();
                                ids.push(attachment.id);

                                if (typeof attachment.sizes.thumbnail !== 'undefined')
                                {
                                    urls.push(attachment.sizes.thumbnail.url);
                                }else{
                                    urls.push(attachment.url);
                                }
                            });

                            var oldids = $.map($insertVal.val().split(","), function(value)
                            {
                                if (value != "")
                                    return parseInt(value, 10);
                            });
                            
                            var $imgs = "", $slider="", $aweImages="";

                            for (var j = 0; j < ids.length; j++)
                            {
                                oldids.push(ids[j]); 

                                $imgs += '<li class="attachment img-item width-300" data-id="'+ids[j]+'">';
                                    $imgs += '<img  src="' + urls[j] + '" />';
                                    $imgs += '<a class="awe-remove" href="#">';
                                        $imgs += '<i class="fa fa-times"></i>';
                                    $imgs += '</a>';
                                $imgs += '</li>';
                            }


                            $insertVal.val(oldids);

                            $insertTo.append($imgs);

                            break;

                        case false:
                            var _getUrl, _getID;
                            selection.map(function(attachment)
                            {
                                attachment = attachment.toJSON();
                                _getID 	   =  attachment.id;
                                _getUrl    = attachment.url;
                            });

                            if ( typeof $getData.geturl !='undefined' )
                            {
                                $insertVal.val(_getUrl);
                            }else{
                              	$insertVal.val(_getID);  
                            }
                            

                            var img = '<img width="260" height="270" src="'+_getUrl+'">';

                            $insertTo.html(img);
                        break;
                    }
                  
                })

                file_frame.open();
                return false;
            })   
    	}	
    	$(document).ready(function(){
    		$(".js_upload").pi_upload();
    	})
    }
})(jQuery, window, document)