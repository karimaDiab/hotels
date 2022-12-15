<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clints extends MY_Controller {

    var $cats;
    var $thispage;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');




        $this->thispage = "clints";
    }

    public function index($cats = 1) {
        $this->cats = $cats;
        $this->all($cats, 1);
    }

    public function allbooked($page = 1, $all = '') {
        $this->db->from('booking_clints');


        $whr = "datetext2 > $page  ";

        if ($all)
            $whr = "$whr and datetext2 < $all  ";
        $this->db->where($whr);
        $this->db->order_by('datetext2', 'desc');

        $this->db->limit(5000, 0);

        $data['all_groups'] = $this->db->get()->result_array();
        $i = 1;

        echo count($data['all_groups']);
        echo "عدد الكل <br>";
        foreach ($data['all_groups'] as $row) {


            echo $row['mobile'];
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
            echo "<br>";
            $i++;
        }
    }

    public function all($page = 1, $all = '') {










        $searchfor = $this->security->xss_clean($this->input->get('search'));
        $whr = "";






        if ($searchfor) {
        ///    $this->booking->add_rep_user("  البحث عن    " . $searchfor);
            $split_stemmed = explode(" ", $searchfor);
            $whr = " (";
            while (list($key, $val) = @each($split_stemmed)) {
                if ($val <> " " and strlen($val) > 0) {

                    $whr .= " ( BINARY name LIKE '%" . $val . "%'   ) and";
                }
            }
            $whr = substr($whr, 0, (strLen($whr) - 4));
            $whr .= " )or     cid LIKE '" . $searchfor . "'  OR  mobile = '" . $searchfor . "'";

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

                    $data['all_cid'][] = $Ads['cid'];
                    $data['all_groups'][$Ads['cid']] = $Ads;
                    $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");
                    $data['all_groups'][$Ads['cid']]['book1'] = mysqli_num_rows($www);
                    $data['all_groups'][$Ads['cid']]['book2'] = 0;
                    $data['all_groups'][$Ads['cid']]['book3'] = 0;
                    $data['all_groups'][$Ads['cid']]['book4'] = 0;

      $data['all_groups'][$Ads['cid']]['book6'] = 0;
                    $data['all_groups'][$Ads['cid']]['mobile1'] = $Ads['mobile'];
                    $data['all_groups'][$Ads['cid']]['mobile2'] = '';
                    $data['all_groups'][$Ads['cid']]['mobile3'] = '';
                    $data['all_groups'][$Ads['cid']]['mobile4'] = '';


                    $data['all_groups'][$Ads['cid']]['id1'] = $Ads['id'];
                    $data['all_groups'][$Ads['cid']]['id2'] = '';
                    $data['all_groups'][$Ads['cid']]['id3'] = ''; 
                    $data['all_groups'][$Ads['cid']]['id5'] = '';
                     $data['all_groups'][$Ads['cid']]['id6'] = '';
                                                   $data['all_groups'][$Ads['cid']]['book5'] = 0;
                                                        $data['all_groups'][$Ads['cid']]['mobile5'] = '';
                                                        $data['all_groups'][$Ads['cid']]['mobile6'] = '';
                    $data['all_groups'][$Ads['cid']]['id4'] = '';
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
                        $data['all_groups'][$Ads['cid']]['mobile1'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                        $data['all_groups'][$Ads['cid']]['id4'] = '';  $data['all_groups'][$Ads['cid']]['id5'] = '';
                          $data['all_groups'][$Ads['cid']]['id6'] = '';
                   
                                                   $data['all_groups'][$Ads['cid']]['book5'] = 0;
                                                        $data['all_groups'][$Ads['cid']]['mobile5'] = '';
                                                        $data['all_groups'][$Ads['cid']]['mobile6'] = '';
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
                        $data['all_groups'][$Ads['cid']]['mobile1'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';

                        $data['all_groups'][$Ads['cid']]['id3'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id4'] = '';  $data['all_groups'][$Ads['cid']]['id5'] = '';
                            $data['all_groups'][$Ads['cid']]['id6'] = '';
                   
                                                   $data['all_groups'][$Ads['cid']]['book5'] = 0;
                                                        $data['all_groups'][$Ads['cid']]['mobile5'] = '';
                                                                           $data['all_groups'][$Ads['cid']]['mobile6'] = '';
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
                        $data['all_groups'][$Ads['cid']]['mobile1'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';

                        $data['all_groups'][$Ads['cid']]['id4'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                                      $data['all_groups'][$Ads['cid']]['id5'] = '';
                                          $data['all_groups'][$Ads['cid']]['id6'] = '';
                   
                                                   $data['all_groups'][$Ads['cid']]['book5'] = 0;
                                                        $data['all_groups'][$Ads['cid']]['mobile5'] = '';
                                                        
                                                                           $data['all_groups'][$Ads['cid']]['mobile6'] = '';

                                      
                                      
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
                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';
                             $data['all_groups'][$Ads['cid']]['mobile1'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';
         $data['all_groups'][$Ads['cid']]['id5'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id4'] ='';
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                            $data['all_groups'][$Ads['cid']]['id6'] = '';
                   
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }
            /// $data['all_groups'] = array_merge($array1, $array2);  









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
                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';
                             $data['all_groups'][$Ads['cid']]['mobile1'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';
                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';
                          $data['all_groups'][$Ads['cid']]['mobile5'] = '';
                          $data['all_groups'][$Ads['cid']]['id6'] = $Ads['id'];
                        $data['all_groups'][$Ads['cid']]['id4'] ='';
                        $data['all_groups'][$Ads['cid']]['id1'] = '';
                        $data['all_groups'][$Ads['cid']]['id2'] = '';
                        $data['all_groups'][$Ads['cid']]['id3'] = '';
                            $data['all_groups'][$Ads['cid']]['id5'] = '';
                   
                    }

                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];
                }
            }
            /// $data['all_groups'] = array_merge($array1, $array2);  













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
        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/ltef/views/layout', $data);
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
                $result = $this->db->insert('booking_clints', $data);
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

        if (!$data['show']['oky'])
            $data['show']['oky'] = 'عادي';
        if ($data['show']['oky'] == 'star')
            $data['show']['oky'] = 'مميز';
        $data['show']['black'] = '';
        if ($data['show']['oky'] == 'ok') {
            $data['show']['black'] = 'ok';
            $data['show']['oky'] = 'بلاك لست';
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
        $result = $this->db->delete('booking_clints');
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
                $result = $this->db->where('id', $id)->update('booking_clints', $edit_data);

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

        $this->db->where('id', $id)->update('booking_clints', array('oky' => 'ok', 'comment' => $this->input->post('comment')));

        $this->session->set_flashdata('msg', 'تم عمل بلاك لست بفضل الله');
        redirect(base_url() . 'booking/dashboard');
    }

}

?>