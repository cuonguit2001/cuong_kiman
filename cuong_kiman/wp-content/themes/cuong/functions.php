<?php
/**
@Khai bao hang gia tri
    @THEME_URL =lay duong dan
    @CORE =lay core 
**/

define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/core' );
/**
@ core init 
*/

  
 /**
  @Truyen noi dung
  */  
if(!isset($content_width)){
    $content_width=620;
}

function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'main-menu') {
    $classes[] = 'header__nav--item nav__mobile--item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


if( function_exists('acf_add_options_page') && function_exists('pll_current_language') ) {
  if(pll_current_language() == false) {
    acf_add_options_page(array(
        'page_title'  => 'Theme Settings',
        'menu_title'  => 'Theme Settings',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false,
        'icon_url'    => 'dashicons-dashboard'
      ));
  } 
}
/**
    @Khai bao chuc nang cua theme
*/


if ( ! function_exists( 'cuong_theme_setup' ) ) {
    /* * 
    @Nếu chưa có h thì sẽ tạo mới hàm đó
     */
    function cuong_theme_setup() {
      

    $language_folder = THEME_URL . '/languages';
    load_theme_textdomain( 'cuong', $language_folder );

     add_theme_support( 'automatic-feed-links' );

     add_theme_support( 'post-thumbnails' );
 
    register_nav_menu( 'main-menu', __('Main Menu', 'cuong') );
        register_nav_menu( 'mobile-menu', __('Mobile Menu', 'cuong') );

     add_theme_support('post-formats',array(
        'image',    
        'video',
        'link',
        'gallery',
        'quote' 
     ));

    add_theme_support('title-tag');

$default_background = array(
   'default-color' => '#e8e8e8',
);
    add_theme_support('custom-background', $default_background );

    register_nav_menu ( 'primary-menu', __('Primary Menu', 'cuong') );

/* sidebar */

 $sidebar = array(
    'name' => __('Main Sidebar', 'cuong'),
    'id' => 'main-sidebar',
    'description' => 'Main sidebar for cuong',
    'class' => 'main-sidebar',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>'
 );
 register_sidebar( $sidebar );
    };
    add_action ( 'init', 'cuong_theme_setup' );


  }

  /* Function header*/
  if( !function_exists('cuong_header')){
    function cuong_header(){ ?>

        <div class="site-name">
            <?php
            if ( is_home() ){
                  printf('<h1><a href="%1$s" title="%2$s"> "%3$s"</a></h1>',
                  get_bloginfo('url'),
                  get_bloginfo('description'),
                  get_bloginfo('sitename')
                );
            
             } else{
                printf('<p><a href="%1$s" title="%2$s"> "%3$s"</a></p>',
                  get_bloginfo('url'),
                  get_bloginfo('description'),
                  get_bloginfo('sitename')
                );
            
             }
            ?>
        </div>
         <div class="site-description">  <?php bloginfo('description');?></div>
        <?php
    }
  }

  if ( ! function_exists( 'cuong_menu' ) ) {
    function cuong_menu( $slug ) {
      $menu = array(
        'theme_location' => $slug,
        'container' => 'nav',
        'container_class' => $slug,
        'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>',
        
      );
      wp_nav_menu( $menu );
    }
  }

  if(!function_exists('cuong_pagination')){
    function cuong_pagination(){

        if ( $GLOBALS['wp_query']->max_num_pages < 1) {
        return '';
      }
    ?>

    <div class="prev"><?php next_posts_link( __('Older Posts', 'cuong') ); ?></div>
    <nav class="pagination" role="navigation">
      <?php if ( get_next_post_link() ) : ?>
        <div class="prev"><?php next_posts_link( __('Older Posts', 'cuong') ); ?></div>
      <?php endif; ?>


      <?php if ( get_previous_post_link() ) : ?>
        <div class="next"><?php previous_posts_link( __('Newer Posts', 'cuong') ); ?></div>
      <?php endif; ?>


    </nav><?php  }

    }

if ( ! function_exists( 'cuong_thumbnail' ) ) {
    function cuong_thumbnail( $size ) {
?>
        <?php
      if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
        <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
      endif;
    }
  }



  if ( ! function_exists( 'cuong_entry_header' ) ) {
    function cuong_entry_header() {
      if ( is_single() ) : ?>
        <h1 class="entry-title">
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>
      <?php else : ?>
        <h2 class="entry-title">
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h2><?php


      endif;
    }
  }

   if( ! function_exists( 'cuong_entry_meta' ) ) {
    function cuong_entry_meta() {
      if ( ! is_page() ) :
        echo '<div class="entry-meta">';
          // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
          printf( __('<span class="author">Posted by %1$s</span>', 'cuong'),
            get_the_author() );


          printf( __('<span class="date-published"> at %1$s</span>', 'cuong'),
            get_the_date() );


          printf( __('<span class="category"> in %1$s</span>', 'cuong'),
            get_the_category_list( ', ' ) );


          // Hiển thị số đếm lượt bình luận
          if ( comments_open() ) :
            echo ' <span class="meta-reply">';
              comments_popup_link(
                __('Leave a comment', 'cuong'),
                __('One comment', 'cuong'),
                __('% comments', 'cuong'),
                __('Read all comments', 'cuong')
               );
            echo '</span>';
          endif;
        echo '</div>';
      endif;
    }
  }

  function cuong_readmore() {
  return '…<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'cuong') . '</a>';
}
add_filter( 'excerpt_more', 'cuong_readmore' );

if ( ! function_exists( 'cuong_entry_content' ) ) {
    function cuong_entry_content() {


      if ( ! is_single() ) :
        the_excerpt();
      else :
        the_content();


        /*
         * Code hiển thị phân trang trong post type
         */
        $link_pages = array(
          'before' => __('<p>Page:', 'cuong'),
          'after' => '</p>',
          'nextpagelink'     => __( 'Next page', 'cuong' ),
          'previouspagelink' => __( 'Previous page', 'cuong' )
        );
        wp_link_pages( $link_pages );
      endif;


    }
  }



if ( ! function_exists( 'cuong_entry_tag' ) ) {
  function cuong_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'cuong'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}


        /*
         * add file 
         */


  function cuong_style() {

  wp_register_style( 'bootstrap', get_template_directory_uri() . "/assets/library/bootstrap/bootstrap.min.css", 'all' );
  wp_enqueue_style('bootstrap');
   
    wp_register_style( 'fontawesome', get_template_directory_uri() . "/assets/library/fontawesome/css/all.min.css", 'all' );
    wp_enqueue_style('fontawesome');

    wp_register_style( 'select2', get_template_directory_uri() . "/assets/library/select2/css/select2.min.css", 'all' );
    wp_enqueue_style('select2');

    wp_register_style( 'swiper-bundle', get_template_directory_uri() . "/assets/library/swiper/swiper-bundle.min.css", 'all','1.0' );
    wp_enqueue_style('swiper-bundle');

  // wp_register_style( 'font-style', get_template_directory_uri() . "/assets/fonts/font-style.css", 'all','1.1.17' );
  // wp_enqueue_style('font-style');

  wp_register_style( 'global', get_template_directory_uri() . "/assets/styles/global.css", 'all', fileatime(get_template_directory()."/assets/styles/global.css") );
  wp_enqueue_style('global');

    wp_register_style( 'header', get_template_directory_uri() . "/assets/styles/layouts/header/header.css", 'all', fileatime(get_template_directory()."/assets/styles/layouts/header/header.css") );
    wp_enqueue_style('header');

    wp_register_style( 'footer', get_template_directory_uri() . "/assets/styles/layouts/footer/footer.css", 'all', fileatime(get_template_directory()."/assets/styles/layouts/footer/footer.css") );
    wp_enqueue_style('footer');

    wp_register_style( 'form', get_template_directory_uri() . "/assets/styles/widgets/form.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/form.css") );
    wp_enqueue_style('form');

    wp_register_style( 'popup', get_template_directory_uri() . "/assets/styles/widgets/popup.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/popup.css") );
    wp_enqueue_style('popup');

    wp_register_style( 'addOnGrounp', get_template_directory_uri() . "/assets/styles/widgets/addOnGrounp.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/addOnGrounp.css") );
    wp_enqueue_style('addOnGrounp');

    wp_register_style( 'customSelect2', get_template_directory_uri() . "/assets/styles/widgets/customSelect2.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/customSelect2.css") );
    wp_enqueue_style('customSelect2');

    wp_register_style( 'customSwiper', get_template_directory_uri() . "/assets/styles/widgets/customSwiper.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/customSwiper.css") );
    wp_enqueue_style('customSwiper');

    

    wp_enqueue_script('jquery');
    

    wp_register_script( 'bootstrap', get_template_directory_uri() . "/assets/library/bootstrap/bootstrap.bundle.min.js", 'all', '', true );
    wp_enqueue_script('bootstrap');

    $kiman = array( 
        'site_url' => get_option( 'siteurl'),
        'theme_url' => get_template_directory_uri(),
        'translate_text' => [
            'select_text_1' => pll_return('Nhấp chọn nghề nghiệp'),
            'select_text_2' => pll_return('Nhấp chọn')
        ]
    );
    wp_localize_script( 'bootstrap', 'kiman', $kiman );

    wp_register_script( 'swiper', get_template_directory_uri() . "/assets/library/swiper/swiper-bundle.min.js", 'all', '', true );
    wp_enqueue_script('swiper');

    // wp_register_script( 'lazy', get_template_directory_uri() . "/assets/library/lazy/jquery.lazy.min.js", 'all', '', true );
    // wp_enqueue_script('lazy');

  wp_register_script( 'select2', get_template_directory_uri() . "/assets/library/select2/js/select2.min.js", 'all', '1.1.17', true );
  wp_enqueue_script('select2');

    wp_register_script( 'numberToWord', get_template_directory_uri() . "/assets/library/number-to-word/numberToWord.min.js", 'all', '1.1.17', true );
    wp_enqueue_script('numberToWord');

    wp_register_script( 'circularProgressBar', get_template_directory_uri() . "/assets/library/circularProgressBar/circularProgressBar.min.js", 'all', '1.1.17', true );
    wp_enqueue_script('circularProgressBar');

  wp_register_script( 'global', get_template_directory_uri() . "/assets/scripts/global.js", 'all', fileatime(get_template_directory()."/assets/scripts/global.js"), true );
  wp_enqueue_script('global');

    wp_register_script( 'header', get_template_directory_uri() . "/assets/scripts/layouts/header/header.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/header/header.js"), true );
    wp_enqueue_script('header');

    wp_register_script( 'footer', get_template_directory_uri() . "/assets/scripts/layouts/footer/footer.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/footer/footer.js"), true );
    wp_enqueue_script('footer');

    wp_register_script( 'addOn', get_template_directory_uri() . "/assets/scripts/layouts/widgets/addOn.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/widgets/addOn.js"), true );
    wp_enqueue_script('addOn');

    wp_register_script( 'innitSelect', get_template_directory_uri() . "/assets/scripts/layouts/form/innitSelect.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/form/innitSelect.js"),true);
    wp_enqueue_script('innitSelect');

    wp_register_script( 'innitEventMulti', get_template_directory_uri() . "/assets/scripts/layouts/form/innitEventMulti.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/form/innitEventMulti.js"), true );
    wp_enqueue_script('innitEventMulti');

    wp_register_script( 'validateForm', get_template_directory_uri() . "/assets/scripts/layouts/form/validateForm.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/form/validateForm.js"), true );
    wp_enqueue_script('validateForm');

    wp_register_script( 'form', get_template_directory_uri() . "/assets/scripts/layouts/form/form.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/form/form.js"), true );
    wp_enqueue_script('form');

    wp_register_script( 'popup', get_template_directory_uri() . "/assets/scripts/layouts/widgets/popup.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/widgets/popup.js"), true );
    wp_enqueue_script('popup');

    if( is_singular('post') ) {
        wp_register_style( 'breadCrumb', get_template_directory_uri() . "/assets/styles/widgets/breadCrumb.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/breadCrumb.css") );
        wp_enqueue_style('breadCrumb');

        wp_register_style( 'news', get_template_directory_uri() . "/assets/styles/layouts/news/news.css", 'all', fileatime(get_template_directory()."/assets/styles/layouts/news/news.css") );
        wp_enqueue_style('news');

        wp_register_script( 'news', get_template_directory_uri() . "/assets/scripts/layouts/news/news.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/news/news.js"), true );
        wp_enqueue_script('news');
    }

    if( is_category() ) {
        wp_register_style( 'breadCrumb', get_template_directory_uri() . "/assets/styles/widgets/breadCrumb.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/breadCrumb.css") );
        wp_enqueue_style('breadCrumb');

        wp_register_style( 'product', get_template_directory_uri() . "/assets/styles/layouts/product/product.css", 'all', fileatime(get_template_directory()."/assets/styles/layouts/product/product.css") );
        wp_enqueue_style('product');

        wp_register_style( 'pagination', get_template_directory_uri() . "/assets/styles/widgets/pagination.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/pagination.css") );
        wp_enqueue_style('pagination');

        wp_register_script( 'product', get_template_directory_uri() . "/assets/scripts/layouts/product/product.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/product/product.js"), true );
        wp_enqueue_script('product');
    }

    if( is_tag() ) {
        wp_register_style( 'breadCrumb', get_template_directory_uri() . "/assets/styles/widgets/breadCrumb.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/breadCrumb.css") );
        wp_enqueue_style('breadCrumb');

        wp_register_style( 'product', get_template_directory_uri() . "/assets/styles/layouts/product/product.css", 'all', fileatime(get_template_directory()."/assets/styles/layouts/product/product.css") );
        wp_enqueue_style('product');

        wp_register_style( 'pagination', get_template_directory_uri() . "/assets/styles/widgets/pagination.css", 'all', fileatime(get_template_directory()."/assets/styles/widgets/pagination.css") );
        wp_enqueue_style('pagination');

        wp_register_script( 'product', get_template_directory_uri() . "/assets/scripts/layouts/product/product.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/product/product.js"), true );
        wp_enqueue_script('product');
    }

    if( is_page_template('page-templates/page-home.php') ) {
        wp_register_style( 'homepage', get_template_directory_uri() . "/assets/styles/layouts/homepage/homepage.css", 'all', fileatime(get_template_directory()."/assets/styles/layouts/homepage/homepage.css") );
        wp_enqueue_style('homepage');
        
        wp_register_script( 'homepage', get_template_directory_uri() . "/assets/scripts/layouts/homepage/homepage.js", 'all', fileatime(get_template_directory()."/assets/scripts/layouts/homepage/homepage.js"), true );
        wp_enqueue_script('homepage');
    }
    if(is_404()) {
        wp_register_style( '404', get_template_directory_uri() . "/assets/styles/layouts/notfound/notfound.css", 'all', fileatime(get_template_directory()."/assets/styles/layouts/notfound/notfound.css") );
        wp_enqueue_style('404');
        
    }

    
}
add_action('wp_enqueue_scripts', 'cuong_style');


