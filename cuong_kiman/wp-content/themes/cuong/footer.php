
<?php if(get_locale() == 'vi'): ?>
    <footer class="footer-container">
        <div class="container__global">
          <div class="footer-box">
            <div class="logoFooter">
              <img
                  src="<?php the_field('footer_logo', 'option') ?>"
                  alt="<?php the_field('seo_keyword', 'option') ?>"
                  class="img__logo lazy"
                />
            </div>
            <div class="footer__row d-flex">
                <?php 
                  $footer_column_1 = get_field('footer_column_1', 'option');
                ?>
                <div class="footer__col">
                  <div class="footer__item">
                    <h5 class="footer__item--title text-secondaryColor">
                      <?php echo $footer_column_1['title']; ?>
                    </h5>
                    <ul class="footer__item-list">
                      <?php 
                        foreach ($footer_column_1['repeater_information'] as $key => $value) :
                      ?>
                        <li class="footer__list--item">
                          <span class="footer__list--item-icon">
                            <img
                              class="lazy"
                              src="<?php echo $value['icon'] ?>"
                              alt="icon"
                            />
                          </span>
                          <span class="footer__list--item-desc">
                            <?php echo $value['value'] ?>
                          </span>
                        </li>
                      <?php
                        endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
                <?php 
                  $footer_column_2 = get_field('footer_column_2', 'option');
                ?>
                <div class="footer__col">
                  <div class="footer__item">
                    <h5 class="footer__item--title text-secondaryColor">
                      <?php echo $footer_column_2['title']; ?>
                    </h5>
                    <ul class="footer__item-list">
                      <?php 
                        foreach ($footer_column_2['repeater_link'] as $key => $value) :
                      ?>
                        <li class="footer__list--item">
                          <span class="footer__list--item-icon">
                            <svg
                              width="6"
                              height="10"
                              viewBox="0 0 6 10"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M1 9L5 5L1 1"
                                stroke="white"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </span>
                          <span
                            class="footer__list--item-desc text-defaultColor fw-700"
                          >
                            <a href="<?php echo $value['link']['url'] ?>"><?php echo $value['link']['title'] ?></a>
                          </span>
                        </li>
                      <?php
                        endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
                

                <?php 
                  $footer_column_3 = get_field('footer_column_3', 'option');
                ?>
                <div class="footer__col">
                  <div class="footer__item">
                    <h5 class="footer__item--title text-secondaryColor">
                      <?php echo $footer_column_3['title']; ?>
                    </h5>
                    <ul class="footer__list--social d-flex">
                      <?php 
                        
                        foreach ($footer_column_3['repeater_social'] as $value) :
                      ?>
                        <li class="footer__social--icon">
                          <a href="<?php echo $value['link'] ?>">
                            <img
                              src="<?php echo $value['icon'] ?>"
                              alt="icon"
                            />
                          </a>
                        </li>
                      <?php
                        endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            <div class="footerCopyRight">
              <h3 class="text-center text-default text-defaultColor"><?php echo get_field('footer_bottom_text', 'option'); ?></h3>
            </div>
          </div>
        </div>
      </footer>
