<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Age_group_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get age_group by age_group_id
     */
    function get_age_group($age_group_id)
    {
        return $this->db->get_where('cia12_age_group',array('age_group_id'=>$age_group_id))->row_array();
    }
        
    /*
     * Get all age_groups
     */
    function get_all_age_groups()
    {
        $this->db->order_by('age_group_id', 'desc');
        return $this->db->get('cia12_age_group')->result_array();
    }
        
    /*
     * function to add new age_group
     */
    function add_age_group($params)
    {
        $this->db->insert('cia12_age_group',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update age_group
     */
    function update_age_group($age_group_id,$params)
    {
        $this->db->where('age_group_id',$age_group_id);
        return $this->db->update('cia12_age_group',$params);
    }
    
    /*
     * function to delete age_group
     */
    function delete_age_group($age_group_id)
    {
        return $this->db->delete('cia12_age_group',array('age_group_id'=>$age_group_id));
    }
}
