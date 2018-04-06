;(function( $ ) {
    tinymce.PluginManager.add('ilist_short_btn', function( editor,url )
    {
        var shortcodeValues = [];

        editor.addButton('ilist_short_btn', {
            //type: 'listbox',
			title : 'Add iList Shortcode',
            text: 'iList',
            icon: false,
            //image : url + '/16_pixel.png',
            onclick : function(e){
                $.post(
                    ajaxurl,
                    {
                        action : 'show_shortcodes'
                        
                    },
                    function(data){
                        $('#wpwrap').append(data);
                    }
                )
            },
            values: shortcodeValues
        });
    });

    var selector = '';

    $(document).on( 'click', '.ilist-modal-content .close', function(){
        $(this).parent().parent().remove();
    }).on( 'click', '#add_shortcode',function(){
      var post = $('#ilist_post_select_shortcode').val();
      var upvote = $('.upvote_switcher:checked').val();
      var column = $('#ilist_column_shortcode').val();
     var item_orderby = $('#ilist_item_orderby').val();
	  
	  if(typeof(main_title)=='undefined'){
		  main_title = 0;
	  }
	  if(typeof(upvote)=='undefined'){
		  upvote = 'off';
	  }
	  
		var shortcodedata = '[qcld-ilist mode="one"';
	  if(post!==''){
		  shortcodedata +=' list_id="'+post+'"';
		  if(upvote!==''){
			  shortcodedata +=' upvote="'+upvote+'"';
		  }
		  
		  if(column!==''){
			  shortcodedata +=' column="'+column+'"';
		  }
		  if(item_orderby!==''){
			  shortcodedata +=' item_orderby="'+item_orderby+'"';
		  }
		  
		shortcodedata +=']';
		tinyMCE.activeEditor.selection.setContent(shortcodedata);
		 $('#sm-modal').remove();
	  }else{
		  alert('Please Select Post!');return;
	  }

    });

}(jQuery));