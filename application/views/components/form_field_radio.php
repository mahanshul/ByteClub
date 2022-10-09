			<?php
				$options = compact("name","value", "checked");
				echo form_radio($name, $value);
			?>
			<?php
				$options = compact("name","value");
				echo form_label($value);
			?>
