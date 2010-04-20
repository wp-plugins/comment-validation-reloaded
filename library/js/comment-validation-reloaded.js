jQuery(document).ready(
	function() {
			
	// Setting the tabs in the sidebar hide and show, setting the current tab
	jQuery('.tab-content').hide();
	jQuery('.t1').show();
	
	jQuery('ul.tabs li.t1 a').addClass('tab-current');
	jQuery('ul li a').css('cursor','pointer');
	
	jQuery('#tab ul.tabs li.t1 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t1').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	jQuery('#tab ul.tabs li.t2 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t2').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	jQuery('#tab ul.tabs li.t3 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t3').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	
	// #right Uninstall script toggle
	jQuery('#uninstall .inside, #uninstall h3 span.watchingyou').hide();
	jQuery('#uninstall h3').click(function() {
		jQuery(this).next().toggle(280);
		jQuery(this).find('span.watchingyou').toggle().prev().toggleClass('hide');
	});
	
	// #left h3 toggle
	jQuery('#left .postbox h3').append('<span><abbr title="Click here to hide the box below">click to toggle</abbr></span>');
	jQuery('#left .postbox h3').click(function() {

		jQuery(this).next().toggle(280);

	});
	
	// .ad Block
	jQuery('#left .postbox.ad h3 span').css('display','none');
	
	// #left a.question toggle span.hide
	jQuery('#left  span.hide').hide();
	jQuery('#left a.question').click(function() {
		jQuery(this).next().next().toggleClass('hide').toggleClass('show').toggle(380);
	});
	
	// External window!
	jQuery('a.external').attr('target','_blank');
	if ( jQuery('a.external').attr('title') !== undefined )
		null;
	else
		jQuery(this).attr('title','opens in a new tab');
		
	
	// If the API is entered and is greater than said characters
	jQuery('input#activate').change(function() {
		//var checked = jQuery('input#activate:checked').val();
			jQuery('#form-id-class').toggle(); //show the hidden boxes
			jQuery('#form-id-class').parent().parent().parent().toggleClass('activate'); //remove a class
			jQuery('.inside').removeClass('activate').find('.please-add').toggle(); //hide the 'h4' tag
	});
	
	jQuery('input#form-id-class').keyup(function() {
		var charLength = jQuery(this).val().length;
		//console.log(charLength);
		if ( jQuery(this).val().length >= 4 ) {
			jQuery(this).css({
				background: '#fff',
				border: '1px solid #aaa'
			});
		} else {
			jQuery(this).css({
				background: '#FFA5A5',
				border: '1px solid #FF0000'
			});
		}
	});
	
	
	// If tweetbox is checked
	jQuery('input#tweetbox').change(function() {
		var checked = jQuery('input#tweetbox:checked').val();
		//console.log(charLength);
		if ( checked ) {
			jQuery('#tweetbox-label,#tweetbox-width').show();
		} else {
			jQuery('#tweetbox-label,#tweetbox-width').hide();
		}
	});
	
	jQuery('div.inside').append('<h4 class="please-add" style="text-align:center;">Please add your API key to begin</h4>');
	
});
