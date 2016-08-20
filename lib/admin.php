<?php
if(!is_admin()){ exit; }
/**
 * Inject <style> into TinyMCE <iframe> <head> to fix infinite-height bug
 * Append classes to TinyMCE <iframe> body to target article styles
 */
function my_tinymce_iframe_injections() {
?>
<script>
	var theFrame;
	window.onload = function() {
		theFrame = document.getElementsByTagName("iframe")[0];
	  if (!theFrame) {
	  	window.setTimeout(function(){
	  		theFrame = document.getElementsByTagName("iframe")[0]
	  	}, 1000);
	  } else {
	  	if (theFrame.id !== "content_ifr"){ return; }
	    var theFrameDocument = theFrame.contentDocument || theFrame.contentWindow.document;

	    // Add <style> to <head>
	    var frmhead = theFrameDocument.head;
	    frmhead.innerHTML += '<style>html,body{height:auto!important;}</style>';

	    // Add class to <body>
	    var frmbody = theFrameDocument.body;
	    frmbody.className += " entry-content";
		}
	};
</script>
<?php
}
add_action('admin_head', 'my_tinymce_iframe_injections', 99, 1);