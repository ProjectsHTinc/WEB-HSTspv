<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Party extends CI_Controller {

	function __construct() {
		 parent::__construct();
			$this->load->helper("url");
			$this->load->library('session');
			$this->load->model('partymodel');
	}

	public function history()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->partymodel->get_party_history();
			$this->load->view('admin/header');
			$this->load->view('admin/party_history',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}

	public function update_history()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){

			 $nfId = $this->input->post('nfId');
			 $old_banner = $this->input->post('old_banner');
			 //$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $coverImage = $_FILES["coverImage"]["name"];
					 
			if(empty($coverImage)){
				$PicName= $old_banner;
			}else{
				$temp = pathinfo($coverImage, PATHINFO_EXTENSION);
				$PicName = round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/party/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverpic);
			}
			
			$data = $this->partymodel->update_party_history($nfId,$eDeatil,$tDeatil,$PicName,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'party/history/');
			}
			else {
				redirect(base_url().'party/history/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function ideology()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->partymodel->get_party_history();
			$this->load->view('admin/header');
			$this->load->view('admin/party_ideology',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function update_ideology()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){

			 $nfId = $this->input->post('nfId');
			 //$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			
			$data = $this->partymodel->update_party_ideology($nfId,$eDeatil,$tDeatil,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'party/ideology/');
			}
			else {
				redirect(base_url().'party/ideology/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function election()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->partymodel->get_party_election();
			$this->load->view('admin/header');
			$this->load->view('admin/party_election',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function add_election()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			 $leaderTa = $this->input->post('leaderTa');
			 $leaderEn = $this->input->post('leaderEn');
			 $eYear = $this->input->post('eYear');
			 $nSeats = $this->input->post('nSeats');
			 $nStatus = $this->input->post('nStatus');
			 
			$data = $this->partymodel->add_election($leaderTa,$leaderEn,$eYear,$nSeats,$nStatus,$user_id);
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'party/election/');
			}
			else {
				redirect(base_url().'party/election/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function election_details($election_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->partymodel->election_details($election_id);
			$this->load->view('admin/header');
			$this->load->view('admin/party_election_edit',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function update_election()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			 $elect_id = $this->input->post('elect_id');
			 $leaderTa = $this->input->post('leaderTa');
			 $leaderEn = $this->input->post('leaderEn');
			 $eYear = $this->input->post('eYear');
			 $nSeats = $this->input->post('nSeats');
			 $nStatus = $this->input->post('nStatus');
			 
			$data = $this->partymodel->update_election($elect_id,$leaderTa,$leaderEn,$eYear,$nSeats,$nStatus,$user_id);
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'party/election/');
			}
			else {
				redirect(base_url().'party/election/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
}
