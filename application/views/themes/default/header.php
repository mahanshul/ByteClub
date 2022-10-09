<div class="load-overlay">
	<div class="loader main-loader">
		<div class="text">
			Retrieving Bytes
		</div>
		<div class="bytes">
			<?=component("loader_bytes", ["number"=>"27"])?>
		</div>
	</div>
</div>

<div id="topbar" class="solid">
	<div class="left">
		<h1 id="title" class="top">Byte Club</h1>
	</div>
	<div class="right">
		<nav id="menu">
			  <div id="menuToggle">
			    <input type="checkbox" />
			    <span></span>
			    <span></span>
			    <span></span>
			   </div>
			<?=menu("menu")?>
		</nav><div class="menu-pointer">
		</div>
		<?php
			if ($logged_in)
			{
				// echo "<a id='login_button' href='/byte_it/team'>Dashboard</a>";
			}
			else
			{
				// echo "<a id='login_button' href='/login'>Login</a>";
			}
		?>
	</div>
</div>

<section id="wrapper">