function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . "/assets/library/jquery/jquery.min.js", array(), '3.4.1' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

      if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
  'key' => 'group_61967b6da5db8',
  'title' => 'Customer Information',
  'fields' => array(
    array(
      'key' => 'field_61967b77965ce',
      'label' => 'Customer Name',
      'name' => 'name',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
    array(
      'key' => 'field_61967b96965cf',
      'label' => 'Customer Job',
      'name' => 'yourJob',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
    array(
      'key' => 'field_61967ba2965d0',
      'label' => 'Customer Product',
      'name' => 'yourProduct',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
    array(
      'key' => 'field_61967c53965d5',
      'label' => 'Customer Current',
      'name' => 'yourCurrent',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_61967bb5965d1',
      'label' => 'Customer Address',
      'name' => 'yourAddress',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '25',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
    array(
      'key' => 'field_61967c15965d2',
      'label' => 'Customer Village',
      'name' => 'village',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '25',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
    array(
      'key' => 'field_61967c29965d3',
      'label' => 'Customer District',
      'name' => 'district',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '25',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
    array(
      'key' => 'field_61967c34965d4',
      'label' => 'Customer City',
      'name' => 'city',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '25',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
    array(
      'key' => 'field_61967c82965d7',
      'label' => 'Customer Loan',
      'name' => 'loanValue',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
    array(
      'key' => 'field_61967c9f965d9',
      'label' => 'Customer Time',
      'name' => 'termValue',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '50',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => 1,
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'customers',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
  'show_in_rest' => 0,
));

acf_add_local_field_group(array(
  'key' => 'group_6194de9a5541f',
  'title' => 'Homepage',
  'fields' => array(
    array(
      'key' => 'field_6194dee4bb1b5',
      'label' => 'Slider Banner',
      'name' => 'slider_banner',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'table',
      'button_label' => '',
      'sub_fields' => array(
        array(
          'key' => 'field_6194df0fbb1b6',
          'label' => 'Image',
          'name' => 'image',
          'type' => 'image',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array(
          'key' => 'field_6194df38bb1b7',
          'label' => 'Button',
          'name' => 'button',
          'type' => 'link',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'array',
        ),
      ),
    ),
    array(
      'key' => 'field_6194dfa014a94',
      'label' => 'Partner Slider',
      'name' => 'partner_slider',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'table',
      'button_label' => '',
      'sub_fields' => array(
        array(
          'key' => 'field_6194dfc614a95',
          'label' => 'Image',
          'name' => 'image',
          'type' => 'image',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array(
          'key' => 'field_6194dfd614a96',
          'label' => 'Alt',
          'name' => 'alt',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
      ),
    ),
    array(
      'key' => 'field_6194e13df65cf',
      'label' => 'Section About',
      'name' => 'section_about',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_619b5f3f5007f',
          'label' => 'Section ID FE',
          'name' => 'section_id_fe',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e364f65d0',
          'label' => 'Video Photo',
          'name' => 'video_photo',
          'type' => 'image',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array(
          'key' => 'field_6194e376f65d1',
          'label' => 'Youtube Link',
          'name' => 'youtube_link',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e386f65d2',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e391f65d3',
          'label' => 'Content',
          'name' => 'content',
          'type' => 'wysiwyg',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'tabs' => 'all',
          'toolbar' => 'full',
          'media_upload' => 1,
          'delay' => 0,
        ),
      ),
    ),
    array(
      'key' => 'field_6194e399f65d4',
      'label' => 'Section Counter',
      'name' => 'section_counter',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_6194e3def65d5',
          'label' => 'Left Title',
          'name' => 'left_title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e3e6f65d6',
          'label' => 'Counter',
          'name' => 'counter',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_6194e414f65d7',
              'label' => 'Title',
              'name' => 'title',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_6194e438f65d8',
              'label' => 'Number',
              'name' => 'number',
              'type' => 'number',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'min' => 0,
              'max' => 100,
              'step' => '',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_6194e44af65d9',
      'label' => 'Section Why Us',
      'name' => 'section_why_us',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_6194e533f65da',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e538f65db',
          'label' => 'Left Title',
          'name' => 'left_title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e563f65dc',
          'label' => 'Right Title',
          'name' => 'right_title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e571f65dd',
          'label' => 'Left Repeater',
          'name' => 'left_repeater',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_6194e586f65de',
              'label' => 'Icon',
              'name' => 'icon',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_6194e58ff65df',
              'label' => 'Text',
              'name' => 'text',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
          ),
        ),
        array(
          'key' => 'field_6194e598f65e0',
          'label' => 'Right Repeater',
          'name' => 'right_repeater',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_6194e598f65e1',
              'label' => 'Icon',
              'name' => 'icon',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_6194e598f65e2',
              'label' => 'Text',
              'name' => 'text',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_6194e64ad5a03',
      'label' => 'Section Customer',
      'name' => 'section_customer',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_6194e661d5a04',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e67cd5a05',
          'label' => 'Repeater',
          'name' => 'repeater',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_6194eb8f2bfa3',
              'label' => 'Avatar',
              'name' => 'avatar',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_6194e68ad5a06',
              'label' => 'Name',
              'name' => 'name',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_6194e695d5a07',
              'label' => 'Job',
              'name' => 'job',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_6194e6bdd5a08',
              'label' => 'Content',
              'name' => 'content',
              'type' => 'wysiwyg',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'tabs' => 'all',
              'toolbar' => 'full',
              'media_upload' => 1,
              'delay' => 0,
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_6194e70bd5a09',
      'label' => 'Section Technology',
      'name' => 'section_technology',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_619b5ff39b851',
          'label' => 'Section ID FE',
          'name' => 'section_id_fe',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e7bfd5a0f',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e73cd5a0a',
          'label' => 'Left Slider',
          'name' => 'left_slider',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_6194e75ed5a0b',
              'label' => 'Image',
              'name' => 'image',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
          ),
        ),
        array(
          'key' => 'field_6194e785d5a0c',
          'label' => 'Right Content Item',
          'name' => 'right_content_item',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_6194e7b4d5a0d',
              'label' => 'Title',
              'name' => 'title',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_6194e7b8d5a0e',
              'label' => 'Content',
              'name' => 'content',
              'type' => 'textarea',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'maxlength' => '',
              'rows' => 4,
              'new_lines' => '',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_6194e7e1d5a10',
      'label' => 'Section Collaborations',
      'name' => 'section_collaborations',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_6194e81ad5a11',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_6194e825d5a12',
          'label' => 'Repeater',
          'name' => 'repeater',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_6194e855d5a13',
              'label' => 'Image',
              'name' => 'image',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_6194e859d5a14',
              'label' => 'Title',
              'name' => 'title',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_6194e861d5a15',
              'label' => 'Content',
              'name' => 'content',
              'type' => 'wysiwyg',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'tabs' => 'all',
              'toolbar' => 'full',
              'media_upload' => 1,
              'delay' => 0,
            ),
          ),
        ),
      ),
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'page-templates/page-home.php',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
  'show_in_rest' => 0,
));

acf_add_local_field_group(array(
  'key' => 'group_61950dcb592ab',
  'title' => 'Theme Setting',
  'fields' => array(
    array(
      'key' => 'field_61950dd2c7855',
      'label' => 'HEADER VI',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_61950de2c7856',
      'label' => 'Logo',
      'name' => 'logo',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'url',
      'preview_size' => 'medium',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array(
      'key' => 'field_61950df1c7857',
      'label' => 'SEO Keyword',
      'name' => 'seo_keyword',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_619b5aa804703',
      'label' => 'HEADER EN',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_619b5abe04704',
      'label' => 'Logo',
      'name' => 'logo_EN',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'url',
      'preview_size' => 'medium',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array(
      'key' => 'field_619b5acd04705',
      'label' => 'SEO Keyword',
      'name' => 'seo_keyword_en',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_61950e6ecbd1a',
      'label' => 'FOOTER VI',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_61950e7ecbd1b',
      'label' => 'Footer Logo',
      'name' => 'footer_logo',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'url',
      'preview_size' => 'medium',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array(
      'key' => 'field_61950ea5cbd1c',
      'label' => 'Footer Column 1',
      'name' => 'footer_column_1',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '100',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_61950ec9cbd1d',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_61950edbcbd1e',
          'label' => 'Repeater Information',
          'name' => 'repeater_information',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => '',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_61950effcbd1f',
              'label' => 'Icon',
              'name' => 'icon',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '10',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_61950f09cbd20',
              'label' => 'Value',
              'name' => 'value',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '90',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_61950f1acbd21',
      'label' => 'Footer Column 2',
      'name' => 'footer_column_2',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '100',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_61950f87cbd2a',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_61950f1acbd23',
          'label' => 'Repeater Link',
          'name' => 'repeater_link',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => '',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_61950f1acbd25',
              'label' => 'Link',
              'name' => 'link',
              'type' => 'link',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => '',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_61950f52cbd26',
      'label' => 'Footer Column 3',
      'name' => 'footer_column_3',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '103',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_61950f7ecbd29',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_61950f52cbd27',
          'label' => 'Repeater Social',
          'name' => 'repeater_social',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_61950f9fcbd2b',
              'label' => 'Icon',
              'name' => 'icon',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '10',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_61950faacbd2c',
              'label' => 'Link',
              'name' => 'link',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_61951125e97d6',
      'label' => 'Footer Bottom Text',
      'name' => 'footer_bottom_text',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_619b5a44046f2',
      'label' => 'FOOTER EN',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_619b5a54046f3',
      'label' => 'Footer Logo',
      'name' => 'footer_logo_en',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'url',
      'preview_size' => 'medium',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array(
      'key' => 'field_619b5a6e046f4',
      'label' => 'Footer Column 1',
      'name' => 'footer_column_1_en',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '98',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_619b5a6e046f5',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_619b5a6e046f6',
          'label' => 'Repeater Information',
          'name' => 'repeater_information',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_619b5a6e046f7',
              'label' => 'Icon',
              'name' => 'icon',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '10',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_619b5a6e046f8',
              'label' => 'Value',
              'name' => 'value',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_619b5a7a046f9',
      'label' => 'Footer Column 2',
      'name' => 'footer_column_2_en',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '100',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_619b5a7a046fa',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_619b5a7a046fb',
          'label' => 'Repeater Link',
          'name' => 'repeater_link',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_619b5a7a046fc',
              'label' => 'Link',
              'name' => 'link',
              'type' => 'link',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'array',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_619b5a85046fd',
      'label' => 'Footer Column 3',
      'name' => 'footer_column_3_en',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '100',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'block',
      'sub_fields' => array(
        array(
          'key' => 'field_619b5a85046fe',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_619b5a85046ff',
          'label' => 'Repeater Social',
          'name' => 'repeater_social',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => '',
          'sub_fields' => array(
            array(
              'key' => 'field_619b5a8504700',
              'label' => 'Icon',
              'name' => 'icon',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '10',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_619b5a8504701',
              'label' => 'Link',
              'name' => 'link',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
          ),
        ),
      ),
    ),
    array(
      'key' => 'field_619b5a9604702',
      'label' => 'Footer Bottom Text',
      'name' => 'footer_bottom_text_en',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'theme-general-settings',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
  'show_in_rest' => 0,
));

endif;    



function pll_return($string) {
    if( function_exists('pll_e')) {
        return pll__($string);
    } else {
        return $string;
    }
}
function pll_k($string) {
    if( function_exists('pll_e')) {
        pll_e($string);
    } else {
        echo $string;
    }
}





if( function_exists('pll_register_string')) {
    pll_register_string( 'Đăng ký ngay' , 'Đăng ký ngay' );
    pll_register_string( 'Tin tức' , 'Tin tức' );
    pll_register_string( 'Xem thêm' , 'Xem thêm' );
    pll_register_string( 'ĐĂNG KÝ TƯ VẤN VAY MIỄN PHÍ' , 'ĐĂNG KÝ TƯ VẤN VAY MIỄN PHÍ', 'Form' );
    pll_register_string( 'Họ tên của anh/chị' , 'Họ tên của anh/chị', 'Form' );
    pll_register_string( 'Nghề nghiệp của anh/chị' , 'Nghề nghiệp của anh/chị', 'Form' );
    pll_register_string( 'Số điện thoại liên hệ' , 'Số điện thoại liên hệ', 'Form' );
    pll_register_string( 'Mặt hàng kinh doanh của anh/chị' , 'Mặt hàng kinh doanh của anh/chị', 'Form' );
    pll_register_string( 'Địa chỉ kinh doanh của anh/chị' , 'Địa chỉ kinh doanh của anh/chị', 'Form' );
    pll_register_string( 'Tỉnh/ Thành phố, Quận/Huyện, Phường/Xã' , 'Tỉnh/ Thành phố, Quận/Huyện, Phường/Xã', 'Form' );
    pll_register_string( 'Số nhà và tên đường' , 'Số nhà và tên đường', 'Form' );
    pll_register_string( 'Tỉnh/Thành phố' , 'Tỉnh/Thành phố', 'Form' );
    pll_register_string( 'Quận/Huyện' , 'Quận/Huyện', 'Form' );
    pll_register_string( 'Phường/Xã' , 'Phường/Xã', 'Form' );
    pll_register_string( 'Anh/chị có đang kinh doanh không?' , 'Anh/chị có đang kinh doanh không?', 'Form' );
    pll_register_string( 'Số tiền anh/chị cần vay (VND)' , 'Số tiền anh/chị cần vay (VND)', 'Form' );
    pll_register_string( 'Thời hạn khoản vay anh/chị mong muốn' , 'Thời hạn khoản vay anh/chị mong muốn', 'Form' );
    pll_register_string( 'Chủ kinh doanh / doanh nghiệp' , 'Chủ kinh doanh / doanh nghiệp', 'Form' );
    pll_register_string( 'Kinh doanh online có kho hàng' , 'Kinh doanh online có kho hàng', 'Form' );
    pll_register_string( 'Tiểu thương / chủ sạp chợ' , 'Tiểu thương / chủ sạp chợ', 'Form' );
    pll_register_string( 'Đi làm hưởng lương có hợp đồng lao động' , 'Đi làm hưởng lương có hợp đồng lao động', 'Form' );
    pll_register_string( 'Đang kinh doanh bình thường' , 'Đang kinh doanh bình thường', 'Form' );
    pll_register_string( 'Đang bán mang đi / bán online' , 'Đang bán mang đi / bán online', 'Form' );
    pll_register_string( 'Đang tạm dừng kinh doanh do Covid' , 'Đang tạm dừng kinh doanh do Covid', 'Form' );
    pll_register_string( 'Ít hơn 6 tháng' , 'Ít hơn 6 tháng', 'Form' );
    pll_register_string( '06 - 12 tháng' , '06 - 12 tháng', 'Form' );
    pll_register_string( 'Nhiều hơn 12 tháng' , 'Nhiều hơn 12 tháng', 'Form' );
    pll_register_string( 'Nhập số tiền' , 'Nhập số tiền', 'Form' );
    pll_register_string( 'Nhấp chọn' , 'Nhấp chọn', 'Form' );
    pll_register_string( 'Nhấp chọn nghề nghiệp' , 'Nhấp chọn nghề nghiệp', 'Form' );
    pll_register_string( 'VD: 99 Nguyễn Văn Cừ' , 'VD: 99 Nguyễn Văn Cừ', 'Form' );
    pll_register_string( 'Đăng ký' , 'Đăng ký' );
    pll_register_string( 'Kim An là nền tảng kết nối Vốn Kinh Doanh, chuyên hỗ trợ hàng triệu Chủ Kinh Doanh vay vốn tại Ngân hàng và Công ty Tài chính hoàn toàn miễn phí và không cần thế chấp tài sản.' ,
     'Kim An là nền tảng kết nối Vốn Kinh Doanh, chuyên hỗ trợ hàng triệu Chủ Kinh Doanh vay vốn tại Ngân hàng và Công ty Tài chính hoàn toàn miễn phí và không cần thế chấp tài sản.', 'Form' );

}



add_filter( 'manage_customers_posts_columns', 'set_custom_edit_customers_columns' );
function set_custom_edit_customers_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['date'] );
    $columns['job'] = __( 'Job', 'cuong' );
    $columns['product'] = __( 'Product', 'cuong' );
    $columns['current'] = __( 'Current', 'cuong' );
    $columns['address'] = __( 'Address', 'cuong' );
    $columns['loan'] = __( 'Loan', 'cuong' );
    $columns['time'] = __( 'Time', 'cuong' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_customers_posts_custom_column' , 'custom_customers_column', 10, 2 );
function custom_customers_column( $column, $post_id ) {
    switch ( $column ) {

        case 'job' :
            echo get_field('yourJob', $post_id);
            break;
        case 'product' :
            echo get_field('yourProduct', $post_id);
            break;
        case 'current' :
            echo get_field('yourCurrent', $post_id);
            break;
        case 'address' :
            echo get_field('yourAddress', $post_id).', '.get_field('village', $post_id).', '.get_field('district', $post_id).', '.get_field('city', $post_id);
            break;
        case 'loan' :
            echo get_field('loanValue', $post_id);
            break;
        case 'time' :
            echo get_field('termValue', $post_id);
            break;

    }
}

function get_list_province(){
    $list_province = file_get_contents( get_template_directory().'/address_json/tinh_tp.json');
    $array_province = json_decode($list_province);
    return $array_province;
    exit;
}
add_action('wp_ajax_get_list_city', 'get_list_city');
add_action('wp_ajax_nopriv_get_list_city', 'get_list_city');
function get_list_city(){
    $province_code = $_GET['province_code'];
    $list_city = file_get_contents(get_template_directory().'/address_json/quan-huyen/'.$province_code.'.json');
    $array_city = json_decode($list_city);
    // usort($array_city, function($a, $b){
    //     return strcmp($a->name_with_type, $b->name_with_type);
    // });
    foreach ($array_city as $key => $city): ?>
        <li data-id="<?php echo $city->code; ?>" data-value="<?php echo $city->name_with_type; ?>" class="form__select--list--item form__select--district"><?php echo $city->name_with_type; ?></li>
    <?php
    endforeach;
    exit;
}


add_action('wp_ajax_get_list_town', 'get_list_town');
add_action('wp_ajax_nopriv_get_list_town', 'get_list_town');
function get_list_town(){
    $district_code = $_GET['district_code'];
    $list_city = file_get_contents(get_template_directory().'/address_json/xa-phuong/'.$district_code.'.json');
    $array_city = json_decode($list_city);
    // usort($array_city, function($a, $b){
    //     return strcmp($a->name_with_type, $b->name_with_type);
    // });
    foreach ($array_city as $key => $city): ?>
        <li data-id="<?php echo $city->code; ?>" data-value="<?php echo $city->name_with_type; ?>" class="form__select--list--item form__select--village"><?php echo $city->name_with_type; ?></li>
    <?php
    endforeach;
    exit;
}
function create_customer_post_type() {
    $label = array(
        'name' => 'Customers Information', 
        'singular_name' => 'Customers' 
    );

    $args = array(
        'labels' => $label,
        'description' => 'Post Type Customers', 
        'supports' => array(
            'title',
            // 'thumbnail',
            // 'editor'
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true, 
        'show_in_menu' => true, 
        'show_in_nav_menus' => true, 
        'show_in_admin_bar' => true, 
        'menu_position' => 10, 
        'menu_icon' => 'dashicons-admin-multisite', 
        'can_export' => true, 
        'has_archive' => true, 
        'exclude_from_search' => false,
        'publicly_queryable' => false, 
        'capability_type' => 'post' 
    );
 
    register_post_type('customers', $args);
}
add_action('init', 'create_customer_post_type');



add_action('wp_ajax_add_form_contact', 'add_form_contact');
add_action('wp_ajax_nopriv_add_form_contact', 'add_form_contact');

function add_form_contact(){
    $array_data = [];
    $array_data['name'] = $_POST['name_value'];
    $array_data['phonenumber'] = $_POST['phonenumber_value'];
    $array_data['yourJob'] = $_POST['yourJob_value'];
    $array_data['yourProduct'] = $_POST['yourProduct_value'];
    $array_data['yourCountry'] = $_POST['yourCountry_value'];
    $array_data['city'] = $_POST['city_value'];
    $array_data['district'] = $_POST['district_value'];
    $array_data['village'] = $_POST['village_value'];
    $array_data['yourAddress'] = $_POST['yourAddress_value'];
    $array_data['yourCurrent'] = $_POST['yourCurrent_value'];
    $array_data['loanValue'] = $_POST['loanValue_value'];
    $array_data['termValue'] = $_POST['termValue_value'];
    echo json_encode($array_data);
    $new_post = array(
        'post_status'   => 'publish',
        'post_type'     => 'customers',
        'post_title'    => $array_data['name'].' - '.$array_data['phonenumber'],
        'meta_input'    => array(
            'name' => $array_data['name'],
            'phonenumber' => $array_data['phonenumber'],
            'yourJob' => $array_data['yourJob'],
            'yourProduct' => $array_data['yourProduct'],
            'city' => $array_data['city'],
            'district' => $array_data['district'],
            'village' => $array_data['village'],
            'yourAddress' => $array_data['yourAddress'],
            'yourCurrent' => $array_data['yourCurrent'],
            'loanValue' => $array_data['loanValue'],
            'termValue' => $array_data['termValue']
        ),
    );
    // var_dump($new_post);
    $postId = wp_insert_post($new_post);
   
    exit;
}
