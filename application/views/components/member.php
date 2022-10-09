<a class='member <?=$website?> target='_blank'>
	<div class="image">
		<img class="real" <?=$image?>>
		<div class="default">
			<i class="material-icons icon">person</i>
		</div>	
	</div>
	<div class="info">
		<div class="name"><?=$name?></div>
		<div class="designation">
			<div class="post"><?=$post?></div>
			<?php
				if (!empty($member_year))
				{
					component('member_year', array('member_year' => $member_year));					
				}
			?>
		</div>
	</div>
</a>