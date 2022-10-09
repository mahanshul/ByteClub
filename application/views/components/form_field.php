<div id="<?=$name?>" class="form-field 
	<?php
		echo " " . $class . " ";
		if ($required)
		{
			echo "required";
		}
	?>">
	<div class="normal">
		<div class="left">
			<i class="icon material-icons"><?=$icon?></i>
		</div><div class="right">
			<?php
				$options = compact("name","value", "type", "placeholder",  "minlength", "maxlength", "disabled");
				if ($required)
				{
					$options["required"] = NULL;
				}
				echo form_input($options);
			?>
			<div class="status-icon">
				<i class="material-icons icon required">*</i>
				<i class="material-icons icon success">check</i>
			</div>
		</div>
	</div>
	<div class="warning-icon">
		<i class="material-icons icon error">warning</i>
	</div>
</div>