<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get category by category_id
     */
    function get_category($category_id)
    {
        return $this->db->get_where('cia12_category',array('category_id'=>$category_id))->row();
    }
        
    /*
     * Get all categories
     */
    function get_all_categories()
    {
        $this->db->order_by('category_id', 'desc');
        return $this->db->get('cia12_category')->result_array();
    }
        
    /*
     * function to add new category
     */
    function add_category($params)
    {
        $this->db->insert('cia12_category',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update category
     */
    function update_category($category_id,$params)
    {
        $this->db->where('category_id',$category_id);
        return $this->db->update('cia12_category',$params);
    }
    
    /*
     * function to delete category
     */
    function delete_category($category_id)
    {
        return $this->db->delete('cia12_category',array('category_id'=>$category_id));
    }
}
