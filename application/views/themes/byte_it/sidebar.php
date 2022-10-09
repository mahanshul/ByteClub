<section id="byte_it" class="sidebar">
	<h2>Byte.IT 2022</h2>
	<nav>

		<?php if ($event_started): ?>
		<section class="menu_group">
			<ul>
				<?=menu("byte_it/leaderboard", 2)?>
			</ul>
		</section>
		<?php endif; ?>
		
		<?php if ($logged_in): ?>
		<section class="menu_group">
			<h3>Admin</h3>
			<ul>
				<?=menu("byte_it/admin", 3)?>
			</ul>
		</section>
		<?php endif; ?>
<!-- 		<section class="menu_group">
			<h3>Coming Soon</h3>
		</section>
 -->
		<section class="menu_group">
			<h3>Guide</h3>
			<ul>
				<?=menu("byte_it/guide", 2)?>
			</ul>
		</section>

		<section class="menu_group">
			<h3>Registration</h3>
			<ul>
				<?=menu("byte_it/registration", 2)?>
			</ul>
		</section>
		<?php if(true): ?>
		<section class="menu_group">
			<h3>Prelim</h3>
			<ul>
				<?=menu("byte_it/prelim", 2)?>
			</ul>
		</section>
		<?php endif; ?> 
	</nav>
</section>