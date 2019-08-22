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
			if( $this->require_role('admin') )
			{	
        $data['events'] = $this->Event_model->get_all_events();
        $data['_view'] = 'event/index';
        $this->load->view('mainpage',$data);
			}
    }
		
		
		
    /*
     * Listing of events
     */
    function view($hall_id = Null, $event_type_id = Null, $category_id = Null)
    {
			
			
			if( $this->require_role('admin') )
			{	
        $data['events'] = $this->Event_model->get_event_by_options( $hall_id, $event_type_id, $category_id);
        
        $data['_view'] = 'event/index';
        $this->load->view('mainpage',$data);
			}
    }

    /*
     * Adding a new event
     */
    function add()
    {
			if( $this->require_role('admin') )
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

    /*
     * Adding a new event
     */
    function quick_add($hall_id, $event_type_id, $category_id)
    {
			$logged_in_id = 1;

			if( $this->require_role('admin') )
			{	
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
			if( $this->require_role('admin') )
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

						$event_people_id = $_POST['event_people_id'];
						$registered = $_POST['registered'];
						$attended = $_POST['attended'];
						$paid = $_POST['paid'];
						$comment = $_POST['comment'];
					
						foreach($event_people_id as $key => $id)
						{
							$event_params = array(
								'registered' => $registered[$key],
								'attended' => $attended[$key],
								'paid' => $paid[$key],
								'comment' => $comment[$key],
							);						
							
							$this->Event_person_model->update_event_person($id,$event_params);  
						}					
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
			if( $this->require_role('admin') )
			{	

						ChromePhp::log(date_default_timezone_get());
						$now = new DateTime();
				ChromePhp::log($now);		
				
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
