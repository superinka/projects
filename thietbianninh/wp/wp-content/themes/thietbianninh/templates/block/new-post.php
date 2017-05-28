<div class="row-fluid">
    <div class="lastest-post block">
      <div class="block-title title1"><h2><span>Bài viết</span></h2><div class="customNavigation nav-left-product">
          <a title="Previous" class="btn-bs prev-bs-2 fa fa-angle-left"></a>
          <a title="Next" class="btn-bs next-bs-2 fa fa-angle-right"></a>
        </div>
      </div>
      <!--lastest-post -->
      <div class="owl-carousel-lastest-post">
      <?php $the_query = new WP_Query( 'posts_per_page=4' ); ?>
      <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
        <!--one-post -->
        <div class="one-post">
          <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
          <div class="item-description">
            <?php the_excerpt(__('(more…)')); ?>
          </div>
        </div>
        <!--end-one-post -->
      <?php 
      endwhile;
      wp_reset_postdata();
      ?> 
    
      </div>
      <!--end-lastest-post -->
    </div>
</div>