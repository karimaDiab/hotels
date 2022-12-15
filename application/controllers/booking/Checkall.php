<?php


defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );


class Checkall extends MY_Controller {


  var $thispage;

  var $user;

  var $data_day, $urlboo;


  public function __construct() {

    parent::__construct();

    $this->load->model( 'booking' );

    $this->user = $this->session->userdata( 'name' );

    $this->data_day = $this->booking->data_day();

    $this->thispage = "checkall";


    $this->urlboo = '1';


    if ( @stristr( $_SERVER[ 'REQUEST_URI' ], 'booking2' ) )

      $this->urlboo = '2';

    if ( @stristr( $_SERVER[ 'REQUEST_URI' ], 'booking4' ) )

      $this->urlboo = '4';

    if ( @stristr( $_SERVER[ 'REQUEST_URI' ], 'booking5' ) )

      $this->urlboo = '5';

    if ( @stristr( $_SERVER[ 'REQUEST_URI' ], 'booking6' ) )

      $this->urlboo = '6';

    if ( @stristr( $_SERVER[ 'REQUEST_URI' ], 'booking7' ) )

      $this->urlboo = '7';

    if ( @stristr( $_SERVER[ 'REQUEST_URI' ], 'booking8' ) )

      $this->urlboo = '8';

    if ( @stristr( $_SERVER[ 'REQUEST_URI' ], 'booking9' ) )

      $this->urlboo = '9';

  }


  public function index() {
    $this->all( 1 );

  }
  public function all( $page = 1, $all = '' ) {
    $whr = "";

    if ( $all )

      $whr = "";
	
	  
    $this->db->from( 'booking_checkall' );

    if ( $whr )

      $this->db->where( $whr );

    $max = 30;

    $data[ 'all_count' ] = ceil( $this->db->count_all_results() / $max );
    $this->db->from( 'booking_checkall' );
    $this->db->order_by('DATE(booking_checkall.text2) ');
    $this->db->group_by('text1,DATE(booking_checkall.text2) ');
 //$this->db->group_by('DATE(booking_checkall.text2)');
    if ( $whr )

      $this->db->where( $whr );

    $this->db->limit( $max, ( $max * $page ) - $max );

    $data[ 'all_groups' ] = $this->db->get()->result_array();

    foreach ( $data[ 'all_groups' ] as $row ) {

      //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();

    }

    $data[ 'title' ] = 'الشقق ';

    $data[ 'view' ] = '../controllers/booking/views/' . $this->thispage . '/all';


    $data[ 'thispage' ] = $this->thispage;

    $this->load->view( '../controllers/booking/views/layout', $data );

  }

