<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if( $this->require_role('admin') )
		{
			//load the user profile
			

			$data['title'] = 'Welcome Page';

			$data['full_name'] = "Jermin Tiu";
			$data['hall_name'] = "Hall 3";
			$data['serving_hs'] = "true";
			$data['serving_int'] = "true";

			$data['_view'] = 'HS-Welcome';
			$this->load->view('mainpage', $data);

		}
	}
}
