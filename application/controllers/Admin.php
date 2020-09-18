<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		 parent::__construct();
			$this->load->helper("url");
			$this->load->library('session');

			$this->load->model('adminmodel');
	}

	public function index()
	{
			$user_id = $this->session->userdata('user_id');
			$user_type = $this->session->userdata('user_type');
			
			if($user_id){
				redirect(base_url().'admin/dashboard');
			}else{
				$this->load->view('admin/login');
			}
	}

	public function login_check(){
		
		$username=$this->db->escape_str($this->input->post('username'));
		$password=$this->db->escape_str($this->input->post('password'));
		
		$result = $this->adminmodel->login($username,$password);
		
		if($result['status']=='Inactive'){
			$this->session->set_flashdata('msg', 'Account inactive, please contact admin');
			redirect(base_url().'admin/');
		}
	
		if($result['status']=='Error'){
			$this->session->set_flashdata('msg', "Invalid username/passsword. Kindly ensure they're correct.");
			redirect(base_url().'admin/');
		}
		
		if($result['status']=='Active'){
					$email_id = $result['email_id'];
					$name=$result['name'];
					$user_type=$result['user_type'];
					$status=$result['status'];
					$user_id=$result['user_id'];
					$user_pic=$result['user_pic'];
					
					$datas= array("user_name"=>$email_id,"name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
					$session_data=$this->session->set_userdata($datas);
					redirect(base_url().'admin/dashboard');
		}
	}
	
	
	public function forgot_password()
	{
			$user_id = $this->session->userdata('user_id');
			$user_type = $this->session->userdata('user_type');
			
			if($user_id){
				redirect(base_url().'admin/dashboard');
			}else{
				$this->load->view('admin/forgot_password');
			}
	}
	
	public function reset_password(){
		
		$user_name=$this->db->escape_str($this->input->post('user_name'));
		$result = $this->adminmodel->forgot_password($user_name);

		if($result['status']=='Updated'){
			$this->session->set_flashdata('msg', 'Updated');
			redirect(base_url().'admin/forgot_password/');
		}
	
		if($result['status']=='Error'){
			$this->session->set_flashdata('msg', "Error");
			redirect(base_url().'admin/forgot_password/');
		}
	}

	

	
	public function profile(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['res'] = $this->adminmodel->profile($user_id);
			$this->load->view('admin/header');
			$this->load->view('admin/profile',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}

	public function profile_update(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');

		if($user_type==1 || $user_type==2){
			$staff_id= $this->input->post('staff_id');
			$user_old_pic=$this->input->post('user_old_pic');
			
			 $name = $this->input->post('name');
			 $email = $this->input->post('email');
			 $phone = $this->input->post('phone');
			 $gender = $this->input->post('gender');
			 $qualification = $this->input->post('qualification');

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
			
			$data = $this->adminmodel->profile_update($staff_id,$name,$email,$phone,$gender,$qualification,$PicName,$address,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'admin/profile/');
			}
			else {
				redirect(base_url().'admin/profile/');
			}
	 } else {
			redirect(base_url().'admin/');
	 }
	}


	public function changepassword(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['res'] = $this->adminmodel->profile($user_id);
			$this->load->view('admin/header');
			$this->load->view('admin/change_password',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url());
		}
	}
	
	public function check_password_match(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
				$user_id  = $this->uri->segment(3);
				$old_password=$this->input->post('old_password');
				$datas['res']=$this->adminmodel->check_password_match($old_password,$user_id);
		}else{
			redirect('/');
		}
	}

	public function password_update(){
		$datas = $this->session->userdata();
		 $user_id = $this->session->userdata('user_id');
		 $user_type=$this->session->userdata('user_type');
		
		
		if($user_type==1 || $user_type==2){
			
				$new_password=$this->input->post('new_password');
				$data=$this->adminmodel->password_update($new_password,$user_id,$user_type);

				$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
				$this->session->set_flashdata('alert', $response_messge);
				
				$status = $data['status'];

				if ($status == 'success'){
					redirect(base_url().'admin/changepassword/');
				}
				else {
					redirect(base_url().'admin/changepassword/');
				}
				
		}else{
			redirect(base_url());
		}
	}
	
	public function dashboard()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['widgets_count'] = $this->adminmodel->dashboard_widgets();
			$datas['user_list'] = $this->adminmodel->dashboard_user_admin();
			$datas['query_list'] = $this->adminmodel->dashboard_enquiry();
			$datas['gallery_list'] = $this->adminmodel->dashboard_gallery();
			$this->load->view('admin/header');
			$this->load->view('admin/dashboard',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function logout(){
		$datas=$this->session->userdata();
		$this->session->unset_userdata($datas);
		$this->session->sess_destroy();
		redirect(base_url().'admin/');
	}
	
	

}
