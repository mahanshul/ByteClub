<div class="spaced">
	<h3>Registration</h3>
	
	<?php echo form_open('/byte_it/register'); ?>
		
		<div id="inner">
			<fieldset id="sender-fieldset">
				<div style="color: red;"><?php echo validation_errors(); ?></div>
				<?=form_field(['name'=>'hash', 'placeholder'=>'Enter Registration Code', 'icon'=>'security', 'required'=>'true', 'maxlength'=>'19', 'minlength'=>'19'])?>
				<?php if(isset($error)){
					echo "<div style='color: red;'>" . $error . "</div>";
				} ?>
			</fieldset>
		<?php
			echo component("button_button", ["icon"=>"navigate_next", "text"=>"Continue"])
		?>
		<h4><b>NOTE:</b> If you don't have a registration code, request one from the <a href="/byte_it/request">Request Invite page.</a></h4>
	</form>
</div>