  public function add_check() {
    if ( isset( $_POST[ 'submit' ] ) && $_POST[ 'submit' ] && $_POST[ 'submit' ] == 'pl' ) {
      $type_id = $this->input->post( 'type_id' );
      if ( $type_id != '' ) {
        redirect( base_url( 'booking/' . $this->thispage . '/add_check?type_id=' . $type_id ) );
      }
    } else if ( !empty( $_POST ) ) {


      $query = $this->db->get_where( 'booking_checkall', array( 'text1' => $this->user, 'text2' => $this->data_day ) );

      $data[ 'edit' ] = $query->row_array();

      $query = $this->db->get_where( 'questions', array( 'type_id' => $_POST[ 'type_id' ] ) );
      $ques = $query->result_array();
		$arr = array();
		$arr_ids=array();
		$count=count($ques);
      for ( $i=0;$i<$count;$i++ ) {
		array_push($arr_ids,$ques[$i][ 'id' ]);  
	    $question = 'question_' . $ques[$i][ 'id' ];
        $img = 'image_' . $ques[$i][ 'id' ];
        $choose = 'choose_' . $ques[$i][ 'id' ];
        $note = 'note_' . $ques[$i][ 'id' ];
        $this->load->library( 'upload' );
        $file1 = $this->input->post( $img );
    
                $file1 = $this->input->post('file1');
                $folder = '../allcid/' . date("Ym") . "/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $source = $file1;
                if (file_exists($source)) {
                    $file = basename($source);

                    if (copy($source, $folder . $file)) {
                        $file1 = $folder . $file;
                        unlink($source);
                    }
                }

		  
        $fieldname = $img;
        if ( $_FILES[ $fieldname ][ 'name' ] != "" ) {
          if ( $fieldname )
            $upload_data = $this->booking->upload_many_photos( $fieldname, '' );
        }
		       $obj['choose_' . $ques[$i][ 'id' ]]= $this->input->post($choose);
			   $obj[ 'image_' . $ques[$i][ 'id' ]]=    $upload_data['file_name'];
		       $obj[ 'note_' . $ques[$i][ 'id' ]]=   $this->input->post($note);
		       $obj[ 'question_' . $ques[$i][ 'id' ]]= $this->input->post($question);   
           $cr=  count(array_keys($arr_ids, $ques[$i][ 'id' ]));
		      if( $cr==1){
				     array_push($arr,$obj);	  
			  }
		  else {
			  continue;
		  }
		    
      }
   $myLastElement = $arr[array_key_last($arr)];
   $data1 = json_encode($myLastElement);
      $data = array(

        'text1' => $this->session->userdata('admin_id'),

        'text2' => date('Y/m/d'),

        'text3' => date( "H:i", $this->booking->tissme_now() ),

        'text4' => $data1,

        'type_id' => $_POST[ 'type_id' ]

      );

      $data = $this->security->xss_clean( $data );

      $result = $this->booking->insert( 'booking_checkall', $data );

      $this->session->set_flashdata( 'msg', 'تم الاضافة    بفضل الله!' );

      redirect( base_url( 'booking/checkall' ) );
    } else {

      $types = $this->db->get( 'check_types' )->result_array();
      $data[ 'types' ] = $types;
      $data[ 'title' ] = 'اضافة تفتيش';

      $data[ 'thispage' ] = $this->thispage;

      $data[ 'view' ] = '../controllers/booking/views/' . $this->thispage . '/add';

      $this->load->view( '../controllers/booking/views/layout', $data );
    }


  }
  public function add() {


    $query = $this->db->get_where( 'booking_checkall', array( 'text1' => $this->user, 'text2' => $this->data_day ) );

    $data[ 'edit' ] = $query->row_array();

    if ( !$data[ 'edit' ][ 'text1' ] )

    {

      $data = array(

        'text1' => $this->user,

        'text2' => $this->data_day,

        'text3' => date( "H:i", $this->booking->tissme_now() ),

      );

      $data = $this->security->xss_clean( $data );

      $result = $this->booking->insert( 'booking_checkall', $data );


      // $this->load->view('../controllers/booking/views/' . $this->thispage . '/add', $data);

      //redirect(base_url('booking/' . $this->thispage . '/index/'));

    } else

    {

      $edit_data = array(

        'text3' => date( "H:i", $this->booking->tissme_now() ),


      );

      $edit_data = $this->security->xss_clean( $edit_data );

      $result = $this->db->where( 'id', $data[ 'edit' ][ 'id' ] );
      $this->booking->update( 'booking_checkall', $edit_data );


      redirect( base_url( 'booking/' . $this->thispage . '/index/' ) );


    }

    $query = $this->db->get_where( 'booking_checkall', array( 'text1' => $this->user, 'text2' => $this->data_day ) );

    $data[ 'show' ] = $query->row_array();


    $this->db->from( 'booking_rooms' )->where( "  conter=1 " );

    $data[ 'all_rooms_1' ] = $this->db->count_all_results();


    $this->db->from( 'booking_rooms' )->where( "  conter=2 " );

    $data[ 'all_rooms_2' ] = $this->db->count_all_results();


    $whr = " datetext4 = '" . $this->data_day . "' ";


    $this->db->from( 'booking' );

    $this->db->order_by( 'id', 'desc' );

    $this->db->where( $whr );

    $data[ 'all_groups' ] = $this->db->get()->result_array();

    $i = 0;

    foreach ( $data[ 'all_groups' ] as $row ) {


      $query = $this->db->get_where( 'booking_clints', array( 'cid' => $row[ 'cid' ] ) );

      $clints = $query->row_array();

      $data[ 'all_groups' ][ $i ][ 'cidimage' ] = 'no';

      if ( $row[ 'timeend2' ] )

        $data[ 'all_groups' ][ $i ][ 'timeend' ] = $row[ 'timeend2' ];

      if ( $clints[ 'file1' ]or $clints[ 'file2' ] ) {

        $data[ 'all_groups' ][ $i ][ 'cidimage' ] = 'ok';

      }


      $i++;

    }

    //    $this->load->view('../controllers/booking/views/' . $this->thispage . '/add', $data);


  }
  public function rooms( $dateday = 1, $all = '' ) {


    if ( $dateday )$this->data_day = $dateday;


    $whr = "";

    if ( $all )

      $whr = "";


    $this->db->from( 'booking_rooms' );

    if ( $whr )

      $this->db->where( $whr );

    $max = 35;

    $data[ 'all_count' ] = ceil( $this->db->count_all_results() / $max );


    //echo print_r($this->db->last_query());


    $this->db->from( 'booking_rooms' );

    $this->db->order_by( 'id', 'asc' );

    if ( $whr )

      $this->db->where( $whr );

    //$this->db->limit($max, ($max * $page) - $max);

    $data[ 'all_groups' ] = $this->db->get()->result_array();

    //  echo count($data['all_groups'] );

    foreach ( $data[ 'all_groups' ] as $row ) {

      //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();

    }

    $data[ 'title' ] = 'الشقق ';

    $data[ 'view' ] = '../controllers/booking/views/' . $this->thispage . '/rooms';


    $data[ 'thispage' ] = $this->thispage;

    $this->load->view( '../controllers/booking/views/layout', $data );

  }


