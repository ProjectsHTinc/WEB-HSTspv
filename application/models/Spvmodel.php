<?php
Class Spvmodel extends CI_Model
{
	public function __construct()
	{
	  parent::__construct();
		$this->load->model('mailmodel');
		$this->load->model('smsmodel');
		$this->load->model('notificationmodel');
	}

	function get_spvlife(){
		$query="SELECT * FROM `spv_personal_life` WHERE `id` = '1'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	
	function update_spvlife($nfId,$eDeatil,$tDeatil,$user_id){
		
		$id=base64_decode($nfId)/98765;

		$query="UPDATE spv_personal_life SET personal_life_text_ta='$tDeatil',personal_life_text_en='$eDeatil',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Personal life Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_spvpolitical(){
		$query="SELECT * FROM `spv_political_career` WHERE `id` = '1'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_spvpolitical($nfId,$eDeatil,$tDeatil,$user_id){
		
		$id=base64_decode($nfId)/98765;

		$query="UPDATE spv_political_career SET political_career_text_ta='$tDeatil',political_career_text_en='$eDeatil',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Personal life Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_positions(){
		$query="SELECT * FROM `spv_position_held`";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function add_positions($eTitle,$tTitle,$eDeatil,$tDeatil,$nStatus,$user_id){
		$query="INSERT INTO spv_position_held (title_ta,title_en,position_text_ta,position_text_en,status,created_by,created_at) VALUES ('$tTitle','$eTitle','$tDeatil','$eDeatil','$nStatus','$user_id',NOW())";
		$result=$this->db->query($query);
		$last_id=$this->db->insert_id();

		if($result){
			$data=array("status"=>"success","text"=>"Position Added Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_positions_details($position_id){
		$id=base64_decode($position_id)/98765;
		$query="SELECT * FROM `spv_position_held` WHERE id = '$id'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_positions($pId,$eTitle,$tTitle,$eDeatil,$tDeatil,$nStatus,$user_id){
		
		$id=base64_decode($pId)/98765;

		$query="UPDATE spv_position_held SET title_ta='$tTitle',title_en='$eTitle',position_text_ta='$tDeatil',position_text_en='$eDeatil',status='$nStatus',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Position Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_awards(){
		$query="SELECT * FROM `spv_awards`";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function get_awards_description(){
		$query="SELECT * FROM `spv_awards_description` WHERE id ='1'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function add_award($eDesc,$tDesc,$nfDate,$eDeatil,$tDeatil,$nStatus,$user_id){
		
		$query="UPDATE spv_awards_description SET awards_text_ta='$tDesc',awards_text_en='$eDesc',updated_at=NOW(),updated_by='$user_id' WHERE id ='1'";
		$result=$this->db->query($query);
		
		$query="INSERT INTO spv_awards (awards_date,awards_text_ta,awards_text_en,status,created_by,created_at) VALUES ('$nfDate','$tDeatil','$eDeatil','$nStatus','$user_id',NOW())";
		$result=$this->db->query($query);
		$last_id=$this->db->insert_id();

		if($result){
			$data=array("status"=>"success","text"=>"Award Added Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_award_details($award_id){
		$id=base64_decode($award_id)/98765;
		$query="SELECT * FROM `spv_awards` WHERE id = '$id'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_award($eDesc,$tDesc,$aId,$nfDate,$eDeatil,$tDeatil,$nStatus,$user_id){
		
		$id=base64_decode($aId)/98765;

		$query="UPDATE spv_awards_description SET awards_text_ta='$tDesc',awards_text_en='$eDesc',updated_at=NOW(),updated_by='$user_id' WHERE id ='1'";
		$result=$this->db->query($query);
		
		$query="UPDATE spv_awards SET awards_date ='$nfDate' ,awards_text_ta='$tDeatil',awards_text_en='$eDeatil',status='$nStatus',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Award Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	
	function get_notableworks(){
		$query="SELECT * FROM `spv_noteable_works`";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function add_notableworks($eTitle,$tTitle,$eDeatil,$tDeatil,$nStatus,$user_id){
		$query="INSERT INTO spv_noteable_works (title_ta,title_en,noteable_text_ta,noteable_text_en,status,created_by,created_at) VALUES ('$tTitle','$eTitle','$tDeatil','$eDeatil','$nStatus','$user_id',NOW())";
		$result=$this->db->query($query);
		$last_id=$this->db->insert_id();

		if($result){
			$data=array("status"=>"success","text"=>"Notableworks Added Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_notableworks_details($notableworks_id){
		$id=base64_decode($notableworks_id)/98765;
		$query="SELECT * FROM `spv_noteable_works` WHERE id = '$id'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_notableworks($pId,$eTitle,$tTitle,$eDeatil,$tDeatil,$nStatus,$user_id){
		
		$id=base64_decode($pId)/98765;

		$query="UPDATE spv_noteable_works SET title_ta='$tTitle',title_en='$eTitle',noteable_text_ta='$tDeatil',noteable_text_en='$eDeatil',status='$nStatus',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Notableworks Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_namakkaga(){
		$query="SELECT * FROM `spv_namakkaga_initiatives` WHERE `id` = '1'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	
	function update_namakkaga($nfId,$eDeatil,$tDeatil,$PicName,$user_id){
		
		$id=base64_decode($nfId)/98765;

		$sQuery = "SELECT * FROM spv_namakkaga_initiatives WHERE id = '$id'";
		$result = $this->db->query($sQuery);
		if($result->num_rows()>0)
		{
			foreach ($result->result() as $rows)
			{
				$cover_image = $rows->namakkaga_banner;
			}
		}
		if ($PicName != $cover_image ){
			$file_to_delete = 'assets/namakkaga/'.$cover_image;
			unlink($file_to_delete);
		}
		
		$query="UPDATE spv_namakkaga_initiatives SET namakkaga_banner = '$PicName',namakkaga_text_ta='$tDeatil',namakkaga_text_en='$eDeatil',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Namakkaga Initiatives Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_ias_academy(){
		$query="SELECT * FROM `amma_ias_academy` WHERE `id` = '1'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
		function get_ias_cources(){
		$query="SELECT * FROM `amma_ias_academy_course`";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	
	function update_ias_academy($nfId,$eDeatil,$tDeatil,$PicName,$user_id){
		
		$id=base64_decode($nfId)/98765;

		$sQuery = "SELECT * FROM amma_ias_academy WHERE id = '$id'";
		$result = $this->db->query($sQuery);
		if($result->num_rows()>0)
		{
			foreach ($result->result() as $rows)
			{
				$cover_image = $rows->academy_banner;
			}
		}
		if ($PicName != $cover_image ){
			$file_to_delete = 'assets/ias_academy/'.$cover_image;
			unlink($file_to_delete);
		}
		
		$query="UPDATE amma_ias_academy SET academy_banner = '$PicName',academy_text_ta='$tDeatil',academy_text_en='$eDeatil',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Amma IAS Academy Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function add_cource($eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$user_id){
		$query="INSERT INTO amma_ias_academy_course (course_title_ta,course_title_en,course_details_ta,course_details_en,course_image,status,created_by,created_at) VALUES ('$tTitle','$eTitle','$tDeatil','$eDeatil','$PicName','$nStatus','$user_id',NOW())";
		$result=$this->db->query($query);
		$last_id=$this->db->insert_id();

		if($result){
			$data=array("status"=>"success","text"=>"Course Added Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}

	function get_cource_details($cource_id){
		$id=base64_decode($cource_id)/98765;
		$query="SELECT * FROM amma_ias_academy_course WHERE id = '$id'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_cource($nfId,$eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$user_id){
		
		$id=base64_decode($nfId)/98765;
		
		$sQuery = "SELECT * FROM amma_ias_academy_course WHERE id = '$id'";
		$result = $this->db->query($sQuery);
		if($result->num_rows()>0)
		{
			foreach ($result->result() as $rows)
			{
				$cover_image = $rows->course_image;
			}
		}
		if ($PicName != $cover_image ){
			$file_to_delete = 'assets/ias_academy/'.$cover_image;
			unlink($file_to_delete);
		}

		$query="UPDATE amma_ias_academy_course SET course_title_ta='$tTitle',course_title_en='$eTitle',course_details_ta='$tDeatil', course_details_en='$eDeatil',course_image='$PicName',status='$nStatus',status='$nStatus',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Course Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_socialmedia(){
		$query="SELECT * FROM social_media";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_socialmedia($sValues){
		
		$j = 1;
		for($i=0;$i<=count($sValues)-1;$i++)
		{		
			$query="UPDATE social_media SET sm_url ='$sValues[$i]' WHERE id = '$j'";
			$result=$this->db->query($query);
			$j++;
		}
		if($result){
			$data=array("status"=>"success","text"=>"Social Media Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data; 
	}
}
?>
