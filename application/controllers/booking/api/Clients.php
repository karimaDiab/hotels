<?php



require APPPATH . 'libraries/Rest_Controller.php';



// error_reporting(E_ERROR);



class clients extends Rest_Controller{



    public function __construct() {

        parent::__construct();

           

        date_default_timezone_set('Asia/Kuwait');

    }

	  

   function restful($data){



    header('Content-type: application/json');



    echo json_encode($data);



}

    public function  clientdetail_get(){



	//	

      $searchfor=$this->get('phone');

                $whr = " mobile = '" . $searchfor . "'";

            $data['all_groups'] = array();

            $data['all_cid'] = array();







                        $dbhost = "localhost"; // ??????

                        $dbuser = "book_1";  // ??? ?????? ????? ????????

                        $dbpass = "%9?,Jcj5SZq8";     // ??????? ????? ????????

                        $dbname = "book_1"; // ??? ????? ????????





            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية

                mysqli_query($mysqli1, "SET NAMES utf8");



                $array1 = mysqli_query($mysqli1, "select name,mobile,country from booking_clints       where  $whr ");

				

                while ($Ads = @mysqli_fetch_array($array1)) {

					

					

          $data['all_groups']['name']=  $Ads['name'];

          $data['all_groups']['mobile']=  $Ads['mobile'];

          $data['all_groups']['country']=  $Ads['country'];

				

                    

                }

		if($data['all_groups']){

          return $this->response(['status' => TRUE,'data'=>$data['all_groups']], REST_Controller::HTTP_OK);
		}
		else {
			
	      return $this->response(['status' => FALSE,'data'=>[]], REST_Controller::HTTP_NOT_FOUND);

		}		

            }







                $dbhost = "localhost"; // ??????

                $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????

                $dbpass = "Qaz*123123";     // ??????? ????? ????????

                $dbname = "kuwaityc_booking2"; // ??? ????? ????????





            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية

                mysqli_query($mysqli1, "SET NAMES utf8");



                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");



                while ($Ads = @mysqli_fetch_array($array1)) {

if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile'];

                    if (in_array($Ads['cid'], $data['all_cid'])) {



                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book2'] = mysqli_num_rows($www);



                        $data['all_groups'][$Ads['cid']]['id2'] = $Ads['id'];



                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];

                    } else {

                        $data['all_cid'][] = $Ads['cid'];

                        $data['all_groups'][$Ads['cid']] = $Ads;

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book2'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['book1'] = 0;

                        $data['all_groups'][$Ads['cid']]['book3'] = 0;

                        $data['all_groups'][$Ads['cid']]['book4'] = 0;

                       $data['all_groups'][$Ads['cid']]['book6'] = 0;







                        $data['all_groups'][$Ads['cid']]['mobile2'] = $Ads['mobile'];

                        $data['all_groups'][$Ads['cid']]['mobile1'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';

                        $data['all_groups'][$Ads['cid']]['id2'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['id1'] = '';

                        $data['all_groups'][$Ads['cid']]['id3'] = '';

                        $data['all_groups'][$Ads['cid']]['id4'] = '';  $data['all_groups'][$Ads['cid']]['id5'] = '';

                          $data['all_groups'][$Ads['cid']]['id6'] = '';

                               $data['all_groups'][$Ads['cid']]['book7'] = 0;

                                 $data['all_groups'][$Ads['cid']]['id7'] = ''; 

                         $data['all_groups'][$Ads['cid']]['mobile7'] = '';                      $data['all_groups'][$Ads['cid']]['book5'] = 0;

                                                        $data['all_groups'][$Ads['cid']]['mobile5'] = '';

                                                        $data['all_groups'][$Ads['cid']]['mobile6'] = '';

                    }



                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];

                }

            }





                        $dbhost = "localhost"; // ??????

                        $dbuser = "kuwaityc_book";  // 

                        $dbpass = "Qaz*123123";     // 

                        $dbname = "kuwaityc_booking4"; // 





            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية

                mysqli_query($mysqli1, "SET NAMES utf8");



                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");



                while ($Ads = @mysqli_fetch_array($array1)) {

if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile'];

                    if (in_array($Ads['cid'], $data['all_cid'])) {



                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book3'] = mysqli_num_rows($www);



                        $data['all_groups'][$Ads['cid']]['id3'] = $Ads['id'];



                        $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];

                    } else {

                        $data['all_cid'][] = $Ads['cid'];

                        $data['all_groups'][$Ads['cid']] = $Ads;

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book3'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['book1'] = 0;

                        $data['all_groups'][$Ads['cid']]['book2'] = 0;

                        $data['all_groups'][$Ads['cid']]['book4'] = 0;

     $data['all_groups'][$Ads['cid']]['book6'] = 0;



                        $data['all_groups'][$Ads['cid']]['mobile3'] = $Ads['mobile'];

                        $data['all_groups'][$Ads['cid']]['mobile1'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';



                        $data['all_groups'][$Ads['cid']]['id3'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['id1'] = '';

                        $data['all_groups'][$Ads['cid']]['id2'] = '';

                        $data['all_groups'][$Ads['cid']]['id4'] = '';  $data['all_groups'][$Ads['cid']]['id5'] = '';

                            $data['all_groups'][$Ads['cid']]['id6'] = '';

                    $data['all_groups'][$Ads['cid']]['book7'] = 0;

                                 $data['all_groups'][$Ads['cid']]['id7'] = ''; 

                         $data['all_groups'][$Ads['cid']]['mobile7'] = '';                                $data['all_groups'][$Ads['cid']]['book5'] = 0;

                                                        $data['all_groups'][$Ads['cid']]['mobile5'] = '';

                                                                           $data['all_groups'][$Ads['cid']]['mobile6'] = '';

                    }



                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];

                }

            }





            $dbhost = "localhost"; // ??????

 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������

