<section id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Tin tức chung</h2>
                <p class="text-center wow fadeInDown">Hãy cập nhật tin tức mới từ website để cùng hưởng dịch vụ ưu đãi tốt nhất</p>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="blog-list">
                        <?php $args = array(
                            'posts_per_page'   => 5,
                            'offset'           => 0,
                            'category'         => '3',
                            'category_name'    => '',
                            'orderby'          => 'date',
                            'order'            => 'DESC',
                            'include'          => '',
                            'exclude'          => '',
                            'meta_key'         => '',
                            'meta_value'       => '',
                            'post_type'        => 'post',
                            'post_mime_type'   => '',
                            'post_parent'      => '',
                            'author'	   => '',
                            'author_name'	   => '',
                            'post_status'      => 'publish',
                            'suppress_filters' => true 
                        );
                        $posts_array = get_posts( $args ); 
                        foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
                
                        <div class="single-blog">
                            <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                                <article>
                                    <header class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php 
                                                    if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail();
                                                    }     
                                                ?>
                                                <span class="post-format post-format-video"><i class="fa fa-film"></i></span>
                                            </a>
                                        </div>
                                        <div class="entry-date"><?php the_date(); ?></div>
                                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <P><?php the_excerpt(); ?></P>
                                        <a class="btn btn-primary" href="<?php the_permalink(); ?>">Đọc Thêm</a>
                                    </div>

                                    <footer class="entry-meta">
                                        <span class="entry-author"><i class="fa fa-pencil"></i> <a href="#">Admin</a></span>
                                        <span class="entry-category"><i class="fa fa-folder-o"></i> <a href="#"><?php the_category( ', ' ); ?></a></span>
                                        <span class="entry-comments"><i class="fa fa-comments-o"></i> <a href="#"><?php comments_popup_link('Chưa có bình luận', '1 bình luận', '% bình luận'); ?></a></span>
                                    </footer>
                                </article>
                            </div>                        
                        </div>    
                        <!--/.single-blog-->         
                        <?php endforeach; 
                        wp_reset_postdata();?>                          
                    </div>
                    <!--/.blog-list-->
                </div>
                <!--/.col-sm-6-->
                <div class="col-sm-6">
                    <?php $args = array(
                        'posts_per_page'   => 5,
                        'offset'           => 0,
                        'category'         => '2',
                        'category_name'    => '',
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'include'          => '',
                        'exclude'          => '',
                        'meta_key'         => '',
                        'meta_value'       => '',
                        'post_type'        => 'post',
                        'post_mime_type'   => '',
                        'post_parent'      => '',
                        'author'	   => '',
                        'author_name'	   => '',
                        'post_status'      => 'publish',
                        'suppress_filters' => true 
                    );
                    $posts_array = get_posts( $args ); 
                    foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
                    <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                        <article class="media clearfix">
                            <div class="entry-thumbnail entry-thmbnail-small pull-left">
                                <?php 
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    }     
                                ?>
                                <span class="post-format post-format-gallery"><i class="fa fa-image"></i></span>
                            </div>
                            <div class="media-body">
                                <header class="entry-header">
                                    <div class="entry-date"><?php the_date(); ?></div>
                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <P>With a blow from the top-maul Ahab knocked off the steel head of the lance, and then handing to the steel</P>
                                    <a class="btn btn-primary" href="<?php the_permalink(); ?>">Đọc thêm</a>
                                </div>

                                <footer class="entry-meta">
                                    <span class="entry-category"><i class="fa fa-folder-o"></i> <a href="#"><?php the_category( ', ' ); ?></a></span>
                                    <span class="entry-comments"><i class="fa fa-comments-o"></i> <a href="#"><?php comments_popup_link('0', '1', '%'); ?></a></span>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; 
                    wp_reset_postdata();?>  
                    
                </div>
            </div>

        </div>
        <div class="container">
            <div class="view-more">
                <a class="btn btn-primary btn-block" href="#">Xem tất cả</a>
            </div>
        </div>
    </section>
