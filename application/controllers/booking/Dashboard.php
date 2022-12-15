<?php

//UPDATE `booking` SET `timecleanfinsh` = '' WHERE `booking`.`timecleanfinsh` = '-10800';UPDATE `booking` SET `timerenew` = '' WHERE `booking`.`timerenew` = '-10800';

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    ///ALTER TABLE `booking` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_booked` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_checkall` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_checkroom` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_lost` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_note` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_note` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_producer` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_raoter` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_rooms` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_rooms` ADD `cat` INT NOT NULL AFTER `id`;ALTER TABLE `booking_rooms_images` ADD `cat` INT NOT NULL AFTER `id`;

    var $data_day;
    var $user, $noaroom;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
        $this->load->helper('download');
        $this->load->library('zip');
        $this->data_day = $this->booking->data_day();
        $this->user = $this->session->userdata('name');


        ///  $this->booking->Sms_send("55544445","ok");

        $this->noaroom[1] = "واحد  مزدوج";
        $this->noaroom[2] = "اثنين    مزدوج";
        $this->noaroom[3] = "  مزدوج واثنين فردي";
        $this->noaroom[4] = "مزودج واربعه فردي";


        if (count($this->db->list_fields('booking')) == 37) {
            $this->db->query('ALTER TABLE `booking` ADD `msgmove` text NOT NULL ;');
            $this->db->query('ALTER TABLE `booking` ADD `timemove`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking` ADD `3gd`  VARCHAR(20) NOT NULL ;');
        }
        if (count($this->db->list_fields('booking')) == 40) {
            $this->db->query('ALTER TABLE `booking` ADD `timecleanfinsh`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking` ADD `outsite`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking` ADD `timeoutsite`  VARCHAR(20) NOT NULL ;');
        }
        if (count($this->db->list_fields('booking')) == 45) {
            $this->db->query('ALTER TABLE `booking` ADD `dayfree`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking` ADD `dayfree2`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking` ADD `dayfree3`  VARCHAR(20) NOT NULL ;');
        }
        if (count($this->db->list_fields('booking')) == 48) {


            $this->db->query('ALTER TABLE `booking` ADD `msgwait` text NOT NULL ;');
        }

        if (count($this->db->list_fields('booking')) == 49) {


            $this->db->query('ALTER TABLE `booking` ADD `bookedok` VARCHAR(20)  NULL ;');
        }
        
        
        

        if (count($this->db->list_fields('booking')) == 50) {


            $this->db->query('ALTER TABLE `booking` ADD `3gdok` VARCHAR(20)  NULL ;');
        }
        if (count($this->db->list_fields('booking')) == 51) {


            $this->db->query('ALTER TABLE `booking` ADD `knetcode` VARCHAR(20)  NULL ;');
        }
             if (count($this->db->list_fields('booking')) == 52) {


            $this->db->query(' ALTER TABLE `booking` ADD `inok` INT NOT NULL AFTER `knetcode`, ADD `outok` INT NOT NULL AFTER `inok`;');
        }
       
        if (count($this->db->list_fields('booking_clints')) == 17) {
            $this->db->query('ALTER TABLE `booking_clints` ADD `dayfree`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking_clints` ADD `dayfree2`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking_clints` ADD `dayfree3`  VARCHAR(20) NOT NULL ;');
        }
           if (count($this->db->list_fields('booking_clints')) == 20) {
            $this->db->query('ALTER TABLE `booking_clints` ADD `checkok` INT NOT NULL AFTER `dayfree3`;');
        }
            if (count($this->db->list_fields('booking_gyab')) == 9) {
            $this->db->query('ALTER TABLE `booking_gyab` ADD `comment` TEXT  NULL AFTER `outdev`;');
        }
             if (count($this->db->list_fields('booking_gyab')) == 10) {
            $this->db->query(' ALTER TABLE `booking_gyab` CHANGE `comment` `comment` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;');
              $this->db->query('ALTER TABLE `booking_gyab` ADD `image` TEXT  NULL AFTER `comment`;');
        }
        
       
        
        if ((!$this->db->table_exists('booking_rating'))) {
            $this->db->query("CREATE TABLE `booking_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rat1` int(11) DEFAULT '0',
  `rat2` int(11) DEFAULT '0',
  `rat3` int(11) DEFAULT '0',
  `rat4` int(11) DEFAULT '0',
  `rat5` int(11) DEFAULT '0',
    `ratall` int(11) DEFAULT '0',
    `md5id` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `idbook` int(11) DEFAULT '0',
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }
        if ((!$this->db->table_exists('booking_card'))) {
            $this->db->query("CREATE TABLE `booking_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
      `booking` int(11) DEFAULT '0',
    `room` int(11) DEFAULT '0',
    `cid` VARCHAR(100),
  `timeenter` varchar(255) DEFAULT NULL,
   `timeend` varchar(255) DEFAULT NULL,
    `counter` int(11) DEFAULT '0',
      `user` varchar(255) DEFAULT NULL,
            `user2` varchar(100) DEFAULT NULL,
              `comment` text,
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }
        if (count($this->db->list_fields('booking_rating')) == 11) {


            $this->db->query('ALTER TABLE `booking_rating` ADD `comment` text NOT NULL ;');
        }
        if (count($this->db->list_fields('booking_rating')) == 12) {


            $this->db->query('ALTER TABLE `booking_rating` ADD `cid` VARCHAR(20)  NULL  ;');
        }
        if ((!$this->db->table_exists('booking_msg'))) {
            $this->db->query("CREATE TABLE `booking_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `msg` text,
  `dateadd` varchar(255) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `idmsg` int(11) DEFAULT '0',
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }

        if ((!$this->db->table_exists('booking_lost'))) {
            $this->db->query("CREATE TABLE `booking_lost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text,
  `dateadd` varchar(255) DEFAULT NULL,
  `idbook` int(11) DEFAULT '0',
    `counter` int(11) DEFAULT '0',
      `datefinsh` varchar(255) DEFAULT NULL,
            `user` varchar(100) DEFAULT NULL,
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }

        if ((!$this->db->table_exists('booking_note'))) {
            $this->db->query("CREATE TABLE `booking_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
    `cat` int(11) DEFAULT '0',
  `dateadd` varchar(255) DEFAULT NULL,

  `user` varchar(100) DEFAULT NULL,
  `counter` int(11) DEFAULT '0',
    `datefinsh` varchar(255) DEFAULT NULL,
    `userfinsh` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }
        if (count($this->db->list_fields('booking_note')) == 8) {
            $this->db->query('ALTER TABLE `booking_note` ADD `mobile`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking_note` ADD `hour`  VARCHAR(20) NOT NULL ;');
            $this->db->query('ALTER TABLE `booking_note` ADD `day`  VARCHAR(20) NOT NULL ;');
        }

        if (count($this->db->list_fields('booking_note')) == 11) {
            $this->db->query('ALTER TABLE `booking_note` ADD `comm`  VARCHAR(150) NOT NULL ;');
        }


        $this->db->update('booking_booked', array(
            'show1' => '3',
                ), "show1=1 and  dateadd<" . (time() - (10 * 60)));
    }

    public function dbexport() {
        $this->booking->dbexport();
    }

    public function zip() {
        $this->load->library('zip');




        $this->load->dbutil();
        $db_format = array(
            'ignore' => array($this->ignore_directories),
            'format' => 'zip',
            'filename' => 'my_db_backup.sql',
            'add_insert' => TRUE,
            'newline' => "\n"
        );
        $backup = & $this->dbutil->backup($db_format);
        //// $dbname = 'my_db_backup.zip';
///$this->zip->add_data($dbname, $backup);
///$zip_file = $this->zip->get_zip();





        $path = '../application/';
        if (!file_exists($path)) {
            echo 111;
        }
///$this->zip->read_dir($path);

        $this->zip->download('my_backup.zip');
    }

    function sum_bill($catid) {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        $query = $this->db->get('model_billshawly')->row_array();
        return $query['text1'];
    }

    public function index($day = '') {



        $data['noaroom'] = $this->noaroom;
        $this->db->from('booking_rooms')->where("  conter=1 ");
        $data['all_rooms_1'] = $this->db->count_all_results();

        $this->db->from('booking_rooms')->where("  conter=2 ");
        $data['all_rooms_2'] = $this->db->count_all_results();

        $this->db->from('booking_rooms')->where("  conter=3 ");
        $data['all_rooms_3'] = $this->db->count_all_results();


        $this->db->from('booking');
        $this->db->where("  datetext4 = '" . $this->data_day . "'  ");
        $data['all_booking_day'] = $this->db->count_all_results();



        $this->db->from('booking_booked');
        $this->db->where("  show1 = '4' or (datetext4=" . $this->data_day . " and show1='8') ");
        $data['bookedall'] = $this->db->count_all_results();




        $this->db->select_sum('bill');
        $this->db->where(" ( billexport=''  ) and datetext4 = '" . $this->data_day . "' ");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['bill'];
        if (!$data['all_bill'])
            $data['all_bill'] = 0;
//echo print_r($this->db->last_query());



        $this->db->select_sum('knet');
        $this->db->where("  ( billexport=''  ) and datetext4 = '" . $this->data_day . "' and knet!=''");
        $query = $this->db->get('booking')->row_array();
        $data['all_knet'] = $query['knet'];

        $data['all_cash'] = ($this->sum_bill("1  and text3!=1 ") + $this->sum_bill('4') + $this->sum_bill('6')) - ($this->sum_bill('2  and text3!=1') + $this->sum_bill('5') + $this->sum_bill('3') + $this->sum_bill('8'));


        $data_dayxx = $this->booking->data_day(13);

        $this->db->from('model_billshawly');
        $this->db->where("  dateadd='$data_dayxx'  and `text2`   LIKE '%knet%' and catid=1 ");
        $iamgeall = 0;
        $data['all_111'] = $this->db->get()->result_array();
        if ($data['all_cash'] > 0) {

            foreach ($data['all_111'] as $row) {

                $data['all_cash'] = $data['all_cash'] - $row['text1'];
            }
        }




        $data['all_cash'] = ($data['all_bill'] - $data['all_knet']) + $data['all_cash'];
        $this->db->from('booking');
        $this->db->where("  counter=1 ");
        $data['all_rooms'] = $this->db->count_all_results();

        $this->db->from('booking');
        $this->db->where("  counter=1 ");
        $iamgeall = 0;
        $data['all_roomscid'] = $this->db->get()->result_array();
        foreach ($data['all_roomscid'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();

            if ((int) $row['timeend'] < (int) $this->booking->tissme_now()) {
                $msgwait = explode("<aln3esa>", $row['msgwait']);
                $msgwait2 = '';
                if (isset($msgwait[count($msgwait) - 2])) {
                    $msgwait2 = $msgwait[count($msgwait) - 2];
                    $msgss = explode("||", $msgwait2);
                    $msgwait2 = $msgss[0];


                    if ((int) ($msgss[1] + (3 * 60 * 60)) < (int) $this->booking->tissme_now()) {

                        $msgwait2 = '';
                    }
                }
                if ($msgwait2 == '' and ((int) $row['timeend'] + (30 * 60)) < (int) $this->booking->tissme_now())
                    $data['msg'][] = "يرجا  كتابة ملاحظة التاخير على  شقة :  " . $row['room'];
            }
            
                   $query = $this->db->get_where('booking_rooms', array('name' => $row['room']));
            $room = $query->row_array();
            
            
             if ($room['conter'] != 2) {
              $this->db->where('name', $row['room']);
              $this->booking->update('booking_rooms', array('conter' => '2'));
             }
            if ($clints['file1'] or $clints['file2']) {

                if (!file_exists($clints['file1']))
                    $data['msg'][] = "يرجا رفع اثبات العميل شقة  :  " . $row['room'];
            } else {
                $iamgeall++;
                $data['msg'][] = "يرجا رفع اثبات العميل شقة  :  " . $row['room'];
            }
        }



        $data['msgview'] = '';


        $this->db->from('booking_msg');
        $this->db->where("idmsg=0");
        $this->db->not_like('user', "||" . $this->session->userdata('name'));
        $this->db->limit('5');
        $this->db->order_by('id', 'desc');

        $all_msgs = $this->db->get()->result_array();
        foreach ($all_msgs as $row):
            $data['msgview'] = '      <div class="row">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">رسالة جديد</h3>

           
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           ' . $row['title'] . '
            </div>
             <br>  
               <div class="box-tools pull-right">
                     <a class="btn btn-danger btn-xs" style="    margin-top: -20px;
    margin-right: 20px;" href=" ' . base_url('booking/Dashboard/readmsg/' . $row['id']) . '">قراءة  </a>
              </div>
       
             <br>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>';

        endforeach;
        $this->db->from('booking');
        $this->db->where("  datetext4 = '" . $this->data_day . "'  ");
        $data['all_booking_day'] = $this->db->count_all_results();

        $this->db->from('booking');
        $this->db->where("  `counter` = '1' and (  timeend < " . $this->booking->tissme_now() . ") ");
        $data['clintsout'] = $this->db->count_all_results();


        $this->db->from('booking_note');
        $this->db->order_by('hour', 'asc');
        ///  $this->db->order_by('id', 'desc');
        $this->db->where("  counter = '0'  ");
        $data['all_note'] = $this->db->get()->result_array();

        $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');

        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $this->db->from('booking');
            $this->db->order_by('id', 'desc');
            $this->db->where(" room=" . $row['name'] . " and counter=1 ");

            if ($this->db->count_all_results() > 0 and $row['conter'] == '1') {

                $this->db->where('name', $row['name'])->where('conter', '1');
                $this->booking->update('booking_rooms', ['conter' => '2']);
                //$data['all_groups'][$i]['conter']=$row['conter']='2';
            }
            /// if ($this->db->count_all_results() == 0 and $row['conter'] != '3') {
            ///      $this->db->where('room', $row['name'])->where('conter', '2');$this->booking->update('booking_rooms', ['conter' => '1']);
            //$data['all_groups'][$i]['conter']=$row['conter']='1';
            ///  }



            $data['all_groups'][$i]['color'] = 'bg-yellow';
            $data['all_groups'][$i]['timeend'] = '';
            if ($row['conter'] == 1) {
                $data['all_groups'][$i]['color'] = 'bg-green';
                $data['all_groups'][$i]['noa'] = $this->noaroom[$row['noa']];
            }



            if ($row['conter'] == 4)
                $data['all_groups'][$i]['color'] = 'bg-gray';

            $data['all_groups'][$i]['bookig'] = '';

            if ($row['conter'] == 3) {
                $query = $this->db->order_by('timeend2', 'desc')->limit('1')->get_where('booking', array('room' => $row['name'], 'counter' => '2'));

                $data['edit'] = $query->row_array();
                $data['all_groups'][$i]['checkout'] =  (isset($data['edit']['checkout']) ? $data['edit']['checkout']: '');

                $data['all_groups'][$i]['checkclean'] =  (isset($data['edit']['checkclean']) ? $data['edit']['checkclean']: '');
                $data['all_groups'][$i]['bookingid'] =(isset($data['edit']['id']) ? $data['edit']['id']: '');
                $data['all_groups'][$i]['timeend2'] =  (isset($data['edit']['timeend2']) ? $data['edit']['timeend2']: '');

                if (!isset($data['edit']['checkout']))
                    $data['msg'][] = "يرجا تغير شقة " . $row['name'] . "من تحت التشيك الى النظافة ووضع اسم المشيك";
            }

            if ($day and $row['conter'] != 4 and $row['conter'] == 3) {


                $data['all_groups'][$i]['conter'] = 1;
                $data['all_groups'][$i]['color'] = 'bg-green';
                $data['all_groups'][$i]['noa'] = $this->noaroom[$row['noa']];
            }
            if ($row['conter'] == 2) {


                $where = (" room=" . $row['name'] . " and counter=1 ");
                if ($day)
                    $where = (" room=" . $row['name'] . " and counter=1    and timeend> " . (strtotime($day) + 86400));
                $query = $this->db->order_by('id', 'desc')->limit('1')->get_where('booking', $where);

                $data['edit'] = $query->row_array();
if(!isset($data['edit']['name']))echo  $row['name'];

                $MshrfAll2 = explode(" ", trim($data['edit']['name']));
                if (!isset($MshrfAll2[1]))
                    $MshrfAll2[1] = '';
                    
                $data['all_groups'][$i]['bookingname'] = $MshrfAll2[0] . '  ' . $MshrfAll2[1];
                $data['all_groups'][$i]['bookingid'] = $data['edit']['id'];
                $data['all_groups'][$i]['outsite'] = $data['edit']['outsite'];
                $data['all_groups'][$i]['bookedok'] = $data['edit']['bookedok'];
                $data['all_groups'][$i]['checkout'] = $data['edit']['checkout'];

                $data['all_groups'][$i]['checkclean'] = $data['edit']['checkclean'];

                $data['all_groups'][$i]['color'] = 'bg-red';
                if ((int) $data['edit']['timeend'] < (int) $this->booking->tissme_now())
                    $data['all_groups'][$i]['color'] = 'bg-primary';
                $data['all_groups'][$i]['timeend'] = $data['edit']['timeend'];
                $data['all_groups'][$i]['commentnbeh'] = $data['edit']['commentnbeh'];


                if (!$data['edit']['name']) {

                    $data['all_groups'][$i]['conter'] = 1;
                    $data['all_groups'][$i]['color'] = 'bg-green';
                    $data['all_groups'][$i]['noa'] = $this->noaroom[$row['noa']];
                }
            }



            $i++;
        }

        $dbhost = "localhost"; // الخادم
        $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
        $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
        $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
//        
//          $dbuser = "root";  // إسم مستخدم قاعدة البيانات
//   $dbpass = "root";     // باسويرد قاعدة البيانات
// $dbname = "mktba2018"; // إسم قاعدة البيانات
        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
            $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            // $mysqli22 = new mysqli("localhost", "root", "root", "chang");
            mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
            mysqli_query($mysqli22, "SET NAMES utf8");

            $ssss = 2;

            if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {

                $ssss = 1;
            }

            if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {

                $ssss = 3;
            }
            if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {

                $ssss = 4;
            } if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {

                $ssss = 5;
            }
            if (@stristr($_SERVER['REQUEST_URI'], 'booking8')) {

                $ssss = 9;
            }
            ///and text21='$ssss' 
            $arraystat = mysqli_query($mysqli22, "select * from  `model_modif` where  text20!='modif' and text22!='1' and ( text21='$ssss'   or  text23='2' ) order by text1  asc  ");
            ///   $data['modif']=mysqli_fetch_array($arraystat);
            ///$data['modif']=mysqli_fetch_array($arraystat);

            $i = 0;
            $data['modif'] = array();
            while ($rowaa = mysqli_fetch_array($arraystat)) {
                if ($rowaa['text1'] != "المصبغة") {
                    $data['modif'][$i]['name'] = $rowaa['text1'];
                    $data['modif'][$i]['text6'] = $rowaa['text6'];
                    $data['modif'][$i]['text7'] = $rowaa['text7'];
                    ///  $rowaa['dateadd'];
                    $i++;
                }
            }
        }


        $this->db->from('booking_gyab');
        $this->db->order_by('id', 'desc');
        $this->db->where("outsite IS NULL");
        $data['all_gyab'] = $this->db->get()->result_array();

        foreach ($data['all_gyab'] as $row) {

            /// echo  $row['name'];
        }
        $data['title'] = 'الرئيسية';
        $data['view'] = '../controllers/booking/views/dashboard';
        /// $this->load->view('../controllers/booking/views/layout', $data);


        if ($this->session->userdata('checkout'))
            $data['view'] = '../controllers/booking/views/checkout';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function msgs($page = 1) {

        $whr = "idmsg=0";


        $this->db->from('booking_msg');
        if ($whr)
            $this->db->where($whr);
        $max = 20;
        $data['all_count'] = ceil($this->db->count_all_results() / $max) + 1;




//echo print_r($this->db->last_query());

        $this->db->from('booking_msg');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();

        $gruopname[1] = 'مدير';
        $gruopname[2] = 'موظف استقبال';
        $gruopname[3] = 'مسول فرع';
        $gruopname[4] = 'موقوف';
        $gruopname[5] = 'شك اوت';
        $i = 0;
        foreach ($data['all_groups'] as $row) {
//$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];

            $i++;
        }
        $data['title'] = 'Dashboard';
        $data['view'] = '../controllers/booking/views/msgs';

        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function readmsg($id) {



        $query = $this->db->get_where('booking_msg', array('id' => $id, 'idmsg' => '0'));
        $data['show'] = $query->row_array();




        if ($this->input->post('submit')) {

            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 



            $dataedit = array(
                'user' => $data['show']['user'] . "||" . $this->user,
            );
            /// print_r($data);exit;
            $dataedit = $this->security->xss_clean($dataedit);
            $this->db->where('id', $id);
            $this->booking->update('booking_msg', $dataedit);

            if ($this->input->post('msg')) {
                $add = TRUE;
                $data = array(
                    'idmsg' => $id,
                    'msg' => $this->input->post('msg'),
                    'title' => $this->user,
                    'dateadd' => $this->booking->tissme_now(),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->booking->insert('booking_msg', $data);
                if ($result) {
                    
                }
            }
            $this->session->set_flashdata('msg', 'تم  تاكيد الرسالة بفضل الله!');
            redirect(base_url('booking/Dashboard//'));
        }


        ///$this->booking->add_rep_user("نقل شقة ".$data['show']['room']);

        $data['view'] = '../controllers/booking/views/users/readmsg';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function moveroom($id) {
        $roomnew = $this->input->post('roomnew');
        if (isset($roomnew)) {


            $query = $this->db->get_where('booking', array('id' => $id));
            $data['show'] = $query->row_array();

            $this->db->where('name', $data['show']['room']);
            $this->booking->update('booking_rooms', array('conter' => '3'));
            $this->booking->send_push("room No . " . $data['show']['room']);
            $this->db->where('name', $roomnew);
            $this->booking->update('booking_rooms', array('conter' => '2'));


            $this->db->where('id', $data['show']['id']);
            $this->booking->update('booking', array('room' => $roomnew, 'msgmove' => $this->input->post('msgmove'), 'timemove' => $this->booking->tissme_now(), 'oldroom' => $data['show']['room']));


            $this->session->set_flashdata('msg', 'تم   عمل نقل الشقة بفضل الله!');



            $query = $this->db->get_where('booking', array('id' => $id));
            $row = $query->row_array();

            if (round(((( $row['timemove'] - $row['timeenter']) / 60) / 60), 0) > 1) {
                $msg = "نقل شقة " . $data['show']['room'] . " - السبب : " . $this->input->post('msgmove');

                $this->booking->add_rep_user($msg);
                $this->booking->whats_send("67769595", $msg . " -" . $this->session->userdata('name'));
            }
            ///$this->booking->add_rep_user("نقل شقة ".$data['show']['room']);
        }
        redirect(base_url() . 'booking/dashboard');
    }

    public function backroom($id) {
        $roomnew = $this->input->post('roomnew');
        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();
        $this->db->where('name', $data['show']['room']);
        $this->booking->update('booking_rooms', array('conter' => '2'));


        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('counter' => '1', 'timeend2' => ''));
        /// $this->booking->add_rep_user(" استرجاع " . $data['show']['room'] . " -: السبب" . $this->input->post('comment'));

        $msg = " استرجاع " . $data['show']['room'] . " -: السبب" . $this->input->post('comment');

        $this->booking->add_rep_user($msg);
        if (!$this->session->userdata('editor') and!$this->session->userdata('group')) {
            $this->booking->whats_send("67769595", $msg . " -" . $this->session->userdata('name'));
        }
        $this->session->set_flashdata('msg', 'تم  استرجاع  الشقة بفضل الله!');
        redirect(base_url() . 'booking/dashboard');
    }

    public function addnote() {


        $dataadd = array('dateadd' => $this->booking->tissme_now(),
            'title' => $this->input->post('title'),
            'mobile' => $this->input->post('mobile'),
            'hour' => $this->input->post('hour'),
            'comm' => $this->input->post('comm'),
            'day' => $this->input->post('day'),
            'cat' => $this->input->post('cat'),
            'user' => $this->session->userdata('name'),
        );
        $dataadd = $this->security->xss_clean($dataadd);
        $result = $this->booking->insert('booking_note', $dataadd);
        $this->session->set_flashdata('msg', 'تم اضافة الملاحظة  بفضل الله!');

        redirect(base_url() . 'booking/dashboard');
    }

    public function msgwait($id) {
        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();
        $msgwait = $data['show']['msgwait'] . $this->input->post('msgwait') . "||" . $this->booking->tissme_now() . "||" . $this->session->userdata('name') . "<aln3esa>";

        $this->db->where('id', $id);
        $this->booking->update('booking', array('msgwait' => $msgwait));





        $this->session->set_flashdata('msg', 'تم     الانتهاء من الملاحظة بفضل الله');
        ///$this->booking->add_rep_user("نقل شقة ".$data['show']['room']);

        redirect(base_url() . 'booking/dashboard');
    }

    public function notefinsh($id, $counter) {



        $this->db->where('id', $id);
        $this->booking->update('booking_note', array('counter' => $counter, 'userfinsh' => $this->session->userdata('name'), 'datefinsh' => $this->booking->tissme_now()));





        $this->session->set_flashdata('msg', 'تم     الانتهاء من الحجز بفضل الله');
        ///$this->booking->add_rep_user("نقل شقة ".$data['show']['room']);

        redirect(base_url() . 'booking/dashboard');
    }

    public function gyab() {

        if ($this->input->post('addnote')) {


            $dbhost = "localhost"; // الخادم
            $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
            $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
            $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
//           $dbuser = "root";  // إسم مستخدم قاعدة البيانات
//       $dbpass = "root";     // باسويرد قاعدة البيانات
//     $dbname = "mktba2018"; // إسم قاعدة البيانات
            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                // $mysqli22 = new mysqli("localhost", "root", "root", "chang");
                mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli22, "SET NAMES utf8");


                $rowarrays = mysqli_query($mysqli22, "select * from  model_modif where text1='" . $this->input->post('modif') . "'  order by id desc  LIMIT 0,1 ");
                $rowarrays = mysqli_fetch_array($rowarrays);

                $text2 = "  ملاحظة :    " . $this->input->post('note');

                $this->load->library('upload');
                $file1 = '';
                $fieldname = 'file1';
                if ($_FILES[$fieldname]['name'] != "") {

                    $ssss = "";

                    if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {

                        $ssss = 2;
                    }

                    if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {

                        $ssss = 4;
                    }
                    if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {

                        $ssss = 5;
                    }
                    if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {

                        $ssss = 6;
                    }
                    $upload_data = $this->booking->upload_many_photos($fieldname, time() . '1');
                    $file1 = "http://kuwaitycar.com/booking$ssss/upload/" . $upload_data["file_name"];
                }

                mysqli_query($mysqli22, "insert model_modif set dateadd='" . date("Ymd", time()) . "',counter='1',text19='" . $rowarrays['text2'] . "',text1='0',text2='$text2',text18='$file1',text20='modif' ");

                $this->booking->Sms_send("55992222,55544445,67769595," . $rowarrays['text10'], "ملاحظة"
                        . "\n"
                        . $this->input->post('modif')
                        . "\n"
                        . $this->input->post('note')
                        . "\n"
                        . ( $file1));
            }
            $this->session->set_flashdata('msg', '   تم اضافة الملاحظة بفضل الله!');
        } else {




            if ((!$this->db->table_exists('booking_gyab'))) {
                $this->db->query("CREATE TABLE `booking_gyab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `enter` varchar(255) DEFAULT NULL,
  `outsite` varchar(255) DEFAULT NULL,
    `userenter` varchar(255) DEFAULT NULL,
      `userout` varchar(255) DEFAULT NULL,
        `enterdev` varchar(255) DEFAULT NULL,
                `outdev` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
            }
            $dateadd = date('Ymd', $this->booking->tissme_now());
            $modif = explode('-', $this->input->post('modif'));

            $submit2 = $this->input->post('submit2');
            $submit = $this->input->post('submit');


            if ($modif[0]) {
                $query = $this->db->order_by('id', 'desc')->get_where('booking_gyab', array('dateadd' => $dateadd, 'name' => $modif[0]));
                $clints = $query->row_array();
                ///($clints['enter'] and $clints['outsite'])or
                if ((!$clints['dateadd'] ) and $submit) {

 $fieldname = 'file1';
                if ($_FILES[$fieldname]['name'] != "") {
                    $config['upload_path'] = '../gyab/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG';
                    $config['max_size'] = '50000';
                    $config['file_name'] =$this->booking->tissme_now() . time();
                    $this->load->library('upload', $config);
                    $this->upload->do_upload($fieldname);
                    $upload_data = $this->upload->data();
                    $file1 = "../gyab/" . $upload_data["file_name"];
                }



                    ///date('Ymd  -  H:i', $this->booking->tissme_now()),
                    $dataadd = array('dateadd' => $dateadd,
                        'name' => $modif[0],
                        'enter' => $this->booking->tissme_now(),
                        'userenter' => $this->session->userdata('name'),
                       'comment' => $this->input->post('comment'),
                        'enterdev' => $modif[1],
                          'image' => $file1,
                    );
                    $dataadd = $this->security->xss_clean($dataadd);
                    $result = $this->booking->insert('booking_gyab', $dataadd);



                    $this->session->set_flashdata('msg', 'تم    عمل حضور الموظف ' . $modif[0] . ' بفضل الله!');
                } else {
                    if ($submit2) {


                        $edit_data = array(
                            'outsite' => $this->booking->tissme_now(),
                            'userout' => $this->session->userdata('name'),
                            'outdev' => $modif[2],
                        );
                        $edit_data = $this->security->xss_clean($edit_data);
                        $whr = "( outsite=''  or outsite IS NULL )    and name='$modif[0]' ";
                        $this->db->where($whr);
                        $this->booking->update('booking_gyab', $edit_data);
                        /// echo die($this->db->last_query());
                    }
                    $this->session->set_flashdata('msg', 'تم    عمل انصراف الموظف ' . $modif[0] . ' بفضل الله!');
                }
            }
        }
        redirect(base_url() . 'booking/dashboard');
    }

    public function commentnbeh($id) {
        $commentnbeh = $this->input->post('commentnbeh');


        $this->db->where('id', $id);
        $this->booking->update('booking', array('commentnbeh' => $commentnbeh, 'comment7' => $this->input->post('comment7'), 'comment8' => $this->input->post('comment8')));



        $this->session->set_flashdata('msg', 'تم   عمل وضع التنبيه بفضل الله!');
        redirect(base_url() . 'booking/dashboard');
    }

    public function deltnbeh($id) {


        $this->db->where('id', $id);
        $this->booking->update('booking', array('commentnbeh' => ''));



        $this->session->set_flashdata('msg', 'تم مسح  التنبيه بفضل الله!');
        redirect(base_url() . 'booking/dashboard');
    }

    public function idend($id) {

        
        
        
        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();


        $this->db->where('booking', $id);
         $this->db->where('counter', '1');
        $this->booking->update('booking_card', array('counter' =>  $this->input->post('card'),'timeend' => time(), 'user2' => $this->user));
        
        
        if ($data['show']['cid'] == '286080100912') {
            ///   $this->booking->Sms_send("55992222,66876136", "\n خرج:" . $data['show']['name'] . " \n  ".$data['show']['room']." \n  ".date("H:i")." \n  ",'SMSON');
        }

        $query = $this->db->get_where('booking_rooms', array('name' => $data['show']['room']));
        $data['room'] = $query->row_array();
        $comment = explode("##", $data['room']['comment']);
        $data['all_groups'] = array();
        $nao[1] = "الصالة";
        $nao[2] = " الماستر";
        $nao[3] = " الثانية";
        $nao[4] = " المطبخ";
        $nao[5] = "الحمام";
        $nao[6] = "حمام المساتر";
        $nao[7] = "الثالثة";

        $max = count($comment);
        if ($max > 30)
            $max = 24;
        for ($i = 0; $i < $max; $i++) {

            $commentsss = explode("|", $comment[$i]);
            if (isset($commentsss[1])) {

                $query = $this->db->get_where('booking_mhtwa', array('id' => $commentsss[1]));

                //$query = $this->db->get_where('booking_mhtwa', array('id' => $commentsss[1], 'text8' => '1'));

                $row = $query->row_array();
                if (isset($row['text1'])) {
                    $data['all_groups'][$i]['text1'] = $row['text1'];
                    $data['all_groups'][$i]['text2'] = $row['text2'];
                    $data['all_groups'][$i]['text3'] = $row['text3'];
                    $data['all_groups'][$i]['noa'] = '';
                    if ($row['text5'])
                        $data['all_groups'][$i]['noa'] = $nao[$row['text5']];
                    $query = $this->db->get_where('booking_mhtwah', array('text1' => $data['show']['room'], 'text2' => $row['id']));
                    $mhtwah = $query->row_array();
                    $data['all_groups'][$i]['com'] = '';
                    if (isset($commentsss[1]))
                        $data['all_groups'][$i]['com'] = isset($mhtwah['text3']);
                }
            }
        }



        if ($data['show']['counter'] == 1) {
            $this->db->where('name', $data['show']['room']);
            $this->booking->update('booking_rooms', array('conter' => '3'));
        }


        $this->booking->send_push("room No . " . $data['show']['room']);

        $comment7 = $this->input->post('comment7');

        if ($this->input->post('comment1')) {


            $billback = $this->input->post('bill') + $this->input->post('knet');
            $billback2 = $this->input->post('comment22');
            if ($billback > 0) {



                $query = $this->db->get_where('booking', array('id' => $id));
                $data['show'] = $query->row_array();
                $this->db->where('id', $data['show']['id']);
                $this->booking->update('booking', array('counter' => '2'));







                $datass = array(
                    'name' => $data['show']['name'],
                    'datetext4' => $this->data_day,
                    'mobile' => $data['show']['mobile'],
                    'cid' => $data['show']['cid'],
                    'room' => $data['show']['room'],
                    'day' => 0,
                    'billexport' => '',
                    'bill' => ($this->input->post('bill') + $this->input->post('knet')),
                    'timeenter' => $data['show']['timeenter'],
                    'timeend' => time(),
                    'billprint' => $this->input->post('billprint'),
                    'knetcode' => $this->input->post('knetcode'),
                    'counter' => '1',
                    'knet' => $this->input->post('knet'),
                    'comment8' => $this->input->post('comment8'),
                    'noa' => $data['show']['noa'],
                    '3gd' => $data['show']['3gd'],
                    'comment' => $data['show']['comment'],
                    'commentnbeh' => $data['show']['commentnbeh'],
                    'bookingid' => $data['show']['bookingid'],
                    'timerenew' => $this->booking->tissme_now(),
                    'user' => $this->user,
                    'dayfree' => 0,
                );
                /// print_r($data);exit;
                $datass = $this->security->xss_clean($datass);
                $result = $this->booking->insert('booking', $datass);

                $data['show']['id'] = $this->db->insert_id();
            }

            if ($billback+10 < $billback2 ) {
                $msg = "  غرامة تاخير لمدة  " . $this->input->post('comment1') . " ساعات دفع     $billback والمطلوب $billback2 تسكين رقم" . $data['show']['id'];

                $this->booking->add_rep_user($msg);
            ////    $this->booking->whats_send("67769595", $msg . " -" . $this->session->userdata('name'));
            }


            $comment7 = '';
            $this->db->where('id', $data['show']['id']);
            $this->booking->update('booking', array('comment1' => $this->input->post('comment1'), 'comment2' => $this->input->post('comment2'), 'comment3' => $this->input->post('comment7'), 'comment5' => 'no'));
        }


        if ($data['show']['counter'] == 1) {

            $this->db->where('id', $data['show']['id']);
            $this->booking->update('booking', array('counter' => '2', 'timeend2' => $this->booking->tissme_now(), 'dataend' => $this->data_day, 'user2' => $this->session->userdata('name'), 'comment7' => $comment7));
            $data['show']['timeend'] = $this->booking->tissme_now();
        } else {
            $data['show']['timeend'] = $data['show']['timeend2'];
        }





        $this->session->set_flashdata('msg', 'تم   عمل خروج بفضل الله!');


        $this->load->view('../controllers/booking/views/show/printidout', $data);
        //redirect(base_url() . 'booking/dashboard');  
    }

    public function toopen($id) {
        $this->db->where('name', $id);
        $this->booking->update('booking_rooms', array('conter' => '1'));

        $this->session->set_flashdata('msg', 'تم    التغير الى متاحة بفضل الله!');

        redirect(base_url() . 'booking/dashboard');
    }
    
        public function tobook($id) {
        $this->db->where('name', $id);
        $this->booking->update('booking_rooms', array('conter' => '1'));

       /// $this->session->set_flashdata('msg', 'تم    التغير الى متاحة بفضل الله!');
       $query = $this->db->get_where('booking_rooms', array('name' => $id));
        $row = $query->row_array();
        redirect(base_url() . 'booking/booked/index/'. $row['name']);
    }

        public function cardlose($id) {
            
            
        $this->db->where('id', $id);
        $this->booking->update('booking_card', array('counter' => '3','timeend' => time(), 'user2' => $this->user));
        
        
           $query = $this->db->get_where('booking_card', array('id' => $id));
        $booking_card = $query->row_array();
             $dataadd = array(
                     'booking'=> $booking_card['booking'],
                    'room' => $booking_card['room'],
                        'cid' => $booking_card['cid'],
                    'timeenter' => time(),
                    'timeend' =>0,
                    'counter' => '1',
                    'user' => $this->user);



                $dataadd = $this->security->xss_clean($dataadd);
                $result = $this->booking->insert('booking_card', $dataadd);
        
        
        
        
        
        
        
        
        $this->session->set_flashdata('msg', 'تم فقد الكرت واضافة  كرت جديد        !');

        
        
        
        
        
        
        redirect(base_url() . 'booking/dashboard');
    }
    
    public function toclean($id) {
        $this->db->where('name', $id);
        $this->booking->update('booking_rooms', array('conter' => '3'));
        $this->session->set_flashdata('msg', 'تم    التغير الى نظافة بفضل الله!');

        redirect(base_url() . 'booking/dashboard');
    }

    public function checkout($id) {


        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();
        $this->db->where('name', $data['show']['room']);
        if ($this->session->userdata('checkout')) {
            $this->booking->update('booking_rooms', array('conter' => '5'));
        } else {
            $this->booking->update('booking_rooms', array('conter' => '3'));
        }
        $this->session->set_flashdata('msg', 'تم    التغير الى تم التشيك  بفضل الله!');

        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('checkout' => $this->input->post('checkout')));

        if (trim($this->input->post('lost'))) {
            $dataadd['msg'] = $this->input->post('lost');
            $dataadd['idbook'] = $id;
            $dataadd['dateadd'] = $this->booking->tissme_now();
            $this->booking->insert('booking_lost', $dataadd);
        }

        redirect(base_url() . 'booking/dashboard');
    }

    public function cleanfinsh($id) {
        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();

        $this->db->where('name', $data['show']['room']);
        $this->booking->update('booking_rooms', array('conter' => '1'));
        $this->session->set_flashdata('msg', 'تم    التغير الى متاحة بفضل الله!');


        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();




        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('checkclean' => $this->input->post('checkclean')));



        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('timecleanfinsh' => $this->booking->tissme_now()));
        redirect(base_url() . 'booking/dashboard');
    }

    public function roomtoprom($id) {
        $this->db->where('name', $id);
        $this->booking->update('booking_rooms', array('conter' => '4', 'cnetomla' => $this->input->post('lost')));
        $this->session->set_flashdata('msg', 'تم    التغير الى صيانة بفضل الله!');


        redirect(base_url() . 'booking/dashboard');
    }
 public function roomtobook($id) {
        $this->db->where('name', $id);
        $this->booking->update('booking_rooms', array('conter' => 6, 'cnetomla' => $this->input->post('lost')));
        $this->session->set_flashdata('msg', 'تم    التغير الى بوكنق بفضل الله!');


        redirect(base_url() . 'booking/dashboard');
    }
    public function gowait($id) {

        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();


        $this->db->where('booking', $id);
        $this->db->where('counter', '1');
        $this->booking->update('booking_card', array('counter' =>  $this->input->post('card'),'timeend' => time(), 'user2' => $this->user));

        $query = $this->db->get_where('booking_rooms', array('name' => $data['show']['room']));
        $data['room'] = $query->row_array();
        $comment = explode("##", $data['room']['comment']);
        $data['all_groups'] = array();
        $nao[1] = "الصالة";
        $nao[2] = " الماستر";
        $nao[3] = " الثانية";
        $nao[4] = " المطبخ";
        $nao[5] = "الحمام";
        $nao[6] = "حمام المساتر";
        $nao[7] = "الثالثة";

        $max = count($comment);
        if ($max > 30)
            $max = 24;
        for ($i = 0; $i < $max; $i++) {

            $commentsss = explode("|", $comment[$i]);
            if (isset($commentsss[1])) {


                $query = $this->db->get_where('booking_mhtwa', array('id' => $commentsss[1], 'text8' => '1'));

                $row = $query->row_array();
                if (isset($row['text1'])) {
                    $data['all_groups'][$i]['text1'] = $row['text1'];
                    $data['all_groups'][$i]['text2'] = $row['text2'];
                    $data['all_groups'][$i]['text3'] = $row['text3'];
                    $data['all_groups'][$i]['noa'] = '';
                    if ($row['text5'])
                        $data['all_groups'][$i]['noa'] = $nao[$row['text5']];
                    $query = $this->db->get_where('booking_mhtwah', array('text1' => $data['show']['room'], 'text2' => $row['id']));
                    $mhtwah = $query->row_array();
                    $data['all_groups'][$i]['com'] = '';
                    if (isset($commentsss[1]))
                        $data['all_groups'][$i]['com'] = $mhtwah['text3'];
                }
            }
        }






        $this->db->where('name', $data['show']['room']);
        $this->booking->update('booking_rooms', array('conter' => '3'));
        $this->booking->send_push("room No . " . $data['show']['room']);



        $comment7 = $this->input->post('comment7');

        if ($this->input->post('comment1')) {
            $comment7 = '';
            $this->db->where('id', $data['show']['id']);
            $this->booking->update('booking', array('comment1' => $this->input->post('comment1'), 'comment2' => $this->input->post('comment2'), 'comment3' => $this->input->post('comment7'), 'nowait' => $this->input->post('nowait'), 'comment5' => 'wait'));
            $this->db->where('cid', $data['show']['cid']);
            $this->booking->update('booking_clints', array('oky' => 'ok', 'comment' => "عليه مبلغ " . $this->input->post('comment2') . "  بتاريخ " . $this->data_day));
        }




        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('counter' => '2', 'timeend2' => $this->booking->tissme_now(), 'dataend' => $this->data_day, 'user2' => $this->session->userdata('name'), 'comment7' => $comment7));


        $data['show']['timeend'] = $this->booking->tissme_now();

        $billback2 = $this->input->post('comment2');
        $billback1 = $this->input->post('comment2old');
        if ($billback1+10 < $billback2) {
            $msg = "  تحويل ايجار لم يتم الاستراد   عليه مبلغ " . $billback1 . "        والمطلوب $billback2 تسكين رقم" . $data['show']['id'];

            $this->booking->add_rep_user($msg);
        ////    $this->booking->whats_send("67769595", $msg . " -" . $this->session->userdata('name'));
        }


        $this->session->set_flashdata('msg', 'تم   عمل خروج بفضل الله!');
        $this->load->view('../controllers/booking/views/show/printidout', $data);


        //redirect(base_url() . 'booking/dashboard');  
    }

    public function idrenew($id) {

        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();
        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('counter' => '2','outok' => '1'));
        $query = $this->db->get_where('booking_clints', array('cid' => $data['show']['cid']));
        $clints = $query->row_array();
        $dayfree = $clints['dayfree'];
        $day = $this->input->post('day');




        if ($this->input->post('dayfreeall') > 0) {





            $dbhost = "localhost"; //
            $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
            $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
            $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
//            $dbuser = "root";  // إسم مستخدم قاعدة البيانات
//            $dbpass = "root";     // باسويرد قاعدة البيانات
//            $dbname = "booking"; // إسم قاعدة البيانات
            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");
                $sql1SSS = mysqli_query($mysqli1, "select * from booking_subscriptions       where  (  cid = '" . $data['show']['cid'] . "'    and counter=2)  ");
                while ($row = mysqli_fetch_array($sql1SSS)) {
                    if (@stristr($_SERVER['REQUEST_URI'], 'booking')) {
                        $ssss = 2;

                        if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {

                            $ssss = 1;
                        }

                        if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {

                            $ssss = 3;
                        }
                        if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {

                            $ssss = 4;
                        } if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {

                            $ssss = 5;
                        }
                    }
                    $data['dayfree'] = 0;
                    $dayfree1 = 0;
                    if ($row['dayfree'] > 0) {

                        if ($day > $this->input->post('dayfreeall')) {

                            $day = $this->input->post('dayfreeall');
                        }


                        $dayfree = $row['dayfree'] - $day;
                        $dayfree1 = $row['dayfree' . $ssss] + $day;
                        $sql1SSS = mysqli_query($mysqli1, "UPDATE booking_subscriptions  SET dayfree = '$dayfree' ,dayfree$ssss = '$dayfree1'     where  (  cid = '" . $data['show']['cid'] . "'    and counter=2)  ");
                        $this->booking->Sms_send($data['show']['mobile'], "تم استخدام عدد   " . $day . "\n يتبقى لك عدد ايام    :" . $dayfree);
                    }
                }
            }
        }




        $edit_data = array(
            'datetext2' => $clints['datetext2'] + 1,
        );
        $edit_data = $this->security->xss_clean($edit_data);
        $this->db->where('id', $clints['id']);
        $this->booking->update('booking_clints', $edit_data);
        $data = array(
            'name' => $data['show']['name'],
            'datetext4' => $this->data_day,
            'mobile' => $data['show']['mobile'],
            'cid' => $data['show']['cid'],
            'room' => $data['show']['room'],
            'day' => $day,
            'billexport' => '',
            'bill' => ($this->input->post('bill') + $this->input->post('knet')),
            'timeenter' => $data['show']['timeenter'],
            'timeend' => ($data['show']['timeend'] + (24 * 60 * 60 * $this->input->post('day'))),
            'billprint' => $this->input->post('billprint'),
            'knetcode' => $this->input->post('knetcode'),
            'counter' => '1',
            'knet' => $this->input->post('knet'),
            'comment8' => $this->input->post('comment8'),
            'noa' => $data['show']['noa'],
            '3gd' => $data['show']['3gd'],
            'comment' => $data['show']['comment'],
            'commentnbeh' => $data['show']['commentnbeh'],
            'bookingid' => $data['show']['bookingid'],
                   'inok' => $data['show']['inok'],
            'timerenew' => $this->booking->tissme_now(),
            'user' => $this->user,
            'dayfree' => $day,
        );
        /// print_r($data);exit;
        $data = $this->security->xss_clean($data);
        $result = $this->booking->insert('booking', $data);

        $this->session->set_flashdata('msg', 'تم عمل التمديد بفضل الله');
        redirect(base_url() . 'booking/dashboard');
    }

    public function blacklist($id) {

        $query = $this->db->get_where('booking_clints', array('id' => $id));
        $data['show'] = $query->row_array();


        $edit_data = array(
            'oky' => '',
        );
        $edit_data = $this->security->xss_clean($edit_data);
        $result = $this->db->where('id', $id);
        $this->booking->update('booking_clints', $edit_data);


        $this->booking->add_rep_user(" تم ازالة البلاك لست  عن  الرقم المدني  " . $data['show']['cid'] . "    والسبب  كان " . $data['show']['comment']);

        $this->session->set_flashdata('msg', 'تم عمل ازالة البلاك لست بفضل الله');
        redirect(base_url() . 'booking/dashboard');
    }

    public function editcomment($id) {


        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();

        $mname = $this->input->post('mname');
        if (isset($mname)) {

            $comment = $data['show']['comment'];



            $comment .= $_POST["mname"] . "**" . $_POST["mcid"] . "**" . $_POST["mmobile"] . "**" . $_POST["mcountry"] . "|||";
            $dataedit = array(
                'comment' => $comment,
            );
            /// print_r($data);exit;
            $dataedit = $this->security->xss_clean($dataedit);
            $this->db->where('id', $id);
            $this->booking->update('booking', $dataedit);

            $this->session->set_flashdata('msg', 'تم عمل اضافة المرافق بفضل الله');
            redirect(base_url() . 'booking/dashboard');
        }
    }

    public function editbooking($id) {


        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();

        $name = $this->input->post('name');

        $name = str_replace(' ', '-', trim($name));
        $name = str_replace(' بن ', ' ', trim($name));
        $name = str_replace('عبد ا', 'عبدا', trim($name));
//$namenum='all';

        $name = str_replace('---', '-', trim($name));
        $name = str_replace('--', '-', trim($name));

        $MshrfAll2 = explode("-", trim($name));
        if (count($MshrfAll2) == 3)
            $MshrfAll2[2] = '';
        $name = $MshrfAll2[0] . " " . $MshrfAll2[1] . " " . $MshrfAll2[2] . " " . $MshrfAll2[count($MshrfAll2) - 1];


        $dataedit = array(
            'bill' => ($this->input->post('bill') + $this->input->post('knet')),
            'billprint' => $this->input->post('billprint'),
            'knet' => $this->input->post('knet'),
            'knetcode' => $this->input->post('knetcode'),
            'name' => $name,
            'cid' => $this->input->post('cid'),
            'bookingnew' => $this->input->post('bookingnew'),
        );
        /// print_r($data);exit;
        $dataedit = $this->security->xss_clean($dataedit);
        if ($name) {
            $this->db->where('id', $id);
            $this->booking->update('booking', $dataedit);
        }



        $billback = $this->input->post('bill') + $this->input->post('knet');
        $billback2 = $this->input->post('billold');



        if ($billback != $billback2) {
            $this->booking->add_rep_user("  تعديل  مبلغ الى      $billback  من  $billback2 تسكين رقم" . $data['show']['id']);
        }

        $billback = $this->input->post('knet');
        $billback2 = $data['show']['knet'];



        if ($billback != $billback2) {
            $this->booking->add_rep_user("  تعديل  مبلغ الى   كي نت    $billback  من  $billback2 تسكين رقم" . $data['show']['id']);
        }





        $this->session->set_flashdata('msg', 'تم عمل التعديل بفضل الله');
        redirect(base_url() . 'booking/dashboard');
    }

    public function editbillprint($id) {


        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();




        $dataedit = array(
            'billprint' => $this->input->post('billprint'),
            'knetcode' => $this->input->post('knetcode'),
        );
        /// print_r($data);exit;
        $dataedit = $this->security->xss_clean($dataedit);

        $this->db->where('id', $id);
        $this->booking->update('booking', $dataedit);



        $this->session->set_flashdata('msg', 'تم عمل التعديل بفضل الله');
        redirect(base_url() . 'booking/dashboard');
    }

    public function editknet($id) {


        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();

        if ($data['show']['timerenew'])
            $data['show']['timeenter'] = $data['show']['timerenew'];
        $name = $this->input->post('knet');

        if ($data['show']['bill'] >= $name) {


            $dataedit = array(
                'billprint' => $this->input->post('billprint'),
                'knet' => $this->input->post('knet'),
                'knetcode' => $this->input->post('knetcode'),
            );
            /// print_r($data);exit;
            $dataedit = $this->security->xss_clean($dataedit);
            if ($name) {
                $this->db->where('id', $id);
                $this->booking->update('booking', $dataedit);
            }
        }

        $billback = $this->input->post('knet');
        $billback2 = $data['show']['knet'];



        if ($billback != $billback2) {
            $ddd = $data['show']['id'];
            $this->booking->add_rep_user("تعديل مبلغ الكي نت الى $billback  من  $billback2 تسكين رقم" . $ddd . " بعد وقت   " . $this->booking->getNiceDuration($this->booking->tissme_now() - $data['show']['timeenter']) . " -: السبب" . $this->input->post('comment'));
        }

        $billback = $this->input->post('billprint');
        $billback2 = $data['show']['billprint'];



        if ($billback != $billback2) {
            $ddd = $data['show']['id'];
            $this->booking->add_rep_user("  تعديل وصل الكي نت$billback  من  $billback2 تسكين رقم" . $ddd . " بعد وقت   " . $this->booking->getNiceDuration($this->booking->tissme_now() - $data['show']['timeenter']) . " -: السبب" . $this->input->post('comment'));
        }


        $this->session->set_flashdata('msg', 'تم عمل التعديل بفضل الله');
        redirect(base_url() . 'booking/dashboard');
    }

    public function editwait($id) {


        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();


        $this->db->where('cid', $data['show']['cid']);
        $this->booking->update('booking_clints', array('oky' => 'ok', 'comment' => "عليه مبلغ  " . $this->input->post('comment2')));

        $comment5 = 'wait';
        if ($this->input->post('comment2') == 0) {
            $comment5 = 'okwait';


            $this->db->where('cid', $data['show']['cid']);
            $this->booking->update('booking_clints', array('oky' => '', 'comment' => ""));
        }

        $dataedit = array(
            'comment5' => $comment5,
            'comment2' => $this->input->post('comment2'),
            'comment3' => $this->input->post('comment3'),
            'nowait' => $this->input->post('nowait'),
        );
        /// print_r($data);exit;
        $dataedit = $this->security->xss_clean($dataedit);
        $this->db->where('id', $id);
        $this->booking->update('booking', $dataedit);











        $this->session->set_flashdata('msg', 'تم  تحويل المبلغ الى سلفه بفضل الله');
        redirect(base_url() . 'booking/dashboard');
    }

    public function idbackwait($id) {

        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();





        $billback = $this->input->post('bill') + $this->input->post('knet');
        $billback2 = $this->input->post('billbackold');
        if ($billback > 0) {

            $dataadd = array(
                'catid' => '1',
                'text3' => '',
                'text1' => $billback,
                'text2' => " استيراد مبلغ  شقة " . $data['show']['room'] . "بتاريخ    : " . $data['show']['datetext4'] . "رقم التسكين : " . $id,
                'dateadd' => $this->data_day,
                'counter' => '1',
            );
            $dataadd = $this->security->xss_clean($dataadd);
            ///  $result = $this->booking->insert('model_billshawly', $dataadd);




            $datass = array(
                'name' => $data['show']['name'],
                'datetext4' => $this->data_day,
                'mobile' => $data['show']['mobile'],
                'cid' => $data['show']['cid'],
                'room' => $data['show']['room'],
                'day' => 0,
                'billexport' => '',
                'bill' => ($this->input->post('bill') + $this->input->post('knet')),
                'timeenter' => $data['show']['timeenter'],
                'timeend' => time(),
                'billprint' => $this->input->post('billprint'),
                'knetcode' => $this->input->post('knetcode'),
                'counter' => '2',
                'knet' => $this->input->post('knet'),
                'comment8' => $this->input->post('comment8'),
                'noa' => $data['show']['noa'],
                '3gd' => $data['show']['3gd'],
                'comment' => $data['show']['comment'],
                'commentnbeh' => $data['show']['commentnbeh'],
                'bookingid' => $data['show']['bookingid'],
                'timeend2' => $data['show']['timeend2'],
                'timecleanfinsh' => $data['show']['timecleanfinsh'],
                'timerenew' => $this->booking->tissme_now(),
                'user' => $this->user,
                'dayfree' => 0,
            );
            /// print_r($data);exit;
            $datass = $this->security->xss_clean($datass);
            $result = $this->booking->insert('booking', $datass);

            ///   $data['show']['id'] = $this->db->insert_id();
        }
        if ($billback != $billback2) {



            $msg = "  استراد مبلغ      $billback والمطلوب $billback2 تسكين رقم" . $data['show']['id'];

            $this->booking->add_rep_user($msg);
            $this->booking->whats_send("67769595", $msg . " -" . $this->session->userdata('name'));
        }


        $this->db->where('cid', $data['show']['cid']);
        $this->booking->update('booking_clints', array('oky' => '', 'comment' => ""));

        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('comment5' => 'okwait'));








        $this->session->set_flashdata('msg', 'تم   استرجاع المبلغ ورفع البلاك لست  بفضل الله!');


