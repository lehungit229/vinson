<!-- ASIDE PRODUCT -->
<aside class="aside">
	<?php $sitelink = navigation(array('keyword' => 'sitelink')); ?>
	<?php if(isset($sitelink) && is_array($sitelink) && count($sitelink)){ ?>
	<?php foreach($sitelink as $key => $val){ ?>
	<section class="aside-news aside-panel normal-style">
		<div class="aside-heading"><?php echo $val['title'] ?></div>
		<?php if(isset($val['children']) && is_array($val['children']) && count($val['children'])){ ?>
		<div class="aside-body">
			<ul class="uk-list uk-clearfix">
				<?php foreach($val['children'] as $keyPost => $valPost){ ?>
				<li><a href="<?php echo $valPost['link'] ?>" title="<?php echo $valPost['title'] ?>"><?php echo $valPost['title'] ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</section>
	<?php }} ?>

	<?php
		$section = array(
			'news' => layout_control(array(
				'layoutid' => 5,
				'post' => array(
					'flag' => TRUE,
					'limit' => 10,
				),
			), FALSE),

		);
	?>

	<?php if(isset($section['news']['catalogue']) && is_array($section['news']['catalogue']) && count($section['news']['catalogue'])){ ?>
	<?php foreach($section['news']['catalogue'] as $key => $val){ ?>
	<section class="aside-post normal-style">
		<div class="aside-heading"><?php echo $val['title'] ?></div>
		<?php if(isset($val['post']) && is_array($val['post']) && count($val['post'])){ ?>
		<?php foreach($val['post'] as $keyPost => $valPost){ ?>
		<?php
			$title = $valPost['title'];
			$image = $valPost['image'];
			$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
			$description = cutnchar(strip_tags($valPost['description']),100);
		?>

		<div class="aside-post_item uk-clearfix">
			<a href="<?php echo $href; ?>" class="image img-cover post-item_image"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
			<div class="aside-post_info">
				<div class="post-item_title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></div>
			</div>
		</div>
		<?php }} ?>
	</section>
	<?php }} ?>
</aside><!-- .aside -->
