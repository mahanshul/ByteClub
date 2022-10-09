<div class="spaced"> 
	<h3>Registration - Events</h3>
	<?php 
						
		$school = set_value('school', $school_name);

		$fields = ["c_1", "c_1_email", "c_2", "c_2_email", "c_3", "c_3_email", "c_4","c_4_email", "p_1", "p_1_email", "p_1_hr", "p_2", "p_2_email", "p_2_hr", "m_1", "m_1_email","m_2","m_2_email", "s_1", "s_1_email", "s_2", "s_2_email", "q_1", "q_1_email", "q_2", "q_2_email", "gd_1", "gd_1_email", "gd_2", "gd_2_email","r_1", "r_1_email", "f_1", "f_1_email", "f_2", "f_2_email", "g_1", "g_1_email", "h_1", "h_1_email"];

		foreach ($fields as $field) {
			${$field} = set_value($field, $pop[$field]);
		}

	?>

	<?php echo form_open('/byte_it/register_events'); ?>
		<?php if(isset($formerror) AND $formerror AND $c_1 != NULL AND $c_1){
			echo "Error In Form!";
		} ?>
		<div id="inner">
			<fieldset id="sender-fieldset">
				<?=form_field(['name'=>'hash', 'value'=>"$hash", 'placeholder'=>'Enter Registration Code', 'icon'=>'security', 'maxlength'=>'255', 'minlength'=>'3', 'disabled'=>'disabled'])?>
				<?php echo form_error("school", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'school','value'=>"$school", 'placeholder'=>'Enter School Name', 'icon'=>'school', 'maxlength'=>'255', 'minlength'=>'3', 'disabled'=>'disabled'])?>

				<h3><b>Open Events</b></h3>
				<h4>Build.IT</h4>
				<?php echo form_error("c_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'c_1','value'=>"$c_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("c_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'c_1_email','value' => "$c_1_email", 'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("c_2", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'c_2','value'=>"$c_2",'placeholder'=>'Enter Participant 2 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("c_2_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'c_2_email','value'=>"$c_2_email", 'placeholder'=>'Enter Participant 2 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("c_3", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'c_3','value'=>"$c_3",'placeholder'=>'Enter Participant 3 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("c_3_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'c_3_email','value'=>"$c_3_email", 'placeholder'=>'Enter Participant 3 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("c_4", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'c_4','value'=>"$c_4",'placeholder'=>'Enter Participant 4 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("c_4_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'c_4_email','value'=>"$c_4_email", 'placeholder'=>'Enter Participant 4 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>


				<h4>Programming</h4>


				<?php echo form_error("p_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'p_1','value'=>"$p_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("p_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'p_1_email','value'=>"$p_1_email", 'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("p_1_hr", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'p_1_hr','value'=>"$p_1_hr", 'placeholder'=>'Enter Participant 1 Hackerrank ID', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>	
				<?php echo form_error("p_2", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'p_2','value'=>"$p_2", 'placeholder'=>'Enter Participant 2 Name', 'icon'=>'face',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("p_2_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'p_2_email','value'=>"$p_2_email", 'placeholder'=>'Enter Participant 2 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("p_2_hr", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'p_2_hr','value'=>"$p_2_hr", 'placeholder'=>'Enter Participant 2 Hackerrank ID', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>


				<h4>Tech Talk</h4>
				
				<?php echo form_error("gd_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'gd_1','value'=>"$gd_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("gd_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'gd_1_email','value'=>"$gd_1_email", 'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>


				<h4>Snap.IT</h4>
				<?php echo form_error("r_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'r_1','value'=>"$r_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("r_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'r_1_email', 'value'=>"$r_1_email",'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>

				<h4>Surprise</h4>
				<?php echo form_error("s_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'s_1','value'=>"$s_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("s_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'s_1_email','value'=>"$s_1_email", 'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("s_2", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'s_2','value'=>"$s_2", 'placeholder'=>'Enter Participant 2 Name', 'icon'=>'face',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("s_2_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'s_2_email','value'=>"$s_2_email", 'placeholder'=>'Enter Participant 2 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>


				<h4>Tech Quiz</h4>
				<?php echo form_error("q_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'q_1','value'=>"$q_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("q_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'q_1_email','value'=>"$q_1_email", 'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>


				<?php echo form_error("q_2", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'q_2','value'=>"$q_2", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("q_2_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'q_2_email','value'=>"$q_2_email", 'placeholder'=>'Enter Participant 2 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>


				<h4>Gaming</h4>
				
				<?php echo form_error("h_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'h_1','value'=>"$h_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("h_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'h_1_email','value'=>"$h_1_email", 'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>



				<h4>3D Innovate</h4>
				<?php echo form_error("m_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'m_1','value'=>"$m_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("m_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'m_1_email', 'value'=>"$m_1_email",'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>



				<h4>Tinkerthon</h4>
				
				<?php echo form_error("gd_2", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'gd_2','value'=>"$gd_2", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("gd_2_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'gd_2_email','value'=>"$gd_2_email", 'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("m_2", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'m_2','value'=>"$m_2", 'placeholder'=>'Enter Participant 2 Name', 'icon'=>'face',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("m_2_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'m_2_email','value'=>"$m_2_email", 'placeholder'=>'Enter Participant 2 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>

				<h3><b>Junior Events</b></h3>
				<h4>Junior Design</h4>
				<?php echo form_error("f_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'f_1','value'=>"$f_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("f_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'f_1_email', 'value'=>"$f_1_email",'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>

				<?php echo form_error("f_2", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'f_2','value'=>"$f_2", 'placeholder'=>'Enter Participant 2 Name', 'icon'=>'face',  'maxlength'=>'255', 'minlength'=>'3'])?>
				<?php echo form_error("f_2_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'f_2_email','value'=>"$f_2_email", 'placeholder'=>'Enter Participant 2 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>


				<h4>Present.IT</h4>
				<?php echo form_error("g_1", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'g_1','value'=>"$g_1", 'placeholder'=>'Enter Participant 1 Name', 'icon'=>'face', 'maxlength'=>'255', 'minlength'=>'3' ])?>
				<?php echo form_error("g_1_email", "<div style='color: red;'>", "</div>"); ?>
				<?=form_field(['name'=>'g_1_email','value'=>"$g_1_email", 'placeholder'=>'Enter Participant 1 Email', 'icon'=>'mail',  'maxlength'=>'255', 'minlength'=>'3'])?>

			</fieldset>
		<?php
			echo component("button_button", ["icon"=>"send", "text"=>"Submit"])
		?>
	</form>
</div>
