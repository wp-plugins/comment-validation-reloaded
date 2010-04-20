<?php
/*
 * Plugin Name: Comment Validation Reloaded
 * Plugin URI: http://austinpassy.com//wordpress-plugins/comment-validation-reloaded
 * Description: Built by <a href="http://twitter.com/thefrosty">@TheFrosty</a>.
 * Version: 0.1
 * Author: Austin Passy
 * Author URI: http://frostywebdesigns.com
 *
 * @copyright 2010
 * @author Austin Passy
 * @link http://frostywebdesigns.com/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package CommentValidationReloaded
 */

/**
 * Version 3.0 checker
 * @since 0.1
 */
 	global $wp_db_version;
	$version = 'false';
	if ( $wp_db_version > 13000 ) {
		$version = 'true'; //Version 3.0 or greater!
	}

/**
 * Make sure we get the correct directory.
 * @since 0.1
 */
	if ( !defined( 'WP_CONTENT_URL' ) )
		define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
	if ( !defined( 'WP_CONTENT_DIR' ) )
		define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	if ( !defined( 'WP_PLUGIN_URL' ) )
		define('WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
	if ( !defined( 'WP_PLUGIN_DIR' ) )
		define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

/**
 * Define constant paths to the plugin folder.
 * @since 0.1
 */
	define( CVR, WP_PLUGIN_DIR . '/comment-validation-reloaded' );
	define( CVR_URL, WP_PLUGIN_URL . '/comment-validation-reloaded' );
	
	define( CVR_ADMIN, WP_PLUGIN_DIR . '/comment-validation-reloaded/library/admin' );
	define( CVR_CSS, WP_PLUGIN_URL . '/comment-validation-reloaded/library/css' );
	define( CVR_JS, WP_PLUGIN_URL . '/comment-validation-reloaded/library/js' );

/**
 * Add the settings page to the admin menu.
 * @since 0.1
 */
	add_action( 'init', 'cvr_admin_warnings' );
	add_action( 'admin_init', 'cvr_admin_init' );
	add_action( 'admin_menu', 'cvr_add_pages' );
	add_action( 'wp_print_scripts', 'cvr_script' );
	add_action( 'wp_head', 'cvr_options' );
	add_action( 'wp_head', 'cvr_tweet_box' );

/**
 * Filters.
 * @since 0.1
 */	
	add_filter( 'plugin_action_links', 'cvr_plugin_actions', 10, 2 ); //Add a settings page to the plugin menu
	add_filter( 'the_content', 'cvr_tweet_box_div' );

/**
 * Load the RSS Shortcode settings if in the WP admin.
 * @since 0.1
 */
	if ( is_admin() )
		require_once( CVR_ADMIN . '/settings-admin.php' );
		require_once( CVR_ADMIN . '/dashboard.php' );

/**
 * Load the settings from the database.
 * @since 0.1
 */
	$comment = get_option( 'comment_validation_reloaded_settings' );

 /**
 * Load the stylesheet
 * @since 0.1
 */   
function cvr_admin_init() {
	wp_register_style( 'comment-validation-reloaded-tabs', CVR_CSS . '/tabs.css' );
	wp_register_style( 'comment-validation-reloaded-admin', CVR_CSS . '/comment-validation-reloaded-admin.css' );
}

/**
 * Function to add the settings page
 * @since 0.1
 */
function cvr_add_pages() {
	if ( function_exists( 'add_options_page' ) ) 
		$page = add_options_page( 'Comment Validation Reloaded Settings', 'Validation Reloaded', 10, 'comment-validation-reloaded.php', cvr_page );
			add_action( 'admin_print_styles-' . $page, 'cvr_admin_style' );
			add_action( 'admin_print_scripts-' . $page, 'cvr_admin_script' );
}

/**
 * Function to add the style to the settings page
 * @since 0.1
 */
function cvr_admin_style() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'comment-validation-reloaded-tabs' );
	wp_enqueue_style( 'comment-validation-reloaded-admin' );
}

/**
 * Function to add the script to the settings page
 * @since 0.1
 */
