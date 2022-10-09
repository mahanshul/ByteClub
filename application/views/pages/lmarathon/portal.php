<div class="spaced">
		<?php 
		$fieldss = ["t1p", "t2p", "t3p", "t4p", "t5p", "t6p", "t7p", "t8p", "t9p", "t10p", "t11p", "t12p"];
		$fields = ["t1", "t2", "t3", "t4", "t5", "t6", "t7", "t8", "t9", "t10", "t11", "t12"w];
		$arraynew = array();
			foreach($fields as $field){
				if(isset($field[0])){
					$current = explode("t", $field);
					echo $current[1];
					$arrayneww = array($field => ) 
					$arraynew[$fieldss[$current[1]]] = 
					$arraynew[$fieldss[intval($current[1]) + 1]] = "false";
					// print_r($arraynew);
				}
				// field} . " p" = array($field);
				// echo ${field} . " p";
			}	
		 ?>
		<h2>Admin Portal</h2>
		<button class="accordion"><h3>Task 1</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
			<div class="panel"><?=form_field(['name'=>'search_requests', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
		<div class="table">
			<?php echo $request_table;?><br><br>
		</div>
		</div>

		<button class="accordion"><h3>Task 2</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_register', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $register_table;?>
		<a href="/byte_it/generate">Generate more codes</a><br><br>
		</div>
		<button class="accordion"><h3>Task 3</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_events', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $events_table;?><br><br></div>
			<button class="accordion"><h3>Task 4</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_cre', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $cre_table;?><br><br></div>
		    <button class="accordion"><h3>Task 5</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_pro', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $prog_table;?><br><br></div>
			<button class="accordion"><h3>Task 6</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_qu', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $qu_table;?>	<br><br></div>
		<button class="accordion"><h3>Task 7</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_gd', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $gd_table;?>	<br><br></div>			
			<button class="accordion"><h3>Task 8</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_rob', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $rob_table;?>	<br><br></div>

			<button class="accordion"><h3>Task 9</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_fm', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $fm_table;?>	<br><br></div>		

			<button class="accordion"><h3>Task 10</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_sur', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $sur_table;?><br><br></div>
			<button class="accordion"><h3>Task 11</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_game', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $game_table;?>	<br><br></div>
			<button class="accordion"><h3>Task 12</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_hh', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $hh_table;?><br><br>	</div>
			<button class="accordion"><h3>Attendance Confirmed</h3> <i class="fa fa-plus-circle icon ic0" id="ic"></i></button>
		<div class="panel"><?=form_field(['name'=>'search_filtered', 'placeholder'=>'Search', 'icon'=>'search', 'required'=>'false', 'maxlength'=>'64', 'minlength'=>'3'])?>
			<?php echo $filtered_table;?><br><br></div>
</div>