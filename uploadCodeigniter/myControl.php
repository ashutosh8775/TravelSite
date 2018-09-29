<?php
class MyControl extends CI_Controller {

        public function index()
        {
                 $this->load->model('myModel');
				 $data['records']=$this->myModel->display();
				 $this->load->view('form',$data);

        }
		public function modelTest()
        { 
		        
                $this->load->model('myModel');
				
				$data['records']=$this->myModel->add();
				//$this->load->view('form',$data);				
				
        }
		public function deleteRow($id){
			$this->load->database();
			$this->db->where('id', $id);
			$this->db->delete('user');
		}
		public function fetchData($id){
			$this->load->model('myModel');
			$fetched_data = $this->myModel->getData($id);
			echo json_encode($fetched_data);
		}
		public function updateRow($id){
			$this->load->model('myModel');
			$this->myModel->Update($id);
		}
		
		 public function ajaxDisplay(){
			 $result=array('data'=>array());
			 $this->load->model('myModel');
			 $data= $this->myModel->getAllRecords();
			 foreach($data as $key=>$value){
				 
				$delete_btn = '<input type="button" class="btn btn-primary" name="delete" value="delete" id="delete_btn" onclick="delete_record('.$value['id'].')">';
				$update_btn = '<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateMember" name="update" value="update" id="update_btn" onclick="get_record('.$value['id'].')">';
				 
				 
				 
				$result['data'][$key]=array(
				$value['id'],
				$value['username'],
				$value['company'],
				$delete_btn,
				$update_btn
				);  
			 }
			 echo json_encode($result);
			 
			 
			 
		 }
}
?>