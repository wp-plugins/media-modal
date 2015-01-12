=== Media Modal ===
Contributors: cmabugay
Tags: videos, mp3, modal, embed, image, youtube, vimeo, metacafe, dailymotion, shortcode
Requires at least: 3.0.1
Tested up to: 4.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed or open (through modal) your media, video or mp3 links using Media Modal shortcodes with ease.

== Description ==

Embed or open (through modal) your media, video or mp3 links using Media Modal shortcodes with ease.

This plugin provides ease to embed or open (through modal) your media links to your sites. It's easy to implement and has basic documentation for efficient use. You can modify the modal's dimension and color. And neither the generated button by the shortcode sytax.

Supported video site links:

*   Youtube
*   Vimeo
*   Metacafe
*   Dailymotion

Supported video site links on [PRO](http://mediamodal.jumpstartcreatives.com/):
*	Screen Yahoo
*	Vube
*	Break
*	Ted
*	AOL (on.aol.ca)
*	FOD (funnyordie.com)
*	Snotr
*	Mpora
*	Ign
*	CollegHumor

Supported mp3 site links:
*	For v1.0.1

= Shortcodes =

* BUTTON OPENS MEDIA ON MODAL -
[mediamodal **src**=*"https://www.youtube.com/watch?v=64FG1dt8C9"* **button_text**=*"Youtube Button"* **button_color**=*"#d876ea"* **text_color**=*"#ffffff"*]

* IMAGE BUTTON OPENS MEDIA ON MODAL -
[mediamodal **src**=*"https://www.youtube.com/watch?v=64FG1dt8C9"* **mm_title**=*"Image title"* **image_as_btn**=*"enable"* **img_src**=*"/path/to/your/image"*]

* MEDIA EMBED -
[mediamodal src="https://www.youtube.com/watch?v=64FG1dt8C9s" modal="disable"]
[mediamodal **src**=*"https://www.youtube.com/watch?v=64FG1dt8C9"* **modal**=*"disable"*]

== Installation ==

1. Upload the unzipped folder media-modal to the /wp-content/plugins/directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to 'Settings/Media Modal' menu in Wordpress to setup your global seetings for this plugin.

== Frequently Asked Questions ==

= Does this support "embed" codes from supported sites? =

Nope. The shortcode supports only links or url (e.g. https://www.youtube.com/watch?v=64FG1dt8C9s) from supported sites. If you already have an "embed" codes, just paste it directly to your site (duh?!).

= Does the modal can be edited or modified? =

Yes. It's either through the Global Setup or from the shortcodes custom attributes.

= Does this plugin overwrite the embedding system from Wordpress? =

Yes. The plugin provides a non conflict implementation to avoid errors from Wordpress core embedding function.

= Do you have detailed documentation and demos? =

Yes. You can visit [here](http://mediamodal.jumpstartcreatives.com/)

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets 
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png` 
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0.0 =
* First Release