<?php if(isset($articleList) && is_array($articleList) && count($articleList)){ ?>
<?php if($style == 'grid'){ ?>
<ul class="uk-list uk-clearfix list-post-grid uk-grid uk-grid-medium uk-grid-width-1-<?php echo $freesize ?> uk-grid-width-small-1-<?php echo $small ?> uk-grid-width-medium-1-<?php echo $medium ?> uk-grid-width-large-1-<?php echo $large; ?>">
    <?php foreach($articleList as $key => $val){ ?>
    <?php
        $title = $val['title'];
        $image = $val['image'];
        $href = rewrite_url($val['canonical'], TRUE, TRUE);
        $description = cutnchar(strip_tags($val['description']), 200);
        $created = gettime($val['created'],'d/m/Y');
    ?>

    <li>
        <div class="post">
            <a href="<?php echo $href; ?>" class="image img-cover"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
            <div class="info">
                <h3 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                <div class="description">
                    <?php echo $description; ?>
                </div>
                <div class="readmore"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>">Xem thêm</a></div>
            </div>
        </div>
    </li>
    <?php } ?>
</ul>
<?php }else if($style == 'list'){ ?>


<?php }} ?>
