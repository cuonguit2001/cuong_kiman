<?php
	function email_html_template($array) {
		ob_start();
	?>
		<p><strong>Họ và Tên Khách Hàng:</strong> <?php echo $array['name']; ?></p>
		<p><strong>Số điện thoại liên hệ:</strong> <?php echo $array['phonenumber']; ?></p>
		<p><strong>Nghề Nghiệp:</strong> <?php echo $array['yourJob']; ?></p>
		<p><strong>Kinh Doanh:</strong> <?php echo $array['yourProduct']; ?></p>
		<p><strong>Địa Chỉ Kinh Doanh:</strong> <?php echo $array['yourAddress'].', '.$array['village'].', '.$array['district'].', '.$array['city']; ?></p>
		<p><strong>Có Đang Kinh Doanh:</strong> <?php echo $array['yourCurrent']; ?></p>
		<p><strong>Số Tiền Vay:</strong> <?php echo $array['loanValue']; ?></p>
		<p><strong>Thời Hạn Vay:</strong> <?php echo $array['termValue']; ?></p>
	<?php
		$content = ob_get_contents();
		ob_get_clean();
		return $content;
	}