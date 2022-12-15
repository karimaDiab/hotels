<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller {

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
        $this->thispage = "logs";
        $this->thismon = date('Ym', $this->booking->tissme_now());
    }

    public function index($mons = '') {


      $query = $this->db->query("set global sql_mode='NO_ENGINE_SUBSTITUTION';");

        $mon = date("m");
        
        $day = date("d");
        if($mons){
              $day = 31;
        $mon=$mons;}
        
        $i = 0;
        for ($index = $day; $index > 0; $index--) {




            $whr = " `dateadd` LIKE '%" . $mon . "" . sprintf("%'.02d\n", $index) . "%' and text6='6'";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d6'] = count($data['all']);
            
            $whr = " `dateadd` LIKE '%" . $mon . "-" . sprintf("%'.02d\n", $index) . "%' and text6='6' and book5=0";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d60'] = count($data['all']);
            
            
            
            
            
            


             $whr = " `dateadd` LIKE '%" . $mon . "" . sprintf("%'.02d\n", $index) . "%' and text6='5'";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d5'] = count($data['all']);
            
            $whr = " `dateadd` LIKE '%" . $mon . "-" . sprintf("%'.02d\n", $index) . "%' and text6='5' and book4=0";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d50'] = count($data['all']);

    
    
    
    
    
                 $whr = " `dateadd` LIKE '%" . $mon . "" . sprintf("%'.02d\n", $index) . "%' and text6='4'";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d4'] = count($data['all']);
            
            $whr = " `dateadd` LIKE '%" . $mon . "-" . sprintf("%'.02d\n", $index) . "%' and text6='4' and book3=0";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d40'] = count($data['all']);
            
            
            
            
                       $whr = " `dateadd` LIKE '%" . $mon . "" . sprintf("%'.02d\n", $index) . "%' and text6='1'";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d1'] = count($data['all']);
            
            $whr = " `dateadd` LIKE '%" . $mon . "-" . sprintf("%'.02d\n", $index) . "%' and text6='1' and book1=0";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d10'] = count($data['all']);
            
            
            
            
            
                       $whr = " `dateadd` LIKE '%" . $mon . "" . sprintf("%'.02d\n", $index) . "%' and text6='2'";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d2'] = count($data['all']);
            
            $whr = " `dateadd` LIKE '%" . $mon . "-" . sprintf("%'.02d\n", $index) . "%' and text6='2' and book2=0";
            $this->db->from('model_logs');
            $this->db->where($whr);
                $this->db->group_by('text10');
            $data['all'] = $this->db->get()->result_array();
            $data['all_groups'][$i]["name"] = "$mon$index";
            $data['all_groups'][$i]['d20'] = count($data['all']);
            
            
            

            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/stat';





        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

    public function all($page = '', $cat = '') {



        $query = $this->db->query("set global sql_mode='NO_ENGINE_SUBSTITUTION';");


        $max = 5000;
        if ($page)
            $from = ($max * $page) - $max;




        $this->db->from('model_numbber');
        ///   $this->db->select('text10');
        $this->db->group_by('text10');
        /// $this->db->group_by('text6');
        $this->db->order_by('id', 'desc');
        if ($page)
            $this->db->limit($max, ($max * $page) - $max);

        $this->db->where("  dateadd IS NOT NULL");
        //$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();
        echo print_r($this->db->last_query());
        echo count($data['all_groups']) . "<br>";
        foreach ($data['all_groups'] as $row) {

            /// $this->db->from('model_numbber');
///$this->db->where("(text6='11' or  text6='22'  or  text6='44') and text10=".$row['text10']);

            $tetx101 = '';

///$this->db-> count_all_results();

            echo $row['text10'] . "-$tetx101<br>";
        }
        exit;
    }

    public function getnum($page = 1, $cat = '') {



        $catidshow = $this->input->post('catidshow');
        if ($cat)
            $catidshow = $cat;

        if ($catidshow == 11) {
            $dbhost = "localhost"; // ??????
            $dbuser = "kuwaityc_booking";  // ??? ?????? ????? ????????
            $dbpass = "qaz123";     // ??????? ????? ????????
            $dbname = "kuwaityc_booking"; // ??? ????? ????????
        }

        if ($catidshow == 22) {
            $dbhost = "localhost"; // ??????
            $dbuser = "kuwaityc_bookin2";  // ??? ?????? ????? ????????
            $dbpass = "qaz123";     // ??????? ????? ????????
            $dbname = "kuwaityc_booking2"; // ??? ????? ????????
        }

        if ($catidshow == 33) {
            $dbhost = "localhost"; // ??????
            $dbuser = "kuwaityc_booking";  // ??? ?????? ????? ????????
            $dbpass = "qaz123";     // ??????? ????? ????????
            $dbname = "kuwaityc_bookingf"; // ??? ????? ????????
        }

        if ($catidshow == 44) {
            $dbhost = "localhost"; // ??????
            $dbuser = "kuwaityc_booking";  // ??? ?????? ????? ????????
            $dbpass = "qaz123";     // ??????? ????? ????????
            $dbname = "kuwaityc_booking4";
        }
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        mysqli_query($mysqli, "set global sql_mode='NO_ENGINE_SUBSTITUTION';");


        $max = 500;
        $from = ($max * $page) - $max;
//select mobile,datetext4 from  `booking` GROUP BY mobile WHERE LENGTH(mobile) = 8 order by id desc
        $sql = mysqli_query($mysqli, "select mobile  from  `booking` WHERE LENGTH(mobile) = 8  order by id desc");
        $num_sql = mysqli_num_rows($sql);
        $pages = ceil($num_sql / $max);
        $a = mysqli_query($mysqli, "select mobile,datetext4,cid from  `booking`  WHERE LENGTH(mobile) = 8   order by id desc limit $from,$max");
        while ($row = mysqli_fetch_array($a)) {

            $ddddd = $this->fitternum(trim($row['mobile']));

            $dateadd = '';
            $sql = mysqli_query($mysqli, "select datetext4 from booking where cid='" . $row['cid'] . "'  order by id desc limit 1");
            while ($rows = mysqli_fetch_array($sql)) {
                $dateadd = $rows['datetext4'];
            }


            $this->db->from('model_numbber');
            $this->db->where("text10 LIKE '%" . $ddddd . "%' and text6='$catidshow' ");

            $data['all_count'] = ($this->db->count_all_results());



            if ($data['all_count'] == 0 and $ddddd) {
                //echo $ddddd."\n";  
                $data = array(
                    'text10' => $ddddd,
                    'text6' => $catidshow,
                    'dateadd' => $dateadd,
                );
                $data = $this->security->xss_clean($data);
                $result = $this->db->insert('model_numbber', $data);
            } else {

                $edit_data = array(
                    'dateadd' => $dateadd,
                );
                $edit_data = $this->security->xss_clean($edit_data);
                $result = $this->db->where('text10', $ddddd)->update('model_numbber', $edit_data);
            }
        }

        if ($pages > $page) {
            echo"<meta http-equiv=refresh content=3;url=" . base_url('ltef/numbber/getnum/' . ($page + 1) . "/" . $catidshow) . ">";
            echo ("انتظر قليلا سوف يتم الاضفة الرجاء عدم اغلاق الصفحة  $pages - $page");
        } else {
            echo("تم الاضافة بفضل الله");
        }
    }

    public function fitternum($text10) {

        if ($text10) {


            $text10 = str_replace("+", '', trim($text10));
            $text10 = str_replace("?", '', $text10);
            $text10 = str_replace(" ", '', $text10);
            $text10 = str_replace("  ", '', $text10);
            $text10 = str_replace("+965", '', $text10);
            $text10 = str_replace("+965", '', $text10);
            $text10 = str_replace(" ", '', $text10);

            if (strlen($text10) == 11 and substr($text10, 0, 3) == "965") {
                $text10 = substr($text10, 3, 11);
            }
            if (strlen($text10) == 8 and substr($text10, 0, 1) != "2" and ( substr($text10, 0, 1) == "9" or substr($text10, 0, 1) == "5" or substr($text10, 0, 1) == "6")) {
                return $text10;
            }
        }
    }

}

?>