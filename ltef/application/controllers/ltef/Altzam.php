<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Altzam extends MY_Controller {

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
        $this->thispage = "altzam";
        $this->thismon = date('Ym', $this->booking->tissme_now());



        $this->nao[1] = "الاهل";
        $this->nao[2] = "الاقارب";
       /// $this->nao[3] = "الرقعي";
      ///  $this->nao[6] = " الشركة";
        $this->nao[7] = "اخرى";
    }

    public function index() {

        $this->all();
    }

    function sum_bill($catid, $tbl) {
        $this->db->select_sum($tbl);
        $this->db->where(" $catid ");
        $query = $this->db->get('model_altzam')->row_array();
        if (!$query[$tbl])
            $query[$tbl] = 0;
        return $query[$tbl];
    }

    public function all($mon = '', $catid = '') {

        // $this->add_another_db();


       
        if ($mon)
            $this->thismon = $mon;
        $data['all_bill1'] = $this->sum_bill("   text20!='altzam' and text22!='1'   ", "text4");
        $data['all_bill2'] = $this->sum_bill("   text20!='altzam'  and text22!='1' ", "text14");
//
        $data['all_bill3'] = $this->sum_bill("   text21!='' and  text20='altzam' and `dateadd` LIKE '%" . $this->thismon . "%' ", "text1");



        for($w=1;$w<8;$w++)
        {
                $data['all_bill1_'.$w] = ($this->sum_bill("   text20!='altzam' and text22!='1'  and text21='$w'   ", "text4")+$this->sum_bill("   text20!='altzam'  and text22!='1'  and text21='$w'  ", "text14"))-$this->sum_bill("   text20='altzam' and `dateadd` LIKE '%" . $this->thismon . "%'  and text21='$w' ", "text1");    
        }
        

        

        
        
     
//
        $data['all_bill3'] = $this->sum_bill("   text20='altzam' and `dateadd` LIKE '%" . $this->thismon . "%' ", "text1");

        $whr = "  text20='altzam' and `dateadd` LIKE '%" . $this->thismon . "%'";
        
        $whr = "  text20!='altzam'";
if( $catid)$whr = " $whr and text21='$catid'";

        //  $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);

        $this->db->from('model_altzam');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_altzam');
        //$this->db->order_by('text15', 'asc');
    $this->db->order_by('text21', 'asc');
         $this->db->order_by('text4', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['all_groups'][$i]['all'] = $this->sum_bill("text19='" . $row['id'] . "' and    text20='altzam' and `dateadd` LIKE '%" . $this->thismon . "%'", "text1");

            $i++;
        }
        $data['title'] = 'Dashboard';
         $data['noa'] = $this->nao;
        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

    public function salary($mon = '', $catid = '') {

        // $this->add_another_db();


        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon)
            $this->thismon = $mon;


        $whr = "  text20!='altzam' and text22!='1'";


        //  $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);

        $this->db->from('model_altzam');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_altzam');
        $this->db->order_by('text15', 'asc');
        $this->db->order_by('text4', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit(1);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['row'] = $row;
            $data['row']['all'] = $this->sum_bill("text19='" . $row['text2'] . "' and    text20='altzam' and `dateadd` LIKE '%" . $this->thismon . "%'", "text1");

            $this->load->view('../controllers/ltef/views/' . $this->thispage . '/salary', $data);



            $i++;
        }
    }

    
        public function kshaf($mon = '', $catid = '') {

        // $this->add_another_db();


        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon)
            $this->thismon = $mon;


        $whr = "  text20!='altzam' and text22!='1'";


        //  $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);

        $this->db->from('model_altzam');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_altzam');
        $this->db->order_by('text15', 'asc');
        $this->db->order_by('text4', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit(1);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['row'] = $row;
            $data['row']['all'] = $this->sum_bill("text19='" . $row['text2'] . "' and    text20='altzam' and `dateadd` LIKE '%" . $this->thismon . "%'", "text1");

            $this->load->view('../controllers/ltef/views/' . $this->thispage . '/kshaf', $data);



            $i++;
        }
    }

    public function add() {
        $add = FALSE;


        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text1', '', 'trim|required');
            $this->form_validation->set_rules('text4', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {


                $add = TRUE;
                $data = array(
                    'text1' => $this->input->post('text1'),
                    'text11' => $this->input->post('text11'),
                    'text3' => $this->input->post('text3'),
                    'text4' => $this->input->post('text4'),
                    'text14' => $this->input->post('text14'),
                    'text2' => $this->input->post('text2'),
                    'text13' => $this->input->post('text13'),
                    'text12' => $this->input->post('text12'),
                    'text15' => $this->input->post('text15'),
                    'text6' => $this->input->post('text6'),
                    'text7' => $this->input->post('text7'),
                    'text2' => $this->input->post('text2'),
                    'text10' => $this->input->post('text10'),
                    'text21' => $this->input->post('text21'),
                              'text22' => $this->input->post('text22'),
                    'text20' => '',
                );
                $data = $this->security->xss_clean($data);









                $result = $this->db->insert('model_altzam', $data);
                if ($result) {
                    if ($this->input->post('cash') and $this->input->post('endbill')) {

                        /// if ($this->booking->data_day(13) != $this->data_day)
                        $this->add_another_db();

                        redirect(base_url('ltef/bills/endbill/' . $this->data_day));
                    } else {
                        $this->session->set_flashdata('msg', 'تم اضافة الموظف بفضل الله!');
                        redirect(base_url('ltef/altzam/'));
                    }
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

            $query = $this->db->get_where('model_altzam', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة موظف';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/ltef/views/layout', $data);
        }
    }

    public function addsalf($id='') {
        $add = FALSE;

        $query = $this->db->get_where('model_altzam', array('id' => $this->input->post('text19')));
        $datass['edit'] = $query->row_array();
       
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text1', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {
 ///echo $data['edit']['text1'] ;exit;
                $text2 = $this->input->post('no3') . "       " . $this->input->post('text9');
                $add = TRUE;
                $data = array(
                    'text1' => $this->input->post('text1'),
                    'text11' => $this->input->post('text11'),
                    'text3' => $this->input->post('text3'),
                    'text4' => $this->input->post('text4'),
                    'text14' => $this->input->post('text14'),
                        'text21' => $data['edit']['text21'],
                    'text2' => $text2,
                    'text13' => $this->input->post('text13'),
                    'text12' => $this->input->post('text12'),
                    'text15' => $this->input->post('text15'),
                    'text6' => $this->input->post('text6'),
                    'text7' => $this->input->post('text7'),
                    'text19' => $this->input->post('text19'),
                    'text10' => $this->input->post('text10'),
                    'text20' => 'altzam',
                    'dateadd' => $this->data_day,
                );
                $data = $this->security->xss_clean($data);









                $result = $this->db->insert('model_altzam', $data);
                if($this->input->post('addbill'))
                {
                    
               
                      $data = array(
                    'catid' => "2",
                    'text2' => "التزام  : ".$datass['edit']['text1'] ,
                    'text3' => '',
                    'text1' => $this->input->post('text1'),
                    'text11' => $this->input->post('text11'),
                    'text12' => $this->input->post('text12'),
                    'text13' => $this->input->post('text13'),
                    'text30' =>"5",
                    'dateadd' => $this->data_day,
                    'counter' => '1',
                );
                $data = $this->security->xss_clean($data);
                       $result = $this->db->insert('model_billshawly', $data);
 }



                if ($result) {
                    if ($this->input->post('cash') and $this->input->post('endbill')) {

                        /// if ($this->booking->data_day(13) != $this->data_day)
                        $this->add_another_db();

                        redirect(base_url('ltef/bills/endbill/' . $this->data_day));
                    } else {
                        $this->session->set_flashdata('msg', 'تم اضافة السلف بفضل الله!');
                        redirect(base_url('ltef/altzam/'));
                    }
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

            $whr = "  text20!='altzam'";
            $this->db->from('model_altzam');
            $this->db->order_by('text15', 'asc');
            $this->db->order_by('text4', 'desc');
            if ($whr)
                $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
            $data['all_groups'] = $this->db->get()->result_array();

            if(!$id)$id='100000000000';
            $query = $this->db->get_where('model_altzam', array('id' =>$id ));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة موظف';
            
            
            
            
              $data['id'] = $id;
                $data['text1'] = $id;
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/addsalf';
            $this->load->view('../controllers/ltef/views/layout', $data);
        }
    }

    public function del($id) {


        $this->db->where('id', $id);
        $result = $this->db->delete('model_altzam');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم الحذف   بفضل الله!');
            redirect(base_url('ltef/altzam/'));
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('model_altzam', array('id' => $id));
        $data['edit'] = $query->row_array();
                $data['edit']['checked'] = array('', '', '', '', '', '', '', '', '');
        $data['edit']['checked'][$data['edit']['text22']] = 'checked';
        /// $data['edit']['checked'] = array('', '', '', '', '', '', '', '', '');
        /// $data['edit']['checked'][$data['edit']['catid']] = 'checked';

        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text4', '', 'trim|required');
            $this->form_validation->set_rules('text1', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {

                $add = TRUE;



                $edit_data = array(
                    'text1' => $this->input->post('text1'),
                    'text11' => $this->input->post('text11'),
                    'text3' => $this->input->post('text3'),
                    'text13' => $this->input->post('text13'),
                    'text4' => $this->input->post('text4'),
                    'text14' => $this->input->post('text14'),
                    'text12' => $this->input->post('text12'),
                    'text2' => $this->input->post('text2'),
                    'text15' => $this->input->post('text15'),
                    'text6' => $this->input->post('text6'),
                    'text21' => $this->input->post('text21'),
                        'text22' => $this->input->post('text22'),
                    'text7' => $this->input->post('text7'),
                    'text19' => $this->input->post('text19'),
                    'text2' => $this->input->post('text2'),
                    'text10' => $this->input->post('text10'),
                );
                $edit_data = $this->security->xss_clean($edit_data);



                $result = $this->db->where('id', $id)->update('model_altzam', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الموظف بفضل الله!');
                    redirect(base_url('ltef/altzam/'));
                }
            }
        }


        if (!$add) {









            $data['title'] = 'تعديل عصو';
                      $data['noa'] = $this->nao;

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/edit';
            $this->load->view('../controllers/ltef/views/layout', $data);
        }
    }

    public function show($id) {

        $query = $this->db->get_where('model_altzam', array('id' => $id));
        $data['show'] = $query->row_array();
        // $data['show']['catid'] = $this->nao[$data['show']['catid']];

        $add = FALSE;




        $this->db->from('model_altzam');
        $this->db->order_by('id', 'desc');

        $this->db->where("text19='" . $data['show']['id'] . "' and    text20='altzam' ");

//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();




        $data['title'] = 'عرض فاتورة ';

        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

}

?>