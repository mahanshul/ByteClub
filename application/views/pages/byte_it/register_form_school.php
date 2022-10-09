<div class="spaced">
	<h3>Registration - School</h3>
	
	<?php echo form_open('/byte_it/register_school'); ?>
		
		<div id="inner">
			<fieldset id="sender-fieldset">
				<?php 
				
				$school = set_value('school', $pop["school_name"]);
				$school_email_id = set_value('school_email_id', $pop["school_email_id"]);
				$teacher = set_value('teacher', $pop["teacher_name"]);
				$teacher_email_id = set_value('teacher_email_id', $pop["teacher_email_id"]);
				$teacher_mobile = set_value('teacher_mobile', $pop["teacher_mobile"]);
				$student = set_value('student', $pop["student_incharge_name"]);
				$student_email_id = set_value('student_email_id', $pop["student_incharge_email_id"]);
				$student_mobile = set_value('student_mobile', $pop["student_incharge_mobile"]);

				?>

				<div style="color: red;"><?php echo validation_errors(); ?></div>

				<?=form_field(['name'=>'hash', 'value'=>"$hash", 'placeholder'=>'Enter Registration Code', 'icon'=>'security', 'maxlength'=>'19', 'minlength'=>'19','disabled'=>'disabled'])?>

				<?=form_field(['name'=>'school', 'value'=>"$school", 'placeholder'=>'Enter School Name', 'icon'=>'school', 'required'=>'true', 'maxlength'=>'64', 'minlength'=>'3'])?>

				<?=form_field(['name'=>'school_email_id', 'value'=>"$school_email_id", 'placeholder'=>'Enter School Email ID', 'icon'=>'mail', 'required'=>'true', 'maxlength'=>'254', 'minlength'=>'5'])?>

				<?=form_field(['name'=>'teacher', 'value'=>"$teacher", 'placeholder'=>'Enter Teacher Name', 'icon'=>'face', 'required'=>'true', 'maxlength'=>'64', 'minlength'=>'3'])?>

				<?=form_field(['name'=>'teacher_email_id', 'value'=>"$teacher_email_id", 'placeholder'=>'Enter Teacher Email ID', 'icon'=>'mail', 'required'=>'true', 'maxlength'=>'254', 'minlength'=>'5'])?>

				<?=form_field(['name'=>'teacher_mobile', 'value'=>"$teacher_mobile", 'placeholder'=>'Enter Teacher Mobile Number', 'icon'=>'phone', 'required'=>'true', 'maxlength'=>'10', 'minlength'=>'10'])?>

				<?=form_field(['name'=>'student', 'value'=>"$student", 'placeholder'=>'Enter Student Incharge Name', 'icon'=>'face', 'required'=>'true', 'maxlength'=>'64', 'minlength'=>'3'])?>

				<?=form_field(['name'=>'student_email_id', 'value'=>"$student_email_id", 'placeholder'=>'Enter Student Incharge Email ID', 'icon'=>'mail', 'required'=>'true', 'maxlength'=>'254', 'minlength'=>'5'])?>

				<?=form_field(['name'=>'student_mobile', 'value'=>"$student_mobile", 'placeholder'=>'Enter Student Incharge Mobile Number', 'icon'=>'phone', 'required'=>'true', 'maxlength'=>'10', 'minlength'=>'10'])?>

			</fieldset>
		<?php
			echo component("button_button", ["icon"=>"navigate_next", "text"=>"Continue"])
		?>
	</form>
</div>
