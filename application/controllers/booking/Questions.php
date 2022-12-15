<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Questions extends MY_Controller {



    var $thispage;

    var $user;

    var $data_day, $urlboo;



    public function __construct() {

        parent::__construct();

        $this->load->model('booking');

        $this->user = $this->session->userdata('name');

        $this->data_day = $this->booking->data_day();

        $this->thispage = "questions";

        

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

            if (@stristr($_SERVER['REQUEST_URI'], 'booking9'))

            $this->urlboo = '9';

    }



    public function index() {



        $this->all(1);

    }



    public function all($page = 1, $all = '') {

       $types = $this->db->get('check_types')->result_array();
$data['types']=$types;

        $whr = "";

        if ($all)

            $whr = "";


		if(isset($_GET['type'])){
			$whr.=" type_id=".$_GET['type'] ;
		}


        $this->db->from('questions');

        if ($whr)

            $this->db->where($whr);

        $max = 30;

        $data['all_count'] = ceil($this->db->count_all_results() / $max);

        $this->db->from('questions');

        $this->db->order_by('id', 'desc');

        if ($whr)

            $this->db->where($whr);

        $this->db->limit($max, ($max * $page) - $max);

        $all_groups = $this->db->get()->result_array();

	$arr=array();
        foreach ( $all_groups as $row) {      
	      $get_type = $this->db->get_where('check_types', array("id" => $row['type_id']))->row_array();
		  $row['type_value']=$get_type['name'];
			array_push($arr,$row);
        }
        $data['all_groups']=$arr;
		if(isset($_GET['type'])){
			$data['type']=$_GET['type'];
		$get_type = $this->db->get_where('check_types', array("id" => $_GET['type']))->row_array();
          $data['type_name']=$get_type['name'];
		}
		else { $data['type_name']='تفتيش';}
        $data['title'] = 'أسئلة التفتيش ';

        $data['view'] = '../controllers/booking/views/' . $this->thispage . '/all';



        $data['thispage'] = $this->thispage;

        $this->load->view('../controllers/booking/views/layout', $data);

    }
    public function add() {
 if (!empty($_POST)) {
     $edit_data = array(
                    'type_id' => $this->input->post('type_id'),
                    'text' => $this->input->post('text')

                );
    $edit_data = $this->security->xss_clean($edit_data);

    $result = $this->booking->insert('questions', $edit_data);
        
            $this->session->set_flashdata('msg', 'تم الحفظ  بفضل الله!');

      redirect(base_url('booking/' . $this->thispage )); 
   }
	
   else {
             $types = $this->db->get('check_types')->result_array();
             $data['types']=$types;
             $data['title'] = 'اضافة  سؤال';

            $data['thispage'] = $this->thispage;

            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/add';

            $this->load->view('../controllers/booking/views/layout', $data);
		}
        }
  

    public function edit($id) {
if (!empty($_POST)) {
     $edit_data = array(

                    'text' => $this->input->post('text')

                );
    $edit_data = $this->security->xss_clean($edit_data);

    $result = $this->db->where('id', $id);$this->booking->update('questions', $edit_data);
        
            $this->session->set_flashdata('msg', 'تم التعديل  بفضل الله!');

      redirect(base_url('booking/' . $this->thispage )); 
   }
	
   else {
        $query = $this->db->get_where('questions', array('id' => $id));

        $data['edit'] = $query->row_array();
          $data['title'] = 'تعديل  سؤال';

             $types = $this->db->get('check_types')->result_array();
             $data['types']=$types;
            $data['thispage'] = $this->thispage;

            $data['view'] = '../controllers/booking/views/' . $this->thispage . '/edit';

            $this->load->view('../controllers/booking/views/layout', $data);
		}
        }

    



    public function del($id) {



        $this->db->where('id', $id);

        $result = $this->booking->delete('questions');

        if (count($result) > 0) {

            $this->session->set_flashdata('msg', 'تم حذف  السؤال بفضل الله!');

            redirect(base_url('booking/questions'));

        }

    }



   



  

}



?>