<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backsound extends MY_Controller {

    var $cats;
    var $thispage;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');




        $this->thispage = "clints";
    }
     public function index($cats = 1) {
              if(!$this->session->userdata('checkout'))
                {
          $query = $this->db->get_where('booking_rooms', array('conter' => '5'));
                $clints = $query->row_array();
               
                if(isset($clints['name']))
                {
                      echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4> تم التشيك على شقة  '.$clints['name'].'</h4>
              تحويل الشقة الى النظافة  
              
<a  class="btn bg-navy btn-flat margin" href="'.base_url('booking/Dashboard/toclean/'.$clints['name']).'">اضغط هنا</a>
              </div>
               <audio controls autoplay hidden="">

  <source src="'.base_url().'/sms-alert-1-daniel_simon.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
        ';  
                }
                }
   
    }
}
    ?>
<!DOCTYPE html>
<html>
<body>

   


</body>
</html>


