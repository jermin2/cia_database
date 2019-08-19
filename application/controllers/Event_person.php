<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Event_person extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Event_person_model');
    } 

    /*
     * Listing of event_people
     */
    function index()
    {
			if( $this->require_role('admin') )
			{	
        $data['event_people'] = $this->Event_person_model->get_all_event_people();
        
        $data['_view'] = 'event_person/index';
        $this->load->view('mainpage',$data);
			}
    }

    /*
     * Adding a new event_person
     */
    function add()
    {
			if( $this->require_role('admin') )
				{				
        $this->load->library('form_validation');

				$this->form_validation->set_rules('people_id','People Id','integer');
				$this->form_validation->set_rules('event_id','Event Id','integer');
				$this->form_validation->set_rules('comment','Comment','max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'people_id' => $this->input->post('people_id'),
				'event_id' => $this->input->post('event_id'),
				'registered' => $this->input->post('registered'),
				'attended' => $this->input->post('attended'),
				'paid' => $this->input->post('paid'),
				'comment' => $this->input->post('comment'),
            );
            
            $event_people_id = $this->Event_person_model->add_event_person($params);
            redirect('event_person/index');
        }
        else
        {
			$this->load->model('Person_model');
			$data['all_people'] = $this->Person_model->get_all_people();

			$this->load->model('Event_model');
			$data['all_events'] = $this->Event_model->get_all_events();
            
            $data['_view'] = 'event_person/add';
            $this->load->view('mainpage',$data);
        }
			}
    }  

    /*
     * Editing a event_person
     */
    function edit($event_people_id)
    {
		if( $this->require_role('admin') )
			{				
			// check if the event_person exists before trying to edit it
			$data['event_person'] = $this->Event_person_model->get_event_person($event_people_id);
			
			if(isset($data['event_person']['event_people_id']))
			{
				$this->load->library('form_validation');

				$this->form_validation->set_rules('people_id','People Id','integer');
				$this->form_validation->set_rules('event_id','Event Id','integer');
				$this->form_validation->set_rules('comment','Comment','max_length[255]');
		
				if($this->form_validation->run())     
				{   
					$params = array(
						'people_id' => $this->input->post('people_id'),
						'event_id' => $this->input->post('event_id'),
						'registered' => $this->input->post('registered'),
						'attended' => $this->input->post('attended'),
						'paid' => $this->input->post('paid'),
						'comment' => $this->input->post('comment'),
					);

					$this->Event_person_model->update_event_person($event_people_id,$params);            
					redirect('event_person/index');
				}
				else
				{
					$this->load->model('Person_model');
					$data['all_people'] = $this->Person_model->get_all_people();

					$this->load->model('Event_model');
					$data['all_events'] = $this->Event_model->get_all_events();

					$data['_view'] = 'event_person/edit';
					$this->load->view('mainpage',$data);
				}
			}
			else
				show_error('The event_person you are trying to edit does not exist.');
			}
    } 

    /*
     * Deleting event_person
     */
    function remove($event_people_id)
    {
			if( $this->require_role('admin') )
			{	
        $event_person = $this->Event_person_model->get_event_person($event_people_id);

        // check if the event_person exists before trying to delete it
        if(isset($event_person['event_people_id']))
        {
            $this->Event_person_model->delete_event_person($event_people_id);
            redirect('event_person/index');
        }
        else
            show_error('The event_person you are trying to delete does not exist.');
			}
    }
    
}