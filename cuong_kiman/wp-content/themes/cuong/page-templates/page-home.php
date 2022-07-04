<?php
  /* Template name: Homepage */
  get_header();
    while ( have_posts() ) : the_post();
?>
<div id="main__content">
  <!-- Hero Banner -->
  <section class="heroBanner">
    <div class="swiper swiperBanner">
      <div class="swiper-wrapper">
        <?php 
          $slider_banner = get_field('slider_banner');
          foreach ($slider_banner as $key => $slider) :
        ?>
          <!-- Slides -->
          <div class="swiper-slide p-relative">
            <?php 
              if( $slider['button'] != '' ) :
            ?>
              <a href="<?php echo $slider['button']['url'] ?>" style="display: block; width: 100%;">
                <img src="<?php echo $slider['image']; ?>" alt="Kim An" class="no-lazyload"/>
              </a>
            <?php 
              else :
            ?>
              <img src="<?php echo $slider['image']; ?>" alt="Kim An" class="no-lazyload"/>
            <?php 
              endif;
            ?>
          </div>
        <?php
          endforeach;
        ?>
      </div>
      <!-- If we need pagination -->
      <!-- <div class="swiper-pagination"></div>
      <div class="swiper-button-next swiper__btn-next">
        <svg
          width="12"
          height="20"
          viewBox="0 0 12 20"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M0.33 18.13L2.1 19.9L12 10L2.1 0.100001L0.330001 1.87L8.46 10L0.33 18.13Z"
            fill="#102E57"
          />
        </svg>
      </div> -->
      <!-- <div class="swiper-button-prev swiper__btn-prev">
        <svg
          width="12"
          height="20"
          viewBox="0 0 12 20"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M11.67 1.87001L9.9 0.100006L0 10L9.9 19.9L11.67 18.13L3.54 10L11.67 1.87001Z"
            fill="#102E57"
          />
        </svg>
      </div> -->
    </div>
  </section>

  <!-- Partner -->
  <section class="partner">
    <div class="container">
      <div class="swiper-container swiperPartner">
        <div class="swiper-wrapper">
          <?php 
            $partner_slider = get_field('partner_slider');
            foreach ($partner_slider as $key => $slider) :
          ?>
          <!-- Slides -->
          <div class="swiper-slide">
            <img width="153" src="<?php echo $slider['image'] ?>" alt="<?php echo $slider['alt'] ?>">
          </div>
          <?php 
            endforeach;
          ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-button-next swiper__partner--next">
          <svg class="icon" width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77029 4.55329L0.790182 0.754096C0.492792 0.470224 0.000175862 0.681015 0.000175808 1.09214C0.000175791 1.21608 0.0494121 1.33495 0.137053 1.42259L4.00735 5.29289C4.39788 5.68342 4.39788 6.31658 4.00735 6.70711L0.137052 10.5774C0.0494108 10.665 0.000174519 10.7839 0.000174502 10.9079C0.000174447 11.319 0.49279 11.5298 0.79018 11.2459L4.77029 7.44671C5.59568 6.65883 5.59568 5.34117 4.77029 4.55329Z" fill="currentColor"></path></svg>
        </div>
        <div class="swiper-button-prev swiper__partner--prev">
          <svg class="icon" width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77029 4.55329L0.790182 0.754096C0.492792 0.470224 0.000175862 0.681015 0.000175808 1.09214C0.000175791 1.21608 0.0494121 1.33495 0.137053 1.42259L4.00735 5.29289C4.39788 5.68342 4.39788 6.31658 4.00735 6.70711L0.137052 10.5774C0.0494108 10.665 0.000174519 10.7839 0.000174502 10.9079C0.000174447 11.319 0.49279 11.5298 0.79018 11.2459L4.77029 7.44671C5.59568 6.65883 5.59568 5.34117 4.77029 4.55329Z" fill="currentColor"></path></svg>
        </div>
      </div>
    </div>
  </section>
  <?php 
    $section_about = get_field('section_about');
  ?>
  <!-- About Us -->
  <section class="aboutUs" id="<?php echo $section_about['section_id_fe'] ?>">
    <div class="container__global_w1200">
      <div class="row align-cen">
        <div class="col-lg-7">
          
          <div class="video-intro">
            <img src="<?php echo $section_about['video_photo'] ?>" alt="intor-video-image">
            <div class="play-video" id="play-video">
              <svg class="icon" width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.9159 9.45341C19.2172 10.2291 19.2172 12.1136 17.9159 12.8893L3.23357 21.6414C1.90043 22.4361 0.209506 21.4755 0.209506 19.9235L0.209507 2.41918C0.209507 0.867157 1.90043 -0.0934388 3.23357 0.701247L17.9159 9.45341Z" fill="white"></path>
              </svg>
            </div>
          </div>
          <div class="show-intro-video"></div>
        </div>
        <div class="col-lg-5">
          <div class="intro__caption">
            <p class="intro__caption--mainTitle"><?php echo $section_about['title'] ?></p>
            <div class="intro__caption--description">
              <?php echo $section_about['content'] ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php 
    $section_counter = get_field('section_counter');
  ?>
  <!-- Count Number -->
  <section class="countNumber">
    <img class="countNumber__background" src="<?php echo get_template_directory_uri(); ?>/assets/images/homepage/bg_counts.png" alt="background">
    <div class="container__global_w1200">
      <div class="row align-cen">
        <div class="col-xl-6">
          <div class="counts__title">
            <?php echo $section_counter['left_title'] ?>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="new_numbers">
            <?php
              foreach( $section_counter['counter'] as $key => $value ) :
            ?>
              <div class="item">
                <div class="item_wrapper">
                  <div class="wrapper">
                    <svg viewBox="0 0 100 100" class="svg">
                      <circle id="pie" r="22.5" cx="50" cy="50" fill="none" data-dasharray="<?php echo round($value['number'] * 1.41) ?>" class="pie circle"></circle>
                    </svg>
                  </div>
                  <div class="item__caption">
                    <div class="item__number">
                      <span class="count" data-percentage="<?php echo $value['number'] ?>">0</span>
                      <span class="item__unit">%</span>
                    </div>
                    <p class="item__text"><?php echo $value['title'] ?></p>

                    <div class="wrapper wrapper--small">
                      <svg viewBox="0 0 100 100" class="svg">
                        <circle id="pie" r="22.5" cx="50" cy="50" fill="none" class="circle" data-dasharray="<?php echo round($value['number'] * 1.41) ?>"></circle>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              endforeach;
            ?>
          </div>
          <!-- <div class="row numbers">
            <?php
              foreach( $section_counter['counter'] as $key => $value ) :
            ?>
            <div class="col-6 col-sm-4 col-md-4 col-lg-4 numbers__item">
              <div class="numbers__item__chart">
                <div class="pie"
                  data-pie='{ "percent": <?php echo $value['number'] ?>, "colorSlice": "#052e5a", "colorCircle": "#ffc107", "fontWeight": 100, "size": 140, "textPosition": "0px" }'>
                </div>
                <span class="numbers__item--chartTitle"><?php echo $value['title'] ?></span>
              </div>
            </div>
            <?php
              endforeach;
            ?>
          </div> -->
        </div>
      </div>
    </div>
  </section>

  <?php 
    $section_why_us = get_field('section_why_us');
  ?>
  <!-- Why Us -->
  <section class="whyUs">
    <div class="container__global_w1200">
      <p class="whyUs__mainTitle"><?php echo $section_why_us['title'] ?></p>
      <div class="whyUs__reason">
        <img class="people" src="<?php echo get_template_directory_uri(); ?>/assets/images/homepage/people.png" alt="image-people">
        <div class="circle-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/homepage/circle.svg" alt="circle">
          <div class="circle-animate" style="">
            <div class="wrapper" style="">
              <svg viewBox="0 0 100 100" class="svg" style="">
                <circle r="22.5" cx="50" cy="50" fill="none" class="circle circle--blue" style="stroke-width: 50;"></circle>
              </svg>
            </div>
          </div>
        </div>
        <img class="circle-shadow" src="<?php echo get_template_directory_uri(); ?>/assets/images/homepage/shadow.svg" alt="">
        <div class="d-flex justify-content-between groups">
          <div class="reason-group">
            <div class="reason-group__title"><?php echo $section_why_us['left_title'] ?></div>
            <?php foreach($section_why_us['left_repeater'] as $key => $left_repeater ) : ?>
            <div class="item">
              <div class="item__inner">
                <div class="item__icon">
                  <img class="w-100" src="<?php echo $left_repeater['icon'] ?>" alt="<?php echo wp_strip_all_tags($left_repeater['text']) ?>">
                </div>
                <div class="item__desc">
                  <?php echo $left_repeater['text'] ?>                
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="reason-group">
            <div class="reason-group__title"><?php echo $section_why_us['right_title'] ?></div>
            <?php foreach($section_why_us['right_repeater'] as $key => $right_repeater ) : ?>
              <div class="item item--right">
                <div class="item__inner">
                  <div class="item__desc text-right">
                    <?php echo $right_repeater['text'] ?>                  
                  </div>
                  <div class="item__icon">
                    <img class="w-100" src="<?php echo $right_repeater['icon'] ?>" alt="<?php echo wp_strip_all_tags($right_repeater['text']) ?>">
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php 
    $section_customer = get_field('section_customer');
  ?>
  <!-- Customer Stories -->
  <section class="customer-stories">
    <div class="container__global_w1200">
      <p class="customer__mainTitle"><?php echo $section_customer['title'] ?></p>
      <div class="stories">
        <div class="row justify-content-center">
          <?php foreach($section_customer['repeater'] as $key => $repeater ) : ?>
            <div class="col-lg-4 col-md-6 stories__wrapper">
              <div class="item">
                <div class="item__desc"><?php echo $repeater['content'] ?></div>
                <div class="author">
                  <div class="author__image">
                    <img src="<?php echo $repeater['avatar'] ?>" alt="">
                  </div>
                  <div class="author__info">
                    <p class="author__name"><?php echo $repeater['name'] ?></p>
                    <p class="author__postion"><?php echo $repeater['job'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <?php 
    $section_technology = get_field('section_technology');
  ?>
  <!-- Technology -->
  <section class="technology" id="<?php echo $section_technology['section_id_fe'] ?>">
    <img class="map" src="https://kimangroup.com/wp-content/themes/steen/app/public/img/map.png" alt="">
    <div class="container__global_w1200">
      <div class="row align-items-center">
        <div class="col-lg-7 text-center technology__slider">
          <div class="technology__image">
            <div class="swiper-container swiperTechnology">
              <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach($section_technology['left_slider'] as $key => $left_slider ) : ?>
                  <div class="swiper-slide">
                    <img src="<?php echo $left_slider['image'] ?>" alt="logo_partner">
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 technology__content">
          <div class="technology__caption">
            <p class="technology__mainTitle"><?php echo $section_technology['title'] ?></p>
            <div class="technology__list">
              <?php foreach($section_technology['right_content_item'] as $key => $right_content_item ) : ?>
                <div class="item">
                  <p class="item__title">
                    <?php echo $right_content_item['title'] ?>
                  </p>
                  <p class="ktem__desc">
                    <?php echo $right_content_item['content'] ?>
                  </p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- News -->
  <section class="news">
    <div class="container__global_w1200">
      <p class="news__mainTitle"><?php pll_k('Tin tức'); ?></p>
      <div class="news__slider">
        <div class="swiper-container swiperNews">
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <div class="item-news-contain">
                <?php
                  $arg_list_posts = array(
                      'posts_per_page'   => 4,
                      'offset' => 0
                  );
                  $list_posts = new WP_Query( $arg_list_posts );
                  while( $list_posts->have_posts() ) : 
                    $list_posts->the_post();
                    $post_not_in[] = get_the_ID();
                ?>
                  <div class="item-news__child">
                    <div class="item-news__child--caption">
                      <p class="item__date"><?php echo get_the_date('d/m/Y') ?></p>
                      <div class="item__title">
                        <a href="<?php the_permalink(); ?>" class="item__link">
                          <?php the_title(); ?>
                        </a>
                      </div>
                      <div class="excerpt">
                        <?php the_excerpt(); ?>
                      </div>
                    </div>
                    <div class="item-news__child--image">
                      <?php the_post_thumbnail( 'thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title() ] ); ?>
                    </div>
                  </div>
                <?php
                  endwhile;
                  wp_reset_query();
                ?>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="item-news-contain">
                <?php
                  $arg_list_posts = array(
                      'posts_per_page'   => 4,
                      'offset' => 4
                  );
                  $list_posts = new WP_Query( $arg_list_posts );
                  while( $list_posts->have_posts() ) : 
                    $list_posts->the_post();
                    $post_not_in[] = get_the_ID();
                ?>
                  <div class="item-news__child">
                    <div class="item-news__child--caption">
                      <p class="item__date"><?php echo get_the_date('d/m/Y') ?></p>
                      <p class="item__title">
                        <a href="<?php the_permalink(); ?>" class="item__link">
                          <?php the_title(); ?>
                        </a>
                      </p>
                    </div>
                    <div class="item-news__child--image">
                      <?php the_post_thumbnail( 'thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title() ] ); ?>
                    </div>
                  </div>
                <?php
                  endwhile;
                  wp_reset_query();
                ?>
              </div>
            </div>
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next swiper__news--next">
            <svg class="icon" width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77029 4.55329L0.790182 0.754096C0.492792 0.470224 0.000175862 0.681015 0.000175808 1.09214C0.000175791 1.21608 0.0494121 1.33495 0.137053 1.42259L4.00735 5.29289C4.39788 5.68342 4.39788 6.31658 4.00735 6.70711L0.137052 10.5774C0.0494108 10.665 0.000174519 10.7839 0.000174502 10.9079C0.000174447 11.319 0.49279 11.5298 0.79018 11.2459L4.77029 7.44671C5.59568 6.65883 5.59568 5.34117 4.77029 4.55329Z" fill="currentColor"></path></svg>
          </div>
          <div class="swiper-button-prev swiper__news--prev">
            <svg class="icon" width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77029 4.55329L0.790182 0.754096C0.492792 0.470224 0.000175862 0.681015 0.000175808 1.09214C0.000175791 1.21608 0.0494121 1.33495 0.137053 1.42259L4.00735 5.29289C4.39788 5.68342 4.39788 6.31658 4.00735 6.70711L0.137052 10.5774C0.0494108 10.665 0.000174519 10.7839 0.000174502 10.9079C0.000174447 11.319 0.49279 11.5298 0.79018 11.2459L4.77029 7.44671C5.59568 6.65883 5.59568 5.34117 4.77029 4.55329Z" fill="currentColor"></path></svg>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php 
    $section_collaborations = get_field('section_collaborations');
  ?>
  <!-- Collaborations -->
  <section class="collaborations">
    <div class="container__global_w1200">
      <p class="collaborations__mainTTitle"><?php echo $section_collaborations['title'] ?></p>
      <div class="row collaborations__box">
        <?php foreach($section_collaborations['repeater'] as $key => $repeater ) : ?>
          <div class="col-lg-6 collaborations__box--item">
            <div class="school">
              <div class="school__logo">
                <img width="199" src="<?php echo $repeater['image'] ?>" alt="<?php echo $repeater['title'] ?>">
              </div>
              <div class="school__caption">
                <p class="school__name"><?php echo $repeater['title'] ?></p>
                <div class="school__desc"><?php echo $repeater['content'] ?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <img class="collaborations__background" src="<?php echo get_template_directory_uri(); ?>/assets/images/homepage/bg_collaborations.png" alt="">
  </section>
</div>
<?php
    endwhile;
  get_footer();
?>