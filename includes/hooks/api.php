<?php

use WPC\Repositories\User;

if (!function_exists('wpcUsersListAPI')) {
    /**
     * Users list ajax handler.
     *
     * @return void
     */
    function wpcUsersListAPI()
    {
        $nonce = sanitize_text_field(wp_unslash($_POST['nonce'] ?? ''));
        if (!wp_verify_nonce($nonce, "wpc_nonce")) {
            wp_send_json([
                "data" => [],
                "message" => "Nonce verification error!"
            ]);
        }
        $user = new User();
        $response = [
            'data' => $user->getList()
        ];
        $response['recordsTotal'] = count($response['data']);
        wp_send_json($response);
    }
}

if (!function_exists('wpcUserInfoAPI')) {
    /**
     * User info ajax handler.
     *
     * @return void
     */
    function wpcUserInfoAPI()
    {
        $nonce = sanitize_text_field(wp_unslash($_POST['nonce'] ?? ''));
        if (!wp_verify_nonce($nonce, "wpc_nonce")) {
            wp_send_json_error([
                "message" => "Nonce verification error!"
            ]);
        }
        $userID = sanitize_text_field(wp_unslash($_POST['user_id'] ?? ''));
        $isHTML = sanitize_text_field(wp_unslash($_POST['html'] ?? 'no'));
        $user = new User();
        $userData = $user->getUser($userID);

        if (empty($userData)) {
            wp_send_json_error([
                "message" => "User not found!"
            ]);
        }

        if ("no" === $isHTML) {
            $response = $userData;
        } else {
            $response = '<ul class="user-info">';
            foreach ($userData as $key => $value) {
                if (!is_string($value)) {
                    continue;
                }
                $response .= sprintf('<li><b>%s:</b> %s</li>', strtoupper(str_replace("_", " ", $key)), $value);
            }
            $response .= '</ul>';
            $response .= sprintf('<a href="%s">View full details</a>',$userID);
        }
        wp_send_json_success($response);
    }
}

add_action("wp_ajax_wpc_users_list", "wpcUsersListAPI");
add_action("wp_ajax_nopriv_wpc_users_list", "wpcUsersListAPI");
add_action("wp_ajax_wpc_user_info", "wpcUserInfoAPI");
add_action("wp_ajax_nopriv_wpc_user_info", "wpcUserInfoAPI");