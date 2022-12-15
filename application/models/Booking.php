<?php

class Booking extends CI_Model {

    public function insert($table, $arrl) {
        $result = $this->db->insert($table, $arrl);

   if ($result)  $this->last_query();



        ///  die($last);

        return $result;
    }

    public function update($table, $arrl) {
        $result = $this->db->update($table, $arrl);

    if ($result) $this->last_query();



        ///die($last);

        return $result;
    }
    public function delete($table) {
        $result = $this->db->delete($table);
       if ($result) $this->last_query();

        return $result;
    }
    public function last_query() {

        $last = $this->db->last_query();
          if(@stristr($_SERVER['REQUEST_URI'],'/booking5/') or @stristr($_SERVER['REQUEST_URI'],'/booking8/') or @stristr($_SERVER['REQUEST_URI'],'/booking4/')){
         $dbhost = "kuwaitycar.com"; // الخادم
       $dbuser = "kuwaityc_booking";  // إسم مستخدم قاعدة البيانات
      $dbpass = "qaz123";     // باسويرد قاعدة البيانات
     $dbname = "kuwaityc_booking5"; // إ
   // if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
   ///    $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  //      mysqli_query($mysqli22, "SET character_set_server='utf8'"); // هنا تم اضافة كود الترميز الخاص بالغة العربية
  //     mysqli_query($mysqli22, "SET NAMES utf8");
  ///    $rowarrays=mysqli_query($mysqli22,"  $last  ");

       
   //   }
          }
        
        
     $this->load->helper('file');
      $db_name = 'sqlupdate.sql';
      $file = 'assets/' . $db_name;
     $backup = read_file($file);
    $backup = $backup . "\n" . "$last;";

     write_file($file, $backup);
  
        ///die($last);
        return TRUE;
    }



    function resize_image($directory, $height = 300, $weigth = 600) {


        if ($height || $weigth) {
            $new_widths = $height;
            $new_heights = $weigth;
        } else {
            $new_widths = 100;
            $new_heights = 100;
        }

        $full_file = $directory;

        if (preg_match('/.png$/i', $full_file)) {
            $img = imagecreatefrompng($full_file);
        }
        if (preg_match("/(jpg|jpeg)/i", $full_file)) {
            $img = imagecreatefromjpeg($full_file);
        }
        if (preg_match('/.gif/i', $full_file)) {
            $img = imagecreatefromgif($full_file);
        }
        $FullImage_width = imagesx($img);
        $FullImage_height = imagesy($img);

        $ratio = ( $FullImage_width > $new_widths ) ? (float) ($new_widths / $FullImage_width) : 1;
        $new_width = ((int) ($FullImage_width * $ratio));      //full-size width
        $new_height = ((int) ($FullImage_height * $ratio));    //full-size height
        //check for images that are still too high
        $ratio = ( $new_height > $new_heights ) ? (float) ($new_heights / $new_height) : 1;
        $new_width = ((int) ($new_width * $ratio));    //mid-size width
        $new_height = ((int) ($new_height * $ratio));


        $full_id = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($full_id, $img, 0, 0, 0, 0, $new_width, $new_height, $FullImage_width, $FullImage_height);
        if (preg_match("/(jpeg|jpg)/i", $full_file)) {
            $full = imagejpeg($full_id, $full_file, 100);
        }
        if (preg_match('/.gif/i', $full_file)) {
            $full = imagegif($full_id, $full_file);
        }
        if (preg_match('/.png$/i', $full_file)) {
            $full = imagepng($full_id, $full_file);
        }
        $this->compress($full_file, 90);
    }

