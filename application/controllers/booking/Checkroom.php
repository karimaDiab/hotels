<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkroom extends MY_Controller {

    var $thispage;
    var $nao;
    var $nao2;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
        $this->nao[1] = "الصالة";
        $this->nao[2] = "الغرفة الماستر";
        $this->nao[3] = "الغرفة الصغيرة";
        $this->nao[4] = " المطبخ";
        $this->nao[5] = "الحمام";

        $this->nao2[1] = "اساسي";
        $this->nao2[2] = "صيانة";
        $this->nao2[3] = "غير اساسي";

        $this->thispage = "checkroom";
    }

    public function index() {

        $this->all(1);
    }

    public function all($page = 1,$room='') {


        $whr = "text8!='1'";
     if($room)$whr.=" and   text1='$room' ";  

        $this->db->from('booking_checkroom');
        if ($whr)
            $this->db->where($whr);
        $max = 20;
        $data['all_count'] = ceil($this->db->count_all_results() / $max)+1;




//echo print_r($this->db->last_query());

        $this->db->from('booking_checkroom');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();
        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

       public function arshif($page = 1,$room='') {


      $whr = "text8='1'";
     
             if($room)$whr.=" and   text1='$room' ";  

        $this->db->from('booking_checkroom');
        if ($whr)
            $this->db->where($whr);
        $max = 20;
        $data['all_count'] = ceil($this->db->count_all_results() / $max)+1;




//echo print_r($this->db->last_query());

        $this->db->from('booking_checkroom');
        $this->db->order_by('id', 'asc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();
        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/arshif';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

     public function okid($id) {
       $this->db->where('id', $id);$this->booking->update('booking_checkroom', array('text8' => '1','text6' => $this->booking->tissme_now()));
        $this->session->set_flashdata('msg', 'تم    التغير الى متاحة بفضل الله!');

 redirect(base_url() . 'booking/checkroom/index/');
    }
    public function add() {
        $add = FALSE;

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text1', '', 'trim|required');
            $this->form_validation->set_rules('text2', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {


                $add = TRUE;
                $data = array(
                    'text1' => $this->input->post('text1'),
                    'text2' => $this->input->post('text2'),
                    'text3' => $this->input->post('text3'),
                    'text4' => $this->input->post('text4'),
                           'text5' => $this->input->post('text5'),
                      'text8' => '',
                      'text7' => $this->booking->tissme_now(),
                    
                );
                $data = $this->security->xss_clean($data);
                $result = $this->booking->insert('booking_checkroom', $data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'تم اضافة طلب الصيانة بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/index/'));
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

 $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');

        $data['all_rooms'] = $this->db->get()->result_array();
            $data['title'] = 'اضافة قسم';

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('booking_checkroom', array('id' => $id));
        $data['edit'] = $query->row_array();

        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('door', '', 'trim|required');
            $this->form_validation->set_rules('name', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {
                $comment = $this->input->post('comment');

                $add = TRUE;
                $edit_data = array(
                    'door' => $this->input->post('door'),
                    'name' => $this->input->post('name'),
                );
                $edit_data = $this->security->xss_clean($edit_data);
                $result = $this->db->where('id', $id);$this->booking->update('booking_checkroom', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الشقة بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/index/'));
                }
            }
        }


        if (!$add) {










            $data['title'] = 'تعديل  شقة';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/edit';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function del($id) {

        $this->db->where('id', $id);
        $result = $this->booking->delete('booking_checkroom');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  القسم بفضل الله!');
            redirect(base_url('booking/checkroom/index/'));
        }
    }

    
}

?>