	<?php if($page === "byte_it/events" || $page === "quick_byte/events"):?>
		<?=script_tag("rules");?>
	<?php endif;?>
	<?= script_tag("base"); ?>
	<?= script_tag("THEME_".$theme); ?>
	<?= script_tag("PAGE_".$page_css); ?>

	<?php if($containsforjs == true):?>
		<?=script_tag("byteit");?>
	<?php endif;?>
</body>
</html>