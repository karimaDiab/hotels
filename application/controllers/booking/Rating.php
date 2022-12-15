<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Rating extends MY_Controller {
 var  $cats;
 var  $thispage;
 public function __construct(){
		parent::__construct();
	$this->thispage="rating";
         $this->load->model('booking');
        if(!$this->session->userdata('group') and ! $this->session->userdata('editor')){
         echo "لايمكن الاستخدام ";
             $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
         echo $_SERVER['HTTP_REFERER'];
            
           redirect($_SERVER['HTTP_REFERER']);
        exit;
        }
}
	public function index(){

$this->all(1);
	}
 public	 function all($page=1,$count=''){

 $whr="";  
  if($count)$whr="comment!=''"; 
  
$this->db->from('booking_rating');
if($whr)$this->db->where($whr);
$max=20;
$data['all_count']=  ceil($this->db-> count_all_results()/$max)+1;




//echo print_r($this->db->last_query());

$this->db->from('booking_rating');
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
$data['counts'] = $count;
$data['view'] = '../controllers/booking/views/'.$this->thispage.'/show';
$data['cats']= $this->cats;
$data['thispage'] = $this->thispage;
$this->load->view('../controllers/booking/views/layout', $data);
}



  
}
?>