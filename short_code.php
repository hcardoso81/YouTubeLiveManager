<?php
/*
Plugin Name: YouTube Live Manager
Description: Muestra un reproductor de YouTube Live mediante shortcode [ytlm_live], configurable desde el panel.
Version: 1.0
Author: Hernán Cardoso
Author URI: https://www.linkedin.com/in/cardosohernan/
*/

if (!defined('ABSPATH')) exit;

function ytlm_shortcode_live() {

    $enabled = get_option('ytlm_enabled');
    $video_id = trim(get_option('ytlm_video_id'));

    // Si está apagado o no hay ID → mostrar placa
    if (!$enabled || empty($video_id)) {
        return '<div style="padding:40px; text-align:center; background:#eee; font-size:22px;">
                    Estamos por comenzar...
                </div>';
    }

    // Renderizar player
    $embed_url = "https://www.youtube.com/embed/$video_id?autoplay=1";

    return "
        <div class='ytlm-live-wrapper' style='max-width:900px; margin:auto;'>
            <iframe width='100%' height='500'
                src='$embed_url'
                frameborder='0'
                allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
                allowfullscreen>
            </iframe>
        </div>
    ";
}
add_shortcode('ytlm_live', 'ytlm_shortcode_live');