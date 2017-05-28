


<div class="col-xs-12 col-sm-6 col-md-9 categories-box">
    <div class="row featured-list block">
      <div class="block-title title1"><h2><span>Sản phẩm nổi bật</span></h2><div class="customNavigation nav-left-product">
          <a title="Previous" class="btn-bs prev-bs-3 fa fa-angle-left"></a>
          <a title="Next" class="btn-bs next-bs-3 fa fa-angle-right"></a>
        </div>
      </div>
      <div class="owl-carousel-featured-list">
        <?php 
            $args = array( 'post_type' => 'product', 'meta_key' => '_featured','posts_per_page' => 9,'columns' => '3', 'meta_value' => 'yes' );

            $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
        <div class="one-f">
            <figure class="effect-winston">
              <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
              <div class="f2">
                
                <h2><span>
                <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                <?php the_title(); ?>
                </a>
                </span></h2>

                <p>
                  <a href="#"><i class="fa fa-fw fa-search"></i></a>
                </p>
              </div>     
            </figure>
        </div>
        <?php 
        endwhile;
        wp_reset_query(); 
        ?>

      </div>

    </div>
    <div class="row cate-list">
      <div class="block-title title1"><h2><span><span>Các danh mục chính</span></span></h2></div>
      <?php 
            $args = array(
                    'taxonomy'               => null,
                    'orderby'                => 'name',
                    'order'                  => 'ASC',
                    'hide_empty'             => false,
                    'include'                => array('22','13','19','17','12','14','15','20','21','18','16','23'),
                    'exclude'                => array(),
                    'exclude_tree'           => array(),
                    'number'                 => '',
                    'offset'                 => '',
                    'fields'                 => 'all',
                    'name'                   => '',
                    'slug'                   => '',
                    'hierarchical'           => true,
                    'search'                 => '',
                    'name__like'             => '',
                    'description__like'      => '',
                    'pad_counts'             => false,
                    'get'                    => '',
                    'child_of'               => 0,
                    'parent'                 => '',
                    'childless'              => false,
                    'cache_domain'           => 'core',
                    'update_term_meta_cache' => true,
                    'meta_query'             => ''
              );

              $product_categories = get_terms( 'product_cat', $args );

              $count = count($product_categories);
               if ( $count > 0 ){
                   echo "<ul>";
                   foreach ( $product_categories as $product_category ) {
                    $thumbnail_id = get_woocommerce_term_meta( $product_category->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                     ?>
                      <li class="product-category">
                      <div class="col-md-4 col-sm-12 col-xs-12">
                        <figure>
                          <img class="img-responsive" style="height: 240px;width: 255px;"src="<?php echo $image; ?>">
                          <figcaption>
                            <h3><?php echo $product_category->name ?></h3>
                            <span><?php echo $product_category->count ?> sản phẩm</span>
                            <a href="<?php echo get_term_link( $product_category )?>">Xem</a>
                          </figcaption>
                        </figure>
                        <div class="cate-title">
                          <span><a href="<?php echo get_term_link( $product_category )?>"><?php echo $product_category->name ?></a></span>
                        </div>
                      </div>
                    </li>
                     <?php
                      
                   }
                   echo "</ul>";
               }
      ?>

        <div class="clearfix"></div>
      </ul>
    </div>
  </div>
  <!-- end categories-box -->