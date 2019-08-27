<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 include 'ChromePhp.php';
class User extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    } 

	/*
	 * Listing of people
	 */
	function index()
	{
		if( $this->verify_min_level(9) )
		{	
			$data['users'] = $this->User_model->get_users();
			
			$data['title'] = "View All Users";
			$data['_view'] = 'user/index';
			$this->load->view('mainpage',$data);
		}
	}
		
	public function create_user($user_data=null)
	{
		if( $this->require_role('admin') )
		{
			if($user_data==null)
			{			
				// Customize this array for your user
				$user_data = [
					'username'   => 'testuser3',
					'passwd'     => 'Testuser3',
					'email'      => 'test3@gmail.com',
					'auth_level' => '1', // 9 if you want to login @ examples/index.
				];
			}

		$this->is_logged_in();

		echo $this->load->view('examples/page_header', '', TRUE);

		// Load resources
		$this->load->helper('auth');
		$this->load->model('examples/examples_model');
		$this->load->model('examples/validation_callables');
		$this->load->library('form_validation');

		$this->form_validation->set_data( $user_data );

		$validation_rules = [
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.username]',
				'errors' => [
					'is_unique' => 'Username already in use.'
				]
			],
			[
				'field' => 'passwd',
				'label' => 'passwd',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'email',
				'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'Email address already in use.'
				]
			],
			[
				'field' => 'auth_level',
				'label' => 'auth_level',
				'rules' => 'required|integer|in_list[1,6,9]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );

		if( $this->form_validation->run() )
		{
			$user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
			$user_data['user_id']    = $this->examples_model->get_unused_id();
			$user_data['created_at'] = date('Y-m-d H:i:s');

			// If username is not used, it must be entered into the record as NULL
			if( empty( $user_data['username'] ) )
			{
				$user_data['username'] = NULL;
			}

			$this->db->set($user_data)
				->insert(db_table('user_table'));

			if( $this->db->affected_rows() == 1 )
				echo '<h1>Congratulations</h1>' . '<p>User ' . $user_data['username'] . ' was created.</p>';
			
			//Add user_profile_data
			$params = array(
									
				'people_id' => $this->input->post('people_id'),
				'user_id' => $user_data['user_id'],
            );
						
			$this->load->model('User_profile_model');			
			$this->User_profile_model->add_user_profile($params);
			
		}
		else
		{
			echo '<h1>User Creation Error(s)</h1>' . validation_errors();
		}

		echo $this->load->view('examples/page_footer', '', TRUE);
	}		
	}
		
		
	/*
	 * Adding a new person
	 */
	function add()
	{
		if( $this->require_min_level(9) )
		{
	
			if(isset($_POST) && count($_POST) > 0)     
			{   
				$user_data = [
					'username'   => $this->input->post('username'),
					'passwd'     => $this->input->post('password'),
					'email'      => $this->input->post('email'),
					'auth_level' => '1', // 9 if you want to login @ examples/index.
				];
				

				$this->create_user($user_data);
				redirect('user/index');
			}
			else
			{

				//Get list of people_id with a user
				$profile_ids = $this->User_model->get_user_profile_user_ids();
				$this->load->model('Person_model');
				$data['people'] = $this->Person_model->get_people_excluded($profile_ids);
						
						
				$data['title'] = "Create User";  
				$data['_view'] = 'user/add';
				$this->load->view('mainpage',$data);
			}
		}
	}  
		
	function editself()
	{
		if( $this->require_min_level(1) )
		{		
			$people_id = $this->profile_data['people_id'];
		
        // check if the person exists before trying to edit it
        $data['person'] = $this->Person_model->get_person($people_id);
        
        if(isset($data['person']['people_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
					$params = array(
					'age_group_id' => $this->input->post('age_group_id'),
					'hall_id' => $this->input->post('hall_id'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'gender' => $this->input->post('gender'),
					'dob' => $this->input->post('dob'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'address' => $this->input->post('address'),
                );

                $this->Person_model->update_person($people_id,$params);            
                redirect('person/index');
            }
            else
            {
				$data['genders'] = array('Male', 'Female');
				
				$this->load->model('Age_group_model');
				$data['all_age_groups'] = $this->Age_group_model->get_all_age_groups();

				$this->load->model('Hall_model');
				$data['all_halls'] = $this->Hall_model->get_all_halls();

				$data['_view'] = 'person/edit';
				$this->load->view('mainpage',$data);
            }
        }
        else
            show_error('The person you are trying to edit does not exist.');
			}
    } 		

    /*
     * Editing a user
     */
    function edit($user_id)
    {
			if( $this->require_role('admin') )
			{				
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($user_id);
				
				$this->load->model('User_profile_model');
				$data['user_profile'] = $this->User_profile_model->get_by_user_id($user_id);
				
				$this->load->model('Person_model');
				$data['person'] = $this->Person_model->get_person($data['user_profile']['people_id']);
        
        if(isset($data['user']['user_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {  
							//Update User
							$params = array(
								'username' => $this->input->post('username'),
								//'password' => $this->input->post('password'),
								'email' => $this->input->post('email'),
								'auth_level' => $this->input->post('auth_level'),
                );

                $this->User_model->update_user($user_id,$params);            
              
							if(isset($data['user_profile']['user_profile_id']))
							{
								//Update User Profile
								$params_t = array(
									'people_id' => $this->input->post('people_id'),
 									'serving_primary' => $this->input->post('serving_primary'),
									'serving_int' => $this->input->post('serving_int'),
									'serving_hs' => $this->input->post('serving_hs'),
									'serving_campus' => $this->input->post('serving_campus'), 
									);
									ChromePhp::log($params_t);	
									$this->User_profile_model->update_user_profile($data['user_profile']['user_profile_id'], $params_t);
							}
								
								
								redirect('user/index');
            }
            else
            {
							//Get list of people_id with a user
							$profile_ids = $this->User_model->get_user_profile_user_ids();
							$this->load->model('Person_model');
							$data['people'] = $this->Person_model->get_people_excluded($profile_ids);
							
							$data['_view'] = 'user/edit';
							$this->load->view('mainpage',$data);
            }
        }
        else
            show_error('The person you are trying to edit does not exist.');
			}
    } 

    /*
     * Deleting user
     */
    function remove($user_id)
    {
			if( $this->require_role('admin') )
			{	
        $user = $this->User_model->get_user($user_id);

        // check if the person exists before trying to delete it
        if(isset($user['user_id']))
        {
						$this->load->model('User_profile_model');
						$this->User_profile_model->delete_user_profile($user_id);
            $this->User_model->delete_user($user_id);
            redirect('user/index');
        }
        else
            show_error('The person you are trying to delete does not exist.');
			}
    }
    
}
