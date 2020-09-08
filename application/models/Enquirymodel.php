<?php
Class Enquirymodel extends CI_Model
{
	public function __construct()
	{
	  parent::__construct();
		$this->load->model('mailmodel');
		$this->load->model('smsmodel');
	}

	
	function latest_enquiry(){
		$query="SELECT B.full_name, A.*  FROM spv_chat A, user_master B WHERE A.chat_for = b.id AND A.admin_seen = 0 ORDER BY A.id DESC";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function enquiry_details($enq_user_id){
		$id=base64_decode($enq_user_id)/98765;
		
		$query="UPDATE spv_chat SET admin_seen ='1' WHERE chat_for ='$id'";
		$result=$this->db->query($query);
		
		$query="SELECT * FROM spv_chat WHERE chat_for = '$id' ORDER BY id";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function enquiry_update($chat_for,$enqReply,$user_id){
		$chat_for_user = base64_encode($chat_for*98765);
		
		$query="INSERT INTO spv_chat (chat_for,chat_text,admin_seen,chat_by,chat_user_id,created_at) VALUES ('$chat_for','$enqReply','1','Admin','$user_id',NOW())";
		$result=$this->db->query($query);
		
		 if ($result) {
				$data=array("status"=>"success","text"=>"Post Added Successfully","class"=>"alert alert-success","url"=>base_url().'enquiry/enquiry_details/'.$chat_for_user);
				return $data;
          } else {
				$data=array("status"=>"failed","text"=>"Post Added Error","class"=>"alert-danger","url"=>base_url().'enquiry/enquiry_details/'.$chat_for_user);
				return $data;
          }
	}
	
	
	function enquiry_history(){
		$query="SELECT
				A.chat_for,
				B.full_name,
				COUNT(A.chat_for) AS post_count
			FROM
				spv_chat A,
				user_master B
			WHERE A.chat_for = B.id AND A.chat_by = 'User'
			GROUP BY
				A.chat_for";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	
	
}
?>
