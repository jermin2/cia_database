<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Hall extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hall_model');
    } 

    /*
     * Listing of halls
     */
    function index()
    {
			if( $this->require_role('admin') )
			{	
        $data['halls'] = $this->Hall_model->get_all_halls();
        
        $data['_view'] = 'hall/index';
        $this->load->view('mainpage',$data);
			}
    }

    /*
     * Adding a new hall
     */
    function add()
    { 
			if( $this->require_role('admin') )
			{			
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'hall_name' => $this->input->post('hall_name'),
            );
            
            $hall_id = $this->Hall_model->add_hall($params);
            redirect('hall/index');
        }
        else
        {            
            $data['_view'] = 'hall/add';
            $this->load->view('mainpage',$data);
        }
			}
    }  

    /*
     * Editing a hall
     */
    function edit($hall_id)
    {
			if( $this->require_role('admin') )
			{				
        // check if the hall exists before trying to edit it
        $data['hall'] = $this->Hall_model->get_hall($hall_id);
        
        if(isset($data['hall']['hall_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'hall_name' => $this->input->post('hall_name'),
                );

                $this->Hall_model->update_hall($hall_id,$params);            
                redirect('hall/index');
            }
            else
            {
                $data['_view'] = 'hall/edit';
                $this->load->view('mainpage',$data);
            }
        }
        else
            show_error('The hall you are trying to edit does not exist.');
			}
    } 

    /*
     * Deleting hall
     */
    function remove($hall_id)
    {
			if( $this->require_role('admin') )
			{	
        $hall = $this->Hall_model->get_hall($hall_id);

        // check if the hall exists before trying to delete it
        if(isset($hall['hall_id']))
        {
            $this->Hall_model->delete_hall($hall_id);
            redirect('hall/index');
        }
        else
            show_error('The hall you are trying to delete does not exist.');
			}
    }
    
}
