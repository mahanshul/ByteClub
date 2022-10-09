<div id="<?=$name?>" class="form-field form-field-textarea
	<?php
		echo " " . $class . " ";
		if ($required)
		{
			echo "required";
		}
	?>">
	<div class="normal textarea">
		<div class="right">
			<?php
				$options = compact('name', 'value', 'placeholder', 'rows', 'minlength', 'maxlength');
				$options["class"] = $textarea_class;
				$options["data-min-rows"] = $data_min_rows;
				if ($required)
				{
					$options["required"] = NULL;
				}
				echo form_textarea($options);
			?>
		</div><div class="status-icon">
			<i class="material-icons icon required">*</i>
			<i class="material-icons icon success">check</i>
		</div>
	</div>
	<div class="warning-icon">
		<i class="material-icons icon error">warning</i>
	</div>
</div>
<?=script_tag('COMPONENT_form_field_textarea')?>