<?php
/**
 * Enqueue related hooks.
 */

if (!function_exists('wpcEnqueueScripts')) {
    /**
     * Enqueue the users page script & styles.
     *
     * @return void
     */
    function wpcEnqueueScripts()
    {
        if (empty(get_query_var('users_page'))) {
            return;
        }
        wp_enqueue_script('wpc-scripts', WPC_TEST_URL . '/dist/scripts.js', ['jquery'], WPC_TEST_VERSION);
        wp_localize_script('wpc-scripts', 'WPC', [
            "ajax" => admin_url("admin-ajax.php"),
            "single" => get_query_var('user_id', false),
            "nonce" =>  wp_create_nonce("wpc_nonce")
        ]);
        wp_enqueue_style('wpc-styles', WPC_TEST_URL . '/dist/styles.css', [], WPC_TEST_VERSION);
    }
}

add_action('wp_enqueue_scripts', 'wpcEnqueueScripts');