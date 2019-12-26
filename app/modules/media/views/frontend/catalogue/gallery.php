<div id="prd-catalogue">
     <?php   
        $catalogueList = $this->Autoload_Model->_get_where(array(
            'select' => 'id, title, slug, canonical',
            'table' => 'media_catalogue',
            'where' => array('publish' => 0,'level' => 2),
            'order_by' => 'order desc, id desc'
        ), TRUE);
    ?>
    <?php if(isset($catalogueList) && is_array($catalogueList) && count($catalogueList)){ ?>
   <div class="catalogue-list">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-center">
                <?php foreach($catalogueList as $key => $val){ ?>
                <?php                                                           
                    $title = $val['title'];
                    $href = rewrite_url($val['canonical'], TRUE, TRUE);                     
                ?>
                 <a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
                <?php } ?>
            </div>
        </div>
   </div>
  <?php } ?>

    <div class="uk-container uk-container-center">
        <section class="product-slide">
            <h1 class="heading"><?php echo $detailCatalogue['title'] ?></h1>
            <?php if(isset($mediaList) && is_array($mediaList) && count($mediaList)){ ?>
            <div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 3000, animation: 'fade'}">
                <ul class="uk-slideshow uk-overlay-active">
                    <li>
                       <div class="uk-grid uk-grid-medium uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-large-1-2">
                            <?php $i = 0; foreach($mediaList as $key => $val) { ?>
                            <?php                                                           
                                $title = $val['title'];
                                $image = $val['image'];
                                $href = rewrite_url($val['canonical'], TRUE, TRUE);                   
                            ?>
                            <div class="mb25">
                                <div class="media-item">
                                    <a class="image img-cover img-zoomin" href="<?php echo $href; ?>" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" /></a>
                                    <h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                                </div>
                            </div>
                             <?php if(($key + 1 % 2) == 0 && ($key + 1) < count($productList)){ $i++; echo '</li><li>'; } ?>
                            <?php } ?>
                       </div>
                    </li>
                </ul>
                <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                    <?php for($j = 0; $j < count($i); $j++ ){ ?>
                    <li data-uk-slideshow-item="<?php echo $j; ?>"><a href=""></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </section><!-- .main-slide -->
    </div>
</div>
