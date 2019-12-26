<div id="art-detail">
	<?php $this->load->view('homepage/frontend/common/breadcrumb'); ?>
	<div class="art-wrapper mb20">
		<div class="uk-container uk-container-center">
			<h1 class="heading-1 uk-text-center"><span><?php echo $detailArticle['title'] ?></span></h1>
			<div class="uk-grid uk-grid-small">
				<div class="uk-width-large-3-4">
					<div class="art-detail-content">
						<div class="detail-content_meta">Ngày đăng: <?php echo gettime($detailArticle['created'], 'd/m/Y H:i:s') ?></div>
						<?php echo $detailArticle['description']; ?>
					</div>
				</div>
				<div class="uk-width-large-1-4">
					<?php $this->load->view('homepage/frontend/common/aside'); ?>
				</div>
			</div>
		</div>
	</div>

</div><!-- #prd-detail  -->

