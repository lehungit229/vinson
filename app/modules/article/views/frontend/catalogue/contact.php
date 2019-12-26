<div id="artcatalogue" class="page-body">
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-medium">
			<div class="uk-width-large-1-5">
				<?php $this->load->view('homepage/frontend/common/aside-contact'); ?>
			</div>
			<div class="uk-width-large-4-5">
			
				<div class="artcatalogue">
					<div class="uk-container uk-container-center">
						<div class="main-breadcrumb">
							<div class="uk-container uk-container-center">
								<?php if(check_array($breadcrumb)){ ?>
									<ul class="uk-breadcrumb">
										<li><a href="<?php echo BASE_URL ?>" title="Trang chủ">Trang Chủ</a></li>
										<?php foreach ($breadcrumb as $key => $val) { ?>
											<li><a href="<?php echo rewrite_url($val['canonical']) ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></a></li>
										<?php } ?>
									</ul>
								<?php } ?>
							</div>
						</div>
						<div class="artcatalogue-list">
							<div class="uk-grid uk-grid-medium uk-grid-width-large-1-2">
								<div class="contact-information">
									<?php echo $detailCatalogue['description']; ?>
								</div>
								<div class="contact-form">
									<h2 class="heading-2"><span>Gửi tin nhắn cho chúng tôi</span></h2>
									<form class="form uk-form">
										<div class="form-row">
											<label class="text">Tên khách hàng</label>
											<input type="text" value="" name="fullname" class="input-text" />
										</div>
										<div class="uk-grid uk-grid-medium uk-grid-width-large-1-2">
											<div class="form-row">
												<label class="text">Email khách hàng</label>
												<input type="text" value="" name="email" class="input-text" />
											</div>
											<div class="form-row">
												<label class="text">Số điện thoại</label>
												<input type="text" value="" name="email" class="input-text" />
											</div>
										</div>
										<div class="form-row">
											<label class="text">Nội dung tin nhắn</label>
											<textarea type="text" value="" name="message" class="textarea"></textarea>
										</div>
										<div class="form-row">
											<input type="submit" value="Gửi đi" name="submit" class="btn-contact" />
										</div>
									</form>
								</div>
							</div>
							<div class="map mt25">
								<span class="image img-cover"><img src="<?php echo $detailCatalogue['image']; ?>" alt="<?php echo $detailCatalogue['title']; ?>" /><span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- #prdcatalogue -->