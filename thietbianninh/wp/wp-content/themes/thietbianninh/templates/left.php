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
  <?php get_template_part('templates/block/new-product'); ?>

  <?php get_template_part('templates/block/new-post'); ?>

  <div class="row-fluid">
    <div class="contact-us block">
      <div class="block-title title1"><h2><span>Liên Hệ</span></h2>
      </div>
      
      <ul class="contact-us">
        <li><span class="sp-ic fa fa-home">&nbsp;</span>Số nhà 127 ngõ 164 Vương Thừa Vũ- Quận Thanh Xuân- Thành Phố Hà Nội</li>
        <li><span class="sp-ic fa fa-phone">&nbsp;</span>Telephone: <a title="Call:(801) 2345 - 6789" href="tel:+84123456789">0982063003</a></li>
        <li><span class="sp-ic fa fa-envelope">&nbsp;</span>E-mail: <a style="font-size:13px"title="hvthainm2010@gmail.com" href="mailto:hvthainm2010@gmail.com">hvthainm2010@gmail.com</a></li>
      </ul>
    </div>
    <!--end-contact-us -->
  </div>

  <?php get_template_part('templates/block/testimonials'); ?>

</div>
<!-- end vertical-menu -->