<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bills2 extends MY_Controller {

    var $thispage;
    var $data_day;
    var $user;
    var $thismon;
    var $nao;

    public function __construct() {
        parent::__construct();
          if(!$this->session->userdata('group') and ! $this->session->userdata('editor')){
            echo "لايمكن الاستخدام ";
               $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
            ///echo $_SERVER['HTTP_REFERER'];
            
             redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
        $this->load->model('booking');
        $this->data_day = $this->booking->data_day(13);
        $this->user = $this->session->userdata('name');
        $this->thispage = "bills2";
        if(date('h', $this->booking->tissme_now())<14)
        $this->thismon = date('Ym', $this->booking->tissme_now()-(13*60*60));
        else
        $this->thismon = date('Ym', $this->booking->tissme_now());

 if((!$this->db->table_exists('model_ohda')))
 {
   $this->db->query("CREATE TABLE `model_ohda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `counter` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `catid2` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
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
  `text11` varchar(255) DEFAULT NULL,
  `text12` varchar(255) DEFAULT NULL,
  `text13` varchar(255) DEFAULT NULL,
  `text14` varchar(255) DEFAULT NULL,
  `text15` varchar(255) DEFAULT NULL,
  `text16` varchar(255) DEFAULT NULL,
  `text17` varchar(255) DEFAULT NULL,
  `text18` varchar(255) DEFAULT NULL,
  `text19` varchar(255) DEFAULT NULL,
  `text20` varchar(255) DEFAULT NULL,
  `text21` varchar(255) DEFAULT NULL,
  `text22` varchar(255) DEFAULT NULL,
  `text23` varchar(255) DEFAULT NULL,
  `text24` varchar(255) DEFAULT NULL,
  `text25` varchar(255) DEFAULT NULL,
  `text26` varchar(255) DEFAULT NULL,
  `text27` varchar(255) DEFAULT NULL,
  `text28` varchar(255) DEFAULT NULL,
  `text29` varchar(255) DEFAULT NULL,
  `text30` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");  
     
 }

        $this->nao[1] = "ايراد";
        $this->nao[2] = "مصروفات";
        $this->nao[3] = "سلفة";
        $this->nao[4] = "استرجاع سلفة";
        $this->nao[5] = "تصدير";
            $this->nao[6] = "راس مال";
                $this->nao[7] = "شيك";
                    $this->nao[8] = "مسترجع";
    }

    public function index() {

        $this->all();
    }

    function sum_bill($catid, $knet = '') {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        if ($knet)
            $this->db->like('text2', "knet");
        $query = $this->db->get('model_ohda')->row_array();
        if (!$query['text1'])
            $query['text1'] = 0;
        return $query['text1'];
    }

    public function all($mon = '', $catid = '') {

        // $this->add_another_db();


        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon)
            $this->thismon = $mon;
        $data['all_bill'] = ($this->sum_bill("1 and text3!=1 ") + $this->sum_bill('4') + $this->sum_bill('6')) - ($this->sum_bill('2  and text3!=1') + $this->sum_bill('5') + $this->sum_bill('3') + $this->sum_bill('8'));



        $whr = " `dateadd` LIKE '%$this->thismon%'";

        
        

        $data['all_bill1'] = $this->sum_bill('1  and ' . $whr)- $this->sum_bill('8 and ' . $whr);
        $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
               $data['all_bill8'] = $this->sum_bill('8 and ' . $whr);
        if ($catid)
            $whr = " $whr and  catid='$catid'";
        $this->db->from('model_ohda');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_ohda');
        $this->db->order_by('dateadd', 'desc');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['all_groups'][$i]['gruop'] = $this->nao[$row['catid']];

            $i++;
        }
        $data['title'] = 'Dashboard';

        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function updatebalc($mon = '', $catid = '') {

        // $this->add_another_db();


        $this->db->from('model_ohda');
        $this->db->order_by('id', 'asc');

        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        $totall = 0;
        foreach ($data['all_groups'] as $row) {

            if ($row['catid'] == 1 and $row['text3'] != 1)
                $totall = $totall + $row['text1'];

            if ($row['catid'] == 4 or $row['catid'] == 6)
                $totall = $totall + $row['text1'];



            if ($row['catid'] == 3 or $row['catid'] == 5 or $row['catid'] == 8)
                $totall = $totall - $row['text1'];


            if ($row['catid'] == 2 and $row['text3'] != 1)
                $totall = $totall - $row['text1'];


            $this->db->where('id', $row['id']);$this->db->update('model_ohda', array(
                'text5' => $totall));
        }
        redirect(base_url('booking/' . $this->thispage));
    }

    public function stat($mon = '', $catid = '') {

        if (!$this->session->userdata('group')) {
            echo "لايمكن الاستخدام ";
            $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
            ///echo $_SERVER['HTTP_REFERER'];

            redirect($_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon)
            $this->thismon = $mon;




        

        
                  $query = $this->db->query("SELECT file5 FROM `booking_clints`  where  file5!='' group by file5 ORDER BY `file5` ASC limit 1000");

        $data['all_file5'] = $query->result_array();
         $i = 0;
   foreach ($data['all_file5'] as $row) {
       
       
                  $this->db->from('booking_clints');
        $this->db->where(" file5='".$row['file5']."'");

         echo $data['all_file5'][$i]['file5'] = ($this->db->count_all_results());
       echo $row['file5']."<br>";
        $i++;
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }


        $whr = " `dateadd` LIKE '%$this->thismon%'";


            $query = $this->db->query("SELECT user FROM `booking` WHERE `datetext4` LIKE '%$this->thismon%' group by user ORDER BY `user` ASC");

        $data['all_user'] = $query->result_array();



        $i = 0;
        $all_cash = 0;
        foreach ($data['all_user'] as $row) {
            
                  $this->db->from('booking');
        $this->db->where(" `datetext4` LIKE '%$this->thismon%' and user='".$row['user']."'");

         $data['all_user'][$i]['userbooking'] = ($this->db->count_all_results());
              $row['user']." <strong>- ".$data['all_user'][$i]['userbooking']."   </strong><br /><br />";
            
            $i++;
        }
        
        
        
        
        
        
        $data['all_bill1'] = $this->sum_bill('1 and  ' . $whr);
        $data['all_bill2'] = $this->sum_bill('2  and ' . $whr);
        $data['all_bill3'] = $this->sum_bill('3  and ' . $whr);
        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
        if ($catid)
            $whr = " $whr and  catid='$catid'";



        $query = $this->db->query("SELECT dateadd FROM `model_ohda` WHERE `dateadd` LIKE '%$this->thismon%' group by dateadd ORDER BY `dateadd` ASC");

        $data['all_groups'] = $query->result_array();



        $i = 0;
        $all_cash = 0;
        foreach ($data['all_groups'] as $row) {

            $whr = " `dateadd` LIKE '%" . $row['dateadd'] . "%'";


            
        $this->db->from('booking');
        $this->db->where("  datetext4 = '" .$row['dateadd'] . "'  ");
         $data['all_groups'][$i]['all_booking'] = $this->db->count_all_results();
         
         
         
 $dddds=0;
//         for ($index = 0; $index < 24; $index++) {
//             
//            $from = strtotime($row['dateadd']." 11:00")+(60*60*$index);  
//          $this->db->from('booking');
//         // $this->db->group_by("room");
//        $this->db->where("  timeenter < '" .$from . "'  and ( timeend2>  ".(($from+(60*60))-1)."  ) and timeend2!='' ");
//         $data['all_groups'][$i]['all_bookingddd'] = $this->db->count_all_results();
//        $ddddd= $data['all_groups'][$i]['all_bookingddd'];
//          
//          
//           $this->db->from('booking_rooms');
//          $ffff=ceil(($ddddd / $this->db->count_all_results())*100) ;
//  
//             $dddds=$dddds+$ffff;
//         }
//        
     $data['all_groups'][$i]['all_roomfull'] = "";
//           
           $this->db->from('booking_clints');
        
          $this->db->where("  datetext = '" .$row['dateadd'] . "'  ");
           $data['all_groups'][$i]['all_clints'] = $this->db->count_all_results();
          
         
            $data['all_groups'][$i]['all_bill1'] = $this->sum_bill('1 and ' . $whr);
            $data['all_groups'][$i]['all_billknet'] = $this->sum_bill('1 and ' . $whr, 'ok');
            $data['all_groups'][$i]['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
            $data['all_groups'][$i]['all_bill4'] = $this->sum_bill('4 and ' . $whr);
            $data['all_groups'][$i]['all_bill5'] = $this->sum_bill('5 and ' . $whr);
            $data['all_groups'][$i]['all_bill5knet'] = $this->sum_bill('5 and ' . $whr, 'ok');

            $this->db->from('model_ohda');
            $this->db->order_by('id', 'desc');
            $this->db->where('catid=5  and dateadd= ' . $row['dateadd'] . " and `text2` not LIKE '%knet%'");
            $this->db->limit(1);
            $rowlast = $this->db->get()->row_array();


            $data['all_groups'][$i] ['all5_last'] = '0';
            if ($rowlast['text1'] > 0) {
                $all_cash = $all_cash + ($rowlast['text1']);

                $data['all_groups'][$i] ['all5_last'] = $rowlast['text1'];
            }

            $i++;
        }

        
                $this->db->from('booking');
      $this->db->where(" timeend2!=''  ");
        $this->db->order_by('id','asc');
       $this->db->limit(1500);
         $data['enterout'] =   $this->db->get()->result_array();
        
         $flagscounter['all']=1;
$flagscounter2['all']=1;

     $days = array( 'Mon', 'Tue' , 'Wed' , 'Thu', 'Fri' , 'Sat','Sun');
  for ($indexd = 1; $indexd < count($days)+1; $indexd++) {
      $ddd='';
for ($index1 = 0; $index1 < 24; $index1++) {
    
       
   if(!$ddd){
       
   
  $agd = sprintf($indexd."%'.02d", $index1);
     $countryname[$agd]=$agd;
     $flagscounter[$agd]=0;
       $flagscounter2[$agd]=0;
       $ddd='';
       }else
       {
           $ddd='';
       }
}
   }  
         $yee21=0;
       $yee25=0;
        $yee30=0;
         $yee35=0;
          $yee40=0;
           $yee45=0;
            $yee50=0;
             $yee55=0;
      
$data['Mon']=0;
$data['Tue']=0;
$data['Wed']=0;
$data['Thu']=0;
$data['Fri']=0;
$data['Sat']=0;
$data['Sun']=0;
                foreach ($data['enterout'] as $row) {
                      $day = date('D', $row['timeenter']);
///echo $day.'<br />';
$data[$day]=($data[$day]+(1));
                     if (strlen($row['cid']) == 12)
                     {
                         
                          $MonnumN = date('m', time());
                    $DaYnumm = date('d', time());

                         
                     $ysss = (date('Y', time()) - ("19" . (substr($row['cid'], 1, 2))));
                     
                     
if($ysss>54)$yee55;
elseif($ysss >49)$yee50++;
elseif($ysss >44)$yee45++;
elseif($ysss >39)$yee40++;
elseif($ysss >34)$yee35++;

elseif($ysss >29)$yee30++;
elseif($ysss >26)$yee25++;

elseif($ysss <26)$yee21++;
                 
                         
                         
                         
                     }
                   
 $code= date('NH',$row['timeenter']);
$code2= date('NH',$row['timeend2']);
      
if(!isset($flagscounter[$code]))
{
$flagscounter[$code]=1;


///$countryname[$code]=$code;
}else{
$flagscounter[$code]++;
$flagscounter['all']++;
}
                  
if(!isset($flagscounter2[$code2]))
{
$flagscounter2[$code2]=1;
///$countryname[$code2]=$code2;
///$flagscounter[$code]=0;
///$countryname2[$code2]=$code2;
}else{
$flagscounter2[$code2]++;
$flagscounter2['all']++;
}




                }
                
           
                
                   $data['yee25'] = $yee25;
                   $data['yee21'] = $yee21;
                    $data['yee30'] = $yee30;
                    $data['yee35'] = $yee35;
                    $data['yee40'] = $yee40;
                    $data['yee45'] = $yee45;
                    $data['yee50'] = $yee50;
                    $data['yee55'] = $yee55;
             
                arsort($countryname);
                
            
                    $data['countryname'] = $countryname;
                     $data['flagscounter'] = $flagscounter;
                     
                        $data['flagscounter2'] = $flagscounter2;
             
        $data['all_cash'] = $all_cash;
        $data['title'] = 'Dashboard';

        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/stat';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

        public function exportday($day='') {
             if ($this->input->post('cash')>0)
             {
                 
                       if ($this->input->post('knet'))
  {
                  
                     $data = array(
                    'catid' => "5",
                    'text1' => $this->input->post('knet'),
                    'text3' => '',
                    'text2' =>"knet",
                    'dateadd' => $this->data_day,
                    'counter' => '1',
                );
                $data = $this->security->xss_clean($data);
 $result = $this->booking->insert('model_ohda', $data);       
                  
                  
              }
                
     
               
                     $data = array(
                    'catid' => "5",
                    'text1' => ($this->input->post('cash')-$this->input->post('knet')),
                    'text3' => '',
                    'text2' => "كاش",
                    'dateadd' => $this->data_day,
                    'counter' => '1',
                );
                 
                $data = $this->security->xss_clean($data);
        $result = $this->booking->insert('model_ohda', $data);       
                  
            $this->add_another_db();
 
                       redirect(base_url('booking/bills2/endbill/' . $this->data_day));
                  
              }
            
        }
    public function add() {
        $add = FALSE;
        
        
               
      $query = $this->db->get_where('model_ohda', array('dateadd' => $this->data_day,'catid'=>'5','text2'=>'كاش'));
        $data['show'] = $query->row_array();
                if(!isset($data['show']['catid']))$data['show']['catid']=0;
               if($data['show']['catid']==5)
               {
                    $this->data_day = $this->booking->data_day(12); 
                  
               }
  if ($this->input->post('modif'))
  {
      
      
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
            
            
            $rowarrays=mysqli_query($mysqli22,"select * from  model_modif where text1='".$this->input->post('modif')."'  order by id desc  LIMIT 0,1 ");
$rowarrays=mysqli_fetch_array($rowarrays);

$text2="سلفة من الراتب   ".$rowarrays['text1'];
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
mysqli_query($mysqli22,"insert model_modif set name='$text1 $text2 ',dateadd='".$this->data_day."',counter='1',text19='".$rowarrays['text2']."',text1='".$this->input->post('text1')."',text2='$text2',text3='$text3',text4='$text4',text5='$text5',text6='$text6',text7='$text7',text8='$text8',text9='$text9',text10='$text10',text11='$text11',text12='$text12',text13='$text13',text14='$text14',text15='$text15',text16='$text16',text17='$text17',text18='$text18',text20='modif',text21='$ssss' "); 
            
        }
 
      $_POST['text2']="  سلفة على : ".$this->input->post('modif');
      
  }

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('catid', '', 'trim|required');
            $this->form_validation->set_rules('text1', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required');
            //	$this->form_validation->set_rules('comm', '', 'trim|required');

            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {
                $cash = '';
                if ($this->input->post('cash'))
                    $cash = ' كاش ';

                if ($this->input->post('knet'))
                    $cash = ' knet ';

                $add = TRUE;
                $data = array(
                    'catid' => $this->input->post('catid'),
                    'text1' => $this->input->post('text1'),
                    'text3' => '',
                    'text2' => $this->input->post('text2') . " $cash ",
                    'text11' => $this->input->post('text11'),
                    'text12' => $this->input->post('text12'),
                    'text13' => $this->input->post('text13'),
                    'dateadd' => $this->data_day,
                    'counter' => '1',
                );
                $data = $this->security->xss_clean($data);









                $result = $this->booking->insert('model_ohda', $data);
                if ($result) {
                    if ($this->input->post('cash') and $this->input->post('endbill')) {

                        /// if ($this->booking->data_day(13) != $this->data_day)
                        $this->add_another_db();
 
                       redirect(base_url('booking/bills2/endbill/' . $this->data_day));
                    } else {
                        $this->session->set_flashdata('msg', 'تم اضافة الفاتورة بفضل الله!');
                        redirect(base_url('booking/bills2/'));
                    }
                }
            }
        }


        if (!$add) {


  $dbhost = "localhost"; // الخادم
        $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
        $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
        $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
        
        
     ///     $dbuser = "root";  // إسم مستخدم قاعدة البيانات
   /// $dbpass = "root";     // باسويرد قاعدة البيانات
    ///$dbname = "mktba2018"; // إسم قاعدة البيانات
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
$arraystat=mysqli_query($mysqli22,"select * from  `model_modif` where  text20!='modif' and text22!='1'  and text21='$ssss'  order by text1  asc  ");     
  ///   $data['modif']=mysqli_fetch_array($arraystat);
 ///$data['modif']=mysqli_fetch_array($arraystat);
       
     $i = 0;
 $data['modif']=array();
     while($rowaa=mysqli_fetch_array($arraystat))
{  
          if($rowaa['text1']!="المصبغة")$data['modif'][$i]['name']= $rowaa['text1'];
      /// echo  $rowaa['dateadd'];
         $i++;
     }
       
         }

//$data['cats_select']  = $this->db->get()->result_array();

            $query = $this->db->get_where('model_ohda', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة فاتورة';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function add_another_db() {
     
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
             if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {
                $ddd = "ريحانة";
                $ssss = 9;
            }
        }
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
            mysqli_query($mysqli22, "DELETE FROM model_ohda2 WHERE dateadd='" . $this->booking->data_day(13) . "' and text30='$ssss' and catid='1'");
            $this->db->from('model_ohda');
            $this->db->order_by('id', 'desc');
            $this->db->where('catid=5  and dateadd= ' . $this->data_day . " and `text2` not LIKE '%knet%'");
            $this->db->limit(1);
            $rowlast = $this->db->get()->row_array();
            $cccc = ( "insert model_ohda2 set name='" . $this->booking->data_day(13) . "',dateadd='" . $this->booking->data_day(13) . "',counter='1',catid='1',text30='$ssss',text1='" . $rowlast['text1'] . "',text2='    $ddd  " . $this->booking->data_day(13) . " كاش',text3='0',catid2='0',text4='',text5='',text6='',text7='',text8='',text9='',text10='',text11='',text12='',text13='',text14='',text15='',text16='',text17='',text18='',text19='',text20='' ,text21='' ,text22='' ,text23='' ,text24='' ,text25='' ,text26='' ,text27='' ,text28='',text29=''  ");
            mysqli_query($mysqli22, $cccc);


            $this->db->from('model_ohda');
            $this->db->order_by('id', 'desc');

            $this->db->where(' dateadd= ' . $this->data_day . " and catid!=5  and catid!=8");
//$this->db->limit($max, ($max*$page)-$max);
            $data['all_groups'] = $this->db->get()->result_array();
            $i = 0;
            $all_cash = 0;
            foreach ($data['all_groups'] as $row) {

                if($row['catid']==1 and @stristr($row['text2'],'كاش'))
                {
                     $query = $this->db->get_where('model_ohda', array('catid' => "8",'dateadd'=> $row['dateadd']));
        $data['edit'] = $query->row_array();  
     if($data['edit']['text1']) $row['text1'] =$row['text1'] -  $data['edit']['text1'];
             
                }
                $ssssss=$ssss;
                   if($row['catid']==1 and @stristr($row['text2'],'اشتراك'))
                {
                       
                     $ssssss=5;  
                   }
                  /// echo $row['text1'] . "',text2='$ddd " . $row['text2'];
                $wqq = mysqli_query($mysqli22, "select * from  model_ohda where dateadd='" . $row['dateadd'] . "' and text30='$ssssss' and catid='" . $row['catid'] . "' and text1='" . $row['text1'] . "'  and text2='$ddd " . $row['text2'] . "' order by id desc")or die("ddd");
                $num_sql = mysqli_num_rows($wqq);
                if ($num_sql == 0) {
                 
                    
                  
                    $cccc = ( "insert model_ohda set name='',dateadd='" . $row['dateadd'] . "',counter='1',catid='" . $row['catid'] . "',text30='$ssssss',text1='" . $row['text1'] . "',text2='$ddd " . $row['text2'] . "',text3='0',catid2='" . $row['catid2'] . "',text4='',text5='',text6='',text7='',text8='',text9='',text10='',text11='',text12='',text13='',text14='',text15='',text16='',text17='',text18='',text19='',text20='' ,text21='' ,text22='' ,text23='' ,text24='' ,text25='' ,text26='' ,text27='' ,text28='',text29=''  ");
                    mysqli_query($mysqli22, $cccc);
                }
            }
            
            
                 $this->db->from('model_ohda');
            $this->db->order_by('id', 'desc');

            $this->db->where(' dateadd= ' . $this->data_day . " and catid=5 and `text2` not LIKE '%knet%'  and id!=".$rowlast['id']);
//$this->db->limit($max, ($max*$page)-$max);
            $data['all_groups'] = $this->db->get()->result_array();
            $i = 0;
            $all_cash = 0;
            foreach ($data['all_groups'] as $row) {

                
                $wqq = mysqli_query($mysqli22, "select * from  model_ohda where dateadd='" . $row['dateadd'] . "' and text30='$ssss' and catid='" . $row['catid'] . "' and text1='" . $row['text1'] . "' and text2='$ddd " . $row['text2'] . "' order by id desc")or die("ddd");
                $num_sql = mysqli_num_rows($wqq);
                if ($num_sql == 0) {
                    
                    
                  
                    $cccc = ( "insert model_cach2 set name='',dateadd='" . $row['dateadd'] . "',counter='1',catid='1',text30='$ssss',text1='" . $row['text1'] . "',text2='$ddd " . $row['text2'] . "',text3='0',catid2='" . $row['catid2'] . "',text4='',text5='',text6='',text7='',text8='',text9='',text10='',text11='',text12='',text13='',text14='',text15='',text16='',text17='',text18='',text19='',text20='' ,text21='' ,text22='' ,text23='' ,text24='' ,text25='' ,text26='' ,text27='' ,text28='',text29=''  ");
                    mysqli_query($mysqli22, $cccc);
                }
            }
            
            
            
            
            
            
            
        }
       // exit;
    }

    public function del($id) {

  $query = $this->db->get_where('model_ohda', array('id' => $id));
        $data['show'] = $query->row_array();
        
             $this->booking->add_rep_user("  حذف فاتورة  مبلغ " . $data['show']['text1']."نوعا  : ". $this->nao[$data['show']['catid']]);
        
        $this->db->where('id', $id);
        $result = $this->booking->delete('model_ohda');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  الفاتورة بفضل الله!');
            redirect(base_url('booking/bills2/'));
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('model_ohda', array('id' => $id));
        $data['edit'] = $query->row_array();
        $data['edit']['checked'] = array('', '', '', '', '', '', '', '', '');
        $data['edit']['checked'][$data['edit']['catid']] = 'checked';

        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('catid', '', 'trim|required');
            $this->form_validation->set_rules('text1', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required');
            //	$this->form_validation->set_rules('comm', '', 'trim|required');


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {

                $add = TRUE;

                $pass = $data['edit']['pass'];
                if ($this->input->post('pass'))
                    $pass = md5(md5($this->input->post('pass')));


                $edit_data = array(
                    'catid' => $this->input->post('catid'),
                    'text1' => $this->input->post('text1'),
                    'text2' => $this->input->post('text2'),
                    'text11' => $this->input->post('text11'),
                    'text12' => $this->input->post('text12'),
                    'text13' => $this->input->post('text13'),
                    'dateadd' => $this->input->post('dateadd'),
                );
                $edit_data = $this->security->xss_clean($edit_data);



                 $this->db->where('id', $id);$result =$this->booking->update('model_ohda', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الفاتورة بفضل الله!');
                    redirect(base_url('booking/bills2/'));
                }
            }
        }


        if (!$add) {









            $data['title'] = 'تعديل عصو';

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/edit';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function show($id) {

        $query = $this->db->get_where('model_ohda', array('id' => $id));
        $data['show'] = $query->row_array();
        $data['show']['catid'] = $this->nao[$data['show']['catid']];

        $add = FALSE;












        $data['title'] = 'عرض فاتورة ';

        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function endbill($day) {


        if (!$this->session->userdata('group'))
            $day = $this->booking->data_day(14);
        else {
            $this->data_day = $day;
        }

        $this->db->from('model_ohda');
        $this->db->order_by('id', 'desc');
        $this->db->where(array('dateadd' => $day, 'catid' => '1'));
        $data['all1'] = $this->db->get()->result_array();
        $data['sum_1'] = $this->sum_bill('1 and dateadd= ' . $day);




        $this->db->from('model_ohda');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=2  and text3!=1 and dateadd= ' . $day);
        $data['all2'] = $this->db->get()->result_array();
        $data['sum_2'] = $this->sum_bill('2  and text3!=1 and dateadd= ' . $day);


        $this->db->from('model_ohda');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=3 and dateadd= ' . $day);
        $data['all3'] = $this->db->get()->result_array();
        $data['sum_3'] = $this->sum_bill('3 and dateadd= ' . $day);




        $this->db->from('model_ohda');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=5  and dateadd= ' . $day . " and `text2` not LIKE '%knet%'");
        $data['all5'] = $this->db->get()->result_array();
        $data['sum_5'] = $this->sum_bill('5 and dateadd= ' . $day);
        $data['sum_5_knet'] = $this->sum_bill('5  and dateadd= ' . $day . " and `text2` LIKE '%knet%' ");
        $data['all5_last'] = '0';



        $this->db->from('model_ohda');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=5  and dateadd= ' . $day . " and `text2` not LIKE '%knet%'");
        $this->db->limit(1);
        $row = $this->db->get()->row_array();


        $data['all5_last'] = '0';
        if ($data['all5'] > 0) {
            $data['all5_last'] = $row['text1'];
        } //it will provide latest or last record id.


        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->where('datetext4=' . $day . ' and knet>1');
        $data['knet'] = $this->db->get()->result_array();







        $add = FALSE;





        $data['date'] = $day;




        $this->load->view('../controllers/booking/views/' . $this->thispage . '/endbill', $data);
       /// $this->load->view('../controllers/booking/views/' . $this->thispage . '/endbill', $data);

        $whr = " datetext4 = '" . $this->data_day . "' ";

        $this->db->from('booking');
        $this->db->where($whr);
        $data['all_count'] = ($this->db->count_all_results());

        $this->db->select_sum('bill');
        $this->db->where("  datetext4 = '" . $this->data_day . "' ");
        $query = $this->db->get('booking')->row_array();
        $data['all_bill'] = $query['bill'];


        $this->db->select_sum('bill');
        $this->db->where("  datetext4 = '" . $this->data_day . "' and knet>1");
        $query = $this->db->get('booking')->row_array();
        $data['all_knet'] = $query['bill'];

        $data['all_cach'] = $data['all_bill'] - $data['all_knet'];



        $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->where($whr);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
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

       /// $this->load->view('../controllers/booking/views/' . $this->thispage . '/all_booking', $data);
    }

}

?>