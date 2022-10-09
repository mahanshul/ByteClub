<script src='https://www.google.com/recaptcha/api.js'></script>
<?=script_tag("jquery-validation/jquery.validate.min", true)?>

<section class="center" id="contact_mob">
	<h3>Reach out to Us</h3>
	<form id='message-form' action="/mail/message" method="POST">
		<?=form_hidden($csrf["name"], $csrf["hash"])?>
		<div id="inner">
			<fieldset id="sender-fieldset">
				<?=form_field(['name'=>'name', 'placeholder'=>'Your Name', 'icon'=>'face', 'required'=>'true', 'maxlength'=>'64', 'minlength'=>'3'])?>
				<?=form_field(['name'=>'email', 'type'=>'email', 'placeholder'=>'Your E-Mail ID', 'icon'=>'mail', 'required'=>'true', 'maxlength'=>'254'])?>
			</fieldset>
			<fieldset id="message-fieldset">
				<h4>Message</h4>
				<?=form_field(['name'=>'subject','placeholder'=>'Subject', 'icon'=>'subject', 'required'=>'true', 'maxlength'=>'140'])?>
				<?=form_field_textarea(['name'=>'body', 'placeholder'=>'Body', 'required'=>'true', 'maxlength'=>'63206'])?>
			</fieldset>
		</div>
		<div class="g-recaptcha"
			data-sitekey="<?=g_recaptcha_site_key()?>"
			data-callback="message_form_submit"
			data-size="invisible">
		</div>
		<div class="server-message" id="error-message">
			<h4>Error <i class="material-icons icon">error</i></h4>
			<h5>The Message Could Not be Sent</h5>
			<p>
			Please ensure that you have an active internet connection and Send again.<br>You can also E-Mail us your message at <a href="mailto:byteclub@pp.balbharati.org" target="_blank">byteclub@pp.balbharati.org</a></p></div>
		</div>
		<div class="server-message" id="success-message">
			<h4>Success <i class="material-icons icon">done</i></h4>
			<h5>The Message has been Sent</h5>
			<p>
				Thanks for contacting us. We will get back to you soon.
			</p></div>
		</div>
		<div class="loader server-message-loader server-message" id="loader-message">
			<div class="text">
				Sending Bytes
			</div>
			<div class="bytes">
				<?=component("loader_bytes", ["number"=>"108"])?>
			</div>
		</div>
		<?php
			echo component("button_button", ["icon"=>"send", "text"=>"Send"])
		?>
	</form>
<!-- 
	<div class="social">
		<div>
			<div>
				<i class="material-icons icon">mail</i>
			</div>
			<div></div>
		</div>
	</div> -->
	
</section>