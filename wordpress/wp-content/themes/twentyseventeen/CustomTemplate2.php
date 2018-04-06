<?php 
/* 
 Template Name: CustomTemplate2
*/ 
?>
<?php get_header()?>
<div id="Custom">
	
<?php 
while ( have_posts() ) : the_post(); 
   $value = get_field_objects();
   $fields = array();
   foreach ($value as $values) {
   $fields = apply_filters('acf/field_group/get_fields',$fields,$values['field_group']);
  }
    foreach( $fields as $field )
		{?>
		<h2><?php echo $field['label']?></h2>
		<?php
		the_field($field['name'],$value['field_group'],true);	
}
?>
<p><?php the_content(); ?></p>
<?php endwhile; // end of the loop. ?>
</div>
<?php get_footer(); ?>