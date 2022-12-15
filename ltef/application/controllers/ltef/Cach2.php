<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cach2 extends MY_Controller {

    var $thispage;
    var $data_day;
    var $user;
    var $thismon;
    var $nao;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
        $this->data_day = $this->booking->data_day(21);
        $this->user = $this->session->userdata('name');
        $this->thispage = "cach2";
        
           if(date('h', $this->booking->tissme_now())<23)
        $this->thismon = date('Ym', $this->booking->tissme_now()-(23*60*60));
        else
        $this->thismon = date('Ym', $this->booking->tissme_now());

 if((!$this->db->table_exists('model_cach2')))
 {
   $this->db->query("CREATE TABLE `model_cach2` (
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
    }

    public function index() {

        $this->all();
    }

    function sum_bill($catid) {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        $query = $this->db->get('model_cach2')->row_array();
        if (!$query['text1'])
            $query['text1'] = 0;
        return $query['text1'];
    }

    public function all($mon = '', $catid = '', $text30 = '') {

       

        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon)
            $this->thismon = $mon;
        $data['all_bill'] = ($this->sum_bill("1  ") + $this->sum_bill('4') + $this->sum_bill('6')) - ($this->sum_bill('2  and text3!=1') + $this->sum_bill('5') + $this->sum_bill('3'));



        $whr = " `dateadd` LIKE '%$this->thismon%'";


        $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
     
         if (isset($text30) and $text30){
               $whr = " $whr and  text30='$text30'"; 
             $data['all_bill1n'] = $this->sum_bill('1  and ' . $whr);
             $data['all_bill2n'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
            $data['all_bill5n'] = $this->sum_bill('5 and ' . $whr);
           $data['all_billn'] = ($data['all_bill1n']) - ( $data['all_bill2n']+$data['all_bill5n'] );
         }
          if ($catid!='all' and $catid)
             $whr = " $whr and  catid='$catid'";
        $this->db->from('model_cach2');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_cach2');
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
         $data['text30'] = $text30;

        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/ltef/views/layout', $data);
    }
 public function updatebalc($mon = '', $catid = '') {

        // $this->add_another_db();


        $this->db->from('model_cach2');
  $this->db->order_by('dateadd', 'asc');
        $this->db->order_by('id', 'asc');
       

        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        $totall = 0;
        foreach ($data['all_groups'] as $row) {

            if ($row['catid'] == 1 and $row['text3'] != 1)
                $totall = $totall + $row['text1'];

            if ($row['catid'] == 4 or $row['catid'] == 6)
                $totall = $totall + $row['text1'];



            if ($row['catid'] == 3 or $row['catid'] == 5)
                $totall = $totall - $row['text1'];


            if ($row['catid'] == 2 and $row['text3'] != 1)
                $totall = $totall - $row['text1'];


            $this->db->where('id', $row['id'])->update('model_cach2', array(
                'text5' => $totall));
    }
         redirect(base_url('ltef/'.$this->thispage));
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







        $whr = " `dateadd` LIKE '%$this->thismon%'";


        $data['all_bill1'] = $this->sum_bill('1 and  ' . $whr);
        $data['all_bill2'] = $this->sum_bill('2  and ' . $whr);
        $data['all_bill3'] = $this->sum_bill('3  and ' . $whr);
        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
        if ($catid)
            $whr = " $whr and  catid='$catid'";



        $query = $this->db->query("SELECT dateadd FROM `model_cach2` WHERE `dateadd` LIKE '%$this->thismon%' group by dateadd ORDER BY `dateadd` ASC");

        $data['all_groups'] = $query->result_array();



        $i = 0;
        $all_cash = 0;
        foreach ($data['all_groups'] as $row) {

            $whr = " `dateadd` LIKE '%" . $row['dateadd'] . "%'";


            $data['all_groups'][$i]['all_bill1'] = $this->sum_bill('1 and ' . $whr);
            $data['all_groups'][$i]['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
            $data['all_groups'][$i]['all_bill4'] = $this->sum_bill('4 and ' . $whr);
            $data['all_groups'][$i]['all_bill5'] = $this->sum_bill('5 and ' . $whr);

            $this->db->from('model_cach2');
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

        $data['all_cash'] = $all_cash;
        $data['title'] = 'Dashboard';

        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/stat';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

    public function add() {
        $add = FALSE;


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
                     'text30' => $this->input->post('text30'),
                    'dateadd' => $this->data_day,
                    'counter' => '1',
                );
                $data = $this->security->xss_clean($data);

                
                $result = $this->db->insert('model_cach2', $data);
                    if($this->input->post('addbill'))
                {
                    $catid=2;
                    if($this->input->post('text30')==3 or $this->input->post('text30')==4) $catid=5;
                    
               
                      $data = array(
                    'catid' =>$catid,
                    'text2' => "دفع من كاش العمارة  : ".$this->input->post('text2') ,
                    'text3' => '',
                    'text1' => $this->input->post('text1'),
                    'text11' => $this->input->post('text11'),
                    'text12' => $this->input->post('text12'),
                    'text13' => $this->input->post('text13'),
                    'text30' =>$this->input->post('text30'),
                    'dateadd' => $this->data_day,
                    'counter' => '1',
                );
                $data = $this->security->xss_clean($data);
                       $result = $this->db->insert('model_billshawly', $data);
 }
                if ($result) {
                    if ($this->input->post('cash') and $this->input->post('endbill')) {

                       /// if ($this->booking->data_day(13) != $this->data_day)
                            //$this->add_another_db();

                        redirect(base_url('ltef/cach2/endbill/' . $this->data_day));
                    } else {
                        $this->session->set_flashdata('msg', 'تم اضافة الفاتورة بفضل الله!');
                        redirect(base_url('ltef/cach2/'));
                    }
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

            $query = $this->db->get_where('model_cach2', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة فاتورة';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/ltef/views/layout', $data);
        }
    }

    public function del($id) {


        $this->db->where('id', $id);
        $result = $this->db->delete('model_cach2');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  الفاتورة بفضل الله!');
            redirect(base_url('ltef/cach2/'));
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('model_cach2', array('id' => $id));
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
                     'dateadd' =>$this->input->post('dateadd'),
                );
                $edit_data = $this->security->xss_clean($edit_data);



                $result = $this->db->where('id', $id)->update('model_cach2', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الفاتورة بفضل الله!');
                    redirect(base_url('ltef/cach2/'));
                }
            }
        }


        if (!$add) {









            $data['title'] = 'تعديل عصو';

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/edit';
            $this->load->view('../controllers/ltef/views/layout', $data);
        }
    }

    public function show($id) {

        $query = $this->db->get_where('model_cach2', array('id' => $id));
        $data['show'] = $query->row_array();
        $data['show']['catid'] = $this->nao[$data['show']['catid']];

        $add = FALSE;












        $data['title'] = 'عرض فاتورة ';

        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

    public function endbill($day) {


       
        $this->db->from('model_cach2');
        $this->db->order_by('id', 'desc');
        $this->db->where(array('dateadd' => $day, 'catid' => '1'));
        $data['all1'] = $this->db->get()->result_array();
        $data['sum_1'] = $this->sum_bill('1 and dateadd= ' . $day);




        $this->db->from('model_cach2');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=2  and text3!=1 and dateadd= ' . $day);
        $data['all2'] = $this->db->get()->result_array();
        $data['sum_2'] = $this->sum_bill('2  and text3!=1 and dateadd= ' . $day);


        $this->db->from('model_cach2');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=3 and dateadd= ' . $day);
        $data['all3'] = $this->db->get()->result_array();
        $data['sum_3'] = $this->sum_bill('3 and dateadd= ' . $day);




        $this->db->from('model_cach2');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=5  and dateadd= ' . $day . " and `text2` not LIKE '%knet%'");
        $data['all5'] = $this->db->get()->result_array();
        $data['sum_5'] = $this->sum_bill('5 and dateadd= ' . $day);
        $data['sum_5_knet'] = $this->sum_bill('5  and dateadd= ' . $day . " and `text2` LIKE '%knet%' ");
        $data['all5_last'] = '0';



        $this->db->from('model_cach2');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=5  and dateadd= ' . $day . " and `text2` not LIKE '%knet%'");
        $this->db->limit(1);
        $row = $this->db->get()->row_array();


        $data['all5_last'] = '0';
        if ($data['all5'] > 0) {
            $data['all5_last'] = $row['text1'];
        } //it will provide latest or last record id.


        $data['knet'] = array();







        $add = FALSE;





        $data['date'] = $day;




        $this->load->view('../controllers/ltef/views/' . $this->thispage . '/endbill', $data);
        $this->load->view('../controllers/ltef/views/' . $this->thispage . '/endbill', $data);
    }

}

?>