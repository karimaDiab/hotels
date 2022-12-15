<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Raoter extends MY_Controller {
 var  $cats;
 var  $thispage;
 public function __construct(){
		parent::__construct();
	$this->thispage="raoter";
         $this->load->model('booking');
        if(!$this->session->userdata('group')){
           //// echo "لايمكن الاستخدام ";
           /////    $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
            ///echo $_SERVER['HTTP_REFERER'];
            
            /// redirect($_SERVER['HTTP_REFERER']);
           /// exit;
        }
}
	public function index(){

$this->all(1);
	}
 public	 function all($page=1){

 $whr="";  
  
  
$this->db->from('booking_raoter');
if($whr)$this->db->where($whr);
$max=20;
$data['all_count']=  ceil($this->db-> count_all_results()/$max)+1;




//echo print_r($this->db->last_query());

$this->db->from('booking_raoter');
$this->db->order_by('id', 'desc');
if($whr)$this->db->where($whr);
$this->db->limit($max, ($max*$page)-$max);
$data['all_groups']  = $this->db->get()->result_array();

$gruopname[1]='مدير';
$gruopname[2]='مشرف';
$gruopname[3]='عضو';
$gruopname[4]='موقوف';
$gruopname[7]='موقوف';
$i=0;
 foreach($data['all_groups'] as $row)
 {
///$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];

$i++;
 }
$data['title'] = 'Dashboard';
$data['view'] = '../controllers/booking/views/'.$this->thispage.'/show';
$data['cats']= $this->cats;
$data['thispage'] = $this->thispage;
$this->load->view('../controllers/booking/views/layout', $data);
}


 public function rep($id , $page = 1,$noa='') {

      $query = $this->db->get_where('booking_raoter', array('id' => $id));
$data['edit']  = $query->row_array();

        $whr = "raoter='".$data['edit']['name']."'";
      
      
       /// $whr = " $whr and noa!='2' and noa!='3'";

        $this->db->from('rep');
           if(!$noa)$this->db->not_like('comment', 'دخول');
     if(!$noa) $this->db->not_like('comment', 'خروج');
            if($noa) $this->db->like('comment', 'دخول');
     if($noa) $this->db->or_like('comment', 'خروج');
        if ($whr)
            $this->db->where($whr);
        $max = 35;
        $data['all_count'] = ceil($this->db->count_all_results() / $max);




//echo print_r($this->db->last_query());

        $this->db->from('rep');
    
     if(!$noa) $this->db->not_like('comment', 'دخول');
     if(!$noa) $this->db->not_like('comment', 'خروج');
     
     
          if($noa) $this->db->like('comment', 'دخول');
     if($noa) $this->db->or_like('comment', 'خروج');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();
        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'الشقق ';
        $data['id'] = $id;
               $data['noa'] = $noa;
        $data['view'] = '../controllers/booking/views/raoters/rep';

        $data['thispage'] = $this->thispage;
       
        $this->load->view('../controllers/booking/views/layout', $data);
    }

 public	 function add($cats=1){
   $add=FALSE;
    $this->cats=$cats;
   if($this->input->post('submit')){
 $this->form_validation->set_rules('text1', '', 'trim|required');
	$this->form_validation->set_rules('text2', '', 'trim|required'); 
        $this->form_validation->set_rules('text3', '', 'trim|required');

	//	$this->form_validation->set_rules('comment', '', 'trim|required'); 
    //	$this->form_validation->set_rules('comm', '', 'trim|required'); 
  
        
         if ($this->form_validation->run() === FALSE ) {
  
   $add=FALSE;
      }else
      {
 

       $add=TRUE;
           $data = array(
					'text1' => $this->input->post('text1'),
					'text2' => $this->input->post('text2'),
				
					 'text3' => $this->input->post('text3'),
					 'text4' => $this->input->post('text4'),
					 'text5' => $this->input->post('text5'),
					
					   
				); 
          	$data = $this->security->xss_clean($data);
			$result=$this->booking->insert('booking_raoter', $data);
   		if($result){
   $this->session->set_flashdata('msg', 'تم اضافة القسم بفضل الله!');
       redirect(base_url('booking/raoter/'));
     }
      }
   } 
   
   
   if(!$add)
           
   {
    
 
  
    
   

//$data['cats_select']  = $this->db->get()->result_array(); 

  $query = $this->db->get_where('booking_raoter', array('id' => '100000000000'));
$data['edit']  = $query->row_array();
$data['title'] = 'اضافة عضو';

$data['thispage'] = $this->thispage;
$data['view'] = '../controllers/booking/views/'.$this->thispage.'/add';
$this->load->view('../controllers/booking/views/layout', $data);

  }
  }


  public function del($id){

 
$this->db->where('id',$id);
    $result=$this->booking->delete('booking_raoter');
         if(count($result)>0)
         {
    $this->session->set_flashdata('msg', 'تم حذف  العضو بفضل الله!');
       redirect(base_url('booking/raoter/'));
    }
  }
 public	 function edit($id){
    
     $query = $this->db->get_where('booking_raoter', array('id' => $id));
$data['edit']  = $query->row_array();


     $add=FALSE;
   if($this->input->post('submit')){
 $this->form_validation->set_rules('text1', '', 'trim|required');
	$this->form_validation->set_rules('text2', '', 'trim|required'); 
        $this->form_validation->set_rules('text3', '', 'trim|required');
	//	$this->form_validation->set_rules('comment', '', 'trim|required'); 
    //	$this->form_validation->set_rules('comm', '', 'trim|required'); 
  
    
 		if ($this->form_validation->run() === FALSE ) {
  
   $add=FALSE;
      }else
      {
   
       $add=TRUE;
         

    
         $edit_data = array(
		'text1' => $this->input->post('text1'),
					'text2' => $this->input->post('text2'),
				
					 'text3' => $this->input->post('text3'),
					 'text4' => $this->input->post('text4'),
					 'text5' => $this->input->post('text5'),
					   
				); 
          	$edit_data = $this->security->xss_clean($edit_data);
			
       
       
  $result =		$this->db->where('id', $id);$this->booking->update('booking_raoter', $edit_data);

   		if($result){
   $this->session->set_flashdata('msg', 'تم التعديل العضو بفضل الله!');
       redirect(base_url('booking/raoter/'));
     }
      }
   } 
   
    
    if(!$add)
           
   {

 







$data['title'] = 'تعديل عصو';

$data['thispage'] = $this->thispage;
$data['view'] = '../controllers/booking/views/'.$this->thispage.'/edit';
$this->load->view('../controllers/booking/views/layout', $data);
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