  public function show( $id ) {


    $query = $this->db->get_where( 'booking_checkall', array( 'id' => $id ) );

  $data['all_groups'] = $query->row_array();
    $data[ 'title' ] = 'عرض  تفتيش';
    $data[ 'thispage' ] = $this->thispage;
   $type_id=$data['all_groups']['type_id'];
	  $query = $this->db->get_where('questions', array('type_id' => $type_id));
       $ques = $query->result_array();
	  
	  $data['questions']=$ques;
	  $this->load->view('../controllers/booking/views/' . $this->thispage . '/show', $data);

/*
        foreach ($data['all_groups'] as $row) {
            $data['row'] = $row;
            $data['row']['all'] = $this->sum_bill("text19='" . $row['text2'] . "' and    text20='modif' and `dateadd` LIKE '%" . $this->thismon . "%'", "text1");

            $this->load->view('../controllers/ltef/views/' . $this->thispage . '/kshaf', $data);



            $i++;
        }
    */
	  
  }
   public function edit($id) {

        if ( !empty( $_POST ) ) {
            $query = $this->db->get_where( 'questions', array( 'type_id' => $_POST[ 'type_id' ] ) );
      $ques = $query->result_array();
		$arr = array();
		$arr_ids=array();
		$count=count($ques);
      for ( $i=0;$i<$count;$i++ ) {
		array_push($arr_ids,$ques[$i][ 'id' ]);  
	    $question = 'question_' . $ques[$i][ 'id' ];
        $img = 'image_' . $ques[$i][ 'id' ];
        $img2 = 'image2_' . $ques[$i][ 'id' ];
        $choose = 'choose_' . $ques[$i][ 'id' ];
        $note = 'note_' . $ques[$i][ 'id' ];
        $this->load->library( 'upload' );
        $file1 = $this->input->post( $img );
    
                $file1 = $this->input->post('file1');
                $folder = '../allcid/' . date("Ym") . "/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $source = $file1;
                if (file_exists($source)) {
                    $file = basename($source);

                    if (copy($source, $folder . $file)) {
                        $file1 = $folder . $file;
                        unlink($source);
                    }
                }

		  
        $fieldname = $img;
        if ( $_FILES[ $fieldname ][ 'name' ] != "" ) {
          if ( $fieldname )
            $upload_data = $this->booking->upload_many_photos( $fieldname, '' );
      
             $obj['choose_' . $ques[$i][ 'id' ]]= $this->input->post($choose);
              $obj[ 'image_' . $ques[$i][ 'id' ]]=    $upload_data['file_name'];
		       $obj[ 'note_' . $ques[$i][ 'id' ]]=   $this->input->post($note);
		       $obj[ 'question_' . $ques[$i][ 'id' ]]= $this->input->post($question);   
        
        }
         else {
             $obj['choose_' . $ques[$i][ 'id' ]]= $this->input->post($choose);
             $obj[ 'image_' . $ques[$i][ 'id' ]]=  $this->input->post($img2);
		     $obj[ 'note_' . $ques[$i][ 'id' ]]=   $this->input->post($note);
		     $obj[ 'question_' . $ques[$i][ 'id' ]]= $this->input->post($question);   
         } 
		       
           $cr=  count(array_keys($arr_ids, $ques[$i][ 'id' ]));
		      if( $cr==1){
				     array_push($arr,$obj);	  
			  }
		  else {
			  continue;
		  }
		    
      }
 $myLastElement = $arr[array_key_last($arr)];
   $data1 = json_encode($myLastElement);
      $data = array(

        'text1' => $this->user,

        'text2' => date('Y/m/d'),

        'text3' => date( "H:i", $this->booking->tissme_now() ),

        'text4' => $data1,

        'type_id' => $_POST[ 'type_id' ]

      );

      $data = $this->security->xss_clean( $data );

                      $this->db->where('id', $id);
                    $this->booking->update('booking_checkall', $data);
            
      $this->session->set_flashdata( 'msg', 'تم التعديل بفضل الله!' );

      redirect( base_url( 'booking/checkall' ) );
            
            
        }
       else {
 $types = $this->db->get( 'check_types' )->result_array();
      $data[ 'types' ] = $types;

        $query = $this->db->get_where('booking_checkall', array('id' => $id));

        $data['edit'] = $query->row_array();
        $data['title'] = 'تعديل  تفتيش';
       $data['thispage'] = $this->thispage;
       $data['view'] = '../controllers/booking/views/' . $this->thispage . '/edit';
  $type_id=$data['edit']['type_id'];
	  $query = $this->db->get_where('questions', array('type_id' => $type_id));
       $ques = $query->result_array();
	  
	  $data['questions']=$ques;
            $this->load->view('../controllers/booking/views/layout', $data);

        }
       
   }
    


  public function del( $id ) {


    $this->db->where( 'id', $id );

    $result = $this->booking->delete( 'booking_checkall' );

    if ( count( $result ) > 0 ) {

      $this->session->set_flashdata( 'msg', 'تم حذف  القسم بفضل الله!' );

      redirect( base_url( 'booking/checkall/' ) );

    }

  }


}


?>