<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

    var $thispage;
    var $data_day;
    var $user;
    var $thismon;
    var $nao;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
        $this->data_day = $this->booking->data_day(6);
        $this->user = $this->session->userdata('name');
        $this->thispage = "payment";
        $this->thismon = date('', $this->booking->tissme_now());

        $this->nao[1] = "السالمية";
        $this->nao[2] = "حولي";
        $this->nao[7] = "الرقعي";
        $this->nao[8] = " الشعب";
        $this->nao[6] = "الشركة";
        $this->nao[5] = " اخرى";



        if ((!$this->db->table_exists('payment'))) {
            $this->db->query(" CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `counter` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
    `text5` varchar(255) DEFAULT NULL,

  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
    
    ");
        }
    }

    public function index() {

        $this->all();
    }

        function sum_bill($catid) {
        $this->db->select_sum('amount');
        $this->db->where(" $catid ");
        $query = $this->db->get('payment')->row_array();
        if (!$query['amount'])
            $query['amount'] = 0;
        return $query['amount'];
    }
    public function all($page = 1, $counter = '') {








     $this->db->from('payment');
   $this->db->where("PAYMENT_STATUS!='successful' and STATUS!='wait'");

          $data['all_bill2']  = $this->db->count_all_results();
          
               $this->db->from('payment');
   $this->db->where(" STATUS='wait'");

          $data['all_bill3']  = $this->db->count_all_results();



//
         $data['all_bill1'] = $this->sum_bill("PAYMENT_STATUS='successful'  and STATUS='ok'" );
            $data['all_bill4'] = $this->sum_bill("PAYMENT_STATUS='successful' and STATUS='send'" );
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
        $whr = " PAYMENT_STATUS='successful'";
        if ($counter == 1) {
            $whr = " PAYMENT_STATUS='successful' and STATUS='ok'   ";
        }
        if ($counter == 2) {
            $whr = " PAYMENT_STATUS!='successful' and STATUS!='wait'";
        }
        if ($counter == 3) {
            $whr = " STATUS='wait'";
        }
 if ($counter == 4) {
            $whr = " PAYMENT_STATUS='successful'and STATUS='send'";
        }

        $this->db->from('payment');
        if ($whr)
            $this->db->where($whr);
        $max = 100;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('payment');

        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();
  $i = 0;
      foreach ($data['all_groups'] as $row) {
          
          
            if ($this->input->post('id' . $row['id'])) {
                
   
        $result = $this->db->where('id', $row['id'])->update('payment', array(
            'STATUS' => 'send',
        ));
        
                
          $data['all_groups'][$i]['STATUS']='send';
            }
          
              $i++;  
          
          
      }


        $data['title'] = 'Dashboard';
        $data['counter'] = $counter;


        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

 
        public function change($id,$all='') {

        $query = $this->db->get_where('payment', array('id' => $id));
        $data['show'] = $query->row_array();


        $edit_data = array(
            'STATUS' => 'send',
        );
        $edit_data = $this->security->xss_clean($edit_data);
        $result = $this->db->where('id', $id)->update('payment', $edit_data);

        $this->session->set_flashdata('msg', 'تم التاكيد     بفضل الله');
        redirect(base_url() . 'ltef/payment');
    }
}

?>