<?php
  // Add Scripts
  function twits_add_scripts(){
    // Add Main CSS
    wp_enqueue_style('twit-main-style', plugins_url(). '/twittersubs/css/style.css');
    // Add Main JS
    wp_enqueue_script('twit-main-script', plugins_url(). '/twittersubs/js/main.js');

    // Add Twitter Script
    wp_register_script('twitter', 'href="https://twitter.com/TwitterDev');
    wp_enqueue_script('twitter');
  }

  add_action('wp_enqueue_scripts', 'twit_add_scripts');