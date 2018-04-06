<div id="sidebar-secondary">
<div class="sider-box">
<div class="widget-title"><h4>About<h4></div> 
<?php the_author_meta( 'description' ); ?>
</div>
<div class="sider-box">
<div class="widget-title"><h4>Archives</h4></div>
<?php wp_get_archives( 'type=monthly' ); ?>
</div>
<div class="sider-box">
<?php wp_list_categories(); ?>
</div>
</div>
<div id="sidebar-left">
  <?php dynamic_sidebar( 'sidebar-left' ); ?>
</div>