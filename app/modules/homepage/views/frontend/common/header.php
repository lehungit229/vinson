<header class="pc-header uk-visible-large"><!-- HEADER -->
	<div class="pc-header_upper">
		<div class="uk-container uk-container-center">
			<div class="uk-flex uk-flex-middle uk-flex-space-between">
				<?php echo logo(); ?>
				<div class="pc-header_tool uk-flex uk-flex-middle">
					<div class="hd-search">
						<div class="formsearch uk-clearfix">
							<form id="formsearch" name="formSearch" method="GET" action="<?php echo site_url('tim-kiem'); ?>" class="box_search uk-clearfix uk-flex uk-flex-middle">
							    <button id="do_submit" name="do_submit" type="submit" class="btn" value="Tìm"><span>Tìm</span></button>
							    <input name="keyword"  type="text" class="text_search form-control" placeholder="Tìm" value="">
							    <input name="do_search" value="1" type="hidden">
							    <div class="clear"></div>
							</form>
	                    </div>
					</div><!-- .hd-search -->
					<div class="hd-social uk-flex uk-flex-middle">
						<a href="" title=""><i class="fa fa-facebook"></i></a>
						<a href="" title=""><i class="fa fa-google"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('homepage/frontend/core/navigation'); ?>
</header><!-- .header -->
<header class="mobile-header uk-hidden-large">
	<section class="upper">
		<a class="moblie-menu-btn skin-1" href="#offcanvas" class="offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
			<span>Menu</span>
		</a>
		<div class="logo"><a href="" title="Logo"><img src="<?php echo $this->general['homepage_logo']; ?>" alt="Logo" /></a></div>
		<div class="mobile-hotline">
			<a class="value" href="tel:<?php echo $this->general['contact_hotline']; ?>" title="Tư vấn bán hàng"><?php echo $this->general['contact_hotline']; ?></a>
		</div>
	</section><!-- .upper -->
	<section class="lower">
		<div class="mobile-search">
			<form action="<?php echo site_url('tim-kiem'); ?>" method="" class="uk-form form">
				<input type="text" name="keyword" class="uk-width-1-1 input-text" placeholder="Bạn muốn tìm gì hôm nay?" />
				<button type="submit" name="" value="" class="btn-submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</section>
</header><!-- .mobile-header -->
