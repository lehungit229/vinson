<div id="prd-detail">
	<?php $this->load->view('homepage/frontend/common/breadcrumb'); ?>
	<div class="prd-detail_infor media-info">
		<div class="uk-container uk-container-center">
			<?php echo $detailMedia['description']; ?>
		</div>
	</div>

	<?php $gallery = json_decode($detailMedia['image_json'], TRUE); ?>
	<div class="media-gallery homepage construction">
		<h2 class="heading-2"><span>Hình ảnh công trình</span></h2>
			<section class="panel-body">
				<div class="uk-slidenav-position slider" data-uk-slider="{autoplay: true, autoplayInterval: 25500, center: true}">
					<div class="uk-slider-container">
						<ul class="uk-slider uk-grid uk-grid-collapse uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-3 list-article">
							<?php foreach($gallery as $keyPost => $valPost) { ?> 
							<li>
								<article class="article">
									<div class="thumb">
										<a class="image img-cover" href="<?php echo $valPost; ?>" title="<?php echo $valPost; ?>"><img src="<?php echo $valPost; ?>" alt="<?php echo $valPost; ?>" /></a>
									</div>
									<div class="overlay">
										<h3 class="title"><span  title="<?php echo $detailMedia['title']; ?>"><?php echo $detailMedia['title']; ?></span></h3>
									</div>
								</article>
							</li>
							<?php } ?>
						</ul>
						<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
						<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
				</div>
			</div><!-- .slider -->
		</section><!-- .panel-body -->
	</div>

	<section class="media-related">
		<div class="uk-container uk-container-center">
			<h2 class="heading-1"><span>Các bài viết khác</span></h2>
			 <?php if(isset($relatedmedia) && is_array($relatedmedia) && count($relatedmedia)){ ?>
            <div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 3000, animation: 'fade'}">
                <ul class="uk-slideshow uk-overlay-active">
                    <li>
                       <div class="uk-grid uk-grid-medium uk-grid-width-1-2 uk-grid-width-large-1-2">
                            <?php $i = 0; foreach($relatedmedia as $key => $val) { ?>
                            <?php                                                           
                                $title = $val['title'];
                                $image = $val['image'];
                                $href = rewrite_url($val['canonical'], TRUE, TRUE);                   
                            ?>
                            <div class="mb25">
                                <div class="media-item">
                                    <a class="image img-cover img-zoomin" href="<?php echo $href; ?>" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" /></a>
                                    <h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                                </div>
                            </div>
                             <?php if(($key + 1 % 2) == 0 && ($key + 1) < count($productList)){ $i++; echo '</li><li>'; } ?>
                            <?php } ?>
                       </div>
                    </li>
                </ul>
                <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                    <?php for($j = 0; $j < count($i); $j++ ){ ?>
                    <li data-uk-slideshow-item="<?php echo $j; ?>"><a href=""></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
		</div>
	</section>
</div><!-- #prd-detail  -->

