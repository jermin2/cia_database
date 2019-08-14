<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Ncm_comment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get ncm_comment by comment_id
     */
    function get_ncm_comment($comment_id)
    {
        return $this->db->get_where('cia12_ncm_comment',array('comment_id'=>$comment_id))->row_array();
    }
        
    /*
     * Get all ncm_comments
     */
    function get_all_ncm_comments()
    {
        $this->db->order_by('comment_id', 'desc');
        return $this->db->get('cia12_ncm_comment')->result_array();
    }
        
    /*
     * function to add new ncm_comment
     */
    function add_ncm_comment($params)
    {
        $this->db->insert('cia12_ncm_comment',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update ncm_comment
     */
    function update_ncm_comment($comment_id,$params)
    {
        $this->db->where('comment_id',$comment_id);
        return $this->db->update('cia12_ncm_comment',$params);
    }
    
    /*
     * function to delete ncm_comment
     */
    function delete_ncm_comment($comment_id)
    {
        return $this->db->delete('cia12_ncm_comment',array('comment_id'=>$comment_id));
    }
}