$dbpass="Qaz*123123";     // ������� ����� ��������

$dbname="kuwaityc_booking5"; // ��� ����� ��������





            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية

                mysqli_query($mysqli1, "SET NAMES utf8");



                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");



                while ($Ads = @mysqli_fetch_array($array1)) {

if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile'];

                    if (in_array($Ads['cid'], $data['all_cid'])) {



                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book4'] = mysqli_num_rows($www);



                        $data['all_groups'][$Ads['cid']]['id4'] = $Ads['id'];



                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];

                    } else {

                        $data['all_cid'][] = $Ads['cid'];

                        $data['all_groups'][$Ads['cid']] = $Ads;

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book4'] = mysqli_num_rows($www);

                        $data['all_groups'][$Ads['cid']]['book1'] = 0;

                        $data['all_groups'][$Ads['cid']]['book2'] = 0;

                        $data['all_groups'][$Ads['cid']]['book3'] = 0;

      $data['all_groups'][$Ads['cid']]['book6'] = 0;



                        $data['all_groups'][$Ads['cid']]['mobile4'] = $Ads['mobile'];

                        $data['all_groups'][$Ads['cid']]['mobile1'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';



                        $data['all_groups'][$Ads['cid']]['id4'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['id1'] = '';

                        $data['all_groups'][$Ads['cid']]['id2'] = '';

                        $data['all_groups'][$Ads['cid']]['id3'] = '';

                                      $data['all_groups'][$Ads['cid']]['id5'] = '';

                                          $data['all_groups'][$Ads['cid']]['id6'] = '';

                   

                                                   $data['all_groups'][$Ads['cid']]['book5'] = 0;

                                                        $data['all_groups'][$Ads['cid']]['mobile5'] = '';

                                                        

                                                                           $data['all_groups'][$Ads['cid']]['mobile6'] = '';

       $data['all_groups'][$Ads['cid']]['book7'] = 0;

                                 $data['all_groups'][$Ads['cid']]['id7'] = ''; 

                         $data['all_groups'][$Ads['cid']]['mobile7'] = '';   

                                      

                                      

                    }



                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];

                }

            }





            $dbhost = "localhost"; // ??????

 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������

$dbpass="Qaz*123123";     // ������� ����� ��������

$dbname="kuwaityc_booking6"; // ��� ����� ��������





            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية

                mysqli_query($mysqli1, "SET NAMES utf8");



                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");



                while ($Ads = @mysqli_fetch_array($array1)) {

if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile'];

                    if (in_array($Ads['cid'], $data['all_cid'])) {



                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book5'] = mysqli_num_rows($www);



                        $data['all_groups'][$Ads['cid']]['id5'] = $Ads['id'];



                        $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];

                    } else {

                        $data['all_cid'][] = $Ads['cid'];

                        $data['all_groups'][$Ads['cid']] = $Ads;

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book5'] = mysqli_num_rows($www);

                           $data['all_groups'][$Ads['cid']]['book4'] = 0;

                        $data['all_groups'][$Ads['cid']]['book1'] = 0;

                        $data['all_groups'][$Ads['cid']]['book2'] = 0;

                        $data['all_groups'][$Ads['cid']]['book3'] = 0;

      $data['all_groups'][$Ads['cid']]['book6'] = 0;



                        $data['all_groups'][$Ads['cid']]['mobile5'] = $Ads['mobile'];

                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';

                             $data['all_groups'][$Ads['cid']]['mobile1'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';

         $data['all_groups'][$Ads['cid']]['id5'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['id4'] ='';

                        $data['all_groups'][$Ads['cid']]['id1'] = '';

                        $data['all_groups'][$Ads['cid']]['id2'] = '';

                        $data['all_groups'][$Ads['cid']]['id3'] = '';

                            $data['all_groups'][$Ads['cid']]['id6'] = '';

                     $data['all_groups'][$Ads['cid']]['book7'] = 0;

                                 $data['all_groups'][$Ads['cid']]['id7'] = ''; 

                         $data['all_groups'][$Ads['cid']]['mobile7'] = '';        

                    }



                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];

                }

            }

            /// $data['all_groups'] = array_merge($array1, $array2);  



















            $dbhost = "localhost"; // ??????

 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������

