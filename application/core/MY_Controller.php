<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - MY Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

require_once APPPATH . 'third_party/community_auth/core/Auth_Controller.php';

class MY_Controller extends Auth_Controller
{
	/**
	 * Class constructor
	 */
	public function __construct()
	{
		parent::__construct();
		//date_default_timezone_set('Pacific/Auckland');
	}
	
public $profile_data = NULL;
 
protected function _set_user_variables()
{
  parent::_set_user_variables();

  // For controllers
  $this->profile_data = array(
    'first_name' => $this->auth_data->first_name,
    'last_name' => $this->auth_data->last_name,
		'hall_id' => $this->auth_data->hall_id,
		'people_id' => $this->auth_data->people_id,
		
		'serving_primary' => $this->auth_data->serving_primary,
		'serving_hs' => $this->auth_data->serving_hs,
		'serving_int' => $this->auth_data->serving_int,
		'serving_campus' => $this->auth_data->serving_campus,
		
		'auth_level' => $this->auth_level,
  );
  
  // For CI config
  $this->config->set_item( 'profile_data', $this->profile_data );
 
  // For views
  $this->load->vars( $this->profile_data );
	
}
}

/* End of file MY_Controller.php */
/* Location: /community_auth/core/MY_Controller.php */