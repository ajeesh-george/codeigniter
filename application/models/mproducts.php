<?php

class MProducts extends CI_Model{
	
	 function __construct(){
	    parent::__construct();
	 }
	
	 function getProduct($id){
	    $data = array();
	    $options = array('id' => $id);
	    $Q = $this->db->getwhere('products',$options,1);
	    if ($Q->num_rows() > 0){
	      $data = $Q->row_array();
	    }
	
	    $Q->free_result();    
	    return $data;    
	 }
	
	 function getAllProducts(){
	     $data = array();
	     $Q = $this->db->get('products');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data; 
	 }
	 
	 function getProductsByCategory($catid){
	     $data = array();
	     $this->db->select('id,name,shortdesc,thumbnail');
	     $this->db->where('category_id', id_clean($catid));
	     $this->db->where('status', 'active');
	     $this->db->order_by('name','asc');
	     $Q = $this->db->get('products');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data; 
	 } 
	 
	function getMainFeature(){
	     $data = array();
	     $this->db->select("id,name,shortdesc,image");
	     $this->db->where('featured','true');
	     $this->db->where('status', 'active');
	     $this->db->order_by("rand()"); 
	     $this->db->limit(1);
	     $Q = $this->db->get('products');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data = array(
	         	"id" => $row['id'],
	         	"name" => $row['name'],
	         	"shortdesc" => $row['shortdesc'],
	         	"image" => $row['image']
	         	);
	       }
	    }
	    $Q->free_result();    
	    return $data;  
	 }
	 
	function getRandomProducts($limit,$skip){
		$data = array();
		$temp = array();
		if ($limit == 0){
		$limit=3;
		}
		$this->db->select("id,name,thumbnail,category_id");
		$this->db->where('id !=', $skip);
		$this->db->where('status', 'active');
		$this->db->order_by("category_id","asc"); 
		$this->db->limit(100);
		$Q = $this->db->get('products');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
	         $temp[$row['category_id']] = array(
	         	"id" => $row['id'],
	         	"name" => $row['name'],
	         	"thumbnail" => $row['thumbnail']
	         	);
			}
		}
	
		shuffle($temp);
		if (count($temp)){
			for ($i=1;$i<=$limit; $i++){
				$data[] = array_shift($temp);
			} 
		}
		$Q->free_result();    
		return $data;  
	}
	 	 
}

?>