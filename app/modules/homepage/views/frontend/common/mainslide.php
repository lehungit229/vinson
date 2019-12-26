<?php
	$slide = slide(array('keyword' => 'main-slide'));
?>
<?php if(isset($slide) && is_array($slide) && count($slide)){ ?>
<section class="main-slide">
	<div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 3000, animation: 'fade'}">
		<ul class="uk-slideshow uk-overlay-active">
			<?php foreach($slide as $key => $val) { ?>
			<li>
				<a class="image img-cover" href="<?php echo $val['link']; ?>" title="<?php echo $val['title']; ?>"><img src="<?php echo $val['src']; ?>" alt="<?php echo $val['src']; ?>" /></a>
			</li>
			<?php } ?>
		</ul>
		<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
			<?php for($i = 0; $i < count($slide); $i++ ){ ?>
	        <li data-uk-slideshow-item="<?php echo $i; ?>"><a href=""></a></li>
	    	<?php } ?>
	    </ul>
	</div>
</section><!-- .main-slide -->
<?php } ?>
