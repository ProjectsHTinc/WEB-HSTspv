<?php
Class Newsfeedmodel extends CI_Model
{
	public function __construct()
	{
	  parent::__construct();
		$this->load->model('mailmodel');
		$this->load->model('smsmodel');
	}

	function get_categories(){
		$query="SELECT *  FROM nf_category WHERE status='Active'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function add_newsfeed($nfCategory,$nfDate,$nfProfile,$vToken,$eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$user_id){
		$query="INSERT INTO news_feed (nf_category_id,nf_profile_type,news_date,title_ta,title_en,description_ta,description_en,nf_cover_image,nf_video_token_id,status,created_by,created_at) VALUES ('$nfCategory','$nfProfile','$nfDate','$tTitle','$eTitle','$tDeatil','$eDeatil','$PicName','$vToken','$nStatus','$user_id',NOW())";
		$result=$this->db->query($query);
		$last_id=$this->db->insert_id();

		if($result){
			$data=array("status"=>"success","text"=>"News Added Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}
	
	function get_newsfeed(){
		$query="SELECT A.*,B.category_name FROM news_feed A, nf_category B WHERE A.nf_category_id = B.id ORDER BY A.id DESC";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function get_newsfeed_details($news_id){
		$id=base64_decode($news_id)/98765;
		$query="SELECT * FROM news_feed WHERE id = '$id'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function update_newsfeed($nfId,$nfCategory,$nfDate,$nfProfile,$vToken,$eTitle,$tTitle,$eDeatil,$tDeatil,$PicName,$nStatus,$user_id){
		
		$id=base64_decode($nfId)/98765;
		
		$sQuery = "SELECT * FROM news_feed WHERE id = '$id'";
		$result = $this->db->query($sQuery);
		if($result->num_rows()>0)
		{
			foreach ($result->result() as $rows)
			{
				$cover_image = $rows->nf_cover_image;
			}
		}
		if ($PicName != $cover_image ){
			$file_to_delete = 'assets/news_feed/'.$cover_image;
			unlink($file_to_delete);
		}

		$query="UPDATE news_feed SET nf_category_id='$nfCategory',nf_profile_type='$nfProfile',news_date='$nfDate',title_ta='$tTitle',title_en='$eTitle',description_ta='$tDeatil', description_en='$eDeatil',nf_cover_image='$PicName',nf_video_token_id='$vToken',status='$nStatus',status='$nStatus',updated_at=NOW(),updated_by='$user_id' WHERE id ='$id'";
		$result=$this->db->query($query);
		
		if($result){
			$data=array("status"=>"success","text"=>"News Updated Successfully","class"=>"alert alert-success");
		}else{
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		return $data;
	}

	function get_newsfeed_gallery($news_id){
		$news_id = base64_decode($news_id)/98765;
		$query="SELECT * FROM nf_image_gallery WHERE nf_id = '$news_id' ORDER BY id DESC";
		$res=$this->db->query($query);
		return $result=$res->result();
	}

	function create_gallery($news_id,$file_name,$user_id){

		$enc_newsid =  base64_encode($news_id*98765);
		$count_picture=count($file_name);

          for($i=0;$i<$count_picture;$i++){
           $check_batch="SELECT * FROM nf_image_gallery WHERE nf_id='$news_id'";
           $res=$this->db->query($check_batch);
            $res->num_rows();
            if($res->num_rows()>=25){
				$data=array("status"=>"limit","text"=>"Already Uploaded Maximum Pictures","class"=>"alert-warning","url"=>base_url().'newsfeed/news_gallery/'.$enc_newsid);
				return $data;
			}else{
				$gal_l=$file_name[$i];
				$gall_img="INSERT INTO nf_image_gallery(nf_id,nf_image,created_at,created_by) VALUES('$news_id','$gal_l',NOW(),'$user_id')";
				$res_gal   = $this->db->query($gall_img);
              }
            }
          if ($res_gal) {
             $data=array("status"=>"success","text"=>"Gallery Added Successfully","class"=>"alert alert-success","url"=>base_url().'newsfeed/news_gallery/'.$enc_newsid);
              return $data;
          } else {
             $data=array("status"=>"failed","text"=>"Gallery Added Error","class"=>"alert-danger","url"=>base_url().'newsfeed/news_gallery/'.$enc_newsid);
              return $data;
          }
	}
	
	function delete_gal($news_gal_id){
			
			$sQuery = "SELECT * FROM nf_image_gallery WHERE id = '$news_gal_id'";
			$result = $this->db->query($sQuery);
			if($result->num_rows()>0)
			{
				foreach ($result->result() as $rows)
				{
					$image_file_name = $rows->nf_image;
				}
			}
			$file_to_delete = 'assets/news_feed/'.$image_file_name;
			unlink($file_to_delete);
			
			$del_gallery_img="DELETE  FROM nf_image_gallery WHERE id='$news_gal_id'";
			$del_gallery=$this->db->query($del_gallery_img); 

			if ($del_gallery) {
				echo "success";
			} else {
				echo "wrong";
			}
	}
}
?>
