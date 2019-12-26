<div id="homepage" class="page-body">
    <div class="uk-container uk-container-center">
		    <div class="homepage-intro page-panel">
        	<div class="product-container">
                <h1 class="heading-2"><a href="<?php echo site_url('tim-kiem').'?keyword='.$this->input->get('keyword').''; ?>" title="">Tìm kiếm: <?php echo $this->input->get('keyword'); ?></a></h1>
                 <?php if(isset($objectList) && is_array($objectList) && count($objectList)){ ?>
                  <ul class="uk-list uk-clearfix uk-grid uk-grid-collapse uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 list-product-1">
                    <?php foreach($objectList as $key => $val){ ?>
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
                          <h3 class="product-info_title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                        </div>
                      </div><!-- .product -->
                    </li>
                    <?php } ?>
                  </ul>
                  <?php } ?>
            <?php echo (isset($PaginationList)) ? $PaginationList  : ''; ?>
               </div>
        </div>
    </div><!-- .uk-container -->
</div>
