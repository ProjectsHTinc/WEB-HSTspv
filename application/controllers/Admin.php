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

		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
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
		
		$user_name=$this->input->post('user_name');
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

	
	public function dashboard()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			//$datas['res'] = $this->adminmodel->dashboard();
			$this->load->view('admin/header');
			//$this->load->view('dashboard',$datas);
			$this->load->view('admin/dashboard');
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function profile(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['res'] = $this->adminmodel->profile($user_id);
			$this->load->view('admin/header');
			$this->load->view('profile',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url());
		}
	}

	public function profile_update(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');

		if($user_type==1 || $user_type==2){
			$user_id= $this->input->post('user_id');
			$name=$this->input->post('name');
			$address= $this->db->escape_str($this->input->post('address'));
			$phone=$this->input->post('phone');
			$email=$this->input->post('email');
			$gender=$this->input->post('gender');
			$user_old_pic=$this->input->post('user_old_pic');
			$profilepic = $_FILES['profile_pic']['name'];
			
			if(empty($profilepic)){
				$staff_prof_pic=$user_old_pic;
			}else{
				$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
				$staff_prof_pic = round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/users/';
				$profilepic = $uploaddir.$staff_prof_pic;
				move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profilepic);
			}
			
			$datas=$this->adminmodel->profile_update(strtoupper($name),strtoupper($address),$phone,strtoupper($email),$gender,$staff_prof_pic,$user_id);

			if($datas['status']=="success"){
				$this->session->set_flashdata('msg', 'Profile Updated');
				redirect(base_url().'login/profile');
			}else{
				$this->session->set_flashdata('msg', 'Failed');
				redirect(base_url().'login/profile');
			}
	 } else {
			redirect(base_url());
	 }
	}

	public function password(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['res'] = $this->adminmodel->profile($user_id);
			$this->load->view('admin/header');
			$this->load->view('password',$datas);
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
				$datas['res']=$this->adminmodel->check_password_match(strtoupper($old_password),$user_id);
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
				$datas=$this->adminmodel->password_update(strtoupper($new_password),$user_id,$user_type);

				if($datas['status']=="success"){
					$this->session->set_flashdata('msg', 'Your password has been reset.');
					redirect(base_url().'login/password');
				}else{
					$this->session->set_flashdata('msg', 'Failed to Update');
					redirect(base_url().'login/password');
				}
				
		}else{
			redirect(base_url());
		}
	}
	
	
	public function logout(){
		$datas=$this->session->userdata();
		$this->session->unset_userdata($datas);
		$this->session->sess_destroy();
		redirect(base_url().'admin/');
	}

}
