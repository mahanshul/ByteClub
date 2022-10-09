<section class="center">
	<h3>Login - Admin</h3>
	<?php echo form_open('/libre/admin'); ?>

		<?=form_field(['name'=>'username', 'placeholder'=>'Username', 'icon'=>'face', 'required'=>'true'])?>
		<?=form_field(['name'=>'password', 'placeholder'=>'Password', 'icon'=>'security', 'type' => 'password', 'required'=>'true'])?>
		<?php
			echo component("button_button", ["icon"=>"send", "text"=>"Submit"])
		?>
		</form>
</section>