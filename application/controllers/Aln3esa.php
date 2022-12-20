<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aln3esa extends CI_Controller {

    var  $urlbo;
    public function __construct() {
        parent::__construct();
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


    public function restore($id = '') {

        $output = @file_get_contents("http://localhost:8888/booking/aln3esa/backup/55992222");
        if ($output) {
            $this->load->helper('file');
            write_file("./assets/database_backup" . date("Y-m-d-H-i-s") . ".zip", $output);
            echo "ok";
        }
    }
    
        public function restorefile() {

        $output = @file_get_contents("https://maamlat.com/booking".$this->urlboo."/aln3esa/updatesql/55992222");
        if ($output) {
            $this->dbImportSQL($output);
             echo "ok";
        }
    }
    
    private function dbImportSQL($sql, $needle = '')
        {
          ///  $sql = str_replace('/*TABLE_PREFIX*/', DB_TABLE_PREFIX, $sql);
            $sentences = explode( $needle . ';', $sql);
            // PREPARE THE QUERIES
            $var_l = count($sentences);
            $s_temp = '';
            for($var_k=0;$var_k<$var_l;$var_k++) {
                $s = $s_temp.$sentences[$var_k];
                if(!empty($s) && trim($s)!='') {
                    $s .= $needle;
                    $simple_comma = substr_count($s, "'");
                    $scaped_simple_comma = substr_count($s, "\'");
                    if(($simple_comma-$scaped_simple_comma)%2==0) {
                        $sentences[$var_k] = $s;
                        $s_temp = '';
                        //echo "[OK] ".$s." <br />";
                    } else {
                        unset($sentences[$var_k]);
                        $s_temp = $s.";";
                        //echo "[FAIL] ".$s." <br />";
                    }
                } else {
                    unset($sentences[$var_k]);
                }
            }

            foreach($sentences as $s) {
                $s = trim($s);
                if( !empty($s) ) {
                     $s = trim($s);// . $needle;
                $this->db->query($s.';');
//                    if( $this->db->query($s) ) {
//                        $this->debug($s);
//                    } else {
//                        $this->debug($s . ' | ' . $this->db->error . ' (' . $this->db->errno . ')', false);
//                    }
                }
            }



            return true;
        }
    public function upload($id = '') {
        
        require_once 'SmartFile/BasicClient.php';

// {{{ constants

/**
* These constants are needed to access the API.
*/
define("API_KEY", "XB6EuQRJBVg6Qi0u4iNvkodxWu3v1m");
define("API_PWD", "DvMjn8l8BBzNkawLyt4NxyZkt1ZG7J");

// }}}

// a quick test
$client = new Service_SmartFile_BasicClient(API_KEY, API_PWD);
$client->api_base_url= 'https://majestic.smartfile.com/api/2/';

$rh = fopen("sms-alert-1-daniel_simon.mp3", "rb");
$response = $client->post("/path/data/", array("sms-alert-1-daniel_simon.mp3" => $rh));
fclose($rh);
var_dump( $response);
        

}
    public function backup($id) {

        if (substr(md5($id), 5, 25) == '53b37525a955aa16a03a994e7') {
            $this->load->dbutil();
            $prefs = array(
                'format' => 'zip',
                // 'tables'        => array('gas'),                     // Array of tables to backup. Empty array means all
                'ignore' => array(),
                'filename' => 'backup.sql'
            );
            echo $backup = $this->dbutil->backup($prefs);
        }
    }

    public function updatesql($id) {

        if (substr(md5($id), 5, 25) == '53b37525a955aa16a03a994e7') {
            $db_name = 'assets/sqlupdate.sql';
              $db_name2 = 'assets/sqlupload.sql';
            if (file_exists($db_name)) {
                rename($db_name, $db_name2);
              
                echo $backup = read_file($db_name2);
                unlink($db_name2);
            }
        }
    }

}

?>