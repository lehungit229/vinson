<?php if(isset($breadcrumbStyle) && $breadcrumbStyle == 'expand'){ ?>
<section class="breadcrumb breadcrumb-<?php echo $breadcrumbStyle; ?>" style="background-image: url(<?php echo (!empty($detailCatalogue['image'])) ? $detailCatalogue['image'] : 'template/frontend/resources/img/breadcrumb.jpg' ?>)">
    <div class="vertical-line animated fadeInDown"></div>
    <div class="uk-container uk-container-center">
        <div class="breadcrumb-content">
            <?php if(isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb)){ ?>
            <div class="breadcrumb-subtitle">
                <a href="." title="<?php echo HOMEBREADCRUMB; ?>"><?php echo HOMEBREADCRUMB; ?></a>
                <?php foreach($breadcrumb as $key => $val){ ?>
                <?php
					$title = $val['title'];
					$href = rewrite_url($val['canonical'], TRUE, TRUE);
                ?>
                <a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="breadcrumb-maintitle"><?php echo $detailCatalogue['title']; ?></div>
        </div>
    </div>
</section><!--- breadcrumb-expand -->
<?php }else{ ?>
    <div class="breadcrumb">
        	<div class="uk-container uk-container-center">
        		<ul class="uk-breadcrumb">
        			<li><a href="." title="<?php echo HOMEBREADCRUMB; ?>"><?php echo HOMEBREADCRUMB; ?></a></li>
                    <?php foreach($breadcrumb as $key => $val){ ?>
                    <?php
    					$title = $val['title'];
    					$href = rewrite_url($val['canonical'], TRUE, TRUE);
                    ?>
        			<li class="uk-active"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></li>
                    <?php } ?>
    			</ul>
        	</div>
        </div>
<?php } ?>
