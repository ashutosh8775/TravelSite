<?php
	class MyModel extends CI_Model{
		  public function __construct()
        {
                $this->load->database();
        }
		public function add(){
			$username=$_POST['username'];
			$company=$_POST['company'];
			$this->db->query("INSERT INTO user(username,company) VALUES('$username','$company')");
			$query=$this->db->query("SELECT * FROM user");
			$query->result_array();
			return $query->result_array();
		}
		public function display(){
			$query=$this->db->query("SELECT * FROM user");
			$query->result_array();
			return $query->result_array();
		}
		
		public function getData($id){
			 //$this->db->from('user');
			 $sql="select * from user where id=?";
			$query =$this->db->query($sql,array($id));
			 return $query->row_array();
		}
		
		public function Update($id){
			$username=$_POST['username'];
			$company=$_POST['company'];
            $data = array(  
				'username' => $username,
				'company'=>$company
				);
			$this->db->set($data);
			$this->db->where("id",$id);
			$this->db->update("user",$data);
		}
		public function getAllRecords(){
			$query=$this->db->query("SELECT * FROM user");
			$query->result_array();
			return $query->result_array();
		}
		
	}
?>