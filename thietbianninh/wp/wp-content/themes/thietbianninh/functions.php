<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}



// My Functions


function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'vertical-menu' => __( 'Vertical Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function wpdocs_custom_excerpt_length( $length ) {
    return 60;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a class="read-more" href="%1$s" title="Đọc chi tiết">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( '.. <i class="fa fa-angle-double-right" aria-hidden="true"></i>', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function the_breadcrumb() {
                echo '<ul id="crumbs">';
        if (!is_home()) {
                echo '<li><a href="';
                echo get_option('home');
                echo '">';
                echo 'Home';
                echo "</a></li>";
                if (is_category() || is_single()) {
                        echo '<li>';
                        the_category(' </li><li> ');
                        if (is_single()) {
                                echo "</li><li>";
                                the_title();
                                echo '</li>';
                        }
                } elseif (is_page()) {
                        echo '<li>';
                        echo the_title();
                        echo '</li>';
                }
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
        elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
        echo '</ul>';
}

add_filter( 'woocommerce_breadcrumb_defaults', 'ik_woocommerce_breadcrumbs' );
function ik_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<ul class="woocommerce-breadcrumb breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</ul>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Trang chủ', 'breadcrumb', 'woocommerce' ),
        );
}



//Load the theme CSS
function theme_styles() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css');
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.carousel.css');
    wp_enqueue_style( 'transitions', get_template_directory_uri() . '/assets/css/owl.transitions.css');
    wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css');
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css');
    // wp_enqueue_style( '480',get_template_directory_uri() . '/assets/css/480.css');
    // wp_enqueue_style( '768',get_template_directory_uri() . '/assets/css/768.css');
    // wp_enqueue_style( '992',get_template_directory_uri() . '/assets/css/992.css');
}
//Load the theme JS
function theme_js() {
    //Adds JQuery from Google's CDN. Code pulled from www.http://css-tricks.com/snippets/wordpress/include-jquery-in-wordpress-theme/
    if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
    function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );

    // wp_enqueue_script( 'owl_js', get_template_directory_uri() . '/owlcarousel/owl.carousel.js', array('jquery'), '', true );

    // wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), '', true );

}

add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );



//nav walker

require_once('wp_bootstrap_navwalker.php');
require_once('templates/sketch-breadcrumb.php');

// new sidebar

add_action( 'widgets_init', 'theme_widgets_init' );
function theme_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Left Page Sidebar', 'left_sidebar' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'left_sidebar' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );

        register_sidebar( array(
        'name' => __( 'Left shop Sidebar', 'left_shop_sidebar' ),
        'id' => 'sidebar-2',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'left_shop_sidebar' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
}




/*
* goes in theme functions.php or a custom plugin. Replace the image filename/path with your own :)
*
**/
add_action( 'init', 'custom_fix_thumbnail' );
 
function custom_fix_thumbnail() {
  add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
   
    function custom_woocommerce_placeholder_img_src( $src ) {
    $upload_dir = wp_upload_dir();
    $uploads = untrailingslashit( $upload_dir['baseurl'] );
    $src = $uploads . '/2017/05/anninh.png';
     
    return $src;
    }
}


function add_search_form($items, $args) {
if( $args->theme_location == 'main-menu' )
        $items .= '<li>
                '.get_search_form().'
            </li>';
        return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);



add_filter( 'woocommerce_get_price_html', 'wpa83367_price_html', 100, 2 );
add_filter( 'woocommerce_template_single_price', 'wpa83367_price_html', 10);
    function wpa83367_price_html( $price, $product ) {
   // return $product->price;
    if ( $product->price > 0 ) {
      if ( $product->price && isset( $product->regular_price ) ) {
        $from = $product->regular_price;
        $to = $product->price;
        if($from == $to) {
            return '<span class="pro_price">'. ( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'</span>';
        }
        else {
            return '<span class="pro_price">'. ( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'</span>'.' '.'<span class="pro_marketPrice">'.( ( is_numeric( $form ) ) ? woocommerce_price( $from ) : $from ) .'</span>';
        }
        
      } else {
        $to = $product->price;
        return '<span class="pro_marketPrice">' . ( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) . '</span>';
      }
   } else {
     return '<span class="pro_price">Liên Hệ</span>';
   }
 }




remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10); 

function woocommerce_template_single_price() { 
    wc_get_template( 'single-product/price.php' ); 
} 