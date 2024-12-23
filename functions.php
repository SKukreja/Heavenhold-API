<?php
/**
 * heavenhold functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package heavenhold
 */
add_theme_support( 'menus' );
include_once(dirname(__FILE__) . '/CPTs/heroes/_init.php');
include_once(dirname(__FILE__) . '/CPTs/items/_init.php');
include_once(dirname(__FILE__) . '/CPTs/teams/_init.php');
include_once(dirname(__FILE__) . '/CPTs/collections/_init.php');
include_once(dirname(__FILE__) . '/CPTs/guides/_init.php');
include_once(dirname(__FILE__) . '/CPTs/blog/_init.php');
include_once(dirname(__FILE__) . '/CPTs/banners/_init.php'); 
add_post_type_support( 'heroes', array('title', 'thumbnail', 'comments') );
add_post_type_support( 'items', array('title', 'thumbnail', 'comments') );
add_post_type_support( 'articles', array('title', 'thumbnail', 'editor', 'comments') );
add_post_type_support( 'guides', array('title', 'thumbnail', 'editor', 'comments') );
add_post_type_support( 'blog', array('title', 'thumbnail', 'editor', 'comments') );
add_post_type_support( 'banners', array('title', 'thumbnail', 'comments') );

require_once dirname(__FILE__) . '/includes/graphql-acf-fields.php';
require_once dirname(__FILE__) . '/endpoints/update-costume.php';
require_once dirname(__FILE__) . '/endpoints/update-super-illustration.php';
require_once dirname(__FILE__) . '/endpoints/update-story.php';
require_once dirname(__FILE__) . '/endpoints/update-portrait.php';
require_once dirname(__FILE__) . '/endpoints/update-bio.php';
require_once dirname(__FILE__) . '/endpoints/update-illustration.php';
require_once dirname(__FILE__) . '/endpoints/update-stats.php';
require_once dirname(__FILE__) . '/endpoints/update-weapon.php';
require_once dirname(__FILE__) . '/endpoints/update-hero-review.php';
require_once dirname(__FILE__) . '/endpoints/add-new-hero.php';
require_once dirname(__FILE__) . '/endpoints/add-new-item.php';

// add_filter( 'graphql_connection_max_query_amount', function ( int $max_amount, $source, array $args, $context, $info ) {
// 	return 2000;
// }, 10, 5 );

function rank_stats() {

    $args = array(
        'post_type'   => 'heroes',
        'numberposts'   => -1
    );

    $the_query = new WP_Query($args);

    // Arrays to hold all the stats
    $all_atk = array();
    $all_hp = array();
    $all_def = array();
    $all_crit = array();
    $all_heal = array();
	$all_dr = array();

    // Collect all stats
    if ($the_query->have_posts()):
        while ($the_query->have_posts()): $the_query->the_post();

            $post_id = get_the_ID();

            $atk = get_field('stat_fields_atk');
            $hp = get_field('stat_fields_hp');
            $def = get_field('stat_fields_def');
            $crit = get_field('stat_fields_crit');
            $heal = get_field('stat_fields_heal');
			$dr = get_field('stat_fields_damage_reduction');

            $all_atk[$post_id] = $atk;
            $all_hp[$post_id] = $hp;
            $all_def[$post_id] = $def;
            $all_crit[$post_id] = $crit;
            $all_heal[$post_id] = $heal;
			$all_dr[$post_id] = $dr;

        endwhile;
    endif;

    // Function to rank the stats
    function rank_array($array) {
        arsort($array); // Sort in descending order
        $rank = 1;
        $ranks = array();
        foreach ($array as $id => $value) {
            $ranks[$id] = $rank++;
        }
        return $ranks;
    }

    // Get the ranks
    $atk_ranks = rank_array($all_atk);
    $hp_ranks = rank_array($all_hp);
    $def_ranks = rank_array($all_def);
    $crit_ranks = rank_array($all_crit);
    $heal_ranks = rank_array($all_heal);
	$dr_ranks = rank_array($all_dr);

    // Update the posts with their ranks
    if ($the_query->have_posts()):
        while ($the_query->have_posts()): $the_query->the_post();

            $post_id = get_the_ID();

            update_post_meta($post_id, 'stat_fields_atk_rank', $atk_ranks[$post_id]);
            update_post_meta($post_id, 'stat_fields_hp_rank', $hp_ranks[$post_id]);
            update_post_meta($post_id, 'stat_fields_def_rank', $def_ranks[$post_id]);
            update_post_meta($post_id, 'stat_fields_crit_rank', $crit_ranks[$post_id]);
            update_post_meta($post_id, 'stat_fields_heal_rank', $heal_ranks[$post_id]);
			update_post_meta($post_id, 'stat_fields_dr_rank', $dr_ranks[$post_id]);
			update_post_meta($post_id, 'stat_fields_hero_count', count($all_atk));
			
        endwhile;
    endif;

}

