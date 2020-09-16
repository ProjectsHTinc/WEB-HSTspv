<?php
Class Partymodel extends CI_Model
{
	public function __construct()
	{
	  parent::__construct();
		$this->load->model('mailmodel');
		$this->load->model('smsmodel');
		$this->load->model('notificationmodel');
	}

	function get_party_history(){
		$query="SELECT * FROM `about_party` WHERE `id` = '1'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_party_history($nfId,$eDeatil,$tDeatil,$PicName,$user_id){
		
		$id=base64_decode($nfId)/98765;
		
		$sQuery = "SELECT * FROM about_party WHERE id = '$id'";
		$result = $this->db->query($sQuery);
		if($result->num_rows()>0)
		{
			foreach ($result->result() as $rows)
			{
				$cover_image = $rows->party_banner;
			}
		}
		if ($PicName != $cover_image ){
			$file_to_delete = 'assets/party/'.$cover_image;
			unlink($file_to_delete);
		}

		$query="UPDATE about_party SET history_ta='$tDeatil', history_en='$eDeatil',party_banner='$PicName',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"History Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	
	
	function update_party_ideology($nfId,$eDeatil,$tDeatil,$user_id){
		
		$id=base64_decode($nfId)/98765;

		$query="UPDATE about_party SET ideology_ta='$tDeatil', ideology_en='$eDeatil',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Ideology Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_party_election(){
		$query="SELECT * FROM `party_election_info`";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function add_election($leaderTa,$leaderEn,$eYear,$nSeats,$nStatus,$user_id){
		$query="INSERT INTO party_election_info (election_year,party_leader_ta,party_leader_en,seats_won,status,created_by,created_at) VALUES ('$eYear','$leaderTa','$leaderEn','$nSeats','$nStatus','$user_id',NOW())";
		$result=$this->db->query($query);
		$last_id=$this->db->insert_id();

		if($result){
			$data=array("status"=>"success","text"=>"Election Details Added Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function election_details($election_id){
		$id=base64_decode($election_id)/98765;
		$query="SELECT * FROM `party_election_info` WHERE id = '$id'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_election($elect_id,$leaderTa,$leaderEn,$eYear,$nSeats,$nStatus,$user_id){
		$id=base64_decode($elect_id)/98765;
		$query="UPDATE party_election_info SET election_year='$eYear',party_leader_ta='$leaderTa',party_leader_en='$leaderEn',seats_won='$nSeats',status='$nStatus',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"Election Details Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
}
?>