///$this->load->view('../controllers/booking/views/show/printidout', $data);
        redirect(base_url() . 'booking/dashboard');
    }

    public function outsite($id, $outsite) {

        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();








        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('outsite' => $outsite));

        if ($outsite == 'ok') {
            $this->db->where('id', $data['show']['id']);
            $this->booking->update('booking', array('timeoutsite' => $this->booking->tissme_now()));
        } else {
            $this->db->where('id', $data['show']['id']);
            $this->booking->update('booking', array('timeoutsite' => ''));
        }






        $this->session->set_flashdata('msg', 'تم          التحديث بفضل الله !');


///$this->load->view('../controllers/booking/views/show/printidout', $data);
        redirect(base_url() . 'booking/dashboard');
    }

    
    
       public function inok($id, $outsite) {

        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();








        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('inok' => 1));

        





        $this->session->set_flashdata('msg', 'تم          التحديث بفضل الله !');


///$this->load->view('../controllers/booking/views/show/printidout', $data);
        redirect(base_url() . 'booking/dashboard');
    }
    
        public function inout($id, $outsite) {

        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();








        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('outok' => 1));

        





        $this->session->set_flashdata('msg', 'تم          التحديث بفضل الله !');


///$this->load->view('../controllers/booking/views/show/printidout', $data);
        redirect(base_url() . 'booking/dashboard');
    }
    public function upload_file($id) {

        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();

        $query = $this->db->get_where('booking_clints', array('cid' => $data['show']['cid']));
        $clints = $query->row_array();
        $this->load->library('upload');
        $file1 = $clints['file1'];
        $fieldname = 'file1';
        $folder = '../allcid/' . date("Ym") . "/";
        
      
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        if ($_FILES[$fieldname]['name'] != "") {
            if ($clints['file1'])
                unlink($file1);
            $upload_data = $this->booking->upload_many_photos($fieldname, $clints['cid'] . '1');
            $file1 = $folder . $upload_data["file_name"];
        }
        //sleep(31);
        $file2 = $clints['file2'];
        $fieldname2 = 'file2';
        if ($_FILES[$fieldname2]['name'] != "") {
            if ($clints['file2'])
                unlink($file2);
            $upload_data = $this->booking->upload_many_photos($fieldname2, $clints['cid'] . '2');
            $file2 = $folder . $upload_data["file_name"];
        }

        
          $file3= $clints['file3'];
        $fieldname3 = 'file3';
        if ($_FILES[$fieldname3]['name'] != "") {
            if ($clints['file3'])
                unlink($file3);
            $upload_data = $this->booking->upload_many_photos($fieldname3, $clints['cid'] . '3');
            $file3= $folder . $upload_data["file_name"];
        }


        $edit_data = array(
            'file1' => $file1,
            'file2' => $file2,
            
              'file3' => $file3,);
        $edit_data = $this->security->xss_clean($edit_data);
        $result = $this->db->where('id', $clints['id']);
        $this->booking->update('booking_clints', $edit_data);



        
//        
//$ftp_server="majestic.smartfile.com";
// $ftp_user_name="majestic";
// $ftp_user_pass="Qaz*123123";
//
//
//
//
//        
// 
//try {
// // set up basic connection
// $conn_id = @ftp_connect($ftp_server);
//
// // login with username and password
// $login_result = @ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
//
// if (ftp_mkdir($conn_id, str_replace("../", '', $folder))) {
//     
//    // Execute if directory created successfully
//    ///echo " $folder Successfully created";
//}
//    $fieldname = 'file1';
//     if ($_FILES[$fieldname]['name'] != "") {
//  if (ftp_put($conn_id, str_replace("../", '', $file1),  $file1, FTP_BINARY )) {
//
//    $file1="https://majestic.smartfile.com/api/2/path/data/".str_replace("../", '', $file1);
// 
// } else {
//   
//    }
//     }
//       $fieldname = 'file2';
//     if ($_FILES[$fieldname]['name'] != "") {
//      if (ftp_put($conn_id, str_replace("../", '', $file2),  $file2, FTP_BINARY )) {
//
//       $file2="https://majestic.smartfile.com/api/2/path/data/".str_replace("../", '', $file2);
//   
// } else {
//   
//    }
//     }
// // close the connection
// ftp_close($conn_id);
// // upload a file
//
//}catch (Exception $e) {
//    echo 'Caught exception: ',  $e->getMessage(), "\n";
//}
//        
//        
//        
//        
//        
//           $edit_data = array(
//            'file1' => $file1,
//            'file2' => $file2,);
//        $edit_data = $this->security->xss_clean($edit_data);
//        $result = $this->db->where('id', $clints['id']);
//        $this->booking->update('booking_clints', $edit_data);


        $this->session->set_flashdata('msg', 'تم   رفع الاثبات  بفضل الله!');


        redirect(base_url() . 'booking/dashboard');
    }

}

?>