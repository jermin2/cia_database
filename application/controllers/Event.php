<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
include 'ChromePhp.php';

class Event extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
				$this->load->model('Event_person_model');
    } 

    /*
     * Listing of events
     */
    function index()
    {
			if( $this->require_min_level(4) )
			{	
		
				if( $this->auth_level == 9 ){
					$data['events'] = $this->Event_model->get_all_events();
				}
				else if ($this->auth_level >= 5)
				{
					$this->Event_model->set_hall_id($this->profile_data['hall_id']);
					$data['events'] = $this->Event_model->get_events_by_options();
				}
				else if ($this->auth_level >= 4)
				{
					$this->Event_model->set_hall_id($this->profile_data['hall_id']);
					
					if( $this->profile_data['serving_primary'] == 1)
						$category_id_array[] = AGE_GROUP_PRIMARY;
					if( $this->profile_data['serving_int'] == 1)
						$category_id_array[] = AGE_GROUP_INTERMEDIATE;
					if( $this->profile_data['serving_hs'] == 1)
						$category_id_array[] = AGE_GROUP_HIGHSCHOOL;
					if( $this->profile_data['serving_campus'] == 1)
						$category_id_array[] = AGE_GROUP_CAMPUS;
						
					$this->Event_model->set_category_id_array($category_id_array);
					$data['events'] = $this->Event_model->get_events_by_options();
				}

				
				$data['title'] = "View All Events";
        $data['_view'] = 'event/index';
        $this->load->view('mainpage',$data);
			}
    }
		
		function view_primary(){$this->view_by_age_group(AGE_GROUP_PRIMARY);	}
		function view_hs(){$this->view_by_age_group(AGE_GROUP_HIGHSCHOOL);}
		function view_int(){$this->view_by_age_group(AGE_GROUP_INTERMEDIATE);	}
		function view_campus(){$this->view_by_age_group(AGE_GROUP_CAMPUS);	}		
		
		function view_by_age_group($age_group_id)
		{
			if( $this->verify_min_level(4))
			{
				//If not sufficient auth_level, they can only view their own hall
				if($this->auth_level < 5)
				{
					$this->Event_model->set_hall_id($this->profile_data['hall_id']);
					$data['subtitle'] = "Hall ".$this->profile_data['hall_id'];
				}
				$this->Event_model->set_category_id($age_group_id);
				$data['events'] = $this->Event_model->get_events_by_options();
				
				$data['title'] = "View Events";
				$data['_view'] = 'event/index';
				$this->load->view('mainpage',$data);
			}			
		}
    /*
     * Listing of events
     */
    function view($hall_id = Null, $event_type_id = Null, $category_id = Null)
    {
			
			if( $this->verify_min_level(4) )
			{	
				$this->Event_model->set_hall_id($hall_id);
				$this->Event_model->set_event_type_id($event_type_id);
				$this->Event_model->set_category_id($category_id);
        $data['events'] = $this->Event_model->get_events_by_options();
        
        $data['_view'] = 'event/index';
        $this->load->view('mainpage',$data);
			}
    }

    /*
     * Adding a new event
     */
    function add()
    {
			if( $this->require_min_level(5) )
			{	
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'event_type_id' => $this->input->post('event_type_id'),
				'category_id' => $this->input->post('category_id'),
				'hall_id' => $this->input->post('hall_id'),
				'event_name' => $this->input->post('event_name'),
				'date' => $this->input->post('date'),
				'location' => $this->input->post('location'),
				'comments' => $this->input->post('comments'),
            );
            
            $event_id = $this->Event_model->add_event($params);

            redirect('event/index');
        }
        else
        {
					$this->load->model('Event_type_model');
					$data['all_event_types'] = $this->Event_type_model->get_all_event_types();

					$this->load->model('Category_model');
					$data['all_categories'] = $this->Category_model->get_all_categories();

					$this->load->model('Hall_model');
					$data['all_halls'] = $this->Hall_model->get_all_halls();
            
					$data['_view'] = 'event/add';
					$this->load->view('mainpage',$data);
        }
			}
    }  

		function duplicate($event_id)
		{
			if( $this->verify_min_level(4) )
			{
				//TODO check if the user is in the same hall
				
				//Pull out the data from the event
				$this->load->model('Event_model');
				$event_data = $this->Event_model->get_event($event_id);
				
				//Duplicate the entry
				$params = array(
					'event_type_id' => $event_data['event_type_id'],
					'category_id' => $event_data['category_id'],
					'hall_id' => $event_data['hall_id'],
					'event_name' => $event_data['event_name'], //date_create('now')->format('Y-m-d') ,
					'date' => date_create('now')->format('Y-m-d H:i:s') ,
					'location' => "",
					'comments' => "",
            );	
				$new_event_id = $this->Event_model->add_event($params);
				
				//Add people 
				////Get the event_people_ids 
				$this->load->model('Event_person_model');
				$event_person_data = $this->Event_person_model->get_event_person_by_event_id($event_id);
				
				//add them to the new event
				foreach($event_person_data as $event_person)
				{
					$params = array(
						'people_id' => $event_person['people_id'],
						'event_id' => $new_event_id,
            );
            
					$event_people_id = $this->Event_person_model->add_event_person($params);
					
				}
				redirect('event/edit/'.$new_event_id);
							
			}
			
		}
		
    /*
     * Adding a new event
     */
    function quick_add($hall_id, $event_type_id, $category_id)
    {
			if( $this->verify_min_level(4) )
			{	
				$logged_in_id = $this->profile_data['people_id'] ;
								
				$params = array(
				'event_type_id' => $event_type_id,
				'category_id' => $category_id,
				'hall_id' => $hall_id,
				'event_name' => date_create('now')->format('Y-m-d') ,
				'date' => date_create('now')->format('Y-m-d H:i:s') ,
				'location' => "",
				'comments' => "",
            );	
				$event_id = $this->Event_model->add_event($params);
				
				$params = array(
				'people_id' => $logged_in_id,
				'event_id' => $event_id,
				'attended' => 1,
				);
            
        $event_people_id = $this->Event_person_model->add_event_person($params);
				
				//Add people in this category to the event
				$this->load->model('Person_model');
				$this->Person_model->set_age_group($category_id);
			
			
				
				//If its campus, then don't be limited by Hall
				if($category_id != AGE_GROUP_CAMPUS)
				{
					$this->Person_model->set_hall_id($hall_id);
				}
				$people_list = $this->Person_model->get_people();
				
				//If its an appointment, don't need add everyone.
				if($event_type_id != EVENT_APPOINT)
				{
					foreach($people_list as $person)
					{
						$params = array(
							'people_id' => $person['people_id'],
							'event_id' => $event_id,
							);		
							
						$event_people_id = $this->Event_person_model->add_event_person($params);
					}
				}

				redirect('event/edit/'.$event_id);
			}
    }  
		
		function view_by_id($event_id)
		{
			if ( $this->verify_min_level(1))
			{
        // check if the event exists before trying to edit it
        $data['event'] = $this->Event_model->get_event($event_id);
				
				// Convert the time to something we can use
				$data['event']['datetime'] =  date('Y-m-d\TH:i', strtotime($data['event']['date']));

				$this->load->model('Event_person_model');
        
        if(isset($data['event']['event_id']))
        {		
					$this->load->model('Event_type_model');
					$data['all_event_types'] = $this->Event_type_model->get_all_event_types();

					$this->load->model('Category_model');
					$data['all_categories'] = $this->Category_model->get_all_categories();

					$this->load->model('Hall_model');
					$data['all_halls'] = $this->Hall_model->get_all_halls();
		
					$this->load->model('Event_person_model');
					$data['event_people'] = $this->Event_person_model->get_event_person_by_event_id($event_id);

					$data['event']['event_type'] = $this->Event_type_model->get_event_type($data['event']['event_type_id'])->event_type;
					$data['event']['category'] = $this->Category_model->get_category($data['event']['category_id'])->category_name;
					$data['event']['hall_name'] = $this->Hall_model->get_hall($data['event']['hall_id'])->hall_name;
					

					$data['_view'] = 'event/view';
					$this->load->view('mainpage',$data);			
        }
        else
            show_error('The event you are trying to edit does not exist.');
			}
		}

    /*
     * Editing a event
     */
    function edit($event_id)
    {
			if( $this->verify_min_level(4) )
			{	
        // check if the event exists before trying to edit it
        $data['event'] = $this->Event_model->get_event($event_id);
				
				// Convert the time to something we can use
				$data['event']['datetime'] =  date('Y-m-d\TH:i', strtotime($data['event']['date']));

				$this->load->model('Event_person_model');
        
        if(isset($data['event']['event_id']))
        {
					if(isset($_POST) && count($_POST) > 0)     
					{   
				
						$params = array(
							'event_type_id' => $this->input->post('event_type_id'),
							'category_id' => $this->input->post('category_id'),
							'hall_id' => $this->input->post('hall_id'),
							'event_name' => $this->input->post('event_name'),
							'date' => date('Y-m-d H:i', strtotime($this->input->post('date'))),
							'location' => $this->input->post('location'),
							'comments' => $this->input->post('comments'),
						);

						$this->Event_model->update_event($event_id,$params); 
						
						redirect('event/index');
					}
					else
					{
						$this->load->model('Event_type_model');
						$data['all_event_types'] = $this->Event_type_model->get_all_event_types();

						$this->load->model('Category_model');
						$data['all_categories'] = $this->Category_model->get_all_categories();

						$this->load->model('Hall_model');
						$data['all_halls'] = $this->Hall_model->get_all_halls();
			
						$this->load->model('Event_person_model');
						$data['event_people'] = $this->Event_person_model->get_event_person_by_event_id($event_id);
						
						$this->load->model('Person_model');
						
						//Limit the "add a person" list to a hall - lets let all the names appear
						//$this->Person_model->set_hall_id( $this->profile_data['hall_id']);
						$namelist = $this->Person_model->get_people_namelist();
						$data['namelist'] = $namelist;

						$data['_view'] = 'event/edit';
						$this->load->view('mainpage',$data);
					}
        }
        else
            show_error('The event you are trying to edit does not exist.');
			}
    } 

    /*
     * Deleting event
     */
    function remove($event_id)
    {
			if( $this->verify_min_level(5) )
			{	
				$now = new DateTime();	
				
				//Remove all attendence related to this event first
				$attendence = $this->Event_person_model->get_event_person_by_event_id($event_id);
				foreach($attendence as $attend)
				{
					$this->Event_person_model->delete_event_person($attend['event_people_id']);
				}
				
				
        $event = $this->Event_model->get_event($event_id);

        // check if the event exists before trying to delete it
        if(isset($event['event_id']))
        {
            $this->Event_model->delete_event($event_id);
            redirect('event/index');
        }
        else
            show_error('The event you are trying to delete does not exist.');
			}
    }
    
}
