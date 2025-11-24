<?php

if (!defined('ABSPATH')) exit;

function ytlm_menu()
{
    add_menu_page(
        'YouTube Live Manager',
        'YT Live Manager',
        'manage_options',
        'ytlm-live-manager',
        'ytlm_settings_page',
        'dashicons-video-alt3',
        80
    );
}
add_action('admin_menu', 'ytlm_menu');

function ytlm_settings_page()
{
?>
    <div class="wrap">
        <h1>YouTube Live Manager</h1>

        <form method="post" action="options.php">
            <?php settings_fields('ytlm_settings_group'); ?>
            <?php do_settings_sections('ytlm_settings_group'); ?>

            <table class="form-table">

                <tr valign="top">

                    <th scope="row">Shortcode</th>
                    <td>
                        <label style="display:flex; align-items:center; gap:8px;">
                            <strong>[ytbLive] </strong>
                        </label>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">ID del Live de YouTube</th>
                    <td>
                        <input type="text" name="ytlm_video_id"
                            value="<?php echo esc_attr(get_option('ytlm_video_id')); ?>"
                            style="width:300px;" />
                        <p>Solo el ID del video, ej: <strong>dQw4w9WgXcQ</strong></p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Habilitar Player</th>
                    <td>
                        <label style="display:flex; align-items:center; gap:8px;">
                            <input type="checkbox" name="ytlm_enabled" value="1"
                                <?php checked(1, get_option('ytlm_enabled'), true); ?> />
                            Activar reproductor
                        </label>
                    </td>
                </tr>

            </table>

            <?php submit_button(); ?>
        </form>
    </div>
<?php
}
