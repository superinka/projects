        <!-- main-content -->
        <div class="main-content">
            <div class="container">
                <div class="col-md-12 col-xs-12">
                    <div class="row">
                        <div class="pro_menu_title">
                            <h2 style="position: relative;">
                                <i class="icon icon_menupro_home"></i>
                                <a href="/khoa-cua-dien-tu-dhome.html" class="cufon">Khóa cửa điện tử</a>
                                <ul class="sublst_title">

                                    <li><a href="/khoa-cua-dien-tu/khoa-cua-dien-tu-samsung.html">Khóa cửa Samsung</a></li>

                                    <li><a href="/khoa-cua-adel.html">Khóa cửa ADEL</a></li>

                                    <li><a href="/khoa-cua-yale.html">Khóa cửa Yale</a></li>

                                    <li><a href="/khoa-dien-tu-epic.html">Khóa điện tử EPIC</a></li>

                                    <li><a href="/khoa-cua-dien-tu-evernet.html">Khóa cửa điện tử EverNet</a></li>

                                </ul>
                            </h2>
                            <div class="pro_submenu_title">

                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 2px;">
                        <div class="col-md-10 col-xs-12 grid-products">
                            <div class="row">
                                <?php
                                    $args = array( 'post_type' => 'product', 'posts_per_page' => 8, 'product_cat' => 'khoa-cua-dien-tu', 'orderby' => 'rand' );
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                                        
                                            <div class="col-md-3 col-xs-12 pro_item">
                                                <?php if ($product->is_on_sale() && $product->product_type == 'variable') : ?>

                                                    <div class="pin_sale">
                                                            <div class="inside">
                                                            <div class="inside-text">
                                                                <?php 
                                                            $available_variations = $product->get_available_variations();								
                                                            $maximumper = 0;
                                                            for ($i = 0; $i < count($available_variations); ++$i) {
                                                                $variation_id=$available_variations[$i]['variation_id'];
                                                                $variable_product1= new WC_Product_Variation( $variation_id );
                                                                $regular_price = $variable_product1 ->regular_price;
                                                                $sales_price = $variable_product1 ->sale_price;
                                                                $percentage= round((( ( $regular_price - $sales_price ) / $regular_price ) * 100),1) ;
                                                                    if ($percentage > $maximumper) {
                                                                        $maximumper = $percentage;
                                                                    }
                                                                }
                                                                echo $price . sprintf( __('%s', 'woocommerce' ),'-'.$maximumper . '<sub>%</sub>' ); ?></div>
                                                            </div>
                                                    </div><!-- end callout -->

                                                <?php elseif($product->is_on_sale() && $product->product_type == 'simple') : ?>
                                                    
                                                    <div class="pin_sale">
                                                            <div class="inside">
                                                                <div class="inside-text">
                                                                    <?php 
                                                                $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
                                                                echo $price . sprintf( __('%s', 'woocommerce' ),'-'.$percentage . '<sub>%</sub>' ); ?></div>
                                                            </div>
                                                        </div><!-- end bubble -->

                                                <?php endif; ?>
                                           
                                                <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>" class="pro-link">
                                                    <div class="pro_image">

                                                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                                                    </div>
                                                    <span class="pro_name"><?php the_title(); ?></span>
                   
                                                    <span class="price"><?php echo $product->get_price_html(); ?></span>  
                                                </a>
                                            </div>


                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                                
                            </div>
                        </div>
                        <div class="col-md-2 hidden-xs right-a">
                            <img class="img-responsive" src="http://dhome.vn/media/banner/banner_3c59dc04.jpg">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- /main-content -->