function cvr_admin_script() {
	wp_enqueue_script( 'thickbox' );
	wp_enqueue_script( 'theme-preview' );
	wp_enqueue_script( 'comment-validation-reloaded-admin', CVR_JS . '/comment-validation-reloaded.js', array( 'jquery' ), '0.1', false );
}

/**
 * Adds the @anywhere script
 * @since 0.1
 */
function cvr_script() {
	global $comment;
	$api = $comment['api'];
	
	if ( $api != ''  )
		wp_enqueue_script( 'anywhere', 'http://platform.twitter.com/anywhere.js?id=' . $api . '&amp;v=' . $v . '', false, $v, false );
}

/**
 * Adds @anywhere options
 * @since 0.1
 */
function cvr_options() {
	global $comment;
	$api = $comment['api'];
	$users = $comment['linkifyusers'];
	$cards = $comment['hovercards'];
	if ( $api != '' ) : ?>
<!-- @anywhere by Austin Passy of Frosty Web Designs -->
<script type="text/javascript">
twttr.anywhere(onAnywhereLoad);
	function onAnywhereLoad(twitter) {
		// configure the @anywhere environment
		<?php if ( $users != false ) echo 'twitter.linkifyUsers();' . "\n"; ?>
		<?php if ( $cards != false ) echo 'twitter.hovercards();' . "\n"; ?>
	};
</script>
<!-- /anywhere -->
<?php endif;
}

/**
 * RSS Feed
 * @since 0.1
 * @package Admin
 */
if ( !function_exists( 'thefrosty_network_feed' ) ) :
	function thefrosty_network_feed( $attr, $count ) {
		
		global $wpdb;
		
		include_once( ABSPATH . WPINC . '/rss.php' );
		
		$rss = fetch_rss( $attr );
		
		$items = array_slice( $rss->items, 0, '3' );
		
		echo '<div class="tab-content t' . $count . ' postbox open feed">';
		
		echo '<ul>';
		
		if ( empty( $items ) ) echo '<li>No items</li>';
		
		else
		
		foreach ( $items as $item ) : ?>
		
		<li>
		
		<a href='<?php echo $item[ 'link' ]; ?>' title='<?php echo $item[ 'description' ]; ?>'><?php echo $item[ 'title' ]; ?></a><br /> 
		
		<span style="font-size:10px; color:#aaa;"><?php echo date( 'F, j Y', strtotime( $item[ 'pubdate' ] ) ); ?></span>
		
		</li>
		
		<?php endforeach;
		
		echo '</ul>';
		
		echo '</div>';
		
	}
endif;

/**
 * Plugin Action /Settings on plugins page
 * @since 0.1
 * @package plugin
 */
function cvr_plugin_actions( $links, $file ) {
 	if( $file == 'comment-validation-reloaded/comment-validation-reloaded.php' && function_exists( "admin_url" ) ) {
		$settings_link = '<a href="' . admin_url( 'options-general.php?page=comment-validation-reloaded.php' ) . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}

/**
 * Warnings
 * @since 0.1
 * @package admin
 */
function cvr_admin_warnings() {
	global $comment;
		
		function cvr_warning() {
			global $comment;

			if ( $comment['api'] == '' )
				echo '<div id="comment-validation-reloaded-warning" class="updated fade"><p><strong>Comment Validation Reloaded plugin is not configured yet.</strong> It will not load until you update the <a href="' . admin_url( 'options-general.php?page=comment-validation-reloaded.php' ) . '">options</a>.</p></div>';
		}

		add_action( 'admin_notices', 'cvr_warning' );
		
		/*
		function cvr_wrong_settings() {
			global $comment;

			if ( $comment[ 'hide_ad' ] != false )
				echo '<div id="comment-validation-reloaded-warning" class="updated fade"><p><strong>You&prime;ve just hid the ad.</strong> Thanks for <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7329157" title="Donate on PayPal" class="external">donating</a>!</p></div>';
		}
		add_action( 'admin_notices', 'cvr_wrong_settings' );
		*/

return;
}

?>