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
        return $this->db->get_where('cia12_halls',array('hall_id'=>$hall_id))->row();
    }
        
    /*
     * Get all halls
     */
    function get_all_halls()
    {
        $this->db->order_by('hall_id', 'asc');
        return $this->db->get('cia12_halls')->result_array();
    }
        
    /*
     * function to add new hall
     */
    function add_hall($params)
    {
        $this->db->insert('cia12_halls',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update hall
     */
    function update_hall($hall_id,$params)
    {
        $this->db->where('hall_id',$hall_id);
        return $this->db->update('cia12_halls',$params);
    }
    
    /*
     * function to delete hall
     */
    function delete_hall($hall_id)
    {
        return $this->db->delete('cia12_halls',array('hall_id'=>$hall_id));
    }
}
