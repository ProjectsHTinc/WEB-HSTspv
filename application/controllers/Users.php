<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
		 parent::__construct();
			$this->load->helper("url");
			$this->load->library('session');
			$this->load->model('usermodel');
	}

	
	public function admin()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1){
			$datas['proof_type'] = $this->usermodel->get_proof_type();
			$datas['user_result'] = $this->usermodel->get_admin_users();
			$this->load->view('admin/header');
			$this->load->view('admin/user_admin',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function admin_checkemail(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1){
				$email=$this->input->post('email');
				$datas['res']=$this->usermodel->checkemail(strtoupper($email));
		}else{
			redirect(base_url().'admin/');
		}
	}

	public function admin_checkphone(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1){
				$phone=$this->input->post('phone');
				$datas['res']=$this->usermodel->checkphone($phone);
		}else{
			redirect(base_url().'admin/');
		}
	}

	
	public function add_admin_user()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1){
			 $name = $this->input->post('name');
			 $email = $this->input->post('email');
			 $phone = $this->input->post('phone');
			 $gender = $this->input->post('gender');
			 $qualification = $this->input->post('qualification');
			 $idProoftype = $this->input->post('idProoftype');
			 
			$idFile = $_FILES["idFile"]["name"];
			if(empty($idFile)){
				$fileName='';
			}else{
				$temp = pathinfo($idFile, PATHINFO_EXTENSION);
				$fileName = 'proof_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/users/';
				$id = $uploaddir.$fileName;
				move_uploaded_file($_FILES['idFile']['tmp_name'], $id);
			}

			$profilePic = $_FILES["profilePic"]["name"];
			if(empty($profilePic)){
				$PicName='';
			}else{
				$temp1 = pathinfo($profilePic, PATHINFO_EXTENSION);
				$PicName = 'profile_'.round(microtime(true)) . '.' . $temp1;
				$uploaddir = 'assets/users/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['profilePic']['tmp_name'], $coverpic);
			}
			$address = $this->input->post('address');
			$status = $this->input->post('nStatus');
			$data = $this->usermodel->add_admin_user($name,$email,$phone,$gender,$qualification,$idProoftype,$fileName,$PicName,$address,$status,$user_id);
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'users/admin/');
			}
			else {
				redirect(base_url().'users/admin/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function admin_user_details()
	{
		$datas=$this->session->userdata();
		
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$staff_id=base64_decode($this->uri->segment(3))/98765;
		
		$datas['proof_type'] = $this->usermodel->get_proof_type();
		$datas['res']=$this->usermodel->admin_user_details($staff_id);

		if($user_type==1){
			$this->load->view('admin/header');
			$this->load->view('admin/user_admin_details',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}

	public function admin_checkemail_edit(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1 || $user_type==2){
				$staff_id=base64_decode($this->uri->segment(3))/98765;
				$email=$this->input->post('email');
				$datas['res']=$this->usermodel->admin_checkemail_edit($email,$staff_id);
		}else{
			redirect(base_url().'admin/');
		}
	}

	public function admin_checkphone_edit(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1 || $user_type==2){
				$staff_id=base64_decode($this->uri->segment(3))/98765;
				$phone=$this->input->post('phone');
				$datas['res']=$this->usermodel->admin_checkphone_edit($phone,$staff_id);
		}else{
			redirect(base_url().'admin/');
		}
	}

	public function update_admin_user(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');

		if($user_type==1){
			$staff_id= $this->input->post('staff_id');
			$user_old_pic=$this->input->post('user_old_pic');
			$user_old_file=$this->input->post('user_old_file');
			
			 $name = $this->input->post('name');
			 $email = $this->input->post('email');
			 $phone = $this->input->post('phone');
			 $gender = $this->input->post('gender');
			 $qualification = $this->input->post('qualification');
			 $idProoftype = $this->input->post('idProoftype');
			 
			$idFile = $_FILES["idFile"]["name"];
			if(empty($idFile)){
				$fileName=$user_old_file;
			}else{
				$temp = pathinfo($idFile, PATHINFO_EXTENSION);
				$fileName = 'proof_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/users/';
				$id = $uploaddir.$fileName;
				move_uploaded_file($_FILES['idFile']['tmp_name'], $id);
			}

			$profilePic = $_FILES["profilePic"]["name"];
			if(empty($profilePic)){
				$PicName=$user_old_pic;
			}else{
				$temp1 = pathinfo($profilePic, PATHINFO_EXTENSION);
				$PicName = 'profile_'.round(microtime(true)) . '.' . $temp1;
				$uploaddir = 'assets/users/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['profilePic']['tmp_name'], $coverpic);
			}
			$address = $this->input->post('address');
			$status = $this->input->post('nStatus');
			$data = $this->usermodel->update_admin_user($staff_id,$name,$email,$phone,$gender,$qualification,$idProoftype,$fileName,$PicName,$address,$status,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'users/admin/');
			}
			else {
				redirect(base_url().'users/admin/');
			}
	 } else {
			redirect(base_url().'admin/');
	 }
	}
	
}
