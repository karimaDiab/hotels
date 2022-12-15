<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Booked extends MY_Controller {

    var $user, $noa, $urlboo, $fra;
    var $data_day;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
        $this->user = $this->session->userdata('name');
        $this->data_day = $this->booking->data_day();
        $this->nao[1] = "الصالة";
        $this->nao[3] = "الغرفة الصغيرة";
        $this->nao[2] = "الغرفة الماستر";


        $this->fra[1] = "حولي";
        $this->fra[2] = " السالمية";
        $this->fra[4] = " الرقعي";
        $this->fra[5] = "الشعب";
        $this->fra[6] = " ريحانة";
   $this->fra[8] = " الفنطاس";

        $this->nao[4] = " المطبخ";
        $this->nao[5] = "الحمام";
        $this->nao[6] = "حمام الماستر";
        $this->nao[7] = " الغرفة الثالثة ";

        $this->urlboo = '1';


        if (@stristr($_SERVER['REQUEST_URI'], 'booking2'))
            $this->urlboo = '2';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking4'))
            $this->urlboo = '4';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking5'))
            $this->urlboo = '5';
        if (@stristr($_SERVER['REQUEST_URI'], 'booking6'))
            $this->urlboo = '6';
              if (@stristr($_SERVER['REQUEST_URI'], 'booking7'))
            $this->urlboo = '7';
            
              if (@stristr($_SERVER['REQUEST_URI'], 'booking8'))
            $this->urlboo = '8';
    }

    public function index($room) {






        if ($this->session->flashdata('msg')) {
            $data['msg'] = $this->session->flashdata('msg');
            $this->session->set_flashdata('msg', '');
        }
        $query = $this->db->get_where('booking_rooms', array('name' => $room));
        $data['edit'] = $query->row_array();
        $data['door'] = $data['edit']['door'];
        $data['room'] = $data['edit']['name'];


        $data['nao'] = $this->nao;





        for ($count = 1; $count < count($this->nao) + 1; $count++):
            $whr = " room='$room' and noa='$count'";

            $this->db->from('booking_rooms_images');
            $this->db->order_by('id', 'desc');
            $this->db->where($whr);

            $data['all_groups'][$count] = $this->db->get()->result_array();
            /// echo print_r($this->db->last_query());
        endfor;

        $data['view'] = '../controllers/booking/views/booked/booked1';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function booked2($room) {


        $query = $this->db->get_where('booking_rooms', array('name' => $room));
        $data['edit'] = $query->row_array();
        $data['door'] = $data['edit']['door'];
        $data['room'] = $data['edit']['name'];
        if ($data['edit']['conter'] == 2) {


            $this->session->set_flashdata('msg', 'تم تسكين الشقة من قبل!');
            redirect(base_url() . 'booking/dashboard');
        }

        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cid', '', 'trim|required');
            $this->form_validation->set_rules('day', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            $cid = $this->input->post('cid');
            $data['noa'] = $this->input->post('noa');
            $data['day'] = $this->input->post('day');





            if ($this->form_validation->run() === FALSE)
                $add = FALSE;
            else {

                $data['timeenter'] = $this->booking->tissme_now();

                if (date('H', $data['timeenter']) < 7)
                    $data['timeend'] = strtotime(date('Ymd 12:00', $data['timeenter'] + (24 * 60 * 60 * ($data['day'] - 1))));
                else
                    $data['timeend'] = strtotime(date('Ymd 12:00', $data['timeenter'] + (24 * 60 * 60 * ($data['day']))));


                if (strlen($cid) == 12)
                    $data['noa'] = 'بطاقة مدنية';

                if (strlen($cid) != 12 and $data['noa'] == 'بطاقة مدنية') {
                    $this->session->set_flashdata('msg', 'الرقم المدني غير صحيح');
                    redirect(base_url() . 'booking/booked/index/' . $room);
                }
                if ($data['noa'] == 'بطاقة مدنية') {
//$date = ("19".(substr($cid,1,2)).substr($cid,3,2).(substr($cid,5,2))); 


                    $MonnumN = date('m', time());
                    $DaYnumm = date('d', time());

                    $ysss = (date('Y', time()) - ("19" . (substr($cid, 1, 2))));


                    if (substr($cid, 0, 1) == '3') {

                        $ysss = (date('Y', time()) - ("20" . (substr($cid, 1, 2))));
                    }


                    if ($ysss < 22) {



                        if ($ysss == 21) {
                            $mmmmm = $MonnumN - (substr($cid, 3, 2));
                            if ($mmmmm >= 0) {
//// and (substr($_POST[cid],5,2)-$DaYnumm)<0
                                $dddd = ($DaYnumm - substr($cid, 5, 2));
                                if ($mmmmm == 0 and $dddd < 0) {

                                    $this->session->set_flashdata('msg', "الشخص قاصر");
                                    redirect(base_url() . 'booking/booked/index/' . $room);
                                }
                            } else {
                                $this->session->set_flashdata('msg', "الشخص قاصر");
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                        } else {
                            $this->session->set_flashdata('msg', "الشخص قاصر");
                            redirect(base_url() . 'booking/booked/index/' . $room);
                        }
                    }
                }

                $query = $this->db->get_where('booking_clints', array('cid' => $cid));
                $clints = $query->row_array();

                $data['cid'] = $cid;

                if (!isset($clints['name']))
                    $clints['name'] = '';
                if (!isset($clints['country']))
                    $clints['country'] = '';
                if (!isset($clints['file5']))
                    $clints['file5'] = '';
                if (!isset($clints['comment']))
                    $clints['comment'] = '';
                if (!isset($clints['file1']))
                    $clints['file1'] = '';
                if (!isset($clints['file2']))
                    $clints['file2'] = '';
                
                if (!isset($clints['file3']))
                    $clints['file3'] = '';
                if (!isset($clints['oky']))
                    $clints['oky'] = '';



                $data['name'] = ($clints['name']);
                $data['country'] = ($clints['country']);
                $data['file5'] = ($clints['file5']);
                $data['comment'] = ($clints['comment']);
                $data['file1'] = ( $clints['file1']);

                $data['file2'] = ($clints['file2']);
                        $data['file3'] = ($clints['file3']);
                if (!$data['name'] or file_exists($data['file1'])) {






                    $file1 = "../allcid/" . $cid . "1.jpg";
                    $file2 = "../allcid/" . $cid . "2.jpg";
                    if (file_exists($file1))
                        $data['file1'] = $file1;
                    if (file_exists($file2))
                        $data['file2'] = $file2;
                }


                if (($clints['oky']) == 'ok') {



                    $this->db->where("comment2>0     and comment5='wait'");


                    $this->db->from('booking');
                    $this->db->order_by('id', 'desc');
                    $this->db->limit(1);
                    $this->db->where(array('cid' => $cid));
                    $data['all_groups'] = $this->db->get()->result_array();
//                  echo print_r($this->db->last_query());
//                  echo  $data['all_groups'][0]['id'];
//exit;
                    $this->session->set_flashdata('msg', 'يوجد بلاك لست بسبب   :' . $clints['comment']);
                    if ($data['all_groups'][0]['id'])
                        redirect(base_url() . 'booking/show/id/' . $data['all_groups'][0]['id']);
                    else
                        redirect(base_url() . 'booking/booked/index/' . $room);
                }
                if (($clints['oky']) == 'all') {



                    $this->db->where("comment2>0     and comment5='wait'");


                    $this->db->from('booking');
                    $this->db->order_by('id', 'desc');
                    $this->db->limit(1);
                    $this->db->where(array('cid' => $cid));
                    $data['all_groups'] = $this->db->get()->result_array();
//                  echo print_r($this->db->last_query());
//                  echo  $data['all_groups'][0]['id'];
//exit;
                    $this->session->set_flashdata('msg', 'يوجد بلاك لست بسبب   :' . $clints['comment'] . "<br> . في جميع الفروع");

                    redirect(base_url() . 'booking/Dashboard/');
                } else {

                    $data['all_groups31'] = array();
                    $data['all_groups32'] = array();
                    $data['all_groups34'] = array();
                    $data['all_groups35'] = array();
                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking/booking/')) {

                        $dbhost = "localhost"; // ??????
                        $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????
                        $dbpass = "Qaz*123123";     // ??????? ????? ????????
                        $dbname = "kuwaityc_booking"; // ??? ????? ????????
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {

                                if (file_exists($row['file1']) or!$row['file1'])
                                    $data['file1'] = $row['file1'];

                                if (file_exists($row['file2']) or!$row['file2'])
                                    $data['file2'] = $row['file2'];

                                if ($row['oky'] == 'ok' or $row['oky'] == 'all') {
                                    $data['msg'] = 'يوجد بلاك لست بسبب    في حولي: ' . $row['comment'];
                                    ///   redirect(base_url() . 'booking/booked/index/' . $room);
                                    if ($row['oky'] == 'all') {
                                        $data['msg'] = $data['msg'] . '<br> في جميع الفروع لايكن تسكينه';
                                        $this->session->set_flashdata('msg', $data['msg']);

                                        redirect(base_url() . 'booking/Dashboard/');
                                    }
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في حولي');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");
                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups31'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups31'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups31'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups31'][$i]['day'] = $rowr['day'];
                                $data['all_groups31'][$i]['room'] = $rowr['room'];
                                $data['all_groups31'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups31'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups31'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }
                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking2/booking/')) {

                        $dbhost = "localhost"; // ??????
                        $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????
                        $dbpass = "Qaz*123123";     // ??????? ????? ????????
                        $dbname = "kuwaityc_booking2"; // ??? ????? ????????
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {


                                if (file_exists($row['file1']) or!$row['file1'])
                                    $data['file1'] = $row['file1'];

                                if (file_exists($row['file2']) or!$row['file2'])
                                    $data['file2'] = $row['file2'];


                                if ($row['oky'] == 'ok' or $row['oky'] == 'all') {

                                    $data['msg'] = 'يوجد بلاك لست بسبب    في السالمية: ' . $row['comment'];
                                    //   redirect(base_url() . 'booking/booked/index/' . $room);
                                    if ($row['oky'] == 'all') {
                                        $data['msg'] = $data['msg'] . '<br> في جميع الفروع لايكن تسكينه';
                                        $this->session->set_flashdata('msg', $data['msg']);

                                        redirect(base_url() . 'booking/Dashboard/');
                                    }
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في السالمية');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");

                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups32'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups32'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups32'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups32'][$i]['day'] = $rowr['day'];
                                $data['all_groups32'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups32'][$i]['room'] = $rowr['room'];
                                $data['all_groups32'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups32'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }
                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking4/booking/')) {

                        $dbhost = "localhost"; //
                        $dbuser = "kuwaityc_book";  // 
                        $dbpass = "Qaz*123123";     // 
                        $dbname = "kuwaityc_booking4"; // 
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {

                                if (file_exists($row['file1']) or!$row['file1'])
                                    $data['file1'] = $row['file1'];

                                if (file_exists($row['file2']) or!$row['file2'])
                                    $data['file2'] = $row['file2'];

                                if ($row['oky'] == 'ok' or $row['oky'] == 'all') {

                                    $data['msg'] = 'يوجد بلاك لست بسبب    في الرقعي: ' . $row['comment'];
                                    ///  redirect(base_url() . 'booking/booked/index/' . $room);
                                    if ($row['oky'] == 'all') {
                                        $data['msg'] = $data['msg'] . '<br> في جميع الفروع لايكن تسكينه';
                                        $this->session->set_flashdata('msg', $data['msg']);

                                        redirect(base_url() . 'booking/Dashboard/');
                                    }
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في الرقعي');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");
                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups34'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups34'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups34'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups34'][$i]['day'] = $rowr['day'];
                                $data['all_groups34'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups34'][$i]['room'] = $rowr['room'];
                                $data['all_groups34'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups34'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }


                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking5/booking/')) {

                        $dbhost = "localhost"; // ������
                        $dbuser = "kuwaityc_book";  // ��� ������ ����� ��������
                        $dbpass = "Qaz*123123";     // ������� ����� ��������
                        $dbname = "kuwaityc_booking5"; // ��� ����� ��������
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                if (file_exists($row['file1']) or!$row['file1'])
                                    $data['file1'] = $row['file1'];

                                if (file_exists($row['file2']) or!$row['file2'])
                                    $data['file2'] = $row['file2'];


                                if ($row['oky'] == 'ok' or $row['oky'] == 'all') {

                                    $data['msg'] = 'يوجد بلاك لست بسبب    في الشعب: ' . $row['comment'];

                                    if ($row['oky'] == 'all') {
                                        $data['msg'] = $data['msg'] . '<br> في جميع الفروع لايكن تسكينه';
                                        $this->session->set_flashdata('msg', $data['msg']);

                                        redirect(base_url() . 'booking/Dashboard/');
                                    }
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في الشعب');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");
                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups35'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups35'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups35'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups35'][$i]['day'] = $rowr['day'];
                                $data['all_groups35'][$i]['room'] = $rowr['room'];
                                $data['all_groups35'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups35'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups35'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }


                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking6/booking/')) {

                        $dbhost = "localhost"; // ������
                        $dbuser = "kuwaityc_book";  // ��� ������ ����� ��������
                        $dbpass = "Qaz*123123";     // ������� ����� ��������
                        $dbname = "kuwaityc_booking6"; // ��� ����� ��������
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {

                                if (file_exists($row['file1']) or!$row['file1'])
                                    $data['file1'] = $row['file1'];

                                if (file_exists($row['file2']) or!$row['file2'])
                                    $data['file2'] = $row['file2'];

                                if ($row['oky'] == 'ok' or $row['oky'] == 'all') {

                                    $data['msg'] = 'يوجد بلاك لست بسبب    في ريحانه: ' . $row['comment'];
                                    ///  redirect(base_url() . 'booking/booked/index/' . $room);
                                    if ($row['oky'] == 'all') {
                                        $data['msg'] = $data['msg'] . '<br> في جميع الفروع لايكن تسكينه';
                                        $this->session->set_flashdata('msg', $data['msg']);

                                        redirect(base_url() . 'booking/Dashboard/');
                                    }
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في ريحانه');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");
                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups35'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups35'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups35'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups35'][$i]['day'] = $rowr['day'];
                                $data['all_groups35'][$i]['room'] = $rowr['room'];
                                $data['all_groups35'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups35'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups35'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }
                }







                if (isset($rowall1)) {
                    if (count($rowall1) > 0) {
                        $data['all_groups31'] = $rowall1;
                    }
                }

                if (isset($rowall4)) {
                    if (count($rowall4) > 0) {
                        $data['all_groups34'] = $rowall4;
                    }
                }
                if (isset($rowall5)) {
                    if (count($rowall5) > 0) {
                        $data['all_groups35'] = $rowall5;
                    }
                }

                $data['dayfree'] = 0;

                $dbhost = "localhost"; //
                $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
                $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
                $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
//                $dbuser = "root";  // إسم مستخدم قاعدة البيانات
//                $dbpass = "root";     // باسويرد قاعدة البيانات
//                $dbname = "booking"; // إسم قاعدة البيانات
                if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) and!@stristr($_SERVER['REQUEST_URI'], '/booking5/booking/')) {
                    $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                    mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                    mysqli_query($mysqli1, "SET NAMES utf8");
                    $sql1SSS = mysqli_query($mysqli1, "select * from booking_subscriptions       where  (  cid = '" . $cid . "'    and counter=2)  ");
                    while ($row = mysqli_fetch_array($sql1SSS)) {

                        if ($row['dayfree'] > 0) {
                            $data['dayfree'] = $data['day'];

                            $data['msg'] = 'يوجد للعميل عدد ايام اشتراك باقة ' . $row['dayfree'] . "  يوم<br>    سوف يتم خصم عدد الايام المطلوبة ";
                            if ($data['day'] > $row['dayfree']) {

                                $data['day'] = $row['dayfree'];
                                if (date('H', $data['timeenter']) < 7)
                                    $data['timeend'] = strtotime(date('Ymd 12:00', $data['timeenter'] + (24 * 60 * 60 * ($data['day'] - 1))));
                                else
                                    $data['timeend'] = strtotime(date('Ymd 12:00', $data['timeenter'] + (24 * 60 * 60 * ($data['day']))));


                                $data['msg'] = $data['msg'] . "<br>لايمكن تسكين اكثر من الايام المجانية يمكنك التمديد بعدها";
                            }
                        }
                    }
                }







                $this->db->from('booking');
                $this->db->order_by('id', 'desc');
                $this->db->where(" cid ='" . $data['cid'] . "'   and outsite='ok' ");
                $data['outsiteall'] = $this->db->get()->result_array();
                if (count($data['outsiteall']) > 0)
                    $data['msg'] = 'يوجد للعميل حركات خرج ولم يعمل شك اوت ' . count($data['outsiteall']) . "<br> يرجا تبلغ العميل بغرامة التاخير وتغير المفتاح ";


                $this->db->from('booking');
                $this->db->order_by('id', 'desc');
                $this->db->where(" cid ='" . $data['cid'] . "'   and timeend2!='' ");
                $data['all_groups'] = $this->db->get()->result_array();
                $this->db->from('booking');
                $this->db->order_by('id', 'desc');
                $this->db->where(" cid ='" . $data['cid'] . "'  and comment1!=''  ");
                $data['all_groups2'] = $this->db->get()->result_array();
                $this->db->from('booking');
                $this->db->order_by('id', 'desc');
                $this->db->where(" cid ='" . $data['cid'] . "'  and comment7!=''  ");
                $data['all_groups3'] = $this->db->get()->result_array();



                $query = $this->db->get_where('booking_rooms', array('name' => $room));
                $data['edit'] = $query->row_array();

                $data['door'] = $data['edit']['door'];
                $data['room'] = $data['edit']['name'];

                $data['view'] = '../controllers/booking/views/booked/booked2';
                $this->load->view('../controllers/booking/views/layout', $data);
            }
        }
    }

    public function booked3() {


        $query = $this->db->get_where('booking_rooms', array('name' => $this->input->post('room')));
        $rooms = $query->row_array();

        if ($rooms['conter'] == 2) {


            $this->session->set_flashdata('msg', 'تم تسكين الشقة من قبل!');
            redirect(base_url() . 'booking/dashboard');
            exit;
        }

        $thismon = date('Ym', $this->booking->tissme_now());


        $agd = 1;
        $this->db->from('booking');
        $this->db->order_by('3gd', 'desc');
        $whr = "  timeenter>" . strtotime($thismon . "01 00:00");
        $this->db->where($whr);
        $this->db->limit('1');
        $query = $this->db->get();
        $sss = $query->row_array();
        if (trim($sss['3gd']))
            $agd = intval($sss['3gd']) + 1;
        $agd = sprintf("%'.04d\n", $agd);









        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cid', '', 'trim|required');
            $this->form_validation->set_rules('day', '', 'trim|required');
            $this->form_validation->set_rules('bill', '', 'trim|required');
            $this->form_validation->set_rules('mobile', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            $cid = $this->input->post('cid');
            $data['noa'] = $this->input->post('noa');
            $data['day'] = $this->input->post('day');
            if ($this->form_validation->run() === FALSE)
                $add = FALSE;
            else {



                $query = $this->db->get_where('booking_clints', array('cid' => $cid));
                $clints = $query->row_array();


                $name = $this->input->post('name');

                ///   $name=    str_replace(' ','-',trim($name));
                $name = str_replace(' بن ', ' ', trim($name));
                $name = str_replace('عبد ا', 'عبدا', trim($name));
//$namenum='all';
//                              $name=    str_replace('---','-',trim($name));
//                                  $name=    str_replace('--','-',trim($name));
//$MshrfAll2 = explode ("-",trim($name)); 
//if(count($MshrfAll2)==3)$MshrfAll2[2]='';
// $name=$MshrfAll2[0]." ".$MshrfAll2[1]." ".$MshrfAll2[2]." ".$MshrfAll2[count($MshrfAll2)-1];

                $file5 = $this->input->post('file5');
                $file5new = $this->input->post('file5new');
                if ($file5new)
                    $file5 = $file5new;


                $this->load->library('upload');

                $file1 = $this->input->post('file1');
                $file2 = $this->input->post('file2');
                $folder = '../allcid/' . date("Ym") . "/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $source = $file1;
                if (file_exists($source)) {
                    $file = basename($source);

                    if (copy($source, $folder . $file)) {
                        $file1 = $folder . $file;
                        unlink($source);
                    }
                }

                $source = $file2;
                if (file_exists($source)) {
                    $file = basename($source);

                    if (copy($source, $folder . $file)) {
                        $file2 = $folder . $file;
                        unlink($source);
                    }
                }

                $fieldname = 'file1';
                if ($_FILES[$fieldname]['name'] != "") {
                    if ($clints['file1'])
                        unlink($file1);
                    $upload_data = $this->booking->upload_many_photos($fieldname, $clints['cid'] . '1');
                    $file1 = "upload/" . $upload_data["file_name"];
                }
                //sleep(31);

                $fieldname2 = 'file2';
                if ($_FILES[$fieldname2]['name'] != "") {
                    if ($clints['file2'])
                        unlink($file2);
                    $upload_data = $this->booking->upload_many_photos($fieldname2, $clints['cid'] . '2');
                    $file2 = "upload/" . $upload_data["file_name"];
                }

                if (!$clints['cid']) {


                    $dataadd = array('cid' => $this->input->post('cid'),
                        'name' => $name,
                        'mobile' => $this->input->post('mobile'),
                        'country' => $this->input->post('country'),
                        'file5' => $file5,
                        'file1' => $file1,
                        'file2' => $file2,
                        'datetext2' => '1',
                        'datetext' => $this->data_day,
                        'datetext4' => $this->data_day,
                    );
                    $dataadd = $this->security->xss_clean($dataadd);
                    $result = $this->booking->insert('booking_clints', $dataadd);
                } else {

                    if ($this->input->post('dayfree') > 0) {





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
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_subscriptions       where  (  cid = '" . $cid . "'    and counter=2)  ");
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
                                    }
                                    if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {

                                        $ssss = 5;
                                    }
                                    
                                    
                                    
                                }
                                $data['dayfree'] = 0;
                                $dayfree1 = 0;
                                if ($row['dayfree'] > 0) {

                                    $dayfree = $row['dayfree'] - $this->input->post('dayfree');
                                    $dayfree1 = $row['dayfree' . $ssss] + $this->input->post('dayfree');
                                    $sql1SSS = mysqli_query($mysqli1, "UPDATE booking_subscriptions  SET dayfree = '$dayfree' ,dayfree$ssss = '$dayfree1'     where  (  cid = '" . $cid . "'    and counter=2)  ");
                                    $this->booking->Sms_send($this->input->post('mobile'), "تم استخدام عدد   " . $this->input->post('dayfree') . "\n يتبقى لك عدد ايام    :" . $dayfree);
                                }
                            }
                        }
                    }
                    $edit_data = array(
                        'name' => $name,
                        'file5' => $file5,
                        'file1' => $file1,
                        'file2' => $file2,
                        'datetext2' => $clints['datetext2'] + 1,
                        'datetext' => $this->input->post('day'),
                        'mobile' => $this->input->post('mobile'),
                        'country' => $this->input->post('country'),
                         'datetext4' => $this->data_day,
                    );
                    $edit_data = $this->security->xss_clean($edit_data);
                    $this->db->where('id', $clints['id']);
                    $this->booking->update('booking_clints', $edit_data);
                }
                $data['cid'] = $cid;


                $dataadd = array(
                    'name' => $name,
                    'datetext4' => $this->data_day,
                    'mobile' => $this->input->post('mobile'),
                    'cid' => $this->input->post('cid'),
                    'room' => $this->input->post('room'),
                    'day' => $this->input->post('day'),
                    'dayfree' => $this->input->post('dayfree'),
                    'billexport' => '',
                    'bill' => $this->input->post('bill') + $this->input->post('knet'),
                    'timeenter' => $this->input->post('timeenter'),
                    'timeend' => $this->input->post('timeend'),
                    'billprint' => $this->input->post('billprint'),
                    'knetcode' => $this->input->post('knetcode'),
                    'comment8' => $this->input->post('comment8'),
                    'counter' => '1',
                    '3gd' => $agd,
                    'knet' => $this->input->post('knet'),
                    'noa' => $this->input->post('noa'),
                    'bookingid' => $this->input->post('bookingid'),
                    'bookingnew' => $this->input->post('bookingnew'),
                    'user' => $this->user);



                $dataadd = $this->security->xss_clean($dataadd);
                $result = $this->booking->insert('booking', $dataadd);
                $insert_id = $this->db->insert_id();



              if (@stristr($_SERVER['REQUEST_URI'], 'booking8')) {
                $dataadd = array(
                      'booking'  => $insert_id,
                  'room'   => $this->input->post('room'),
                        'cid' => $this->input->post('cid'),
                    'timeenter' => $this->input->post('timeenter'),
                    'timeend' => $this->input->post('timeend'),
                    'counter' => '1',
                    'user' => $this->user);



                $dataadd = $this->security->xss_clean($dataadd);
                $result = $this->booking->insert('booking_card', $dataadd);

              }







                $data['room'] = $this->input->post('room');
                $this->db->where('name', $data['room']);
                $this->booking->update('booking_rooms', array('conter' => '2'));


       if (!@stristr($_SERVER['REQUEST_URI'], 'booking8')) {
                if (($this->input->post('bill') + $this->input->post('knet')) < 35) {
                    $bbbb = trim($this->input->post('comment8'));
                    if (!$bbbb)
                        $bbbb = "لايوجد سبب";
                    $this->booking->whats_send("55544445", $name . "\n مبلغ:" . ($this->input->post('bill') + $this->input->post('knet')) . " \n  السبب :" . $bbbb . "\n " . $this->user . "\n " . $this->fra[$this->urlboo]);

                    $this->booking->whats_send("67769595", $name . "\n مبلغ:" . ($this->input->post('bill') + $this->input->post('knet')) . " \n  السبب :" . $bbbb . "\n " . $this->user . "\n " . $this->fra[$this->urlboo]);
                }
       }
                redirect(base_url() . 'booking/show/print3gd/' . $insert_id);
            }
        }
    }

    public function all($page = 1, $counter = 0) {




        $whr = " show1='8' ";
        $this->db->from('booking_booked');
        $this->db->where($whr);

        $data['all_count8'] = $this->db->count_all_results();

        $whr = " show1='7' ";
        $this->db->from('booking_booked');
        $this->db->where($whr);

        $data['all_count7'] = $this->db->count_all_results();


//ALTER TABLE `booking_booked` CHANGE `text1` `name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

        $whr = "show1='4' or show1='1'  or (datetext4=" . $this->data_day . " and show1='8')";
        if ($counter)
            $whr = "show1='$counter'";
        $data['counter'] = $counter;
        $this->db->from('booking_booked');
        if ($whr)
            $this->db->where($whr);
        $max = 20;
        $data['all_count'] = ceil($this->db->count_all_results() / $max) + 1;
        if (!$this->session->userdata('group'))
            $data['all_count'] = 20;



//echo print_r($this->db->last_query());

        $this->db->from('booking_booked');
        $this->db->order_by('show1', 'desc');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();


        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $i++;
        }
        $data['title'] = 'Dashboard';
        $data['view'] = '../controllers/booking/views/booked/all';

        $data['thispage'] = 'booked';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function check($page = 1, $counter = 0) {



        $whr = "id=0  ";

        if ($this->input->post('submit')) {
            $whr = " ";
            $array = explode("\n", $this->input->post('comment8'));


            for ($index = 0; $index < count($array); $index++) {

                if (strlen($array[$index]) > 30 and $array[$index]) {



                    $query = $this->db->get_where('payment', array('TRACKING_ID' => trim($array[$index])));
                    $data['show'] = $query->row_array();



                    $query = $this->db->get_where('booking_booked', array('md5id' => trim($data['show']['md5id'])));
                    $data['booked'] = $query->row_array();


                    if ($data['show']['PAYMENT_STATUS'] != 'successful' and isset($data['show']['md5id']) and $data['booked']['show1'] != 5 and $data['booked']['paymenttext'] == '') {
                        echo $array[$index];
                        echo "<br>";

                        $whr = "$whr md5id='" . $data['show']['md5id'] . "' or";
                    }
                }
            }
        }
        $whr = substr($whr, 0, (strLen($whr) - 2));


        if (trim($whr) == '')
            $whr = "id=0  ";



//ALTER TABLE `booking_booked` CHANGE `text1` `name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;


        if ($counter)
            $whr = "show1='$counter'";
        $data['counter'] = $counter;
        $this->db->from('booking_booked');
        if ($whr)
            $this->db->where($whr);
        $max = 20;
        $data['all_count'] = ceil($this->db->count_all_results() / $max) + 1;




//echo print_r($this->db->last_query());

        $this->db->from('booking_booked');
        $this->db->order_by('show1', 'desc');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();


        $i = 0;
        foreach ($data['all_groups'] as $row) {

            $i++;
        }
        $data['title'] = 'Dashboard';
        $data['view'] = '../controllers/booking/views/booked/check';

        $data['thispage'] = 'booked';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function add($room) {


        $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');
        $this->db->where("conter=1  or conter=3 ");
        $data['all_rooms'] = count($this->db->get()->result_array());


        /// $this->session->set_flashdata('msg', '        تم ايقاف الروابط موقتا   ');
        ///       redirect($_SERVER['HTTP_REFERER']);

        if (stristr($_SERVER['REQUEST_URI'], '/booking4/')) {
            ///   $this->session->set_flashdata('msg', 'تم ايقاف الروابط بسبب تعاون الموظفين مع العملاء في فرع الرقعي ');
            ////    echo $_SERVER['HTTP_REFERER'];
            ////   redirect($_SERVER['HTTP_REFERER']);
        }
        if ($data['all_rooms'] < 4) {
            ///     $this->session->set_flashdata('msg', 'لايمكن اضافة الرابط في عدد شقق اقل من  4 ');
            ////    echo $_SERVER['HTTP_REFERER'];
            /////     redirect($_SERVER['HTTP_REFERER']);
        }
        /// echo date('H', time());exit;
        if (date('H', time()) > 5 and date('H', time()) < 9) {

        ///    $this->session->set_flashdata('msg', 'لايمكن اضافة الرابط في الوقت هذا');
            //// echo $_SERVER['HTTP_REFERER'];

         ///   redirect($_SERVER['HTTP_REFERER']);
        }


        if ($this->session->flashdata('msg')) {
            $data['msg'] = $this->session->flashdata('msg');
            $this->session->set_flashdata('msg', '');
        }
        $query = $this->db->get_where('booking_rooms', array('name' => $room));
        $data['edit'] = $query->row_array();
        if (!isset($data['edit']['door']))
            $data['edit']['door'] = '';
        if (!isset($data['edit']['name']))
            $data['edit']['name'] = '';
        $data['door'] = $data['edit']['door'];
        $data['room'] = $data['edit']['name'];


        $data['nao'] = $this->nao;





        for ($count = 1; $count < count($this->nao) + 1; $count++):
            $whr = " room='$room' and noa='$count'";

            $this->db->from('booking_rooms_images');
            $this->db->order_by('id', 'desc');
            $this->db->where($whr);

            $data['all_groups'][$count] = $this->db->get()->result_array();
            /// echo print_r($this->db->last_query());
        endfor;

        $data['view'] = '../controllers/booking/views/booked/add';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function add2() {


        $room = 0;

        $add = FALSE;
        if ($this->input->post('submit')) {



            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            $cid = $this->input->post('cid');
            $mobile = $this->input->post('mobile');
            $data['noa'] = $this->input->post('noa');
            $data['day'] = 1;





            if (!$mobile and!$cid)
                $add = FALSE;
            else {
                $data['mobile'] = '';
                if ($mobile) {
                    $query = $this->db->get_where('booking', array('mobile' => $mobile));
                    $data['edit'] = $query->row_array();
if(empty($data['edit']) ){
       $query = $this->db->get_where('booking', array('mobile2' => $mobile));
                    $data['edit'] = $query->row_array();
}
                 /*   if (!isset($data['edit']['cid'])) {
                        $data['mobile'] = $mobile;
                        $this->session->set_flashdata('msg', ' رقم الجوال غير  صحيح ');
                        redirect(base_url() . 'booking/booked/add/' . $room);
                    }
               */     
                    if (isset($data['edit']['cid'])) { $cid = $data['edit']['cid']; }
                    $data['noa'] = 'بطاقة مدنية';
                    $data['mobile'] = $mobile;
                }
                $data['timeenter'] = $this->booking->tissme_now();

                $data['show1'] = 1;
                $data['datetext4'] = $this->data_day;

                if ($this->input->post('noo3') == 'date') {
                    $data['show1'] = 7;
                    $data['datetext4'] = str_replace("-", "", $this->input->post('datetext4'));
                    $data['timeenter'] = strtotime(str_replace("-", "", $this->input->post('datetext4')) . " 12:00");
                    ////die(strtotime(str_replace("-", "", $this->input->post('datetext4'))." 12:00"));  
                }

                if (date('H', $data['timeenter']) < 7)
                    $data['timeend'] = strtotime(date('Ymd 12:00', $data['timeenter'] + (24 * 60 * 60 * ($data['day'] - 1))));
                else
                    $data['timeend'] = strtotime(date('Ymd 12:00', $data['timeenter'] + (24 * 60 * 60 * ($data['day']))));


                if (strlen($cid) == 12)
                    $data['noa'] = 'بطاقة مدنية';

                if ( $cid !=null && strlen($cid) != 12 and $data['noa'] == 'بطاقة مدنية') {
                    $this->session->set_flashdata('msg', 'الرقم المدني غير صحيح');
                    redirect(base_url() . 'booking/booked/add/' . $room);
                }
            
                if ($data['noa'] == 'بطاقة مدنية') {
//$date = ("19".(substr($cid,1,2)).substr($cid,3,2).(substr($cid,5,2))); 


                    $MonnumN = date('m', time());
                    $DaYnumm = date('d', time());

                    $ysss = (date('Y', time()) - ("19" . (substr($cid, 1, 2))));


                    if (substr($cid, 0, 1) == '3') {

                        $ysss = (date('Y', time()) - ("20" . (substr($cid, 1, 2))));
                    }


                    if ($ysss < 22) {



                        if ($ysss == 21) {
                            $mmmmm = $MonnumN - (substr($cid, 3, 2));
                            if ($mmmmm >= 0) {
//// and (substr($_POST[cid],5,2)-$DaYnumm)<0
                                $dddd = ($DaYnumm - substr($cid, 5, 2));
                                if ($mmmmm == 0 and $dddd < 0) {

                                    $this->session->set_flashdata('msg', "الشخص قاصر");
                                    redirect(base_url() . 'booking/booked/index/' . $room);
                                }
                            } else {
                                $this->session->set_flashdata('msg', "الشخص قاصر");
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                        } else {
                            $this->session->set_flashdata('msg', "الشخص قاصر");
                            redirect(base_url() . 'booking/booked/index/' . $room);
                        }
                    }
                }

                $query = $this->db->get_where('booking_clints', array('cid' => $cid));
                $clints = $query->row_array();

                $data['cid'] = $cid;

                $data['name'] = $clints['name'];
                $data['country'] = $clints['country'];
                $data['file5'] = $clints['file5'];
                $data['comment'] = $clints['comment'];
                $data['file1'] = $clints['file1'];

                $data['file2'] = $clints['file2'];
   $data['file3'] = ($clints['file3']);


                if ($clints['oky'] == 'ok') {



                    $this->db->where("comment2>0     and comment5='wait'");


                    $this->db->from('booking');
                    $this->db->order_by('id', 'desc');
                    $this->db->limit(1);
                    $this->db->where(array('cid' => $cid));
                    $data['all_groups'] = $this->db->get()->result_array();
//                  echo print_r($this->db->last_query());
//                  echo  $data['all_groups'][0]['id'];
//exit;
                    $this->session->set_flashdata('msg', 'يوجد بلاك لست بسبب   :' . $clints['comment']);
                    if ($data['all_groups'][0]['id'])
                        redirect(base_url() . 'booking/show/id/' . $data['all_groups'][0]['id']);
                    else
                        redirect(base_url() . 'booking/booked/all/');
                } else {

                    $data['all_groups31'] = array();
                    $data['all_groups32'] = array();
                    $data['all_groups34'] = array();
                    $data['all_groups35'] = array();
                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking/booking/')) {

                        $dbhost = "localhost"; // ??????
                        $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????
                        $dbpass = "Qaz*123123";     // ??????? ????? ????????
                        $dbname = "kuwaityc_booking"; // ??? ????? ????????
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                if ($row['oky'] == 'ok') {
                                    $data['msg'] = 'يوجد بلاك لست بسبب    في حولي: ' . $row['comment'];
                                    ///   redirect(base_url() . 'booking/booked/index/' . $room);
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في حولي');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");
                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups31'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups31'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups31'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups31'][$i]['day'] = $rowr['day'];
                                $data['all_groups31'][$i]['room'] = $rowr['room'];
                                $data['all_groups31'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups31'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups31'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }
                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking2/booking/')) {

                        $dbhost = "localhost"; // ??????
                        $dbuser = "kuwaityc_bookin2";  // ??? ?????? ????? ????????
                        $dbpass = "Qaz*123123";     // ??????? ????? ????????
                        $dbname = "kuwaityc_booking2"; // ??? ????? ????????
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                if ($row['oky'] == 'ok') {

                                    $data['msg'] = 'يوجد بلاك لست بسبب    في السالمية: ' . $row['comment'];
                                    //   redirect(base_url() . 'booking/booked/index/' . $room);
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في السالمية');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");

                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups32'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups32'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups32'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups32'][$i]['day'] = $rowr['day'];
                                $data['all_groups32'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups32'][$i]['room'] = $rowr['room'];
                                $data['all_groups32'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups32'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }
                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking4/booking/')) {

                        $dbhost = "localhost"; //
                        $dbuser = "kuwaityc_book";  // 
                        $dbpass = "Qaz*123123";     // 
                        $dbname = "kuwaityc_booking4"; // 
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                if ($row['oky'] == 'ok') {

                                    $data['msg'] = 'يوجد بلاك لست بسبب    في الرقعي: ' . $row['comment'];
                                    ///  redirect(base_url() . 'booking/booked/index/' . $room);
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في الرقعي');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");
                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups34'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups34'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups34'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups34'][$i]['day'] = $rowr['day'];
                                $data['all_groups34'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups34'][$i]['room'] = $rowr['room'];
                                $data['all_groups34'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups34'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }


                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking5/booking/')) {

                        $dbhost = "localhost"; // ������
                        $dbuser = "kuwaityc_book";  // ��� ������ ����� ��������
                        $dbpass = "Qaz*123123";     // ������� ����� ��������
                        $dbname = "kuwaityc_booking5"; // ��� ����� ��������
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                if ($row['oky'] == 'ok') {

                                    $data['msg'] = 'يوجد بلاك لست بسبب    في الشعب: ' . $row['comment'];
                                    ///  redirect(base_url() . 'booking/booked/index/' . $room);
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في الشعب');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");
                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups35'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups35'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups35'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups35'][$i]['day'] = $rowr['day'];
                                $data['all_groups35'][$i]['room'] = $rowr['room'];
                                $data['all_groups35'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups35'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups35'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }
                    if (!@stristr($_SERVER['REQUEST_URI'], '/booking6/booking/')) {

                        $dbhost = "localhost"; // ������
                        $dbuser = "kuwaityc_book";  // ��� ������ ����� ��������
                        $dbpass = "Qaz*123123";     // ������� ����� ��������
                        $dbname = "kuwaityc_booking6"; // ��� ����� ��������
                        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                            $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                            mysqli_query($mysqli1, "SET NAMES utf8");
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking_clints       where  (  cid = '" . $cid . "'    )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                if ($row['oky'] == 'ok') {

                                    $data['msg'] = 'يوجد بلاك لست بسبب    في ريحانه: ' . $row['comment'];
                                    ///  redirect(base_url() . 'booking/booked/index/' . $room);
                                }
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and counter=1  )  ");
                            while ($row = mysqli_fetch_array($sql1SSS)) {
                                $this->session->set_flashdata('msg', '  لايمكن تسكين العميل بسبب ساكن في ريحانه');
                                redirect(base_url() . 'booking/booked/index/' . $room);
                            }
                            $sql1SSS = mysqli_query($mysqli1, "select * from booking       where  (  cid = '" . $cid . "'  and comment7!=''   )  ");
                            $i = 0;
                            while ($rowr = mysqli_fetch_array($sql1SSS)) {
                                $data['all_groups35'][$i]['comment7'] = $rowr['comment7'];
                                $data['all_groups35'][$i]['timeend2'] = $rowr['timeend2'];
                                $data['all_groups35'][$i]['timeend'] = $rowr['timeend'];
                                $data['all_groups35'][$i]['day'] = $rowr['day'];
                                $data['all_groups35'][$i]['room'] = $rowr['room'];
                                $data['all_groups35'][$i]['bill'] = $rowr['bill'];
                                $data['all_groups35'][$i]['timeenter'] = $rowr['timeenter'];
                                $data['all_groups35'][$i]['timeend'] = $rowr['timeend'];
                                $i++;
                            }
                        }
                    }
                }


              /*  if (!isset($clints['name'])) {
                    $this->session->set_flashdata('msg', '  لايمكن الحجز لانه الرقم المدني غير عميل لدينا     ');
                    redirect(base_url() . 'booking/booked/all/');
                }

              */





                if (isset($rowall1)) {
                    if (count($rowall1) > 0) {
                        $data['all_groups31'] = $rowall1;
                    }
                }

                if (isset($rowall4)) {
                    if (count($rowall4) > 0) {
                        $data['all_groups34'] = $rowall4;
                    }
                }
                if (isset($rowall5)) {
                    if (count($rowall5) > 0) {
                        $data['all_groups35'] = $rowall5;
                    }
                }

                $data['dayfree'] = 0;












                $this->db->from('booking');
                $this->db->order_by('id', 'desc');
                $this->db->where(" cid ='" . $data['cid'] . "'   and timeend2!='' ");
                $data['all_groups'] = $this->db->get()->result_array();
                $this->db->from('booking');
                $this->db->order_by('id', 'desc');
                $this->db->where(" cid ='" . $data['cid'] . "'  and comment1!=''  ");
                $data['all_groups2'] = $this->db->get()->result_array();
                $this->db->from('booking');
                $this->db->order_by('id', 'desc');
                $this->db->where(" cid ='" . $data['cid'] . "'  and comment7!=''  ");
                $data['all_groups3'] = $this->db->get()->result_array();



                $query = $this->db->get_where('booking_rooms', array('name' => $room));
                $data['edit'] = $query->row_array();

                $data['door'] = isset($data['edit']['door']);
                $data['room'] = isset($data['edit']['name']);

                $data['view'] = '../controllers/booking/views/booked/add2';
                $this->load->view('../controllers/booking/views/layout', $data);
            }
        }
    }

    public function add3() {




//        if ($rooms['conter'] == 2) {
//
//
//            $this->session->set_flashdata('msg', 'تم تسكين الشقة من قبل!');
//            redirect(base_url() . 'booking/dashboard');
//            exit;
//        }

        $thismon = date('Ym', $this->booking->tissme_now());












        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cid', '', 'trim|required');

            $this->form_validation->set_rules('bill', '', 'trim|required');
            $this->form_validation->set_rules('mobile', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            $cid = $this->input->post('cid');

            $data['day'] = 1;
            if ($this->form_validation->run() === FALSE)
                $add = FALSE;
            else {



                $query = $this->db->get_where('booking_clints', array('cid' => $cid));
                $clints = $query->row_array();


                $name = $clints['name'];

                ///   $name=    str_replace(' ','-',trim($name));








                $name = str_replace(' بن ', ' ', trim($name));
                $name = str_replace('عبد ا', 'عبدا', trim($name));

                $MshrfAll2 = explode(" ", trim($name));
//if(count($MshrfAll2)==3)$MshrfAll2[2]='';
                $name = $MshrfAll2[0] . " " . $MshrfAll2[1];





                if (@stristr($_SERVER['REQUEST_URI'], 'booking')) {

                    $url = 'https://paykw.net/payment/token';




                    $token = '1G80MK622KuWEKE81-GFU_QF4S7FJq1ebcxKG_KM-MM';
                    if (@stristr($_SERVER['REQUEST_URI'], 'booking5'))
                        $token = 'Rto9lqk2vkTK3nCmRGiP31H8HoyRu7UL6iBEmIXfOH8';
                    if (@stristr($_SERVER['REQUEST_URI'], 'booking4'))
                        $token = 'fhxFv5uimQUTnglm507fz4ZXyC8jZHiTUCGaiz4aUJg';
// Create a new cURL resource
                    $ch = curl_init($url);

// Setup request to send json via POST
                    $datass = array(
                        'token' => $token,
                        'mobile' => $this->input->post('mobile'),
                        'name' => $name,
                        'url' => base_url('booking/payed/index'),
                        'amount' => $this->input->post('bill'),
                        'dateend' => (time() + (10 * 60)),
                    );


                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTREDIR, 3);

                    curl_setopt($ch, CURLOPT_POSTFIELDS, $datass);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                 echo    $result = curl_exec($ch);

                    //// $result = json_decode(stripslashes($result), true);
                    //$result= json_decode(stripslashes($result), true);
                    $setting = json_decode(($result), true);


                    if ($setting['add'] == 'ok') {
                        $md5 = $setting['md5id'];

                        $this->Sms_send($this->input->post('mobile'), "مرحبا :" . $name . "\nدفع  مبلغ:  " . $this->input->post('bill') . "\n paykw.net/" . 'pay/' . $md5);

                        $this->booking->whats_send($this->input->post('mobile'), "مرحبا :" . $name . "\nدفع  مبلغ:  " . $this->input->post('bill') . "\n paykw.net/" . 'pay/' . $md5);

                        if ($this->input->post('room')) {

                            $_POST['show1'] = 1;
                            $_POST['datetext4'] = $this->data_day;
                        }
                        $show1 = $dataadd = array(
                            'name' => $name,
                            'mobile' => $this->input->post('mobile'),
                            'cid' => $this->input->post('cid'),
                            'booking' => $this->input->post('room'),
                            'dateadd' => time(),
                            'datetext4' => $this->input->post('datetext4'),
                            'amount' => $this->input->post('bill'),
                            'timeenter' => $this->input->post('timeenter'),
                            'timeend' => $this->input->post('timeend'),
                            'show1' => $this->input->post('show1'),
                            'datesms' => time(),
                            'md5id' => $md5,
                            'user' => $this->user);
                        $dataadd = $this->security->xss_clean($dataadd);
                        $result = $this->booking->insert('booking_booked', $dataadd);
                        $insert_id = $this->db->insert_id();
                        if ($result) {



                            redirect(base_url() . 'booking/booked/all/');
                        }
                    }
                } else {
                    if ($this->input->post('room')) {

                        $_POST['show1'] = 1;
                        $_POST['datetext4'] = $this->data_day;
                    }
                    $show1 = $dataadd = array(
                        'name' => $name,
                        'mobile' => $this->input->post('mobile'),
                        'cid' => $this->input->post('cid'),
                        'booking' => $this->input->post('room'),
                        'dateadd' => time(),
                        'datetext4' => $this->input->post('datetext4'),
                        'amount' => $this->input->post('bill'),
                        'timeenter' => $this->input->post('timeenter'),
                        'timeend' => $this->input->post('timeend'),
                        'show1' => $this->input->post('show1'),
                        'datesms' => time(),
                        'user' => $this->user);
                    $dataadd = $this->security->xss_clean($dataadd);
                    $result = $this->booking->insert('booking_booked', $dataadd);
                    $insert_id = $this->db->insert_id();

                    if ($result) {

                        $md5 = substr(md5($insert_id . "aln3esa" . time()), 5, 5);
                        $result = $this->db->where('id', $insert_id)->update('booking_booked', array(
                            'md5id' => $md5,
                        ));

                                $this->Sms_send($this->input->post('mobile'), "مرحبا :" . $name . "\nدفع  مبلغ:  " . $this->input->post('bill') . "\n paykw.net/" . 'pay/' . $md5);

                    $this->booking->whats_send($this->input->post('mobile'), "مرحبا :" . $name . "\nدفع  مبلغ:  " . $this->input->post('bill') . "\n paykw.net/" . 'pay/' . $md5);


                        redirect(base_url() . 'booking/booked/all/');
                    }
                }
            }
        }
    }

    public function send($id) {

        $query = $this->db->get_where('booking_booked', array('id' => $id));
        $clints = $query->row_array();

        $name = str_replace(' بن ', ' ', trim($clints['name']));
        $name = str_replace('عبد ا', 'عبدا', trim($name));

        $MshrfAll2 = explode(" ", trim($name));
//if(count($MshrfAll2)==3)$MshrfAll2[2]='';
        $name = $MshrfAll2[0] . " " . $MshrfAll2[1];

        if ($clints['show1'] == 7) {
            $this->booking->whats_send($clints['mobile'], "مرحبا :" . $name . "\n يوجد لديك حجز غير مكتمل  \n حجز ليله راس السنة \n  paykw.net/" . $this->urlboo . '/booked/index/pay/' . $clints['md5id']);
        } else {
            if ($this->urlboo == 5 or $this->urlboo == 4 or $this->urlboo == 1) {
                $this->booking->whats_send($clints['mobile'], "مرحبا :" . $name . "\nدفع  مبلغ     :" . $clints['amount'] . " \n  paykw.net/" . 'pay/' . $clints['md5id']);
            } else {
                $this->booking->whats_send($clints['mobile'], "مرحبا :" . $name . "\nدفع  مبلغ     :" . $clints['amount'] . " \n  paykw.net/" . $this->urlboo . '/' . $clints['md5id']);
            }
        }


        $result = $this->db->where('id', $insert_id)->update('booking_booked', array(
            'datesms' => time(),
        ));
        $this->session->set_flashdata('msg', 'تم ارسال  الرابط بفضل الله!');
        redirect(base_url('booking/booked/all/'));
    }

    public function cancel($id, $show1) {




        $result = $this->db->where('id', $id)->update('booking_booked', array(
            'show1' => $show1,
        ));
        $this->session->set_flashdata('msg', 'تم الغاء   بفضل الله!');
        redirect(base_url('booking/booked/all/'));
    }

    public function add4($id) {

        $query = $this->db->get_where('booking_booked', array('id' => $id));
        $data['row'] = $query->row_array();


        $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');
        $this->db->where("conter=1 ");
        $data['all_rooms'] = $this->db->get()->result_array();






        $data['view'] = '../controllers/booking/views/booked/add4';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function add5($id) {
        $query = $this->db->get_where('booking_booked', array('id' => $id));
        $row = $query->row_array();


    $query = $this->db->get_where('booking_rooms', array('name' => $this->input->post('room')));
        $rooms = $query->row_array();

        if ($rooms['conter'] == 2) {


            $this->session->set_flashdata('msg', 'تم تسكين الشقة من قبل!');
            redirect(base_url() . 'booking/dashboard');
            exit;
        }


        $row['paymenttext'] = explode("_", $row['paymenttext']);





        $row['datetext4'] = $this->data_day;
        $row['timeenter'] = $this->booking->tissme_now();


        if (date('H', $row['timeenter']) < 7)
            $row['timeend'] = strtotime(date('Ymd 12:00', $row['timeenter'] + (24 * 60 * 60 * ($this->input->post('day') - 1))));
        else
            $row['timeend'] = strtotime(date('Ymd 12:00', $row['timeenter'] + (24 * 60 * 60 * ($this->input->post('day')))));



        $thismon = date('Ym', $this->booking->tissme_now());
        $agd = 1;
        $this->db->from('booking');
        $this->db->order_by('3gd', 'desc');
        $whr = "  timeenter>" . strtotime($thismon . "01 00:00");
        $this->db->where($whr);
        $this->db->limit('1');
        $query = $this->db->get();
        $sss = $query->row_array();
        if (trim($sss['3gd']))
            $agd = intval($sss['3gd']) + 1;
        $agd = sprintf("%'.04d\n", $agd);



        $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
        $clints = $query->row_array();


        $edit_data = array(
            'datetext2' => $clints['datetext2'] + 1,
            'datetext' => $row['datetext4'],
        );
        $edit_data = $this->security->xss_clean($edit_data);
        $this->db->where('id', $clints['id']);
        $this->booking->update('booking_clints', $edit_data);


        $dataadd = array(
            'name' => $clints['name'],
            'datetext4' => $row['datetext4'],
            'mobile' => $row['mobile'],
            'cid' => $row['cid'],
            'room' => $this->input->post('room'),
            'day' => $this->input->post('day'),
            'dayfree' => '',
            'billexport' => '',
            'bill' => $row['amount'],
            'timeenter' => $row['timeenter'],
            'timeend' => $row['timeend'],
            'billprint' => $row['md5id'],
            'comment8' => '',
            'counter' => '1',
            'bookedok' => 'wait',
            '3gd' => $agd,
            'knet' => $row['amount'],
            'noa' => "بطاقة مدنية",
            'user' => $this->user);
        $dataadd = $this->security->xss_clean($dataadd);
        $result = $this->booking->insert('booking', $dataadd);
        $insert_id = $this->db->insert_id();
        $data['room'] = $this->input->post('room');
        $this->db->where('name', $data['room']);
        $this->booking->update('booking_rooms', array('conter' => '2'));
        $this->booking->Sms_send($row['mobile'], "مرحبا :" . $row['name'] . "\nتم تسكين شقتك      :" . $this->input->post('room') . " \n موعد دخولك بدا  : " . date("i-H", $row['timeenter']) . "" . "  \n" . "يجب حضورك كحد اقصى ساعتين");

        $result = $this->db->where('id', $id)->update('booking_booked', array(
            'show1' => '5', 'room' => $data['room'],
        ));
        redirect(base_url() . 'booking/Dashboard/');
    }

    public function idrenew($id, $id2) {


        $query = $this->db->get_where('booking_booked', array('id' => $id));
        $row = $query->row_array();







        $row['paymenttext'] = explode("_", $row['paymenttext']);




        $query = $this->db->get_where('booking', array('id' => $id2));
        $data['show'] = $query->row_array();


        $result = $this->db->where('id', $id)->update('booking_booked', array(
            'show1' => '5', 'room' => $data['show']['room'],
        ));


        $this->booking->Sms_send($row['mobile'], "مرحبا :" . $row['name'] . "\nتم تمديد شقتك  : " . $data['show']['room'] . "\n شكرا لثقتكم ");



        $this->db->where('id', $data['show']['id']);
        $this->booking->update('booking', array('counter' => '2'));
        $query = $this->db->get_where('booking_clints', array('cid' => $data['show']['cid']));
        $clints = $query->row_array();
        $dayfree = $clints['dayfree'];
        $day = 1;









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
            'day' => $this->input->post('day'),
            'billexport' => '',
            'bill' => $row['amount'],
            'timeenter' => $data['show']['timeenter'],
            'timeend' => ($data['show']['timeend'] + (24 * 60 * 60 * $this->input->post('day'))),
            'billprint' => $row['md5id'],
            'counter' => '1',
            'bookedok' => 'ok',
            'knet' => $row['amount'],
            'comment8' => $this->input->post('comment8'),
            'noa' => $data['show']['noa'],
            '3gd' => $data['show']['3gd'],
            'comment' => $data['show']['comment'],
            'commentnbeh' => $data['show']['commentnbeh'],
            'bookingid' => $data['show']['bookingid'],
            'timerenew' => $this->booking->tissme_now(),
            'user' => $this->user,
        );
        /// print_r($data);exit;
        $data = $this->security->xss_clean($data);
        $result = $this->booking->insert('booking', $data);

        $this->session->set_flashdata('msg', 'تم عمل التمديد بفضل الله');
        redirect(base_url() . 'booking/dashboard');
    }

    function Sms_send($mobile, $message, $sender = '') {

        $url = "http://62.150.26.41/SmsWebService.asmx/send";

        /// $url = 'http://62.150.26.41/SmsWebService.asmx/authentication';

        if (!$sender)
            $sender = 'Paykw';
        $params = array(
            'username' => 'aln3esa',
            'password' => 'Dx7caYjP',
            'token' => 'Y3K3T3cFDzn3y5WkzZx6Wsbq',
            'sender' => $sender,
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
        if (curl_errno($ch) !== 0) {
            error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
        }

        curl_close($ch);
        print_r($result);
    }

}

?>