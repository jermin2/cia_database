<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 include 'ChromePhp.php';
class Person extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Person_model');
    } 

    /*
     * Listing of people
     */
    function index()
    {
			if( $this->require_min_level(1) ){
				
				if( $this->auth_level == 9 )
				{	
					$data['people'] = $this->Person_model->get_people();
					
					$data['title'] = "View All People";
					$data['_view'] = 'person/index';
					$this->load->view('mainpage',$data);
				}
				/*
				 * People with auth level of 4 can only see people in there hall
				 */
				else if(  $this->auth_level >= 4)
				{
					$this->view_by_hall();
					/**
					$this->Person_model->set_hall_id($this->profile_data['hall_id']);
					$data['people'] = $this->Person_model->get_people();
					
						
					$data['_view'] = 'person/index';
					$this->load->view('mainpage',$data);	
	**/				
				}
				else
					show_error('you dont have permission');
			}
			else
				show_error('you got logged out');
    }
		
		function view_by_hall(){
			if( $this->verify_min_level(4))
			{
				$this->Person_model->set_hall_id($this->profile_data['hall_id']);
        $data['people'] = $this->Person_model->get_people();
				
				$data['title'] = "View People";	
				$data['subtitle'] = "By Hall " . $this->profile_data['hall_id'];		
        $data['_view'] = 'person/index';
        $this->load->view('mainpage',$data);	
			}
		}
		function view_primary(){$this->view_by_age_group(AGE_GROUP_PRIMARY);	}
		function view_hs(){$this->view_by_age_group(AGE_GROUP_HIGHSCHOOL);}
		function view_int(){$this->view_by_age_group(AGE_GROUP_INTERMEDIATE);	}
		function view_campus(){$this->view_by_age_group(AGE_GROUP_CAMPUS);	}
		
		function view_by_age_group($age_group){
			if( $this->verify_min_level(4))
			{
				$this->Person_model->set_hall_id($this->profile_data['hall_id']);
				$this->Person_model->set_age_group($age_group);
        $data['people'] = $this->Person_model->get_people();
				
				$data['title'] = "View People";	
				
				$data['subtitle'] = "Hall " . $this->profile_data['hall_id'];
				if($age_group == AGE_GROUP_PRIMARY){
					$data['subtitle'] = $data['subtitle']. " | Primary";
				}
				if($age_group == AGE_GROUP_CAMPUS){
					$data['subtitle'] = $data['subtitle']. " | Campus";
				}				
				if($age_group == AGE_GROUP_HIGHSCHOOL){
					$data['subtitle'] = $data['subtitle']. " | Highschoolers";
				}
				if($age_group == AGE_GROUP_INTERMEDIATE){
					$data['subtitle'] = $data['subtitle']. " | Intermediates";
				}				
				
        $data['_view'] = 'person/index';
        $this->load->view('mainpage',$data);	
			}
		}			

    /*
     * Adding a new person
     */
    function add()
    {
			if( $this->require_min_level(5) )
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
            
            $person_id = $this->Person_model->add_person($params);
            redirect('person/index');
        }
        else
        {
			$data['genders'] = array('Male', 'Female');
			
			$this->load->model('Age_group_model');
			$data['all_age_groups'] = $this->Age_group_model->get_all_age_groups();

			$this->load->model('Hall_model');
			$data['all_halls'] = $this->Hall_model->get_all_halls();
            
			$data['_view'] = 'person/add';
			$this->load->view('mainpage',$data);
        }
			}
    }  
	function editself()
	{
		ChromePhp::log($this->is_logged_in());
		if( $this->verify_min_level(1) )
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
					redirect('person/editself');
            }
            else
            {
				$data['genders'] = array('Male', 'Female');
				
				$this->load->model('Age_group_model');
				$data['all_age_groups'] = $this->Age_group_model->get_all_age_groups();

				$this->load->model('Hall_model');
				$data['all_halls'] = $this->Hall_model->get_all_halls();

				$data['title']="My Profile";
				$data['_view'] = '/person/edit';
				$this->load->view('mainpage',$data);
            }
        }
        else
            show_error('The person you are trying to edit does not exist.');
			}
			else
				show_error('not logged in anymore');
    } 		

    /*
     * Editing a person
     */
    function edit($people_id)
    {
			ChromePhp::log($this->is_logged_in());
			if($this->verify_min_level(1)){
				if ($people_id == $this->profile_data['people_id'])
				{
					$this->editself();
				}
				else if($this->auth_level >= 5) //Only use one authentication per request
				{				
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

					$data['title']="Edit a Person";
					$data['_view'] = 'person/edit';
					$this->load->view('mainpage',$data);
							}
					}
					else
							show_error('The person you are trying to edit does not exist.');
				}
			}
			else
				show_error('not logged in');
    } 

    /*
     * Deleting person
     */
    function remove($people_id)
    {
			if( $this->require_min_level(5) )
			{	
        $person = $this->Person_model->get_person($people_id);

        // check if the person exists before trying to delete it
        if(isset($person['people_id']))
        {
            $this->Person_model->delete_person($people_id);
            redirect('person/index');
        }
        else
            show_error('The person you are trying to delete does not exist.');
			}
    }

}
