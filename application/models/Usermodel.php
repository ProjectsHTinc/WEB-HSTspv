<?php
Class Usermodel extends CI_Model
{
	public function __construct()
	{
	  parent::__construct();
		$this->load->model('mailmodel');
		$this->load->model('smsmodel');
		$this->load->model('notificationmodel');
	}

	function get_proof_type(){
		$query="SELECT * FROM `document_type_master` WHERE status = 'Active'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function get_admin_users(){
		$query="SELECT * FROM `admin_user_master` WHERE id !='1'";
		$res=$this->db->query($query);
		return $result=$res->result();
	}
	
	function admin_checkemail($email){
		$select="SELECT * FROM admin_user_master WHERE email_id='$email'";
		$result=$this->db->query($select);
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
    }

	function admin_checkphone($phone){
		$select="SELECT * FROM admin_user_master WHERE phone_number='$phone'";
		$result=$this->db->query($select);
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
    }
	
	function add_admin_user($name,$email,$phone,$gender,$qualification,$idProoftype,$fileName,$PicName,$address,$status,$user_id){
		
		$select="SELECT * FROM admin_user_master WHERE email_id='$email'";
		$result=$this->db->query($select);

       if($result->num_rows()>0){
			$data=array("status"=>"error","text"=>"Sorry!.. User Already Exist!..","class"=>"alert alert-danger");
			return $data;
       }else{
			$digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd = md5($OTP);
			
			$query="INSERT INTO admin_user_master(admin_role_type,full_name,email_id,password,phone_number,gender,address,qualification,profile_pic,id_proof_type,id_proof_file,status,created_by,created_at)VALUES('2','$name','$email','$md5pwd','$phone','$gender','$address','$qualification','$PicName','$idProoftype','$fileName','$status','$user_id',NOW())";
			$result=$this->db->query($query);
			//$last_id=$this->db->insert_id();

			$subject ='SPV - Staff Login Details';
			$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>Staff Login Details</p>
							<p>Username: '.$email.'</p>
							<p>Password: '.$OTP.'</p>
							<p></p>
							<p><a href="'.base_url() .'admin/">Click here to Login</a></p>
							</body>
							</html>';

			$smsContent = 'Hi  '.$name.' Your Account Username : '.$email.' Password '.$OTP.'';
			//$this->mailmodel->sendEmail($email,$subject,$htmlContent);
			//$this->smsmodel->sendSMS($mobile,$smsContent);

			if($result){
				$data=array("status"=>"success","text"=>"User Details Added Successfully","class"=>"alert alert-success");
			}else{
				$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
			}
			return $data;
	   }
	}
	
	function admin_user_details($staff_id){
		$query="SELECT * FROM `admin_user_master` WHERE id='$staff_id'";
		$resultset=$this->db->query($query);
		return $resultset->result();
	}
	
	
	function admin_checkemail_edit($email,$staff_id){
		$select="SELECT * FROM admin_user_master WHERE email_id='$email' AND id!='$staff_id'";
		$result=$this->db->query($select);
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
	}

	function admin_checkphone_edit($phone,$staff_id){
		 $select="SELECT * FROM admin_user_master WHERE phone_number='$phone' AND id!='$staff_id'";
		$result=$this->db->query($select);
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
	}
	
	function update_admin_user($staff_id,$name,$email,$phone,$gender,$qualification,$idProoftype,$fileName,$PicName,$address,$status,$user_id){

		$sQuery = "SELECT * FROM admin_user_master WHERE id = '$staff_id'";
		$user_result = $this->db->query($sQuery);
		$ress = $user_result->result();
		if($user_result->num_rows()>0)
		{
			foreach ($user_result->result() as $rows)
			{
				$old_email_id = $rows->email_id;
				$old_phone = $rows->phone_number;
				$old_profile_pic = $rows->profile_pic;
				$old_id_proof_file = $rows->id_proof_file;
			}
		}

		if ($PicName != $old_profile_pic ){
			$file_to_delete = 'assets/users/'.$old_profile_pic;
			unlink($file_to_delete);
		}

		if ($fileName != $old_id_proof_file ){
			$file_to_delete = 'assets/users/'.$old_id_proof_file;
			unlink($file_to_delete);
		}

		if ($old_email_id != $email){

			$update_user="UPDATE admin_user_master SET full_name='$name',email_id='$email',phone_number='$phone',gender='$gender',address='$address',qualification='$qualification',profile_pic='$PicName',id_proof_type='$idProoftype',id_proof_file='$fileName',status='$status',updated_at=NOW(),updated_by='$user_id' WHERE id='$staff_id'";
			$result_user=$this->db->query($update_user);

			$subject ='GMS - Staff Login - Email Updated';
			$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>Login Details</p>
							<p>New Email: '.$email.'</p>
							<p></p>
							<p><a href="'.base_url() .'">Click here to Login</a></p>
							</body>
							</html>';

			$smsContent = 'Hi  '.$name.' Your Account Email : '.$email.' is updated.';

			//$this->mailmodel->sendEmail($email,$subject,$htmlContent);
			//$this->smsmodel->sendSMS($mobile,$smsContent);
		}else {
			$update_user="UPDATE admin_user_master SET full_name='$name',email_id='$email',phone_number='$phone',gender='$gender',address='$address',qualification='$qualification',profile_pic='$PicName',id_proof_type='$idProoftype',id_proof_file='$fileName',status='$status',updated_at=NOW(),updated_by='$user_id' WHERE id='$staff_id'";
			$result_user=$this->db->query($update_user);
		}

		if($result_user){
				$data=array("status"=>"success","text"=>"User Updated Successfully","class"=>"alert alert-success");
			}else{
				$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
			}
			return $data;
	}
}
?>
