<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Category extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
    } 

    /*
     * Listing of categories
     */
    function index()
    {
        $data['categories'] = $this->Category_model->get_all_categories();
        
        $data['_view'] = 'category/index';
        $this->load->view('mainpage',$data);
    }

    /*
     * Adding a new category
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'category_name' => $this->input->post('category_name'),
            );
            
            $category_id = $this->Category_model->add_category($params);
            redirect('category/index');
        }
        else
        {            
            $data['_view'] = 'category/add';
            $this->load->view('mainpage',$data);
        }
    }  

    /*
     * Editing a category
     */
    function edit($category_id)
    {   
        // check if the category exists before trying to edit it
        $data['category'] = $this->Category_model->get_category($category_id);
        
        if(isset($data['category']['category_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'category_name' => $this->input->post('category_name'),
                );

                $this->Category_model->update_category($category_id,$params);            
                redirect('category/index');
            }
            else
            {
                $data['_view'] = 'category/edit';
                $this->load->view('mainpage',$data);
            }
        }
        else
            show_error('The category you are trying to edit does not exist.');
    } 

    /*
     * Deleting category
     */
    function remove($category_id)
    {
        $category = $this->Category_model->get_category($category_id);

        // check if the category exists before trying to delete it
        if(isset($category['category_id']))
        {
            $this->Category_model->delete_category($category_id);
            redirect('category/index');
        }
        else
            show_error('The category you are trying to delete does not exist.');
    }
    
}
