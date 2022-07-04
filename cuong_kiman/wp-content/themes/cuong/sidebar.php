<div class="news__content--stickyForm sidebar">
    <div class="form__box">
        <form action="" method="post" class="form__register widgets" id="form__products">
            <div class="form__register--fiels">
                <h2 class="form--title"><?php pll_k('ĐĂNG KÝ TƯ VẤN VAY MIỄN PHÍ'); ?></h2>
                <div class="modal-desc">
                  <?php pll_k('Kim An là nền tảng kết nối Vốn Kinh Doanh, chuyên hỗ trợ hàng triệu Chủ Kinh Doanh vay vốn tại Ngân hàng và Công ty Tài chính hoàn toàn miễn phí và không cần thế chấp tài sản.'); ?>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form__fiel">
                            <label for="name"><?php pll_k('Họ tên của anh/chị'); ?></label>
                            <input class="form__input" type="text" name="name" id="name"
                                placeholder="<?php pll_k('Họ tên của anh/chị'); ?>">
                                <p class="noty__error"> </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form__fiel">
                            <label for="phonenumber"><?php pll_k('Số điện thoại liên hệ'); ?></label>
                            <input class="form__input" type="text" name="phonenumber" id="phonenumber"
                                placeholder="<?php pll_k('Số điện thoại liên hệ'); ?>">
                                <p class="noty__error"> </p>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form__fiel">
                            <label for="name"><?php pll_k('Nghề nghiệp của anh/chị'); ?></label>
                            <select class="form__select" name="yourJob" id="yourJob">
                                <option value="<?php pll_k('Chủ kinh doanh / doanh nghiệp'); ?>"><?php pll_k('Chủ kinh doanh / doanh nghiệp'); ?></option>
                                <option value="<?php pll_k('Kinh doanh online có kho hàng'); ?>"><?php pll_k('Kinh doanh online có kho hàng'); ?></option>
                                <option value="<?php pll_k('Tiểu thương / chủ sạp chợ'); ?>"><?php pll_k('Tiểu thương / chủ sạp chợ'); ?></option>
                                <option value="<?php pll_k('Đi làm hưởng lương có hợp đồng lao động'); ?>"><?php pll_k('Đi làm hưởng lương có hợp đồng lao động'); ?></option>
                            </select>
                            <p class="noty__error"> </p>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form__fiel">
                            <label for="yourProduct"><?php pll_k('Mặt hàng kinh doanh của anh/chị'); ?></label>
                            <input class="form__input" type="text" name="yourProduct" id="yourProduct"
                                placeholder="<?php pll_k('Mặt hàng kinh doanh của anh/chị'); ?>">
                                <p class="noty__error"> </p>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form__fiel">
                            <label for="yourCountry"><?php pll_k('Địa chỉ kinh doanh của anh/chị'); ?></label>
                            <p class="lable__note"><?php pll_k('Tỉnh/ Thành phố, Quận/Huyện, Phường/Xã'); ?></p>
                            <div class="input__readonly">
                                <input class="form__input" type="text" name="yourCountry"
                                    id="yourCountry" placeholder="<?php pll_k('Nhấp chọn'); ?>" disabled>
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
                                            <?php pll_k('Tỉnh/Thành phố'); ?>
                                        </li>
                                        <li class="form__select--process-item">
                                            <?php pll_k('Quận/Huyện'); ?>
                                        </li>
                                        <li class="form__select--process-item">
                                            <?php pll_k('Phường/Xã'); ?>
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
                                    <!-- <div class="loader"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form__fiel">
                            <p class="lable__note"><?php pll_k('Số nhà và tên đường'); ?></p>
                            <input class="form__input" type="text" name="yourAddress"
                                placeholder="<?php pll_k('VD: 99 Nguyễn Văn Cừ'); ?>">
                                <p class="noty__error"> </p>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form__fiel">
                            <label for="yourCurrent"><?php pll_k('Anh/chị có đang kinh doanh không?'); ?></label>
                            <select class="form__select--choisee" name="yourCurrent" id="yourCurrent">
                                <option hidden></option>
                                <option selected value="<?php pll_k('Đang kinh doanh bình thường'); ?>"><?php pll_k('Đang kinh doanh bình thường'); ?></option>
                                <option value="<?php pll_k('Đang bán mang đi / bán online'); ?>"><?php pll_k('Đang bán mang đi / bán online'); ?></option>
                                <option value="<?php pll_k('Đang tạm dừng kinh doanh do Covid'); ?>"><?php pll_k('Đang tạm dừng kinh doanh do Covid'); ?></option>
                            </select>
                            <p class="noty__error"> </p>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form__fiel">
                            <label for="loanValue"><?php pll_k('Số tiền anh/chị cần vay (VND)'); ?></label>
                            <input class="form__input loanValue" type="text" name="loanValue" id="loanValue"
                                placeholder="<?php pll_k('Nhập số tiền'); ?>">
                                <p class="loanWord"></p>
                                <p class="noty__error"> </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form__fiel">
                            <label for="termValue"><?php pll_k('Thời hạn khoản vay anh/chị mong muốn'); ?></label>
                            <select class="form__select--choisee" name="termValue" id="termValue">
                                <option hidden></option>
                                <option value="<?php pll_k('Ít hơn 6 tháng'); ?>"><?php pll_k('Ít hơn 6 tháng'); ?></option>
                                <option value="<?php pll_k('06 - 12 tháng'); ?>"><?php pll_k('06 - 12 tháng'); ?></option>
                                <option value="<?php pll_k('Nhiều hơn 12 tháng'); ?>"><?php pll_k('Nhiều hơn 12 tháng'); ?></option>
                            </select>
                            <p class="noty__error"> </p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="form__register--btn form__products"><?php pll_k('Đăng ký ngay'); ?></button>
        </form>

    </div>
</div>

