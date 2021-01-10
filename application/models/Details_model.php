<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Details_model extends CI_Model{

	public function __construct() {
		
		parent::__construct();
		
	}

public function insert_data($data)
{
	
    $que = $this->db->insert('users',$data);
    if ($que != null) {
    	return true;
    }
    return false;
}

public function check_user_exists_in_php($name)
{
		$this->db->where('us_name=',$name);
	    $que1  = $this->db->get('users');
	 
	  return $que1->num_rows() == 0;
}

public function check_user_exists($name)
{
		$this->db->where('LOWER(us_name)=', strtolower($name));
		$this->db->limit(1);
	    $que  = $this->db->get('users');
	  
	  	return $que->num_rows() == 0;
	  
}

}

?>