$dbpass="Qaz*123123";     // ������� ����� ��������

$dbname="kuwaityc_booking8"; // ��� ����� ��������





            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية

                mysqli_query($mysqli1, "SET NAMES utf8");



                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");



                while ($Ads = @mysqli_fetch_array($array1)) {



                    if (in_array($Ads['cid'], $data['all_cid'])) {



                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book6'] = mysqli_num_rows($www);



                        $data['all_groups'][$Ads['cid']]['id6'] = $Ads['id'];



                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];

                    } else {

                        $data['all_cid'][] = $Ads['cid'];

                        $data['all_groups'][$Ads['cid']] = $Ads;

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book6'] = mysqli_num_rows($www);

                           $data['all_groups'][$Ads['cid']]['book4'] = 0;

                        $data['all_groups'][$Ads['cid']]['book1'] = 0;

                        $data['all_groups'][$Ads['cid']]['book2'] = 0;

                        $data['all_groups'][$Ads['cid']]['book3'] = 0;

                          

                       $data['all_groups'][$Ads['cid']]['book5'] = 0;



                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];

                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';

                             $data['all_groups'][$Ads['cid']]['mobile1'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';

                          $data['all_groups'][$Ads['cid']]['mobile5'] = '';

                          $data['all_groups'][$Ads['cid']]['id6'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['id4'] ='';

                        $data['all_groups'][$Ads['cid']]['id1'] = '';

                        $data['all_groups'][$Ads['cid']]['id2'] = '';

                        $data['all_groups'][$Ads['cid']]['id3'] = '';

                            $data['all_groups'][$Ads['cid']]['id5'] = '';

                        $data['all_groups'][$Ads['cid']]['book7'] = 0;

                                 $data['all_groups'][$Ads['cid']]['id7'] = ''; 

                         $data['all_groups'][$Ads['cid']]['mobile7'] = '';     

                    }



                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];

                }

            }

            /// $data['all_groups'] = array_merge($array1, $array2);  













            $dbhost = "localhost"; // ??????

 $dbuser="kuwaityc_book";  // ��� ������ ����� ��������

$dbpass="Qaz*123123";     // ������� ����� ��������

$dbname="kuwaityc_booking7"; // ��� ����� ��������





            if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

                $mysqli1 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                mysqli_query($mysqli1, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية

                mysqli_query($mysqli1, "SET NAMES utf8");



                $array1 = mysqli_query($mysqli1, "select * from booking_clints       where  $whr ");



                while ($Ads = @mysqli_fetch_array($array1)) {

if($Ads['oky']=='ok' )$Ads['mobile']="بلاك لست <br>".$Ads['mobile'];

                    if (in_array($Ads['cid'], $data['all_cid'])) {





                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book7'] = mysqli_num_rows($www);



                        $data['all_groups'][$Ads['cid']]['id7'] = $Ads['id'];



                        $data['all_groups'][$Ads['cid']]['mobile7'] = $Ads['mobile'];

                    } else {

                        $data['all_cid'][] = $Ads['cid'];

                        $data['all_groups'][$Ads['cid']] = $Ads;

                        $www = mysqli_query($mysqli1, "select * from  booking where cid='" . $Ads['cid'] . "'");

                        $data['all_groups'][$Ads['cid']]['book6'] = mysqli_num_rows($www);

                           $data['all_groups'][$Ads['cid']]['book4'] = 0;

                        $data['all_groups'][$Ads['cid']]['book1'] = 0;

                        $data['all_groups'][$Ads['cid']]['book2'] = 0;

                        $data['all_groups'][$Ads['cid']]['book3'] = 0;

                          

                       $data['all_groups'][$Ads['cid']]['book5'] = 0;

 $data['all_groups'][$Ads['cid']]['book7'] = 0;

                        $data['all_groups'][$Ads['cid']]['mobile6'] = $Ads['mobile'];

                        $data['all_groups'][$Ads['cid']]['mobile4'] = '';

                             $data['all_groups'][$Ads['cid']]['mobile1'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile2'] = '';

                        $data['all_groups'][$Ads['cid']]['mobile3'] = '';

                          $data['all_groups'][$Ads['cid']]['mobile5'] = '';

                          $data['all_groups'][$Ads['cid']]['id6'] = $Ads['id'];

                        $data['all_groups'][$Ads['cid']]['id4'] ='';

                        $data['all_groups'][$Ads['cid']]['id1'] = '';

                        $data['all_groups'][$Ads['cid']]['id2'] = '';

                        $data['all_groups'][$Ads['cid']]['id3'] = '';

                            $data['all_groups'][$Ads['cid']]['id5'] = '';

                        $data['all_groups'][$Ads['cid']]['book6'] = 0;

                                 $data['all_groups'][$Ads['cid']]['id6'] = ''; 

                         $data['all_groups'][$Ads['cid']]['mobile6'] = '';     

                    }



                    ///  $data['all_groups'][$i]['cid']=$Ads['cid'];

                }

            }









        



     





    }









    

}