$('document').ready(function()
{ 
    $("#img").change(function (){
       var fileName = $(this).val().replace(/C:\\fakepath\\/, '');
       $(".filename").html(fileName);
     });
    $("#doc").change(function (){
       var PdfName = $(this).val().replace(/C:\\fakepath\\/, '');
       $(".PdfFile").html(PdfName);
     });
    $('#the-list').find('tr').css('cursor', 'move') ;
    $('#the-list').sortable({
    update: function(event, ui) {
    var page_id_array = new Array();
    $('#the-list > tr').each(function(){
    page_id_array.push($(this).attr("data-article-id"));
    });
            opts = {
                url: ajaxurl, 
                type: 'POST',
                async: true, 
                cache: false,
                dataType: 'json',
                data:{
                    action:'item_order',
                    order:page_id_array
                },   
                
                success: function(data) {
                   alert(data); 
                },
                error: function(xhr,textStatus,e) {  // This can be expanded to provide more information
                    
                 return; 
                }
            };
            $.ajax(opts);
        }
        });
});
    // var itemList = $('#the-list');
    // itemList.find('tr').css('cursor', 'move') ;
    // itemList.sortable({
    // update: function(event, ui) {
    // var update_data = {};
    //                     itemList.find('.ui-sortable-handle').each(function(i, item){
    //                         var $tr = $(item);
    //                         var user_id = $tr.attr('id');
    //                         var $menu_order_td = $tr.find('.ui-sortable-handle');
    //                         update_data[user_id] = $menu_order_td.text();
    //             });
             
    //         opts = {
    //             url: ajaxurl, 
    //             type: 'POST',
    //             async: true,
    //             cache: false,
    //             dataType: 'json',
    //             data:{
    //                 action:'item_sort',
    //                 order:update_data
    //             },   
                
    //             success: function(data) {
    //                 return; 
    //             },
    //             error: function(xhr,textStatus,e) {  // This can be expanded to provide more information
    //                 alert('There was an error saving the updates');
    //              return; 
    //             }
    //         };
    //         $.ajax(opts);
    //     }
    //     });
    //     itemList.disableSelection();
    // jQuery.fn.reverse = [].reverse;
    //                 var update_orders = function() {
    //                     var $the_list = $('#the-list');
    //                     $the_list.addClass('updating').sortable( "disable" ).css('cursor', 'no-drop');
    //                     // normalize values:
    //                     // force values to int (make "0" if missing)
    //                     $the_list.find('tr').each(function(i, item){
    //                         var $tr = $(item);
    //                         var $menu_order_td = $tr.find('.ui-sortable-handle');
    //                         $menu_order_td.text( parseInt( '0'+$menu_order_td.text() ) );
    //                     });
    //                     // do a one-pass bubble sort and mark updated needed
    //                     var $last_tr = null;
    //                     $the_list.find('tr').each(function(i, item){
    //                         var $tr = $(item);
    //                         var $menu_order_td = $tr.find('.ui-sortable-handle');
    //                         if ( $last_tr !== null ) {
    //                             var $last_menu_order_td = $last_tr.find('.ui-sortable-handle');
    //                             if ( parseInt( $last_menu_order_td.text() ) >= parseInt( $menu_order_td.text() ) ) {
    //                                 var tmp = $menu_order_td.text();
    //                                 $menu_order_td.text( $last_menu_order_td.text() );
    //                                 $last_menu_order_td.text( tmp );
    //                                 $last_tr.addClass( 'update_menu_order_needed');
    //                                 $tr.addClass( 'update_menu_order_needed' );
    //                             }
    //                         }
    //                         $last_tr = $tr;
    //                     });
    //                     // do a one-pass bubble sort in the oposite direction and mark updated needed
    //                     $last_tr = null;
    //                     $the_list.find('tr').reverse().each(function(i, item){
    //                         var $tr = $(item);
    //                         var $menu_order_td = $tr.find('.ui-sortable-handle');
    //                         if ( $last_tr !== null ) {
    //                             var $last_menu_order_td = $last_tr.find('.ui-sortable-handle');
    //                             if ( parseInt( $last_menu_order_td.text() ) < parseInt( $menu_order_td.text() ) ) {
    //                                 var tmp = $menu_order_td.text();
    //                                 $menu_order_td.text( $last_menu_order_td.text() );
    //                                 $last_menu_order_td.text( tmp );
    //                                 $last_tr.addClass( 'update_menu_order_needed');
    //                                 $tr.addClass( 'update_menu_order_needed' );
    //                             }
    //                         }
    //                         $last_tr = $tr;
    //                     });
    //                     // make sure values are unique, increase where needed
    //                     $last_tr = null;
    //                     $the_list.find('tr').each(function(i, item){
    //                         var $tr = $(item);
    //                         var $menu_order_td = $tr.find('.ui-sortable-handle');
    //                         if ( $last_tr !== null ) {
    //                             var $last_menu_order_td = $last_tr.find('.ui-sortable-handle');
    //                             // do a one-pass bubble sort
    //                             if ( parseInt( $last_menu_order_td.text() ) === parseInt( $menu_order_td.text() ) ) {
    //                                 $menu_order_td.text( parseInt( $last_menu_order_td.text() ) + 1 );
    //                                 $tr.addClass( 'update_menu_order_needed' ).css('font-weight', 'bold');
    //                             }
    //                             $menu_order_td.text( parseInt( '0'+$menu_order_td.text() ) );
    //                         }
    //                         $last_tr = $tr;
    //                     });
    //                     // collect data for AJAX based on update_menu_order_needed class
    //                     // also add spinner elements
    //                     var update_data = {};
    //                     $the_list.find('tr.update_menu_order_needed').each(function(i, item){
    //                         var $tr = $(item);
    //                         var user_id = $tr.attr('id');
    //                         var $menu_order_td = $tr.find('.ui-sortable-handle');
    //                         update_data[user_id] = $menu_order_td.text();
    //                         $tr.find('th:first-child')
    //                             .filter(':not(:has(.relative_wrap))')
    //                             .wrapInner('<div class="relative_wrap" style="position: relative;"></div>')
    //                             .end()
    //                             .find('.spinner')
    //                             .remove()
    //                             .end()
    //                             .find('.relative_wrap')
    //                             .append('<span class="spinner" style="display: block; position: absolute; top: -5px; left: 1px;"></span>')
    //                         ;
    //                     });
    //                     var data = {
    //                         action: 'item_sort',
    //                         order: update_data
    //                     };
    //                     // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
    //                     //noinspection JSUnresolvedVariable
    //                     $.post(ajaxurl, data, function() {
    //                         $the_list
    //                             .find('.spinner')
    //                             .remove()
    //                             .end()
    //                             .find('.update_menu_order_needed')
    //                             .removeClass('update_menu_order_needed')
    //                             .end()
    //                             .removeClass('updating')
    //                             .sortable( "enable" )
    //                             .css('cursor', 'move')
    //                         ;
    //                     });
    //                 };
    //                 $('#the-list:not(.ui-sortable)')
    //                     .css( 'cursor', 'move' )
    //                     .sortable({
    //                         start: function(event, ui) {
    //                             ui.item.addClass('alternate');
    //                             ui.item.width( ui.helper.width() );
    //                             ui.helper.find('th, td').each(function(i, item){
    //                                 var w = ui.item.parent().parent().find('thead').find('th').eq(i).width();
    //                                 $(item).width( w );
    //                             });
    //                             ui.placeholder.css('display', 'table-row');
    //                             ui.placeholder.height( ui.helper.height() );
    //                             ui.placeholder.width( ui.helper.width() );
    //                             ui.item.parent().parent().parent().find('tr:not(.ui-sortable-helper)').find('th:hidden, td:hidden')
    //                                 .css({
    //                                     'visibility' : 'visible',
    //                                     'display' : 'table-cell',
    //                                     'overflow': 'hidden',
    //                                     'width': 0,
    //                                     'max-width': 0,
    //                                     'padding' : 0,
    //                                     'white-space': 'nowrap'
    //                                 })
    //                             ;
    //                         },
    //                         update: function() {
    //                             $(this).find('tr')
    //                                 .removeClass('alternate')
    //                                 .filter(':even')
    //                                 .addClass('alternate')
    //                             ;
    //                             update_orders();
    //                         }
    //                     })
                   