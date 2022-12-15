<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends MY_Controller {

    var $thispage, $urlboom;
    var $nao, $noaroom;
    var $nao2;

    public function __construct() {
        parent::__construct();
        $this->load->model('booking');
        $this->nao[1] = "الصالة";
        $this->nao[2] = "الغرفة الماستر";
        $this->nao[3] = "الغرفة الصغيرة";
        $this->nao[4] = " المطبخ";
        $this->nao[5] = "الحمام";
        $this->nao[6] = "حمام الماستر";
        $this->nao[7] = " الغرفة الثالثة ";

        $this->nao2[1] = "اساسي";
        $this->nao2[2] = "صيانة";
        $this->nao2[3] = "غير اساسي";


        $this->noaroom[1] = "واحد  مزدوج";
        $this->noaroom[2] = "اثنين    مزدوج";
        $this->noaroom[3] = "  مزدوج واثنين فردي";
        $this->noaroom[4] = "مزودج واربعه فردي";
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

        $this->thispage = "rooms";
        
          if ((!$this->db->table_exists('booking_rooms_images'))) {
            $this->db->query("CREATE TABLE `booking_rooms_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `msg` text,
  `dateadd` varchar(255) DEFAULT NULL,
  `noa` varchar(100) DEFAULT NULL,
  `room` int(11) DEFAULT '0',
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        }
    }

    public function index() {

        $this->all(1);
    }

    public function all($page = 1, $all = '') {


        $whr = "";
        if ($all)
            $whr = "";

        $this->db->from('booking_rooms');
        if ($whr)
            $this->db->where($whr);
        $max = 40;
        $data['all_count'] = ceil($this->db->count_all_results() / $max);




//echo print_r($this->db->last_query());

        $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();




            $data['all_groups'][$i]['checkroom'] = $this->db->from('booking_checkroom')->where("text1='" . $row['name'] . "' and  text8!='1'")->count_all_results();
            $data['all_groups'][$i]['checkroomarshif'] = $this->db->from('booking_checkroom')->where("text1='" . $row['name'] . "' and  text8='1'")->count_all_results();

            $data['all_groups'][$i]['move'] = $this->db->from('booking')->where("oldroom='" . $row['name'] . "'  and timemove!='' ")->count_all_results();
            $data['all_groups'][$i]['booking'] = $this->db->from('booking')->where("room='" . $row['name'] . "'  AND (timerenew is null or timerenew = '') ")->count_all_results();

              $data['all_groups'][$i]['images'] = $this->db->from('booking_rooms_images')->where("room='" . $row['name'] . "'  ")->count_all_results();

            
            
         

            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';

        $data['thispage'] = $this->thispage;
        $data['noaroom'] = $this->noaroom;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function add() {
        $add = FALSE;

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('door', '', 'trim|required');
            $this->form_validation->set_rules('name', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {


                $add = TRUE;
                $data = array(
                    'door' => $this->input->post('door'),
                    'name' => $this->input->post('name'),
                    'noa' => $this->input->post('noa'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->booking->insert('booking_rooms', $data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'تم اضافة القسم بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/index/'));
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 


            $data['title'] = 'اضافة قسم';

            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('booking_rooms', array('id' => $id));
        $data['edit'] = $query->row_array();
        $data['edit']['checked'] = array('', '', '', '', '');
        $data['edit']['checked'][$data['edit']['noa']] = 'checked';
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
                    'noa' => $this->input->post('noa'),
                );
                $edit_data = $this->security->xss_clean($edit_data);
                $result = $this->db->where('id', $id);$this->booking->update('booking_rooms', $edit_data);

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
        $result = $this->booking->delete('booking_rooms');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  القسم بفضل الله!');
            redirect(base_url('booking/rooms/index/'));
        }
    }

       public function imagesrooms($page = 1, $all = '') {


        $whr = "";
        if ($all)
            $whr = "";

        $this->db->from('booking_rooms');
        if ($whr)
            $this->db->where($whr);
        $max = 40;
        $data['all_count'] = ceil($this->db->count_all_results() / $max);




//echo print_r($this->db->last_query());

        $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();




            for ($count = 1; $count < count($this->nao) + 1; $count ++):
                
                $whw=" noa='$count' and  room='" . $row['name'] . "'  ";
               $data['all_groups'][$i]['images'.$count] = $this->db->from('booking_rooms_images')->where($whw)->count_all_results();
            
            
         $this->db->from('booking_rooms_images');
         $this->db->order_by('id','desc');
         $this->db->where($whw);
         $this->db->limit('1');
         $query=  $this->db->get();
         $data['all_groups'][$i]['image'.$count]= $query->row_array();
            
            
               endfor; 
              
              
              $data['all_groups'][$i]['images'] = $this->db->from('booking_rooms_images')->where("room='" . $row['name'] . "'  ")->count_all_results();

            
            
         

            $i++;
        }
        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/imagesrooms';

        $data['thispage'] = $this->thispage;
        $data['noaroom'] = $this->noaroom;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function images($room = 1, $iddel = '') {

        if($iddel and $room!='all')
        {
               $query = $this->db->get_where('booking_rooms_images', array('id' => $iddel));
        $data['show'] = $query->row_array();
     unlink( $data['show']['url'] );
   
  $this->db->where('id', $iddel);
        $result = $this->booking->delete('booking_rooms_images');    
                   $this->session->set_flashdata('msg', 'تم الحذف القسم بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/images/'.$room));
        }
      
       
        
            if ($this->input->post('submit')) {
           /// $this->form_validation->set_rules('file1', '', 'trim|required');

            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


                
      $data = [];
   
     
    $result='';
     $config['upload_path'] = '../rooms/'.  $this->urlboo.'/';
   $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|PNG|GIF|JPG';
          $config['max_size'] = '50000';
         /// $config['file_name'] = "room-$room-".$this->booking->tissme_now();
   
          $this->load->library('upload',$config);
          
           $count = count($_FILES['files']['name']);
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['files']['name'][$i])){
    
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
           $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
   
        $imageFileType = pathinfo($_FILES['files']['name'][$i] ,PATHINFO_EXTENSION);
        $name=time()."-". rand (10,100).".".$imageFileType;
   
   
   
   
      $file2 = "../rooms/" .$this->urlboo.'/'.$name;
      
     
 
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            
                   $file1 = "../rooms/" .$this->urlboo.'/'. $uploadData['file_name'];
   
            $this->booking->resize_image($file1,800,700);
            
            rename($file1,$file2);
           $add = TRUE;
                $data = array(
                    'room' => $room,
                    'url' => $file2,
                    'dateadd' =>  $this->booking->tissme_now(),
                    'noa' => $this->input->post('noa'),
                 
                );
                $data = $this->security->xss_clean($data);
                $result = $this->booking->insert('booking_rooms_images', $data);
          }
        }
   
      }
           

              $count = count($_FILES['files2']['name']);
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['files2']['name'][$i])){
    
            $_FILES['file']['name'] = $_FILES['files2']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files2']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files2']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files2']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files2']['size'][$i];
  
       
         $imageFileType = pathinfo($_FILES['files2']['name'][$i] ,PATHINFO_EXTENSION);
        $name=time()."-". rand (10,100).".".$imageFileType;

      
      
            
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
           
                    $file1 = "../rooms/" .$this->urlboo.'/'. $uploadData['file_name'];
             $file2 = "../rooms/" .$this->urlboo.'/'.$name;
          $this->booking->resize_image($file1,800,700);
          
          
            rename($file1,$file2);
           $add = TRUE;
                $data = array(
                    'room' => $room,
                    'url' => $file2,
                    'dateadd' =>  $this->booking->tissme_now(),
                    'noa' => $this->input->post('noa'),
                 
                );
                $data = $this->security->xss_clean($data);
                $result = $this->booking->insert('booking_rooms_images', $data);
          }
        }
   
      }
           

                if ($result) {
                 $this->session->set_flashdata('msg', 'تم اضافة القسم بفضل الله!');
                redirect(base_url('booking/' . $this->thispage . '/images/'.$room));
                
            }
        }


        
        
       
        
        
         for ($count = 1; $count < count($this->nao) + 1; $count ++): 
     $whr = " room='$room' and noa='$count'";
         
        $this->db->from('booking_rooms_images');
        $this->db->order_by('id', 'desc');
           $this->db->where($whr);
    
        $data['all_groups'][$count] = $this->db->get()->result_array();
        /// echo print_r($this->db->last_query());
         endfor;
  
 

        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/images';
      $data['nao'] = $this->nao;
        $data['thispage'] = $this->thispage;
        $data['noaroom'] = $this->noaroom;
         $data['room'] = $room;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    
    
    
        public function imagesall( ) {

        
        
           
        $this->db->from('booking_rooms_images');
        $this->db->order_by('id', 'desc');
       $this->db->limit('100');
          $data['all_groups'] = $this->db->get()->result_array();
       
        
        
        
  
 

        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/imagesall';
      $data['nao'] = $this->nao;
        $data['thispage'] = $this->thispage;
        $data['noaroom'] = $this->noaroom;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    
       public function imagesnoa($count ) {

        
        
            $data['naos'] = $this->nao; 
        $this->db->from('booking_rooms');
        $this->db->order_by('id', 'asc');
 
        $this->nao = $this->db->get()->result_array();
       
        
        
         for ($counts = 0; $counts < count($this->nao) ; $counts ++): 
      $whr = "  noa='$count' and room=".$this->nao[$counts]['name'];
         
        $this->db->from('booking_rooms_images');
        $this->db->order_by('id', 'desc');
           $this->db->where($whr);
    
        $data['all_groups'][$counts] = $this->db->get()->result_array();
        /// echo print_r($this->db->last_query());
         endfor;
  
 

        $data['title'] = 'الشقق ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/imagesnoa';
      $data['nao'] = $this->nao;
        $data['thispage'] = $this->thispage;
        $data['noaroom'] = $this->noaroom;
        $data['count'] = $count;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    
    public function checkmhtwa($id,$mhtwa) {
            $query = $this->db->get_where('booking_rooms', array('id' => $id));
        $rroom = $data['edit'] = $query->row_array();
       $comment= $data['edit']['comment'];
         
      

           $query = $this->db->get_where('booking_mhtwa', array('id' => $mhtwa));
                    $mhtwah = $query->row_array();
     
          $comment .=$mhtwah['text1']."|".$mhtwah['id']."|".$mhtwah['text5']. "##";
          
         $edit_data = array(
                'comment' => $comment,
            );
            $edit_data = $this->security->xss_clean($edit_data);
            $result = $this->db->where('id', $id);$this->booking->update('booking_rooms', $edit_data);
            $this->session->set_flashdata('msg', 'تم التعديل المحتوى بفضل الله!');
      redirect($_SERVER['HTTP_REFERER']);
     }

      public function checkmhtwa2($id,$mhtwa) {
            $query = $this->db->get_where('booking_rooms', array('id' => $id));
        $rroom = $data['edit'] = $query->row_array();
       $comment= $data['edit']['comment'];
         
      

           $query = $this->db->get_where('booking_mhtwa', array('id' => $mhtwa));
                    $mhtwah = $query->row_array();
     
          $comment = str_replace($mhtwah['text1']."|".$mhtwah['id']."|".$mhtwah['text5']. "##", '', $comment);
          
         $edit_data = array(
                'comment' => $comment,
            );
            $edit_data = $this->security->xss_clean($edit_data);
            $result = $this->db->where('id', $id);$this->booking->update('booking_rooms', $edit_data);
            $this->session->set_flashdata('msg', 'تم التعديل المحتوى بفضل الله!');
      redirect($_SERVER['HTTP_REFERER']);
     }
    public function mhtwaroom($room) {

        $query = $this->db->get_where('booking_rooms', array('id' => $room));
        $rroom = $data['edit'] = $query->row_array();


        $data['comment'] = explode("##", $data['edit']['comment']);
        $page = 1;
        $whr = "";


        $this->db->from('booking_mhtwa');
        if ($data['edit']['noa'] == 1)
            $this->db->where("text5!='3'");
        $max = 120;
        $data['all_count'] = ceil($this->db->count_all_results() / $max);




//echo print_r($this->db->last_query());
        $comment = null;
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


                if ($this->input->post('comment' . $i)) {
                    // $comment .= $this->input->post('comment' . $i) . "##";
                }

                if ($this->input->post('mhtwah' . $row['id']) or $this->input->post('mhtwahold' . $row['id'])) {
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
            if ($this->input->post('submit')) {

                $edit_data = array(
                    'comment' => $comment,
                );
                $edit_data = $this->security->xss_clean($edit_data);
                ///  $result = $this->db->where('id', $room);$this->booking->update('booking_rooms', $edit_data);
                $this->session->set_flashdata('msg', 'تم التعديل المحتوى بفضل الله!');

                //   echo $comment;
                // exit;     
            }
        }
        if ($_POST) {
            redirect(base_url('booking/' . $this->thispage . '/index/'));
            exit;
        }
        $data['title'] = 'المحتويات ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/mhtwaroom';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function mhtwaroom2($room) {

        $query = $this->db->get_where('booking_rooms', array('id' => $room));
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
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/mhtwaroom2';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function mhtwa($page = 1, $all = '') {


        $whr = "";
        if ($all)
            $whr = "";

        $this->db->from('booking_mhtwa');
        if ($whr)
            $this->db->where($whr);
        $max = 120;
        $data['all_count'] = ceil($this->db->count_all_results() / $max);




//echo print_r($this->db->last_query());


        for ($index = 1; $index < 8; $index++) {


            $this->db->from('booking_mhtwa');
            $this->db->order_by(' text5  ', 'decs');
            $this->db->order_by(' text8  ', 'decs');
            $this->db->order_by(' text1  ', 'decs');
            $this->db->where("text5=" . $index);
            $this->db->limit($max, ($max * $page) - $max);
            $data['all_groups' . $index] = $this->db->get()->result_array();
            $i = 0;
            foreach ($data['all_groups' . $index] as $row) {
                $data['all_groups'][$i]['noa'] = '';
                if ($row['text5'])
                    $data['all_groups' . $index][$i]['noa'] = $this->nao[$row['text5']];



                $data['all_groups' . $index][$i]['noa2'] = $this->nao2[3];
                if ($row['text8'])
                    $data['all_groups' . $index][$i]['noa2'] = $this->nao2[$row['text8']];



                $i++;
            }
        }
        $data['title'] = 'المحتويات ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/mhtwa';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function alledite($page = 1, $all = '') {


        $whr = "";
        if ($all)
            $whr = "";

        $this->db->from('booking_mhtwa');
        if ($whr)
            $this->db->where($whr);
        $max = 1000;
        $data['all_count'] = ceil($this->db->count_all_results() / $max);




//echo print_r($this->db->last_query());

        $this->db->from('booking_mhtwa');
        $this->db->order_by(' text5  ', 'decs');
        $this->db->order_by(' text8  ', 'decs');
        if ($whr)
            $this->db->where($whr);
        $this->db->limit($max, ($max * $page) - $max);
        $data['all_groups'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['all_groups'] as $row) {

            if ($this->input->post('text1' . $row['id'])) {
                $data['all_groups'][$i]['text1'] = $this->input->post('text1' . $row['id']);
                $data['all_groups'][$i]['text5'] = $this->input->post('text5' . $row['id']);
                $data['all_groups'][$i]['text6'] = $this->input->post('text6' . $row['id']);
                $data['all_groups'][$i]['text8'] = $this->input->post('text8' . $row['id']);
                $edit_data = array(
                    'text1' => $data['all_groups'][$i]['text1'],
                    'text5' => $data['all_groups'][$i]['text5'],
                    'text6' => $data['all_groups'][$i]['text6'],
                    'text8' => $data['all_groups'][$i]['text8'],
                );

                $edit_data = $this->security->xss_clean($edit_data);
                $result = $this->db->where('id', $row['id']);$this->booking->update('booking_mhtwa', $edit_data);
            }




            $i++;
        }
        $data['nao'] = $this->nao;
        $data['nao2'] = $this->nao2;
        $data['title'] = 'المحتويات ';
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/alledite';

        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function mhtwastat($page = 1, $noa = '', $id = '') {





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
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/mhtwastat';
        $data['page'] = $page;
        $data['id'] = $id;
        $data['thispage'] = $this->thispage;
        $data['noaroom'] = $this->noaroom;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function mhtwaprint($id, $noa) {

        $query = $this->db->get_where('booking_rooms', array('id' => $id));
        $data['room'] = $query->row_array();




        $comment = explode("##", $data['room']['comment']);
        $data['all_groups'] = array();
        $nao[1] = "الصالة";
        $nao[2] = " الماستر";
        $nao[3] = " الثانية";
        $nao[4] = " المطبخ";
        $nao[5] = "الحمام";
        $nao[6] = "حمام المساتر";
        $nao[7] = "الثالثة";

        $max = count($comment);
        // if ($max > 30)
        ///   $max = 24;
        for ($i = 0; $i < $max; $i++) {

            $commentsss = explode("|", $comment[$i]);
            if (isset($commentsss[1])) {


                $query = $this->db->get_where('booking_mhtwa', array('id' => $commentsss[1], 'text8' => $noa));

                $row = $query->row_array();
                if (isset($row['text1'])) {
                    $data['all_groups'][$i]['text1'] = $row['text1'];
                    $data['all_groups'][$i]['text2'] = $row['text2'];
                    $data['all_groups'][$i]['text3'] = $row['text3'];
                    $data['all_groups'][$i]['noa'] = '';
                    if ($row['text5'])
                        $data['all_groups'][$i]['noa'] = $nao[$row['text5']];
                    $query = $this->db->get_where('booking_mhtwah', array('text1' => $data['room']['name'], 'text2' => $row['id']));
                    $mhtwah = $query->row_array();
                    $data['all_groups'][$i]['com'] = '';
                    if (isset($commentsss[1]))
                        $data['all_groups'][$i]['com'] = $mhtwah['text3'];
                }
            }
        }







        $this->load->view('../controllers/booking/views/rooms/mhtwaprint', $data);


        //redirect(base_url() . 'booking/dashboard');  
    }

    public function addmhtwa() {
        $add = FALSE;

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text1-1', '', 'trim|required');
            //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {



                for ($count = 1; $count < 5; $count ++) {
                    if (($this->input->post('text1-' . $count))) {
                        $data = array(
                            'text1' => $this->input->post('text1-' . $count),
                            'text2' => $this->input->post('text2'),
                            'text6' => $this->input->post('text6-' . $count),
                            'text8' => $this->input->post('text8'),
                            'text5' => $this->input->post('text5'),
                        );
                        $data = $this->security->xss_clean($data);
                        $result = $this->booking->insert('booking_mhtwa', $data);
                    }
                }
                if ($result) {
                    $this->session->set_flashdata('msg', 'تم اضافة المحتوى بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/mhtwa/'));
                }
            }
        }


        if (!$add) {
            $data['title'] = 'اضافة محتوى';


            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/addmhtwa';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }
    
     
    public function editmhtwa($id) {

        $query = $this->db->get_where('booking_mhtwa', array('id' => $id));
        $data['edit'] = $query->row_array();


        if (!$data['edit']['text8'])
            $data['edit']['text8'] = 3;
        $data['edit']['checked'] = array('', '', '', '', '', '', '', '', '');
        $data['edit']['checked'][$data['edit']['text8']] = 'checked';

        $data['edit']['checked2'] = array('', '', '', '', '', '', '', '', '');
        $data['edit']['checked2'][$data['edit']['text5']] = 'checked';



        $add = FALSE;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text1', '', 'trim|required');
            $this->form_validation->set_rules('text6', '', 'trim|required');


            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {
                $comment = $this->input->post('comment');

                $add = TRUE;
                $edit_data = array(
                    'text1' => $this->input->post('text1'),
                    'text2' => $this->input->post('text2'),
                    'text6' => $this->input->post('text6'),
                    'text8' => $this->input->post('text8'),
                    'text5' => $this->input->post('text5'),
                );
                $edit_data = $this->security->xss_clean($edit_data);
                $result = $this->db->where('id', $id);$this->booking->update('booking_mhtwa', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل المحتوى بفضل الله!');
                    redirect(base_url('booking/' . $this->thispage . '/mhtwa/'));
                }
            }
        }


        if (!$add) {










            $data['title'] = 'تعديل  المحتوى';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/editmhtwa';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function delmhtwa($id) {




        $this->db->where('id', $id);
        $result = $this->booking->delete('booking_mhtwa');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم حذف  المحتوى بفضل الله!');
            redirect(base_url('booking/rooms/mhtwa/'));
        }
    }

}

?>