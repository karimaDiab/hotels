<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modif extends MY_Controller {

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
        $this->thispage = "modif";
        $this->thismon = date('Ym', $this->booking->tissme_now());

//  if(!$this->session->userdata('group') and ! $this->session->userdata('editor')){
//            echo "لايمكن الاستخدام ";
//               $this->session->set_flashdata('msg', 'لايمكن التعديل عليه');
//            ///echo $_SERVER['HTTP_REFERER'];
//            
//             redirect($_SERVER['HTTP_REFERER']);
//            exit;
//        }

        $this->nao[1] = "ايراد";
        $this->nao[2] = "مصروفات";
        $this->nao[3] = "سلفة";
        $this->nao[4] = "استرجاع سلفة";
        $this->nao[5] = "تصدير";
    }

    public function index() {

        $this->all();
    }

    function sum_bill($catid, $tbl) {
        $this->db->select_sum($tbl);
        $this->db->where(" $catid ");
        $query = $this->db->get('model_modif')->row_array();
        if (!$query[$tbl])
            $query[$tbl] = 0;
        return $query[$tbl];
    }

    public function all($mon = '', $catid = '') {

      
       
        
          $dbhost = "localhost"; // الخادم
        $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
        $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
        $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
        
//         $dbuser = "root";  // إسم مستخدم قاعدة البيانات
//  $dbpass = "root";     // باسويرد قاعدة البيانات
//$dbname = "mktba2018"; // إسم قاعدة البيانات
        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
            $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            // $mysqli22 = new mysqli("localhost", "root", "root", "chang");
            mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
            mysqli_query($mysqli22, "SET NAMES utf8");
            
             $ssss = 2;
            
            if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {
            
                $ssss = 1;
            }

            if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {
           
                $ssss = 3;
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {
                
                $ssss = 4;
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {

                $ssss = 5;
            }
            ///and text21='$ssss' 
$arraystat=mysqli_query($mysqli22,"select * from  `model_modif` where  text20!='modif' and text22!='1' and text21='$ssss'   order by text1  asc  ");     
  ///   $data['modif']=mysqli_fetch_array($arraystat);
 ///$data['modif']=mysqli_fetch_array($arraystat);
       
     $i = 0;
 $data['all_groups']=array();
     while($rowaa=mysqli_fetch_array($arraystat))
{  
          if($rowaa['text1']!="المصبغة")
          {
              
               if ($this->input->post('text10' . $rowaa['id'])) {
                   
                   $rowaa['text10'] =$this->input->post('text10' . $rowaa['id']);  
                   $rowaa['text6'] =$this->input->post('text6' . $rowaa['id']);  
                   $rowaa['text7'] =$this->input->post('text7' . $rowaa['id']);  
                                      $rowaa['text21'] =$this->input->post('text21' . $rowaa['id']);  
                   
                   
                   
                   mysqli_query($mysqli22,"update model_modif set text7='".$rowaa['text7']."',text21='".$rowaa['text21']."',text8='".$rowaa['text8']."',text10='".$rowaa['text10']."' where id='".$rowaa['id']."' ")or die('ddd');
                   
                   
                   
               }
              
            
              
                 $data['all_groups'][$i]['id']= $rowaa['id'];
      $data['all_groups'][$i]['text1']= $rowaa['text1'];
      $data['all_groups'][$i]['text6']= $rowaa['text6'];
          $data['all_groups'][$i]['text7']= $rowaa['text7'];
                $data['all_groups'][$i]['text10']= $rowaa['text10'];
                       $data['all_groups'][$i]['text21']= $rowaa['text21'];
          $data['all_groups'][$i]['text2']= $rowaa['text2'];
     ///  $rowaa['dateadd'];
         $i++;
          }
     }
       
         }


        $data['title'] = 'Dashboard';

        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';
        $data['thispage'] = $this->thispage;
        $this->load->view('../controllers/booking/views/layout', $data);
    }

    public function salary($mon = '', $catid = '') {

        // $this->add_another_db();


        if (!$this->session->userdata('group')) {
            $mon = '';
            $catid = '';
        }
        if ($mon)
            $this->thismon = $mon;


        $whr = "  text20!='modif'";


        //  $data['all_bill1'] = $this->sum_bill('1  and ' . $whr);
        //  $data['all_bill2'] = $this->sum_bill('2  and text3!=1 and ' . $whr);
        //  $data['all_bill5'] = $this->sum_bill('5 and ' . $whr);

        $this->db->from('model_modif');
        if ($whr)
            $this->db->where($whr);
        $max = 10000;
        $data['all_count'] = $this->db->count_all_results();

        $data['pages'] = ceil($data['all_count'] / $max) + 1;

//$data['all_count']=20;
//echo print_r($this->db->last_query());

        $this->db->from('model_modif');
        $this->db->order_by('text15', 'asc');
        $this->db->order_by('text4', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit(1);
        $data['all_groups'] = $this->db->get()->result_array();



        $i = 0;
        foreach ($data['all_groups'] as $row) {
            $data['row'] = $row;
            $data['row']['all'] = $this->sum_bill("text19='" . $row['text2'] . "' and    text20='modif' and `dateadd` LIKE '%" . $this->thismon . "%'", "text1");

            $this->load->view('../controllers/booking/views/' . $this->thispage . '/salary', $data);



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

                
    
      
      
      $dbhost = "localhost"; // الخادم
        $dbuser = "kuwaityc_book";  // إسم مستخدم قاعدة البيانات
        $dbpass = "Qaz*123123";     // باسويرد قاعدة البيانات
        $dbname = "kuwaityc_ltef"; // إسم قاعدة البيانات
        
        
//           $dbuser = "root";  // إسم مستخدم قاعدة البيانات
//       $dbpass = "root";     // باسويرد قاعدة البيانات
//     $dbname = "mktba2018"; // إسم قاعدة البيانات
        if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
            $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            // $mysqli22 = new mysqli("localhost", "root", "root", "chang");
            mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
            mysqli_query($mysqli22, "SET NAMES utf8");
            
            

  $ssss = 2;
            
            if (@stristr($_SERVER['REQUEST_URI'], 'booking2')) {
            
                $ssss = 1;
            }

            if (@stristr($_SERVER['REQUEST_URI'], 'booking4')) {
           
                $ssss = 3;
            }
             if (@stristr($_SERVER['REQUEST_URI'], 'booking5')) {
                
                $ssss = 4;
            } if (@stristr($_SERVER['REQUEST_URI'], 'booking6')) {

                $ssss = 5;
            }
 $result =mysqli_query($mysqli22,"insert model_modif set text1='".$this->input->post('text1')."',text11='".$this->input->post('text11')."',text3='".$this->input->post('text3')."',text4='".$this->input->post('text4')."',text14='".$this->input->post('text14')."',text2='".$this->input->post('text2')."',text13='".$this->input->post('text13')."',text12='".$this->input->post('text12')."',text15='".$this->input->post('text15')."',text6='".$this->input->post('text6')."',text10='".$this->input->post('text10')."',text22='2',text20='',text21='$ssss' ")or die(mysqli_error($mysqli22)); 
            
        }

                $add = TRUE;
              
                if ($result) {
           
                        $this->session->set_flashdata('msg', 'تم اضافة الموظف بفضل الله!');
                        redirect(base_url('booking/modif/'));
                    
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

            $query = $this->db->get_where('model_modif', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة موظف';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

      public function addsalf() {
        $add = FALSE;


        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('text1', '', 'trim|required');
           //	$this->form_validation->set_rules('comment', '', 'trim|required'); 
            //	$this->form_validation->set_rules('comm', '', 'trim|required'); 

            if ($this->form_validation->run() === FALSE) {

                $add = FALSE;
            } else {

$text2=$this->input->post('no3')."       ".$this->input->post('text9');
                $add = TRUE;
                $data = array(
                    'text1' => $this->input->post('text1'),
                    'text11' => $this->input->post('text11'),
                    'text3' => $this->input->post('text3'),
                    'text4' => $this->input->post('text4'),
                    'text14' => $this->input->post('text14'),
                    'text2' => $text2,
                    'text13' => $this->input->post('text13'),
                    'text12' => $this->input->post('text12'),
                    'text15' => $this->input->post('text15'),
                    'text6' => $this->input->post('text6'),
                    'text7' => $this->input->post('text7'),
                        'text19' => $this->input->post('text19'),
                   
                          'text10' => $this->input->post('text10'),
                    'text20' => 'modif',
                     'dateadd' => $this->data_day,
                    
                    
                );
                $data = $this->security->xss_clean($data);









                $result = $this->booking->insert('model_modif', $data);
                if ($result) {
                    if ($this->input->post('cash') and $this->input->post('endbill')) {

                        /// if ($this->booking->data_day(13) != $this->data_day)
                        $this->add_another_db();

                        redirect(base_url('booking/bills/endbill/' . $this->data_day));
                    } else {
                        $this->session->set_flashdata('msg', 'تم اضافة السلف بفضل الله!');
                        redirect(base_url('booking/modif/'));
                    }
                }
            }
        }


        if (!$add) {






//$data['cats_select']  = $this->db->get()->result_array(); 

             $whr = "  text20!='modif'";
        $this->db->from('model_modif');
        $this->db->order_by('text15', 'asc');
        $this->db->order_by('text4', 'desc');
        if ($whr)
            $this->db->where($whr);
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();

            $query = $this->db->get_where('model_modif', array('id' => '100000000000'));
            $data['edit'] = $query->row_array();
            $data['title'] = 'اضافة موظف';
            $data['thispage'] = $this->thispage;
            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/addsalf';
            $this->load->view('../controllers/booking/views/layout', $data);
        }
    }

    public function del($id) {


        $this->db->where('id', $id);
        $result = $this->booking->delete('model_modif');
        if (count($result) > 0) {
            $this->session->set_flashdata('msg', 'تم الحذف   بفضل الله!');
            redirect(base_url('booking/modif/'));
        }
    }

    public function edit($id) {

        $query = $this->db->get_where('model_modif', array('id' => $id));
        $data['edit'] = $query->row_array();
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
                    'text7' => $this->input->post('text7'),
                                'text19' => $this->input->post('text19'),
                     'text2' => $this->input->post('text2'),
                          'text10' => $this->input->post('text10'),
                );
                $edit_data = $this->security->xss_clean($edit_data);



                $result = $this->db->where('id', $id);$this->booking->update('model_modif', $edit_data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'تم التعديل الموظف بفضل الله!');
                    redirect(base_url('booking/modif/'));
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

    public function show($id) {

        $query = $this->db->get_where('model_modif', array('id' => $id));
        $data['show'] = $query->row_array();
        // $data['show']['catid'] = $this->nao[$data['show']['catid']];

        $add = FALSE;




        $this->db->from('model_modif');
       $this->db->order_by('id', 'desc');

        $this->db->where("text19='" . $data['show']['text2'] . "' and    text20='modif' ");
        
//$this->db->limit($max, ($max*$page)-$max);
        $data['all_groups'] = $this->db->get()->result_array();




        $data['title'] = 'عرض فاتورة ';

        $data['thispage'] = $this->thispage;
        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/show';
        $this->load->view('../controllers/booking/views/layout', $data);
    }

}

?>