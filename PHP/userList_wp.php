<?php
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
$table.="	<div class=\" wrap\">
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
$table.="	<tbody id=\"the-list\">
            <tr class=\"alternate\" valign=\"top\">
			<td class='column-columnname'>{$this->name}</td>
			<td class='column-columnname'>{$this->email}</a></td>
			<td class='column-columnname'><a href='?page=my_menu1&id=".$this->row->id."'>Edit</a></td>
			<td class='column-columnname'><a href='?page=my_menu' id='".$this->row->id."' class=\"btn\">Delete</a></td>
			</tr>";
}
echo $table;
}
}       
$lists= new Custom_List_Table();
$lists->list_order();
?>			
			

			
            

