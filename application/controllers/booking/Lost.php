<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Lost extends MY_Controller {
 var  $cats;
 var  $thispage;
 public function __construct(){
		parent::__construct();
	$this->thispage="lost";
         $this->load->model('booking');
        if(!$this->session->userdata('group')){
           //// echo "لايمكن الاستخدام ";
           /////    $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
            ///echo $_SERVER['HTTP_REFERER'];
            
            /// redirect($_SERVER['HTTP_REFERER']);
           /// exit;
        }
}
	public function index($page=1,$counter=0){



 $whr="counter=$counter";  
  
  $data['counter']  =$counter;
$this->db->from('booking_lost');
if($whr)$this->db->where($whr);
$max=20;
$data['all_count']=  ceil($this->db-> count_all_results()/$max)+1;




//echo print_r($this->db->last_query());

$this->db->from('booking_lost');
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
        $query = $this->db->get_where('booking', array('id' => $row['idbook']));
$data['edit']  = $query->row_array();
$data['all_groups'][$i]['name']=$data['edit']['name'];
$data['all_groups'][$i]['mobile']=$data['edit']['mobile'];

$i++;
 }
$data['title'] = 'Dashboard';
$data['view'] = '../controllers/booking/views/'.$this->thispage.'/show';
$data['cats']= $this->cats;
$data['thispage'] = $this->thispage;
$this->load->view('../controllers/booking/views/layout', $data);
}



  public function update($id,$counter) {


        $query = $this->db->get_where('booking_lost', array('id' => $id));
        $data['show'] = $query->row_array();
        if(  $data['show']['counter']==0){
          $this->session->set_flashdata('msg', 'تم    التغير     بفضل الله!');
        $this->db->where('id', $id);$this->booking->update('booking_lost', array('counter' => $counter,'datefinsh'=> time(),'user'=> $this->session->userdata('name')));
      
        if($counter==1){
                      $this->booking->add_rep_user("     تم تسليم المفقودات       ". $data['show']['idbook']);
        }
          if($counter==2){
                      $this->booking->add_rep_user("     تم تحويل المفقودات     الارشيف ". $data['show']['idbook']);
        }
        }  else {
                 $this->session->set_flashdata('msg', '    يوجد خلل      !');
        }
  redirect(base_url() . 'booking/lost');
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

}
?>