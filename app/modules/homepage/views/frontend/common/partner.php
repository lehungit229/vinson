<?php $partner = slide(array(
	'keyword' => 'partner'
)); ?>
<?php
   $owlInit = array(
	   'margin' => 20,
	   'lazyload' => true,
	   'nav' => true,
	   'autoplay' => true,
	   'smartSpeed' => 1000,
	   'autoplayTimeout' => 3000,
	   'dots' => false,
	   'loop' => true,
	   'responsive' => array(
		   0 => array(
			   'items' => 2,
		   ),
		   600 => array(
			   'items' => 2,
		   ),
		   1000 => array(
			   'items' => 5,
		   ),
	   )
   );
?>

<?php if(isset($partner) && is_array($partner) && count($partner)){ ?>

<div class="uk-container uk-container-center lazyloading">
	<section class="partner-panel owl-slide">
		<h2 class="heading-1"><span>Đối tác của chúng tôi</span></h2>
		<div class="owl-carousel owl-theme owl-loaded owl-drag" data-option="<?php echo base64_encode(json_encode($owlInit)) ?>">
			 <?php foreach($partner as $key => $val){ ?>
			 <div><a class="image img-scaledown" href="<?php echo $val['link'] ?>" title="<?php echo $val['title'] ?>"><img src="<?php echo $val['src'] ?>" alt="<?php echo $val['title'] ?>" /></a></div>
			 <?php } ?>
		 </div>
	</section><!-- .partner -->
</div>
<?php } ?>
