<div id="artdetail" class="page-body">
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
	
	
	<div class="artdetail">
		<div class="uk-container uk-container-center">
			<div class="artdetail-content">
				<h1 class="entry-title"><?php echo $detailArticle['title']; ?></h1>
				<div class="entry-image"><img src="<?php echo $detailArticle['image']; ?>" alt="<?php echo $detailArticle['title']; ?>" /></div>
				<div class="entry-description">
					<?php echo $detailArticle['description']; ?>
				</div>
			</div>
			
			<?php $this->load->view('homepage/frontend/core/artrelate', array('style' => 1)); ?>
			
			<?php $this->load->view('homepage/frontend/core/comment', array('module' => $module,'moduleid' => $detailArticle['id'])); ?>
			
		</div>
	</div>
	
	
</div><!-- #prdcatalogue -->