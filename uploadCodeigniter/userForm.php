<?php 
	
	class UserForm extends CI_controller{
		 // public function __construct()
        // {
                // $this->load->database();
				// $this->load->helper('url');
				// $this->load->helper('form');
				// $this->load->library('form_validation');
        // }
		public function index(){
			$this->load->view('login');
			$this->load->database();
				$this->load->helper('url');
				$this->load->helper('form');
				$this->load->library('form_validation');
		}
		
		public function registration(){
			$this->load->view('signUp');
		}
		
		public function submitData(){
			$this->load->model('userModel');
			/* $data['records']= */
			$this->userModel->userDetail();	
		}
		
		public function loginValidation(){
			
			$this->load->library('form_validation');
			$username= trim($this->input->post('username'));
  $password= trim($this->input->post('password'));
			$this->load->model('userModel');
				$query=$this->userModel->canLogin($username,$password);
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|callback_validateUser[' . $query->num_rows() . ']');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			
			if ($this->form_validation->run()){
				$username=$this->input->post('username');
				$password=$this->input->post('password');
				
				
				
				if($query){
					$query = $query->result();
					$user_data = array(
							'username' => $query[0]->username,
							'password' => $query[0]->password,
					);
					
					//print_r($user_data);
					$this->session->set_userdata($user_data);
					redirect('http://localhost/CodeIgniterTut/index.php/userForm/enter', 'refresh');
				}
				else{
					
					$this->session->set_flashdata('error', 'Invalid username and password');
				}
			}
			else{
				
				echo "invalid";
			}			
		}
		
		public function enter(){
			if($this->session->userdata('username')!= ''){
				
				echo 'Welcome';
				echo '<a href="http://localhost/CodeIgniterTut/index.php/userForm/logout">Logout</a>';
			}
			else{
				echo 'try again';
			}
		}
		
		public function logout(){
			$this-> session->unset_userdata('username');
			redirect('http://localhost/CodeIgniterTut/index.php/userForm/', 'refresh');
			
		}
		public function validateUser($userName,$recordCount){
  if ($recordCount != 0){
   return TRUE;
  }else{
   $this->form_validation->set_message('validateUser', 'Invalid %s or Password');
   return FALSE;
  }
 }

	}
?>