<?php
    get_header();
    while ( have_posts() ) : the_post();
        $post__not_in = [get_the_ID()];
?>
    <section id="main__content">
        <div class="container__global">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<div class="breadCrumb">','</div>' );
                }
            ?>
            <div class="product__main">
                <div class="row news__content">
                    <div class="col-sm-12 col-md-8 col-lg-8 col-12">
                        <div class="news__detail">
                          <h1 class="news__title text-primaryColor fw-700"><?php the_title(); ?></h1>
                          <div class="news__social">
                            <div class="news__createContent">
                              <span class="news__dateCreate"><?php echo get_the_date('d/m/Y') ?></span>
                            </div>
                            <div class="news__socialIcon">
                              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="news__linkSocial" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/facebook-icon.png" alt="share facebook">
                              </a>
                              <a href="#" class="news__linkSocial" >
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/zalo-icon.png" alt="share zalo">
                              </a>
                              <a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" class="news__linkSocial" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/twitter-icon.png" alt="share twitter">
                              </a>
                              <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php the_post_thumbnail_url( 'full' ); ?>&description=<?php the_title() ?>" class="news__linkSocial" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/pinterest-icon.png" alt="share pinterest">
                              </a>
                            </div>
                          </div>

                          
                            <div class="news__detail--main content-html">
                                <?php the_content(); ?>
                                <p class="news__detail--author">Tác giả: <?php the_author(); ?></p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-12 form-widget">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
                <div class="news__related">
                    <p class="news__related--mainTitle">Tin liên quan</p>
                    <div class="row news__related__box">
                        <?php
                            $arg_list_posts = array(
                                'posts_per_page' => 3,
                                'post__not_in' => $post__not_in
                            );
                            $list_posts = new WP_Query( $arg_list_posts );
                            while( $list_posts->have_posts() ) : 
                                            $list_posts->the_post();
                        ?>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 news__related--item">
                                <?php the_post_thumbnail( 'thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title() ] ); ?>
                                <p class="news__related--item--title"><?php the_title(); ?></p>
                                <div class="news__related--item--flex">
                                    <a href="<?php the_permalink(); ?>" class="news__related--item--see-more">Xem thêm</a>
                                    <span class="news__related--item--date"><?php echo get_the_date('d/m/Y') ?></span>
                                </div>
                            </div>
                        <?php
                            endwhile;
                            wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    endwhile;
    get_footer();
?>