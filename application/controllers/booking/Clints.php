<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clints extends MY_Controller {

    var $cats;
    var $thispage;
    var  $urlboom,$fra,$data_day;
    public function __construct() {
        parent::__construct();
        $this->load->model('booking');

       $this->data_day = $this->booking->data_day();
     $this->fra[1] = "حولي";
        $this->fra[2] = " السالمية";
        $this->fra[4] = " الرقعي";
            $this->fra[5] = "الشعب";
        $this->fra[6] = " ريحانة";
   
        $this->urlboo = '1';


        if (@stristr($_SERVER['REQUEST_URI'], 'booking2'))
            $this->urlboo = '2';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking4'))
            $this->urlboo = '4';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking5'))
            $this->urlboo = '5';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking6'))
            $this->urlboo = '6';

        $this->thispage = "clints";
    }

    public function index($cats = 1) {
        $this->cats = $cats;
        $this->all($cats, 1);
    }

      public function allbooked($page = 1, $all = '') {
               $this->db->from('booking_clints');

               
               $whr="datetext2 > $page  ";
               
                if($all)$whr="$whr and datetext2 < $all  ";
      $this->db->where($whr);
     $this->db->order_by('datetext2', 'desc');
     
     $this->db->limit(5000, 0);

        $data['all_groups'] = $this->db->get()->result_array();
        $i=1;
        
        echo count( $data['all_groups']);
            echo "عدد الكل <br>";
          foreach ($data['all_groups'] as $row) {
           
              
   echo $row['mobile']; 
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
         echo "<br>";
            $i++;
        }
          
          
      }
    
    public function all($page = 1, $all = '') {
        
        ///UPDATE `booking_clints` SET `datetext2` = '0'
        
        $this->db->from('booking_clints');

      $this->db->where("datetext2 = '0' ");

     $this->db->limit(250, 0);

        $data['all_groups'] = $this->db->get()->result_array();
        $i=1;
          foreach ($data['all_groups'] as $row) {
           
              
              $query = $this->db->get_where('booking', array('cid' => $row['cid']));
               $data['edit'] = $query->row_array();
        $tit=1;
               if(isset($data['edit']['cid']))
               {
                    $this->db->from('booking');
                $this->db->where("cid='".$row['cid']."'");
                 $tit=   $this->db->count_all_results();
               }
          
                
          
          
          $edit_data = array(
                        'datetext2' => $tit,
                    
                    );
         $this->db->where('id', $row['id']);$this->booking->update('booking_clints', $edit_data);
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
         echo "$i<br>";
            $i++;
        }
        
          $query = $this->db->get_where('booking_clints', array('datetext2' => "0"));
               $data['edit'] = $query->row_array();
        $tit=1;
               if(isset($data['edit']['cid']))
               {
                   echo"<meta http-equiv=refresh content=1;url=".base_url('booking/' . $this->thispage . '/index/').">";
               
                   exit;
                   
               }
    

         $searchfor = $this->security->xss_clean($this->input->get('search'));
         
         if($searchfor!='' )
         {
             $this->search(); 
         } else {
             
        
        $whr = "";
        if (!$this->session->userdata('group'))
            $whr = "cid='ddd'";

        
           $this->db->from('booking_clints');
        if ($whr)
            $this->db->where($whr);
        $max = 40;
    
        $data['all_count'] = ceil($this->db->count_all_results() / $max);

        $this->db->from('booking_clints');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);

        $this->db->limit($max, ($max * $page) - $max);

        $data['all_groups'] = $this->db->get()->result_array();
        
        
        
        if ($searchfor) {
    $this->booking->add_rep_user("  البحث عن    ".$searchfor);  
            $split_stemmed = explode(" ", $searchfor);
            $whr = " (";
                foreach($split_stemmed as $key => $val) {
          ///  while (list($key, $val) = @each($split_stemmed)) {
                if ($val <> " " and strlen($val) > 0) {

                    $whr .= " ( BINARY name LIKE '%" . $val . "%'   ) and";
                }
            }
            $whr = substr($whr, 0, (strLen($whr) - 4));
            $whr .= " )or     cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

            if (!$this->session->userdata('group'))
                $whr = " cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";
            
            $query = $this->db->query('SELECT * FROM booking_clints where '.$whr);
             $data['all_count'] = 0;
            $whr='';
             $data['all_groups'] =$query->result_array();
            $data['all_count'] = count($data['all_groups'] );
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
    }
 
    
  public function search($page = 1, $all = '') {
 $searchfor = trim($this->security->xss_clean($this->input->get('search')));
        $whr = "";






        if ($searchfor) {
       $this->booking->add_rep_user("  البحث عن    " . $searchfor);
            $split_stemmed = explode(" ", $searchfor);
            $whr = " (";
            while (list($key, $val) = @each($split_stemmed)) {
                if ($val <> " " and strlen($val) > 0) {

                    $whr .= " ( BINARY name LIKE '%" . $val . "%'   ) and";
                }
            }
            $whr = substr($whr, 0, (strLen($whr) - 4));
            
            $whr .= " )or     cid LIKE '" . $searchfor . "'  OR  mobile2 = '" . $searchfor . "' OR  mobile = '" . $searchfor . "'";


            if (!$this->session->userdata('group'))
                $whr = " cid LIKE '" . $searchfor . "'  OR  mobile2 = '" . $searchfor . "' OR  mobile = '" . $searchfor . "'";
            $data['all_groups'] = array();
            $data['all_cid'] = array();
            $dbhost = "localhost"; // ??????
                   $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????
                        $dbpass = "Qaz*123123";     // ??????? ????? ????????
                        $dbname = "kuwaityc_booking"; // ??? ????? ????????
            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");

                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");

                while ($Ads = @mysqli_fetch_array($array1)) {
if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile2'];
         else $Ads['mobile']=$Ads['mobile2'];
                    $data['all_cid'][] = $Ads['cid'];
                    $data['all_groups'][$Ads['cid']] = $Ads;
                    $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                    $data['all_groups'][$Ads['cid']]['book1'] = mysqli_num_rows($www);
                    $data['all_groups'][$Ads['cid']]['book2'] = 0;
                    $data['all_groups'][$Ads['cid']]['book3'] = 0;
                    $data['all_groups'][$Ads['cid']]['book4'] = 0;

                    $data['all_groups'][$Ads['cid']]['book6'] = 0;
                    $data['all_groups'][$Ads['cid']]['mobile1'] = $Ads['mobile'];
                    $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                    $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];
                    $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];


                    $data['all_groups'][$Ads['cid']]['id1'] = $Ads['id'];
                    $data['all_groups'][$Ads['cid']]['id2'] = '';
                    $data['all_groups'][$Ads['cid']]['id3'] = ''; 
                    $data['all_groups'][$Ads['cid']]['id5'] = '';
                     $data['all_groups'][$Ads['cid']]['id6'] = '';
                     $data['all_groups'][$Ads['cid']]['book5'] = 0;
                     $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                     $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];
                    $data['all_groups'][$Ads['cid']]['id4'] = '';
                  $data['all_groups'][$Ads['cid']]['book7'] = 0;
                                 $data['all_groups'][$Ads['cid']]['id7'] = ''; 
                         $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];            
                    
                }
            }



            $dbhost = "localhost"; // ??????
                $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????
                        $dbpass = "Qaz*123123";     // ??????? ????? ????????
                        $dbname = "kuwaityc_booking2"; // ??? ????? ????????


            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");

                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");

                while ($Ads = @mysqli_fetch_array($array1)) {
if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile2']; 
                 else $Ads['mobile']=$Ads['mobile2'];
                    if (in_array($Ads['cid'], $data['all_cid'])) {

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book2'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['id2'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                    } else {
                        $data['all_cid'][] = $Ads['cid'];
                        $data['all_groups'][$Ads['cid']] = $Ads;
                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book2'] = mysqli_num_rows($www);
                        $data['all_groups'][$Ads['cid']]['book1'] = 0;
                        $data['all_groups'][$Ads['cid']]['book3'] = 0;
                        $data['all_groups'][$Ads['cid']]['book4'] = 0;
                       $data['all_groups'][$Ads['cid']]['book6'] = 0;



                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile1'] =$Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile3'] =$Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['id2'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                        $data['all_groups'][$Ads['cid']]['id4'] = '';  
                        $data['all_groups'][$Ads['cid']]['id5'] = '';
                        $data['all_groups'][$Ads['cid']]['id6'] = '';
                        $data['all_groups'][$Ads['cid']]['book7'] = 0;
                        $data['all_groups'][$Ads['cid']]['id7'] = ''; 
                        $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];                     
                        $data['all_groups'][$Ads['cid']]['book5'] = 0;
                        $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile6'] =$Ads['mobile'];
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }


            $dbhost = "localhost"; // ??????
           $dbuser = "kuwaityc_book";  // 
                        $dbpass = "Qaz*123123";     // 
                        $dbname = "kuwaityc_booking4"; // 


            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");

                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");

                while ($Ads = @mysqli_fetch_array($array1)) {
if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile2'];
                    else $Ads['mobile']=$Ads['mobile2'];
                    if (in_array($Ads['cid'], $data['all_cid'])) {

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book3'] = mysqli_num_rows($www);


                        $data['all_groups'][$Ads['cid']]['id3'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];
                    } else {
                        $data['all_cid'][] = $Ads['cid'];
                        $data['all_groups'][$Ads['cid']] = $Ads;
                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book3'] = mysqli_num_rows($www);
                        $data['all_groups'][$Ads['cid']]['book1'] = 0;
                        $data['all_groups'][$Ads['cid']]['book2'] = 0;
                        $data['all_groups'][$Ads['cid']]['book4'] = 0;
                        $data['all_groups'][$Ads['cid']]['book6'] = 0;

                        $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile1'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];

                        $data['all_groups'][$Ads['cid']]['id3'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id4'] = ''; 
                        $data['all_groups'][$Ads['cid']]['id5'] = '';
                        $data['all_groups'][$Ads['cid']]['id6'] = '';
                        $data['all_groups'][$Ads['cid']]['book7'] = 0;
                        $data['all_groups'][$Ads['cid']]['id7'] = ''; 
                         $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];                              
                        $data['all_groups'][$Ads['cid']]['book5'] = 0;
                        $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }

            $dbhost = "localhost"; // ??????
 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������
$dbpass="Qaz*123123";     // ������� ����� ��������
$dbname="kuwaityc_booking5"; // ��� ����� ��������


            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");

                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");

                while ($Ads = @mysqli_fetch_array($array1)) {
if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile2'];
                    else $Ads['mobile']=$Ads['mobile2'];
                    if (in_array($Ads['cid'], $data['all_cid'])) {

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book4'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['id4'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];
                    } else {
                        $data['all_cid'][] = $Ads['cid'];
                        $data['all_groups'][$Ads['cid']] = $Ads;
                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book4'] = mysqli_num_rows($www);
                        $data['all_groups'][$Ads['cid']]['book1'] = 0;
                        $data['all_groups'][$Ads['cid']]['book2'] = 0;
                        $data['all_groups'][$Ads['cid']]['book3'] = 0;
                        $data['all_groups'][$Ads['cid']]['book6'] = 0;

                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile1'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];

                        $data['all_groups'][$Ads['cid']]['id4'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                        $data['all_groups'][$Ads['cid']]['id5'] = '';
                        $data['all_groups'][$Ads['cid']]['id6'] = '';
                        $data['all_groups'][$Ads['cid']]['book5'] = 0;
                        $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['book7'] = 0;
                        $data['all_groups'][$Ads['cid']]['id7'] = ''; 
                        $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];   
                                      
                                      
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }


            $dbhost = "localhost"; // ??????
 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������
$dbpass="Qaz*123123";     // ������� ����� ��������
$dbname="kuwaityc_booking6"; // ��� ����� ��������


            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");

                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");

                while ($Ads = @mysqli_fetch_array($array1)) {
if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile2'];
                      else $Ads['mobile']=$Ads['mobile2'];
                      if (in_array($Ads['cid'], $data['all_cid'])) {

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book5'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['id5'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                    } else {
                        $data['all_cid'][] = $Ads['cid'];
                        $data['all_groups'][$Ads['cid']] = $Ads;
                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book5'] = mysqli_num_rows($www);
                           $data['all_groups'][$Ads['cid']]['book4'] = 0;
                        $data['all_groups'][$Ads['cid']]['book1'] = 0;
                        $data['all_groups'][$Ads['cid']]['book2'] = 0;
                        $data['all_groups'][$Ads['cid']]['book3'] = 0;
      $data['all_groups'][$Ads['cid']]['book6'] = 0;

                        $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];
                             $data['all_groups'][$Ads['cid']]['mobile1'] =$Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile3'] =$Ads['mobile'];
         $data['all_groups'][$Ads['cid']]['id5'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id4'] ='';
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                            $data['all_groups'][$Ads['cid']]['id6'] = '';
                     $data['all_groups'][$Ads['cid']]['book7'] = 0;
                                 $data['all_groups'][$Ads['cid']]['id7'] = ''; 
                         $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];       
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }
            /// $data['all_groups'] = array_merge($array1, $array2);  



//print_r( $data['all_groups']);exit;





            $dbhost = "localhost"; // ??????
 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������
$dbpass="Qaz*123123";     // ������� ����� ��������
$dbname="kuwaityc_booking8"; // ��� ����� ��������


            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");

                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");

                while ($Ads = @mysqli_fetch_array($array1)) {
if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile2'];
   else $Ads['mobile']=$Ads['mobile2'];
                    if (in_array($Ads['cid'], $data['all_cid'])) {

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book6'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['id6'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];
                    } else {
                        $data['all_cid'][] = $Ads['cid'];
                        $data['all_groups'][$Ads['cid']] = $Ads;
                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book6'] = mysqli_num_rows($www);
                           $data['all_groups'][$Ads['cid']]['book4'] = 0;
                        $data['all_groups'][$Ads['cid']]['book1'] = 0;
                        $data['all_groups'][$Ads['cid']]['book2'] = 0;
                        $data['all_groups'][$Ads['cid']]['book3'] = 0;
                          
                       $data['all_groups'][$Ads['cid']]['book5'] = 0;

                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];
                             $data['all_groups'][$Ads['cid']]['mobile1'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];
                          $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                          $data['all_groups'][$Ads['cid']]['id6'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id4'] ='';
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                            $data['all_groups'][$Ads['cid']]['id5'] = '';
                        $data['all_groups'][$Ads['cid']]['book7'] = 0;
                                 $data['all_groups'][$Ads['cid']]['id7'] = ''; 
                         $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];     
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }
            /// $data['all_groups'] = array_merge($array1, $array2);  






            $dbhost = "localhost"; // ??????
 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������
$dbpass="Qaz*123123";     // ������� ����� ��������
$dbname="kuwaityc_booking7"; // ��� ����� ��������


            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");

                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");

                while ($Ads = @mysqli_fetch_array($array1)) {
if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile'];
                    else $Ads['mobile']=$Ads['mobile'];
                    if (in_array($Ads['cid'], $data['all_cid'])) {


                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book7'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['id7'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];
                    } else {
                        $data['all_cid'][] = $Ads['cid'];
                        $data['all_groups'][$Ads['cid']] = $Ads;
                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book6'] = mysqli_num_rows($www);
                           $data['all_groups'][$Ads['cid']]['book4'] = 0;
                        $data['all_groups'][$Ads['cid']]['book1'] = 0;
                        $data['all_groups'][$Ads['cid']]['book2'] = 0;
                        $data['all_groups'][$Ads['cid']]['book3'] = 0;
                          
                       $data['all_groups'][$Ads['cid']]['book5'] = 0;

                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];
                             $data['all_groups'][$Ads['cid']]['mobile1'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];
                          $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                          $data['all_groups'][$Ads['cid']]['id6'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id4'] ='';
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                            $data['all_groups'][$Ads['cid']]['id5'] = '';
                        $data['all_groups'][$Ads['cid']]['book6'] = 0;
                                 $data['all_groups'][$Ads['cid']]['id6'] = ''; 
                         $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];     
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }



            $dbhost = "localhost"; // ??????
 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������
$dbpass="Qaz*123123";     // ������� ����� ��������
$dbname="kuwaityc_booking9"; // ��� ����� ��������


            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                mysqli_query($mysqli1, "SET NAMES utf8");

                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");
              
                while ($Ads = @mysqli_fetch_array($array1)) {
if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile'];
   else $Ads['mobile']=$Ads['mobile'];
/*dddddddddddddddd*/
//$data['all_cid'][] = $Ads['cid'];
//print_r(  $data['all_cid']) ;exit;
                    if (in_array($Ads['cid'], $data['all_cid'])) {


                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book7'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['id7'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];
                    } else {
                        $data['all_cid'][] = $Ads['cid'];
                        $data['all_groups'][$Ads['cid']] = $Ads;
                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                        $data['all_groups'][$Ads['cid']]['book6'] = mysqli_num_rows($www);
                           $data['all_groups'][$Ads['cid']]['book4'] = 0;
                        $data['all_groups'][$Ads['cid']]['book1'] = 0;
                        $data['all_groups'][$Ads['cid']]['book2'] = 0;
                        $data['all_groups'][$Ads['cid']]['book3'] = 0;
                           $data['all_groups'][$Ads['cid']]['book7'] = 0;

                       $data['all_groups'][$Ads['cid']]['book5'] = 0;

                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];
                             $data['all_groups'][$Ads['cid']]['mobile1'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];
                        $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];
                          $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];
                          $data['all_groups'][$Ads['cid']]['id6'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id4'] ='';
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                            $data['all_groups'][$Ads['cid']]['id5'] = '';
                        $data['all_groups'][$Ads['cid']]['book6'] = 0;
                                 $data['all_groups'][$Ads['cid']]['id6'] = ''; 
                         $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];    
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }

 







            $data['all_count'] = count($data['all_groups']);

            ///  echo print_r($data['all_groups'] );
        }
        /// $whr=" cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";
