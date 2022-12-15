<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gyab extends MY_Controller {

    var $thispage;
    var $data_day;
    var $user;
    var $thismon;
    var $nao;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
        $this->data_day = $this->booking->data_day(13);
        $this->user = $this->session->userdata('name');
        $this->thispage = "gyab";
        $this->thismon = date('Ym', $this->booking->tissme_now());

  if(!$this->session->userdata('group')){
            echo "لايمكن الاستخدام ";
               $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
            ///echo $_SERVER['HTTP_REFERER'];
            
             redirect($_SERVER['HTTP_REFERER']);
            exit;
        }

        $this->nao[1] = "ايراد";
        $this->nao[2] = "مصروفات";
        $this->nao[3] = "سلفة";
        $this->nao[4] = "استرجاع سلفة";
        $this->nao[5] = "تصدير";
    }

    public function index() {

        $this->all();
    }

    function sum_bill($catid, $tbl) {
        $this->db->select_sum($tbl);
        $this->db->where(" $catid ");
        $query = $this->db->get('model_modif')->row_array();
        if (!$query[$tbl])
            $query[$tbl] = 0;
        return $query[$tbl];
    }

    public function all($mon = '', $catid = '') {

        // $this->add_another_db();


        if ($mon)
            $this->thismon = $mon;
        
        
        
        
        
            $query = $this->db->query("SELECT name FROM `booking_gyab` where name!='' and `dateadd` LIKE '%$this->thismon%' group by name ORDER BY `name` ASC");

        $data['modif'] = $query->result_array();
         $i=0;
           foreach ($data['modif'] as $row) {
               
               
          ///     echo $row['name'];
                   $query = $this->db->get_where('booking_gyab', array('name' => $row['name']));
                 $clints = $query->row_array();
             
                      $whr = " `dateadd` LIKE '%$this->thismon%' and  name='".$row['name']."'";
        $this->db->from('booking_gyab');
        $this->db->where($whr);
        $max = 10000;
        $data['modif'][$i]['mongyab']= $this->db->count_all_results();
                 
                 
                    $data['modif'][$i]['id']= $clints['id']; 
           $data['modif'][$i]['name']= $clints['name'];
             $data['modif'][$i]['enterdev']= $clints['enterdev'];
                $data['modif'][$i]['outdev']= $clints['outdev'];
               
               $i++;
           }
           
           
//           exit;
//        
//  $dbhost = "localhost"; // الخادم
//        $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
//        $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
//        $dbname = "tarefe_kuwaityc_ltef"; // إسم قاعدة البيانات
//        
////        
////      $dbuser = "root";  // إسم مستخدم قاعدة البيانات
////   $dbpass = "root";     // باسويرد قاعدة البيانات
////   $dbname = "mktba2018"; // إسم قاعدة البيانات
//        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
//            $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
//            // $mysqli22 = new mysqli("localhost", "root", "root", "chang");
//            mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
//            mysqli_query($mysqli22, "SET NAMES utf8");
//            
//             $ssss = 2;
//            
//            if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {
//            
//                $ssss = 1;
//            }
//
//            if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {
//           
//                $ssss = 3;
//            }
//             if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {
//                
//                $ssss = 4;
//            }
//         ///   and text21='$ssss' 
//$arraystat=mysqli_query($mysqli22,"select * from  `model_modif` where  text20!='modif' and text22!='1' and text21='$ssss'   order by text1  asc  ");     
//  ///   $data['modif']=mysqli_fetch_array($arraystat);
// ///$data['modif']=mysqli_fetch_array($arraystat);
//       
//     $i = 0;
// $data['modif']=array();
//     while($rowaa=mysqli_fetch_array($arraystat))
//{  
//          if($rowaa['text1']!="المصبغة")
//          {
//       $query = $this->db->get_where('booking_gyab', array('name' => $rowaa['text1']));
//                $clints = $query->row_array();
//                 $data['modif'][$i]['id']= $clints['id']; 
//          $data['modif'][$i]['text1']= $rowaa['text1'];
//             $data['modif'][$i]['text6']= $rowaa['text6'];
//                $data['modif'][$i]['text7']= $rowaa['text7'];
//          }
//      /// echo  $rowaa['dateadd'];
//         $i++;
//     }
//       
//         }

         
         
        
        
        $data['title'] = 'Dashboard';

        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }



    public function del($id) {


        $this->db->where('id', $id);
        $result = $this->booking->delete('booking_gyab');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم الحذف   بفضل الله!');
     redirect($_SERVER['HTTP_REFERER']);
        }
    }

 
    public function show($id,$mon) {

        $query = $this->db->get_where('booking_gyab', array('id' => $id));
        $data['show'] = $query->row_array();
        // $data['show']['catid'] = $this->nao[$data['show']['catid']];

        $add = FALSE;

            if ($mon)
            $this->thismon = $mon;

            


        $this->db->from('booking_gyab');
       $this->db->order_by('id', 'asc');

        $this->db->where("name='" . $data['show'] ['name'] . "' and `dateadd` LIKE '%$this->thismon%'");
        
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();




        $data['title'] = 'عرض فاتورة ';

        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

}

?>