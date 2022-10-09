<div class="spaced">
	<?php
		if(isset($flag["zero"])){
			$f = set_value('f', $flag["zero"]);
			echo $f;
		}
	 ?>
	<img src="/public/images/dict.jpg">
	<span style="font-size: 200px">.</span>
	<img src="/public/images/whereisthedoor.jpg" width="300" height="200">
	<span style="font-size: 200px">.</span>
	<img src="/public/images/firstpageofmybook.png" width="300" height="400">
	<span style="font-size: 200px; vertical-align: top">()</span>
		<?php echo form_open('/byte_it/ctf'); ?>

		<?=form_field(['name'=>'keys&dicts', 'placeholder'=>'', 'icon'=>'vpn_key', 'required'=>'true'])?>
		<?php
			echo component("button_button", ["icon"=>"send", "text"=>"Submit"])
		?>
	</form>
</div>