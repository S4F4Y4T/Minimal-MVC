<?php
class Madmin extends Mmodel{

	public function __construct(){
		parent::__construct();
	}

	//Fetch Data Dynamicly
	public function fetchdata($data){
		return $this->db->fetchdata($data);
	}

	//Fetch Data By Join Table
	public function join($data){
		return $this->db->join($data);
	}
	//Fetch Data By Join Table

	//Insert Data Into Database
	public function insertdata($data,$table){
		return $this->db->insertdata($data,$table);
	}
	//Insert Data Into Database

	//Update Data Into Database
	public function updatedata($table,$data,$pkey,$id){
		return $this->db->update($table,$data,$pkey,$id);
	}
	//Update Data Into Database

	//Delete Data From Database
	public function delete($data){
		return $this->db->delete($data);
	}
	//Delete Data From Database

	public function multidelete($id,$table,$pkey){
		return $this->db->multidelete($id,$table,$pkey);
	}
}
?>
