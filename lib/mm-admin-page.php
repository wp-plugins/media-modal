<?php

function mm_options_page(){

	global $mediamodal_options;

	$pluginDocumentation = 'http://mediamodal.jumpstartcreatives.com';
		
	ob_start(); ?>
	
	<div class="wrap" id="mm-admin">

		<h2><?php _e('Media Modal Setup', 'mm_domain'); ?></h2>
		<form method="post" action="options.php">
			
			<?php settings_fields('mediamodal_settings_group'); ?>
			<div id="mm-admin-main">
				<h3><?php _e('Global Modal Settings', 'mm_domain'); ?></h3>
				<p class="label"><?php _e('Modal Color', 'mm_domain'); ?></p>
				<p>
					<input class="regular-text" type="text" id="mediamodal_settings[modalColor]" name="mediamodal_settings[modalColor]" placeholder="#ddd8888" value="<?php echo $mediamodal_options['modalColor']; ?>" />
				</p>
				<p class="label"><?php _e('Modal Text Color', 'mm_domain'); ?></p>
				<p>
					<input class="regular-text" type="text" id="mediamodal_settings[modalTextColor]" name="mediamodal_settings[modalTextColor]" placeholder="#ddd8888" value="<?php echo $mediamodal_options['modalTextColor']; ?>" />
				</p>
				<p class="label"><?php _e('Modal Width', 'mm_domain'); ?></p>
				<p>
					<input class="regular-text" type="text" id="mediamodal_settings[modalWidth]" name="mediamodal_settings[modalWidth]" placeholder="605" value="<?php echo $mediamodal_options['modalWidth']; ?>" />&nbsp;pixel
				</p>				
				<p class="label"><?php _e('Modal Height', 'mm_domain'); ?></p>
				<p>
					<input class="regular-text" type="text" id="mediamodal_settings[modalHeight]" name="mediamodal_settings[modalHeight]" placeholder="345" value="<?php echo $mediamodal_options['modalHeight']; ?>" />&nbsp;pixel
				</p>
				<p class="label"><?php _e('Modal Padding', 'mm_domain'); ?></p>
				<p>
					<input type="checkbox" value="1" name="mediamodal_settings[disablePadding]" id="mediamodal_settings[disablePadding]" <?php checked('1', $mediamodal_options['disablePadding']); ?> />&nbsp;Remove
				</p>
				<h3><?php _e('Global Button Settings', 'mm_domain'); ?></h3>					
				<p class="label"><?php _e('Button Color', 'mm_domain'); ?></p>
				<p>
					<input class="regular-text" type="text" id="mediamodal_settings[modalButtonColor]" name="mediamodal_settings[modalButtonColor]" placeholder="#ddd8888" value="<?php echo $mediamodal_options['modalButtonColor']; ?>" />
				</p>
				<p class="label"><?php _e('Button Text Color', 'mm_domain'); ?></p>
				<p>
					<input class="regular-text" type="text" id="mediamodal_settings[modalButtonTextColor]" name="mediamodal_settings[modalButtonTextColor]" placeholder="#ddd8888" value="<?php echo $mediamodal_options['modalButtonTextColor']; ?>" />
				</p>
				<h3><?php _e('Custom CSS', 'mm_domain'); ?></h3>
				<p>
					<textarea style="width:350px;height:125px;" class="regular-text" type="text" id="mediamodal_settings[mailCustomCSS]" name="mediamodal_settings[mailCustomCSS]" ><?php echo $mediamodal_options['mailCustomCSS']; ?></textarea>
				</p>			
			</div>
			<div id="mm-admin-side">
				<h3><?php _e('Basic Documentation', 'mm_domain'); ?></h3>
				<table class="table" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Attribute</strong></td>
						<td><strong>Description</strong></td>
						<td><strong>Code Usage</strong></td>
					</tr>
					<tr>
						<td>mediamodal</td>
						<td>Main shortcode attribute</td>
						<td>[mediamodal]</td>
					</tr>
					<tr>
						<td>src</td>
						<td>Source path of the media. See supported <a href="<?php echo $pluginDocumentation; ?>">links</a></td>
						<td>[mediamodal src="https://www.youtube.com/watch?v=64FG1dt8C9s"]</td>
					</tr>					
					<tr>
						<td>button_text</td>
						<td>For custom button text</td>
						<td>[mediamodal button_text="Put custom button here"]</td>
					</tr>
					<tr>
						<td>text_color</td>
						<td>Custom color for button text</td>
						<td>[mediamodal text_color="#d876ea"]</td>
					</tr>
					<tr>
						<td>button_color</td>
						<td>For custom button color. Provide hexa code only.</td>
						<td>[mediamodal button_color="#d876ea"]</td>
					</tr>					
				</table>
				<p><a href="<?php echo $pluginDocumentation; ?>">Click here</a> for full documentation and samples.</p>
				<h3><?php _e('Basic Usage Samples', 'mm_domain'); ?></h3>
				<p><strong>BUTTON:</strong> Button with custom title and custom text color. If provided in the shortcode, this will overwrite the global settings.</p>
				<pre>[mediamodal src="https://www.youtube.com/watch?v=64FG1dt8C9s" button_text="Youtube Button" button_color="#d876ea" text_color="#ffffff"]</pre>
				<p><strong>IMAGE AS BUTTON:</strong> Setting an image as button.</p>
				<pre>[mediamodal src="https://www.youtube.com/watch?v=64FG1dt8C9s" mm_title="Image title" image_as_btn="enable" img_src="/path/to/your/image"]</pre>
				<p><strong>EMBED:</strong> Plain embed of desired video</p>
				<pre>[mediamodal src="https://www.youtube.com/watch?v=64FG1dt8C9s" modal_btn="disable"]</pre>
				<h3><?php _e('Geared by:', 'mm_domain'); ?></h3>
				<div id="medialmodal-authorbox">
					<a href="http://jumpstartcreatives.com" title="Jumpstart Creatives" id="jumpstartlogo">
						<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/Jumpstart-Logo.png'; ?>">
					</a>
					<div id="details">
						<p><strong>Version:</strong>&nbsp;1.0</p>
						<p><strong>Author:</strong>&nbsp;Jumpstart Creatives</p>
						<p><strong>Github:</strong>&nbsp;<a href="https://github.com/chikolokoy08">chikolokoy08</a></p>
					</div>
					<div class="mm-admin-clearfix"></div>
					<a id="gopro" href="<?php echo $pluginDocumentation; ?>" class="btn">GO PRO. CLICK HERE.</a>
				</div>
			</div>
			<div class="mm-admin-clearfix"></div>
			<div class="clearfix"></div>

			<p id="mm-submit">
				<input type="submit" value="<?php _e('Save Options', 'mm_domain'); ?>" class="btn">
			</p>

			
		</form>
	</div>
	<?php
	echo ob_get_clean();
}

function mm_add_options_link(){
	add_options_page('Media Modal', 'Media Modal', 'manage_options', 'mediamodal-options', 'mm_options_page');
}


add_action('admin_menu', 'mm_add_options_link');

function mm_register_settings(){

	register_setting('mediamodal_settings_group', 'mediamodal_settings');
	
}

add_action('admin_init', 'mm_register_settings');
