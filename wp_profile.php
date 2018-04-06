<?php 
/*Plugin Name:Reg_Profile
*Plugin URI:
*Description:demo_ravi
*Version: 1.0
*Author: Ravi
*Author URI:
*License: GPLv2+
*Text Domain:
*/
global $jal_db_version;
$jal_db_version = '1.0';
function plugin_options_install() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'user646';
  $sql="CREATE TABLE $table_name (
      id int(11) NOT NULL AUTO_INCREMENT,
      name tinytext NOT NULL,
      email VARCHAR(100) NOT NULL,
      age int(11) NULL,
      description VARCHAR(255) NOT NULL,
      gender VARCHAR(200) NOT NULL,
      DOB DATE NOT NULL,
      qualification VARCHAR(250) NOT NULL,
      image VARCHAR(255) NOT NULL,
      data VARCHAR(255) NOT NULL,
      display_order int(11) NOT NULL,
      PRIMARY KEY  (id)
    )";
$wpdb->query($sql);
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
}
 register_activation_hook(__FILE__,'plugin_options_install');
if (!class_exists('WP_List_Table')) {
        require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
    }
class Custom_List_Table extends WP_List_Table
{
       public $list;
       public $row;
        function __construct()
    {
         $this->list;
         $this->row;

            global $status, $page;
        parent::__construct();
     }   
function list_order(){
$table="";
$table.=" <div class=\" wrap\">
      <table class=\" wp-list-tabe widefat\">
      <thead>
      <tr>
      <th class='manage-column column-columnname column-primary scope='col'> Name</th>
      <th class='manage-column column-columnname scope='col'>Email</th>
      <th class='manage-column column-columnname scope='col'>Edit</th>
      <th class='manage-column column-columnname scope='col'>Delete</th>
      </tr>
      </thead>";
global $wpdb;
$this->list  = $wpdb->get_results("select name,email from wp_user646 ",ARRAY_A);
foreach($this->list as $this->row ){
$table.=" <tbody id=\"the-list\">
            <tr class=\"alternate\" valign=\"top\">
      <td class='column-columnname'>{$this->name}</td>
      <td class='column-columnname'>{$this->email}</a></td>
      <td class='column-columnname'><a href='?page=persons_form&id=".$this->row->id."'>Edit</a></td>
      <td class='column-columnname'><a href='?page=persons' id='".$this->row->id."' class=\"btn\">Delete</a></td>
      </tr>";
}
echo $table;
}
}    
function User_page_handler(){
add_menu_page('Users','Users',  'activate_plugins', 'users', ' User_value_page_handler');
    add_submenu_page('users','Users' , 'Users', 'activate_plugins', 'users', ' User_value_page_handler');
    // add new will be described in next part
    add_submenu_page('users', 'Add new' ,'Add new', 'activate_plugins', 'persons_form', 'User_form_page_handler');
 
 }// add_action('admin_menu', 'my_menu_pages');
add_action('admin_menu', 'User_page_handler');
function User_value_page_handler(){
   global $wpdb;
  $lists = new Custom_List_Table();
  ?>
  <div class="wrap">
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <h2><?php _e('Users', 'cltd_example')?> <a class="add-new-h2"
                                 href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=persons_form');?>"><?php _e('Add new', 'cltd_example')?></a>
    </h2>
    <form id="persons-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        
   <?php $lists->list_order() ;?>
    </form>
</div>
<?php
}
//call_user_func('User_value_page_handler');

//  function my_menu_pages(){
//  add_menu_page('Users', 'Users', 'manage_options','my-menu','User_value_page_handler');
//   add_submenu_page('my-menu', 'Submenu Page Title','Users','manage_options','my_menu','User_value_page_handler');
//   add_submenu_page('my-menu', 'Submenu Page Title2','Add new','manage_options','my_menu1','User_form_page_handler' );
// }
  

 

// add_action('admin_enqueue_scripts', 'ln_reg_css_and_js');

//    function ln_reg_css_and_js($hook)
//     {
//     $current_screen = get_current_screen();

//     if ( strpos($current_screen->base, 'my-menu') === false) {
//         return;
//     } else {
        //wp_enqueue_style('boot_css', plugins_url('css/bootstrap.css',__FILE__ ));
        //wp_enqueue_style('boot_js', plugins_url('css/style.css',__FILE__ ));
        // wp_enqueue_style('valid_js', plugins_url('css/bootstrapValidator.min.css',__FILE__ ));
        // wp_register_script('escape_js',plugins_url('js/jquery-1.11.1.min.js',__FILE__),array('jquery'));
        // wp_enqueue_script('escape_js');
        // wp_register_script('result_js',plugins_url('js/jquery.validate.min.js',__FILE__),array('jquery'));
        // wp_enqueue_script('result_js');
        // wp_register_script('custom-js',plugins_url('js/validation.js',__FILE__ ),array('jquery'));
        // wp_enqueue_script('custom-js');
       

        // wp_register_script('my_custom',plugins_url('js/bootstrapValidator.js',__FILE__ ),array('jquery'));
        // wp_enqueue_script('my_custom');
        // wp_register_script('my_custom_validator',plugins_url('js/bootstrapValidator.min.js',__FILE__ ),array('jquery'));
        // wp_enqueue_script('my_custom_validator');
        // wp_register_script('my_custom_moment',plugins_url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js',__FILE__ ),array('jquery'));
        // wp_enqueue_script('my_custom_moment');
        // wp_register_script('my_custom_datepicker',plugins_url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js',__FILE__ ),array('jquery'));
        //  wp_enqueue_script('my_custom_datepicker');
//         }
//     }
// function my_menu_output(){
//   include( plugin_dir_path( __FILE__ ).'php/createpage.php');
// }
// function include_plugin_file(){
//   include( plugin_dir_path( __FILE__ ).'php/userList_wp.php');
//   //wp_enqueue_style('boot_css', plugins_url('css/bootstrap.css',__FILE__ ));
//   wp_register_script('result_js',plugins_url('js/jquery-1.11.1.min.js',__FILE__),array('jquery'));
//   wp_enqueue_script('result_js');
//   wp_register_script('value_js',plugins_url('js/ajax.js',__FILE__),array('jquery'));
//   wp_enqueue_script('value_js');
//   wp_register_script('delete-js',plugins_url('js/delete_wp.js',__FILE__ ),array('jquery'));
//   wp_enqueue_script('delete-js');
//   wp_localize_script( "delete-js", "myLocalizedData", array('ajax_url' => admin_url( 'admin-ajax.php' ) ));
// }
//  function delete_row(){
//   if(isset($_REQUEST['info'])){
//     $value = $_REQUEST['info'];
//     global $wpdb;
//     $table = $wpdb->prefix.'user646';
//     $wpdb->show_errors();
//     $wpdb->delete($table,array('user_id'=> $value),array('%s'));
//     $wpdb->print_error();
//   }
//  }
// add_action('wp_ajax_your_delete_action','delete_row');      
// add_action( 'wp_ajax_nopriv_your_delete_action', 'delete_row');
// function menu_plugin_file(){
// include( plugin_dir_path( __FILE__ ).'php/editprofile.php');
// }
