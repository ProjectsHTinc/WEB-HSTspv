<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spv extends CI_Controller {

	function __construct() {
		 parent::__construct();
			$this->load->helper("url");
			$this->load->library('session');
			$this->load->model('spvmodel');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_spvlife();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_life',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}

	public function update_spvlife()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){

			$nfId = $this->input->post('spv_id');
			 //$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));

			$data = $this->spvmodel->update_spvlife($nfId,$eDeatil,$tDeatil,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/');
			}
			else {
				redirect(base_url().'spv/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function political()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_spvpolitical();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_political',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}

	public function update_political()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){

			$nfId = $this->input->post('spv_id');
			//$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));

			$data = $this->spvmodel->update_spvpolitical($nfId,$eDeatil,$tDeatil,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/political/');
			}
			else {
				redirect(base_url().'spv/political/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function position()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_positions();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_positions',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function add_positions()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			 //$eTitle = $this->input->post('eTitle');
			  $eTitle = $this->db->escape_str($this->input->post('eTitle'));
			 //$tTitle = $this->input->post('tTitle');
			  $tTitle = $this->db->escape_str($this->input->post('tTitle'));
			 //$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $nStatus = $this->input->post('nStatus');
			 
			$data = $this->spvmodel->add_positions($eTitle,$tTitle,$eDeatil,$tDeatil,$nStatus,$user_id);
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/position/');
			}
			else {
				redirect(base_url().'spv/position/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function position_details($position_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_positions_details($position_id);
			$this->load->view('admin/header');
			$this->load->view('admin/spv_positions_details',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function update_positions()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			 $pId = $this->input->post('pos_id');
			//$eTitle = $this->input->post('eTitle');
			  $eTitle = $this->db->escape_str($this->input->post('eTitle'));
			 //$tTitle = $this->input->post('tTitle');
			  $tTitle = $this->db->escape_str($this->input->post('tTitle'));
			 //$eDeatil = $this->input->post('eDeatil');
			//$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $nStatus = $this->input->post('nStatus');
			 
			$data = $this->spvmodel->update_positions($pId,$eTitle,$tTitle,$eDeatil,$tDeatil,$nStatus,$user_id);
	
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/position/');
			}
			else {
				redirect(base_url().'spv/position/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function awards()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_awards();
			$datas['desc_result'] = $this->spvmodel->get_awards_description();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_awards',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function add_award()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			 //$eDesc = $this->input->post('eDesc');
			 $eDesc = $this->db->escape_str($this->input->post('eDesc'));
			// $tDesc = $this->input->post('tDesc');
			 $tDesc = $this->db->escape_str($this->input->post('tDesc'));
			 $newsDate = $this->input->post('nfDate');
			 $nfDate = date("Y-m-d", strtotime($newsDate));
			 //$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $nStatus = $this->input->post('nStatus');
			 
			$data = $this->spvmodel->add_award($eDesc,$tDesc,$nfDate,$eDeatil,$tDeatil,$nStatus,$user_id);
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/awards/');
			}
			else {
				redirect(base_url().'spv/awards/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function award_details($award_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_award_details($award_id);
			$datas['desc_result'] = $this->spvmodel->get_awards_description();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_awards_details',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function update_award()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			 $aId = $this->input->post('award_id');
			  //$eDesc = $this->input->post('eDesc');
			 $eDesc = $this->db->escape_str($this->input->post('eDesc'));
			// $tDesc = $this->input->post('tDesc');
			 $tDesc = $this->db->escape_str($this->input->post('tDesc'));
			 $newsDate = $this->input->post('nfDate');
			 $nfDate = date("Y-m-d", strtotime($newsDate));
			//$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $nStatus = $this->input->post('nStatus');
			 
			$data = $this->spvmodel->update_award($eDesc,$tDesc,$aId,$nfDate,$eDeatil,$tDeatil,$nStatus,$user_id);

			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/awards/');
			}
			else {
				redirect(base_url().'spv/awards/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function notableworks()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_notableworks();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_notableworks',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function add_notableworks()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			 //$eTitle = $this->input->post('eTitle');
			  $eTitle = $this->db->escape_str($this->input->post('eTitle'));
			 //$tTitle = $this->input->post('tTitle');
			  $tTitle = $this->db->escape_str($this->input->post('tTitle'));
			//$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $nStatus = $this->input->post('nStatus');
			 
			$data = $this->spvmodel->add_notableworks($eTitle,$tTitle,$eDeatil,$tDeatil,$nStatus,$user_id);
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/notableworks/');
			}
			else {
				redirect(base_url().'spv/notableworks/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function notableworks_details($notableworks_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_notableworks_details($notableworks_id);
			$this->load->view('admin/header');
			$this->load->view('admin/spv_notableworks_details',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function update_notableworks()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			 $pId = $this->input->post('nw_id');
			 //$eTitle = $this->input->post('eTitle');
			  $eTitle = $this->db->escape_str($this->input->post('eTitle'));
			 //$tTitle = $this->input->post('tTitle');
			 $tTitle = $this->db->escape_str($this->input->post('tTitle'));
			 //$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $nStatus = $this->input->post('nStatus');
			 
			$data = $this->spvmodel->update_notableworks($pId,$eTitle,$tTitle,$eDeatil,$tDeatil,$nStatus,$user_id);
	
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/notableworks/');
			}
			else {
				redirect(base_url().'spv/notableworks/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function namakkaga()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_namakkaga();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_namakkaga',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}

	public function update_namakkaga()
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
				$uploaddir = 'assets/namakkaga/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverpic);
			}
			
			$data = $this->spvmodel->update_namakkaga($nfId,$eDeatil,$tDeatil,$PicName,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/namakkaga/');
			}
			else {
				redirect(base_url().'spv/namakkaga/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	


	public function ammaias()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_ias_academy();
			$datas['cources'] = $this->spvmodel->get_ias_cources();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_ias_academy',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	

	public function update_ias_academy()
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
				$uploaddir = 'assets/ias_academy/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverpic);
			}
			
			$data = $this->spvmodel->update_ias_academy($nfId,$eDeatil,$tDeatil,$PicName,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/ammaias/');
			}
			else {
				redirect(base_url().'spv/ammaias/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function ias_cource()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$this->load->view('admin/header');
			$this->load->view('admin/add_ias_cource');
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function add_cource()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			
			 //$eTitle = $this->input->post('eTitle');
			  $eTitle = $this->db->escape_str($this->input->post('eTitle'));
			 //$tTitle = $this->input->post('tTitle');
			  $tTitle = $this->db->escape_str($this->input->post('tTitle'));
			 //$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $coverImage = $_FILES["coverImage"]["name"];
			if(empty($coverImage)){
				$PicName='';
			}else{
				$temp = pathinfo($coverImage, PATHINFO_EXTENSION);
				$PicName = round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/ias_academy/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverpic);
			}
			$nStatus = $this->input->post('nStatus');

			$data = $this->spvmodel->add_cource($eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$user_id);
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/ammaias/');
			}
			else {
				redirect(base_url().'spv/ammaias/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function edit_cource($cource_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');

		if($user_type==1 || $user_type==2){
			$datas['cource_details'] = $this->spvmodel->get_cource_details($cource_id);

			$this->load->view('admin/header');
			$this->load->view('admin/edit_ias_cource',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function update_cource()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			
			 $nfId = $this->input->post('cource_id');
			 $old_cource_pic = $this->input->post('old_cource_pic');
			 //$eTitle = $this->input->post('eTitle');
			  $eTitle = $this->db->escape_str($this->input->post('eTitle'));
			 //$tTitle = $this->input->post('tTitle');
			  $tTitle = $this->db->escape_str($this->input->post('tTitle'));
			//$eDeatil = $this->input->post('eDeatil');
			 $eDeatil = $this->db->escape_str($this->input->post('eDeatil'));
			// $tDeatil = $this->input->post('tDeatil');
			 $tDeatil = $this->db->escape_str($this->input->post('tDeatil'));
			 $coverImage = $_FILES["coverImage"]["name"];
					 
			if(empty($coverImage)){
				$PicName= $old_cource_pic;
			}else{
				$temp = pathinfo($coverImage, PATHINFO_EXTENSION);
				$PicName = round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/ias_academy/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverpic);
			}
			$nStatus = $this->input->post('nStatus');

			
			$data = $this->spvmodel->update_cource($nfId,$eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/ammaias/');
			}
			else {
				redirect(base_url().'spv/ammaias/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function socialmedia()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['result'] = $this->spvmodel->get_socialmedia();
			$this->load->view('admin/header');
			$this->load->view('admin/spv_socialmedia',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function update_socialmedia()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			
			$sValues = $this->input->post('sValues');
			//$sValues = $this->db->escape_str($this->input->post('sValues'));
			$data = $this->spvmodel->update_socialmedia($sValues);

			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'spv/socialmedia/');
			}
			else {
				redirect(base_url().'spv/socialmedia/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
}
