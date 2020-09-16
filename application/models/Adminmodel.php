<?php
Class Adminmodel extends CI_Model
{
	public function __construct()
	{
	  parent::__construct();
		$this->load->model('mailmodel');
		$this->load->model('smsmodel');
		$this->load->model('notificationmodel');
	}

	function login($username,$password)
	{
		$pwd=md5($password);
		$chkUser = "SELECT * FROM admin_user_master WHERE email_id ='$username' AND password='$pwd'";
		$res=$this->db->query($chkUser);
		if($res->num_rows()>0){
		   foreach($res->result() as $rows)
		   {
			   $status = $rows->status;
		   }
			if ($status == 'Active'){
				  $data = array("user_type"=>$rows->admin_role_type,"user_id"=>$rows->id,"name"=>$rows->full_name,"email_id"=>$rows->email_id,"user_pic"=>$rows->profile_pic,"status"=>$rows->status);
				 return $data;
			 } else {
				  $data= array("status" => "Inactive");
				  return $data;
			 }
		} else{
				  $data= array("status" => "Error");
				  return $data;
		} 
	}

	function forgot_password($user_name){
		
         $query="SELECT * FROM admin_user_master WHERE email_id='$user_name'";
         $result=$this->db->query($query);
         if($result->num_rows()>0){
			 foreach($result->result() as $row){
				 $user_id = $row->id;
				 $name = $row->full_name;
				 $user_type = $row->admin_role_type ;
				 $to_email = $row->email_id ;
				}
				
			 $digits = 6;
			 $OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			 $reset_pwd = md5($OTP);
			 
			$reset="UPDATE admin_user_master SET password ='$reset_pwd' WHERE id='$user_id'";
			$result_pwd=$this->db->query($reset);

			 $subject = 'GMS - Forgot Password';
             $htmlContent = '<html>
               <head><title></title>
               </head>
               <body>
               <p>Hi  '.$name.'</p>
               <p>Your Account Password is Reset. Please Use Below Password to login</p>
			   <p>Password: '.$OTP.'</p>
			   <p></p>
			   <p><a href="'.base_url() .'">Click here to Login</a></p>
               </body>
               </html>';
			   
			$smsContent = 'Hi  '.$name.' Your Account Password is Reset. Please Use this '.$OTP.' to login';
			
			//$this->mailmodel->sendEmail($to_email,$subject,$htmlContent);
			//$this->smsmodel->sendSMS($to_phone,$smsContent);
			
			 $data= array("status" => "Updated");
				  return $data;
         }else{
			 $data= array("status" => "Error");
				  return $data;
		 }
     }

	function profile($user_id){
		$query="SELECT * FROM `admin_user_master` WHERE id='$user_id'";
		$resultset=$this->db->query($query);
		return $resultset->result();
	}
	
	function profile_update($staff_id,$name,$email,$phone,$gender,$qualification,$PicName,$address,$user_id){
		
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
			}
		}

		if ($PicName != $old_profile_pic ){
			$file_to_delete = 'assets/users/'.$old_profile_pic;
			unlink($file_to_delete);
		}

		if ($old_email_id != $email){

			$update_user="UPDATE admin_user_master SET full_name='$name',email_id='$email',phone_number='$phone',gender='$gender',address='$address',qualification='$qualification',profile_pic='$PicName',updated_at=NOW(),updated_by='$user_id' WHERE id='$staff_id'";
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
			$update_user="UPDATE admin_user_master SET full_name='$name',email_id='$email',phone_number='$phone',gender='$gender',address='$address',qualification='$qualification',profile_pic='$PicName',updated_at=NOW(),updated_by='$user_id' WHERE id='$staff_id'";
			$result_user=$this->db->query($update_user);
		}

		if($result_user){
				$data=array("status"=>"success","text"=>"Profile Updated Successfully","class"=>"alert alert-success");
			}else{
				$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
			}
			return $data;
	}
	
	
	
	function check_password_match($old_password,$user_id){
		$pwd=md5($old_password);
		$select="SELECT * FROM admin_user_master WHERE password='$pwd' AND id='$user_id'";
		$result=$this->db->query($select);
	   if($result->num_rows()==0){
			echo "false";
		 }else{
			echo "true";
	   }
   } 
	   
	function password_update($new_password,$user_id,$user_type){
		$pwd = md5($new_password);
		$query="UPDATE admin_user_master SET password='$pwd', updated_at=NOW() WHERE id='$user_id'";
		$ex_query = $this->db->query($query);
		
		$sQuery = "SELECT * FROM admin_user_master WHERE `id` = '$user_id'";
		$user_result = $this->db->query($sQuery);
		$ress = $user_result->result();
		if($user_result->num_rows()>0)
		{
			foreach ($user_result->result() as $rows)
			{
				 $name = $rows->full_name;
				 $email = $rows->email_id;
				 $mobile = $rows->phone_number;
			}

		$subject ='SPV - Password Update';
		$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>Your Password Updated Sucessfully!</p>
							</body>
							</html>';
			
			$smsContent = 'Hi  '.$name.' Your Password Updated Sucessfully!';
			
			//$this->mailmodel->sendEmail($email,$subject,$htmlContent);
			//$this->smsmodel->sendSMS($mobile,$smsContent);
		}
		
		if ($ex_query) {
			$data=array("status"=>"success","text"=>"Password Updated Successfully","class"=>"alert alert-success");
		} else {
			$data=array("status"=>"error","text"=>"Something went wrong","class"=>"alert alert-danger");
		}
		 return $data;
	}
	
}
?>
