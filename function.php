<?php

	class conatct{
		public function info($data){
			$user_name = ucfirst($data['user_name']);
			$email = $data['email'];
			$phone = $data['phone'];
			$msg = $data['msg'];
			$formemail = 'purnota54321@gmail.com';
			
			$mailheaders = "Portfolio Website".
			"\r\n Name " . $user_name .
			"\r\n Email " . $email .
			"\r\n Phone " . $phone .
			"\r\n Message " . $msg . "\r\n";
			
			$error = [];
			if(strlen($user_name) < 3 || strlen($user_name) > 32){
				$error['uname'] = 'Name must be 3-32 charecter'; 
			}
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$error['email'] = 'Please send valid email';
			}
			if(strlen($phone) < 11){
				$error['phone'] = "Phone number must be 11 integer number";
			}
			if(!is_numeric($phone)){
				$error['vaid_phone'] = 'Please send valid phone number';
			}
			if(strlen($msg) < 20 || strlen($msg) > 200){
				$error['msg'] = 'Message must be 20-200 charecter'; 
			}
			if(count($error) > 0){
				$action = [
					'status' => 'error',
					'message' => $error,
				];
				return $action;
			}else{
				mail($formemail,$user_name,$mailheaders);
				$action = [
					'status' => 'success',
						'message' => 'Message Send Successfully',
				];
				return $action;
			}
			
		}
	}

?>