<section class="contact-wrapper mb30">
	<?php
		$slide = slide(array('keyword' => 'main-slide'));
	?>
	<?php if(isset($slide) && is_array($slide) && count($slide)){ ?>
	<section class="main-slide">
		<div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 3000, animation: 'fade'}">
			<ul class="uk-slideshow uk-overlay-active">
				<?php foreach($slide as $key => $val) { ?>
				<li>
					<a class="image img-cover" href="<?php echo $val['link']; ?>" title="<?php echo $val['title']; ?>"><img src="<?php echo $val['src']; ?>" alt="<?php echo $val['src']; ?>" /></a>
				</li>
				<?php } ?>
			</ul>
			<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
				<?php for($i = 0; $i < count($slide); $i++ ){ ?>
		        <li data-uk-slideshow-item="<?php echo $i; ?>"><a href=""></a></li>
		    	<?php } ?>
		    </ul>
		</div>
		<div class="contact-form-1">
			<div class="uk-grid uk-grid-medium">
				<div class="uk-width-small-1-1 uk-width-large-1-2">
					<div class="contact-infor">
						<h2 class="heading-1"><span>Văn Phòng</span></h2>
						<p>Địa chỉ: <?php echo $this->general['contact_address'] ?></p>
						<p>Hotline: <?php echo $this->general['contact_hotline'] ?></p>
						<p>Mail: <?php echo $this->general['contact_email'] ?></p>
						<a href="" class="hotline">
							<div class="label">Hotline</div>
							<div class="number"><?php echo $this->general['contact_hotline'] ?></div>
						</a>
					</div><!-- .contact-info -->
				</div>
				<div class="uk-width-small-1-1 uk-width-large-1-2">
					<div class="form-contact-1">
						<h2 class="heading-1"><span>Ý kiến phản hồi</span></h2>
						<form action="" class="form uk-form" action="" method="post">
							<?php $error = validation_errors(); echo !empty($error)?'<div class="callout callout-danger" style="padding:10px;background:rgb(195, 94, 94);color:#fff;margin-bottom:10px;">'.$error.'</div>':'';?>
							<div class="form-row mt10">
								<input type="text" value="" name="fullname" class="input-text" placeholder="Họ Và Tên">
							</div>
							<div class="form-row mt10">
								<input type="text" value="" name="phone" class="input-text" placeholder="Số điện thoại">
							</div>
							<div class="form-row mt10">
								<input type="text" value="" name="email" class="input-text" placeholder="Email">
							</div>
							<div class="form-row mt10">
								<textarea name="message" id="" cols="30" rows="10" class="textarea" placeholder="Lời nhắn"></textarea>
							</div>
							<div class="form-row mt30">
								<input type="submit" value="Gửi" name="create" class="btn-submit">
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</section><!-- .main-slide -->
	<?php } ?>
</section>
