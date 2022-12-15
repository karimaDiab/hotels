<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct(){
		
		parent::__construct();
		$this->load->library('mailer');
                
 $this->load->model('booking');
		$this->load->model('auth_model', 'auth_model');
	}
	//-------------------------------------------------------------------------
	public function index(){
		if($this->session->has_userdata('is_admin_login'))
		{
		//	redirect('admin/dashboard');
		}
		if($this->session->has_userdata('is_user_login'))
		{
			///redirect('user/profile');
		}
		else{
                      if(@stristr($_SERVER['REQUEST_URI'],'ltef')){
         redirect('ltef/bills');
        } else {
					

             redirect('booking/dashboard');
        }
                   
			//redirect('auth/login');
		}
	}
	//-------------------------------------------------------------------------	
	public function login(){

            
                    $userpw= (($this->input->get('pass')));
                  $api=$this->input->get('api');
                    $idiphone=$this->input->get('idiphone');
                  
                  
		if($this->input->post('submit') or $api){
 
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE and !$api) {
				$this->load->view('auth/login');
			}
			else {
                            
                                $pass=$this->input->post('password');
                  $email=$this->input->post('email');
                            
                            if($api)$email=$api;
                                      if($userpw)$pass=$userpw;
				$data = array(
					'email' =>$email,
					'password' =>$pass
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->login($data);
				if($result){
			//		if($result['gruop'] == 0){
			  //  		$this->session->set_flashdata('warning', 'Please verify your email address!');
					//	redirect(base_url('auth/login'));
					//	exit;
			  //  	}
     
    //عبدالرحمن
					if($result['gruop'] == 1 or $result['gruop'] == 2 or $result['gruop'] == 3 or $result['gruop'] == 5){
                                  $group=FALSE;
                                               $group1=FALSE;
                                                    $group2=FALSE;
                                            if($result['gruop'] == 1 ) $group=TRUE;
                                              if($result['gruop'] == 3) $group1=TRUE;
                                                 if($result['gruop'] == 5) $group2=TRUE;
                                                 
                                                /// echo $result['gruop'];
						$admin_data = array(
							'admin_id' => $result['id'],
							'name' => $result['name'],
                                                    'pass' => $result['pass'],
                                                     'group' => $group,
                                                      'editor' => $group1,
                                                         'checkout' => $group2,
                                                     'iduser' => $result['id'],
							'is_admin_login' => TRUE
						);
						$this->session->set_userdata($admin_data);
                                              $this->booking->add_rep_user("  تسجيل دخول "." - ".$this->input->ip_address());
                                              if($api)
                                              {
                                                     
                                                  $edit_data = array(
				
					 'mosma' =>$idiphone,
						); 
          	$edit_data = $this->security->xss_clean($edit_data);
 $result =		$this->db->where('name', $email)->update('user', $edit_data);
                                                  
                                                 echo 'ok'; 
                                              } else {
                                                  
                                           
						       if(@stristr($_SERVER['REQUEST_URI'],'ltef')){
         redirect('ltef/bills', 'refresh');
        } else {
          redirect('booking/dashboard', 'refresh');
        }
					
            
      
        }
           }
//					if ($result['is_admin'] == 0){
//						$user_data = array(
//							'user_id' => $result['id'],
//							'name' => $result['firstname'],
//							'is_user_login' => TRUE
//						);
//						$this->session->set_userdata($user_data);
//						redirect(base_url('user/profile'), 'refresh');
//					}
				}
				else{
     			$data['title'] = 'Login';
					$data['msg'] = 'Invalid Email or Password!';
     		$data['view'] = 'auth/login';
		///$this->load->view('layout', $data);
		$this->load->view('auth/login', $data);
				}
			}
		}
		else{
			$data['title'] = 'Login';
		     		$data['view'] = 'auth/login';
	$this->load->view('auth/login', $data);
		}
	}	

	//-------------------------------------------------------------------------
	public function register(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[ci_users.username]');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_users.email]|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Create an Account';
				$this->load->view('auth/register', $data);
			}
			else{
				$data = array(
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'is_active' => 1,
					'is_verify' => 0,
					'token' => md5(rand(0,1000)),    
					'last_ip' => '',
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->register($data);
				if($result){
					//sending welcome email to user
					$name = $data['firstname'].' '.$data['lastname'];
					$email_verification_link = base_url('auth/verify/').'/'.$data['token'];
					$body = $this->mailer->Tpl_Registration($name, $email_verification_link);
					$this->load->helper('email_helper');
					$to = $data['email'];
					$subject = 'Activate your account';
					$message =  $body ;
					$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
					$email = true;
					if($email){
						$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');	
						redirect(base_url('auth/login'));
					}	
					else{
						echo 'Email Error';
					}
				}
			}
		}
		else{
			$data['title'] = 'Create an Account';
			$this->load->view('auth/register', $data);
		}
	}

	//----------------------------------------------------------	
	public function verify(){
		$verification_id = $this->uri->segment(3);
		$result = $this->auth_model->email_verification($verification_id);
		if($result){
			$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');	
			redirect(base_url('auth/login'));
		}
		else{
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('auth/login'));
		}	
	}

	//--------------------------------------------------		
	public function forgot_password(){
		if($this->input->post('submit')){
			//checking server side validation
			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('auth/forget_password');
				return;
			}
			$email = $this->input->post('email');
			$response = $this->auth_model->check_user_mail($email);
			if($response){
				$rand_no = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['id']);
				$this->auth_model->update_reset_code($pwd_reset_code, $response['id']);
				// --- sending email
				$name = $response['firstname'].' '.$response['lastname'];
				$email = $response['email'];
				$reset_link = base_url('auth/reset-password/'.$pwd_reset_code);
				$body = $this->mailer->Tpl_PwdResetLink($name,$reset_link);

				$this->load->helper('email_helper');
				$to = $email;
				$subject = 'Reset your password';
				$message =  $body ;
				$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
				if($email){
					$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

					redirect(base_url('auth/forgot-password'));
				}
				else{
					$this->session->set_flashdata('error', 'There is the problem on your email');
					redirect(base_url('auth/forgot-password'));
				}
			}
			else{
				$this->session->set_flashdata('error', 'The Email that you provided are invalid');
				redirect(base_url('auth/forgot-password'));
			}
		}
		else{
			$data['title'] = 'Forget Password';
			$this->load->view('auth/forget_password',$data);	
		}
	}

	//--------------------------------------------------		
	public function reset_password($id=0){
		// check the activation code in database
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$result = false;
				$data['reset_code'] = $id;
				$data['title'] = 'Reseat Password';
				$this->load->view('auth/reset_password',$data);
			}   
			else{
				$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$this->auth_model->reset_password($id, $new_password);
				$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
				redirect(base_url('auth/login'));
			}
		}
		else{
			$result = $this->auth_model->check_password_reset_code($id);
			if($result){
				$data['reset_code'] = $id;
				$data['title'] = 'Reseat Password';
				$this->load->view('auth/reset_password',$data);
			}
			else{
				$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
				redirect(base_url('auth/forgot-password'));
			}
		}
	}

	//-------------------------------------------------------------------------
	public function profile(){
		if($this->input->post('submit')){
			$data = array(
				'username' => $this->input->post('username'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no'),
				'updated_at' => date('Y-m-d : h:m:s'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->auth_model->update_admin($data);
			if($result){
				$this->session->set_flashdata('msg', 'Profile has been Updated Successfully!');
				redirect(base_url('auth/profile'), 'refresh');
			}
		}
		else{
			$data['admin'] = $this->auth_model->get_admin_detail();
			$data['title'] = 'User Profile';
			$data['view'] = 'auth/profile';
			$this->load->view('../controllers/admin/views/layout', $data);
		}
	}
	//-------------------------------------------------------------------------
	public function change_pwd(){
		 $id = $this->session->userdata('admin_id');
		if($this->input->post('submit')){
                    	$this->form_validation->set_rules('passwordold', 'Password', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
			
			 $this->session->set_flashdata('msg', '  ادخل جميع الحقول  ');
					redirect(base_url('auth/change_pwd'));  
			}
                        elseif($this->input->post('passwordold')==$this->input->post('password'))
                        {
                           	 $this->session->set_flashdata('msg', '  ادخل   باسورد مختلف جديد  ');
					redirect(base_url('auth/change_pwd')); 
                        }
                        elseif($this->input->post('confirm_pwd')!=$this->input->post('password'))
                        {
                            	 $this->session->set_flashdata('msg', '  تاكيد الباسورد الجديد غير مطابق    ');
					redirect(base_url('auth/change_pwd'));
                        }
			else{
                            
                             $data = array(
                    'id' => $this->session->userdata('admin_id'),
                    'pass' => md5(md5($this->input->post('passwordold'))),
               
                );
       $data = $this->security->xss_clean($data);
          $query = $this->db->get_where('user', $data);
        $data['show'] = $query->row_array();
                            
                           if( !$data['show']['name'])
		{
                               
                               
                               $this->session->set_flashdata('msg', 'الباسورد القديم غير صحيح');
					redirect(base_url('auth/change_pwd'));     
                           } 
			
                            $edit_data = array(
            'pass' => md5(md5($this->input->post('password'))),
                                   'timeout' => time(),
     );
        $edit_data = $this->security->xss_clean($edit_data);
        $result = $this->db->where('id', $this->session->userdata('admin_id'))->update('user', $edit_data);
        
        
				if($result){
					$this->session->set_flashdata('msg', 'Password has been changed successfully!');
					redirect(base_url('booking/dashboard'));
				}
			}
		}
		else{
			$data['title'] = 'Change Password';
			$data['view'] = '../controllers/booking/views/users/change_pwd';
			$this->load->view('../controllers/booking/views/layout', $data);
		}
	}
	//-------------------------------------------------------------------------
	public function logout(){
             //// $this->booking->add_rep_user(" تسجيل خروج");
		$this->session->sess_destroy();
                
		redirect(base_url('auth/login'), 'refresh');
	}

}  // end class


?>