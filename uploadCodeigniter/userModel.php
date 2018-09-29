<?php 
	class UserModel extends CI_Model{
		
		  public function __construct()
        {
                $this->load->database();
				$this->load->helper('url');
				$this->load->helper('form');
				$this->load->library('form_validation');
        }
		 
		 public function userDetail()
		 {
			 $username=$_POST['username'];
			 $password=$_POST['password'];
			 $email=$_POST['email'];
			 $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			 $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			 
			 if ($this->form_validation->run() == TRUE)
                {
                        $this->db->query("INSERT INTO user_login(username,password,email) VALUES('$username','$password', '$email')");
						/* $query=$this->db->query("SELECT * FROM userLogin");
						$query->result_array();
						return $query->result_array(); */
                }
                else
                {
                        echo('Invalid entries!!');
						echo validation_errors();
                }
		 }
		 
		 public function canLogin($username=NULL,$password){
			 $this->db->select("username,password");
			 $whereCondition = $array = array('username' =>$username,'password'=>$password);
			 $this->db->where($whereCondition);
			 $this->db->from('user_login');
			 $query = $this->db->get();
			 return $query;
			 
			 
			/*  if($query->num_rows() > 0){
				 
				 return true;
			 }
			 else{
				 
				 return false;
			 }
			  */
		 }
		
		
		
		
	}































?>