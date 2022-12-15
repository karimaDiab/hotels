<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Producer extends MY_Controller {

    var $thispage;
    var $nao, $noaroom;
    var $nao2;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
       $this->nao[0] = "";
        $this->nao[1] = "الصالة";
        $this->nao[2] = "الغرفة الماستر";
        $this->nao[3] = "الغرفة الصغيرة";
        $this->nao[4] = " المطبخ";
        $this->nao[5] = "الحمام";
        $this->nao[6] = "حمام الماستر";
        $this->nao[7] = " الغرفة الثالثة ";
        $this->thispage = "producer";

        if (!$this->session->userdata('group')) {
            
        }


        if ((!$this->db->table_exists('booking_producer'))) {
            $this->db->query("CREATE TABLE `booking_producer` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) DEFAULT NULL,
   `model` varchar(255) DEFAULT NULL,
   `company` varchar(255) DEFAULT NULL,
   `mhtwa` varchar(255) DEFAULT NULL,
   `counter` int(11) DEFAULT NULL,  
   `counter2` int(11) DEFAULT NULL,
     `dateadd` varchar(255) DEFAULT NULL,
    `warranty` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
   `text1` varchar(255) DEFAULT NULL,
   `text2` varchar(255) DEFAULT NULL,
   `text3` varchar(255) DEFAULT NULL,
   `text4` varchar(255) DEFAULT NULL,
   `text5` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }
    }

    public function index() {

        $query = $this->db->query("SELECT mhtwa, COUNT(mhtwa) as total FROM `booking_producer`  group by mhtwa ORDER BY `total` desc");

        $data['all_groups'] = $query->result_array();

        $i = 0;
        foreach ($data['all_groups'] as $row) {
///$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];

            $whr = "mhtwa='" . $row['mhtwa'] . "' and counter=0";
            $this->db->from('booking_producer');
            $this->db->where($whr);
            $data['all_groups'][$i]['total1'] = $this->db->count_all_results();


            $whr = "mhtwa='" . $row['mhtwa'] . "' and counter=100";
            $this->db->from('booking_producer');
            $this->db->where($whr);
            $data['all_groups'][$i]['total2'] = $this->db->count_all_results();


            $whr = "mhtwa='" . $row['mhtwa'] . "' and counter!=1 and counter!=100 and counter!=0";
            $this->db->from('booking_producer');
            $this->db->where($whr);
            $data['all_groups'][$i]['total3'] = $this->db->count_all_results();


            $whr = "mhtwa='" . $row['mhtwa'] . "' and counter=1";
            $this->db->from('booking_producer');
            $this->db->where($whr);
            $data['all_groups'][$i]['total4'] = $this->db->count_all_results();


            $query = $this->db->get_where('booking_producer', array('mhtwa' => $row['mhtwa']));
            $producer = $query->row_array();
            $data['all_groups'][$i]['id'] = $producer['id'];
            $i++;
        }
        $data['title'] = 'Dashboard';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/index';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function all($page = 1, $producerid,$counter='') {

        $query = $this->db->get_where('booking_producer', array('id' => $producerid));
        $producer = $query->row_array();
        $whr = "mhtwa='" . $producer['mhtwa'] . "' ";
        
        
        
        if($counter)  $whr = "$whr and counter='" . str_replace ('200', '0', $counter) . "' ";
        $data['producerid'] = $producerid;

        $this->db->from('booking_producer');
        if ($whr)
            $this->db->where($whr);
        $max = 30;
        $data['all_count'] = ceil($this->db->count_all_results() / $max) + 1;




//echo print_r($this->db->last_query());

        $query = $this->db->query("set global sql_mode='NO_ENGINE_SUBSTITUTION';");




        $this->db->from('booking_producer');
        $this->db->order_by('id', 'desc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);



        $data['all_groups'] = $this->db->get()->result_array();

        $i = 0;
        foreach ($data['all_groups'] as $row) {
///$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];



            $i++;
        }
        $data['title'] = 'Dashboard';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function add($cats = 1) {
        $add = FALSE;
        $this->cats = $cats;

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', '', 'trim|required');
            $this->form_validation->set_rules('mhtwa', '', 'trim|required');


            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {


                $add = TRUE;
                $data = array(
                    'name' => $this->input->post('name'),
                    'mhtwa' => $this->input->post('mhtwa'),
                    'model' => $this->input->post('model'),
                    'company' => $this->input->post('company'),
                    'warranty' => $this->input->post('warranty'),
                    'counter' => '0',
                    'dateadd' => time(),
                );
                $data = $this->security->xss_clean($data);
                for ($index = 0; $index < $this->input->post('addnum'); $index++) {
                    $result = $this->booking->insert('booking_producer', $data);
                }

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم اضافة القسم بفضل الله!');
                    redirect(base_url('booking/producer/'));
                }
            }
        }


        if (!$add) {


            $this->db->from('booking_mhtwa');
            $this->db->order_by('id', 'asc');
            $this->db->where("text8=1  ");
            $data['booking_mhtwas'] = $this->db->get()->result_array();

            $i = 0;
            $data['booking_mhtwa'] = array();
            foreach ($data['booking_mhtwas'] as $row) {
                if (!in_array($row['text1'], $data['booking_mhtwa'])) {
                    $data['booking_mhtwa'][] = $row['text1'];
                }
///$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];

                $i++;
            }


//$data['cats_select']  = $this->db->get()->result_array(); 

            $query = $this->db->get_where('booking_producer', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $query = $this->db->get_where('booking_producer', array('id' => $cats));
            if ($cats != 1)
                $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة عضو';

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function del($id) {


        $this->db->where('id', $id);
        $result = $this->booking->delete('booking_producer');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  العضو بفضل الله!');
            redirect(base_url('booking/producer/'));
        }
    }

    public function checkmhtwaok($id, $mhtwa, $producerid) {



        $query = $this->db->get_where('booking_rooms', array('id' => $id));
        $room = $query->row_array();




        $query = $this->db->get_where('booking_mhtwa', array('id' => $mhtwa));
        $mhtwah = $query->row_array();


        $query = $this->db->get_where('booking_producer', array('id' => $producerid));
        $producer = $query->row_array();


        if (isset($producer['name'])) {
            $edit_data = array(
                'counter' => $room['name'],
                'counter2' => $mhtwah['text5'],
                'comment' => $producer['comment'] . "نقل الى شقة :" . $room['name'] . " - " . $this->nao[$mhtwah['text5']] . "||" . time() . "||<aln3esa>",
            );
            $edit_data = $this->security->xss_clean($edit_data);
            $result = $this->db->where('id', $producerid);$this->booking->update('booking_producer', $edit_data);
            $this->session->set_flashdata('msg', 'تم التعديل المحتوى بفضل الله!');
        }
        redirect(base_url('booking/producer/stat'));
    }

    public function checkmhtwaok2($producerid) {


        $query = $this->db->get_where('booking_producer', array('id' => $producerid));
        $producer = $query->row_array();






        if (isset($producer['name']) and $this->input->post('comment')) {
            $edit_data = array(
                'counter' => $this->input->post('counter'),
                'counter2' => $this->input->post('counter2'),
                'comment' => $producer['comment'] . "نقل الى شقة :" . $this->input->post('counter') . " - " . $this->nao[$this->input->post('counter2')] . "||" . time() . "||" . $this->input->post('comment') . "<aln3esa>",
            );
            $edit_data = $this->security->xss_clean($edit_data);
            $result = $this->db->where('id', $producerid);$this->booking->update('booking_producer', $edit_data);
            $this->session->set_flashdata('msg', 'تم التعديل المحتوى بفضل الله!');
        }
        redirect(base_url('booking/producer/stat'));
    }

    public function checkmhtwa($id, $mhtwa) {



        $query = $this->db->get_where('booking_rooms', array('id' => $id));
        $data['room'] = $query->row_array();




        $query = $this->db->get_where('booking_mhtwa', array('id' => $mhtwa));
        $data['mhtwah'] = $query->row_array();




        $whr = "counter=0 and mhtwa='" . $data['mhtwah']['text1'] . "'";






//echo print_r($this->db->last_query());

        $this->db->from('booking_producer');
        $this->db->order_by('id', 'desc');

        $this->db->where($whr);

        $data['all_groups'] = $this->db->get()->result_array();


        $i = 0;
        foreach ($data['all_groups'] as $row) {
///$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];

            $i++;
        }
        $data['title'] = 'Dashboard';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/checkmhtwa';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function edit($id) {

        $query = $this->db->get_where('booking_producer', array('id' => $id));
        $data['edit'] = $query->row_array();


        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {

                $add = TRUE;



                $edit_data = array(
                    'name' => $this->input->post('name'),
                    'model' => $this->input->post('model'),
                    'company' => $this->input->post('company'),
                    'warranty' => $this->input->post('warranty'),
                    'counter' => $this->input->post('counter'),
                    'counter2' => $this->input->post('counter2'),
                );
                $edit_data = $this->security->xss_clean($edit_data);



                $result = $this->db->where('id', $id);$this->booking->update('booking_producer', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل العضو بفضل الله!');
                    redirect(base_url('booking/producer/'));
                }
            }
        }


        if (!$add) {






            $this->db->from('booking_rooms');
            $this->db->order_by('id', 'asc');
            $data['all_rooms'] = $this->db->get()->result_array();


            $data['title'] = 'تعديل عصو';

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/edit';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function show($id) {

        $query = $this->db->get_where('booking_producer', array('id' => $id));
        $data['show'] = $query->row_array();


        $add = FALSE;



        if (!$add) {






            $this->db->from('booking_rooms');
            $this->db->order_by('id', 'asc');
            $data['all_rooms'] = $this->db->get()->result_array();


            $data['title'] = 'تعديل عصو';

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/show';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function stat($page = 1, $noa = '', $id = '') {





//echo print_r($this->db->last_query());

        $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');
        /// $this->db->where("conter!='4'");
        $data['all_room'] = $this->db->get()->result_array();



        $this->db->from('booking_mhtwa');
        $this->db->order_by(' text5  ', 'decs');
        $this->db->order_by(' text8  ', 'decs');
        $this->db->order_by(' text1  ', 'decs');
        if ($page)
            $this->db->where("text8='$page'");

        if ($noa)
            $this->db->where("text5='$noa'");

        if ($id)
            $this->db->where("id='$id'");


        $data['all_groups'] = $this->db->get()->result_array();
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/stat';
        $data['page'] = $page;
        $data['id'] = $id;
        $data['thispage'] = $this->thispage;

        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function room( $producerid) {

  
        $whr = "counter='" . $producerid . "' ";
        $data['producerid'] = $producerid;





//echo print_r($this->db->last_query());

        $query = $this->db->query("set global sql_mode='NO_ENGINE_SUBSTITUTION';");




        $this->db->from('booking_producer');
        $this->db->order_by('counter2', 'asc');
        if ($whr)
            $this->db->where($whr);




        $data['all_groups'] = $this->db->get()->result_array();

        $i = 0;
        foreach ($data['all_groups'] as $row) {
///$data['all_groups'][$i]['gruop']=$gruopname[$row['gruop']];



            $i++;
        }
        
    
                    $data['nao'] = $this->nao;
        $data['title'] = 'Dashboard';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/room';
        $data['thispage'] = $this->thispage;
        
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function room2($room) {

        $query = $this->db->get_where('booking_rooms', array('name' => $room));
        $rroom = $data['edit'] = $query->row_array();


        $data['comment'] = explode("##", $data['edit']['comment']);
        $page = 1;
        $whr = "";


        $this->db->from('booking_mhtwa');
        if ($data['edit']['noa'] == 1)
            $this->db->where("text5!='3'");
        $max = 120;
        $data['all_count'] = ceil($this->db->count_all_results() / $max);



        $comment = null;
//echo print_r($this->db->last_query());
        for ($index = 1; $index < 8; $index++) {
            $this->db->from('booking_mhtwa');
            $this->db->order_by(' text5  ', 'decs');
            $this->db->order_by(' text8  ', 'decs');
            $this->db->order_by(' text1  ', 'decs');
            if ($data['edit']['noa'] == 1)
                $this->db->where("text5!='3'");
            $this->db->where("text5=" . $index);
            $this->db->limit($max, ($max * $page) - $max);
            $data['all_groups' . $index] = $this->db->get()->result_array();
            $i = 0;

            foreach ($data['all_groups' . $index] as $row) {

                $text4h = '';
                if ($this->input->post('text4' . $row['id'])) {
                    $data['all_groups' . $index][$i]['text4'] = $this->input->post('text4old' . $row['id']) . "#" . $this->input->post('text4' . $row['id']);
                    $edit_data = array(
                        'text4' => $this->input->post('text4old' . $row['id']) . "#" . $this->input->post('text4' . $row['id']),
                    );

                    $edit_data = $this->security->xss_clean($edit_data);
                    $result = $this->db->where('id', $row['id']);$this->booking->update('booking_mhtwa', $edit_data);
                    $text4h = $this->input->post('text4' . $row['id']);
                } else {
                    $text4h = $this->input->post('text4h' . $row['id']);
                }

                if ($text4h) {
                    $text4 = $text4h;
                    $query = $this->db->get_where('booking_mhtwah', array('text1' => $rroom['name'], 'text2' => $row['id']));
                    $mhtwah = $query->row_array();

                    if (!$mhtwah['text4'] and ! $mhtwah['text1']) {


                        $dataadd = array('text1' => $rroom['name'],
                            'text2' => $row['id'],
                            'text4' => $text4,
                        );
                        $dataadd = $this->security->xss_clean($dataadd);
                        $result = $this->booking->insert('booking_mhtwah', $dataadd);
                    } else {

                        $edit_data = array(
                            'text4' => $text4,
                        );
                        $edit_data = $this->security->xss_clean($edit_data);
                        $result = $this->db->where('id', $mhtwah['id']);$this->booking->update('booking_mhtwah', $edit_data);
                    }
                }

                if ($this->input->post('comment' . $row['id'])) {
                    $comment .= $this->input->post('comment' . $row['id']) . "##";
                }

                if ($this->input->post('mhtwah' . $row['id'])) {
                    $text3 = $this->input->post('mhtwah' . $row['id']);
                    $query = $this->db->get_where('booking_mhtwah', array('text1' => $rroom['name'], 'text2' => $row['id']));
                    $mhtwah = $query->row_array();

                    if (!$mhtwah['text3']) {


                        $dataadd = array('text1' => $rroom['name'],
                            'text2' => $row['id'],
                            'text3' => $text3,
                        );
                        $dataadd = $this->security->xss_clean($dataadd);
                        $result = $this->booking->insert('booking_mhtwah', $dataadd);
                    } else {

                        $edit_data = array(
                            'text3' => $text3,
                        );
                        $edit_data = $this->security->xss_clean($edit_data);
                        $result = $this->db->where('id', $mhtwah['id']);$this->booking->update('booking_mhtwah', $edit_data);
                    }
                }

                $data['all_groups' . $index][$i]['noa'] = '';
                if ($row['text5'])
                    $data['all_groups' . $index][$i]['noa'] = $this->nao[$row['text5']];



                $data['all_groups' . $index][$i]['noa2'] = $this->nao2[3];
                if ($row['text8'])
                    $data['all_groups' . $index][$i]['noa2'] = $this->nao2[$row['text8']];



                $i++;
            }
        }
        if ($this->input->post('submit')) {

            $edit_data = array(
                'comment' => $comment,
            );
            $edit_data = $this->security->xss_clean($edit_data);
            $result = $this->db->where('id', $room);$this->booking->update('booking_rooms', $edit_data);
            $this->session->set_flashdata('msg', 'تم التعديل المحتوى بفضل الله!');
            redirect(base_url('booking/rooms/mhtwaroom/' . $room));
            //echo $comment;
            exit;
        }

        $data['title'] = 'المحتويات ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/room';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

}

?>