<?php $main_nav = navigation(array('keyword' => 'main', 'output' => 'array')); ?>
<div id="offcanvas" class="uk-offcanvas offcanvas">
	<div class="uk-offcanvas-bar">
		<form class="uk-search" action="" data-uk-search="{}">
		    <input class="uk-search-field" type="search" name="keyword" placeholder="Tìm kiếm...">
        </form>
        <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?> 
		<ul class="l1 uk-nav uk-nav-offcanvas uk-nav uk-nav-parent-icon" data-uk-nav>
			<?php foreach ($main_nav as $key => $val) { ?>
			<li class="l1 <?php echo (isset($val['children']) && is_array($val['children']) && count($val['children']))?'uk-parent uk-position-relative':''; ?>">
				<?php echo (isset($val['children']) && is_array($val['children']) && count($val['children']))?'<a href="#" title="" class="dropicon"></a>':''; ?>
				<a href="<?php echo $val['link']; ?>" title="<?php echo $val['title']; ?>" class="l1"><?php echo $val['title']; ?></a>
				<?php if(isset($val['children']) && is_array($val['children']) && count($val['children'])) { ?>
				<ul class="l2 uk-nav-sub">
					<?php foreach ($val['children'] as $keyItem => $valItem) { ?>
					<li class="l2"><a href="<?php echo $valItem['link']; ?>" title="<?php echo $valItem['title']; ?>" class="l2"><?php echo $valItem['title']; ?></a></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</li>
			<?php } ?>
		</ul>
		<?php } ?>
	</div>
</div><!-- #offcanvas -->