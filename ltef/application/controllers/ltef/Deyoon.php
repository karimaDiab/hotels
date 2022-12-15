<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deyoon extends MY_Controller {

    var $thispage;
    var $data_day;
    var $user;
    var $thismon;
    var $nao;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
        $this->data_day = $this->booking->data_day(6);
        $this->user = $this->session->userdata('name');
        $this->thispage = "deyoon";
        $this->thismon = date('', $this->booking->tissme_now());


        
           if((!$this->db->table_exists('model_deyoon')))
 {
   $this->db->query(" CREATE TABLE IF NOT EXISTS `model_deyoon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `counter` int(11) DEFAULT '0',
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
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
    
    ");  
     
 }

        $this->nao[1] = "الكويت";
        $this->nao[2] = "السعودية";
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
        $query = $this->db->get('model_deyoon')->row_array();
        if (!$query[$tbl])
            $query[$tbl] = 0;
        return $query[$tbl];
    }

    public function all($mon = '', $catid = '') {

        // $this->add_another_db();


       
        if ($mon)
            $this->thismon = $mon;
        $data['all_bill1'] = $this->sum_bill("   text20!='deyoon' and text22!='1'   ", "text4");
        $data['all_bill2'] = $this->sum_bill("   text20!='deyoon'  and text22!='1' ", "text14");
//
        $data['all_bill3'] = $this->sum_bill("   text21!='' and  text20='deyoon'  ", "text1");



        for($w=1;$w<8;$w++)
        {
                $data['all_bill1_'.$w] = ($this->sum_bill("   text20!='deyoon' and text22!='1'  and text21='$w'   ", "text4")+$this->sum_bill("   text20!='deyoon'  and text22!='1'  and text21='$w'  ", "text14"))-$this->sum_bill("   text20='deyoon'   and text21='$w' ", "text1");    
        }
        

        

        
        
     
//
        $data['all_bill3'] = $this->sum_bill("   text20='deyoon' and `dateadd` LIKE '%" . $this->thismon . "%' ", "text1");

        $whr = "  text20='deyoon' and `dateadd` LIKE '%" . $this->thismon . "%'";
        
        $whr = "  text20!='deyoon'";
if( $catid)$whr = " $whr and text21='$catid'";

        //  $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);

        $this->db->from('model_deyoon');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_deyoon');
        //$this->db->order_by('text15', 'asc');
    $this->db->order_by('text21', 'asc');
         $this->db->order_by('text4', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['all_groups'][$i]['all'] = $this->sum_bill("text19='" . $row['id'] . "' and    text20='deyoon' ", "text1");
    $data['all_groups'][$i]['allold'] = $this->sum_bill("text19='" .  $row['id']  . "' and    text20='deyoon' and dateadd<$this->data_day   and text1!=text4", "text4");
    
     $this->db->from('model_deyoon');
   
            $this->db->where("text19='" .  $row['id']  . "' and    text20='deyoon' and dateadd<$this->data_day   and text1!=text4");
  
           $data['all_groups'][$i]['numold']  = $this->db->count_all_results();
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


        $whr = "  text20!='deyoon' and text22!='1'";


        //  $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);

        $this->db->from('model_deyoon');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_deyoon');
        $this->db->order_by('text15', 'asc');
        $this->db->order_by('text4', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit(1);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['row'] = $row;
            $data['row']['all'] = $this->sum_bill("text19='" . $row['text2'] . "' and    text20='deyoon' ", "text1");

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


        $whr = "  text20!='deyoon' and text22!='1'";


        //  $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);

        $this->db->from('model_deyoon');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_deyoon');
        $this->db->order_by('text15', 'asc');
        $this->db->order_by('text4', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit(1);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['row'] = $row;
            $data['row']['all'] = $this->sum_bill("text19='" . $row['text2'] . "' and    text20='deyoon' ", "text1");

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
                        'text17' => $this->input->post('text17'),
                            'text16' => $this->input->post('text16'),
                    'text6' => $this->input->post('text6'),
                    'text7' => $this->input->post('text7'),
                    'text2' => $this->input->post('text2'),
                    'text10' => $this->input->post('text10'),
                    'text21' => $this->input->post('text21'),
                            'dateadd' => $this->input->post('dateadd') ,
              
                              'text22' => $this->input->post('text22'),
                    'text20' => '',
                );
                $data = $this->security->xss_clean($data);
     $result = $this->db->insert('model_deyoon', $data);


     $id = $this->db->insert_id();
           

if($this->input->post('text13')>0)
{

     $text2 =  "مقدم       " ;
                $add = TRUE;
                $data = array(
                    'text1' => $this->input->post('text13'),
                    'text4' => $this->input->post('text13'),
                    'text21' =>$this->input->post('text21'),
                    'text2' => $text2,
                    'text19' => $id,
                    'text20' => 'deyoon',
                    'dateadd' => $this->input->post('text17') ,
                        'text3' =>$this->input->post('text17') ,
                );
                $data = $this->security->xss_clean($data);
  $result = $this->db->insert('model_deyoon', $data);
}

  for ($index = 1; $index < $this->input->post('text15')+1; $index++) {
      
 
  $text2 =  "قسط         : ".$index ;
                $add = TRUE;
                
                $indexss=$index-1;
                $data = array(
                    'text1' => "0",
                    'text4' => $this->input->post('text16'),
                    'text21' =>$this->input->post('text21'),
                    'text2' => $text2,
                    'text19' => $id,
                    'text20' => 'deyoon',
                    'dateadd' => date("Ymd", strtotime("+$indexss months",strtotime( $this->input->post('dateadd')))),
                        'text3' => '',
                );
                $data = $this->security->xss_clean($data);
  $result = $this->db->insert('model_deyoon', $data);
            }



           
                if ($result) {
                    if ($this->input->post('cash') and $this->input->post('endbill')) {

                        /// if ($this->booking->data_day(13) != $this->data_day)
                        $this->add_another_db();

                        redirect(base_url('ltef/bills/endbill/' . $this->data_day));
                    } else {
                        $this->session->set_flashdata('msg', 'تم اضافة الموظف بفضل الله!');
                        redirect(base_url('ltef/deyoon/'));
                    }
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

            $query = $this->db->get_where('model_deyoon', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة موظف';
                $data['dateadd'] = $this->data_day;
            
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/ltef/views/layout', $data);
        }
    }

    public function addsalf() {
        $add = FALSE;

        $query = $this->db->get_where('model_deyoon', array('id' => $this->input->post('text19')));
        $data['edit'] = $query->row_array();
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text1', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {

              
                $text2 = $this->input->post('no3') . "       " . $this->input->post('text9');
                $add = TRUE;
                $data = array(
                    'text1' => $this->input->post('text1'),
                    'text4' => $this->input->post('text1'),
                    'text21' => $data['edit']['text21'],
                    'text2' => $text2,
                    'text19' => $this->input->post('text19'),
                    'text20' => 'deyoon',
                    'dateadd' => $this->input->post('dateadd') ,
                        'text3' => $this->input->post('dateadd') ,
                );
                $data = $this->security->xss_clean($data);
  $result = $this->db->insert('model_deyoon', $data);
  
  
                if ($result) {
                    if ($this->input->post('cash') and $this->input->post('endbill')) {

                        /// if ($this->booking->data_day(13) != $this->data_day)
                        $this->add_another_db();

                        redirect(base_url('ltef/bills/endbill/' . $this->data_day));
                    } else {
                        $this->session->set_flashdata('msg', 'تم اضافة السلف بفضل الله!');
                        redirect(base_url('ltef/deyoon/'));
                    }
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

            $whr = "  text20!='deyoon'";
            $this->db->from('model_deyoon');
            $this->db->order_by('text15', 'asc');
            $this->db->order_by('text4', 'desc');
            if ($whr)
                $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
            $data['all_groups'] = $this->db->get()->result_array();

            $query = $this->db->get_where('model_deyoon', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة موظف';
              $data['dateadd'] = $this->data_day;
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/addsalf';
            $this->load->view('../controllers/ltef/views/layout', $data);
        }
    }

    public function del($id) {


        $this->db->where('id', $id);
        $result = $this->db->delete('model_deyoon');
        
        
        
     $this->db->where("text19='" . $id . "' and    text20='deyoon' ");
     $result = $this->db->delete('model_deyoon');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم الحذف   بفضل الله!');
            redirect(base_url('ltef/deyoon/'));
        }
    }
    
     public function addsalf2($id) {


             $add = FALSE;
        if ($this->input->post('submit')) {
         
            $this->form_validation->set_rules('text1', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {

                $add = TRUE;

$text1=$this->input->post('text1');
$text1old=$this->input->post('text1old');
if($text1>$text1old)$text1=$text1old;
                $edit_data = array(
                    'text1' => $text1,
                      'text3' =>  $this->data_day,
                );
                $edit_data = $this->security->xss_clean($edit_data);



                $result = $this->db->where('id', $id)->update('model_deyoon', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الموظف بفضل الله!');
                    redirect(base_url('ltef/deyoon/'));
                }
            }
        }

      
    }

    
    public function edit($id) {

        $query = $this->db->get_where('model_deyoon', array('id' => $id));
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
                             'text16' => $this->input->post('text16'),
                        'text22' => $this->input->post('text22'),
                    'text7' => $this->input->post('text7'),
                    'text19' => $this->input->post('text19'),
                    'text2' => $this->input->post('text2'),
                    'text10' => $this->input->post('text10'),
                );
                $edit_data = $this->security->xss_clean($edit_data);



                $result = $this->db->where('id', $id)->update('model_deyoon', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الموظف بفضل الله!');
                    redirect(base_url('ltef/deyoon/'));
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

        $query = $this->db->get_where('model_deyoon', array('id' => $id));
        $data['show'] = $query->row_array();
        // $data['show']['catid'] = $this->nao[$data['show']['catid']];

        $add = FALSE;




        $this->db->from('model_deyoon');
        $this->db->order_by('id', 'asc');

        $this->db->where("text19='" . $data['show']['id'] . "' and    text20='deyoon' ");

//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();


    $data['all'] = $this->sum_bill("text19='" . $data['show']['id'] . "' and    text20='deyoon' ", "text1");
    
       $data['allold'] = $this->sum_bill("text19='" . $data['show']['id'] . "' and    text20='deyoon' and dateadd<$this->data_day   and text1!=text4", "text4");

        $data['title'] = 'عرض فاتورة ';
 $data['dateadd'] = $this->data_day;
        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

}

?>