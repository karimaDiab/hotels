<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

    var $cats, $urlboom;
    var $thispage;

    public function __construct() {
        parent::__construct();
        
             $this->urlboo = '1';


        if (@stristr($_SERVER['REQUEST_URI'], 'booking2'))
            $this->urlboo = '2';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking4'))
            $this->urlboo = '4';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking5'))
            $this->urlboo = '5';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking6'))
            $this->urlboo = '6';
    
        
        
                $this->load->model('booking');
        $this->thispage = "payment";
        
         if((!$this->db->table_exists('payment')))
 {
   $this->db->query("CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
   md5id varchar(50) NOT NULL,
  amount varchar(100) DEFAULT NULL,
  date1 varchar(50) DEFAULT NULL,
  TRACKING_ID text NOT NULL,
  date2 varchar(150) DEFAULT NULL,
  idtable int(10) NOT NULL DEFAULT '0',
  tablem varchar(100) DEFAULT NULL,
  STATUS varchar(10) DEFAULT '0',
  PAYMENT_STATUS varchar(100) NOT NULL,
  REFERENCE_ID varchar(100) NOT NULL,
  PAYMENT_TIME varchar(100) NOT NULL,
  AUTHORIZATION_ID varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");  
     
 }
        if((!$this->db->table_exists('paymentlinks')))
 {
   $this->db->query("CREATE TABLE `paymentlinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `md5id` varchar(100) DEFAULT NULL,
  `comment` varchar(150) DEFAULT NULL,
  `show1` int(10) DEFAULT '0',
  `date1` int(15) NOT NULL,
  `paymentdate` int(15) NOT NULL,
  paymenttext varchar(150) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");  
     
 }
    }

    public function index($page = 1,$show1 = 1) {

        $max = 30;
        $whr = "show1=$show1";
        $searchfor = $this->security->xss_clean($this->input->post('search'));
        if ($searchfor) {

            $whr = " name LIKE '%" . $searchfor . "%' or mobile LIKE '%" . $searchfor . "%'   ";
            $max = 100;
        }

        
        
            $this->db->from('paymentlinks');
        $this->db->where($whr);

        $data['all_count'] = $this->db->count_all_results();
              $data['pages'] = ceil($data['all_count'] / $max) + 1;
        
               $this->db->from('paymentlinks');
        $this->db->order_by('id', 'asc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();





        $gruopname[1] = 'مسؤل';
        $gruopname[2] = 'سائق';
        $gruopname[3] = 'عضو';
        $gruopname[4] = 'موقوف';
        $gruopname[7] = 'موقوف';
        $i = 0;
        foreach ($data['all_groups'] as $row) {


            $i++;
        }
       $data['title'] = 'Dashboard';

        $data['view'] = '../controllers/booking/views/payment/links';

  
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function all($page = 1) {

        $max = 30;
        $whr = "";
        $searchfor = $this->security->xss_clean($this->input->post('search'));
        if ($searchfor) {

            $whr = " name LIKE '%" . $searchfor . "%' or email LIKE '%" . $searchfor . "%'   ";
            $max = 100;
        }

        $data['all_count'] = ceil($this->Db_get->get_conditions_counter('payment', $whr) / $max) + 1;

        $data['all_groups'] = $this->Db_get->get_all_where_paging('payment', "id", $whr, ($max * $page) - $max, $max);




        $gruopname[1] = 'مسؤل';
        $gruopname[2] = 'سائق';
        $gruopname[3] = 'عضو';
        $gruopname[4] = 'موقوف';
        $gruopname[7] = 'موقوف';
        $i = 0;
        foreach ($data['all_groups'] as $row) {


            $i++;
        }
        $data['pages'] = $this->Funadmin->pages($data['all_count'], $page, base_url('payment/admin/all/****/'));
        $data['title'] = 'Dashboard';
        $data['view'] = '../controllers/payment/views/show';
        $data['thispage'] = $this->thispage;
        $breadcrumb = array();
        $breadcrumb[0]['title'] = "الاعضاء";
        $breadcrumb[0]['url'] = 'javascript:void(0);';

        $data['breadcrumb'] = $breadcrumb;
        $this->Funadmin->Viewadmin($data);
    }

    public function add($cats = 1) {
        $add = FALSE;
        $this->cats = $cats;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('amount', '', 'trim|required');
            $this->form_validation->set_rules('name', '', 'trim|required');
            $this->form_validation->set_rules('mobile', '', 'trim|required');

            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {


                $add = TRUE;
                $data = array(
                    'amount' => $this->input->post('amount'),
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'comment' => $this->input->post('comment'),
                    'date1' => time(),
                     'show1' => 1,
                );
                $data = $this->security->xss_clean($data);
                $result = $this->db->insert('paymentlinks', $data);
                if ($result) {
    $id = $this->db->insert_id();
                      $md5 = substr(md5($id . "aln3esa" . time()), 6, 6);
                
                    $edit_data = array(
                        'md5id' => $md5,
                    );
                    $edit_data = $this->security->xss_clean($edit_data);

      $this->booking->whats_send($this->input->post('mobile'), "مرحبا :" . $this->input->post('name') . "\nدفع  مبلغ:  " . $this->input->post('amount') . "\n paykw.net/" . $this->urlboo . '/' . $md5);
                    
                       $this->booking->Sms_send($this->input->post('mobile'), "مرحبا :" . $this->input->post('name') . "\nدفع  مبلغ:  " . $this->input->post('amount') . "\n paykw.net/" . $this->urlboo . '/' . $md5);

                    $result = $this->db->where('id', $id)->update('paymentlinks', $edit_data);
                    $this->session->set_flashdata('msg', 'تم اضافة  الرابط بفضل الله!');
                    redirect(base_url('booking/payment/index/'));
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

            $query = $this->db->get_where('user', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة عضو';

     $data['title'] = 'Dashboard';
         $data['thispage'] = 'payment';

        $data['view'] = '../controllers/booking/views/payment/add';

  
        $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

   public function send($id = 1) {
       
               $query = $this->db->get_where('paymentlinks', array('id' => $id));
        $data['edit'] = $query->row_array();
        
        
        
                      $this->booking->Sms_send($data['edit']['mobile'], "مرحبا :" . $data['edit']['name'] . "\nدفع  مبلغ:  " . $data['edit']['amount'] . "\n paykw.net/" . $this->urlboo . '/' . $data['edit']['md5id']);
        

       
      $this->session->set_flashdata('msg', 'تم ارسال  الرابط بفضل الله!');
                    redirect(base_url('booking/payment/index/'));
        }


  function Sms_send($mobile,$message)
    {

          $url="http://62.150.26.41/SmsWebService.asmx/send";
          
        //$url = 'http://62.150.26.41/Default.aspx';
          
        $params = array(
                'username' => 'Electron',
                'password' => 'rRrRNcAe',
                'token' => 'hjazfzzKhahF3MHj5fznngsb',
                'sender' => 'Electron',
                'message' => $message,
                'dst' => $mobile,
                'type' => 'text',
                'coding' => 'unicode', 
                'datetime' => 'now'
                       );


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);


$result = curl_exec($ch);
if(curl_errno($ch) !== 0) {
    error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
}

curl_close($ch);
$result= explode(",", $result);
if(trim($result[0])!='OK')
{
    echo $mobile;
echo ($result[0]);
///exit;
}
 

           

    }

   
}

?>