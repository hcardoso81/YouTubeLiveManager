<?php
/*
Plugin Name: YouTube Live Manager
Description: Muestra un reproductor de YouTube Live mediante shortcode [ytlm_live], configurable desde el panel.
Version: 1.0
Author: Hernán Cardoso
Author URI: https://www.linkedin.com/in/cardosohernan/
*/

if (!defined('ABSPATH')) exit;

function ytlm_register_settings() {
    add_option('ytlm_enabled', '0');
    add_option('ytlm_video_id', '');
    register_setting('ytlm_settings_group', 'ytlm_enabled');
    register_setting('ytlm_settings_group', 'ytlm_video_id');
}
add_action('admin_init', 'ytlm_register_settings');