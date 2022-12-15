<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller {
 var  $cats;
 var  $thispage;
 public function __construct(){
		parent::__construct();
	$this->thispage="users";
         $this->load->model('booking');
        if(!$this->session->userdata('group')){
            echo "لايمكن الاستخدام ";
               $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
            ///echo $_SERVER['HTTP_REFERER'];
            
             redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
}
	public function index(){

$this->all(1);
	}
 public	 function all($page=1){

 $whr="";    
  

$this->db->from('user');
if($whr)$this->db->where($whr);
$max=20;
$data['all_count']=  ceil($this->db-> count_all_results()/$max)+1;




//echo print_r($this->db->last_query());

$this->db->from('user');
$this->db->order_by('id', 'desc');
if($whr)$this->db->where($whr);
$this->db->limit($max, ($max*$page)-$max);
$data['all_groups']  = $this->db->get()->result_array();

$gruopname[1]='مدير';
$gruopname[2]='موظف استقبال';
$gruopname[3]='مسول فرع';
$gruopname[4]='موقوف';
$gruopname[5]='شك اوت';
$i=0;
 foreach($data['all_groups'] as $row)
 {
$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];

$i++;
 }
$data['title'] = 'Dashboard';
$data['view'] = '../controllers/ltef/views/'.$this->thispage.'/show';
$data['cats']= $this->cats;
$data['thispage'] = $this->thispage;
$this->load->view('../controllers/ltef/views/layout', $data);
}


 public	 function msgs($page=1){

 $whr="idmsg=0";    
  
  
$this->db->from('booking_msg');
if($whr)$this->db->where($whr);
$max=20;
$data['all_count']=  ceil($this->db-> count_all_results()/$max)+1;




//echo print_r($this->db->last_query());

$this->db->from('booking_msg');
$this->db->order_by('id', 'desc');
if($whr)$this->db->where($whr);
$this->db->limit($max, ($max*$page)-$max);
$data['all_groups']  = $this->db->get()->result_array();

$gruopname[1]='مدير';
$gruopname[2]='موظف استقبال';
$gruopname[3]='مسول فرع';
$gruopname[4]='موقوف';
$gruopname[5]='شك اوت';
$i=0;
 foreach($data['all_groups'] as $row)
 {
//$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];

$i++;
 }
$data['title'] = 'Dashboard';
$data['view'] = '../controllers/booking/views/'.$this->thispage.'/msgs';
$data['cats']= $this->cats;
$data['thispage'] = $this->thispage;
$this->load->view('../controllers/booking/views/layout', $data);
}

    public function readmsg($id) {



        $query = $this->db->get_where('booking_msg', array('id' => $id, 'idmsg' => '0'));
        $data['show'] = $query->row_array();



$this->db->from('booking_msg');
$this->db->order_by('id', 'desc');
$this->db->where(array( 'idmsg' => $id));
$data['all_read']  = $this->db->get()->result_array();


    
        $data['view'] = '../controllers/booking/views/users/readmsg';
        $this->load->view('../controllers/booking/views/layout', $data);
    }
 public function rep($id , $page = 1,$noa='') {

      
     
      $this->db->where("date <".(time()-(60*24*60*60)));
   $result=$this->booking->delete('rep');
    
     $query = $this->db->get_where('user', array('id' => $id));
$data['edit']  = $query->row_array();

       $whr = "user='".$data['edit']['name']."'";
      
       if($id=='all')  $whr = "";
       /// $whr = " $whr and noa!='2' and noa!='3'";

        $this->db->from('rep');
        
         $this->db->like('user', $data['edit']['name']);
        
             if($id=='all')$this->db->not_like('comment', 'البحث');
        
           if(!$noa)$this->db->not_like('comment', 'دخول');
     if(!$noa) $this->db->not_like('comment', 'خروج');
            if($noa) $this->db->like('comment', 'دخول');
     if($noa) $this->db->or_like('comment', 'خروج');
        if ($whr)
            $this->db->where($whr);
        $max = 35;
        $data['all_count'] = ceil($this->db->count_all_results() / $max);




///echo print_r($this->db->last_query());

        $this->db->from('rep');
      $this->db->like('user', $data['edit']['name']);
     if(!$noa) $this->db->not_like('comment', 'دخول');
     if(!$noa) $this->db->not_like('comment', 'خروج');
      if($id=='all')$this->db->not_like('comment', 'البحث');
     
          if($noa) $this->db->like('comment', 'دخول');
     if($noa) $this->db->or_like('comment', 'خروج');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();
        $i=0;
        foreach ($data['all_groups'] as $row) {
            
            
              if($noa)
              {
                  
                  
                 $query = $this->db->get_where('rep', "comment='".$row['comment']."' and user!='".$row['user']."'");
$data['edit']  = $query->row_array();   
if(!$data['edit']['comment'])
{
    $data['all_groups'][$i]['comment']=$row['comment']."-غير مكرر-";
}
              }
            
            
            $i++;
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'الشقق ';
        $data['id'] = $id;
               $data['noa'] = $noa;
        $data['view'] = '../controllers/booking/views/users/rep';

        $data['thispage'] = $this->thispage;
       
        $this->load->view('../controllers/booking/views/layout', $data);
    }

 public	 function add($cats=1){
   $add=FALSE;
    $this->cats=$cats;
   if($this->input->post('submit')){
 $this->form_validation->set_rules('name', '', 'trim|required');
	$this->form_validation->set_rules('pass', '', 'trim|required'); 
        $this->form_validation->set_rules('email', '', 'trim|required');
        $this->form_validation->set_rules('gruop', '', 'trim|required');
	//	$this->form_validation->set_rules('comment', '', 'trim|required'); 
    //	$this->form_validation->set_rules('comm', '', 'trim|required'); 
  
        
              $query = $this->db->get_where('user', array('email' => $this->input->post('email')));
$data['show']  = $query->row_array();
    if($data['show'] ['email'])
    {
        $add=FALSE;
        echo "الايميل مكرر ";
    }
 		elseif ($this->form_validation->run() === FALSE ) {
  
   $add=FALSE;
      }else
      {
 

       $add=TRUE;
           $data = array(
					'gruop' => $this->input->post('gruop'),
					'name' => $this->input->post('name'),
					 'pass' => md5(md5($this->input->post('pass'))),
					 'email' => $this->input->post('email'),
					 'mosma' => $this->input->post('mosma'),
					 'phone' => $this->input->post('phone'),
					 'userInfo' => $this->input->post('userInfo'),
					 'phone' => $this->input->post('userInfo'),
					  'regdata' => time(),
					   
				); 
          	$data = $this->security->xss_clean($data);
			$result=$this->booking->insert('user', $data);
   		if($result){
   $this->session->set_flashdata('msg', 'تم اضافة القسم بفضل الله!');
       redirect(base_url('ltef/users/index/'));
     }
      }
   } 
   
   
   if(!$add)
           
   {
    
 
  
    
   

//$data['cats_select']  = $this->db->get()->result_array(); 

  $query = $this->db->get_where('user', array('id' => '100000000000'));
$data['edit']  = $query->row_array();
$data['title'] = 'اضافة عضو';

$data['thispage'] = $this->thispage;
$data['view'] = '../controllers/ltef/views/'.$this->thispage.'/add';
$this->load->view('../controllers/ltef/views/layout', $data);

  }
  }

public	 function sendmsg($cats=1){
   $add=FALSE;
    $this->cats=$cats;
   if($this->input->post('submit')){
 $this->form_validation->set_rules('title', '', 'trim|required');
	$this->form_validation->set_rules('msg', '', 'trim|required'); 
    
	//	$this->form_validation->set_rules('comment', '', 'trim|required'); 
    //	$this->form_validation->set_rules('comm', '', 'trim|required'); 
  
        
          
if ($this->form_validation->run() === FALSE ) {
  
   $add=FALSE;
      }else
      {
 

       $add=TRUE;
           $data = array(
					'title' => $this->input->post('title'),
					'msg' => $this->input->post('msg'),
               	'user' =>'',
					 'dateadd' => $this->booking->tissme_now(),
					
					   
				); 
          	$data = $this->security->xss_clean($data);
			$result=$this->booking->insert('booking_msg', $data);
   		if($result){
   $this->session->set_flashdata('msg', 'تم اضافة القسم بفضل الله!');
       redirect(base_url('booking/users/index/'));
     }
      }
   } 
   
   
   if(!$add)
           
   {
    
 
  
    
   

//$data['cats_select']  = $this->db->get()->result_array(); 

  $query = $this->db->get_where('user', array('id' => '100000000000'));
$data['edit']  = $query->row_array();
$data['title'] = 'اضافة عضو';

$data['thispage'] = $this->thispage;
$data['view'] = '../controllers/booking/views/'.$this->thispage.'/sendmsg';
$this->load->view('../controllers/booking/views/layout', $data);

  }
  }


  public function del($id){

 
$this->db->where('id',$id);
    $result=$this->booking->delete('user');
         if(count($result)>0)
         {
    $this->session->set_flashdata('msg', 'تم حذف  العضو بفضل الله!');
       redirect(base_url('ltef/users/'));
    }
  }
 public	 function edit($id){
    
     $query = $this->db->get_where('user', array('id' => $id));
$data['edit']  = $query->row_array();
$data['edit']['checked']=array('','','','','','','','','');
 $data['edit']['checked'][$data['edit']['gruop']]='checked';

     $add=FALSE;
   if($this->input->post('submit')){
 $this->form_validation->set_rules('name', '', 'trim|required');

        $this->form_validation->set_rules('email', '', 'trim|required');
        $this->form_validation->set_rules('gruop', '', 'trim|required');
	//	$this->form_validation->set_rules('comment', '', 'trim|required'); 
    //	$this->form_validation->set_rules('comm', '', 'trim|required'); 
  
    
 		if ($this->form_validation->run() === FALSE ) {
  
   $add=FALSE;
      }else
      {
   
       $add=TRUE;
         
          $pass=$data['edit']['pass'];
    if($this->input->post('pass'))$pass=   md5(md5($this->input->post('pass')));
       
    
         $edit_data = array(
					'gruop' => $this->input->post('gruop'),
					'name' => $this->input->post('name'),
					 'pass' => $pass,
					 'email' => $this->input->post('email'),
					 'mosma' => $this->input->post('mosma'),
					 'phone' => $this->input->post('phone'),
					 'userInfo' => $this->input->post('userInfo'),
					 'phone' => $this->input->post('userInfo'),
					   
				); 
          	$edit_data = $this->security->xss_clean($edit_data);
			
       
       
  $result =		$this->db->where('id', $id);$this->booking->update('user', $edit_data);

   		if($result){
   $this->session->set_flashdata('msg', 'تم التعديل العضو بفضل الله!');
       redirect(base_url('ltef/users/'));
     }
      }
   } 
   
    
    if(!$add)
           
   {

 







$data['title'] = 'تعديل عصو';

$data['thispage'] = $this->thispage;
$data['view'] = '../controllers/ltef/views/'.$this->thispage.'/edit';
$this->load->view('../controllers/ltef/views/layout', $data);
   } 
  }

    
 function upload_many_photos($field_name) {

        $config['upload_path'] = 'upload/';

        $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|pdf|doc|docx|txt';

        $config['remove_spaces'] = TRUE;

        $config['encrypt_name'] = FALSE;

        $config['max_size'] = '200000';
       $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            echo"<pre>";
            print_r($config);
            echo"<pre>";
            print_r($error);
        } else {

            $data = $this->upload->data();
            $this->load->library('image_lib');

            //echo $this->upload->upload_path.$this->upload->file_name."<br>";

            $this->image_lib->clear();
        }
        return $data;
    }
  
}
?>