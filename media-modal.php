<?php
/*
Plugin Name: Media Modal
Plugin URI: http://mediamodal.jumpstartcreatives.com/
Description: Provides multiple options for different media that you want to show on a modal.
Version: 1.0.2
Author: Carlo Andro Mabugay
Author URI: http://github.com/chikolokoy08

Media Modal is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Media Modal is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Media Modal. If not, see {License URI}.

*/

/*****************************
* Global Variables
*****************************/

$mm_plugin_name = 'media-modal';
$mediamodal_options = get_option('mediamodal_settings');

/*****************************
* Includes
*****************************/

include('lib/mm-scripts.php');//All Scripts Here

include('lib/mm-admin-page.php');//All Admin Page

include('lib/mm-ajax.php');//All JS

include('lib/mm-functions.php');//All Display and Shortcodes