<?php else : ?>
<footer class="footer-container">
        <div class="container__global">
          <div class="footer-box">
            <div class="logoFooter">
              <img
                  src="<?php the_field('footer_logo_en', 'option') ?>"
                  alt="<?php the_field('seo_keyword_en', 'option') ?>"
                  class="img__logo lazy"
                />
            </div>
            <div class="footer__row d-flex">
                <?php 
                  $footer_column_1 = get_field('footer_column_1_en', 'option');
                ?>
                <div class="footer__col">
                  <div class="footer__item">
                    <h5 class="footer__item--title text-secondaryColor">
                      <?php echo $footer_column_1['title']; ?>
                    </h5>
                    <ul class="footer__item-list">
                      <?php 
                        foreach ($footer_column_1['repeater_information'] as $key => $value) :
                      ?>
                        <li class="footer__list--item">
                          <span class="footer__list--item-icon">
                            <img
                              class="lazy"
                              src="<?php echo $value['icon'] ?>"
                              alt="icon"
                            />
                          </span>
                          <span class="footer__list--item-desc">
                            <?php echo $value['value'] ?>
                          </span>
                        </li>
                      <?php
                        endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
                <?php 
                  $footer_column_2 = get_field('footer_column_2_en', 'option');
                ?>
                <div class="footer__col">
                  <div class="footer__item">
                    <h5 class="footer__item--title text-secondaryColor">
                      <?php echo $footer_column_2['title']; ?>
                    </h5>
                    <ul class="footer__item-list">
                      <?php 
                        foreach ($footer_column_2['repeater_link'] as $key => $value) :
                      ?>
                        <li class="footer__list--item">
                          <span class="footer__list--item-icon">
                            <svg
                              width="6"
                              height="10"
                              viewBox="0 0 6 10"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M1 9L5 5L1 1"
                                stroke="white"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </span>
                          <span
                            class="footer__list--item-desc text-defaultColor fw-700"
                          >
                            <a href="<?php echo $value['link']['url'] ?>"><?php echo $value['link']['title'] ?></a>
                          </span>
                        </li>
                      <?php
                        endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
                

                <?php 
                  $footer_column_3 = get_field('footer_column_3_en', 'option');
                ?>
                <div class="footer__col">
                  <div class="footer__item">
                    <h5 class="footer__item--title text-secondaryColor">
                      <?php echo $footer_column_3['title']; ?>
                    </h5>
                    <ul class="footer__list--social d-flex">
                      <?php 
                        
                        foreach ($footer_column_3['repeater_social'] as $value) :
                      ?>
                        <li class="footer__social--icon">
                          <a href="<?php echo $value['link'] ?>">
                            <img
                              src="<?php echo $value['icon'] ?>"
                              alt="icon"
                            />
                          </a>
                        </li>
                      <?php
                        endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            <div class="footerCopyRight">
              <h3 class="text-center text-default text-defaultColor"><?php echo get_field('footer_bottom_text_en', 'option'); ?></h3>
            </div>
          </div>
        </div>
      </footer>
