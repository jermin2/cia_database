<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {
        $data['_view'] = 'dashboard';
        $this->load->view('mainpage',$data);
    }
}
