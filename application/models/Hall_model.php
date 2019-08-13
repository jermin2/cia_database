<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Hall_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get hall by hall_id
     */
    function get_hall($hall_id)
    {
        return $this->db->get_where('halls',array('hall_id'=>$hall_id))->row_array();
    }
        
    /*
     * Get all halls
     */
    function get_all_halls()
    {
        $this->db->order_by('hall_id', 'desc');
        return $this->db->get('halls')->result_array();
    }
        
    /*
     * function to add new hall
     */
    function add_hall($params)
    {
        $this->db->insert('halls',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update hall
     */
    function update_hall($hall_id,$params)
    {
        $this->db->where('hall_id',$hall_id);
        return $this->db->update('halls',$params);
    }
    
    /*
     * function to delete hall
     */
    function delete_hall($hall_id)
    {
        return $this->db->delete('halls',array('hall_id'=>$hall_id));
    }
}