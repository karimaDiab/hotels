<?php
class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
                $userpw= md5(md5($this->input->get('pass')));
                  $api=$this->input->get('api');
          
  if( $api and $userpw)
  {
      
  
                
                $query = $this->db->query("select * from user where ((pass='$userpw' and  name='".$api."'  )or (newpass='$userpw' and newpass!='' and  name='".$api."'  ) ) and(gruop='1'  or gruop='2' or  gruop='5' or gruop='3' or gruop='6' )");
   if ($query->num_rows() == 1){
                            
                          $result = $query->row_array();
                            
                                     
                          $group=FALSE;
                                               $group1=FALSE;
                                                    $group2=FALSE;
                                            if($result['gruop'] == 1 ) $group=TRUE;
                                              if($result['gruop'] == 3) $group1=TRUE;
                                                 if($result['gruop'] == 5) $group2=TRUE;
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
                                            
                      ///  echo 11;  
                        }else {
                            exit; 
                
            }
                      
  }
    // exit;
  

    $data = array(
                    'id' => $this->session->userdata('admin_id'),
                    'pass' => $this->session->userdata('pass'),
               
                );
       $data = $this->security->xss_clean($data);
          $query = $this->db->get_where('user', $data);
        $data['show'] = $query->row_array();
     
		if(!$this->session->has_userdata('is_admin_login') or !$data['show']['name'])
		{
                   
			redirect('auth/login');
		}
	}
}

class UR_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('is_user_login'))
		{
			redirect('auth/login');
		}
	}
}

?>