    function compress($source, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $source, $quality);
    }

    private function set_upload_options($name) {
        //upload an image options
        $config = array();
     $folder='../allcid/'.date("Ym")."/";
        if (!file_exists($folder)) {
    mkdir($folder, 0777, true);
}
        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG';
        $config['max_size'] = '0';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
      if($name!=''){
		  		$config['file_name'] = $name;
	  }
else {
	$config['encrypt_name']=true;
		$config['file_name'] = $name;
}
        return $config;
    }

    function add_rep_user($comment, $noa = '') {
        //upload an image options

        $data = array(
            'comment' => $comment,
            'user' => $this->session->userdata('name'),
            'noa' => $noa,
            'date' => $this->booking->tissme_now(),
        );
        /// if (!$this->session->userdata('group'))
        $result = $this->db->insert('rep', $data);
    }

    function upload_many_photos($field_name, $name='') {

        $this->upload->initialize($this->set_upload_options($name));
        if (!$this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            echo"<pre>";
            print_r($config);
            echo"<pre>";
            print_r($error);
        } else {

            $data = $this->upload->data();
            /// $this->upload->upload_path.$this->upload->file_name."<br>";

            $this->resize_image($this->upload->upload_path . $this->upload->file_name);
//             $config=array();
            ///$config['image_library'] = 'gd2';
//    $config['source_image'] = $data['full_path']; //get original image
//    //$config2['new_image'] = 'images'; //save as new image //need to create thumbs first
//    $config['maintain_ratio'] = false;
//    $config['create_thumb'] = false;
//    //$config2['overwrite'] = false;
//    $config['width'] = 600;
//    $config['height'] = 300;
//    $this->load->library('image_lib', $config);
//              if (!$this->image_lib->resize()) {
//            echo $this->image_lib->display_errors();
//     }
//            //echo $this->upload->upload_path.$this->upload->file_name."<br>";
        }
        return $data;
    }

    function tissme_show($data) {
$data=intval($data);
if($data==0)return '';
        $day = date('D', $data);

        $days = array('Sun' => "الاحد  ", 'Mon' => "الاثنين", 'Tue' => "الثلاثاء", 'Wed' => "الاربعاء", 'Thu' => "الخميس", 'Fri' => "الجمعة", 'Sat' => "السبت");

//$msg.=$days[$day]." الساعة 12 ظهرا\n";

        return date('  ', $data) . '

' . $days[$day] . date(' A  h:i   ', $data) . "<br>" . date(' Y-m-d ', $data);
    }

    function data_day($hours = '') {
        // echo date('H', $this->tissme_now());
        if (!$hours)
            $hours = 12;
        if (date('H', $this->tissme_now()) < $hours)
            $datas = date('Ymd', $this->tissme_now() - ($hours * 60 * 60));
        else
            $datas = date('Ymd', $this->tissme_now());

        return $datas;
    }

    function tissme_now() {
        date_default_timezone_set('Asia/Kuwait');

        ////UPDATE `booking` SET `timeenter`=timeenter-10800,`timeend`=timeend-10800;UPDATE `booking` SET `timeend2`=timeend2-10800 where timeend2 is not NULL;UPDATE `booking` SET `timerenew`=timerenew-10800 where timerenew is not NULL;UPDATE `booking` SET `timecleanfinsh`=timecleanfinsh-10800 where timecleanfinsh is not NULL;


        $timestamp = time();
        /// $timestamp = time() +(3 * 60 * 60);
        return $timestamp;
    }

    function send_push($message) {


        $users = array();


        $this->db->from('user');
        $this->db->where("  mosma IS NOT NULL ");

        $data['all_roomscid'] = $this->db->get()->result_array();
        foreach ($data['all_roomscid'] as $row) {
            if (strlen($row['mosma']) == 36)
                $users[] = trim($row['mosma']);
        }
        /// exit;
        $headings = array(
            "en" => "checkout"
        );

        $content = array(
            "en" => $message
        );
        $fields = array(
            'app_id' => "d1680b9c-0300-480b-b14d-28c38f1641f4",
            // 'included_segments' => array('All'),  --> الارسال لكل مستخدمي التطبيق
            'include_player_ids' => $users, // --> الارسال لهؤلاء المستخدمين فقط .
            // 'data' => array("key" => "vale"), --> هذه تستخدم في حالة اردت ارسال متغير للجوال ، مثلا ارسال رقم المقال ليدخل له التطبيق .
            'headings' => $headings, // --> العنوان
            'contents' => $content // --> الرسالة
        );

        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic NzY4OGE1NzktYmU0ZC00NzdiLWIxYzMtMmIwZDQ3OWFkNGFj'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        $return["allresponses"] = $response;
        ///print_r($return["allresponses"]);
        $return = json_encode($return);
    }

    function Sms_send($mobile, $message,$sender='') {

        $url = "http://62.150.26.41/SmsWebService.asmx/send";

        /// $url = 'http://62.150.26.41/SmsWebService.asmx/authentication';

if(!$sender)$sender='Paykw';
        $params = array(
            'username' => 'Electron',
            'password' => 'rRrRNcAe',
            'token' => 'hjazfzzKhahF3MHj5fznngsb',
            'sender' => $sender,
            'message' => $message,
            'dst' => $mobile,
            'type' => 'text',
            'coding' => 'unicode',
            'datetime' => 'now'
        );


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);


        $result = curl_exec($ch);
        if (curl_errno($ch) !== 0) {
            error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
        }

        curl_close($ch);
        print_r($result);
        
    }
        
        
            function whats_send($mobile, $message,$sender='') {
       
       
       $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/instance8562/messages/chat",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "token=xk5ezk6jqofplqfo&to=+965$mobile&body=$message&priority=10&referenceId=",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
       
       
      //  $url = 'https://eu179.chat-api.com/instance201611/sendMessage?token=ejluluk1g94twsad';
//   $url = 'https://eu179.chat-api.com/instance201610/sendMessage?token=dh83wt5xzf0bldl6';
//// Create a new cURL resource
//
//
//// Setup request to send json via POST
//$data = array(
//    'phone' => '965'.$mobile,
//    'body' => $message."\n\n لايتوجب الرد على الرسالة
//    "
//);
//
//
//
//       
//
//$ch = curl_init($url);
//$payload = json_encode( $data);
//
//// Attach encoded JSON string to the POST fields
//curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//
//// Set the content type to application/json
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//
//// Return response instead of outputting
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//// Execute the POST request
//$result = curl_exec($ch);
//
//// Close cURL resource
//curl_close($ch);
    }

    function numtoarb($total) {

        //  echo $total."<br>";

        $total = explode(".", $total);
        $j = strlen($total[0]);
        //echo $j."<br>";
        $je = $j;
        $je--;
        $de = 1;
        for ($i = 1; $i < $j; $i++)
            $de = $de * 10;

        $t = $total[0];

        for ($i = 0; $i < $j; $i++) {
            $te[$je] = $t / $de;
            $t = $t % $de;
            $de = $de / 10;
            $temp = explode(".", $te[$je]);
            $te[$je] = $temp[0];
            $je--;
        }
// print_r($te) ."<br>";

        if ($j == 2) {

            if ($te[1] == 1) {
                if ($te[0] == "1") {
                    $arb[0] = " ";
                    $arb[1] = " أحد عشر";
                } elseif ($te[0] == "0")
                    $arb[1] = " عشرة";
                else
                    $arb[1] = " عشر";
            }
            if ($te[0] == "0") {
                switch ($te[1]) {
                    case "0" : $arb[1] = " ";
                        break;
                    case "1" : if ($te[0] == "1") {
                            $arb[0] = " ";
                            $arb[1] = " أحد عشر";
                        } elseif ($te[0] == "0")
                            $arb[1] = " عشرة";
                        else
                            $arb[1] = "عشر";
                        break;
                    case "2" : $arb[1] = " عشرون";
                        break;
                    case "3" : $arb[1] = " ثلاثون";
                        break;
                    case "4" : $arb[1] = " اربعون";
                        break;
                    case "5" : $arb[1] = " خمسون";
                        break;
                    case "6" : $arb[1] = " ستون";
                        break;
                    case "7" : $arb[1] = " سبعون";
                        break;
                    case "8" : $arb[1] = " ثمانون";
                        break;
                    case "9" : $arb[1] = " تسعون";
                        break;
                }
            } else
                switch ($te[1]) {
                    case "0" : $arb[1] = " ";
                        break;
                    case "1" : if ($te[0] == "1") {
                            $arb[0] = " ";
                            $arb[1] = " وأحد عشر";
                        } elseif ($te[0] == "0")
                            $arb[1] = " وعشرة";
                        else
                            $arb[1] = " عشر";
                        break;
                    case "2" : $arb[1] = " وعشرون";
                        break;
                    case "3" : $arb[1] = " وثلاثون";
                        break;
                    case "4" : $arb[1] = " واربعون";
                        break;
                    case "5" : $arb[1] = " وخمسون";
                        break;
                    case "6" : $arb[1] = " وستون";
                        break;
                    case "7" : $arb[1] = " وسبعون";
                        break;
                    case "8" : $arb[1] = " وثمانون";
                        break;
                    case "9" : $arb[1] = " وتسعون";
                        break;
                }
        }



        for ($i = 0; $i < $j; $i++) {
            if ($i == 0) {
                if ($j < 3)
                    switch ($te[$i]) {
                        case "0" : $arb[0] = " ";
                            break;
                        case "1" : $arb[0] = " واحد";
                            break;
                        case "2" : if ($te[1] == "1")
                                $arb[0] = " اثنا ";
                            else
                                $arb[0] = " اثنان";
                            //echo $j."<br>";
                            break;
                        case "3" : $arb[0] = " ثلاثة";
                            break;
                        case "4" : $arb[0] = " اربعة";
                            break;
                        case "5" : $arb[0] = " خمسة";
                            break;
                        case "6" : $arb[0] = " ستة";
                            break;
                        case "7" : $arb[0] = " سبعة";
                            break;
                        case "8" : $arb[0] = " ثمانية";
                            break;
                        case "9" : $arb[0] = " تسعة";
                            break;
                    } else
                    switch ($te[$i]) {
                        case "0" : $arb[0] = " ";
                            break;
                        case "1" : $arb[0] = " وواحد";
                            break;
                        case "2" : if ($te[1] == "1")
                                $arb[0] = " واثنا ";
                            else
                                $arb[0] = " واثنان";
                            break;
                        case "3" : $arb[0] = " وثلاثة";
                            break;
                        case "4" : $arb[0] = " واربعة";
                            break;
                        case "5" : $arb[0] = " وخمسة";
                            break;
                        case "6" : $arb[0] = " وستة";
                            break;
                        case "7" : $arb[0] = " وسبعة";
                            break;
                        case "8" : $arb[0] = " وثمانية";
                            break;
                        case "9" : $arb[0] = " وتسعة";
                            break;
                    }
            }

            if ($i == 1) {
                if ($j == 2) {

                    if ($te[$i] == 1) {
                        if ($te[0] == "1") {
                            $arb[0] = " ";
                            $arb[1] = " أحد عشر";
                        } elseif ($te[0] == "0")
                            $arb[1] = " عشرة";
                        else
                            $arb[1] = " عشر";
                    }
                    if ($te[0] == "0")
                        switch ($te[$i]) {
                            case "0" : $arb[1] = " ";
                                break;
                            case "1" : if ($te[0] == "1") {
                                    $arb[0] = " ";
                                    $arb[1] = " أحد عشر";
                                } elseif ($te[0] == "0")
                                    $arb[1] = " عشرة";
                                else
                                    $arb[1] = "عشر";
                                break;
                            case "2" : $arb[1] = " عشرون";
                                break;
                            case "3" : $arb[1] = " ثلاثون";
                                break;
                            case "4" : $arb[1] = " اربعون";
                                break;
                            case "5" : $arb[1] = " خمسون";
                                break;
                            case "6" : $arb[1] = " ستون";
                                break;
                            case "7" : $arb[1] = " سبعون";
                                break;
                            case "8" : $arb[1] = " ثمانون";
                                break;
                            case "9" : $arb[1] = " تسعون";
                                break;
                        }
                } else
                    switch ($te[$i]) {
                        case "0" : $arb[1] = " ";
                            break;
                        case "1" : if ($te[0] == "1") {
                                $arb[0] = " ";
                                $arb[1] = " وأحد عشر";
                            } elseif ($te[0] == "0")
                                $arb[1] = " وعشرة";
                            else
                                $arb[1] = " عشر";
                            break;
                        case "2" : $arb[1] = " وعشرون";
                            break;
                        case "3" : $arb[1] = " وثلاثون";
                            break;
                        case "4" : $arb[1] = " واربعون";
                            break;
                        case "5" : $arb[1] = " وخمسون";
                            break;
                        case "6" : $arb[1] = " وستون";
                            break;
                        case "7" : $arb[1] = " وسبعون";
                            break;
                        case "8" : $arb[1] = " وثمانون";
                            break;
                        case "9" : $arb[1] = " وتسعون";
                            break;
                    }
            }

            if ($i == 2) {
                if ($j == 3)
                    switch ($te[$i]) {
                        case "0" : $arb[2] = " ";
                            break;
                        case "1" : $arb[2] = " مائة";
                            break;
                        case "2" : $arb[2] = " مائتان";
                            break;
                        case "3" : $arb[2] = " ثلاثمائة";
                            break;
                        case "4" : $arb[2] = " اربعمائة";
                            break;
                        case "5" : $arb[2] = " خمسمائة";
                            break;
                        case "6" : $arb[2] = " ستمائة";
                            break;
                        case "7" : $arb[2] = " سبعمائة";
                            break;
                        case "8" : $arb[2] = " ثمانمائة";
                            break;
                        case "9" : $arb[2] = " تسعمائة";
                            break;
                    } else
                    switch ($te[$i]) {
                        case "0" : $arb[2] = " ";
                            break;
                        case "1" : $arb[2] = " ومائة";
                            break;
                        case "2" : $arb[2] = " ومائتان";
                            break;
                        case "3" : $arb[2] = " وثلاثمائة";
                            break;
                        case "4" : $arb[2] = " واربعمائة";
                            break;
                        case "5" : $arb[2] = " وخمسمائة";
                            break;
                        case "6" : $arb[2] = " وستمائة";
                            break;
                        case "7" : $arb[2] = " وسبعمائة";
                            break;
                        case "8" : $arb[2] = " وثمانمائة";
                            break;
                        case "9" : $arb[2] = " وتسعمائة";
                            break;
                    }
            }

            if ($i == 3) {
                if ($j == 4)
                    switch ($te[$i]) {
                        case "0" : $arb[$i] = " ";
                            break;
                        case "1" : $arb[$i] = " ألف";
                            break;
                        case "2" : $arb[$i] = " ألفان";
                            break;
                        case "3" : $arb[$i] = " ثلاثة آلاف";
                            break;
                        case "4" : $arb[$i] = " اربعة آلاف";
                            break;
                        case "5" : $arb[$i] = " خمسة آلاف";
                            break;
                        case "6" : $arb[$i] = " ستة آلاف";
                            break;
                        case "7" : $arb[$i] = " سبعة آلاف";
                            break;
                        case "8" : $arb[$i] = " ثمانية آلاف ";
                            break;
                        case "9" : $arb[$i] = " تسعة آلاف ";
                            break;
                    } elseif ($j == 5)
                    switch ($te[$i]) {
                        case "0" : $arb[$i] = " ";
                            break;
                        case "1" : $arb[$i] = " واحد ";
                            break;
                        case "2" : if ($te[6] == "1")
                                $arb[$i] = " اثنا ";
                            else
                                $arb[$i] = " اثنان";
                            break;
                        case "3" : $arb[$i] = " ثلاثة ";
                            break;
                        case "4" : $arb[$i] = " اربعة ";
                            break;
                        case "5" : $arb[$i] = " خمسة ";
                            break;
                        case "6" : $arb[$i] = " ستة ";
                            break;
                        case "7" : $arb[$i] = " سبعة ";
                            break;
                        case "8" : $arb[$i] = " ثمانية ";
                            break;
                        case "9" : $arb[$i] = " تسعة ";
                    } else
                    switch ($te[$i]) {
                        case "0" : $arb[$i] = " ";
                            break;
                        case "1" : $arb[$i] = " وواحد ";
                            break;
                        case "2" : if ($te[4] == "1")
                                $arb[$i] = " واثنا ";
                            else
                                $arb[$i] = " واثنان";
                            break;
                        case "3" : $arb[$i] = " وثلاثة ";
                            break;
                        case "4" : $arb[$i] = " واربعة ";
                            break;
                        case "5" : $arb[$i] = " وخمسة ";
                            break;
                        case "6" : $arb[$i] = " وستة ";
                            break;
                        case "7" : $arb[$i] = " وسبعة ";
                            break;
                        case "8" : $arb[$i] = " وثمانية ";
                            break;
                        case "9" : $arb[$i] = " وتسعة ";
                    }
            }
            if ($i == 4) {
                if ($j == 5)
                    switch ($te[$i]) {
                        case "0" : $arb[$i] = " ";
                            break;
                        case "1" : if ($te[3] == "1") {
                                $arb[3] = " ";
                                $arb[4] = " أحد عشر الفا";
                            } elseif ($te[3] == "0")
                                $arb[4] = " عشرة آلاف";
                            
                                else$arb[$i] = " عشر الفا";
                            break;
                        case "2" : $arb[$i] = " عشرون ";
                            break;
                        case "3" : $arb[$i] = " ثلاثون ";
                            break;
                        case "4" : $arb[$i] = " اربعون ";
                            break;
                        case "5" : $arb[$i] = " خمسون ";
                            break;
                        case "6" : $arb[$i] = " ستون ";
                            break;
                        case "7" : $arb[$i] = " سبعون ";
                            break;
                        case "8" : $arb[$i] = " ثمانون ";
                            break;
                        case "9" : $arb[$i] = " تسعون ";
                            break;
                    } else
                    switch ($te[$i]) {
                        case "0" : $arb[$i] = " ";
                            break;
                        case "1" : if ($te[3] == "1") {
                                $arb[3] = " ";
                                $arb[4] = " وأحد عشر الفا";
                            } elseif ($te[3] == "0")
                                $arb[4] = " وعشرة آلاف";
                            
                                else$arb[$i] = " عشر الفا";
                            break;
                        case "2" : $arb[$i] = " وعشرون ";
                            break;
                        case "3" : $arb[$i] = " وثلاثون ";
                            break;
                        case "4" : $arb[$i] = " واربعون ";
                            break;
                        case "5" : $arb[$i] = " وخمسون ";
                            break;
                        case "6" : $arb[$i] = " وستون ";
                            break;
                        case "7" : $arb[$i] = " وسبعون ";
                            break;
                        case "8" : $arb[$i] = " وثمانون ";
                            break;
                        case "9" : $arb[$i] = " وتسعون ";
                            break;
                    }
            }
            if ($i == 5) {
                if ($j == 6)
                    switch ($te[$i]) {
                        case "0" : $arb[$i] = " ";
                            break;
                        case "1" : $arb[$i] = " مائة ";
                            break;
                        case "2" : $arb[$i] = " مائتان ";
                            break;
                        case "3" : $arb[$i] = " ثلاثمائة ";
                            break;
                        case "4" : $arb[$i] = " اربعمائة ";
                            break;
                        case "5" : $arb[$i] = " خمسمائة ";
                            break;
                        case "6" : $arb[$i] = " ستمائة ";
                            break;
                        case "7" : $arb[$i] = " سبعمائة ";
                            break;
                        case "8" : $arb[$i] = " ثمانمائة ";
                            break;
                        case "9" : $arb[$i] = " تسعمائة ";
                            break;
                    } else
                    switch ($te[$i]) {
                        case "0" : $arb[$i] = " ";
                            break;
                        case "1" : $arb[$i] = " ومائة ";
                            break;
                        case "2" : $arb[$i] = " ومائتان ";
                            break;
                        case "3" : $arb[$i] = " وثلاثمائة ";
                            break;
                        case "4" : $arb[$i] = " واربعمائة ";
                            break;
                        case "5" : $arb[$i] = " وخمسمائة ";
                            break;
                        case "6" : $arb[$i] = " وستمائة ";
                            break;
                        case "7" : $arb[$i] = " وسبعمائة ";
                            break;
                        case "8" : $arb[$i] = " وثمانمائة ";
                            break;
                        case "9" : $arb[$i] = " وتسعمائة ";
                            break;
                    }
            }

            if ($i == 6)
                switch ($te[$i]) {
                    case "0" : $arb[$i] = " ";
                        break;
                    case "1" : $arb[$i] = " مليون ";
                        break;
                    case "2" : $arb[$i] = " مليونان ";
                        break;
                    case "3" : $arb[$i] = " ثلاثة ملايين ";
                        break;
                    case "4" : $arb[$i] = " اربعة ملايين ";
                        break;
                    case "5" : $arb[$i] = " خمسة ملايين ";
                        break;
                    case "6" : $arb[$i] = " تة ملايين ";
                        break;
                    case "7" : $arb[$i] = " سبعة ملايين ";
                        break;
                    case "8" : $arb[$i] = " ثمانية ملايين ";
                        break;
                    case "9" : $arb[$i] = " تسعة ملايين ";
                        break;
                }
        }


        if ($j > 4 && $te[4] != "1")
            $arb[4] = $arb[4] . " الف ";
        $strarb = '';
        if (!empty($arb[6]))
            $strarb .= $arb[6];
        if (!empty($arb[5]))
            $strarb .= $arb[5];
        if (!empty($arb[3]))
            $strarb .= $arb[3];
        if (!empty($arb[4]))
            $strarb .= $arb[4];
        if (!empty($arb[2]))
            $strarb .= $arb[2];
        if (!empty($arb[0]))
            $strarb .= $arb[0];
        if (!empty($arb[1]))
            $strarb .= $arb[1];
//$strarb=$arb[6].$arb[5].$arb[3].$arb[4].$arb[2].$arb[0].$arb[1]; 
        return $strarb;
    }

    function getNiceDuration($durationInSeconds, $cc = '') {



        $duration = '';

        $days = floor($durationInSeconds / 86400);

        $durationInSeconds -= $days * 86400;

        $hours = floor($durationInSeconds / 3600);

        $durationInSeconds -= $hours * 3600;

        $minutes = floor($durationInSeconds / 60);

        $seconds = $durationInSeconds - $minutes * 60;



        if ($days > 0) {

            $duration .= $days . ' يوم' . "-";
        }

        if ($hours > 0) {

            $duration .= ' ' . $hours . 'ساعة ';
        }
        if ($minutes > 0 and $cc) {

            $duration .= ' ' . $minutes . 'دقيقة ';
        }



        return $duration;
    }

    public function import_database() {
        $temp_line = '';
        $lines = file('/path/to/file/my_file.sql');
        foreach ($lines as $line) {
            if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 1) == '#')
                continue;
            $temp_line .= $line;
            if (substr(trim($line), -1, 1) == ';') {
                $this->db->query($temp_line);
                $temp_line = '';
            }
        }
    }

    public function dbexport() {

        $this->load->dbutil();
        $db_format = array(
            'ignore' => array($this->ignore_directories),
            'format' => 'zip',
            'filename' => 'my_db_backup.sql',
            'add_insert' => TRUE,
            'newline' => "\n"
        );
        $backup = & $this->dbutil->backup($db_format);
        $dbname = 'my_db_backup.zip';
        $save = 'uploads/db_backup/' . $dbname;
        write_file($save, $backup);
        force_download($dbname, $backup);
    }

}

?>
