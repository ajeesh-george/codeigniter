<?php

class MCats extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function getCategory($id){
	    $data = array();
	    $options = array('id' =>$id);
	    $Q = $this->db->getwhere('categories',$options,1);
	    if ($Q->num_rows() > 0){
	      $data = $Q->row_array();
	    }
	
	    $Q->free_result();    
	    return $data;    
	 }
		
	 function getAllCategories(){
	     $data = array();
	     $Q = $this->db->get('categories');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 }
	 
	function getSubCategories($catid){
	     $data = array();
	     $this->db->select('id,name,shortdesc');
	     $this->db->where('parentid', $catid);
	     $this->db->where('status', 'active');
	     $this->db->orderby('name','asc');
	     $Q = $this->db->get('categories');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	       		$sql = "select thumbnail as src 
	       				from products 
	       				where category_id=".$row['id']."
	       				and status='active'
	       				order by rand() limit 1";
	       		$Q2 = $this->db->query($sql);
	 
	       	
	       		if($Q2->num_rows() > 0){
					$thumb = $Q2->row_array();
	       			$THUMB = $thumb['src'];
	       		}else{
	       			$THUMB = '';
	       		}
	       		$Q2->free_result();
	       		$data[] = array(
	       			'id' => $row['id'], 
	       			'name' => $row['name'], 
	       			'shortdesc' => $row['shortdesc'],
	       			'thumbnail' => $THUMB
	       		);
	       	}
	    }
	    $Q->free_result();  
	    
	    return $data; 
	
	 }
	 
	function getCategoriesNav(){
	     $data = array();
	     $this -> db -> where('parentid < ', 1);
		 $this -> db -> where('status', 'active');
		 $this -> db -> order_by('name','asc');
	     $Q = $this->db->get('categories');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row){
				$data[$row->id] = $row->name;
			}
	    }
	    $Q->free_result(); 
	    return $data; 
	 }
}

?>

 