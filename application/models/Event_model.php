<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Event_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get event by event_id
     */
    function get_event($event_id)
    {
        return $this->db->get_where('cia12_events',array('event_id'=>$event_id))->row_array();
    }
		
		
		
		function get_event_by_options($hall_id = NULL, $event_type_id = NULL, $category_id = NULL)
		{
			$this->db->select('event_id, event_type, category_name, hall_name, cia12_events.event_name, date, location, comments');
			$this->db->from('cia12_events, cia12_event_type, cia12_category, cia12_halls');
			$this->db->where('cia12_events.event_type_id = cia12_event_type.event_type_id');
			if(isset($event_type_id)){
				$this->db->where('cia12_events.event_type_id', $event_type_id);
			}					
			$this->db->where('cia12_events.category_id = cia12_category.category_id');
			if(isset($category_id)){
				$this->db->where('cia12_events.category_id', $category_id);
			}			
			$this->db->where('cia12_events.hall_id = cia12_halls.hall_id');
			if(isset($hall_id)){
				$this->db->where('cia12_events.hall_id', $hall_id);
			}
			$query = $this->db->get();
			return $query->result_array();	
			
			//Find 
		}
			
        
    /*
     * Get all events
     */
    function get_all_events()
    {
			$this->db->select('event_id, event_type, category_name, hall_name, cia12_events.event_name, date, location, comments');
			$this->db->from('cia12_events, cia12_event_type, cia12_category, cia12_halls');
			$this->db->where('cia12_events.event_type_id = cia12_event_type.event_type_id');
			$this->db->where('cia12_events.category_id = cia12_category.category_id');
			$this->db->where('cia12_events.hall_id = cia12_halls.hall_id');
			$query = $this->db->get();
			return $query->result_array();	
    }
        
    /*
     * function to add new event
     */
    function add_event($params)
    {
        $this->db->insert('cia12_events',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update event
     */
    function update_event($event_id,$params)
    {
        $this->db->where('event_id',$event_id);
        return $this->db->update('cia12_events',$params);
    }
    
    /*
     * function to delete event
     */
    function delete_event($event_id)
    {
        return $this->db->delete('cia12_events',array('event_id'=>$event_id));
    }
}
