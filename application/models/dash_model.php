<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class dash_model extends CI_Model{

	public function __construct() {
		
		parent::__construct();
		
	}

public function insert_student_data($data)
{
	
    $que = $this->db->insert('students',$data);
    if ($que != null) {
    	return true;
    }
    return false;
}

public function count_all_std(){

    $query = $this->db->get("students");
    return  $query->num_rows();
}
public function insert_class_data($data)
{
	
    $que = $this->db->insert('class',$data);
    if ($que != null) {
    	return true;
    }else{
    return false;
	}
	
}
public function count_all_cls(){

    $query = $this->db->get("class");
    return  $query->num_rows();
}

public function count_allstudents_cls($id){
    
    
                        $this->db->where("st_class_id",$id)
                        ->join("class","students.st_class_id = class.cls_id");
    $query = $this->db->get("students");
    return  $query->num_rows();
}

public function insert_fee_data($data)
{
    
    $que = $this->db->insert('fee_payment',$data);
    if ($que != null) {
        return true;
    }else{
    return false;
    }
    
}
public function update_student($data,$id)
{
    //$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
    // $a = $this->db->get_where('class',array('cls_id' => $id))->row();
    // return $a;
    $this->db->set($data);
    $this->db->where('st_id', $id);
    $this->db->update('students',$data);
    
}
public function update_class($data,$id)
{
	//$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
	// $a = $this->db->get_where('class',array('cls_id' => $id))->row();
	// return $a;
	$this->db->set($data);
	$this->db->where('cls_id', $id);
    $this->db->update('class',$data);
 	
}

public function update_group($data,$id)
{
    
    $this->db->set($data);
    $this->db->where('grp_id', $id);
    $this->db->update('class_fees',$data);
    
}

public function update_mulitple_classes($id)
{
	$this->db->where('cls_id', $id);
    $query = $this->db->get('class');
    return $query->result();
}
public function update_mulitple_classes1($id)
{
	$query = $this->db->get('class_fees');  
    $this->db->where('cls_id', $id);
    return $query->result(); 
}

public function insert_group($data1){
	
	$que = $this->db->insert('class_fees',$data1);
    if (!empty($que)) {
    	return true;
    }else{
    return false;
	}
}

public function insert_std_fee($data){

    $que = $this->db->insert('fee_payment',$data);
    if ($que != null) {
        return true;
    }
    return false;
}

// public function check_user_exists_in_php($cellno)
// {
// 		$this->db->where('st_personal_phone=',$cellno);
// 	    $que  = $this->db->get('students');
	 
// 	  return $que->num_rows() == 0;
// }

public function check_student_phone_exists($cellno)
{
		$this->db->where('st_student_phone_no=',$cellno);
	    $que  = $this->db->get('students');
	 
	  return $que->num_rows() == 0;
}

public function check_class_exists_in_php($clss)
{
		$this->db->where('cls_name',$clss);
	    $que  = $this->db->get('class');
	 
	  return $que->num_rows() == 0;
}

public function check_group_in_php($grp,$cls)
{
		$this->db->where(array('cls_id' => $grp, 'grp_name' => $cls));
	    $que  = $this->db->get('class_fees');
		 if ($que->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

    public function reset_pass_update($name ,$pass,$data){

       $this->db->set($data)->where(array('us_name' => $name ,'us_password' => $pass));
       
        $this->db->update('users',$data);

    }

    public function get_useronly($name,$pass) {
    
    $this->db->select("*");
    $this->db->from('users')->where(array('us_name' => $name ,'us_password' => $pass));
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
        // return $query->result();
         return $query->result();
    }
    return false;
}

	function getclassonly() {
    
    $this->db->select("*");
	$this->db->from('class');
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
    	// return $query->result();
         return $query->result();
    }
    return false;
}

	function getclasslist() {
    
    $this->db->select("*");
	$this->db->from('class');
	$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
    	// return $query->result();
         return $query->result();
    }
    return false;
}

function getclasslist_only() {
    
    $this->db->select("*");
    $this->db->from('class');
    //$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
        // return $query->result();
         return $query->result();
    }
    return false;
}

function del_classes_grp($id) {
    
   
    //$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
    

    if($this->db->delete("class_fees","grp_id=".$id))
    {
        // return $query->result();
         return true;
    }
    return false;
}

function del_classes_only($id) {
    
   
    //$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
    

    if($this->db->delete("class","cls_id=".$id))
    {
       
         return true;
    }
    return false;
}