add_action('save_post_heroes', 'rank_stats', 10, 1);

add_action( 'graphql_response_headers_to_send', function( $headers ) {
    // Specify the allowed origin(s)
    $allowed_origins = [
        'https://next.heavenhold.com', // Replace with your Next.js app domain
    ];

    // Get the Origin header from the request
    $origin = get_http_origin();

    if ( in_array( $origin, $allowed_origins ) ) {
        $headers['Access-Control-Allow-Origin'] = $origin;
        $headers['Access-Control-Allow-Credentials'] = 'true';
        $headers['Access-Control-Allow-Headers'] = 'Content-Type, Authorization';
        $headers['Access-Control-Allow-Methods'] = 'POST, OPTIONS';
    }

    return $headers;
} );

add_action( 'init', function() {
    // Handle OPTIONS requests
    if ( 'OPTIONS' === $_SERVER['REQUEST_METHOD'] && isset( $_SERVER['HTTP_ORIGIN'] ) ) {
        $allowed_origins = [
            'https://next.heavenhold.com', // Replace with your Next.js app domain
        ];

        if ( in_array( $_SERVER['HTTP_ORIGIN'], $allowed_origins ) ) {
            header( 'Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN'] );
            header( 'Access-Control-Allow-Credentials: true' );
            header( 'Access-Control-Allow-Methods: POST, OPTIONS' );
            header( 'Access-Control-Allow-Headers: Content-Type, Authorization' );
            header( 'Access-Control-Max-Age: 86400' );
            exit;
        }
    }
}, 0 );

add_action('wp_login', 'redirect_after_login', 10, 2);

function redirect_after_login($user_login, $user) {
    // Generate a secure random token
    $token = bin2hex(random_bytes(32));
    $expires_at = time() + 7200; // Token valid for 5 minutes

    // Store the token, user ID, and expiration in the database
    global $wpdb;
    $table_name = $wpdb->prefix . 'login_tokens';

    // Create the table if it doesn't exist
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        token VARCHAR(64) PRIMARY KEY,
        user_id BIGINT NOT NULL,
        expires_at INT NOT NULL
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Insert the token into the table
    $wpdb->insert($table_name, array(
        'token' => $token,
        'user_id' => $user->ID,
        'expires_at' => $expires_at,
    ));

    // Redirect to Next.js login endpoint with the token
    $redirect_url = 'https://next.heavenhold.com/api/auth/login?token=' . urlencode($token);
    wp_redirect($redirect_url);
    exit;
}

// functions.php

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/validate-token', array(
        'methods' => 'POST',
        'callback' => 'validate_login_token',
        'permission_callback' => '__return_true', // Allow public access
    ));
});

function validate_login_token(WP_REST_Request $request) {
    $token = sanitize_text_field($request->get_param('token'));

    if (!$token) {
        return new WP_Error('missing_token', 'Token is required', array('status' => 400));
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'login_tokens';

    // Clean up expired tokens
    $current_time = time();
    $wpdb->query($wpdb->prepare(
        "DELETE FROM $table_name WHERE expires_at < %d",
        $current_time
    ));

    // Retrieve the token record
    $record = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table_name WHERE token = %s",
        $token
    ));

    if (!$record) {
        return new WP_Error('invalid_token', 'Invalid or expired token', array('status' => 400));
    }

    // Retrieve user data
    $user = get_user_by('ID', $record->user_id);

    if (!$user) {
        return new WP_Error('user_not_found', 'User not found', array('status' => 404));
    }

    // Delete the token after use to prevent reuse
    $wpdb->delete($table_name, array('token' => $token));

    // Return user data
    return array(
        'user_id'    => $user->ID,
        'user_email' => $user->user_email,
        'user_login' => $user->user_login,
    );
}
// Hook to customize the login page's appearance
add_action('login_enqueue_scripts', 'custom_login_style');
function custom_login_style() {
    // Add your custom styles here
    echo '<style>
        /* Custom styles for the login page */
        body.login {
            background-color: #f5f5f5;
        }
        .login h1 a {
            background-image: url("path-to-your-logo-image");
            width: 320px;
            height: 65px;
            background-size: contain;
        }
    </style>';
}

