<?php
header("Content-type: application/x-javascript");
//header("Content-type: text/javascript; charset: UTF-8"); 

/**
 * Output javascript
 * @ref http://techtites.com/2009/01/31/dynamic-javascript-with-php/
 */
function external_options() {
$id = $_GET['id'];
$min = intval($_GET['min']);
if ( $min != "" ) 
	$minout = 'minlength: ' . $min;

	$output = 'jQuery(function($) {
		var errorContainer = $("<p class="error">Please fill out the required fields</p>").appendTo("#' . $id . '").hide();
		var errorLabelContainer = $("<p class="error errorlabels"></p>").appendTo("#' . $id . '").hide();
		$("#' . $id . '").validate({
			rules: {
				author: "required",
				email: {
					required: true,
					email: true
				},
				url: "url",
				comment: {
					required: true,
					' . $minout . '
				}
			},
			errorContainer: errorContainer,
			errorLabelContainer: errorLabelContainer,
			ignore: ":hidden"
		});
	
		$.validator.messages.required = "" + $.validator.messages.required;
		$.validator.messages.email = "&raquo; " + $.validator.messages.email;
		$.validator.messages.url = "&raquo; " + $.validator.messages.url;
	});';
	echo $output;
}
external_options();
?>