<div id="prd-catalogue">
     <?php $this->load->view('homepage/frontend/common/breadcrumb'); ?>
     <div class="prd-wrapper">
     	<div class="uk-container uk-container-center">
     		<?php if(isset($children) && is_array($children) && count($children)){ ?>
     		<ul class="uk-list uk-clearfix prd-child-list uk-flex uk-flex-center">
     			<?php foreach($children as $key => $val){ ?>
 				<?php 															
					$title = $val['title'];
					$href = rewrite_url($val['canonical'], TRUE, TRUE);					
				?>
     			<li><a href="<?php echo $href; ?>" tilte="<?php echo $title; ?>"><?php echo $title; ?></a></li>
     			<?php } ?>
     		</ul>
     		<?php } ?>
     		<h1 class="heading-1"><span><?php echo $detailCatalogue['title'] ?></span></h1>
     		<?php if(isset($productList) && is_array($productList) && count($productList)){ ?>
     		<ul class="uk-list uk-clearfix uk-grid uk-grid-collapse uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 list-product-1">
     			<?php foreach($productList as $key => $val){ ?>
 				<?php 															
					$title = $val['title'];
					$image = $val['image'];
					$href = rewrite_url($val['canonical'], TRUE, TRUE);
					$description = cutnchar(strip_tags($val['description']),100);				
				?>
     			<li>
     				<div class="product">
     					<a href="<?php echo $href; ?>" class="image img-cover img-zoomin" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
     					<div class="product-info">
     						<div class="product-info_category"><?php echo $val['cat_title'] ?></div>
     						<h3 class="product-info_title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
     					</div>
     				</div><!-- .product -->
     			</li>
     			<?php } ?>
     		</ul>
     		<?php } ?>
     		<?php echo (isset($PaginationList)) ? $PaginationList : '' ?>
     	</div>
     </div>
</div>
