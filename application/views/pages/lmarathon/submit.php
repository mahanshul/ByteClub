<div class="spaced">
		<div id="inner">
			<fieldset id="sender-fieldset">
				<?php echo form_open('/libre/submit'); ?>
				<?php 
						$cid = $id;

		$fields = ["Task1", "Task2", "Task3", "Task4", "Task5", "Task6", "Task7", "Task8","Task9", "Task10", "Task11", "Task12"];

		foreach ($fields as $field) {
			if($pop[$field] == "true"){
				form_field_radio(["name"=>"tasks","value"=>$field, "type"=> "radio"]);
			}
		}

		?>

			</fieldset>
		<?php
			echo component("button_button", ["icon"=>"send", "text"=>"Send"])
		?>
	</form>
</div>
