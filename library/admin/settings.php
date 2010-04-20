<?php
/**
 * Anywhere settings page
 * This file displays all of the available settings
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package CommentValidationReloaded
 */
 	global $wp_db_version;
	$version3 = 'false';
	if ( $wp_db_version > 13000 ) {
		$version3 = 'true'; //Version 3.0 or greater!
	}
?>
<!-- Left Sidebar -->
<div id="left" style="float:left; width:66%;">

<div class="postbox open">

<h3>twitter API</h3>

<div class="inside">
	<table class="form-table">
    	<tr>
        	<th>
            	<label for="<?php echo $data['activate']; ?>">Your twitter API:</label> 
            </th>
            <td>
                <input id="<?php echo $data['activate']; ?>" name="<?php echo $data['activate']; ?>" type="checkbox" <?php if ( $val['activate'] ) echo 'checked="checked"'; ?> value="true" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Activate Comment Validation Reloaded.</span>
            </td>
        </tr>
        <tr>
        	<th>
            	<label for="<?php echo $data['version']; ?>">version:</label> 
            </th>
            <td>
            	<select id="<?php echo $data['version']; ?>" name="<?php echo $data['version']; ?>" style="width:60px;">
                    <option value="1.6" <?php if ( $val['version'] == '1.6' ) echo ' selected="selected"'; ?>>1</option>
                    <!--<option value="1.7" <?php if ( $val['version'] == '1.7' ) echo ' selected="selected"'; ?>>1.7</option>-->
                </select>
            </td>
        </tr>
    	<tr>
        	<th>
            	<label for="<?php echo $data['author']; ?>">author love:</label> 
            </th>
            <td>
                <input id="<?php echo $data['author']; ?>" name="<?php echo $data['author']; ?>" type="checkbox" <?php if ( $val['author'] ) echo 'checked="checked"'; ?> value="true" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Uncheck this box to <strong>hide</strong> &ldquo;@anywhere plugin by @TheFrosty&rdquo;. Please consider <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=CN9BU5LAYCXV8" title="Donate on PayPal" class="external">donating</a> first..<br />
                <strong>Note:</strong> This will only show up below the <code>tweetbox</code> (if active).</span>
            </td>
        </tr>
        
    </table>
    
</div>
</div>


<?php if ( $val['hide_ad'] ) : ''; else : ?>
<div class="postbox ad">
	<h3>
		<script type='text/javascript' src='http://wpads.net/ads/js.php?type=link&amp;align=center&amp;zone=3'></script>
    </h3>
</div>
<?php endif; ?>


<?php if ( $version3 == 'false' ) { //If it's less than version 3 ?>
<?php } ?>

<div class="postbox open">

<h3>Comment Form options</h3>

<div class="inside<?php if ( !$val['activate'] ) echo ' activate'; ?>">
	<table class="form-table">
        <tr id="comment-form" <?php if ( !$val['activate'] ) echo 'style="display:none;"'; ?>>
            <th>
            	<label for="<?php echo $data['form-id-class']; ?>">form ID/Class:</label> 
            </th>
            <td>
                <input id="<?php echo $data['form-id-class']; ?>" name="<?php echo $data['form-id-class']; ?>" value="<?php echo $val['form-id-class']; ?>" size="21" maxlength="61"<?php if ( !$val['form-id-class'] ) echo ' style="background:#ffa5a5; border:1px solid #ff0000;"'; ?> />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">...</span>
            </td>
        </tr> 
    </table>
    
</div>
</div>


</div> <!-- /float:left -->

<!-- Right Sidebar -->
<div style="float:right; width:33%;">

<div class="postbox open">

<h3>About This Plugin</h3>

