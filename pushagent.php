<?php
/*
Plugin Name: Push Agent
Plugin URI: https://pushagent.net/
Description: Push Agent is an incredibly powerful plugin for WordPress that sends the best combination of title, image, and a short notification instantly to your WordPress website's subscribers.  The Push Agent sends short messages instantly from the server directly to your user’s browser without requiring them to open your website. These messages are therefore a powerful way for WordPress website owners to stay connected with their visitors.
For more information visit https://pushagent.net
Version: 1.0.1
Author: PushAgent®
Author URI: https://pushagent.net/
License: GPL
*/

//Hooks a function to a filter action, 'the_content' being the action

	if (is_admin() ){
	/* Call the html code */
	add_action('admin_menu', 'pushagentMenu');
    function pushagentMenu(){
        add_options_page( 'Push Agent WP setting page', 'Push Agent', 'manage_options', 'Push Agent', 'pushagentAdmin' );
    }
	}
  
    function pushagentAdmin(){
        include_once('pushagent-admin.php');
    }

	function pushagent_add_inline_script() {
		$accesstoken = esc_html__(get_option('pushagent-accesstoken'));
		?>
		<script type="text/javascript">
		<!-- PushAgent for WordPress  -->
			var token='<?php echo esc_attr($accesstoken);?>';
			var d = document, s = d.createElement('script');
			s.src = 'https://api.pushagent.net/embed.js';
			(d.head || d.body).appendChild(s);
		<!-- End PushAgent for WordPress  -->
		</script>
	<?php 
	}

add_action( 'wp_footer', 'pushagent_add_inline_script' );
?>