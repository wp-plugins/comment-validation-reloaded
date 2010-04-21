<html>
<head>
<title>Comment Validation Reloaded Uninstall Script</title>
</head>
<body>
<?php
/* Include the bootstrap for setting up WordPress environment */
include( '../../../wp-load.php' );

if ( !is_user_logged_in() )
	wp_die( 'You must be logged in to run this script.' );

if ( !current_user_can( 'install_plugins' ) )
	wp_die( 'You do not have permission to run this script.' );

if ( defined( 'UNINSTALL_COMM' ) )
	wp_die( 'UNINSTALL_COMM set somewhere else! It must only be set in uninstall.php' );

define( 'UNINSTALL_COMM', '' );

if ( !defined( 'UNINSTALL_COMM' ) || constant( 'UNINSTALL_COMM' ) == '' ) 
	wp_die( 'UNINSTALL_COMM must be set to a non-blank value in uninstall.php on line 29' );

?>
<p>This script will uninstall all options created by the <a href='http://austinpassy.com/wordpress-plugins/comment-validation-reloaded/'>Comment Validation Reloaded</a> plugin.</p>
<?php
if ( $_POST[ 'uninstall' ] ) {
	$plugins = (array)get_option( 'active_plugins' );
	$key = array_search( 'comment-validation-reloaded/comment-validation-reloaded.php', $plugins );
	if ( $key !== false ) {
		unset( $plugins[ $key ] );
		delete_option( 'comment_validation_reloaded_settings' ); //Delete options!!
		update_option( 'active_plugins', $plugins );
		echo "Disabled Comment Validation Reloaded plugin : <strong>DONE</strong><br />";
	}

	if ( in_array( 'comment-validation-reloaded/comment-validation-reloaded.php', get_option( 'active_plugins' ) ) )
		wp_die( 'Comment Validation Reloaded is still active. Please disable it on your plugins page first.' );
	echo "<p><strong>Please comment out the UNINSTALL_COMM <em>define()</em> on line 29 in this file!</strong></p>";
	wp_mail( $current_user->user_email, 'Comment Validation Reloaded Uninstalled', '' );
} else {
	?>
	<form action='uninstall.php' method='POST'>
	<p>Click UNINSTALL to delete the following options:
	<ol>
	<li>get_option( 'comment_validation_reloaded_settings' )</li>
	</ol>
	<input type='hidden' name='uninstall' value='1' />
	<input type='submit' value='UNINSTALL' />
	</form>
	<?php
}

?>
</body>
</html>