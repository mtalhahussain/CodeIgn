<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pak_model extends CI_Model{
	
	
	public function __construct(){
		
		parent:: __construct();

		$this->load->helper('url');

	}

	public function login($email,$pass)
	{
		
		$this->db->where(array('us_name' => $email,'us_password'=> $pass));
		$query = $this->db->get('users');
		if ($query->num_rows() == 1)
		 {
			return $query->result();
		}
		else 
		{
			return false;
		}
	}
}