<div class="inside">
	<table class="form-table">

	<tr>
		<th style="width:20%;">Description:</th>
		<td><?php echo 'Adds twitter <a href="http://dev.twitter.com/anywhere">@anywhere</a> javascript code to your blog.' //$plugin_data[ 'Description' ]; ?></td>
	</tr>
	<tr>
		<th style="width:20%;">Version:</th>
		<td><strong><?php echo $plugin_data[ 'Version' ]; ?></strong></td>
	</tr>
	<tr>
		<th style="width:20%;">Start:</th>
		<td><a class="thickbox thickbox-preview external" href="http://dev.twitter.com/anywhere/begin/?TB_iframe=true" title="Documentation">Documentation.</a></td>
	</tr>
	<tr>
		<th style="width:20%;">Support:</th>
		<td><a href="http://wordpress.org/tags/anywhere?forum_id=10" title="Get support for this plugin" class="external">WordPress support forums.</a></td>
	</tr>

	</table>
</div>
</div>

<div id="colordock" class="postbox open">

<h3>Quick Save</h3>

<div class="inside">
    
    <p class="submit" style="text-align: center;">
        <input type="submit" name="Submit"  class="button-primary" value="Save Changes" />
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
    </p>
    	
</div>
</div>


<div class="postbox open">

<h3>Support This Plugin</h3>

<div class="inside">
	<table class="form-table">

	<tr>
		<th style="width:20%;">Donate:</th>
		<td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=CN9BU5LAYCXV8" title="Donate on PayPal" class="external">PayPal</a>.</td>
	</tr>
	<tr>
		<th style="width:20%;">Rate:</th>
		<td><a href="http://www.wordpress.org/extend/plugins/anywhere/" title="WordPress.org Rating" class="external">This plugin on WordPress.org</a>.</td>
	</tr>
    
	</table>
</div>
</div>

<div class="postbox open">

<h3>About The Author</h3>

<div class="inside">

	<ul>
    
		<li><?php echo $plugin_data[ 'Author' ]; ?>: Freelance web design / developer &amp; WordPress guru. Also head organizer of <a href="http://wordcamp.la">WordCamp.LA</a></li>
        
		<li><a href="http://twitter.com/TheFrosty" title="Austin Passy on Twitter" class="external">Follow me on twitter</a>.</li>
        
		<li>Need a WP expert? <a href="http://frostywebdesigns.com/" title="Frosty Web Designs" class="external">Hire me</a>.</li>
        
	</ul>
    
</div>
</div>

<div class="postbox open">

<h3><a href="http://thefrosty.net">TheFrosty Network</a> feeds</h3>

<div id="tab" class="inside">

	<ul class="tabs">
    
    	<li class="t1 t"><a>WordCampLA</a></li>
    	<li class="t2 t"><a>Me!</a></li>
    	<li class="t3 t"><a>wpWorkShop</a></li>
        
	</ul>
    
		<?php if ( function_exists( 'thefrosty_network_feed' ) ) thefrosty_network_feed( 'http://2010.wordcamp.la/feed', '1' ); ?>

		<?php if ( function_exists( 'thefrosty_network_feed' ) ) thefrosty_network_feed( 'http://austinpassy.com/feed', '2' );	?>

		<?php if ( function_exists( 'thefrosty_network_feed' ) ) thefrosty_network_feed( 'http://wpworkshop.la/feed', '3' ); ?>
    
</div>
</div>


<div id="uninstall" class="postbox open">

<h3>Uninstaller <span><abbr title="Click here to show the box below">Don't do it!</abbr></span><span class="watchingyou">:O You did it...</span></h3>  
        
<div class="inside">
    <p style="text-align:justify;">If you really have to, use this <a href="../wp-content/plugins/anywhere/uninstall.php" title="Uninstall the Custom Login plugin with this script">script</a> to uninstall the plugin and completely remove all options from your WordPress database.</p>
    
    <p style="display:none;"><label for="<?php echo $data['hide_ad']; ?>">Hide ad?</label>
    	&nbsp;<input id="<?php echo $data['hide_ad']; ?>" name="<?php echo $data['hide_ad']; ?>" type="checkbox" <?php if ( $val['hide_ad'] ) echo 'checked="checked"'; ?> value="true" />	Please only hide the ad if you've <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=CN9BU5LAYCXV8" title="Donate on PayPal" class="external">donated</a>.
    </p>
    
</div>
</div>

</div> <!-- /float:right -->

<br style="clear:both;" />
