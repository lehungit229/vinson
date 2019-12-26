<div id="homepage" class="page-body">
 	<?php $this->load->view('homepage/frontend/common/mainslide'); ?>
 	<div id="id_about" class="vnt-about">
	    <div class="w_title">
	        <div class="wrapper">
	            <div class="div_title">
	                <h2><?php echo $this->general['homepage_company'] ?></h2></div>
	            <div class="div_content"><?php echo $this->general['homepage_slogan'] ?></div>
	        </div>
	    </div>
	    <?php if(isset($section['intro']['catalogue']) && is_array($section['intro']['catalogue']) && count($section['intro']['catalogue'])){ ?>
    	<?php foreach($section['intro']['catalogue'] as $key => $val){ ?>
	    <div class="w_content">
	       <div class="uk-container uk-container-center uk-position-relative">
	       	 <div class="wrapper">
	            <div class="w_bg"></div>
		            <div class="node1">
		                <div class="w_node1">
		                    <div class="w-logo"><?php echo $this->general['homepage_company'] ?></div>
		                    <div class="w-img"><img alt="girl21" src="template/frontend/resources/img/girl21.jpg" ></div>
		                </div>
		            </div>
		            <?php if(isset($val['post']) && is_array($val['post']) && count($val['post'])){ ?>
		            <?php foreach($val['post'] as $keyPost => $valPost){ ?>
		            <div class="node<?php echo $keyPost+2; ?>">
		                <div class="n-img"><img src="<?php echo $valPost['image'] ?>" alt="<?php echo $valPost['title'] ?>"></div>
		                <div class="n-desc">
		                    <div class="n-title"><?php echo $valPost['title'] ?></div>
		                    <div class="n-content"><span style="color:#FFFFFF;"><?php echo $valPost['description'] ?></span></div>
		                </div>
		            </div>
	       		 	<?php }} ?>
		        </div>
	       </div>
	    </div>
		<?php }} ?>
	</div><!-- about -->
	<?php if(isset($section['category']['catalogue']) && is_array($section['category']['catalogue']) && count($section['category']['catalogue'])){ ?>
	<?php foreach($section['category']['catalogue'] as $key => $val){ ?>
	<?php 															
		$titleC = $val['title'];
		$hrefC = rewrite_url($val['canonical'], TRUE, TRUE);				
	?>


	<section class="category-panel page-panel lazyloading">
		<div class="uk-container uk-container-center">
			<h2 class="heading-1"><span><?php echo $titleC; ?></span></h2>
			<?php if(isset($val['post']) && is_array($val['post']) && count($val['post'])){ ?>
			<ul class="uk-list uk-clearfix uk-grid uk-grid-collapse uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 product-list">
				<?php foreach($val['post'] as $keyPost => $valPost){ ?>
				<?php 															
					$title = $valPost['title'];
					$image = $valPost['image'];
					$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
					$description = cutnchar(strip_tags($valPost['description']), 240);
					$category_title = $this->Autoload_Model->_get_where(array(
						'select' => 'title',
						'table' => 'product_catalogue',
						'where' => array('id' => $valPost['catalogueid']),
					));					
				?>


				<li>
					<div class="product-item">
						<a href="<?php echo $href; ?>" class="image img-cover" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
						<div class="product-item_info">
							<div class="category-title"><?php echo $category_title['title'] ?></div>
							<h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
							<div class="description"><?php echo $description; ?></div>
							<a class="readmore" title="<?php echo $title; ?>" href="<?php echo $href; ?>">Xem thêm</a>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
	</section>
	<?php }} ?>
	<?php if(isset($section['new']['catalogue']) && is_array($section['new']['catalogue']) && count($section['new']['catalogue'])){ ?>
	<?php foreach($section['new']['catalogue'] as $key => $val){ ?>
	<?php 															
		$titleC = $val['title'];
		$hrefC = rewrite_url($val['canonical'], TRUE, TRUE);				
	?>
	<section class="new-panel page-panel lazyloading">
		<div class="uk-container uk-container-center">
			<h2 class="heading-1"><span><?php echo $titleC; ?></span></h2>
			<?php if(isset($val['post']) && is_array($val['post']) && count($val['post'])){ ?>
			<ul class="uk-grid uk-grid-collapse uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid width-medium-1-3 uk-grid-width-large-1-4">
				<?php foreach($val['post'] as $keyPost => $valPost){ ?>
				<?php 															
					$title = $valPost['title'];
					$image = $valPost['image'];
					$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
					$description = cutnchar(strip_tags($valPost['description']), 240);
					$category_title = $this->Autoload_Model->_get_where(array(
						'select' => 'title',
						'table' => 'article_catalogue',
						'where' => array('id' => $valPost['catalogueid']),
					));			
				?>
				<li class="mb15">
					<div class="new-item">
						<a href="<?php echo $href; ?>" class="image img-cover img-zoomin" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
						<div class="info">
							<h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
							<div class="category-title"><?php echo $category_title['title'] ?></div>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
	</section>
	<?php }} ?>
	
	
	<section class="post-panel page-panel lazyloading">
		<div class="uk-container uk-container-center">
			<div class="uk-grid uk-grid-collapse">
				<div class="uk-width-large-1-2">
					<?php if(isset($section['event']['catalogue']) && is_array($section['event']['catalogue']) && count($section['event']['catalogue'])){ ?>
						<?php foreach($section['event']['catalogue'] as $key => $val){ ?>
							<?php 															
								$title = $val['title'];
								$href = rewrite_url($val['canonical'], TRUE, TRUE);					
							?>

					<div class="scroll-news">
						<h2 class="heading-2 uk-flex uk-flex-middle uk-flex-space-between">
							<span><?php echo $val['title']; ?></span>
							<a href="<?php echo $href; ?>" title="<?php echo $title; ?>">Xem tiếp</a>
						</h2>
						<?php if(isset($val['post']) && is_array($val['post']) && count($val['post'])){ ?>
						<ul class="uk-list uk-clearfix">
							<?php foreach($val['post'] as $keyPost => $valPost){ ?>
							<?php 															
								$title = $valPost['title'];
								$image = $valPost['image'];
								$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
								$description = cutnchar(strip_tags($valPost['description']),100);		
								$created = gettime($valPost['created'],'d/m/Y');		
							?>
							<li class="mb5">
								<div class="scroll-new-item uk-clearfix">
									<div class="info">
										<div class="meta"></div>
										<h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
									</div>
									<a href="<?php echo $href; ?>" class="image img-cover" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
								</div>
							</li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
					<?php }} ?>
				</div><!-- 1-2 -->
				<div class="uk-width-large-1-2">
					<div class="post-category">
						<?php if(isset($section['post']['catalogue']) && is_array($section['post']['catalogue']) && count($section['post']['catalogue'])){ ?>
							<?php foreach($section['post']['catalogue'] as $key => $val){ ?>
							<?php 															
								$titleC = $val['title'];
								$hrefC = rewrite_url($val['canonical'], TRUE, TRUE);					
							?>
						<div class="post-category-item order-<?php echo $key; ?>">
							<h2 class="heading-2 uk-flex uk-flex-middle uk-flex-space-between">
								<span><?php echo $titleC ?></span>
								<a title="<?php echo $titleC ?>" href="<?php echo $hrefC ?>" class="readmore">Xem tiếp</a>
								<?php if(isset($val['post']) && is_array($val['post']) && count($val['post'])){ ?>
							</h2>
							<ul class="uk-list uk-clearfix">
								<?php foreach($val['post'] as $keyPost => $valPost){ ?>
								<?php 															
									$title = $valPost['title'];
									$image = $valPost['image'];
									$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
									$description = cutnchar(strip_tags($valPost['description']),100);
									$created = gettime($valPost['created'], 'd/m/Y');				
								?>

								<li class="mb15">
									<div class="post-item">
										<div class="meta"><?php echo $created; ?></div>
										<h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
									</div>
								</li>
								<?php } ?>
							</ul>
							<?php } ?>
						</div>
						<?php }} ?>
					</div>
				</div>
			</div>
		</div>
	</section><!-- .psot-container -->

	
</div>