// Hook to handle redirection and token generation if the user is logged in
add_action('login_init', 'redirect_logged_in_user');
function redirect_logged_in_user() {
    if (is_user_logged_in()) {
        // Generate a secure token and redirect
        generate_token_and_redirect();
        exit;
    }
}

/**
 * Function to generate a secure token and redirect to Next.js site
 */
function generate_token_and_redirect() {
    // Get the current user
    $user = wp_get_current_user();

    // Generate a secure random token
    $token = bin2hex(random_bytes(32));
    $expires_at = time() + 7200; // Token valid for 2 hours

    // Store the token, user ID, and expiration in the database
    global $wpdb;
    $table_name = $wpdb->prefix . 'login_tokens';

    // Create the table if it doesn't exist
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        token VARCHAR(64) PRIMARY KEY,
        user_id BIGINT NOT NULL,
        expires_at INT NOT NULL
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Insert the token into the table
    $wpdb->insert($table_name, array(
        'token' => $token,
        'user_id' => $user->ID,
        'expires_at' => $expires_at,
    ));

    // Redirect to Next.js login endpoint with the token
    $redirect_url = 'https://next.heavenhold.com/api/auth/login?token=' . urlencode($token);
    wp_redirect($redirect_url);
    exit;
}

// Helper function to create a revision
function create_revision($post) {
    global $wpdb;

    $post_data = array(
        'post_author' => get_current_user_id(),
        'post_date'   => current_time('mysql'),
        'post_title'  => $post->post_title,
        'post_status' => 'pending',
        'post_type'   => $post->post_type,
    );

    $wpdb->insert($wpdb->posts, $post_data);
    return $wpdb->insert_id;
}




