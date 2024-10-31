<style>
p:not(:last-child) {
  margin: 0 0 20px;
}

main {
  margin:40px;
  padding: 40px;
  border: 1px solid rgba(0,0,0,.2);
  background: #fff;
  box-shadow: 0 1px 3px rgba(0,0,0,.1);
}

section {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #abc;
}

.tabs {
  display: none;
  list-style: none;visibility:hidden;
}

field {
  display: inline-block;
  margin: 0 25px;;
  padding: 5px 25px;
  text-align: right;
  width:200px;
}

label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #abc;
  border: 1px solid transparent;
}

label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}

label[for*='1']:before { content: ''; }
label[for*='2']:before { content: ''; }
label[for*='3']:before { content: ''; }
label[for*='4']:before { content: ''; }

label:hover {
  color: #789;
  cursor: pointer;
}

input:checked + label {
  color: #0af;
  border: 1px solid #abc;
  border-top: 2px solid #0af;
  border-bottom: 1px solid #fff;
  padding-bottom:20px;
}

#content1 {
  display: block;
}


@media screen and (max-width: 800px) {
  label {
    font-size: 0;
  }
  label:before {
    margin: 0;
    font-size: 18px;
  }
}

@media screen and (max-width: 500px) {
  label {
    padding: 15px;
  }
}
</style>

<?php
if (!current_user_can('manage_options')) {
	wp_die('You do not have sufficient permissions to access this page.');
}

global $chk;
$pushagent_hw_submit = filter_input(INPUT_POST,'pushagent-hw-submit',FILTER_SANITIZE_STRING);

if(!empty($pushagent_hw_submit)){
		if (!filter_input(INPUT_POST,'pushagent-accesstoken',FILTER_SANITIZE_STRING)){ ?>
			<div id="message" class="notice notice-error  below-h2">
			<p>Push Agent access code required</p>
			</div>
		<?php
		} else {
				$accesstoken = filter_input(INPUT_POST,'pushagent-accesstoken',FILTER_SANITIZE_STRING); 
				global $chk;
					if( get_option('pushagent-accesstoken') != $accesstoken){
						 $chk = update_option( 'pushagent-accesstoken', $accesstoken);
					}
		}
		
	

}

?>
<div class="wrap">
  <h2>Push Agent settings</h2>
  <?php if(!empty($pushagent_hw_submit) && $chk):?>
  <div id="message" class="updated below-h2">
    <p>Settings successfully saved</p>
  </div>
  <?php endif;?>
  
  <div class="metabox-holder">
    <div class="postbox"><p style="padding:30px; ">Push Agent is an incredibly powerful plugin for WordPress that sends the best combination of title, image, and a short notification instantly to your WordPress website's subscribers.  The Push Agent sends short messages instantly from the server directly to your user’s browser without requiring them to open your website. These messages are therefore a powerful way for WordPress website owners to stay connected with their visitors.
For more information visit  <a href="https://pushagent.net" target="_blank">https://pushagent.net</a></p>
      <form method="post" action="">
	  
	  <main>
	 
		  <section id="content1">
			<p></p>
			  
			  <p><field>Push Agent access code:</field><input type="text" name="pushagent-accesstoken" value="<?php if(get_option('dashboardbuilder-xtitle1')){echo esc_attr(get_option('pushagent-accesstoken'));}?>" placeholder="Enter Access Code" /></p>
			  
			<p></p>
		  </section>

			<p><br/></p>
			<hr/><br/>
            <button type="submit" name="pushagent-hw-submit" value="Save changes" class="button-primary" />Save changes</button>
		
		</main>
	  
      </form>
	  <div style="padding:10px; ">
		 
		  <hr>
		  <h2>Get additional information</h2>
		    <p>- Signup to <a href="https://web.pushagent.net" target="_blank">web.pushagent.net</a></p>
			<p>- Login to your account</p>
			<p>- Add your webiste</p>
			<p>- Get your access code</p>
			<p>- Get the <a href="https://pushagent.net/install-on-wordpress" target="_blank">Quick Guide</a></p>
			<p>- Find solutions for your problems at <a href="https://pushagent.net/support" target="_blank">https://pushagent.net/support</a></p>
		</div>
    </div>
	
  </div>
</div>