<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

    var $thispage;
    var $data_day;
    var $user;
    var $thismon;
    var $nao;

    public function __construct() {
        parent::__construct();

        $this->load->model('booking');
        $this->data_day = $this->booking->data_day(3);
        $this->user = $this->session->userdata('name');
        $this->thispage = "bills";
        $this->thismon = date('Ym', $this->booking->tissme_now() - (23 * 60 * 60));
    }

    public function index($mon = '') {
        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon) {
            $this->thismon = $mon;
        }

        $whr = " `dateadd` LIKE '%$this->thismon%'";

        $data['all_bill'] = ($this->sum_bill("1 and text3!=1 ") + $this->sum_bill('4') + $this->sum_bill('6')) - ($this->sum_bill('2  and text3!=1') + $this->sum_bill('5') + $this->sum_bill('3'));

        for ($w = 1; $w < 12; $w++) {


            $this->db->from('model_modif');
            $this->db->where("text20!='modif' and text22!='1'  and text21='$w' ");
            $max = 10000;
            $data['all_modif_' . $w] = $this->db->count_all_results();


            $data['sum_modif_' . $w] = ($this->sum_billm("   text20!='modif' and text22!='1'  and text21='$w'   ", "text4") + $this->sum_billm("   text20!='modif'  and text22!='1'  and text21='$w'  ", "text14")) - $this->sum_billm("   text20='modif' and `dateadd` LIKE '%" . $this->thismon . "%'  and text21='$w' ", "text1");
        }

        $data['exp2'] = $this->sum_bill('1  and text30="1" and ' . $whr);
        $data['exp2knet'] = $this->sum_bill('1  and text30="1" and   ' . $whr, 'ok');
        $data['out2'] = $this->sum_bill('2  and text30="1" and  ' . $whr);

        $datasdd = strtotime(date('d-m-Y') . "  00:00");
        $data['all_payment'] = $this->sum_PAYMENT("PAYMENT_STATUS='successful'  and STATUS='ok' and date2<$datasdd ");



        $data['all_deyoon'] = $this->sum_deyoon("   text20!='deyoon' and text22!='1'   ", "text4") + $this->sum_deyoon("   text20!='deyoon'  and text22!='1' ", "text14") - $this->sum_deyoon("   text21!='' and  text20='deyoon'  ", "text1");

        $data['exp1'] = $this->sum_bill('1  and text30="2" and ' . $whr);
        $data['exp1knet'] = $this->sum_bill('1  and text30="2" and  ' . $whr, 'ok');
        $data['out1'] = $this->sum_bill('2  and text30="2" and ' . $whr);


        $data['all_cash1'] = $this->sum_cash('1 and  text30="1" and ' . $whr);
        $data['all_cash2'] = $this->sum_cash('1 and  text30="2" and ' . $whr);
        $data['all_cash5'] = $this->sum_cash('1 and  text30="7" and ' . $whr);
        $data['all_cash8'] = $this->sum_cash('1 and  text30="8" and ' . $whr);
        $data['all_cash9'] = $this->sum_cash('1 and  text30="9" and ' . $whr);
        $data['all_cash10'] = $this->sum_cash('1 and  text30="10" and ' . $whr);
        $data['all_cash11'] = $this->sum_cash('1 and  text30="11" and ' . $whr);




        $data['exp5'] = $this->sum_bill('1  and text30="7" and ' . $whr);
        $data['exp5knet'] = $this->sum_bill('1  and text30="7" and  ' . $whr, 'ok');
        $data['out5'] = $this->sum_bill('2  and text30="7" and ' . $whr);



        $data['exp8'] = $this->sum_bill('1  and text30="8" and ' . $whr);
        $data['exp8knet'] = $this->sum_bill('1  and text30="8" and  ' . $whr, 'ok');
        $data['out8'] = $this->sum_bill('2  and text30="8" and ' . $whr);


        $data['exp9'] = $this->sum_bill('1  and text30="9" and ' . $whr);
        $data['exp9knet'] = $this->sum_bill('1  and text30="9" and  ' . $whr, 'ok');
        $data['out9'] = $this->sum_bill('2  and text30="9" and ' . $whr);




        $data['exp10'] = $this->sum_bill('1  and text30="10" and ' . $whr);
        $data['exp10knet'] = $this->sum_bill('1  and text30="10" and  ' . $whr, 'ok');
        $data['out10'] = $this->sum_bill('2  and text30="10" and ' . $whr);


        $data['exp11'] = $this->sum_bill('1  and text30="11" and ' . $whr);
        $data['exp11knet'] = $this->sum_bill('1  and text30="11" and  ' . $whr, 'ok');
        $data['out11'] = $this->sum_bill('2  and text30="11" and ' . $whr);



        $data['exp12'] = $this->sum_bill('1  and text30="12" and ' . $whr);
        $data['exp12knet'] = $this->sum_bill('1  and text30="11" and  ' . $whr, 'ok');
        $data['out12'] = $this->sum_bill('2  and text30="12" and ' . $whr);


        $data['outltef'] = $this->sum_bill('5  and text30="4" and ' . $whr);
        $data['outbasher'] = $this->sum_bill('5  and text30="3" and ' . $whr);
        $data['out3'] = $this->sum_bill('2  and text30="5" and ' . $whr);
        $data['exp3'] = $this->sum_bill('1  and text30="5" and ' . $whr);
        $whr = "  and `dateadd` LIKE '%$this->thismon%' and text30='2'  ";

        $data['all_bill11'] = ($this->sum_bill("1 and text3!=1   " . $whr) + $this->sum_bill('4' . $whr) + $this->sum_bill('6' . $whr)) - ($this->sum_bill('2  and text3!=1' . $whr) + $this->sum_bill('5' . $whr) + $this->sum_bill('3' . $whr));


        $whr = "  and `dateadd` LIKE '%$this->thismon%' and text30='1'  ";

        $data['all_bill22'] = ($this->sum_bill("1 and text3!=1   " . $whr) + $this->sum_bill('4' . $whr) + $this->sum_bill('6' . $whr)) - ($this->sum_bill('2  and text3!=1' . $whr) + $this->sum_bill('5' . $whr) + $this->sum_bill('3' . $whr));


        $whr = "  and `dateadd` LIKE '%$this->thismon%' and text30='7'  ";

        $data['all_bill55'] = ($this->sum_bill("1 and text3!=1   " . $whr) + $this->sum_bill('4' . $whr) + $this->sum_bill('6' . $whr)) - ($this->sum_bill('2  and text3!=1' . $whr) + $this->sum_bill('5' . $whr) + $this->sum_bill('3' . $whr));


        $whr = "  and `dateadd` LIKE '%$this->thismon%' and text30='8'  ";

        $data['all_bill88'] = ($this->sum_bill("1 and text3!=1   " . $whr) + $this->sum_bill('4' . $whr) + $this->sum_bill('6' . $whr)) - ($this->sum_bill('2  and text3!=1' . $whr) + $this->sum_bill('5' . $whr) + $this->sum_bill('3' . $whr));
        $whr = "  and `dateadd` LIKE '%$this->thismon%' and text30='9'  ";
        $data['all_bill99'] = ($this->sum_bill("1 and text3!=1   " . $whr) + $this->sum_bill('4' . $whr) + $this->sum_bill('6' . $whr)) - ($this->sum_bill('2  and text3!=1' . $whr) + $this->sum_bill('5' . $whr) + $this->sum_bill('3' . $whr));
      $whr = "  and `dateadd` LIKE '%$this->thismon%' and text30='10'  ";
        $data['all_bill1010'] = ($this->sum_bill("1 and text3!=1   " . $whr) + $this->sum_bill('4' . $whr) + $this->sum_bill('6' . $whr)) - ($this->sum_bill('2  and text3!=1' . $whr) + $this->sum_bill('5' . $whr) + $this->sum_bill('3' . $whr));
              $whr = "  and `dateadd` LIKE '%$this->thismon%' and text30='11'  ";
                $data['all_bill1111'] = ($this->sum_bill("1 and text3!=1   " . $whr) + $this->sum_bill('4' . $whr) + $this->sum_bill('6' . $whr)) - ($this->sum_bill('2  and text3!=1' . $whr) + $this->sum_bill('5' . $whr) + $this->sum_bill('3' . $whr));

        $data['all_bank'] = ($this->sum_billtable("1  ", 'bank') + $this->sum_billtable('4', 'bank') + $this->sum_billtable('6', 'bank')) - ($this->sum_billtable('2  and text3!=1', 'bank') + $this->sum_billtable('5', 'bank') + $this->sum_billtable('3', 'bank'));
        $data['all_bank2'] = ($this->sum_billtable("5 and text30=5    ", 'bank'));

        $data['all_cach'] = ($this->sum_billtable("1  ", 'billshawly2') + $this->sum_billtable('4', 'billshawly2') + $this->sum_billtable('6', 'billshawly2')) - ($this->sum_billtable('2  and text3!=1', 'billshawly2') + $this->sum_billtable('5', 'billshawly2') + $this->sum_billtable('3', 'billshawly2'));


        $data['all_cachout'] = ($this->sum_billtable("1  ", 'cach2') + $this->sum_billtable('4', 'cach2') + $this->sum_billtable('6', 'cach2')) - ($this->sum_billtable('2  and text3!=1', 'cach2') + $this->sum_billtable('5', 'cach2') + $this->sum_billtable('3', 'cach2'));

        $data['all_salry'] = ($this->sum_billtable("1  ", 'salry') + $this->sum_billtable('4', 'salry') + $this->sum_billtable('6', 'salry')) - ($this->sum_billtable('2  and text3!=1', 'salry') + $this->sum_billtable('5', 'salry') + $this->sum_billtable('3', 'salry'));

        $data['all_ohda'] = ($this->sum_billtable("1  ", 'ohda') + $this->sum_billtable('4', 'ohda') + $this->sum_billtable('6', 'ohda')) - ($this->sum_billtable('2  and text3!=1', 'ohda') + $this->sum_billtable('5', 'ohda') + $this->sum_billtable('3', 'ohda'));

        $data['all_banknow'] = $data['all_bank'] + $data['all_bill'] - ( $data['all_cach'] + $data['all_salry']);


        $data['all_all'] = $data['all_bank'] + $data['all_bill'];


        $whr = " `dateadd` LIKE '%$this->thismon%'";


        $data['all_bill1'] = $this->sum_bill('1 and  ' . $whr);
        $data['all_bill2'] = $this->sum_bill('2  and ' . $whr);
        $data['all_bill3'] = $this->sum_bill('3  and ' . $whr);
        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);



        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
        $query = $this->db->query("SELECT dateadd FROM `model_billshawly` WHERE `dateadd` LIKE '%$this->thismon%' group by dateadd ORDER BY `dateadd` ASC");

        $data['all_groupsstat'] = $query->result_array();



        $i = 0;
        $all_cash = 0;
        foreach ($data['all_groupsstat'] as $row) {

            $whr = " `dateadd` LIKE '%" . $row['dateadd'] . "%'";


            $data['all_groupsstat'][$i]['all_bill1'] = $this->sum_bill('1 and ' . $whr);
            $data['all_groupsstat'][$i]['all_bill2'] = $this->sum_bill('2  and text3!=1 and  text30!=5 and ' . $whr);
            $data['all_groupsstat'][$i]['all_bill4'] = $this->sum_bill('4 and ' . $whr);
            $data['all_groupsstat'][$i]['all_bill5'] = $this->sum_cash('1 and ' . $whr);
            $data['all_groupsstat'][$i]['all_bill5knet'] = $this->sum_bill('1 and ' . $whr, 'ok');


            $data['all_groupsstat'][$i] ['all5_last'] = $this->sum_cash('5 and ' . $whr);
            $data['all_groupsstat'][$i] ['all5_last2'] = $this->sum_cash('2 and ' . $whr);


            $i++;
        }
        $data['all_cash'] = $all_cash;


        if ($mon) {
            $data['view'] = '../controllers/ltef/views/indexmon';
        } else {
            $data['view'] = '../controllers/ltef/views/index';
        }

        $this->load->view('../controllers/ltef/views/layout', $data);
    }

    function sum_billm($catid, $tbl) {
        $this->db->select_sum($tbl);
        $this->db->where(" $catid ");
        $query = $this->db->get('model_modif')->row_array();
        if (!$query[$tbl])
            $query[$tbl] = 0;
        return $query[$tbl];
    }

    function sum_bill($catid, $knet = '') {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        if ($knet)
            $this->db->like('text2', "knet");
        $query = $this->db->get('model_billshawly')->row_array();
        if (!$query['text1'])
            $query['text1'] = 0;
        return $query['text1'];
    }

    function sum_billtable($catid, $tb) {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        $query = $this->db->get('model_' . $tb)->row_array();
        if (!$query['text1'])
            $query['text1'] = 0;
        return $query['text1'];
    }

    function sum_deyoon($catid, $tbl) {
        $this->db->select_sum($tbl);
        $this->db->where(" $catid ");
        $query = $this->db->get('model_deyoon')->row_array();
        if (!$query[$tbl])
            $query[$tbl] = 0;
        return $query[$tbl];
    }

    function sum_PAYMENT($catid) {
        $this->db->select_sum('amount');
        $this->db->where(" $catid ");
        $query = $this->db->get('payment')->row_array();
        if (!$query['amount'])
            $query['amount'] = 0;
        return $query['amount'];
    }

    function sum_cash($catid) {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        $query = $this->db->get('model_billshawly2')->row_array();
        if (!$query['text1'])
            $query['text1'] = 0;
        return $query['text1'];
    }

    function sum_cash2($catid) {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        $query = $this->db->get('model_billshawly2')->row_array();
        if (!$query['text1'])
            $query['text1'] = 0;
        return $query['text1'];
    }
    
    function backup($all=''){
        
        
       $this->load->dbutil();
        $db_format = array(
      
            'format' => 'zip',
            'filename' => 'my_db_backup.sql',
            'add_insert' => TRUE,
            'newline' => "\n"
        );
///$backup =  $this->dbutil->backup($db_format);
     $this->load->library('zip');
$path = 'application/controllers/ltef/';

$this->zip->read_dir($path);

$path = '../application/';

$this->zip->read_dir($path);

if($all)
{
    
    $path = '../booking/';

$this->zip->read_dir($path);
}


$this->zip->archive("../aln3esa/111.zip");

  $this->load->helper('download');




            $data = file_get_contents("../aln3esa/111.zip");
            force_download("booking".date("Ymd").".zip", $data);
        
    }

}

?>