/*
add_action('acf/save_post', 'discord_update_notification', 5);
function discord_update_notification( $post_ID ) {

	// Get post name and featured image
	$post_title = html_entity_decode(get_the_title( $post_ID ));
	$featured = get_the_post_thumbnail_url( $post_ID );

	// Permalink
	$post_link = get_the_permalink( $post_ID );

	// Post type and its singular name
	$post_type = get_post_type( $post_ID );
	$post_type_object =  get_post_type_object($post_type);
	$post_type_string = $post_type_object->labels->singular_name;

	// Get author
	$current_user = wp_get_current_user();
	$author = esc_html( $current_user->display_name );
	if($author == "Heavenhold") {
		$author = "Sumit";
	}

	$action = "";
	$action_footer = "";
	$string = "";
	$hexcolor = "3366ff";

	// Get previous post values.
	$prev_values = array_values(get_fields( $post_ID, false ));

	// Get submitted post values.
	$submitted = $_POST['acf'];
	$keys = array_keys($submitted);
	$values = array_values($submitted);

	// Check differences between arrays
	$differences = array_map('json_decode', array_diff(array_map('json_encode', $values), array_map('json_encode', $prev_values)));
	
	// If it's a new post
	if(empty($prev_values)) {
		$action = "Added";
		$action_footer = "created";
		$hexcolor = "97ba46";

		// Just loop through each field and output the ones that aren't null/empty
		foreach($submitted as $field => $value) {		
			// If the field's value is an array, it's a field group so we iterate through its fields
			if(!is_array($value)) {
				if(!empty($value)) {
					$updated_field = get_field_object($field);
					$string .= $updated_field['label']."\n"; 
				}
			}
			// If it's not a field group, just take the field as is
			else {
				$isempty = true;
				foreach($value as $subfield => $subvalue) {
					if(!empty($subvalue)) {
						$isempty = false;
					}
				}
				if($isempty == false) {
					$updated_field = get_field_object($field);
					$string .= $updated_field['label']."\n";
				}
			}
		}
	}
	// If it's an update to a post
	else {
		$action = "Updated";		
		$action_footer = "modified";
		$hexcolor = "fdc558";

		// Loop through the differences
		foreach($differences as $key => $difference)
		{
			// Check if the field that's flagged as different has an array as its value
			if(is_array($values[$key])) 
			{
				// Loop through the field's array value
				foreach($values[$key] as $field => $value) {
					// Get the equivalent field from the $prev_values object
					$prev_value = $prev_values[$key][$field];

					// If the field's value is not an array, escape the string
					if(!is_array($prev_value)) {
						$prev_value = addslashes($prev_value);
					}

					// Compare the $prev_value's field to the new value, and if it is indeed different, append it to the output
					if($value != $prev_value)
					{
						$updated_field = get_field_object($field);
						$string .= $updated_field['label']."|"; 
					}
				}
			}
			// If it's not a field group, just compare the field as is
			else {
				$prev_value = $prev_values[$key];
				$value = $values[$key];

				// If the field's value is not an array, escape the string
				if(!is_array($prev_value)) {
					$prev_value = addslashes($prev_value);
				}
				
				// Compare the $prev_value's field to the new value, and if it is indeed different, append it to the output
				if($value != $prev_value)
				{
					$updated_field = get_field_object($keys[$key]);
					$string .= $updated_field['label']."|"; 
				}
			}
		}
	}

	// Build the embed

	$embed_fields = [];

	// Check the length of the changed field list to determine if it needs to be broken into separate embed field values (max 1024 characters each)
	$length = strlen($string);
	$blocks = ceil($length/1024);
	
	// If there are at least 1024 characters
	if ($blocks > 1) 
	{
		// Separate the field list string into an array
		$chunks = explode("|",$string); 

		// Divide the array into n chunks, where n is the number of embed fields we need
		$pieces = array_chunk($chunks, ceil(count($chunks) / $blocks));
		$first = true;
		$field_name = "";
		
		// Loop through each chunk
		foreach ($pieces as $piece) {
			// If it's the first chunk, we set the embed field name as Updated/Added
			if($first) 
			{
				$field_name = $action;
				$first = false;
			}
			// Otherwise we make it an invisible space
			else {
				$unicodeChar = '\u200b';
				$field_name = json_decode('"'.$unicodeChar.'"');
			}

			// Combine the chunk back into a string
			$chunk = implode("\n", $piece);

			// Add to our array of embed fields to pass to our embed definition
			array_push($embed_fields, array("name" => $field_name, "value" => $chunk, "inline" => true));
		}
	}
	// If less than 1024 characters, just output the string as one embed field
	else 
	{
		$finalstring = str_replace("|","\n",$string);
		array_push($embed_fields, array("name" => $action, "value" => $finalstring, "inline" => true));
	}

	// Your Webhook URL
	$webhookurl = "[GET FROM .ENV]";

	// Webhook and Embed settings
	$json_data = json_encode([
		// Message
		"content" => "",
		
		// Username
		"username" => "Nari",

		// Text-to-speech
		"tts" => false,

		// Embeds Array 
		"embeds" => [
			[
				// Embed Title
				"title" => $post_title,

				// Embed Type
				"type" => "rich",

				// Embed Description
				"description" => "",

				// URL of the Title link
				"url" => $post_link,

				// Embed left border color in HEX
				"color" => hexdec( $hexcolor ),

				// Footer
				"footer" => [
					"text" => "Page ".$action_footer." by ".$author
				//	"icon_url" => "https://#/image.png"
				],

				// If you want a big image, otherwise use Thumbnail
				// "image" => [
				// 	 "url" => "https://#/image.png"
				// ],

				// Thumbnail (Goes to the right of the Title)
				"thumbnail" => [
					"url" => $featured
				],

				// Author section (Goes above the Title)
				"author" => [
					"name" => $post_type_string
				],

				// Our field array that has the output strings for our changed fields
				"fields" => $embed_fields
			]
		]

	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

	// Send the message through the Webhook
	$ch = curl_init( $webhookurl );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
	curl_setopt( $ch, CURLOPT_POST, 1);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt( $ch, CURLOPT_HEADER, 0);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

	$response = curl_exec( $ch );
	curl_close( $ch );

}
*/
