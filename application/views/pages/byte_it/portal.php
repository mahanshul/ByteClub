<div class="spaced">
	<h2>Admin Portal</h2>
	<button class="accordion">
		<h3>Requests</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel">
		<?=form_field(['name'=>'search_requests', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<div class="table">
			<?php echo $request_table;?><br>
			<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('request')"])
				?>
				<br><br>
		</div>
	</div>
	<button class="accordion">
		<h3>Registration</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_register', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $register_table;?><br><br>
		<a href="/byte_it/generate">Generate more codes</a><br><br>
		<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('register')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_events', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $events_table;?><br>
		<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('events')"])
				?>
	</div>
	<button class="accordion">
		<h3>Events - Build.IT</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_cre', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $cre_table;?><br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('cre')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - Programming</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_pro', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $prog_table;?><br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('prog')"])
				?><br><br>
	</div>
	<button class="accordion">
		<h3>Events - Tech Talk</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_gd', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $gd_table;?>	<br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('gd')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - 3D Innovate</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_mm', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $mm_table;?>	<br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('mm')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - TinkerThon</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_tk', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $tk_table;?>	<br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('tk')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - Quiz</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_qu', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $qu_table;?>	<br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('qu')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - Snap.IT</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_rob', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $rob_table;?>	<br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('rob')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - Junior Design</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_fm', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $fm_table;?>	<br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('fm')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - Surprise</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_sur', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $sur_table;?><br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('sur')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - Present.IT</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_game', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $game_table;?>	<br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('game')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Events - Gaming</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_hh', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $hh_table;?><br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('hh')"])
				?> <br><br>
	</div>
	<button class="accordion">
		<h3>Attendance Confirmed</h3>
		<i class="fa fa-plus-circle icon ic0" id="ic"></i>
	</button>
	<div class="panel"><?=form_field(['name'=>'search_filtered', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<?php echo $filtered_table;?><br><br>
					<?php
				echo component("admin_button", ["icon"=>"download", "text"=>"Download", "class"=>"download","function"=>"export_helper('filtered')"])
				?>
	</div>
</div>