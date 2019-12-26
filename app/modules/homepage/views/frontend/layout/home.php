<!DOCTYPE html>
<html lang="vi-VN" prefix="og: http://ogp.me/ns#">
<head>
	<base href="<?php echo base_url();?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index,follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="author" content="<?php echo (isset($this->general['homepage_company'])) ? $this->general['homepage_company'] : ''; ?>" />
	<meta name="copyright" content="<?php echo (isset($this->general['homepage_company'])) ? $this->general['homepage_company'] : ''; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta http-equiv="refresh" content="1800" />
	<!--for Google -->
	<title><?php echo isset($meta_title)?htmlspecialchars($meta_title):'';?></title>
	<meta name="description" charset="UTF-8" content="<?php echo isset($meta_description)?htmlspecialchars($meta_description):'';?>" />
	<?php echo isset($canonical)?'<link rel="canonical" href="'.$canonical.'" />':'';?>
	<meta property="og:locale" content="vi_VN" />
	<!-- for Facebook -->
	<meta property="og:title" content="<?php echo (isset($meta_title) && !empty($meta_title))?htmlspecialchars($meta_title):'';?>" />
	<meta property="og:type" content="<?php echo (isset($og_type) && $og_type != '') ? $og_type : 'article'; ?>" />
	<meta property="og:image" content="<?php echo (isset($meta_image) && !empty($meta_image)) ? $meta_image : base_url($this->general['homepage_logo']); ?>" />
	<?php echo isset($canonical)?'<meta property="og:url" content="'.$canonical.'" />':'';?>
	<meta property="og:description" content="<?php echo (isset($meta_description) && !empty($meta_description))?htmlspecialchars($meta_description):'';?>" />
	<meta property="og:site_name" content="<?php echo (isset($this->general['homepage_company'])) ? $this->general['homepage_company'] : ''; ?>" />
	<meta property="fb:admins" content=""/>
	<meta property="fb:app_id" content="" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo isset($meta_title)?htmlspecialchars($meta_title):'';?>" />
	<meta name="twitter:description" content="<?php echo (isset($meta_description) && !empty($meta_description))?htmlspecialchars($meta_description):'';?>" />
	<meta name="twitter:image" content="<?php echo (isset($meta_image) && !empty($meta_image))?$meta_image:base_url($this->general['homepage_logo']);?>" />
	<link rel="icon" href="<?php echo $this->general['homepage_favicon']; ?>"  type="image/png" sizes="30x30">
    <link href="template/acore/css/core.css" rel="stylesheet">
	<?php $this->load->view('homepage/frontend/common/head'); ?>

	<script type="text/javascript">
		var BASE_URL = '<?php echo base_url(); ?>';
	</script>
</head>
<body>
	<!--<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
			</div>
		</div>
	</div>-->


	<div class="lds-css ng-scope hidden"><div style="width:100%;height:100%" class="lds-eclipse"><div></div></div></div>
	<?php echo $this->general['analytic_google_analytic']; ?>
	<?php echo $this->general['facebook_facebook_pixel']; ?>
	
	<section id="body" class="<?php echo  (isset($background)) ? $background : '';  ?> <?php echo  (isset($freesize)) ? $freesize : '';  ?>">
		<?php $this->load->view('homepage/frontend/common/header'); ?>
		<?php $this->load->view(isset($template) ? $template : ''); ?>
		<?php $this->load->view('homepage/frontend/common/footer'); ?>
	</section><!-- #body -->

	<?php $this->load->view('homepage/frontend/core/offcanvas'); ?>
	<?php $this->load->view('homepage/frontend/core/notification'); ?>
	<script type="text/javascript" src="plugin/blueimp/jquery.blueimp-gallery.min.js"></script>
	<script type="text/javascript" src="plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="template/frontend/resources/plugin.js" type="text/javascript"></script>
	<script src="template/acore/js/core.js"  type="text/javascript"></script>
</body>
</html>
