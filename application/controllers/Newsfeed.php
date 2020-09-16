<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsfeed extends CI_Controller {

	function __construct() {
		 parent::__construct();
			$this->load->helper("url");
			$this->load->library('session');
			$this->load->model('newsfeedmodel');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
			
		if($user_type==1 || $user_type==2){
			$datas['categories'] = $this->newsfeedmodel->get_categories();
			$this->load->view('admin/header');
			$this->load->view('admin/add_newsfeed',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}

	public function add_news()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			
			 $nfCategory = $this->input->post('nfCategory');
			 $newsDate = $this->input->post('nfDate');
			 $nfDate = date("Y-m-d", strtotime($newsDate));
			 $nfProfile = $this->input->post('nfProfile');
			 $vToken = $this->input->post('vToken');
			 $eTitle = $this->input->post('eTitle');
			 $tTitle = $this->input->post('tTitle');
			 $eDeatil = $this->input->post('eDeatil');
			 $tDeatil = $this->input->post('tDeatil');
			 $coverImage = $_FILES["coverImage"]["name"];
			if(empty($coverImage)){
				$PicName='';
			}else{
				$temp = pathinfo($coverImage, PATHINFO_EXTENSION);
				$PicName = round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/news_feed/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverpic);
			}
			$nStatus = $this->input->post('nStatus');
			$notification = $this->input->post('notification');

			$data = $this->newsfeedmodel->add_newsfeed($nfCategory,$nfDate,$nfProfile,$vToken,$eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$notification,$user_id);
			//$notification = $this->newsfeedmodel->send_notification($nfCategory,$nfDate,$nfProfile,$vToken,$eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$user_id);
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'newsfeed/list_news/');
			}
			else {
				redirect(base_url().'newsfeed/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function list_news()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			$datas['list_news'] = $this->newsfeedmodel->get_newsfeed();
			$this->load->view('admin/header');
			$this->load->view('admin/list_newsfeed',$datas);
			$this->load->view('admin/footer');

		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function edit_news($news_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');

		if($user_type==1 || $user_type==2){
			$datas['categories'] = $this->newsfeedmodel->get_categories();
			$datas['news_details'] = $this->newsfeedmodel->get_newsfeed_details($news_id);

			$this->load->view('admin/header');
			$this->load->view('admin/edit_newsfeed',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	
	public function update_news()
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		
		if($user_type==1 || $user_type==2){
			
			 $nfId = $this->input->post('news_id');
			 $old_news_pic = $this->input->post('old_news_pic');
			 $nfCategory = $this->input->post('nfCategory');
			 $newsDate = $this->input->post('nfDate');
			 $nfDate = date("Y-m-d", strtotime($newsDate));
			 $nfProfile = $this->input->post('nfProfile');
			 if ($nfProfile == 'I'){
				$vToken = "";
			}else {
				$vToken = $this->input->post('vToken');
			}
			 $eTitle = $this->input->post('eTitle');
			 $tTitle = $this->input->post('tTitle');
			 $eDeatil = $this->input->post('eDeatil');
			 $tDeatil = $this->input->post('tDeatil');
			 $coverImage = $_FILES["coverImage"]["name"];
					 
			if(empty($coverImage)){
				$PicName= $old_news_pic;
			}else{
				$temp = pathinfo($coverImage, PATHINFO_EXTENSION);
				$PicName = round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/news_feed/';
				$coverpic = $uploaddir.$PicName;
				move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverpic);
			}
			$nStatus = $this->input->post('nStatus');

			
			$data = $this->newsfeedmodel->update_newsfeed($nfId,$nfCategory,$nfDate,$nfProfile,$vToken,$eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$user_id);
			
			$response_messge = array('status'=>$data['status'],'text' => $data['text'],'class' => $data['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			$status = $data['status'];

			if ($status == 'success'){
				redirect(base_url().'newsfeed/list_news/');
			}
			else {
				redirect(base_url().'newsfeed/list_news/');
			}
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function news_gallery($news_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');

		if($user_type==1 || $user_type==2){
			$datas['res'] = $this->newsfeedmodel->get_newsfeed_details($news_id);
			$datas['res_img'] = $this->newsfeedmodel->get_newsfeed_gallery($news_id);
			$this->load->view('admin/header');
			$this->load->view('admin/news_gallery',$datas);
			$this->load->view('admin/footer');
		}else {
			redirect(base_url().'admin/');
		}
	}
	
	public function add_update_gallery(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
				if($user_type=='1' || $user_type=='2'){
				
				$news_id=$this->input->post('news_id');
				$name_array = $_FILES['news_photos']['name'];
				$tmp_name_array = $_FILES['news_photos']['tmp_name'];
				$count_tmp_name_array = count($tmp_name_array);
				$static_final_name = time();
				for($i = 0; $i < $count_tmp_name_array; $i++){
					$extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
					$file_name[]=$static_final_name.$i.".".$extension;
					move_uploaded_file($tmp_name_array[$i], "assets/news_feed/".$static_final_name.$i.".".$extension);
				}
			
			$datas = $this->newsfeedmodel->create_gallery($news_id,$file_name,$user_id);
			$response_messge = array('status'=>$datas['status'],'text' => $datas['text'],'class' => $datas['class']);
			$this->session->set_flashdata('alert', $response_messge);
			
			if($datas['status']=="success"){
				redirect($datas['url']);
			
			}else if($datas['status']=="limit"){
				redirect($datas['url']);
			}else{
				redirect($datas['url']);
			}
		 }
		 else{
				redirect(base_url().'admin/');
		 }
	}
	
	public function delete_nfgallery(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
			if($user_type=='1' || $user_type=='2'){
				$news_gal_id=$this->input->post('news_gal_id');
				$datas['res']=$this->newsfeedmodel->delete_gal($news_gal_id);
		}else{
			redirect(base_url().'admin/');
		}
	}
	
}
