<div class="spaced">
		<div id="inner">
			<fieldset id="sender-fieldset">
				<?php echo form_open('/byte_it/confirm_attendance'); ?>
				<?php 
				$school_name2 = [];
				for($i=0;$i<sizeof($school_name);$i++)
				{
				    $school_name2[$school_name[$i]['school_name']]=$school_name[$i]['school_name'];
				}

				echo form_dropdown('school_name', $school_name2, set_value('school_name'));
				?>
			</fieldset>
		<?php
			echo component("button_button", ["icon"=>"send", "text"=>"Send"])
		?>
	</form>
</div>
