<!DOCTYPE html>


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <title>
    <?php wp_title('') ?>
      
  </title>
  <?php wp_head(); ?>
 </head>

<body <?php body_class(); ?>>
  <header class="header__container">
    <div class="container__global">
      <div class="header__box d-flex">
        <a href="<?php echo home_url(); ?>" class="header__logo">
          <img src="<?php the_field('logo', 'option') ?>" alt="<?php the_field('seo_keyword', 'option') ?>" class="img__logoHeader" />
        </a>
        <div class="header__navigation d-flex">
            <li class="header__nav--item ">
                
          <?php
          wp_nav_menu(array(
            'menu_id'       => 'main-menu', 
            'theme_location' => 'main-menu',
            'menu_class'        => 'header__nav d-flex',
            'container'     => 'ul',
            'link_class' => 'header__nav--link text-primaryColor'
          ));
          ?>

          </li>
          
            
          <ul class="header__nav d-flex">
            <li class="header__nav--item header__nav--item--button" data-toggle="modal" data-target="#exampleModal">
              <a href="#" class="header__nav--link text-defaultColor"><?php pll_k('Đăng ký ngay'); ?></a>
            </li>
          </ul>
          <li class="header__nav--item header__nav--item--button mobile_display" data-toggle="modal" data-target="#exampleModal">
            <a href="#" class="header__nav--link text-defaultColor"><?php pll_k('Đăng ký'); ?></a>
          </li>
          <ul class="header__lang d-none d-md-flex">
            <?php
            pll_the_languages(['display_names_as' => 'slug']);
            ?>
          </ul>
          <button class="menu__mobile-icon">
            <svg width="20" height="2" id="line1" viewBox="0 0 20 2" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19 1H1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg width="16" height="2" id="line2" viewBox="0 0 16 2" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15 1H1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg width="20" height="2" id="line3" viewBox="0 0 20 2" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19 1H1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>      
    </div>
  </header>