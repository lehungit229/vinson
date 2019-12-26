<div id="artcatalogue" class="page-body">
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
	
	
	<div class="artcatalogue">
		<div class="uk-container uk-container-center">
			
			<h1 class="heading-1"><a href="<?php echo $canonical; ?>" title="<?php echo $detailCatalogue['title']; ?>"><?php echo $detailCatalogue['title']; ?></a></h1>
			<?php if(!empty($detailCatalogue['description'])){ ?>
			<div class="description mb20">
				<?php echo $detailCatalogue['description']; ?>
			</div>
			<?php } ?>
			
			<div class="artcatalogue-list">
				<?php if(isset($articleList) && is_array($articleList) && count($articleList)){ ?>
				<ul class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-3 list-artdetail style-1">
					<?php foreach($articleList as $key => $val){ ?>
					<?php 															
						$title = $val['title'];
						$image = $val['image'];
						$href = rewrite_url($val['canonical'], TRUE, TRUE);
						$description = cutnchar(strip_tags($val['description']), 200);	
						$comment = $val['comment'];
						$created = gettime($val['created'], 'd/m/Y H:i')
					?>

					<li>
						<article class="article">
							<div class="thumb"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>" class="image img-cover"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" /></a></div>
							<div class="info">
								<h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
								<div class="description">
									<?php echo $description; ?>
								</div>
								<div class="meta uk-flex uk-flex-middle uk-flex-space-between">
									<span><?php echo $created; ?></span>
									<span><?php echo $comment ?> Bình luận</span>
								</div>
								<div class="readmore">
									<a href="<?php echo $href; ?>" title="<?php echo $title; ?>">Xem chi tiết</a>
								</div>
							</div>
						</article>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
				
				<?php echo  (isset($PaginationList)) ? $PaginationList : ''; ?>
				
			</div>
		</div>
	</div>
	
	
</div><!-- #prdcatalogue -->