 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Demo Blog</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo get_bloginfo( 'template_directory' );?>/blog.css" rel="stylesheet">
    <?php wp_head();?>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
  	$( function() {
    $("#accordion").accordion({header: "h3",collapsible: true, active: true });
    });
  </script>	
 </head>
<body>
  <div class="blog-masthead">
    <div class="container">
     <nav class="blog-nav">
        <a class="blog-nav-item active" href="http://localhost:8080/wordpress/">Home</a>
 <?php register_nav_menus( array(
     'primary-nav' => "Primary Menu",
     'footer-nav' => "Footer Menu"
 ) );
    wp_nav_menu( array(
     'theme_location' => 'primary-nav',
     'menu' => 'Primary Navigation',
          'menu_id' => 'nav'
) );
?>
</nav>
    </div>
  </div> 
  <div id="view">
<img src="<?php bloginfo('template_directory');?>/images/patrick-tomasso-301239.jpg" alt="alt text" id="sec"/>
  </div>
<?php 
$url= get_stylesheet_directory_uri()."/images/icons8-sort-down-50 (1).png";
$args = array(
    'post_type' => 'FAQ',
    'posts_per_page' => 20,
    'meta_query' =>array('key' => 'FAQ_fields')
    );
$obituary_query = new WP_Query($args);
while ($obituary_query->have_posts()) : $obituary_query->the_post();
  $posts_array = get_posts($args);
  $metaData = array();
foreach($posts_array as $key => $value){
    $metaData[]= get_post_meta($value->ID,'FAQ_fields', false);
}
$keys = array_keys($metaData);
 endwhile;
echo "<div id=\"accordion\">";
for($i = 0; $i < count($metaData); $i++) {
foreach($metaData[$keys[$i]] as $key => $value){
echo "<div>
    <h3 class=\"question\">
    <img  src=\"$url\">
    {$value['text']}</h3>
    <p class=\"panel\">{$value['textarea']}</p>
    </div>";
   
    }
   }
echo "</div>";
 wp_reset_postdata();
?>
<?php wp_footer(); ?> 
</body>
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
 // $meta = get_post_meta( $post->ID, 'FAQ_fields', true ?>
<!-- // <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
// <table class="form-table">
// <tr>
//  <th><label for="FAQ_fields[text]">Questions</label></th>
//  <td>
  -->
 <!-- <?php -->
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
