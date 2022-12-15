<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriptions extends MY_Controller {

    var $cats;
    var $thispage;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');




        $this->thispage = "subscriptions";
        if ((!$this->db->table_exists('booking_subscriptions'))) {
            $this->db->query("CREATE TABLE `booking_subscriptions` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) DEFAULT NULL,
   `mobile` varchar(255) DEFAULT NULL,
   `cid` varchar(255) DEFAULT NULL,
   `dateadd` varchar(255) DEFAULT NULL,
   `counter` varchar(255) DEFAULT NULL,
      `cat` int(11) DEFAULT NULL,
     `dayfreeall` varchar(255) DEFAULT NULL,
    `dayfree` varchar(255) DEFAULT NULL,
     `dayfree1` varchar(255) DEFAULT NULL,
      `dayfree2` varchar(255) DEFAULT NULL,
       `dayfree3` varchar(255) DEFAULT NULL,
        `dayfree4` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
   `text2` varchar(255) DEFAULT NULL,
   `text3` varchar(255) DEFAULT NULL,
   `text4` varchar(255) DEFAULT NULL,
   `text5` varchar(255) DEFAULT NULL,
   `text6` varchar(255) DEFAULT NULL,
     `text7` varchar(255) DEFAULT NULL,
   `text8` varchar(255) DEFAULT NULL,
     `text9` varchar(255) DEFAULT NULL,
     `text10` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }
    }

    public function index($cats = 1) {
        $this->cats = $cats;
        $this->all($cats, 1);
    }

    public function all($page = 1, $all = '') {

        ///UPDATE `booking_clints` SET `datetext2` = '0'




        $searchfor = $this->security->xss_clean($this->input->get('search'));
        $whr = " counter=1";
     if ($all == 2)
            $whr = " counter=2";

        if ($all == 4)
            $whr = " counter=4";

        if ($all == 3)
            $whr = " counter=3";


        $this->db->from('booking_subscriptions');
        if ($whr)
            $this->db->where($whr);
        $max = 40;

        $data['all_count'] = ceil($this->db->count_all_results() / $max);

        $this->db->from('booking_subscriptions');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);

        $this->db->limit($max, ($max * $page) - $max);

        $data['all_groups'] = $this->db->get()->result_array();



        if ($searchfor) {
            $this->booking->add_rep_user("  البحث عن    " . $searchfor);
            $split_stemmed = explode(" ", $searchfor);
            $whr = " (";
            while (list($key, $val) = @each($split_stemmed)) {
                if ($val <> " " and strlen($val) > 0) {

                    $whr .= " ( BINARY cid LIKE '%" . $val . "%'   ) and";
                }
            }
            $whr = substr($whr, 0, (strLen($whr) - 4));
            $whr .= " )or     cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";



            $query = $this->db->query('SELECT * FROM booking_clints where ' . $whr);
            $data['all_count'] = 0;
            $whr = '';
            $data['all_groups'] = $query->result_array();
            $data['all_count'] = count($data['all_groups']);
            // echo print_r($this->db->last_query());
        }
        /// $whr=" cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";







        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'العملاء';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function add($cats = 1) {
        $add = FALSE;
        $this->cats = $cats;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cid', '', 'trim|required');
            $this->form_validation->set_rules('name', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {


                $add = TRUE;
                $data = array(
                    'cid' => $this->input->post('cid'),
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'dateadd' => time(),
                    'counter' => '1',
                    'text1' => $this->input->post('text1'),
                    'text2' => $this->input->post('text2'),
                    'text3' => $this->session->userdata('name'),
                );
                
                
                $data = $this->security->xss_clean($data);
                $result = $this->booking->insert('booking_subscriptions', $data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'تم اضافة القسم بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/index/'));
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 


            $data['title'] = 'اضافة ';
            $data['cats'] = $this->cats;
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function show($id) {

        $query = $this->db->get_where('booking_subscriptions', array('id' => $id));
        $data['show'] = $query->row_array();


        if ($data['show']['text1'] == '1')
            $data['show']['text1'] = 'ذهبية';
        if ($data['show']['text1'] == '2')
            $data['show']['text1'] = 'فضية';
        if ($data['show']['text1'] == '3')
            $data['show']['text1'] = 'برونزية';



        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->where(" cid ='" . $data['show']['cid'] . "'   and timeend2!='' ");
        $data['all_groups'] = $this->db->get()->result_array();
        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->where(" cid ='" . $data['show']['cid'] . "'  and comment1!=''  ");
        $data['all_groups2'] = $this->db->get()->result_array();
        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->where(" cid ='" . $data['show']['cid'] . "'  and comment7!=''  ");
        $data['all_groups3'] = $this->db->get()->result_array();
//echo print_r($this->db->last_query());

        $add = FALSE;













        $data['title'] = '  عرض عميل';
        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function del($id) {
        $query = $this->db->get_where('booking_clints', array('id' => $id));
        $data['edit'] = $query->row_array();


        $this->db->where('id', $id);
        $result = $this->booking->delete('booking_clints');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  القسم بفضل الله!');
            redirect(base_url('booking/clints/index/'));
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('booking_clints', array('id' => $id));
        $data['edit'] = $query->row_array();
        echo $data['edit']['oky'];
        $data['edit']['checked'] = array('', '', '', '', '', '', '', '', '');
        if (!$data['edit']['oky'])
            $data['edit']['oky'] = '1';
        if ($data['edit']['oky'] == 'star')
            $data['edit']['oky'] = '2';
        if ($data['edit']['oky'] == 'ok')
            $data['edit']['oky'] = '3';
        $data['edit']['checked'][$data['edit']['oky']] = 'checked';
        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cid', '', 'trim|required');
            $this->form_validation->set_rules('name', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {




                $file1 = $data['edit']['file1'];
                $fieldname = 'file1';
                if ($_FILES[$fieldname]['name'] != "") {
                    $upload_data = $this->booking->upload_many_photos($fieldname, $this->input->post('cid') . '1');
                    $file1 = "upload/" . $upload_data["file_name"];
                }
                $file2 = $data['edit']['file2'];
                $fieldname = 'file2';
                if ($_FILES[$fieldname]['name'] != "") {
                    $upload_data = $this->booking->upload_many_photos($fieldname, $this->input->post('cid') . '2');
                    $file2 = "upload/" . $upload_data["file_name"];
                }

                $add = TRUE;
                $edit_data = array(
                    'cid' => $this->input->post('cid'),
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'country' => $this->input->post('country'),
                    'comment' => $this->input->post('comment'),
                    'oky' => $this->input->post('oky'),
                    'file1' => $file1,
                    'file2' => $file2,);
                $edit_data = $this->security->xss_clean($edit_data);
                $result = $this->db->where('id', $id);$this->booking->update('booking_clints', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل القسم بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/index/'));
                }
            }
        }


        if (!$add) {










            $data['title'] = 'تعديل  شقة';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/edit';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function change($id) {

        $this->db->where('id', $id);$this->booking->update('booking_subscriptions', array('counter' => '4'));

        $this->session->set_flashdata('msg', 'تم نقل للارشيف   بفضل الله');
        redirect(base_url() . 'booking/subscriptions');
    }

    public function took($id) {

        $query = $this->db->get_where('booking_subscriptions', array('id' => $id));
        $data['show'] = $query->row_array();


        $edit_data = array(
            'text6' => 'موكد',
        );
        $edit_data = $this->security->xss_clean($edit_data);
        $result = $this->db->where('id', $id);$this->booking->update('booking_subscriptions', $edit_data);

        $this->session->set_flashdata('msg', 'تم التاكيد     بفضل الله');
        redirect(base_url() . 'booking/subscriptions');
    }

    public function oky($id) {

        $query = $this->db->get_where('booking_subscriptions', array('id' => $id));
        $data['edit'] = $query->row_array();

        if ($data['edit']['text1'] == 1) {
            $day = 30;
            $day2 = 15;
            $name = "الذهبية";
        }
        if ($data['edit']['text1'] == 2) {
            $day2 = 10;
            $day = 20;
            $name = " الفضية";
        }
        if ($data['edit']['text1'] == 3) {
            $day2 = 5;
            $day = 10;
            $name = "البرونزية";
        }
        if ($this->input->post('text5') == 'cash') {
            $dataadd = array(
                'catid' => '1',
                'text1' => $this->input->post('text4'),
                'text2' => " " . "اشتراك العميل : " . $data['edit']['cid'] . "  كاش ",
                'dateadd' => $this->booking->data_day(13),
                'counter' => '1',
                'text3' => '',
            );
            $dataadd = $this->security->xss_clean($dataadd);
            $result = $this->booking->insert('model_billshawly', $dataadd);
        }



        if ($this->input->post('text5') == 'knet') {
            $dataadd = array(
                'catid' => '1',
                'text1' => $this->input->post('text4'),
                'text2' => " " . "اشتراك العميل : " . $data['edit']['cid'] . "  knet ",
                'dateadd' => $this->booking->data_day(13),
                'counter' => '1',
                'text3' => '',
            );
            $dataadd = $this->security->xss_clean($dataadd);
            $result = $this->booking->insert('model_billshawly', $dataadd);
        }

        
        
        
            $dbhost = "localhost"; // الخادم
        $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
        $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
        $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
        
        
//         $dbuser = "root";  // إسم مستخدم قاعدة البيانات
//       $dbpass = "root";     // باسويرد قاعدة البيانات
//     $dbname = "booking"; // إسم قاعدة البيانات
        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
            $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            // $mysqli22 = new mysqli("localhost", "root", "root", "chang");
            mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
            mysqli_query($mysqli22, "SET NAMES utf8");
            
            
             if (@stristr($_SERVER['REQUEST_URI'], 'booking')) {
            $ssss = 2;
            $ddd = "حولي";
            if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {
                $ddd = "السالمية";
                $ssss = 1;
            }

            if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {
                $ddd = "الرقعي";
                $ssss = 7;
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {
                $ddd = "الشعب";
                $ssss = 8;
            }
        }
        
        
        
         
        
        
         $cccc = ( "insert booking_subscriptions set cat='$ssss',counter='2',cid='" . $data['edit']['cid'] . "',name='" . $data['edit']['name'] . "',mobile='" . $data['edit']['mobile'] . "',dateadd='" . $data['edit']['dateadd'] . "',text1='" . $data['edit']['text1'] . "',text3='" . $data['edit']['text3'] . "',text4='" . $this->input->post('text4') . "',text7='" . time() . "',text5='" . $this->input->post('text5') . "',text2='" . $this->input->post('text2') . "',dayfreeall='" . $day . "',dayfree='" .$day . "' ");
            mysqli_query($mysqli22, $cccc)or die($mysqli22->error);
      
        }
        $edit_data = array(
            'counter' => '2',
            'text7' => time(),
            'text5' => $this->input->post('text5'),
            'text4' => $this->input->post('text4'),
            'text2' => $this->input->post('text2'),
        );
        $edit_data = $this->security->xss_clean($edit_data);
        $result = $this->db->where('id', $id);$this->booking->update('booking_subscriptions', $edit_data);

        
$this->booking->Sms_send($data['edit']['mobile'], "تم اشتراك بالباقة   " . $name . "\n رصيدك   :   " . $day ." ايام  \n شكرا لثقتكم ");
        $this->session->set_flashdata('msg', 'تم تاكيد  بفضل الله');
        redirect(base_url() . 'booking/subscriptions');
    }

}

?>