<section class="art-catalogue">
	<div class="uk-container uk-container-center">
		<div class="breadcrumb">
			<div class="uk-container uk-container-center">
				<ul class="uk-breadcrumb">
					<li><a href="" title=""><i class="fa fa-home"></i> Trang chủ</a></li>
					<?php foreach($breadcrumb as $key => $val){ ?>
					<?php
						$title = $val['title'];
						$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
					?>
					<li class="uk-active"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div><!-- .breadcrumb -->
		<div class="art-container">
			<h1 class="heading"><span><?php echo $detailCatalogue['title'] ?></span></h1>
			<section class="homepage-project">
				<?php if(isset($articleList) && is_array($articleList) && count($articleList)){ ?>

		        <ul class="uk-clearfix uk-list uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-medium-1-4 list-project">
		            <?php foreach($articleList as $keyPost => $valPost){ ?>
		            <?php
						$title = $valPost['title'];
						$image = $valPost['image'];
						$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
						$description = cutnchar(strip_tags($valPost['description']), 500);
		            ?>
		            <li>
		                <div class="project">
		                    <a href="<?php echo $href; ?>" class="image img-cover" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
		                    <div class="info overlay uk-overlay-panel uk-overlay-background uk-overlay-slide-bottom">
		                        <h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
		                        <div class="description">
		                            <?php echo $description; ?>
		                        </div>
		                        <div class="readmore"><a href="<?php echo $href; ?>" class="btn-readmore"><?php echo 'Xem thêm'; ?></a></div>
		                    </div>
		                </div>
		            </li>
		            <?php } ?>
		        </ul>
		        <?php } ?>
		    </section>


			<?php echo (isset($PaginationList)) ? $PaginationList  : '' ?>
		</div>
	</div>
</section>
