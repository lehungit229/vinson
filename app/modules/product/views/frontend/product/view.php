<div id="js_prd_info" data-info="<?php echo $data_info ?>"
	data-price="<?php echo $productDetail['price'] ?>"
	data-price_sale="<?php echo $productDetail['price_sale'] ?>"
	data-price_contact="<?php echo $productDetail['price_contact'] ?>"
	 data-id="<?php echo $productDetail['id'] ?>"  data-name= "<?php echo $productDetail['title'] ?>" ></div>
<div id="quantity" data-quantity="1"></div>
<?php
	$list_image = json_decode(base64_decode($productDetail['image_json']));
    $prd_extend_des = json_decode($productDetail['extend_description'], true);
?>

<div id="prd-detail">
	<?php $this->load->view('homepage/frontend/common/breadcrumb'); ?>
	<div class="prd-wrapper">
		<div class="uk-container uk-container-center">
			<h1 class="heading-1"><span><?php echo $productDetail['title']; ?></span></h1>
			<header class="panel-head">
				<div class="uk-grid uk-grid-medium">
					<div class="uk-width-large-1-2">
						<div class="prd-gallery" id="prdGallery">
							<?php if(isset($list_image) && is_array($list_image) && count($list_image)){ ?>
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-large-1-10">
									<div class="product-thumb swiper-container">
										<div class="swiper-wrapper">
											<?php foreach($list_image as $key => $val){ ?>
											<div class="swiper-slide">
												<img src="<?php echo getthumb($val); ?>" alt="<?php echo $productDetail['title']; ?>">
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="uk-width-large-9-10">
									<div class="product-gallery swiper-container">
										<div class="swiper-wrapper">
											<?php foreach($list_image as $key => $val){ ?>
											<div class="swiper-slide">
												<a href="" class="image img-scaledown"><img src="<?php echo $val; ?>" alt="<?php echo $productDetail['title']; ?>"></a>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="uk-width-large-1-2">
						<div class="prd-description">
							<h3 class="desc">Mô tả ngắn sản phẩm:</h3>
							<?php echo $productDetail['description']; ?>
							<div class="share-social uk-flex uk-flex-middle">
								<div class="sharethis-inline-share-buttons"></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<section class="panel-body uk-clearfix">
				<div class="info-left">
					<?php  
						if(isset($prd_extend_des['title']) && isset($prd_extend_des['description'])){
				  			krsort($prd_extend_des['title']);
				 	 		krsort($prd_extend_des['description']);
				 	 	}
					?>
					<?php if(isset($prd_extend_des['title']) && is_array($prd_extend_des['title']) && count($prd_extend_des['title'])){ ?>
					<ul class="menu_info extra-menu uk-list uk-clearfix" data-uk-scrollspy-nav="{closest:'li', smoothscroll:true}">
						<?php foreach($prd_extend_des['title'] as $key => $val){ ?>
						<li><a href="#<?php echo slug($val) ?>" class=""><?php echo $val; ?></a></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div><!-- .info-left -->
				<div class="info-right">
					<?php if(isset($prd_extend_des['description']) && is_array($prd_extend_des['description']) && count($prd_extend_des['description'])){ ?>
					<?php foreach($prd_extend_des['description'] as $key => $val){ ?>
					<div id="<?php echo slug($prd_extend_des['title'][$key]) ?>" class="node">
						<div class="info_title"><?php echo $prd_extend_des['title'][$key] ?></div>
						<div class="info_description">
							<?php echo $val; ?>
						</div>
					</div>
					<?php }} ?>
				</div>
			</section>
			<section class="prd-related mt30 mb30">
				<h1 class="heading-2" style="font-size: 48px;line-height: 58px;margin-bottom: 25px;text-transform: uppercase;color: #003e8b;"><span>Sản phẩm <?php echo $detailCatalogue['title'] ?> khác</span></h1>
	     		<?php if(isset($relaList) && is_array($relaList) && count($relaList)){ ?>
	     		<ul class="uk-list uk-clearfix uk-grid uk-grid-collapse uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4 list-product-1">
	     			<?php foreach($relaList as $key => $val){ ?>
	 				<?php 															
						$title = $val['title'];
						$image = $val['image'];
						$href = rewrite_url($val['canonical'], TRUE, TRUE);
						$description = cutnchar(strip_tags($val['description']),100);				
					?>
	     			<li>
	     				<div class="product">
	     					<a href="<?php echo $href; ?>" class="image img-scaledown img-zoomin" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
	     					<div class="product-info">
	     						<div class="product-info_category"><?php echo $val['cat_title'] ?></div>
	     						<h3 class="product-info_title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
	     					</div>
	     				</div><!-- .product -->
	     			</li>
	     			<?php } ?>
	     		</ul>
	     		<?php } ?>
			</section>
		</div>
	</div>
	
</div><!-- #prd-detail  -->

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5de3dd454e670c001368d56f&product=inline-share-buttons" async="async"></script>
<script>
	$(document).ready(function(){
		var total = $('.pc-header.uk-visible-large').height();
		$(window).on('scroll',function(){
			var current = $(this).scrollTop();
			if (current>= total) {
				$(".extra-menu").show();
			} else {
				$(".extra-menu").hide();
			}
		});
	});
</script>