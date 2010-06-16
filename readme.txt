=== Comment Validation Reloaded ===
Contributors: austyfrosty
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CN9BU5LAYCXV8
Tags: comment, validation, comment validation, jquery validation, reloaded
Requires at least: 2.7
Tested up to: 3.0
Stable tag: trunk


== Description ==

Avoid those pesky blank page with an error message like &ldquo;please fill out required fields&rdquo; then loosing your/users comment info. This plugin aims to help by adding validation to the comment form. When a user submits the form and something is missing, an appropiate message is displayed and individual fields are highlighted. When the email or url is in an incorrect format, a message is displayed accordingly. Requires the user to have javascript activated.

**Why should you install it?** Because you care for comments and want to help users reduce mistakes that hold them off from commenting at all.

**Whats the technology used?** [jQuery](http://jquery.com) and the [jQuery Validation plugin](http://bassistance.de/jquery-plugins/jquery-plugin-validation/) with a few customizations to make it fit into any WordPress theme.

== Installation ==

Follow the steps below to install the plugin.

1. Upload the `anywhere` folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to Settings/Validation Reloaded to edit your settings.


== Frequently Asked Questions ==

= Why create this plugin? =
Because there is a newer validation script out there, but no updated plugins. 


= I think i want to uninstall but... =
Be sure to click the uninstall script that you **manually** add a value to `define( 'UNINSTALL_COMM', '' )` on line 29. That means `1` OR like this: `define( 'UNINSTALL_COMM', '1' )`. After that run the script and all options should be uninstalled. **Note: This script will only work for WordPress 3.0 or less**


== Screenshots ==

1. Admin options panel in `0.1`

2. Defualt error display


== Changelog ==

= Version 0.2.6 =

* Updated version numbers.
* New version for external hosted script.

= Version 0.2.5.1 =

* Minor update for anchor class.

= Version 0.2.5 =

* Fixed XHTML in author link love.

= Version 0.2.4 =

* Fixed error where external code wasn't working
	* Fixed [error](http://snipt.org/Lpmi) Thanks to [John Kolbert](http://www.johnkolbert.com/)
* Use of external file will not validate correctly &amp; work ;)

= Version 0.2.3 =

* Added check for singular post with comments open to enqueue scripts and style
* Check for valication version
* Allow for internal or external validation script
	* Use internal if having issues (external is a php file with *header* JS
	* Having issues with external javascript (trying to execute with PHP)...

= Version 0.2.2 =

* Setting page version update
* Default version update

= Version 0.2.1 =

* Removed CDN(hosted) library in favor of version 1.7, which isn't hosted yet.
* Bug fix

= Version 0.2 =

* Using CDN(hosted) library version 1.6
* Added options to admin

= Version 0.1 =

* Initial release.


== Upgrade Notice ==

= 0.2.4 =
Validates &amp; external source is corrected.

= 0.2.1 =
Admin bug fix.

= 0.1 =
No need to upgrade, just install.