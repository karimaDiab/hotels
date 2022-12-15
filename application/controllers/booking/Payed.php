111<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (empty($_SERVER['HTTP_USER_AGENT'])) {
    $_SERVER['HTTP_USER_AGENT'] = array(
        'name' => 'unrecognized',
        'version' => 'unknown',
        'platform' => 'unrecognized',
        'userAgent' => ''
    );
}

class Payed extends CI_Controller {

    var $user_id;

    public function __construct() {
        parent::__construct();

        $token = $this->input->post('token');
        $this->load->model('Db_get');
       
        if ($token=='YXTWjoR1qOJmiCRxmV1Uc9eqtIQxQOoXUPhJ4QXfy4c') {
       
        } else {
            $josn['msg'] = 'error';
            $josn['login'] = 'out';
            $text = json_encode($josn, JSON_UNESCAPED_UNICODE);
            print($text);
            exit;
        }
    }

    public function index( ) {


        $query = $this->db->get_where('booking_booked', array('md5id' => $this->input->post('md5id')));
        $data['row'] = $query->row_array();

        $show1 = 4;
        if ($data['row']['show1'] == 7)
            $show1 = 8;
        /// 

        $edit_data = array(
            'show1' => $show1,
            'paymentdate' => time(),
            'paymenttext' => $this->input->post('TRACKING_ID'),
        );
        $edit_data = $this->security->xss_clean($edit_data);

        $result = $this->db->where('md5id', $this->input->post('md5id'))->update('booking_booked', $edit_data);
        $add = FALSE;
        $this->cats = $cats;
        
        
        
                    $dbhost = "localhost"; // الخادم
                $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
                $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
                $dbname = "kuwaityc_ltef"; // ات
if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                    $count = 0;
                


                    $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                    // $mysqli22 = new mysqli("localhost", "root", "root", "chang");
                    mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
                    mysqli_query($mysqli22, "SET NAMES utf8");

mysqli_query($mysqli22, "INSERT INTO `payment` (`id`, `md5id`, `amount`, `date1`, `TRACKING_ID`, `date2`, `idtable`, `tablem`, `STATUS`, `PAYMENT_STATUS`, `REFERENCE_ID`, `PAYMENT_TIME`, `AUTHORIZATION_ID`, `TRANSACTION_ID`, `token`) VALUES (NULL, '".$data['row']['md5id']."', '".($data['row']['amount']+0.400)."', '".time()."', '".$this->input->post('TRACKING_ID')."', '".time()."', '".$data['row']['id']."', 'paymentlinks', 'ok', 'successful', '015020020821', '0529', '698867', '202015040767082', '');")or die($mysqli22->error);
                   // mysqli_query($mysqli22, "INSERT INTO `payment` SET $fields;")or die($mysqli22->error);
                } 

    

        $text = json_encode($josn, JSON_UNESCAPED_UNICODE);
        print($text);
    }

    protected function phonemd5($mobile, $fff = '') {

        if ($fff)
            return ($mobile + 680) - 55;
        else
            return ($mobile - 680) + 55;
    }

}

// end class
?>