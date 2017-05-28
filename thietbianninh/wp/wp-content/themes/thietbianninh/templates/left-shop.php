<div class="col-xs-12 col-sm-6 col-md-3 vertical-menu">
    <div class="row-fluid">
      <div class="mega-left-title">
        <strong>Danh mục</strong>
      </div>
      <?php 
        wp_nav_menu( array(
            'theme_location' => 'vertical-menu',
            'container_class' => 'wrapper_vertical_menu vertical_megamenu',
            'items_wrap'     => '<ul id="%1$s menu-left" class="%2$s nav vertical-megamenu">%3$s</ul>'
        ) );
      ?>

    </div>
  <?php get_template_part('templates/block/recent-product'); ?>
  <?php get_template_part('templates/block/new-product'); ?>
  

</div>
<!-- end vertical-menu -->