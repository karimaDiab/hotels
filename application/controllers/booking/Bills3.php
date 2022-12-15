<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bills3 extends MY_Controller {

    var $thispage;
    var $data_day;
    var $user;
    var $thismon;
    var $nao;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('group') and!$this->session->userdata('editor')) {
            echo "لايمكن الاستخدام ";
            $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
            ///echo $_SERVER['HTTP_REFERER'];

            redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
        $this->load->model('booking');
        $this->data_day = $this->booking->data_day(13);
        $this->user = $this->session->userdata('name');
        $this->thispage = "bills3";
        if (date('h', $this->booking->tissme_now()) < 14)
            $this->thismon = date('202', $this->booking->tissme_now() - (13 * 60 * 60));
        else
            $this->thismon = date('202', $this->booking->tissme_now());


        if ((!$this->db->table_exists('model_bills3_cat'))) {
            $this->db->query("CREATE TABLE `model_bills3_cat` (
  `id` int(11) NOT NULL auto_increment,
  `counter` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateadd` varchar(255) NOT NULL,
  `text1` varchar(255) NOT NULL,
  `text2` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ");
        }
        if ((!$this->db->table_exists('model_bills3'))) {
            $this->db->query("CREATE TABLE `model_bills3` (
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

        $this->nao[1] = "وصل";
        $this->nao[2] = "دفع";
        $this->nao[3] = "سلفة";
        $this->nao[4] = "استرجاع سلفة";
        $this->nao[5] = "طلب";
        $this->nao[6] = "راس مال";
        $this->nao[7] = " طلب ";
        $this->nao[8] = "مسترجع";
        $this->nao[9] = " سلفة  ";
        $this->nao[10] = " سلفه مسترجعه  ";
            $this->nao[11] = "  تصدير الارباح  ";
    }

    public function index() {

        $this->cats();
    }

    function sum_bill($catid, $knet = '') {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        if ($knet)
            $this->db->like('text2', "knet");
        $query = $this->db->get('model_bills3')->row_array();
        if (!$query['text1'])
            $query['text1'] = 0;
        return $query['text1'];
    }
    public function cats($page = 1,$counter=1) {

        $whr = "counter=".$counter;


        $this->db->from('model_bills3_cat');
        if ($whr)
            $this->db->where($whr);
        $max = 20;
        $data['all_count'] = ceil($this->db->count_all_results() / $max) + 1;




//echo print_r($this->db->last_query());

        $this->db->from('model_bills3_cat');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();


        $i = 0;
        foreach ($data['all_groups'] as $rowd) {



            $whr = " `catid2` ='" . $rowd['id'] . "'";
            $this->db->from('model_bills3');

            $this->db->order_by('id', 'asc');
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
            $model_bills3 = $this->db->get()->result_array();


        
            $totall = 0;
            foreach ($model_bills3 as $row) {





                if ($row['catid'] == 1 and $row['text3'] != 1)
                    $totall = $totall + $row['text1'];

                if ($row['catid'] == 6)
                    $totall = $totall + $row['text1'];



                if ($row['catid'] == 3 or $row['catid'] == 5 or $row['catid'] == 7)
                    $totall = $totall - $row['text1'];


                if ($row['catid'] == 2 and $row['text3'] != 1)
                    $totall = $totall - $row['text1'];
            }
            $data['all_groups'][$i]['totall'] = $totall;
         

            $i++;
        }
        
        $data['title'] = 'Dashboard';
         $data['counter'] = $counter;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/cats';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }
    public function all($mon = '', $catid = '') {

        // $this->add_another_db();


        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon)
            $this->thismon = $mon;
        $data['all_bill'] = ($this->sum_bill("1 and text3!=1 ") + $this->sum_bill('6')) - ($this->sum_bill('5') + $this->sum_bill('3') + $this->sum_bill('8')+ $this->sum_bill('11'));



        $whr = " `dateadd` LIKE '%$this->thismon%'";




        $data['all_bill1'] = $this->sum_bill('1  and  text3!=1 and' . $whr);
        $data['all_bill12'] = $this->sum_bill('7  and' . $whr);
        $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
        $data['all_bill6'] = $this->sum_bill('6 and ' . $whr);
        $data['all_bill3'] = $this->sum_bill('3 and ' . $whr);
        $data['all_bill8'] = $this->sum_bill('8 and ' . $whr);
        
             $data['all_bill11'] = $this->sum_bill('11 and ' . $whr);
        if ($catid)
            $whr = " $whr and  catid='$catid'";
        $this->db->from('model_bills3');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_bills3');
        $this->db->order_by('dateadd', 'desc');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['all_groups'][$i]['gruop'] = $this->nao[$row['catid']];

            $data['all_groups'][$i]['catid2'] = "عام";
            $query = $this->db->get_where('model_bills3_cat', array('id' => $row['catid2']));
            $show = $query->row_array();
            if (isset($show['name']))
                $data['all_groups'][$i]['catid2'] = $show['name'];

            $i++;
        }
        $this->db->from('model_bills3_cat');
        $this->db->order_by('id', 'asc');
        $this->db->where("counter=1");
        $data['all_rooms'] = $this->db->get()->result_array();
        $data['title'] = 'Dashboard';

        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function updatebalc($mon = '', $catid = '') {

        // $this->add_another_db();


        $this->db->from('model_bills3');
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


            $this->db->where('id', $row['id']);
            $this->booking->update('model_bills3', array(
                'text5' => $totall));
        }
        redirect(base_url('booking/' . $this->thispage));
    }

    public function add($cat='') {
        $add = FALSE;


 $data['cat'] =$cat;
        $query = $this->db->get_where('model_bills3', array('dateadd' => $this->data_day, 'catid' => '5', 'text2' => 'كاش'));
        $data['show'] = $query->row_array();

        if (isset($data['show']['catid']) and $data['show']['catid'] == 5) {
            $this->data_day = $this->booking->data_day(12);
        }


        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('catid', '', 'trim|required');
            $this->form_validation->set_rules('text1', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required');
            //	$this->form_validation->set_rules('comm', '', 'trim|required');

            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {


                $insert_id = $this->input->post('cat');

                if ($this->input->post('newcat')) {


                    $data11 = array(
                        'name' => $this->input->post('newcat'),
                        'text1' => $this->input->post('newcat2'),
                        'text2' => $this->input->post('newcat3'),
                        'dateadd' => $this->data_day,
                        'counter' => '1',
                    );

                    $this->booking->insert('model_bills3_cat', $data11);
                    $insert_id = $this->db->insert_id();
                    
                    
                }


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
                    'catid2' => $insert_id,
                    'text13' => $this->input->post('text13'),
                    'text3' => $this->input->post('text3'),
                    'dateadd' => $this->data_day,
                    'counter' => '1',
                );
                $data = $this->security->xss_clean($data);
                $result = $this->booking->insert('model_bills3', $data);
                if($this->input->post('catid')==2)
                {
                   $result = $this->booking->insert('model_ohda', $data);    
                }
                if ($result) {

                    $this->session->set_flashdata('msg', 'تم اضافة الفاتورة بفضل الله!');
                    redirect(base_url('booking/bills3/'));
                }
            }
        }


        if (!$add) {



            $this->db->from('model_bills3_cat');
            $this->db->order_by('id', 'desc');
       //// $this->db->where("counter=1");
            $data['all_rooms'] = $this->db->get()->result_array();

//$data['cats_select']  = $this->db->get()->result_array();

            $query = $this->db->get_where('model_bills3', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة فاتورة';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function del($id) {

        $query = $this->db->get_where('model_bills3', array('id' => $id));
        $data['show'] = $query->row_array();

        $this->booking->add_rep_user("  حذف فاتورة  مبلغ " . $data['show']['text1'] . "نوعا  : " . $this->nao[$data['show']['catid']]);

        $this->db->where('id', $id);
        $result = $this->booking->delete('model_bills3');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  الفاتورة بفضل الله!');
            redirect(base_url('booking/bills3/'));
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('model_bills3', array('id' => $id));
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


                $this->db->where('id', $id);
                $result = $this->booking->update('model_bills3', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الفاتورة بفضل الله!');
                    redirect(base_url('booking/bills3/'));
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

    public function finshcat($id) {

        $query = $this->db->get_where('model_bills3_cat', array('id' => $id));
        $data['edit'] = $query->row_array();

        if ($data['edit']['counter'] == 1) {


            $edit_data = array(
                'counter' => 2,
            );

            $this->db->where('id', $id);
            $result = $this->booking->update('model_bills3_cat', $edit_data);

            $whr = " `catid2` ='" . $id . "'";
            $this->db->from('model_bills3');

            $this->db->order_by('id', 'asc');
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
            $data['all_groups'] = $this->db->get()->result_array();


            $i = 0;
            $totall = 0;
            foreach ($data['all_groups'] as $row) {

                if ($row['catid'] == 3) {


                    $dataadd = array(
                        'catid' => 10,
                        'text1' => $row['text1'],
                        'text3' => '',
                        'text2' => $row['text2'],
                        'text11' => $row['text11'],
                        'text12' => $row['text12'],
                        'catid2' => $row['catid2'],
                        'text13' => $row['text13'],
                        'text3' => $row['text3'],
                        'dateadd' => $this->data_day,
                        'counter' => '1',
                    );
                    $result = $this->booking->insert('model_bills3', $dataadd);

                           $this->booking->Sms_send('55544445,69999748', " فاتورة :" . $row['text2'] . "\n مبلغ: " . $row['text1']    . "\n ". $this->nao[10]);

                    $edit_data = array(
                        'catid' => 9,
                    );

                    $this->db->where('id', $row['id']);
                    $result = $this->booking->update('model_bills3', $edit_data);
                }
                if ($row['catid'] == 7) {




                    $this->db->where('id', $row['id']);
                    $result = $this->booking->delete('model_bills3');
                    $dataadd = array(
                        'catid' => 1,
                        'text1' => $row['text1'],
                        'text3' => '',
                        'text2' => $row['text1'],
                        'text11' => $row['text11'],
                        'text12' => $row['text12'],
                        'catid2' => $row['catid2'],
                        'text13' => $row['text13'],
                        'text3' => $row['text3'],
                        'dateadd' => $this->data_day,
                        'counter' => '1',
                    );
                    $result = $this->booking->insert('model_bills3', $dataadd);
                    
                  $this->booking->Sms_send('55544445,69999748', " فاتورة :" . $row['text2'] . "\n مبلغ: " . $row['text1']    . "\n ". $this->nao[1]);
                            
                            
                }




                $i++;
            }
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function backb($id) {

        $query = $this->db->get_where('model_bills3', array('id' => $id));
        $data['edit'] = $query->row_array();

        if ($data['edit']['catid'] == 3) {


            $edit_data = array(
                'catid' => 9,
            );

            $this->db->where('id', $id);
            $result = $this->booking->update('model_bills3', $edit_data);
        }
        if ($data['edit']['catid'] == 7) {


            $edit_data = array(
                'catid' => 1,
            );

            $this->db->where('id', $id);
            $result = $this->booking->update('model_bills3', $edit_data);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function show($id) {

        $query = $this->db->get_where('model_bills3', array('id' => $id));
        $data['show'] = $query->row_array();
        $data['show']['catid'] = $this->nao[$data['show']['catid']];

        $add = FALSE;










        $data['title'] = 'عرض فاتورة ';

        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function catshow($id='') {

        $catidd=$this->input->get('cat');
        if($id)$catidd=$id;
      
        $query = $this->db->get_where('model_bills3_cat', array('id' => $catidd));
        $data['show'] = $query->row_array();


        $add = FALSE;








        $whr = " `catid2` ='" .$catidd . "'";
        $this->db->from('model_bills3');

        $this->db->order_by('id', 'asc');
        $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();


        $i = 0;
        $totall = 0;
           $totall2 = 0;
           
                $totall5 = 0;
              $totall3 = 0;
         
        foreach ($data['all_groups'] as $row) {
            $data['all_groups'][$i]['gruop'] = $this->nao[$row['catid']];


            if ($row['catid'] ==2 and $row['text3'] != 1)
                $totall2 = $totall2 + $row['text1'];
                
                if ($row['catid'] ==5 )
                $totall5= $totall5 + $row['text1'];
                
                
                







               if ($row['catid'] == 3 or $row['catid'] == 5 or $row['catid'] == 7  )
                $totall3 = $totall3 + $row['text1'];

            if ($row['catid'] == 1 and $row['text3'] != 1)
                $totall = $totall - $row['text1'];
                
                
                
            if ($row['catid'] == 2 and $row['text3'] != 1)
                $totall = $totall + $row['text1'];


            $data['all_groups'][$i]['text5'] = $totall;
            ;

            $data['all_groups'][$i]['catid2'] = "عام";
            $query = $this->db->get_where('model_bills3_cat', array('id' => $row['catid2']));
            $show = $query->row_array();
            if (isset($show['name']))
                $data['all_groups'][$i]['catid2'] = $show['name'];

            $i++;
        }

        $data['totall'] = $totall;
          $data['totall2'] = $totall2;
                $data['totall5'] = $totall5;
            $data['totall3'] = $totall3;
        $data['title'] = 'عرض فاتورة ';

        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/catshow';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

}

?>