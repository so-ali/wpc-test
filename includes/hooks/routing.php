<?php
/**
 * Routing related hooks.
 */

if (!function_exists('wpcUsersRewriteRule')) {
    /**
     * Adding the users page rewrite rule.
     *
     * @return void
     */
    function wpcUsersRewriteRule()
    {
        $usersPage = apply_filters('wpc_users_page_name', 'users');
        add_rewrite_rule(sprintf('%s/?([0-9/]*)', esc_url($usersPage)), 'index.php?users_page=1&user_id=$matches[1]', 'top');
    }
}

if (!function_exists('wpcUsersQueryVars')) {
    /**
     * Adding the users page query vars.
     *
     * @param array $query_vars
     * @return array
     */
    function wpcUsersQueryVars(array $query_vars): array
    {
        $query_vars[] = 'users_page';
        $query_vars[] = 'user_id';
        return $query_vars;
    }
}

if (!function_exists('wpcUsersTemplateInclude')) {
    /**
     * Adding the users page template.
     *
     * @param $template
     * @return string
     */
    function wpcUsersTemplateInclude($template): string
    {
        if (get_query_var('users_page') === '1' && empty(get_query_var('user_id'))) {
            return WPC_TEST_DIR . '/includes/views/users-tmpl.php';
        }
        if (get_query_var('users_page') === '1' && !empty(get_query_var('user_id'))) {
            return WPC_TEST_DIR . '/includes/views/user-item-tmpl.php';
        }

        return $template;
    }
}

add_action('init', 'wpcUsersRewriteRule');
add_filter('query_vars', 'wpcUsersQueryVars');
add_filter('template_include', 'wpcUsersTemplateInclude');
