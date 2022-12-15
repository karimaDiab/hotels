<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends MY_Controller {

    var $data_day;
    var $thispage;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');


        $this->data_day = $this->booking->data_day();

        $this->thispage = "show";
    }

    public function all($day = '', $room = '') {

        $searchfor = $this->security->xss_clean($this->input->get('search'));
        if (!$this->session->userdata('group'))
            $day = '';


        if ($day)
            $this->data_day = $day;
        
        $this->db->select_sum('bill');
        $this->db->where("  datetext4 = '" . $this->data_day . "' ");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['bill'];


        $this->db->select_sum('knet');
        $this->db->where("  datetext4 = '" . $this->data_day . "' and knet>1");
        $query = $this->db->get('booking')->row_array();
        $data['all_knet'] = $query['knet'];

        $data['all_cach'] = $data['all_bill'] - $data['all_knet'];

        $whr = " datetext4 = '" . $this->data_day . "' ";

        
               if ($room)
            $whr = "   room='$room' ";
        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->where($whr);
          if ($room)  $this->db->limit(50);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;


        if ($searchfor) {
            $this->booking->add_rep_user("  البحث عن    " . $searchfor);
            $split_stemmed = explode(" ", $searchfor);
            $whr = " (";
                  foreach($split_stemmed as $key => $val) {
                if ($val <> " " and strlen($val) > 0) {

                    $whr .= " ( BINARY name LIKE '%" . $val . "%'   ) and";

                    //  $whr .= " (  comment LIKE '%" . $val . "%'   ) and";
                }
            }
            $whr = substr($whr, 0, (strLen($whr) - 4));
            $whr = "$whr ) or (";
            $split_stemmed = explode(" ", $searchfor);
                      foreach($split_stemmed as $key => $val) {
                if ($val <> " " and strlen($val) > 0) {

                    $whr .= " ( BINARY comment LIKE '%" . $val . "%'   ) and";

                    //  $whr .= " (  comment LIKE '%" . $val . "%'   ) and";
                }
            }
            $whr = substr($whr, 0, (strLen($whr) - 4));
            $whr .= " ) or     cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

            if (!$this->session->userdata('group'))
                $whr = " cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

            $query = $this->db->query('SELECT * FROM booking where ' . $whr . " order by id desc limit 50");
            $data['all_count'] = 0;
            $whr = '';
            $data['all_groups'] = $query->result_array();
            $data['all_count'] = count($data['all_groups']);
            // echo print_r($this->db->last_query());
        }
        /// $whr=" cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

        foreach ($data['all_groups'] as $row) {

            
            
            
            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            if ($row['timeend2'])
                $data['all_groups'][$i]['timeend'] = $row['timeend2'];
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    
    public function kashf($day = '', $room = '') {
  

        $searchfor = $this->security->xss_clean($this->input->get('search'));
        
       $data['datetext4'] = $datetext4 = $this->security->xss_clean($this->input->get('datetext4'));
         $data['noo3'] =  $noo3 = $this->security->xss_clean($this->input->get('noo3'));
        if (!$this->session->userdata('group'))
            $day = '';


        if ($day)
            $this->data_day = $day;
        
        $this->db->select_sum('bill');
        
        
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['bill'];


        $this->db->select_sum('knet');
        $this->db->where("  datetext4 = '" . $this->data_day . "' and knet>1");
        $query = $this->db->get('booking')->row_array();
        $data['all_knet'] = $query['knet'];

        $data['all_cach'] = $data['all_bill'] - $data['all_knet'];

        $whr = " datetext4 = '" . $this->data_day . "' ";

        
            if ($room)
            $whr = "   room='$room' ";
        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());

        $this->db->from('booking');
    


        if($datetext4 )
        {
                $this->db->order_by('cid', 'asc');
                $datetext41 = strtotime(str_replace("-", "", $datetext4) . " 12:00");
                      $datetext42 = strtotime(str_replace("-", "", $datetext4) . " 23:00");
                    
                  $this->db->where("  timeenter >$datetext41  and timeenter < $datetext42  ");
              
        }else
                  $this->db->where("  datetext4 = 'sdsds' ");   
            
        
        
          
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;



        /// $whr=" cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

        foreach ($data['all_groups'] as $row) {

           $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['country'] = $clints['country'];
            $data['all_groups'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        
        
            $this->db->from('booking');
       if($datetext4 )
        {
            $this->db->order_by('cid', 'asc');
                $datetext41 = strtotime(str_replace("-", "", $datetext4) . " 12:00")-(24*60*60);
                      $datetext42 = strtotime(str_replace("-", "", $datetext4) . " 23:00")-(24*60*60);
                    
                  $this->db->where("user2!='' and inok='1' and timeenter >$datetext41  and timeenter < $datetext42  ");
        }else
                  $this->db->where("  datetext4 = 'sdsds' ");   
            
        
        
          
        $data['all_groupout'] = $this->db->get()->result_array();
        $i = 0;



        /// $whr=" cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

        foreach ($data['all_groupout'] as $row) {

           $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groupout'][$i]['country'] = $clints['country'];
            $data['all_groupout'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groupout'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/kashf';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }
    
    public function kashfprint() {

        
            $data['datetext4'] = $datetext4 = $this->security->xss_clean($this->input->post('datetext4'));
         $data['noo3'] =  $noo3 = $this->security->xss_clean($this->input->post('noo3'));
         
         
           $data['idallold'] =  $idallold = $this->security->xss_clean($this->input->post('idallold'));
         if(is_array($data['idallold']))
              {
                  
            
              for ($index = 0; $index < count( $data['idallold']); $index++) {
                  
               
                      $this->db->where('id', $data['idallold'][$index]);
                     $this->booking->update('booking', array('inok' => '0'));
             
                  
              }
    }

              $data['idall'] =  $idall = $this->security->xss_clean($this->input->post('idall'));
              if(is_array($data['idall']))
              {
                  
            
              for ($index = 0; $index < count( $data['idall']); $index++) {
                  
               
                      $this->db->where('id', $data['idall'][$index]);
                     $this->booking->update('booking', array('inok' => '1'));
             
                  
              }
    }
    
    $data['idallold'] =  $idallold = $this->security->xss_clean($this->input->post('idall2old'));
         if(is_array($data['idallold']))
              {
                  
            
              for ($index = 0; $index < count( $data['idallold']); $index++) {
                  
               
                      $this->db->where('id', $data['idallold'][$index]);
                     $this->booking->update('booking', array('outok' => '0'));
             
                  
              }
    }
    
            $data['idall'] =  $idall = $this->security->xss_clean($this->input->post('idall2'));
              if(is_array($data['idall']))
              {
                  
            
              for ($index = 0; $index < count( $data['idall']); $index++) {
                  
               
                      $this->db->where('id', $data['idall'][$index]);
             
                 $this->booking->update('booking', array('outok' => '1'));
                  
              }
    }
        $this->db->from('booking');
$noo3='in';
    if($datetext4  )
        {
                $this->db->order_by('timeenter', 'asc');
                $datetext41 = strtotime(str_replace("-", "", $datetext4) . " 12:00");
                      $datetext42 = strtotime(str_replace("-", "", $datetext4) . " 23:00");
                    
       
                        $this->db->where("  timeenter >$datetext41  and timeenter < $datetext42 and inok=1 ");
        }elseif($datetext4 and $noo3=='out')
        {
            $this->db->order_by('timeend2', 'asc');
                $datetext41 = strtotime(str_replace("-", "", $datetext4) . " 08:00");
                      $datetext42 = strtotime(str_replace("-", "", $datetext4) . " 15:00");
                    
                  $this->db->where("user2!='' and timeend2 >$datetext41  and timeend2 < $datetext42 and outok=1  ");
        }else
                  $this->db->where("  datetext4 = 'sdsds' ");   
            
   
        
        
        $data['datetext41']=$datetext41;
        
       
        $data['all_groups'] = $this->db->get()->result_array();
              $i=0;
               $data['all_groups_all1']=count($data['all_groups']);
        foreach ($data['all_groups'] as $row) {

           $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['country'] = $clints['country'];
            $data['all_groups'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/kashfprint';

        $data['thispage'] = $this->thispage;
        $this->load->view($data['view'], $data);     
        
        
        
        
             $this->db->from('booking');
       $noo3='out';
           $data['noo3'] = $noo3;
        if($datetext4 and $noo3=='out')
        {
            $this->db->order_by('timeend2', 'asc');
                 
                $datetext41 = strtotime(str_replace("-", "", $datetext4) . " 12:00")-(24*60*60);
                      $datetext42 = strtotime(str_replace("-", "", $datetext4) . " 23:00")-(24*60*60);
                    
                  $this->db->where("user2!='' and outok='1' and timeenter >$datetext41  and timeenter < $datetext42  ");
                  
                  
                
        }else
                  $this->db->where("  datetext4 = 'sdsds' ");   
            
        $data['all_groups'] = $this->db->get()->result_array();
              $i=0;
                   $data['all_groups_all2']=count($data['all_groups']);
        foreach ($data['all_groups'] as $row) {

           $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['country'] = $clints['country'];
            $data['all_groups'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/kashfprint';

        $data['thispage'] = $this->thispage;
        $this->load->view($data['view'], $data);     
        
               $data['datt'] = '';
      
                $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/kashfprint_1';

        $data['thispage'] = $this->thispage;
        $this->load->view($data['view'], $data);  
        
           
       }
    public function getnum($page = '', $cat = '') {
        $query = $this->db->query("set global sql_mode='NO_ENGINE_SUBSTITUTION';");

        $text = '';

        if (!$page)
            $page = 1;
        ini_set('memory_limit', '1024M'); // or you could use 1G
        //  $query = $this->db->query("set global sql_mode='NO_ENGINE_SUBSTITUTION';");

        $catidshow = $this->input->post('catidshow');
        if ($cat)
            $catidshow = $cat;


        $max = 1000;

        $this->db->from('booking');
        $this->db->where("LENGTH(mobile) = 8  and datetext4<$catidshow");
        $this->db->group_by('cid');
        $data['all_count'] = ($this->db->count_all_results());

        $pages = ceil(($data['all_count'] ) / $max);



        if ($page)
            $from = ($max * $page) - $max;




        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->order_by('datetext4', 'asc');
        if ($page)
            $this->db->limit($max, ($max * $page) - $max);

        $this->db->where("LENGTH(mobile) = 8 and datetext4<$catidshow");
        $this->db->group_by('cid');
        $data['all_groups'] = $this->db->get()->result_array();

        foreach ($data['all_groups'] as $row) {



            $ddddd = (trim($row['mobile']));


            $query = $this->db->get_where('booking', "cid='" . $row['cid'] . "' and datetext4>$catidshow", 1);
            $data['show'] = $query->row_array();

            if (!$data['show']['cid']) {
                ///  $dateadd=$row ['datetext4'];
                echo $row ['mobile'] . "<br>";
                $text = $text . $row['mobile'] . "\n";
            }





//else
//{
//    
// $edit_data = array(
// 'dateadd' => $dateadd,
// );
// $edit_data = $this->security->xss_clean($edit_data);
// $result = $this->db->where('text10', $ddddd);$this->booking->update('model_numbber', $edit_data);
//
//  
//    
//}   
            ////  echo $row['mobile']."<br>";
        }

        $this->load->helper('file');
        $dst_path = '/upload/text2.txt';

        $MyFile = file_get_contents(FCPATH . $dst_path);
        if ($page == 1)
            $MyFile = '';
        write_file(FCPATH . $dst_path, "$text \n" . $MyFile);

        if ($pages > $page) {
            echo"<meta http-equiv=refresh content=3;url=" . base_url('booking/show/getnum/' . ($page + 1) . "/" . $catidshow) . ">";
            echo ("انتظر قليلا سوف يتم الاضفة الرجاء عدم اغلاق الصفحة  $pages - $page");
        } else {
            echo("تم الاضافة بفضل الله");
        }
    }

    public function printmob($day = '', $page = 1) {
        if (!$this->session->userdata('group'))
            $day = '';


        if ($day)
            $this->data_day = $day;







        ini_set('display_errors', 'Off');

        //  Load the database config file.
        if (file_exists($file_path = APPPATH . 'config/database.php')) {
            include($file_path);
        }

        $config = $db[$active_group];

        //  Check database connection if using mysqli driver

        $max = 500;
        $from = ($max * $page) - $max;
        $mysqli = new mysqli($config['hostname'], $config['username'], $config['password'], $config['database']);
        $a = mysqli_query($mysqli, "select cid from  `booking` where  datetext4 < $this->data_day    order by cid desc   limit $from,$max");
        $num_sql = mysqli_num_rows($a);

        $sql = mysqli_query($mysqli, "select cid from  `booking` where  datetext4 < $this->data_day      order by cid desc");
        $num_sqlss = mysqli_num_rows($sql);
        $pages = ceil($num_sqlss / $max);
        echo "$num_sql<br><br><br>";




        while ($row = mysqli_fetch_array($a)) {


            $sql = mysqli_query($mysqli, "select mobile from booking where cid='" . $row['cid'] . "' and datetext4 < $this->data_day order by id desc limit 1");
            while ($rows = mysqli_fetch_array($sql)) {
                if (strlen($rows['mobile']) == 8)
                    $text = $text . $rows['mobile'] . "\n";
            }
        }

        $this->load->helper('file');
        $dst_path = '/upload/text.txt';

        $MyFile = file_get_contents(FCPATH . $dst_path);
        if ($page == 1)
            $MyFile = '';
        write_file(FCPATH . $dst_path, "$text \n" . $MyFile);

        if ($pages > $page) {
            echo"<meta http-equiv=refresh content=0;url=" . base_url('booking/show/printmob/' . $this->data_day . "/" . ($page + 1)) . ">";

            echo ("انتظر قليلا سوف يتم الاضفة الرجاء عدم اغلاق الصفحة  $pages - $page");
        } else {
            echo ("تم الاضافة بفضل الله");
            echo '<a class="update btn btn-sm btn-success pull-right" href="' . base_url($dst_path) . '"><i class="material-icons">تحميل</i></a>';
        }
        exit;
    }

    public function bill($day = '', $export = '') {

        if (!$this->session->userdata('group'))
            $day = '';


        $whr = " datetext4 != '" . $this->data_day . "' and billexport='' ";
        if ($day and ! $export)
            $whr = " datetext4 = '" . $day . "' ";
        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_old'] = ($this->db->count_all_results());

        if ($data['all_old'] == 0)
            $whr = " datetext4 = '" . $this->data_day . "' ";

        $this->db->select_sum('bill');
        $this->db->where("  $whr ");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['bill'];


        $this->db->select_sum('knet');
        $this->db->where("  $whr and knet>1");
        $query = $this->db->get('booking')->row_array();
        $data['all_knet'] = $query['knet'];

        $data['all_cach'] = $data['all_bill'] - $data['all_knet'];
        if ($export == 'export' and $data['all_old'] > 0) {

            if ($data['all_cach'] > 1) {
                $add = TRUE;
                $dataadd = array(
                    'catid' => '1',
                    'text1' => $data['all_cach'],
                    'text2' => "ايراد " . $this->booking->data_day(13) . "  كاش ",
                    'dateadd' => $this->booking->data_day(13),
                    'counter' => '1',
                    'text3' => '',
                );
                $dataadd = $this->security->xss_clean($dataadd);
                $result = $this->booking->insert('model_billshawly', $dataadd);
            }

            if ($data['all_knet'] > 1) {

                $add = TRUE;
                $dataadd = array(
                    'catid' => '1',
                    'text1' => $data['all_knet'],
                    'text2' => "ايراد " . $this->booking->data_day(13) . "  knet ",
                    'dateadd' => $this->booking->data_day(13),
                    'counter' => '1',
                    'text3' => '',
                );
                $dataadd = $this->security->xss_clean($dataadd);
                $result = $this->booking->insert('model_billshawly', $dataadd);
            }

            $this->db->where($whr);$this->booking->update('booking', array('billexport' => 'ok'));
            $this->session->set_flashdata('msg', 'تم تصدير المالية  بفضل الله!');
            redirect(base_url('booking/show/bill'));
        }





        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/bill';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function allday() {

        $this->db->from('booking');
        $this->db->order_by('timeend', 'desc');
        $this->db->limit('1');
        $this->db->where("counter=1");
        $query = $this->db->get();
        $lastday = $query->row_array();




        $timestamp = strtotime($this->data_day);
        /// echo $datas = date('Ymd', $timestamp);
        ///echo   $datas = date('Ymd',strtotime('+1 day', $timestamp));
        $data['all_groups'] = array();
        $this->db->from('booking_rooms')->where("  conter!=4 ");
        $data['all_rooms_3'] = $this->db->count_all_results();
        for ($index = 0; $index < 35; $index++) {
            $thisday = strtotime('+' . ($index) . ' day', $timestamp);
            if ($lastday['timeend'] > $thisday) {

                $whr = "counter=1  and  timeend> " . ($thisday + 86400);

                $this->db->from('booking');
                $this->db->where($whr);
                $data['all_count'] = ($this->db->count_all_results());

                if ($data['all_count'] > 0) {



                    $datas = date('Ymd', $thisday);
                    $data['all_groups'][$index]['dateee'] = $datas;
                    $data['all_groups'][$index]['allbook'] = $data['all_rooms_3'] - $data['all_count'];
                }
            }
        }
        /// echo $lastday['id'];


        $whr = " counter=1 ";

        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());
//        $this->db->from('booking');
//        $this->db->order_by('room', 'asc');
//        $this->db->where($whr);
//        $data['all_groups'] = $this->db->get()->result_array();
//        $i = 0;
//        foreach ($data['all_groups'] as $row) {
//
//            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
//            $clints = $query->row_array();
//            $data['all_groups'][$i]['cidimage'] = 'no';
//            if ($clints['file1'] or $clints['file2']) {
//                $data['all_groups'][$i]['cidimage'] = 'ok';
//            }
//
//
//            $i++;
//        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/allday';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    function convert2english($string) {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string = str_replace($persianDecimal, $newNumbers, $string);
        $string = str_replace($arabicDecimal, $newNumbers, $string);
        $string = str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }

    public function knet($mon = '', $all = '') {


        if ((!$this->db->table_exists('booking_knet'))) {
            $this->db->query("CREATE TABLE `booking_knet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }
        
        
        if (@stristr($_SERVER['REQUEST_URI'], 'booking')) {
            $ssss = 2;
            $ddd = "161422003";
            if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {
                $ddd = "السالمية";
                $ddd = "161422004";
            }

            if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {
                $ddd = "الرقعي";
                $ddd = "161422005";
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {
                $ddd = "الشعب";
                $ddd = "161422001";
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {
                $ddd = "ريحانة";
                $ddd = "161422006";
            }
        }
        $dbhost = "localhost"; // الخادم
        $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
        $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
        $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
        
          if (@stristr(getenv("SERVER_NAME"), 'localhost')) {
            
         $dbuser = "root";  // إسم مستخدم قاعدة البيانات
     $dbpass = "root";     // باسويرد قاعدة البيانات
       
       $dbname = "mktba2018"; // إسم قاعدة البيانات
          }
          
        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
            $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            // $mysqli22 = new mysqli("localhost", "root", "root", "chang");
            mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
            mysqli_query($mysqli22, "SET NAMES utf8");
            
            
            
            $data['ass']=array();
            $sql1s = mysqli_query($mysqli22,"select * from model_knet where  name LIKE '%" . $ddd . "%'    order by id  asc limit 100");
while($rowaa=mysqli_fetch_array($sql1s))
{
   $date = (substr($rowaa['dateadd'],0,4)).'/'.substr($rowaa['dateadd'],4,2).'/'.(substr($rowaa['dateadd'],6,2)); 
$rowaa['dateadd'] = date('Ymd', strtotime($date)-(30*30*24));
    if(isset($data['ass'][$rowaa['dateadd']])){
        $data['ass'][$rowaa['dateadd']]=$data['ass'][$rowaa['dateadd']]+$rowaa['count'];
    } else {   $data['ass'][$rowaa['dateadd']]=$rowaa['count'];}

}
            
            
        }
        
      
        
        $thismon = date('Ym', $this->booking->tissme_now());
        if (!$this->session->userdata('group')) {
            $mon = '';
        }
        if ($mon)
            $thismon = $mon;
        $page = 1;
        $to = strtotime(date($thismon . '01', $this->booking->tissme_now()));
        $from = strtotime(date($thismon . 't', $this->booking->tissme_now()) . '' . " 23:59");


        $whr = " ( ( timeenter BETWEEN '$to' AND '" . $from . "' and timerenew IS NULL) or ( timerenew BETWEEN '$to' AND '" . $from . "') )and  knet>1 and bookedok IS NULL";

        $whrd = "  datetext4   LIKE '%" . $thismon . "%'  and  knet>1 and bookedok IS NULL";



        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());
        $data['all_count'] = 100;

        $max = 10000;
        $max = 10000;
        if (!$this->session->userdata('group'))
            $max = 10;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;



//echo print_r($this->db->last_query());


        $query = $this->db->query("SELECT datetext4 FROM `booking` WHERE $whr  ORDER BY `timeenter` ASC");

        $data['all_days'] = $query->result_array();

        $this->db->from('booking');
        $this->db->order_by('id', 'asc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $day = '1';
        $daynow = '';
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        $billprint = 0;
        foreach ($data['all_groups'] as $row) {



            $erroroo = '';

            if ($row['billprint'] < $billprint and strlen($row['billprint']) == 4)
                $erroroo = "$erroroo<br>" . " سابق   : " . $row['billprint'] . " - " . date('Ymd', $row['timeenter']);



            if ( strlen($row['billprint']) == 4)  $billprint = $data['all_groups'][$i]['billprint'] = $this->convert2english($row['billprint']);





            $query = $this->db->get_where('booking', " billprint='" . $row['billprint'] . "' and id!='" . $row['id'] . "' and timeenter>" . ($row['timeenter'] - (60 * 60 * 24 * 10)));
            $mhtwah = $query->row_array();
            if (isset($mhtwah['id'])) {
                $erroroo = "$erroroo<br>";
                $erroroo = "$erroroo تكرار    : $billprint - " . date('Ymd', $row['timeenter']) . "   - " . $mhtwah['id'];
            }


            $data['all_groups'][$i]['daa'] = $erroroo;
//        if(strlen($billprint)==4)
//        {
//               $this->db->from('booking');
//        $this->db->where("LENGTH(billprint) = 4  and  billprint<".$billprint."   ");
//      echo  ($this->db->count_all_results())."-$billprint<br>";   
//        }
//               $query = $this->db->get_where('booking', " billprint<".$billprint." ");
//                     $mhtwah = $query->row_array();
//        if($mhtwah['id'])
//        {
//            echo "يوجد سابق بالوصل <br> : $billprint - ".date('Ymd', $row['timeenter']);
//        }
            /// echo print_r($this->db->last_query());
            $i++;
            $day = date('Ymd', $row['timeenter']);
            if ($day != $daynow) {

                $query = $this->db->get_where('booking_knet', array('dateadd' => $day));
                $mhtwah = $query->row_array();
                if ($this->input->post('name' . $day)) {
                    $text3 = $this->input->post('name' . $day);


                    if (!$mhtwah['name']) {


                        $dataadd = array('name' => $text3,
                            'dateadd' => $day,
                        );
                        $dataadd = $this->security->xss_clean($dataadd);
                        $result = $this->booking->insert('booking_knet', $dataadd);
                    } else {

                        $edit_data = array(
                            'name' => $text3,
                        );
                        $edit_data = $this->security->xss_clean($edit_data);
                       $this->db->where('dateadd', $day);$this->booking->update('booking_knet', $edit_data);
                    }
                    $mhtwah['name'] = $text3;
                }
if(!isset($mhtwah['name']))$mhtwah['name']=0;
                $data['name'][$day] = $mhtwah['name'];



                $daynow = $day;
            }
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'الشقق ';
        $data['thismon'] = $thismon;
        $data['all'] = $all;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/knet';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    
    
            public function knetcheck($mon = '', $all = '') {


   
            
            
            
            $whr = " ";
       if ($this->input->post('submit')) {
            $filename = $_FILES["file"]["tmp_name"];
            if ($_FILES["file"]["size"] > 0) {
                $file = fopen($filename, "r");
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if (isset($emapData[5]) and  strlen(trim($emapData[5])) ==9) {

                        
                           if (@stristr($_SERVER['REQUEST_URI'], 'booking')) {
            $ssss =161422003;
            $ddd = "حولي";
            if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {
                $ddd = "السالمية";
                $ssss = 161422004;
            }

            if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {
                $ddd = "الرقعي";
                $ssss = 161422005;
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {
                $ddd = "الشعب";
                $ssss = 161422001;
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {
                $ddd = "ريحانة";
                $ssss = 161422006;
            }
            
            
              if (@stristr($_SERVER['REQUEST_URI'], 'booking7')) {
         $ddd = "حولي الجديدة";
                $ssss = 161422008;
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking8')) {
         $ddd = "الفنطاس";
                $ssss = 161422007;
            }
        }
 
                    if($emapData[5]==$ssss)
                    {
                        
                        
                          $fddd=  explode(" ", trim($emapData[0]));
                  
                    $emapData[0]=$fddd[0];
                         $fddds=  explode("/", trim($emapData[0]));
                 
$query = $this->db->get_where('booking',"(knetcode='".trim($emapData[6])."'  LIKE '%" .trim($emapData[6]). "%'  or knetcode='0".trim($emapData[6])."'  or knetcode='00".trim($emapData[6])."' ) and  datetext4 LIKE '%" . $fddds[2] . "%' ");
                         $this->db->order_by('id desc');
                           $data['show'] = $query->row_array();
                      
                           if(isset($data['show']['id']))
                           {
                               if(isset($data['show']['timerenew'])!='')$data['show']['timeenter']=$data['show']['timerenew'];
                          
                    ///    echo $emapData[5];
                               $ddd=$data['show']['id'];
                
                               if(date("njY",$data['show']['timeenter']+(24*60*60))!=str_replace('/',"",trim($emapData[0])))
                               {
                                    if(date("njY",$data['show']['timeenter']+(48*60*60))!=str_replace('/',"",trim($emapData[0])))
                               {
                                   
                                    if(date("njY",$data['show']['timeenter'])!=str_replace('/',"",trim($emapData[0])))
                               {
                                    $ddd='';
                        echo trim($emapData[6]);
                         echo "  -  "; 
                             echo "<br>"; 
                         echo date("njY",$data['show']['timeenter']);
                         
                             echo "<br>"; 
                                   echo str_replace('/',"",$emapData[0]);
                                        echo "<br>"; 
                        echo ($data['show']['id']);
                        echo "<br>";
                        
                        
                               }
                               
                               }
                               }
                               
                               if( $ddd==$data['show']['id'])
                               {
                                   
                                       $this->db->where('id', $data['show']['id']);
                                          $this->booking->update('booking', array('knetok' => 'ok')); 
                                   
                                   
                               }
                           }else
                           {
                                echo trim($emapData[6]);
                         echo "  -  "; 
                             echo "<br>";  
                           }
                        
                    }
                        
                       
                        }
                    }
                }
            
        }

              if ($this->input->post('submitx')) {
                        
                  $array=  explode("\n", $this->input->post('comment8'));
                  
                     $arrayd=  explode("\n", $this->input->post('comment6'));
                  $addd=array();
                  for ($index = 0; $index < count($array); $index++) {
                      
                      if(trim($array[$index])!='')
                      {
                          
                      //    if(in_array($array[$index], $addd))die($array[$index]);
                          $addd[]=$array[$index];
                          
                           $query = $this->db->get_where('booking',"knetcode='".trim($array[$index])."'  or knetcode='0".trim($array[$index])."'  or knetcode='00".trim($array[$index])."'  ");
                           $data['show'] = $query->row_array();
                      
                           if(isset($data['show']['id']))
                           {
                               
                             ///  echo $array[$index];
                          
                                        $this->db->where('id', $data['show']['id']);
                                            if (@stristr(trim($arrayd[$index]), '-')) {
                                                
                                                
                                $this->booking->update('booking', array('knetok' => 'error'));     
                                            } else {
                                             
                                                  if ((trim($arrayd[$index])!=$data['show']['knet'])) {
                                                                   $this->booking->update('booking', array('knetok' => 'ok')); 
                                                  } else {
                                                              if ((trim($arrayd[$index])==$data['show']['knet']))     $this->booking->update('booking', array('knetok' => 'ok'));    
                                                  }
                                                 
                       
                                            }
                           
                           }
                
                     
                       
                     
                      }
                     
                  }
               ///   exit;
                  
              }
            
            
        
        $thismon = date('Ym', $this->booking->tissme_now());
        if (!$this->session->userdata('group')) {
            $mon = '';
        }
        if ($mon)
            $thismon = $mon;
        $page = 1;
        $to = strtotime(date($thismon . '01', $this->booking->tissme_now()));
        $from = strtotime(date($thismon . 't', $this->booking->tissme_now()) . '' . " 23:59");



          $whr = " ( ( timeenter BETWEEN '$to' AND '" . $from . "' and timerenew IS NULL) or ( timerenew BETWEEN '$to' AND '" . $from . "') )and  knet>1 and bookedok IS NULL and knetok IS NULL " ;


              if($all)$whr = " ( ( timeenter BETWEEN '$to' AND '" . $from . "' and timerenew IS NULL) or ( timerenew BETWEEN '$to' AND '" . $from . "') )and  knet>1 and bookedok IS NULL and knetok='errro' " ;
        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());
        $data['all_count'] = 100;

        $max = 10000;
        $max = 10000;
        if (!$this->session->userdata('group'))
            $max = 10;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;



//echo print_r($this->db->last_query());


        $query = $this->db->query("SELECT datetext4 FROM `booking` WHERE $whr  ORDER BY `timeenter` ASC");

        $data['all_days'] = $query->result_array();

        $this->db->from('booking');
        $this->db->order_by('id', 'asc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $day = '1';
        $daynow = '';
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        $billprint = 0;
        foreach ($data['all_groups'] as $row) {



       
      }
        $data['title'] = 'الشقق ';
        $data['thismon'] = $thismon;
        $data['all'] = $all;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/knetcheck';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }
    
      public function linkscheck($mon = '', $all = '') {


   
        
        $thismon = date('Ym', $this->booking->tissme_now());
        if (!$this->session->userdata('group')) {
            $mon = '';
        }
        if ($mon)
            $thismon = $mon;
        $page = 1;
        $to = strtotime(date($thismon . '01', $this->booking->tissme_now()));
        $from = strtotime(date($thismon . 't', $this->booking->tissme_now()) . '' . " 23:59");


        $whr = " ( ( timeenter BETWEEN '$to' AND '" . $from . "' and timerenew IS NULL) or ( timerenew BETWEEN '$to' AND '" . $from . "') )and  knet>1 and bookedok IS NOT NULL";

        $whrd = "  datetext4   LIKE '%" . $thismon . "%'  and  knet>1 and bookedok IS NOT NULL ";



        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());
        $data['all_count'] = 100;

        $max = 10000;
        $max = 10000;
        if (!$this->session->userdata('group'))
            $max = 10;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;



//echo print_r($this->db->last_query());


        $query = $this->db->query("SELECT datetext4 FROM `booking` WHERE $whr  ORDER BY `timeenter` ASC");

        $data['all_days'] = $query->result_array();

        $this->db->from('booking');
        $this->db->order_by('id', 'asc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $day = '1';
        $daynow = '';

        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        $billprint = 0;
        foreach ($data['all_groups'] as $row) {



            $erroroo = '';

            if ($row['billprint'] < $billprint and strlen($row['billprint']) == 4)
                $erroroo = "$erroroo<br>" . " سابق   : " . $row['billprint'] . " - " . date('Ymd', $row['timeenter']);



            if ( strlen($row['billprint']) == 4)  $billprint = $data['all_groups'][$i]['billprint'] = $this->convert2english($row['billprint']);





            $query = $this->db->get_where('booking', " billprint='" . $row['billprint'] . "' and id!='" . $row['id'] . "' and timeenter>" . ($row['timeenter'] - (60 * 60 * 24 * 10)));
            $mhtwah = $query->row_array();
            if (isset($mhtwah['id'])) {
                $erroroo = "$erroroo<br>";
                $erroroo = "$erroroo تكرار    : $billprint - " . date('Ymd', $row['timeenter']) . "   - " . $mhtwah['id'];
            }


            $data['all_groups'][$i]['daa'] = $erroroo;
//        if(strlen($billprint)==4)
//        {
//               $this->db->from('booking');
//        $this->db->where("LENGTH(billprint) = 4  and  billprint<".$billprint."   ");
//      echo  ($this->db->count_all_results())."-$billprint<br>";   
//        }
//               $query = $this->db->get_where('booking', " billprint<".$billprint." ");
//                     $mhtwah = $query->row_array();
//        if($mhtwah['id'])
//        {
//            echo "يوجد سابق بالوصل <br> : $billprint - ".date('Ymd', $row['timeenter']);
//        }
            /// echo print_r($this->db->last_query());
            $i++;
            $day = date('Ymd', $row['timeenter']);
            if ($day != $daynow) {

                $query = $this->db->get_where('booking_knet', array('dateadd' => $day));
                $mhtwah = $query->row_array();
                if ($this->input->post('name' . $day)) {
                    $text3 = $this->input->post('name' . $day);


                    if (!$mhtwah['name']) {


                        $dataadd = array('name' => $text3,
                            'dateadd' => $day,
                        );
                        $dataadd = $this->security->xss_clean($dataadd);
                        $result = $this->booking->insert('booking_knet', $dataadd);
                    } else {

                        $edit_data = array(
                            'name' => $text3,
                        );
                        $edit_data = $this->security->xss_clean($edit_data);
                       $this->db->where('dateadd', $day);$this->booking->update('booking_knet', $edit_data);
                    }
                    $mhtwah['name'] = $text3;
                }
if(!isset($mhtwah['name']))$mhtwah['name']=0;
                $data['name'][$day] = $mhtwah['name'];



                $daynow = $day;
            }
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'الشقق ';
        $data['thismon'] = $thismon;
        $data['all'] = $all;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/knet';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }
    public function bookingcom($page = 1) {


        $whr = " bookingnew!='' ";

        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());


        $max = 30;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;



//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/bookingcom';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function rooms($day = '') {



        $whr = " counter=1 ";
        if ($day)
            $whr = "counter=1  and  timeend> " . (strtotime($day) + 86400);

        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());

        $this->db->from('booking');
        if (!$day)
            $this->db->order_by('room', 'asc');
        if ($day)
            $this->db->order_by('timeend', 'asc');
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['country'] = $clints['country'];
            $data['all_groups'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/rooms';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    
     public function inok($day = '') {



        $whr = " counter=1  and inok=1  and outok=''";
        if ($day)
            $whr = "counter=1   and  timeend> " . (strtotime($day) + 86400);

        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());

        $this->db->from('booking');
        if (!$day)
            $this->db->order_by('room', 'asc');
        if ($day)
            $this->db->order_by('timeend', 'asc');
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['country'] = $clints['country'];
            $data['all_groups'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        
        
        
        $whr = " counter=2  and inok=1  and outok=''";
        if ($day)
            $whr = "counter=1   and  timeend> " . (strtotime($day) + 86400);

        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());

        $this->db->from('booking');
        if (!$day)
            $this->db->order_by('room', 'asc');
        if ($day)
            $this->db->order_by('timeend', 'asc');
        $this->db->where($whr);
        $data['all_groupsout'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groupsout'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groupsout'][$i]['country'] = $clints['country'];
            $data['all_groupsout'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groupsout'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/roominok';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function thbat($day = '') {



        $whr = " counter=1 ";
        if ($day)
            $whr = "counter=1  and  timeend> " . (strtotime($day) + 86400);

        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());

        $this->db->from('booking');
        if (!$day)
            $this->db->order_by('room', 'asc');
        if ($day)
            $this->db->order_by('timeend', 'asc');
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['country'] = $clints['country'];
            $data['all_groups'][$i]['file1'] = $clints['file1'];
            $data['all_groups'][$i]['file2'] = $clints['file2'];



            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/thbat';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function roomsout() {



        $whr = " counter=1  and (  timeend < " . $this->booking->tissme_now() . ") ";

        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());




//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('room', 'asc');
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }
            if($this->input->post('msgwait'.$row['id']))
            {
                
                
                $data['all_groups'][$i]['msgwait']= $row['msgwait'].$this->input->post('msgwait'.$row['id'])."||".$this->booking->tissme_now()."||".$this->session->userdata('name')."<aln3esa>";

        $this->db->where('id', $row['id']);$this->booking->update('booking', array('msgwait' =>$data['all_groups'][$i]['msgwait']));
    
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/roomsout';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function roomsfinsh($page = 1) {



        $whr = " timeend2!=''    and `counter` = '2'  ";


        $this->db->select_sum('comment2');
        $this->db->where(" $whr");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['comment2'];

        $this->db->from('booking');
        $this->db->where($whr);

        $data['all_count'] = ($this->db->count_all_results());
        $data['all_count'] = 20;
        $max = 20;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;


//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('timeend2', 'desc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            $data['all_groups'][$i]['timeendout'] = $row['timeend'];
            if ($row['timeend2'])
                $data['all_groups'][$i]['timeend'] = $row['timeend2'];
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/roomsfinsh';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

public function all3gd($page = 1,$old='', $room = '') {

if(isset($_POST['idall']))
{
    

$idall = $_POST['idall'];   

        for ($index = 0; $index < count($idall); $index++) {
            echo $idall[$index];
               $this->db->where('id', $idall[$index]);
                  $this->booking->update('booking', array('3gdok' => 'error'));
        }
        
        }
        $whr = "(3gd <> '' )  AND (timerenew is null or timerenew = '')";

        $thismon =  $thismon2 = date('Ym', $this->booking->tissme_now());
      
       
        if($old)  {
              $thismon = $old;
               $whr = "$whr and timeenter BETWEEN " . strtotime($thismon . "01 00:00")." AND " . strtotime($thismon2 . "01 00:00");
        }else
        {
              $whr = "$whr and   timeenter>" . strtotime($thismon . "01 00:00"); 
        }
      
        if ($room)
            $whr .= " and  3gdok='error' ";
        $this->db->select_sum('comment2');
        $this->db->where(" $whr");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['comment2'];

        $this->db->from('booking');
        $this->db->where($whr);

        $data['all_count'] = ($this->db->count_all_results());
          $data['old'] = $old;
   ///  if (!$this->session->userdata('group') and !$this->session->userdata('editor')) $data['all_count'] = 50;
        $max = 50;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;


//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('id', 'asc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {


            $MshrfAll2 = explode(" ", trim($row['name']));
            $data['all_groups'][$i]['name'] = $MshrfAll2[0] . '  ' . $MshrfAll2[1];
            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            $data['all_groups'][$i]['timeendout'] = $row['timeend'];
            if ($row['timeend2'])
                $data['all_groups'][$i]['timeend'] = $row['timeend2'];
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all3gd';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function allnot($page = 1) {



        $whr = "(comment7 <> '' )  ";



        $this->db->from('booking');
        $this->db->where($whr);

        $data['all_count'] = ($this->db->count_all_results());
        $data['all_count'] = 50;
        $max = 20;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;


//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('timeend2', 'desc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;

        foreach ($data['all_groups'] as $row) {


            $MshrfAll2 = explode(" ", trim($row['name']));
            $data['all_groups'][$i]['name'] = $MshrfAll2[0] . '  ' . $MshrfAll2[1];
            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            $data['all_groups'][$i]['timeendout'] = $row['timeend'];
            if ($row['timeend2'])
                $data['all_groups'][$i]['timeend'] = $row['timeend2'];
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/allnot';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function billdown($page = 1) {



        $whr = "(bill <35)  and dayfree=0";



        $this->db->from('booking');
        $this->db->where($whr);

        $data['all_count'] = ($this->db->count_all_results());
        $data['all_count'] = 50;
        $max = 20;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;


//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('timeend', 'desc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;

        foreach ($data['all_groups'] as $row) {


            $MshrfAll2 = explode(" ", trim($row['name']));
            $data['all_groups'][$i]['name'] = $MshrfAll2[0] . '  ' . $MshrfAll2[1];
            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            $data['all_groups'][$i]['timeendout'] = $row['timeend'];
            if ($row['timeend2'])
                $data['all_groups'][$i]['timeend'] = $row['timeend2'];
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/billdown';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function roomsmove($page = 1, $room = '') {



        $whr = " oldroom!=''  and timemove!=''  ";

        if ($room)
            $whr .= " and   oldroom='$room' ";
        $this->db->select_sum('comment2');
        $this->db->where(" $whr");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['comment2'];

        $this->db->from('booking');
        $this->db->where($whr);

        $data['all_count'] = ($this->db->count_all_results());
        $data['all_count'] = 50;
        $max = 20;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;


//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('timemove', 'desc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            $data['all_groups'][$i]['timeendout'] = $row['timeend'];
            if ($row['timeend2'])
                $data['all_groups'][$i]['timeend'] = $row['timeend2'];
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/roomsmove';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function waitproblem($page = 1) {



        $whr = " comment1!=''    and comment5='no' ";


        $this->db->select_sum('comment2');
        $this->db->where(" $whr");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['comment2'];

        $this->db->from('booking');
        $this->db->where($whr);

        $data['all_count'] = ($this->db->count_all_results());
        $max = 20;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;


//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('timeend2', 'desc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            $data['all_groups'][$i]['timeendout'] = $row['timeend'];
            if ($row['timeend2'])
                $data['all_groups'][$i]['timeend'] = $row['timeend2'];
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/waitproblem';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function waitbill($page = 1, $finsh = '') {



        $whr = " comment2>0   and comment5='wait' ";
        if ($finsh)
            $whr = " comment5='okwait' ";

        $this->db->select_sum('comment2');
        $this->db->where(" $whr");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['comment2'];

        $this->db->from('booking');
        $this->db->where($whr);

        $data['all_count'] = ($this->db->count_all_results());
        $max = 20;
        $data['pages'] = ceil($data['all_count'] / $max) + 1;


//echo print_r($this->db->last_query());

        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->limit($max, ($max * $page) - $max);
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['all_groups'][$i]['timeendout'] = $row['timeend'];
            if ($row['timeend2'])
                $data['all_groups'][$i]['timeend'] = $row['timeend2'];
            $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
            $clints = $query->row_array();
            $data['all_groups'][$i]['cidimage'] = 'no';
            if ($clints['file1'] or $clints['file2']) {
                $data['all_groups'][$i]['cidimage'] = 'ok';
            }


            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/waitbill';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function id($id) {

        if ($this->session->flashdata('msg')) {
            $data['msg'] = $this->session->flashdata('msg');
            $this->session->set_flashdata('msg', '');
        }

        $query = $this->db->get_where('booking', array('id' => $id));
        $data['show'] = $query->row_array();

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


        
        
        
              $this->db->from('booking_card');
        $this->db->order_by('id', 'desc');
        $this->db->where(" booking ='" . $data['show']['id'] . "'  ");
        $data['booking_card'] = $this->db->get()->result_array();
        
        
        
        
        
        
        $query = $this->db->get_where('booking_clints', array('cid' => $data['show']['cid']));
        $clints = $query->row_array();
        $data['show']['country'] = $clints['country'];


        $data['show']['dayfreeall'] = "0";

        $dbhost = "localhost"; //
        $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
        $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
        $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
//                $dbuser = "root";  // إسم مستخدم قاعدة البيانات
//                $dbpass = "root";     // باسويرد قاعدة البيانات
//                $dbname = "booking"; // إسم قاعدة البيانات
        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
            mysqli_query($mysqli1, "SET NAMES utf8");
            $sql1SSS = mysqli_query($mysqli1, "select * from booking_subscriptions       where  (  cid = '" . $data['show']['cid'] . "'    and counter=2)  ");
            while ($row = mysqli_fetch_array($sql1SSS)) {

                $data['show']['dayfreeall'] = $row['dayfree'];
            }
        }






        $data['show']['file1'] = $clints['file1'];
        $data['show']['file2'] = $clints['file2'];
        
                $data['show']['file3'] = $clints['file3'];
//echo print_r($this->db->last_query());

        $data['show']['timeendout'] = $data['show']['timeend'];
        if ($data['show']['timeend2'])
            $data['show']['timeend'] = $data['show']['timeend2'];

        //   if (isset($data['show']['knet'])==NULL)
        //   $data['show']['knet'] = 0;




        $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');
        $this->db->where("conter=1 ");
        $data['all_rooms'] = $this->db->get()->result_array();




        $this->db->from('booking');
        $this->db->order_by('id', 'asc');
        $this->db->where("timeenter=" . $data['show']['timeenter']);
        $data['all_book'] = $this->db->get()->result_array();


        $data['title'] = '  عرض تسكين';
        $data['thispage'] = $this->thispage;
        $data['data_day'] = $this->data_day;


        if ($data['show']['counter'] == 1)
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/booking';
        else
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/bookingfinsh';


        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function print3gd($id) {



        $query = $this->db->get_where('booking', array('id' => $id));
        $data['row'] = $query->row_array();

        if($data['row']['bookedok']=='wait')
        {
            $this->db->where('id', $id);
            $this->booking->update('booking', array('bookedok' => 'ok', 'timeenter' => $this->booking->tissme_now(),'user' => $this->session->userdata('name'))); 
        }
        $query = $this->db->get_where('booking_clints', array('cid' => $data['row']['cid']));
        $clints = $query->row_array();
        $data['row']['country'] = $clints['country'];
        $data['row']['file1'] = $clints['file1'];
        $data['row']['file2'] = $clints['file2'];
//echo print_r($this->db->last_query());













        $data['title'] = '  عرض تسكين';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/' . $this->thispage . '/3gd', $data);
    }

    public function printbill($id) {



        $query = $this->db->get_where('booking', array('id' => $id));
        $data['row'] = $query->row_array();

        $query = $this->db->get_where('booking_clints', array('cid' => $data['row']['cid']));
        $clints = $query->row_array();
        $data['row']['country'] = $clints['country'];
        $data['row']['file1'] = $clints['file1'];
        $data['row']['file2'] = $clints['file2'];


//echo print_r($this->db->last_query());

        $data['title'] = '  عرض تسكين';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/' . $this->thispage . '/3gdbill', $data);
    }

    public function printbillall($id) {



        $query = $this->db->get_where('booking', array('id' => $id));
        $data['row'] = $query->row_array();

        $query = $this->db->get_where('booking_clints', array('cid' => $data['row']['cid']));
        $clints = $query->row_array();
        $data['row']['country'] = $clints['country'];
        $data['row']['file1'] = $clints['file1'];
        $data['row']['file2'] = $clints['file2'];
        $this->db->from('booking');
        $this->db->order_by('id', 'asc');
        $this->db->where("timeenter=" . $data['row']['timeenter']);
        $data['all_book'] = $this->db->get()->result_array();
//echo print_r($this->db->last_query());

        $data['title'] = '  عرض تسكين';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/' . $this->thispage . '/3gdbillall', $data);
    }

}

?>