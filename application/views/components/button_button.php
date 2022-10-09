<button	id="send" class="button-button <?=$class;?>" type="submit" value="Submit">
	<div class="container">
		<?php if (isset($icon)):?>
		<div class="icon-container">
			<i class="material-icons icon"><?=$icon?></i>
		</div><?php endif; ?><div class="text"><?=$text?></div>
	</div>
</button>