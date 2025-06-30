<?php
/**
 * Plugin Name: WP Password Reset API
 * Plugin URI: https://hasan.online/
 * Description: Custom rest api endpoint to reset WordPress User's Password using email.
 * Version: 1.0.0
 * Author:  M A Hasan
 * Author URI: https://hasan.online/
 * Developer: M A Hasan
 * Developer URI: https://hasan.online/
 */


//Lost Password Reset
function wp_retrieve_password($user_login){

    $user_login = sanitize_text_field($user_login);

    if ( empty( $user_login) ) {
        return false;
    } else if ( strpos( $user_login, '@' ) ) {
        $user = get_user_by( 'email', trim( $user_login ) );
        if ( empty( $user ) )
           return false;
    } else {
        $login = trim($user_login);
        $user = get_user_by('login', $login);
    }

    if ( !$user ) return false;

    $allow = apply_filters('allow_password_reset', true, $user->ID);

    if ( ! $allow )
        return false;
    else if ( is_wp_error($allow) )
        return false;

    $key = get_password_reset_key( $user );
	
	if(!$key) return false;
	
	$wc_emails = WC()->mailer()->get_emails();
	$wc_emails['WC_Email_Customer_Reset_Password']->trigger( $user->user_login, $key );

    return true;
}

function wp_retrieve_password_api( $data ) {

    $exists = email_exists( $data['email'] );
    if ( $exists ) {
        return wp_retrieve_password($data['email']);
    } else {
        return null;
    }
 
}
add_action( 'rest_api_init', function () {
  register_rest_route( 'wp/v2', '/users/lostpassword/', array(
    'methods' => 'GET',
    'callback' => 'wp_retrieve_password_api',
  ) );
} );
