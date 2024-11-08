<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package heavenhold
 */
// Check if the user is logged in
if (is_user_logged_in()) {
    // Include WordPress functions if necessary
    require_once(ABSPATH . 'wp-load.php');

    // Generate a secure token and redirect
    generate_token_and_redirect();
    exit;
} else {
    // If the user is not logged in, you can display content or redirect
    // For now, we'll display a simple message
    echo "You are not logged in.";
}