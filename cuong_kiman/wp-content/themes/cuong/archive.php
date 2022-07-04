<?php
    get_header();
    $cate = get_queried_object();
?>
	<section id="main__content">
        <div class="container__global">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<div class="breadCrumb">','</div>' );
                }
            ?>
            <div class="product__main">
                <h1 class="product__title"><?php echo $cate->name; ?></h1>
                <div class="row product__content">
                    <div class="col-sm-12 col-md-8 col-lg-8 col-12">
                        <div class="products__artical">
                            <div class="row">
                            	<?php
    	                            $arg_list_posts = array(
    	                                'posts_per_page'   => 9,
                                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    	                                'cat' => $cate->term_id
    	                            );
    	                            $list_posts = new WP_Query( $arg_list_posts );
    	                            while( $list_posts->have_posts() ) : 
    	                                    $list_posts->the_post();
    	                                    $post_not_in[] = get_the_ID();
    	                        ?>
                                <div class="col-md-12">
                                    <article class="row product__artical--item">
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 px-0">
                                            <a href="<?php the_permalink(); ?>" class="product__artical--link">
                                                <?php the_post_thumbnail( 'thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title() ] ); ?>
                                            </a>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                            <div class="procuct__artical--desc">
                                                <h2 class="product__artical--title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h2>
                                                <div class="product__artical--text text-justify">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_excerpt(); ?>
                                                    </a>
                                                </div>
                                                <div class="product__artical--exten">
                                                    
                                                    <p class="date"><?php echo get_the_date('d/m/Y') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <?php
    	                            endwhile;
    	                            
    	                        ?>
                            </div>
                        </div>
                        <div id="pagination-container">
                        	<?php wp_pagenavi(); ?>
                        </div>
                        <?php
                        	wp_reset_query();
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-12 form-widget">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<?php
    get_footer();
?>