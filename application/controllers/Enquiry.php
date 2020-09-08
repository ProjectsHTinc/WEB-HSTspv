<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {

	function __construct() {
		 parent::__construct();
			$this->load->helper("url");
			$this->load->library('session');
			$this->load->model('enquirymodel');
	}


	public function enquiry_latest()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['latest_enquiry'] = $this->enquirymodel->latest_enquiry();
			$this->load->view('admin/header');
			$this->load->view('admin/enquiry_latest',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function enquiry_history()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['list_enquiry'] = $this->enquirymodel->enquiry_history();
			$this->load->view('admin/header');
			$this->load->view('admin/enquiry_history',$datas);
			$this->load->view('admin/footer');

		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function enquiry_details($enq_user_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['list_enquiry'] = $this->enquirymodel->enquiry_details($enq_user_id);

			$this->load->view('admin/header');
			$this->load->view('admin/enquiry_details',$datas);
			$this->load->view('admin/footer');

		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	
	public function enquiry_update()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			
			 $chat_for = $this->input->post('chat_for');
			 $enqReply = $this->input->post('enqReply');

			$datas = $this->enquirymodel->enquiry_update($chat_for,$enqReply,$user_id);
			$response_messge = array('status'=>$datas['status'],'text' => $datas['text'],'class' => $datas['class']);		
			$this->session->set_flashdata('alert', $response_messge);
			
			if($datas['status']=="success"){
				redirect($datas['url']);
			}else{
				redirect($datas['url']);
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
}
