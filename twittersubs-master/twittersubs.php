<?php
/*
Plugin Name: Easy Access Twitter Follow
Description: Display twitter follow button and count
Version: 1.0.0
Author: Gurnishan Singh 
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
  exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/twittersubs-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__).'/includes/twittersubs-class.php');

// Register Widget
function register_twitter(){
  register_widget('twitter_Subs_Widget');
}

// Hook in function
add_action('widgets_init', 'register_twitter');