///
        ///  print_r($data['all_groups']);


        foreach ($data['all_groups'] as $row) {

            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'العملاء';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/search';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }
     public function checkok($data_day = '', $all = '') {
        
        ///UPDATE `booking_clints` SET `datetext2` = '0'
        
         if(!$data_day)$data_day=$this->data_day;
        if($data_day)$this->data_day=$data_day;
         $page=1;
      
            if(!$this->session->userdata('group') and ! $this->session->userdata('editor')){
            echo "لايمكن الاستخدام ";
               $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
            ///echo $_SERVER['HTTP_REFERER'];
            
             redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
        
    

         $searchfor = $this->security->xss_clean($this->input->get('search'));
        $whr = "";
   
             $whr = "checkok='0' and datetext4='$data_day'";

        
           $this->db->from('booking_clints');
        if ($whr)
            $this->db->where($whr);
        $max = 40;
    
        $data['all_count'] = ceil($this->db->count_all_results() / $max);

        $this->db->from('booking_clints');
        $this->db->order_by('datetext4', 'desc');
        $this->db->order_by('datetext', 'desc');
        if ($whr)
            $this->db->where($whr);

        $this->db->limit($max, ($max * $page) - $max);

        $data['all_groups'] = $this->db->get()->result_array();
        
        
        
        /// $whr=" cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

     





        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'العملاء';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/checkok';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }
 
        public function checkokupdate($id) {

        $query = $this->db->get_where('booking_clints', array('id' => $id));
        $data['show'] = $query->row_array();


        $edit_data = array(
            'checkok' => '1',
        );
        $edit_data = $this->security->xss_clean($edit_data);
        $result = $this->db->where('id', $id);
        $this->booking->update('booking_clints', $edit_data);

echo "تم التاكيد";
      

     
    }
    public function black($page = 1, $all = '') {
        
      
    

         $searchfor = $this->security->xss_clean($this->input->get('search'));
        $whr = "oky='ok' or oky='all' ";
        

        
           $this->db->from('booking_clints');
        if ($whr)
            $this->db->where($whr);
        $max = 50;
    
        $data['all_count'] = ceil($this->db->count_all_results() / $max);

        $this->db->from('booking_clints');
        $this->db->order_by('datetext', 'desc');
        if ($whr)
            $this->db->where($whr);

        $this->db->limit($max, ($max * $page) - $max);

        $data['all_groups'] = $this->db->get()->result_array();
        
        
        
        if ($searchfor) {
    $this->booking->add_rep_user("  البحث عن    ".$searchfor);  
            $split_stemmed = explode(" ", $searchfor);
            $whr = " (";
                      foreach($split_stemmed as $key => $val) {
                if ($val <> " " and strlen($val) > 0) {

                    $whr .= " ( BINARY name LIKE '%" . $val . "%'   ) and";
                }
            }
            $whr = substr($whr, 0, (strLen($whr) - 4));
            $whr .= " )or     cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

            if (!$this->session->userdata('group'))
                $whr = " cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";
            
            $query = $this->db->query('SELECT * FROM booking_clints where '.$whr);
             $data['all_count'] = 0;
            $whr='';
             $data['all_groups'] =$query->result_array();
            $data['all_count'] = count($data['all_groups'] );
           // echo print_r($this->db->last_query());
        }
        /// $whr=" cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

     





        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'العملاء';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/black';
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
                $file1 = '';
                $fieldname = 'file1';
                if ($_FILES[$fieldname]['name'] != "") {
                    $upload_data = $this->booking->upload_many_photos($fieldname, $this->input->post('cid') . '1');
                    $file1 = "upload/" . $upload_data["file_name"];
                }
                $file2 = '';
                $fieldname = 'file2';
                if ($_FILES[$fieldname]['name'] != "") {
                    $upload_data = $this->booking->upload_many_photos($fieldname, $this->input->post('cid') . '1');
                    $file2 = "upload/" . $upload_data["file_name"];
                }

                $add = TRUE;
                $data = array(
                    'cid' => $this->input->post('cid'),
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'country' => $this->input->post('country'),
                    'oky' => $this->input->post('oky'), 
                             'comment' => $this->input->post('comment'),
                    'file1' => $file1,
                    'file2' => $file2,
                );
                $data = $this->security->xss_clean($data);
                $result = $this->booking->insert('booking_clints', $data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'تم اضافة القسم بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/index/'));
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 


            $data['title'] = 'اضافة عميل';
            $data['cats'] = $this->cats;
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function show($id) {

        $query = $this->db->get_where('booking_clints', array('id' => $id));
        $data['show'] = $query->row_array();

          if(!$data['show']['oky'])$data['show']['oky']='عادي';
        if($data['show']['oky']=='star')$data['show']['oky']='مميز';
                           $data['show']['black']='';
           if($data['show']['oky']=='ok'){
                   $data['show']['black']='ok';
               $data['show']['oky']='بلاك لست';
           }
              if($data['show']['oky']=='all'){
                   $data['show']['black']='all';
               $data['show']['oky']=' بلاك لست لجميع الفروع';
           }
           
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
        
        
              $this->db->from('booking_subscriptions');
        $this->db->order_by('id', 'desc');
        $this->db->where(" cid ='" . $data['show']['cid'] . "'   ");
        $data['all_sub'] = $this->db->get()->result_array();
        
                 $this->db->from('booking');
        $this->db->order_by('id', 'desc');
        $this->db->where(" dayfree>0  and cid ='" . $data['show']['cid'] . "'");
        $data['all_sub_booking'] = $this->db->get()->result_array();
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
        if(!$data['edit']['oky'])$data['edit']['oky']='1';
        if($data['edit']['oky']=='star')$data['edit']['oky']='2';
           if($data['edit']['oky']=='ok')$data['edit']['oky']='3';
              if($data['edit']['oky']=='all')$data['edit']['oky']='4';
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
               $this->db->where('id', $id);  $result =$this->booking->update('booking_clints', $edit_data);

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

    public function clint_blacklist($id) {
        $query = $this->db->get_where('booking_clints', array('id' => $id));
        $data['edit'] = $query->row_array();
        
        
        $this->db->where('id', $id);$this->booking->update('booking_clints', array('oky' => $this->input->post('submit'), 'comment' => $this->input->post('comment')));

  
    
    
       $this->booking->whats_send("55544445", "\n بلاك لست:" .$data['edit']['name'] . " \n  السبب :". $this->input->post('comment')."\n اليوزر:".$this->session->userdata('name')."\n الفرع:".$this->fra[$this->urlboo]);
                
      $this->booking->whats_send("67769595", "\n بلاك لست:" .$data['edit']['name'] . " \n  السبب :". $this->input->post('comment')."\n اليوزر:".$this->session->userdata('name')."\n الفرع:".$this->fra[$this->urlboo]);
                  
          $this->session->set_flashdata('msg', 'تم عمل بلاك لست بفضل الله');
         redirect(base_url() . 'booking/dashboard');
    }

}

?>
