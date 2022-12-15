<?php

class Booking extends CI_Model {


   function Sms_send($mobile,$message)
    {

        $url = 'https://eu179.chat-api.com/instance201610/sendMessage?token=dh83wt5xzf0bldl6';

// Create a new cURL resource


// Setup request to send json via POST
$data = array(
    'phone' => '00965'.$mobile,
    'body' => $message."\n\n لايتوجب الرد على الرسالة
    "
);



       

$ch = curl_init($url);
$payload = json_encode( $data);

// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);

// Close cURL resource
curl_close($ch);
                    

    }
    
 function resize_image($directory,$height=300,$weigth=600)
{

if($height||$weigth)
{
$new_widths = $height;	
$new_heights = $weigth;	
}else
{
$new_widths = 100;	
$new_heights = 100;
}

$full_file = $directory;

    if (preg_match('/.png$/i',$full_file))
{
        $img = imagecreatefrompng($full_file);
    }
if ( preg_match( "/(jpg|jpeg)/i", $full_file ))
{
$img = imagecreatefromjpeg($full_file);
}
if (preg_match('/.gif/i',$full_file))
{
$img = imagecreatefromgif($full_file);
}
$FullImage_width = imagesx($img);
$FullImage_height = imagesy($img);

$ratio =  ( $FullImage_width > $new_widths ) ?($new_widths / $FullImage_width) : 1 ;
    $new_width = ((int)($FullImage_width * $ratio));      //full-size width
    $new_height = ((int)($FullImage_height * $ratio));    //full-size height
    //check for images that are still too high
    $ratio =  ( $new_height > $new_heights ) ? ($new_heights / $new_height) : 1 ;
    $new_width = ((int)($new_width * $ratio));    //mid-size width
    $new_height = ((int)($new_height * $ratio));


$full_id = imagecreatetruecolor($new_width, $new_height);
imagecopyresampled($full_id, $img, 0, 0, 0, 0, $new_width, $new_height, $FullImage_width, $FullImage_height);
if ( preg_match( "/(jpeg|jpg)/i", $full_file ))
{
$full = imagejpeg($full_id, $full_file, 100);
}
if (preg_match('/.gif/i',$full_file))
{
$full = imagegif($full_id, $full_file);
}
      if (preg_match('/.png$/i',$full_file))
{
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
    private function set_upload_options($name)
{   
    //upload an image options
    $config = array();
    $config['upload_path'] = './upload/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG';
    $config['max_size']      = '0';
    $config['overwrite']     = TRUE;
        $config['remove_spaces'] = TRUE;
       $config['file_name'] = $name;

    return $config;
}
  function upload_many_photos($field_name,$name) {

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

            $this->resize_image($this->upload->upload_path.$this->upload->file_name);
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
  

  function tissme_show($data)

          {

           $day = date('D', $data);

$days=array('Sun'=>"الاحد  ",'Mon'=>"الاثنين",'Tue'=>"الثلاثاء",'Wed'=>"الاربعاء",'Thu'=>"الخميس",'Fri'=>"الجمعة",'Sat'=>"السبت");

//$msg.=$days[$day]." الساعة 12 ظهرا\n";  

            return date(' Y-m-d ', 	$data).'

'.$days[$day].date(' A  h:i   ', 	$data)."".date('  ', 	$data);



            }
  
             function data_day($hours='')

          {
   // echo date('H', $this->tissme_now());        
                if(!$hours) $hours=12;
if(date('H', $this->tissme_now())<$hours)$datas =date('Ymd', $this->tissme_now()-($hours*60*60));

else $datas =date('Ymd', $this->tissme_now());   
                 
            return $datas;     
             }
    function tissme_now()

          {
   $timestamp=time();
      /// $timestamp=time()+(3*60*60);

 date_default_timezone_set('Asia/Kuwait');             

           



return $timestamp;

          }
          
          
           
 function getNiceDuration($durationInSeconds,$cc='') {



  $duration = '';

  $days = floor($durationInSeconds / 86400);

  $durationInSeconds -= $days * 86400;

  $hours = floor($durationInSeconds / 3600);

  $durationInSeconds -= $hours * 3600;

  $minutes = floor($durationInSeconds / 60);

  $seconds = $durationInSeconds - $minutes * 60;



  if($days > 0) {

    $duration .=  $days.' يوم'."-" ;

  }

  if($hours > 0) {

    $duration .= ' ' . $hours . 'ساعة ';

  }

 

  return $duration;

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
                        case "2" : if ($te[4] == "1")
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


}

?>
