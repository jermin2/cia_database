<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Ncm_comment extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ncm_comment_model');
    } 

    /*
     * Listing of ncm_comments
     */
    function index()
    {
        $data['ncm_comments'] = $this->Ncm_comment_model->get_all_ncm_comments();
        
        $data['_view'] = 'ncm_comment/index';
        $this->load->view('mainpage',$data);
    }

    /*
     * Adding a new ncm_comment
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'event_id' => $this->input->post('event_id'),
				'songs' => $this->input->post('songs'),
				'brief report' => $this->input->post('brief report'),
				'notes for improvements' => $this->input->post('notes for improvements'),
            );
            
            $ncm_comment_id = $this->Ncm_comment_model->add_ncm_comment($params);
            redirect('ncm_comment/index');
        }
        else
        {
			$this->load->model('Event_model');
			$data['all_events'] = $this->Event_model->get_all_events();
            
            $data['_view'] = 'ncm_comment/add';
            $this->load->view('mainpage',$data);
        }
    }  

    /*
     * Editing a ncm_comment
     */
    function edit($comment_id)
    {   
        // check if the ncm_comment exists before trying to edit it
        $data['ncm_comment'] = $this->Ncm_comment_model->get_ncm_comment($comment_id);
        
        if(isset($data['ncm_comment']['comment_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'event_id' => $this->input->post('event_id'),
					'songs' => $this->input->post('songs'),
					'brief report' => $this->input->post('brief report'),
					'notes for improvements' => $this->input->post('notes for improvements'),
                );

                $this->Ncm_comment_model->update_ncm_comment($comment_id,$params);            
                redirect('ncm_comment/index');
            }
            else
            {
				$this->load->model('Event_model');
				$data['all_events'] = $this->Event_model->get_all_events();

                $data['_view'] = 'ncm_comment/edit';
                $this->load->view('mainpage',$data);
            }
        }
        else
            show_error('The ncm_comment you are trying to edit does not exist.');
    } 

    /*
     * Deleting ncm_comment
     */
    function remove($comment_id)
    {
        $ncm_comment = $this->Ncm_comment_model->get_ncm_comment($comment_id);

        // check if the ncm_comment exists before trying to delete it
        if(isset($ncm_comment['comment_id']))
        {
            $this->Ncm_comment_model->delete_ncm_comment($comment_id);
            redirect('ncm_comment/index');
        }
        else
            show_error('The ncm_comment you are trying to delete does not exist.');
    }
    
}
