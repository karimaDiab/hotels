<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bills extends MY_Controller {

    var $thispage;
    var $data_day;
    var $user;
    var $thismon;
    var $nao;

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '256M');
        $this->load->model('booking');
        $this->data_day = $this->booking->data_day(24);
        $this->user = $this->session->userdata('name');
        $this->thispage = "bills";
         if(date('h', $this->booking->tissme_now())<24)
        $this->thismon = date('Ym', $this->booking->tissme_now()-(24*60*60));
        else
        $this->thismon = date('Ym', $this->booking->tissme_now());



        $this->nao[1] = "ايراد";
        $this->nao[2] = "مصروفات";
        $this->nao[3] = "سلفة";
        $this->nao[4] = "استرجاع سلفة";
        $this->nao[5] = "تصدير";
                $this->nao[5] = "تصدير";
                     $this->nao[6] = "راس مال";
                $this->nao[7] = "شيك";
                    $this->nao[8] = "مسترجع";

        $this->nao2[1] = "السالمية";
        $this->nao2[2] = "حولي";
        $this->nao2[3] = "بشير";
        $this->nao2[4] = "لطيف ";
        $this->nao2[5] = "اخرى";
        $this->nao2[7] = "الرقعي";
              $this->nao2[8] = "الشعب"; 
              $this->nao2[9] = "ريحانة";
                       $this->nao2[10] = "عمارتنا";
                       $this->nao2[11] = "الفنطاس";
                               $this->nao2[12] = "الرقعي الجديدة";
              
              
    }

    public function index() {

        $this->all();
           ///  $this->booking->Sms_send("55992222","  مصروفات "   );
    
    }

    function sum_bill($catid) {
        $this->db->select_sum('text1');
        $this->db->where(" catid=$catid ");
        $query = $this->db->get('model_billshawly')->row_array();
        if (!$query['text1'])
            $query['text1'] = 0;
        return $query['text1'];
    }

    public function all($mon = '', $catid = '', $text30 = '', $catid2 = '') {


        
        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon)
            $this->thismon = $mon;
        $data['all_bill'] = ($this->sum_bill("1 and text3!=1 ") + $this->sum_bill('4') + $this->sum_bill('6')) - ($this->sum_bill('2  and text3!=1') + $this->sum_bill('5') + $this->sum_bill('3'));



        $whr = " `dateadd` LIKE '%$this->thismon%'";

        $data['all_billmon'] = ($this->sum_bill("1 and text3!=1 and" . $whr) + $this->sum_bill('4 and' . $whr) + $this->sum_bill('6 and' . $whr)) - ($this->sum_bill('2  and text3!=1 and ' . $whr) + $this->sum_bill('5 and' . $whr) + $this->sum_bill('3 and ' . $whr));

        $data['all_bill1'] = $this->sum_bill('1  and text3!=1 and ' . $whr);
        $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        $data['all_bill3'] = $this->sum_bill('3 and ' . $whr);

        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);

        if (isset($text30) and $text30) {
            $whr = " $whr and  text30='$text30'";
            $data['all_bill1n'] = $this->sum_bill('1  and ' . $whr);
            $data['all_bill2n'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
            $data['all_bill3n'] = $this->sum_bill('3  and ' . $whr);
            $data['all_bill5n'] = $this->sum_bill('5 and ' . $whr);
            $data['all_billn'] = ($data['all_bill1n']) - ( $data['all_bill2n'] + $data['all_bill5n']+ $data['all_bill3n'] );
        }
        if ($catid != 'all' and $catid)
            $whr = " $whr and  catid='$catid'";
        
        if ($catid2 != 'all' and $catid2)
            $whr = " $whr and  catid2='$catid2'";
        
        $this->db->from('model_billshawly');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_billshawly');
         if (!$catid)
        $this->db->order_by('dateadd', 'desc');
          if (!$catid)
        $this->db->order_by('id', 'desc');
           if ( $catid)
                      $this->db->order_by('id', 'asc');
           
           
        if ($whr)
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
         $totall = 0;
        foreach ($data['all_groups'] as $row) {
            $data['all_groups'][$i]['gruop'] = $this->nao[$row['catid']];
            
         
             if ($row['catid'] == 1 and $row['text3'] != 1)
                $totall = $totall + $row['text1'];

            if ($row['catid'] == 4 or $row['catid'] == 6)
                $totall = $totall + $row['text1'];



            if ($row['catid'] == 3 or $row['catid'] == 5)
                $totall = $totall - $row['text1'];


            if ($row['catid'] == 2 and $row['text3'] != 1)
                $totall = $totall - $row['text1'];


             if ( $catid) $data['all_groups'][$i]['text5'] = $totall;

               
            
            
            
            if (isset($row['text30']) and isset($this->nao2[$row['text30']]))
                $data['all_groups'][$i]['gruop2'] = $this->nao2[$row['text30']];
            else
                $data['all_groups'][$i]['gruop2'] = '';

            $i++;
        }
        $data['title'] = 'Dashboard';
        $data['text30'] = $text30;
         $this->db->from('model_cat_billshawly');
            $this->db->order_by('id', 'desc');
            $data['cat'] = $this->db->get()->result_array();
              $i = 0;
                 foreach ($data['cat'] as $row) {
                       $whr = "  `dateadd` LIKE '%$this->thismon%' and  catid2='$row[id]' ";
   
       
                        $data['cat'][$i]['all'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
                        
                           $i++;
                 }
        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/ltef/views/layout', $data);
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







        $whr = " `dateadd` LIKE '%$this->thismon%' ";


        $data['all_bill1'] = $this->sum_bill('1 and  ' . $whr);
        $data['all_bill2'] = $this->sum_bill('2  and ' . $whr);
        $data['all_bill3'] = $this->sum_bill('3  and ' . $whr);
        $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
        if ($catid)
            $whr = " $whr and  catid='$catid'";



        $query = $this->db->query("SELECT dateadd FROM `model_billshawly` WHERE `dateadd` LIKE '%$this->thismon%' group by dateadd ORDER BY `dateadd` ASC");

        $data['all_groups'] = $query->result_array();



        $i = 0;
        $all_cash = 0;
        foreach ($data['all_groups'] as $row) {

            $whr = " `dateadd` LIKE '%" . $row['dateadd'] . "%'";


            $data['all_groups'][$i]['all_bill1'] = $this->sum_bill('1 and ' . $whr);
            $data['all_groups'][$i]['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
            $data['all_groups'][$i]['all_bill4'] = $this->sum_bill('4 and ' . $whr);
            $data['all_groups'][$i]['all_bill5'] = $this->sum_bill('5 and ' . $whr);

            $this->db->from('model_billshawly');
            $this->db->order_by('id', 'desc');
            $this->db->where('catid=5  and dateadd= ' . $row['dateadd'] . " and `text2` not LIKE '%knet%'");
            $this->db->limit(1);
            $rowlast = $this->db->get()->row_array();


            $data['all_groups'][$i] ['all5_last'] = '0';
            if ($rowlast['text1'] > 0) {
                $all_cash = $all_cash + intval($rowlast['text1']);

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

    public function updatebalc($mon = '', $catid = '') {

        // $this->add_another_db();


        $this->db->from('model_billshawly');
        $this->db->order_by('dateadd', 'asc');
        $this->db->order_by('id', 'asc');
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        $totall = 0;
        $data['all_bill'] = ($this->sum_bill("1 and text3!=1 ") + $this->sum_bill('4') + $this->sum_bill('6')) - ($this->sum_bill('2  and text3!=1') + $this->sum_bill('5') + $this->sum_bill('3'));
        foreach ($data['all_groups'] as $row) {

            if ($row['catid'] == 1 and $row['text3'] != 1)
                $totall = $totall + $row['text1'];

            if ($row['catid'] == 4 or $row['catid'] == 6)
                $totall = $totall + $row['text1'];



            if ($row['catid'] == 3 or $row['catid'] == 5)
                $totall = $totall - $row['text1'];


            if ($row['catid'] == 2 and $row['text3'] != 1)
                $totall = $totall - $row['text1'];


            $this->db->where('id', $row['id'])->update('model_billshawly', array(
                'text5' => $totall));
        }
        redirect(base_url('ltef/' . $this->thispage));
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

                
                  $catid2 = $this->input->post('catid2');
            if ($this->input->post('catname')) {



                $data = array(
                    'name' => $this->input->post('catname'),
                );
                ///   $data = $this->security->xss_clean($data);
                $result = $this->db->insert('model_cat_billshawly', $data);
             
                
                
                $catid2 = $this->db->insert_id();
            }
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
                     'catid2' => $catid2,
                    
                    'dateadd' => $this->data_day,
                    'counter' => '1',
                );
                $data = $this->security->xss_clean($data);



       $result = $this->db->insert('model_billshawly', $data);
       
         
         if ($this->input->post('text30')==4 and $this->input->post('catid')==5) {
                $whr = " `dateadd` LIKE '%$this->thismon%' and  text30='4'";
                   
            $data['all_bill5n'] = $this->sum_bill('5 and ' . $whr);
        $this->booking->Sms_send("55544445","  مصروفات "
                . "\n"
                . $this->input->post('text1')
                . "\n"
                . $this->input->post('text2')
                   . "\n"
                ."الكلي"
                   . "\n"
                .  $data['all_bill5n']
                );
         }
                if ($result) {
                    if ($this->input->post('cash') and $this->input->post('endbill')) {

                        /// if ($this->booking->data_day(13) != $this->data_day)
                        $this->add_another_db();

                        ///redirect(base_url('bills/bills/endbill/' . $this->data_day));
                    } else {
                        $this->session->set_flashdata('msg', 'تم اضافة الفاتورة بفضل الله!');
                        redirect(base_url('ltef/bills/'));
                    }
                }
            }
        }


        if (!$add) {



         $this->db->from('model_cat_billshawly');
            $this->db->order_by('id', 'desc');
            $data['cat'] = $this->db->get()->result_array();


//$data['cats_select']  = $this->db->get()->result_array(); 

            $query = $this->db->get_where('model_billshawly', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة فاتورة';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/ltef/views/layout', $data);
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
        }

        $mysqli22 = new mysqli("localhost", "root", "root", "bookin2");

        mysqli_query($mysqli22, "DELETE FROM model_billshawly2 WHERE dateadd='" . $this->booking->data_day(13) . "' and text30='$ssss'");
        $this->db->from('model_billshawly');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=5  and dateadd= ' . $this->data_day . " and `text2` not LIKE '%knet%'");
        $this->db->limit(1);
        $rowlast = $this->db->get()->row_array();
        $cccc = ( "insert model_billshawly2 set name='" . $this->data_day . "',dateadd='" . $this->booking->data_day(13) . "',counter='1',catid='1',text30='$ssss',text1='" . $rowlast['text1'] . "',text2='    exprot.   " . $this->data_day . " cash',text3='0',catid2='0',text4='',text5='',text6='',text7='',text8='',text9='',text10='',text11='',text12='',text13='',text14='',text15='',text16='',text17='',text18='',text19='',text20='' ,text21='' ,text22='' ,text23='' ,text24='' ,text25='' ,text26='' ,text27='' ,text28='',text29=''  ");
        mysqli_query($mysqli22, $cccc);


        $this->db->from('model_billshawly');
        $this->db->order_by('id', 'desc');

        $this->db->where(' dateadd= ' . $this->data_day . " and catid!=5");
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        $all_cash = 0;
        foreach ($data['all_groups'] as $row) {


            $cccc = ( "insert model_billshawly2 set name='',dateadd='" . $this->booking->data_day(13) . "',counter='1',catid='" . $row['catid'] . "',text30='$ssss',text1='" . $row['text1'] . "',text2='" . $row['text2'] . "',text3='0',catid2='" . $row['catid2'] . "',text4='',text5='',text6='',text7='',text8='',text9='',text10='',text11='',text12='',text13='',text14='',text15='',text16='',text17='',text18='',text19='',text20='' ,text21='' ,text22='' ,text23='' ,text24='' ,text25='' ,text26='' ,text27='' ,text28='',text29=''  ");
            mysqli_query($mysqli22, $cccc);
        }
    }

    public function del($id) {


        $this->db->where('id', $id);
        $result = $this->db->delete('model_billshawly');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  الفاتورة بفضل الله!');
            redirect(base_url('ltef/bills/'));
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('model_billshawly', array('id' => $id));
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



                $result = $this->db->where('id', $id)->update('model_billshawly', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الفاتورة بفضل الله!');
                    redirect(base_url('ltef/bills/'));
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

        $query = $this->db->get_where('model_billshawly', array('id' => $id));
        $data['show'] = $query->row_array();
        $data['show']['catid'] = $this->nao[$data['show']['catid']];

        $add = FALSE;












        $data['title'] = 'عرض فاتورة ';

        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

    public function endbill($day) {


        if (!$this->session->userdata('group'))
            $day = $this->data_day;
        $this->db->from('model_billshawly');
        $this->db->order_by('id', 'desc');
        $this->db->where(array('dateadd' => $day, 'catid' => '1'));
        $data['all1'] = $this->db->get()->result_array();
        $data['sum_1'] = $this->sum_bill('1 and dateadd= ' . $day);




        $this->db->from('model_billshawly');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=2  and text3!=1 and dateadd= ' . $day);
        $data['all2'] = $this->db->get()->result_array();
        $data['sum_2'] = $this->sum_bill('2  and text3!=1 and dateadd= ' . $day);


        $this->db->from('model_billshawly');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=3 and dateadd= ' . $day);
        $data['all3'] = $this->db->get()->result_array();
        $data['sum_3'] = $this->sum_bill('3 and dateadd= ' . $day);




        $this->db->from('model_billshawly');
        $this->db->order_by('id', 'desc');
        $this->db->where('catid=5  and dateadd= ' . $day . " and `text2` not LIKE '%knet%'");
        $data['all5'] = $this->db->get()->result_array();
        $data['sum_5'] = $this->sum_bill('5 and dateadd= ' . $day);
        $data['sum_5_knet'] = $this->sum_bill('5  and dateadd= ' . $day . " and `text2` LIKE '%knet%' ");
        $data['all5_last'] = '0';



        $this->db->from('model_billshawly');
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




        $this->load->view('../controllers/ltef/views/' . $this->thispage . '/endbill', $data);
        $this->load->view('../controllers/ltef/views/' . $this->thispage . '/endbill', $data);
    }

}

?>