<?php endif ?>
  

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/x.png" alt="">
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel"><?php pll_k('????NG K?? T?? V???N VAY MI???N PH??'); ?></h5>
                    <div class="modal-desc">
                      <?php pll_k('Kim An l?? n???n t???ng k???t n???i V???n Kinh Doanh, chuy??n h??? tr??? h??ng tri???u Ch??? Kinh Doanh vay v???n t???i Ng??n h??ng v?? C??ng ty T??i ch??nh ho??n to??n mi???n ph?? v?? kh??ng c???n th??? ch???p t??i s???n.'); ?>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form__box">
                        <form action="" class="form__register" id="form__modal">
                            <div class="form__register--fiels">
                                <div class="form-group row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="form__fiel">
                                            <label for="name"><?php pll_k('H??? t??n c???a anh/ch???'); ?></label>
                                            <input class="form__input" type="text" name="name"
                                                placeholder="<?php pll_k('H??? t??n c???a anh/ch???'); ?>">
                                                <p class="noty__error"> </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="form__fiel">
                                            <label for="phonenumber"><?php pll_k('S??? ??i???n tho???i li??n h???'); ?></label>
                                            <input class="form__input" type="text" name="phonenumber"
                                                placeholder="<?php pll_k('S??? ??i???n tho???i li??n h???'); ?>">
                                                <p class="noty__error"> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form__fiel">
                                            <label for="name"><?php pll_k('Ngh??? nghi???p c???a anh/ch???'); ?></label>
                                            <select class="form__select form__select--modal" name="yourJob">
                                                <option hidden></option>
                                                <option value="<?php pll_k('Ch??? kinh doanh / doanh nghi???p'); ?>"><?php pll_k('Ch??? kinh doanh / doanh nghi???p'); ?></option>
                                                <option value="<?php pll_k('Kinh doanh online c?? kho h??ng'); ?>"><?php pll_k('Kinh doanh online c?? kho h??ng'); ?></option>
                                                <option value="<?php pll_k('Ti???u th????ng / ch??? s???p ch???'); ?>"><?php pll_k('Ti???u th????ng / ch??? s???p ch???'); ?></option>
                                                <option value="<?php pll_k('??i l??m h?????ng l????ng c?? h???p ?????ng lao ?????ng'); ?>"><?php pll_k('??i l??m h?????ng l????ng c?? h???p ?????ng lao ?????ng'); ?></option>
                                            </select>
                                            <p class="noty__error"> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form__fiel">
                                            <label for="yourProduct"><?php pll_k('M???t h??ng kinh doanh c???a anh/ch???'); ?></label>
                                            <input class="form__input" type="text" name="yourProduct"
                                                placeholder="<?php pll_k('M???t h??ng kinh doanh c???a anh/ch???'); ?>">
                                                <p class="noty__error"> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form__fiel">
                                            <label for="yourCountry"><?php pll_k('?????a ch??? kinh doanh c???a anh/ch???'); ?></label>
                                            <p class="lable__note"><?php pll_k('T???nh/ Th??nh ph???, Qu???n/Huy???n, Ph?????ng/X??'); ?></p>
                                            <div class="input__readonly">
                                                <input class="form__input" type="text" name="yourCountry"
                                                    id="yourCountry" placeholder="<?php pll_k('Nh???p ch???n'); ?>" disabled>
                                                    <p class="noty__error"> </p>
                                                <span class="input-icon"><svg width="10" height="6" viewBox="0 0 10 6"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1L5 5L9 1" stroke="#153C72" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg></span>
                                            </div>
                                            <div class="form__select-multi">
                                                <div class="form__select-header">
                                                    <ul class="form__select--process">
                                                        <li class="form__select--process-item active">
                                                            <?php pll_k('T???nh/Th??nh ph???'); ?>
                                                        </li>
                                                        <li class="form__select--process-item">
                                                            <?php pll_k('Qu???n/Huy???n'); ?>
                                                        </li>
                                                        <li class="form__select--process-item">
                                                            <?php pll_k('Ph?????ng/X??'); ?>
                                                        </li>
                                                        <div class="line-process"></div>
                                                    </ul>
                                                </div>
                                                <div class="form__select--main">
                                                    <div class="form__select--item" id="select__process--tag-1">
                                                        <input type="text" class="fomr__select--value" name="city">
                                                        <ul class="form__select--list">
                                                          <?php 
                                                            // var_dump(get_list_province());
                                                            $list_province = get_list_province();
                                                            foreach ($list_province as $key => $province) :
                                                          ?>
                                                            <li data-id="<?php echo $province->code ?>" data-value="<?php echo $province->name_with_type ?>"
                                                                class="form__select--list--item form__select--city"><?php echo $province->name_with_type ?></li>
                                                          <?php
                                                            endforeach;
                                                          ?>
                                                        </ul>
                                                    </div>
                                                    <div class="form__select--item" id="select__process--tag-2">
                                                        <input type="text" class="fomr__select--value" name="district">
                                                        <ul class="form__select--list form_select_district">
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="form__select--item" id="select__process--tag-3">
                                                        <input type="text" class="fomr__select--value" name="village">
                                                        <ul class="form__select--list form_select_village">
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form__fiel">
                                            <p class="lable__note"><?php pll_k('S??? nh?? v?? t??n ???????ng'); ?></p>
                                            <input class="form__input" type="text" name="yourAddress"
                                                placeholder="<?php pll_k('VD: 99 Nguy???n V??n C???'); ?>">
                                                <p class="noty__error"> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form__fiel">
                                            <label for="yourCurrent"><?php pll_k('Anh/ch??? c?? ??ang kinh doanh kh??ng?'); ?></label>
                                            <select class="form__select--choisee" name="yourCurrent">
                                                <option hidden></option>
                                                <option selected value="<?php pll_k('??ang kinh doanh b??nh th?????ng'); ?>"><?php pll_k('??ang kinh doanh b??nh th?????ng'); ?></option>
                                                <option value="<?php pll_k('??ang b??n mang ??i / b??n online'); ?>"><?php pll_k('??ang b??n mang ??i / b??n online'); ?></option>
                                                <option value="<?php pll_k('??ang t???m d???ng kinh doanh do Covid'); ?>"><?php pll_k('??ang t???m d???ng kinh doanh do Covid'); ?></option>
                                            </select>
                                            <p class="noty__error"> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="form__fiel">
                                            <label for="loanValue"><?php pll_k('S??? ti???n anh/ch??? c???n vay (VND)'); ?></label>
                                            <input class="form__input loanValue" type="text" name="loanValue" 
                                                placeholder="<?php pll_k('Nh???p s??? ti???n'); ?>">
                                                <p class="loanWord"></p>
                                                <p class="noty__error"> </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="form__fiel">
                                            <label for="termValue"><?php pll_k('Th???i h???n kho???n vay anh/ch??? mong mu???n'); ?></label>
                                            <select class="form__select--choisee" name="termValue" placeholder="Nh???p Ch???n">
                                                <option hidden></option>
                                                <option value="<?php pll_k('??t h??n 6 th??ng'); ?>"><?php pll_k('??t h??n 6 th??ng'); ?></option>
                                                <option value="<?php pll_k('06 - 12 th??ng'); ?>"><?php pll_k('06 - 12 th??ng'); ?></option>
                                                <option value="<?php pll_k('Nhi???u h??n 12 th??ng'); ?>"><?php pll_k('Nhi???u h??n 12 th??ng'); ?></option>
                                            </select>
                                            <p class="noty__error"> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="form__register--btn form__modal"><?php pll_k('????ng k?? ngay'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



    <div class="loading">
        <div class="loading_wrapper">
          <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
    </div>
    <div class="container__popup popupSuccess">
      <div class="popup__overlay"></div> 
      <div class="popup__content">
              <div class="popup_close">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/x.png" alt="">
              </div>
              <div class="popup_main">
                  <div class="popup__sussecc--icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/check.png" alt="">
                  </div>
                  <h2 class="popup--title">????NG K?? T?? V???N VAY MI???N PH?? TH??NH C??NG!</h2>
                  <p class="popup--talk">Nh??n vi??n t?? v???n s??? li??n h??? v???i anh/ch??? trong v??ng 24h k??? t??? khi ????ng k?? th??nh c??ng</p>
                  <button class="popup_btn-backhome">TR??? L???I TRANG CH???</button>
              </div>
      </div>  
    </div>
    
    <div class="container__popup popupFailure">
      <div class="popup__overlay"></div> 
      <div class="popup__content">
              <div class="popup_close">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets//images/icon/x.png" alt="">
              </div>
              <div class="popup_main">
                  <div class="popup__sussecc--icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/check.png" alt="">
                  </div>
                  <h2 class="popup--title">????NG K?? T?? V???N VAY MI???N PH?? TH???T B???I!</h2>
                  <p class="popup--talk">???? x???y ra l???i , vui l??ng th??? l???i sau</p>
                  <button class="popup_btn-backhome">TR??? L???I TRANG CH???</button>
              </div>
        </div>  
    </div>
    <div class="mobile_footer_button">
      <li class="header__nav--item header__nav--item--button mobile_display" data-toggle="modal" data-target="#exampleModal">
        <a href="#" class="header__nav--link text-defaultColor">????ng k??</a>
      </li>
    </div>
    <?php wp_footer(); ?>
    <script>
      window.addEventListener('DOMContentLoaded', () => {

        // start the animation when the element is in the page view
        const elements = [].slice.call(document.querySelectorAll('.pie'));
        const circle = new CircularProgressBar('pie');

        if ('IntersectionObserver' in window) {
          const config = {
            root: null,
            rootMargin: '0px',
            threshold: 0.75,
          };

          const ovserver = new IntersectionObserver((entries, observer) => {
            entries.map((entry) => {
              if (entry.isIntersecting && entry.intersectionRatio > 0.75) {
                circle.initial(entry.target);
                observer.unobserve(entry.target);
              }
            });
          }, config);

          elements.map((item) => {
            ovserver.observe(item);
          });
        } else {
          elements.map((element) => {
            circle.initial(element);
          });
        }

        // global configuration
        const globalConfig = {
          "speed": 30,
          "animationSmooth": "1s ease-out",
          "strokeBottom": 5,
          "colorSlice": "#FF6D00",
          "colorCircle": "#f1f1f1",
          "round": true
        }

        const global = new CircularProgressBar('global', globalConfig);
        global.initial();

      });
    </script>
</body>
</html>