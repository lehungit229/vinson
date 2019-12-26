<!-- ASIDE PRODUCT -->
<aside class="aside aside-product uk-visible-large">
	<?php
		$topRate = $this->Autoload_Model->_get_where(array('select' => 'id, title, slug, canonical, image, price, price_sale','table' => 'product','where' => array('publish' => 0),'limit' => 6,'order_by' => 'viewed desc, id desc'),TRUE);
	?>
	<?php if(isset($topRate) && is_array($topRate) && count($topRate)){  ?>
	<section class="aside-panel aside-toprate">
		<div class="aside-heading"><span>Sản phẩm xem nhiều nhất</span></div>
		<ul class="uk-list uk-clearfix list-toprate">
			<?php foreach($topRate as $key => $val){ ?>
			<?php
				$title = $val['title'];
				$image = $val['image'];
				$href = rewrite_url($val['canonical'], TRUE, TRUE);
				$price_old = addCommas(getPriceOld($val));
				$price_new = addCommas(getPriceFinal($val));
			?>

			<li class="uk-clearfix">
				<a href="<?php echo $href; ?>" class="image img-cover" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
				<div class="info">
					<div class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></div>
					<div class="price">
						<div class="main-price">Giá: <?php echo $price_new; ?> đ</div>
						<?php if($price_old != $price_new){ ?>
						<div class="sale-price">Giá Gốc: <?php echo $price_old; ?> đ</div>
						<?php } ?>
					</div>
				</div>
			</li>
			<?php } ?>
		</ul>
	</section>
	<?php } ?>

	<?php
		$category = $this->Autoload_Model->_get_where(array('select' => 'id, title, slug, canonical, parentid','table' => 'product_catalogue','where' => array('publish' => 0),'order_by' => 'order desc, id desc'),TRUE);
		$category = recursive($category);
	?>
	<?php if(isset($category) && is_array($category) && count($category)){ ?>
	<?php foreach($category as $key => $val){ ?>
	<section class="aside-category aside-panel">
		<div class="aside-heading"><span><?php echo $val['title']; ?></span></div>
		<?php if(isset($val['children']) && is_array($val['children']) && count($val['children'])){ ?>
		<ul class="uk-list uk-clearfix list-cat">
			<?php foreach($val['children'] as $keyChildren => $valChildren){ ?>
			<?php
				$href = rewrite_url($valChildren['canonical'], TRUE, TRUE)
			?>
			<li>
				<a href="<?php echo $href; ?>" title="<?php echo $valChildren['title'] ?>"><?php echo $valChildren['title'] ?></a>
				<?php if(isset($valChildren['children']) && is_array($valChildren['children']) && count($valChildren['children'])){ ?>
				<ul class="uk-list uk-clearfix children">
					<?php foreach($valChildren['children'] as $keyS => $valS){ ?>
					<?php
						$hrefS = rewrite_url($valS['canonical'], TRUE, TRUE)
					?>
					<li><a href="<?php echo $hrefS; ?>" title="<?php echo $valS['title'] ?>"><?php echo $valS['title'] ?></a></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</li>
			<?php } ?>
		</ul>
		<?php } ?>
	</section>
	<?php }} ?>
</aside><!-- .aside -->
