<?php
/**
 * Plugin Name: Dynamic Chatbot
 * Description: A plugin to integrate a dynamic chatbot with current site URL.
 * Version: 1.0
 * Author: Pawan singh
 */

// Function to get the current site URL
function get_current_site_url() {
    return home_url();
}

// Shortcode to display the chatbot interface
function display_chatbot_interface_shortcode() {
   
    return '<div id="chatbot-interface"></div>';
}

// Register shortcode for chatbot interface
add_shortcode('chatbot_interface', 'display_chatbot_interface_shortcode');

// Enqueue JavaScript for chatbot interface
function enqueue_chatbot_script() {
    // Enqueue script for chatbot interface
    wp_enqueue_script('chatbot-script', plugin_dir_url(__FILE__) . 'chatbot-script.js', array('jquery'), null, true);
    
    // Pass the site URL to the JavaScript file
    wp_localize_script('chatbot-script', 'site_data', array('site_url' => get_current_site_url()));
}
add_action('wp_enqueue_scripts', 'enqueue_chatbot_script');
