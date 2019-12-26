<div id="art-catalogue">
    <?php $this->load->view('homepage/frontend/common/breadcrumb'); ?>
    <div class="art-wrapper lazyloading ">
    	<div class="uk-container uk-container-center">
    		<?php $children = $this->Autoload_Model->_get_where(array(
    			'select' => 'id, title, canonical',
    			'table' => 'article_catalogue',
    			'where' => array('publish' => 0,'level' => 2,)
    		), TRUE); ?>
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
     		<?php if(isset($articleList) && is_array($articleList) && count($articleList)){ ?>
     		<ul class="uk-list uk-clearfix uk-grid uk-grid-small uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 new-list">
     			<?php foreach($articleList as $key => $val){ ?>
				<?php 															
					$title = $val['title'];
					$image = $val['image'];
					$href = rewrite_url($val['canonical'], TRUE, TRUE);
					$description = cutnchar(strip_tags($val['description']), 250);					
				?>

     			<li class="mb20">
     				<div class="new-item-1">
     					<a href="<?php echo $href; ?>" class="image img-cover" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
     					<h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
     				</div>
     			</li>
     			<?php } ?>
     		</ul>
     		<?php } ?>
     		<?php echo (isset($PaginationList)) ? $PaginationList : '' ?>
    	</div>
    </div>
</div>
