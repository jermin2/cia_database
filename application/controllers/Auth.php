<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Community Auth - Examples Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

class Auth extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
	}

	// -----------------------------------------------------------------------

	/**
	 * Demonstrate being redirected to login.
	 * If you are logged in and request this method,
	 * you'll see the message, otherwise you will be
	 * shown the login form. Once login is achieved,
	 * you will be redirected back to this method.
	 */
	public function index()
	{
		if( $this->require_role('admin') )
		{
			echo $this->load->view('examples/page_header', '', TRUE);

			echo '<p>You are logged in!</p>';

			echo $this->load->view('examples/page_footer', '', TRUE);
		}
	}
	
	// -----------------------------------------------------------------------

	/**
	 * A basic page that shows verification that the user is logged in or not.
	 * If the user is logged in, a link to "Logout" will be in the menu.
	 * If they are not logged in, a link to "Login" will be in the menu.
	 */
	public function home()
	{
		$this->is_logged_in();
		
		echo $this->load->view('examples/page_header', '', TRUE);

		echo '<p>Welcome Home</p>';

		echo $this->load->view('examples/page_footer', '', TRUE);
	}
	
	// -----------------------------------------------------------------------

	/**
	 * This login method only serves to redirect a user to a 
	 * location once they have successfully logged in. It does
	 * not attempt to confirm that the user has permission to 
	 * be on the page they are being redirected to.
	 */
	public function login()
	{
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'examples/login')
			show_404();

		if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
			$this->require_min_level(1);

		$this->setup_login_form();

		$html = $this->load->view('login/login_header', '', TRUE);
		$html .= $this->load->view('login/login_form', '', TRUE);
		//$html .= $this->load->view('examples/page_footer', '', TRUE);

		echo $html;
	}

	// --------------------------------------------------------------

	/**
	 * Log out
	 */
	public function logout()
	{
		$this->authentication->logout();

		// Set redirect protocol
		$redirect_protocol = USE_SSL ? 'https' : NULL;

		redirect( site_url( LOGIN_PAGE . '?' . AUTH_LOGOUT_PARAM . '=1', $redirect_protocol ) );
	}

	// --------------------------------------------------------------

	// -----------------------------------------------------------------------
}

/* End of file Examples.php */
/* Location: /community_auth/controllers/Examples.php */
