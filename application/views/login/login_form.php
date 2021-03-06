
<body class="text-center">

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Login Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

echo form_open( $login_url, ['class' => 'form-signin'] ); 

if( ! isset( $on_hold_message ) )
{
	if( isset( $login_error_mesg ) )
	{
		echo '
			<div class="h6 center" style="border:1px solid red; padding: 5px">
				<p>
					Login Error #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.
				</p>
				<p>
					Username, email address and password are all case sensitive.
				</p>
			</div>
		';
	}

	if( $this->input->get(AUTH_LOGOUT_PARAM) )
	{
		echo '
			<div class="h6 center" style="border:1px solid green; padding: 5px">
				<p>
					You have successfully logged out.
				</p>
			</div>
		';
	}

	
?>

	<div>
		<h1 class="h3 mb-3 font-weight-normal">Church In Auckland</h1>
		<label for="login_string" class="sr-only">Username or Email</label>
		<br />
		<input type="text" name="login_string" id="login_string" class="form-control" placeholder="Username or Email" required autofocus autocomplete="off" maxlength="25" />

		<br />

		<label for="login_pass" class="sr-only">Password</label>
		<br />
		<input type="password" name="login_pass" id="login_pass" class="form-control password" placeholder="Password" <?php 
			if( config_item('max_chars_for_password') > 0 )
				echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
		?> autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />


		<?php
			if( config_item('allow_remember_me') )
			{
		?>
			<br />
			<label for="remember_me" class="form_label">Remember Me</label>
			<input type="checkbox" id="remember_me" name="remember_me" value="yes" />
		<?php
			}
		?>

		<p>
			<?php
				$link_protocol = USE_SSL ? 'https' : NULL;
			?>
			<a href="<?php echo site_url('examples/recover', $link_protocol); ?>">
				Can't access your account?
			</a>
		</p>


		<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Login" id="submit_button"  />

	</div>
</form>


<?php

	}
	else
	{
		// EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
		echo '
			<div style="border:1px solid red;">
				<p>
					Excessive Login Attempts
				</p>
				<p>
					You have exceeded the maximum number of failed login<br />
					attempts that this website will allow.
				<p>
				<p>
					Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
				</p>
				<p>
					Please use the <a href="/examples/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
					or contact us if you require assistance gaining access to your account.
				</p>
			</div>
		';
	}


/* End of file login_form.php */
/* Location: /community_auth/views/examples/login_form.php */ 

?>

</body>
</html>