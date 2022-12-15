<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wasel extends MY_Controller {

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
        $this->thispage = "wasel";
        $this->thismon = date('', $this->booking->tissme_now());

        $this->nao[1] = "السالمية";
        $this->nao[2] = "حولي";
        $this->nao[7] = "الرقعي";
        $this->nao[8] = " الشعب";
        $this->nao[9] = " ريحانه";

        $this->nao[10] = "عمارتنا";
        $this->nao[11] = "الفنطاس";
        $this->nao[6] = "الشركة";
        $this->nao[5] = " اخرى";

    $this->nao[12] = "الرقعي الجديدة";

        if ((!$this->db->table_exists('model_wasel'))) {
            $this->db->query(" CREATE TABLE IF NOT EXISTS `model_wasel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `counter` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
    `text5` varchar(255) DEFAULT NULL,

  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
    
    ");
        }
    }

    public function index() {

        $this->all();
    }

    public function all($counter = '') {

        // $this->add_another_db();



        ;










//
        //  $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);
        $whr = "";
        if ($counter)
            $whr = " counter='$counter'";

        $this->db->from('model_wasel');
        if ($whr)
            $this->db->where($whr);
        $max = 30;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_wasel');

        $this->db->order_by('dateadd', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();




        $data['title'] = 'Dashboard';
        $data['noa'] = $this->nao;


        $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/ltef/views/layout', $data);
    }

    public function add() {
        $add = FALSE;
        $data['dataday'] = $this->data_day;


        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text1', '', 'trim|required');
            $this->form_validation->set_rules('dateadd', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {

                $fieldname = 'file1';
                if ($_FILES[$fieldname]['name'] != "") {
                    $config['upload_path'] = '../wasel/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG';
                    $config['max_size'] = '50000';
                    $config['file_name'] = $this->input->post('dateadd') . time();
                    $this->load->library('upload', $config);
                    $this->upload->do_upload($fieldname);
                    $upload_data = $this->upload->data();
                    $file1 = "../wasel/" . $upload_data["file_name"];
                }
                $file2 = '';
                $fieldname2 = 'file2';
                if ($_FILES[$fieldname2]['name'] != "") {
                    $config['upload_path'] = '../wasel/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG';
                    $config['max_size'] = '50000';
                    $config['file_name'] = $this->input->post('dateadd') . time();
                    $this->load->library('upload', $config);
                    $this->upload->do_upload($fieldname2);
                    $upload_data = $this->upload->data();
                    $file2 = "../wasel/" . $upload_data["file_name"];
                }
                $add = TRUE;

                $data = array(
                    'counter' => $this->input->post('counter'),
                    'name' => $this->nao[$this->input->post('counter')] . " - " . $this->input->post('dateadd'),
                    'text1' => $this->input->post('text1'),
                    'text2' => $this->input->post('text2'),
                    'text3' => $this->input->post('text3'),
                    'text4' => $file1,
                    'text5' => $file2,
                    'dateadd' => $this->input->post('dateadd'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->db->insert('model_wasel', $data);





                if ($result) {

                    $this->session->set_flashdata('msg', 'تم اضافة الموظف بفضل الله!');
                    redirect(base_url('ltef/wasel/'));
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

            $query = $this->db->get_where('model_wasel', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة موظف';
            $data['dateadd'] = $this->data_day;

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/ltef/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/ltef/views/layout', $data);
        }
    }

    public function del($id) {

        $query = $this->db->get_where('model_wasel', array('id' => $id));
        $data['show'] = $query->row_array();

        if ($data['show']['text4'])
            unlink($data['show']['text4']);
        if ($data['show']['text5'])
            unlink($data['show']['text5']);

        $this->db->where('id', $id);
        $result = $this->db->delete('model_wasel');

        redirect(base_url('ltef/wasel/'));
    }

}

?>