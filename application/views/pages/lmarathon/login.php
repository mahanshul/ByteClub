<div class="spaced">
	<h3>Login</h3>
	
	<?php echo form_open('libre/login'); ?>
		
		<div id="inner">
			<fieldset id="sender-fieldset">
				<div style="color: red;"><?php echo validation_errors(); ?></div>
				<?=form_field(['name'=>'userid', 'placeholder'=>'Enter Team ID', 'icon'=>'face', 'required'=>'true', 'maxlength'=>'19', 'minlength'=>'3'])?>
				<?=form_field(['name'=>'pass', 'placeholder'=>'Enter Password', 'icon'=>'security', 'required'=>'true', 'maxlength'=>'40', 'minlength'=>'3', 'type' => 'password'])?>

				<?php if(isset($error)){
					echo "<div style='color: red;'>" . $error . "</div>";
				} ?>
			</fieldset>
		<?php
			echo component("button_button", ["icon"=>"navigate_next", "text"=>"Continue"])
		?>
</div>