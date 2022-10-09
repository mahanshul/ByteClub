<section class="center">
	<h3>Login - Admin</h3>
	
		<?php echo $logged_in;?>
	<?php if(isset($logged_in) && $logged_in):?>
		<h2>Logged In</h2>
	<?php endif;?>
	<?php echo form_open('/byte_it/admin'); ?>

		<?=form_field(['name'=>'username', 'placeholder'=>'Username', 'icon'=>'face', 'required'=>'true'])?>
		<?=form_field(['name'=>'password', 'placeholder'=>'Password', 'icon'=>'security', 'type' => 'password', 'required'=>'true'])?>
		<?php
			echo component("button_button", ["icon"=>"send", "text"=>"Submit"])
		?>
		</form>
</section>