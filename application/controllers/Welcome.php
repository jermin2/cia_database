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
		if( $this->require_min_level(1) )
		{
			//load the user profile
			
			$data['title'] = 'Welcome Page';

			$data['full_name'] = $this->profile_data['first_name'] . " " . $this->profile_data['last_name'];
			$data['hall_name'] = "Hall ". $this->profile_data['hall_id'];
			$data['serving_hs'] = $this->profile_data['serving_hs']==1?"true":"";
			$data['serving_int'] = $this->profile_data['serving_int']==1?"true":"";
			$data['serving_campus'] = $this->profile_data['serving_campus']==1?"true":"";;

			$data['_view'] = 'HS-Welcome';
			$this->load->view('mainpage', $data);

		}

	}
}
