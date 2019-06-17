<?php
/*
Plugin Name: Teik Variable Product 
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This plugin was made to replace default select box for variable product
Author: Konrad "teik" Łyżwa 
Version: 0.1
*/

define('TVP_URI', plugin_dir_url( __FILE__ ));
define('TVP_DIR', plugin_dir_path( __FILE__ ));

require_once TVP_DIR . 'vendor/autoload.php';

TVP\Plugin::instance()->hook();
