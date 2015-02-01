<?php

function mm_options_page(){

	global $mediamodal_options;

	$pluginDocumentation = 'http://mediamodal.jumpstartcreatives.com';
		
	ob_start(); ?>
	
	<div class="wrap" id="mm-admin">

		<h2><?php _e('Media Modal Setup', 'mm_domain'); ?></h2>
		<form method="post" action="options.php" id="mm-admin-main">
			
			<?php settings_fields('mediamodal_settings_group'); ?>
			<div>
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
				<p id="mm-submit">
					<input type="submit" value="<?php _e('Save Options', 'mm_domain'); ?>" class="btn">
				</p>							
			</div>

			<div class="clearfix"></div>			
		</form>

		<div id="mm-admin-side">
			<h3><?php _e('Geared by:', 'mm_domain'); ?></h3>
			<div id="medialmodal-authorbox">
				<a href="http://jumpstartcreatives.com" title="Jumpstart Creatives" id="jumpstartlogo">
					<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/Jumpstart-Logo.png'; ?>">
				</a>
				<div id="details">
					<p><strong>Version:</strong>&nbsp;1.0.2</p>
					<p><strong>Author:</strong>&nbsp;Jumpstart Creatives</p>
					<p><strong>Github:</strong>&nbsp;<a href="https://github.com/chikolokoy08">chikolokoy08</a></p>
				</div>
				<div class="mm-admin-clearfix"></div>
				<hr>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="float: left; background: transparent; padding: 0px;">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHNwYJKoZIhvcNAQcEoIIHKDCCByQCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYBmXA4PQYHOCh3Ir0KiPOfBZP/VTqmTx2NL304isr7H6bxO+4UI6E1oM4owR0biObvf/db4OVGq8qkKgKYMgI/+yr2YZ+6JsvQpC9O2hPb7Kryj1evjLOTZ+spfoVVDeE2PS+r+UMXlpZFYdpNqqu+q5C0hjO1T/EUnpxwIApAtdTELMAkGBSsOAwIaBQAwgbQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQItUTKDwg1sPKAgZBKITUCOCjH3sovlLONnny2oYrWOIgB8IXwatVRf4+5nyVCZ5gG1mX+x84KHVjlTcO6opv6S9Z+x9tdMlBVR5tFT/rPklvnpG0G/Pq7U2+ykJt6x/MX86vQZUDaJ6mgLQUKFTSVtjH69JR+25lgIwln+wohpvKBlYJLXCmGNAuPSf/y4+5wVXzIcjj2D1OvgDWgggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0xNTAyMDEwNjA0MzRaMCMGCSqGSIb3DQEJBDEWBBTTUsLmVymzJtZJ3yYIWHB3q6LeYTANBgkqhkiG9w0BAQEFAASBgD7wlUuvTCzcz41kOqt2xqJlEAQ2+cNI8+iuom0JQIUk2I0U4BLhl53Z5haYihdbbKcO1S2n47KBpmDKdkGjwvhVIW4O2d/RuaNjuUfftfJA1EuMkYIRS2k0bL/zLDpTB35AxQ/kJzjnDA2GBVvbtsqUzc62e1LSZsNyaTZxuiCs-----END PKCS7-----
				">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				<a id="gopro" href="<?php echo $pluginDocumentation; ?>" class="btn" style="float: right; width: 290px;">GO PRO? CLICK HERE!</a>
				<div class="mm-admin-clearfix"></div>
			</div>			
			<h3><?php _e('Basic Documentation', 'mm_domain'); ?></h3>
			<p>SHORTCODES APPLICABLE TO VIDEO AND AUDIO EMBED</p>
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
					<td>For custom button color. Will overwrite the global settings. Provide hexa code only.</td>
					<td>[mediamodal button_color="#d876ea"]</td>
				</tr>
				<tr>
					<td>button_color</td>
					<td>For custom button color. Provide hexa code only.</td>
					<td>[mediamodal button_color="#d876ea"]</td>
				</tr>
				<tr>
					<td>modal_btn</td>
					<td>Declare if you need to disable a button and embed the video / audio file.</td>
					<td>[mediamodal modal_btn="disable"]</td>
				</tr>							
				<tr>
					<td>mm_title</td>
					<td>For custom title. This will be displayed on the modal title holder.</td>
					<td>[mediamodal mm_title="Custom Title"]</td>
				</tr>					
			</table>
			<p>FOR AUDIO ONLY</p>
			<table class="table" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 74px;">mediatype</td>
					<td>Default declaration if you'll be embedding an audio file. (Required for audio embedding). Options: mp3 and wav</td>
					<td>[mediamodal mediatype="audio"]</td>
				</tr>
				<tr>
					<td>audiotitle</td>
					<td>This will be displayed at the top part of the embed audio file.</td>
					<td>[mediamodal audiotitle="My embed audio title"]</td>
				</tr>
				<tr>
					<td>audiofull</td>
					<td>This will make the audio embed in full width.</td>
					<td>[mediamodal audiofull="yes"]</td>
				</tr>
			</table>
			<p><a href="<?php echo $pluginDocumentation; ?>">Click here</a> for full documentation and samples.</p>
		</div>
		<div class="mm-admin-clearfix"></div>
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
