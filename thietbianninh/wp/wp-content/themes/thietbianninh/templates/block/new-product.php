<div class="row-fluid">
<div class="lastest-product block">
  <div class="block-title title1"><h2><span>Sản phẩm mới</span></h2><div class="customNavigation nav-left-product">
      <a title="Previous" class="btn-bs prev-bs fa fa-angle-left"></a>
      <a title="Next" class="btn-bs next-bs fa fa-angle-right"></a>
    </div>
  </div>
  <!--lastest-product -->
  <div class="owl-carousel-lastest-product">
    <div class="one-p">
      <?php
      $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 9, 'product_cat' => '', 'orderby' =>'date','order' => 'DESC' );
      $loop = new WP_Query( $args );
      $d=0;
      $total = $loop->post_count; //$total;
      while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
      <!--one-p -->
        <?php if (($d==0)||($d==1)||($d==2)) { ?>

          <div class="bs-item-inner">
            <div class="item-img">
              <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>"title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img class="img-responsive" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
              </a>
            </div>
            <div class="item-content">
              <div class="star"></div>
              <h4><a href="<?php the_permalink(); ?>" title="Josen maset gasten"><?php the_title(); ?></a></h4>
              <p><span class="amount">Giá : <a href="">Liên hệ</a></span></p>
            </div>
          </div>
        <?php } ?>


      <?php $d++; ?>  
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>

    </div>

    <?php 
          $loopnumber =0;
          if (($total>3)&&($total<7)) {$loopnumber=1;}
          if($total>6) {$loopnumber=2;}

      if ($loopnumber > 0) {
        for ($i=0;$i<$loopnumber;$i++){ ?>
          <div class="one-p">
            <?php
            $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 9, 'product_cat' => '', 'orderby' =>'date','order' => 'DESC' );
            $loop = new WP_Query( $args );
            $dem=0;
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
              <?php if (($dem==($i+1)*3+0)||($dem==($i+1)*3+1)||($dem==($i+1)*3+2)) { ?>
                <div class="bs-item-inner">
                  <div class="item-img">
                    <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>"title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                      <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img class="img-responsive" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
                    </a>
                  </div>
                  <div class="item-content">
                    <div class="star"></div>
                    <h4><a href="<?php the_permalink(); ?>" title="Josen maset gasten"><?php the_title(); ?></a></h4>
                    <p><span class="amount">Giá : <a href="">Liên hệ</a></span></p>
                  </div>
                </div>
              <?php }?>
              <?php $dem++; ?> 
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
          </div>

        <?php } 
      }
     ?>

    
    

</div>
<!--end-lastest-product -->
</div>
</div>