<div class="spaced">

	<h3>Request Invite</h3>
	
	<?php echo form_open('/byte_it/request'); ?>
		
		<div id="inner">
			<fieldset id="sender-fieldset">
				<div style="color: red;"><?php echo validation_errors(); ?></div>
				<?=form_field(['name'=>'school', 'placeholder'=>'Enter School Name', 'icon'=>'school', 'required'=>'true', 'maxlength'=>'100', 'minlength'=>'3'])?>
				<?=form_field(['name'=>'semail', 'type'=>'email', 'placeholder'=>'Enter School E-Mail ID', 'icon'=>'mail', 'required'=>'true', 'maxlength'=>'254'])?>
				<?=form_field(['name'=>'pemail', 'type'=>'email', 'placeholder'=>'Enter Student E-Mail ID', 'icon'=>'mail', 'required'=>'true', 'maxlength'=>'254'])?>
			</fieldset>
		<?php
			echo component("button_button", ["icon"=>"send", "text"=>"Send"])
		?>
	</form>
</div>