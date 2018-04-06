<?php 
register_sidebar(array(
    'name' => __('sidebar-left','theme demo'),
    'id'   => 'sidebar-left', 
    'before_widget' => '<div class="sidebar-box">',
    'after_widget' => '</div>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>'
    ));
function wpse_enqueue_page_template_styles() {
    if ( is_page_template( 'CustomTemplate.php' ) ) {
        wp_enqueue_style( 'page-template', get_template_directory_uri() . '/page-template.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );


function create_post_ENOIA() {
    register_post_type( 'ENOIA',
        array(
            'labels'       => array(
                'name'       => __('ENOIAs'),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'supports'     => array(
                'title',
                'thumbnail',
                'page-attributes',
), 
            'taxonomies'   => array(
                'post_tag',
                'category',
                
 ),
            'show_in_nav_menus' => true,
            'show_in_menu'      => true,
            'show_ui'           => true

        )
    );
    register_taxonomy_for_object_type( 'category', 'ENOIA' );
    register_taxonomy_for_object_type( 'post_tag', 'ENOIA' );
    
}
add_action( 'init', 'create_post_ENOIA' );
// function add_FAQ_fields_meta_box() {
//     add_meta_box(
//         'FAQ_fields_meta_box', // $id
//         'FAQ_fields', // $title
//         'show_FAQ_fields_meta_box', // $callback
//         'FAQ', // $screen
//         'normal', // $context
//         'high' // $priority
//     );
// }
// add_action( 'add_meta_boxes', 'add_FAQ_fields_meta_box' );
// function show_FAQ_fields_meta_box() {
// global $post;  
// $meta = get_post_meta( $post->ID, 'FAQ_fields', true );?>
// <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
// <table class="form-table">
// <tr>
//  <th><label for="FAQ_fields[text]">Questions</label></th>
//  <td>
 
//  <?php
//  $id = 'FAQ_fields[text]';
//  wp_editor($meta['text'],$id,array('tinymce' => false,
//  'media_buttons' => true )); ?>
// </td>
//  </tr> 
// <tr> 
//  <th><label for="FAQ_fields[textarea]">Answers</label></th>
//   <td>
//    <?php 
//    $editor = 'FAQ_fields[textarea]'; 
//   wp_editor( $meta['textarea'], $editor,array(
//     'tinymce' => false,
//     'media_buttons' => true )); ?>  
//  </td>
//  </tr>
//  </table>

// <?php
// }
//  function save_FAQ_fields_meta( $post_id ) {   
//      if (!isset($_REQUEST['nonce']) || (!wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__)))) {
//         return $post_id; 
//      }
//     $new = $_POST['FAQ_fields'];
//     $id = get_the_ID($post_id);
//     if($id == 0){
//         add_metadata( 'post', $post_id, 'FAQ_fields',$new );
//     }else{
//         update_post_meta($post_id, 'FAQ_fields',$new );
//     }
// }
// add_action( 'save_post', 'save_FAQ_fields_meta' );
// function load_custom_wp_admin_style() {
//     wp_register_script('result_js',includes_url('js/jquery/jquery-1.11.1.min.js',__FILE__),array('jquery'));
//     wp_enqueue_script('result_js');
//     wp_enqueue_style('boot_css',includes_url('css/jquery-ui-dialog.css',__FILE__));
//     wp_enqueue_style('value_css',includes_url('css/jquery-ui-dialog.min.css',__FILE__));
//     wp_register_script('unique_js',includes_url('js/jquery/ui/core.min.js',__FILE__),array('jquery'));
//     wp_enqueue_script( 'unique_js'); 
//     wp_register_script('user_js',includes_url('js/jquery/ui/widget.min.js',__FILE__),array('jquery'));
//     wp_enqueue_script( 'user_js'); 
//     wp_register_script('mouse_js',includes_url('js/jquery/ui/mouse.min.js',__FILE__),array('jquery'));
//     wp_enqueue_script( 'mouse_js'); 
//     wp_register_script('drag_js',includes_url('js/jquery/ui/draggable.min.js',__FILE__),array('jquery'));
//     wp_enqueue_script( 'drag_js');
//     wp_register_script('drop_js',includes_url('js/jquery/ui/droppable.min.js',__FILE__),array('jquery'));
//     wp_enqueue_script( 'drop_js');
//     wp_register_script('sort_js',includes_url('js/jquery/ui/sortable.min.js',__FILE__),array('jquery'));
//     wp_enqueue_script( 'sort_js');
//     wp_register_script('ajaxvalue_js',includes_url('js/ajaxvalue.js',__FILE__),array('jquery'));
//     wp_enqueue_script( 'ajaxvalue_js');
//     wp_localize_script('ajaxvalue_js', 'ValueAJAX', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
// }
// add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
// function my_save_value_order() {
//     global $wpdb;
//     $table_name = $wpdb->prefix .'posts';
//     $i = 0;
//     foreach($_POST["order"] as $data) {
//     $wpdb->query($wpdb->prepare("UPDATE $table_name SET menu_order='$i' WHERE ID='$data'"));
//     $i++;
   
// }
// die(1);
// }
// add_action('wp_ajax_value_order', 'my_save_value_order');
// add_action('wp_ajax_nopriv_value_order', 'my_save_value_order');
?>