function del_std_only($id) {
    
   
    //$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
    

    if($this->db->delete("students","st_id=".$id))
    {
        // return $query->result();
         return true;
    }
    return false;
}

function getstatus_name($id) {
    
    $this->db->select("*");
    $this->db->from('class_fees');
    $this->db->where('grp_id',$id);
    //$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
        // return $query->result();
         return $query->result();
    }
    return false;
}

    function get_student_edit($id) {
    
    $this->db->select("*");
    $this->db->from('students')
     ->join("class","students.st_class_id = class.cls_id")
    ->join("class_fees","students.st_group = class_fees.grp_id")
    ->where("st_id",$id);
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
       
         return $query->result();
    }
    return false;
}


public function record_count() {

return $this->db->count_all("students");

}

public function getstudentlist1() {
            
            $this->db->select('*')
                     ->from('students');
            

            $this->db->join("class","students.st_class_id = class.cls_id");
            $this->db->join("class_fees","students.st_group = class_fees.grp_id");
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
             return $query->result();  
        }
    }

// public function getstudentlist($limit, $start) {

//         $offset = ($start-1)*$limit;

//         $this->db->limit($limit, $offset);
//         $st_query = $this->db->get("students");

//         if ($st_query->num_rows() > 0) {
//         foreach ($st_query->result() as $row) {
//         $data[] = $row;
//         }
//         return $data;
//         }
//         return false;
//  }

//—

// function getstudentlist() {
    
//     $this->db->select("*");
// 	$this->db->from('students');
// 	$this->db->join("class","students.st_class_id = class.cls_id");
// 	$this->db->join("class_fees","students.st_group = class_fees.grp_id");
// 	//$this->db->where("st_class_id=",$id);
//     $query = $this->db->get();

//     if($query->num_rows() >= 1)
//     {
//     	// return $query->result();
//          return $query->result();
//     }
//     return false;
// }

function getclass_fees() {
    
    $this->db->select("*");
	$this->db->from('class');
	//$this->db->join("students","class.cls_id = students.st_class_id");
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
    	// return $query->result();
         return $query->result();
    }
    return false;
}

function get_std_id() {
    
    $this->db->select("*");
    $this->db->from('fee_payment');
    //$this->db->join("students","class.cls_id = students.st_class_id");
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
        // return $query->result();
         return $query->result();
    }
    return false;
}

public function get_prev_month_fee($value)
{
    $que1 = $this->db->select("*")->from("fee_payment")
                
                ->where("fp_std_id",$value)->order_by("fp_std_id","DESC")->limit(1)->get();
    
    if ($que1->num_rows() != 0) {
       return $que1->result();
    }
    else{
        return false;
    }
}

public function get_prev_month_fee2($of)
{
    $que1 = $this->db->select("*")->from("fee_payment")
                
                ->where("fp_id",$of)->order_by("fp_std_id","DESC")->limit(1)->get();
    
    if ($que1->num_rows() != 0) {
       return $que1->result();
    }
}

function getclass_fee_group($id){

	$this->db->select('grp_id, grp_name');
	$this->db->from('class_fees');
	$this->db->where('cls_id=',$id);	
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
    	// return $query->result();
         return $query->result();
    }
    else{

    	return false;
    }

}

function get_fees_list() {
    
    $this->db->select("*");
	$this->db->from('class_fees');
	$this->db->join("students","class_fees.cls_id = students.st_class_id");
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
    	// return $query->result();
         return $query->result();
    }
    return false;
}

function getclasslistonlyview() {
    
    $this->db->select("*");
	$this->db->from('class');
	//$this->db->join("class_fees","class.cls_id = class_fees.cls_id");
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
    	// return $query->result();
         return $query->result();
    }
    return false;
}
function getgroup_viaclass($id) {
    
    
    $this->db->select('grp_id, grp_name');
	$this->db->from('class_fees');

	$this->db->where('cls_id=',$id);	
    $query_st = $this->db->get();

    if($query_st->num_rows() >= 1)
    {
    	// return $query->result();
         return $query_st->result();
    }
    else{

    	return false;
    }
    
}

function getstatus_viagroup($id) {
    
    
    $this->db->select('*');
    $this->db->from('students');
    //$this->db->join("class_fees","students.st_group = class_fees.grp_id");
    $this->db->where('st_group',$id);    
    $query = $this->db->get();

    if($query->num_rows() >= 1)
    {
        // return $query->result();
         return $query->result();
    }
    else{

        return false;
    }
    
}

 function getclassgroup()
{
	 	$this->db->select("cls_id");
	    $this->db->from('class');
		$query = $this->db->get();
		return $query->result();
}

 function search_students_on_key($id){
 //like('%$id%')
    $this->db->select("*");
    $this->db->from("students");
     $this->db->join("class","students.st_class_id = class.cls_id");
    $this->db->join("class_fees","students.st_group = class_fees.grp_id");
     $this->db->where("st_id",$id)->or_like("st_name",$id);

    // $this->db->where("");
   $res = $this->db->get();
    if ($res->num_rows() >= 1) {
       return $res->result();
    }
    else{
        return false;
    }

 }

 function search_students_by_cls_grp($sts_id,$grp_id)
 {
      $this->db->select("*");
      $this->db->from("students");
      //$this->db->query("select * from students where st_group =  '".$grp_id."'");
     //$this->db->where(array('st_group' => $grp_id));
     $this->db->join("class","students.st_class_id = class.cls_id");
    $this->db->join("class_fees","students.st_group = class_fees.grp_id");
    //$this->db->join("class_fees","students.st_group = class_fees.grp_id");
    //$jj = $this->db->query("WHERE students.st_status = $stat_id AND class_fees.grp_id = $grp_id");
    $this->db->where(array('st_status' => $sts_id,'st_group' => $grp_id));
    //$this->db->join("class","students.st_class_id = $cls_id");
    // $this->db->join("class","students.st_class_id = class.cls_id","= $cls_id");
    // $this->db->join("class_fees","students.st_group = class_fees.grp_id","= $grp_id");
    return  $this->db->get()->result();
    

 }

  function search_allstudents_cls_grp($cls_id)
 {
      $this->db->select("*");
      $this->db->from("students");
     $this->db->join("class","students.st_class_id = class.cls_id");
    $this->db->join("class_fees","students.st_group = class_fees.grp_id");
    $this->db->where(array('st_class_id' => $cls_id));
    $que1 = $this->db->get();
    if ($que1->num_rows() == 0) {
        return false;
    }
    return $que1->result();

 }

 function search_students_fee_rec($id,$id1,$id2){

    $this->db->select("*");
    $this->db->from("fee_payment");
     $this->db->join("class","fee_payment.fp_cls_id = class.cls_id");
    $this->db->join("class_fees","fee_payment.fp_grp_id = class_fees.grp_id");
    $this->db->join("students","fee_payment.fp_std_id = students.st_id");
     $this->db->where(array("fp_std_id" => $id,"fp_month" => $id1,"fp_year" => $id2));
     $this->db->group_by("fp_std_id");
   $res = $this->db->get();

    if ($res->num_rows() >= 1) {
       return $res->result();
    }
    else{
        return false;
    }

 }

  function search_students_fee_rec_all($id,$yr){

    $this->db->select(array("*"));
    $this->db->from("fee_payment");
     $this->db->join("class","fee_payment.fp_cls_id = class.cls_id");
    $this->db->join("class_fees","fee_payment.fp_grp_id = class_fees.grp_id");
    $this->db->join("students","fee_payment.fp_std_id = students.st_id");
     $this->db->where(array("fp_std_id" => $id, "fp_year" => $yr));
     //$this->db->group_by("fp_std_id");
   $res = $this->db->get();

    if ($res->num_rows() >= 1) {
       return $res->result();
    }
    else{
        return false;
    }

 }


 public function check_month_year($id,$my,$yr)
{       
    $this->db->select("*");
    $this->db->from("fee_payment");
        
        $this->db->join("class","fee_payment.fp_cls_id = class.cls_id")
            ->join("class_fees","fee_payment.fp_grp_id = class_fees.grp_id")
             ->join("students","fee_payment.fp_std_id = students.st_id")
            ->where(array('st_id' => $id,'fp_month'=> $my,'fp_year'=> $yr));
            
        $que  = $this->db->get();
     
      if ($que->num_rows() == 0) {
          return  false;
      }
      return $que->result();
}

 function pdf_report_model($id){
    //
    $row = $this->db->select("*")->from("fee_payment")->order_by('fp_id',"desc")->limit(1);
    $this->db->join("students","fee_payment.fp_std_id = students.st_id");
     $this->db->join("class","fee_payment.fp_cls_id = class.cls_id");
     $this->db->join("class_fees","fee_payment.fp_grp_id = class_fees.grp_id");

    $this->db->where("fp_id",$id);
    if ($row != null) {
        return $this->db->get()->result();
    }
    else {
       return false;
    }
 }


}
?>