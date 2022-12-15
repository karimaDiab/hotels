<div class=Section1 dir=RTL   >


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="ar-sa" />

<title>Untitled 1</title>
<style type="text/css">
.style2 {
	text-align: center;
	border: 2px solid #000000;
}
.style21 {
	text-align: center;
	font-size: xx-large;
	text-decoration: underline;
	direction: ltr;
}
.style22 {
	border-left-style: solid;
	border-left-width: 2px;
	border-right-style: solid;
	border-right-width: 2px;
	border-top-style: solid;
	border-top-width: 0px;
	border-bottom-style: solid;
	border-bottom-width: 2px;
	direction: ltr;
}
.style2 {
    	text-align: center;
	border: 2px solid #000000;
}
.style24 {
	text-align: center;
	border-left: 2px solid #000000;
	border-right: 1px solid #000000;
	border-top: 2px solid #000000;
	border-bottom: 2px solid #000000;
	direction: ltr;
}
.style25 {
	text-align: center;
	border-left: 1px solid #000000;
	border-right: 2px solid #000000;
	border-top: 2px solid #000000;
	border-bottom: 2px solid #000000;
	direction: ltr;
}
.style29 {
	text-align: center;
	font-size: x-large;

	direction: ltr;
}
.style30 {
	text-align: center;
	font-size: xx-large;
	direction: ltr;

}
.style31 {
	text-align: center;
	font-size:medium;
	direction: ltr;
    line-height: 25px;
	border: 2px solid #000000;
}
.style32 {
	font-size: large;
}
.style35 {
	text-align: center;
	direction: ltr;
	border: 2px solid #000000;
}
.style36 {
	direction: ltr;
}
</style>
</head>

<body>

<p class="style36">
<img alt="" src="http://kuwaitycar.com/Untitled-1.jpg" width="100%" height="103" /></p>

<table style="width: 75%; height: 100px" align="center" class="style22">
	<tbody class="style36">
	<tr>
     <?php 
      if(is_numeric($row['text1'])){
$query = $this->db->get_where('user', array('id' =>$row['text1']));
 $user = $query->row_array(); 
                    }
                    else {
                     $user['name']=$row['text1'];    
                    }			
?>
        
		<td class="style35" style="  background-color: bisque;"><strong>الوقت</strong></td>
        	<td class="style35" style="  background-color: bisque;"><strong>التاريخ </strong></td>
		<td class="style25" style="  background-color: bisque;"><strong>اسم المستخدم</strong></td>
	</tr>
	<tr>
		<td class="style35"><strong>	<?php echo $all_groups['text3'];?></strong></td>
		<td class="style35">	<strong><?php echo $all_groups['text2'];?></strong></td>
		<td style="width: 35%" class="style35"><strong><?=$user['name']?></strong></td>
	</tr>
</table>
<?php 
	  $query = $this->db->get_where('check_types', array('id' => $all_groups['type_id']));
            $type = $query->row_array();

	?>
<p class="style30" ><strong>تفتيش <?=$type['name']?>  &nbsp;</strong></p>

<?php if(isset($all_groups) && $all_groups !=null){  
$answer=$all_groups['text4'];
$text = json_decode($answer,true); 
/*  
Array (
[choose_5] => 2 [image_5] => 83520c93578564df4b86cc33b88ef597.jpg [note_5] => kkkkkkkkkkkkkkkkkkk [question_5] => 5 
[choose_7] => 1 [image_7] => bed5006302cdbc1cd2d043d807cc443f.jpg [note_7] => hjghgh [question_7] => 7 
[choose_8] => 1 [image_8] => 59fdb2d78dd352af2089572824dca966.jpg [note_8] => kkkjkiojij [question_8] => 8 )
*/
	                $folder = '../allcid/' . date("Ym") . "/";

	 } ?>
<table style="width: 75%; height: 100px;direction: rtl" align="center" class="style22" dir="ltr">

	<tr> 

        
                   <td class="style24"  style="  background-color: bisque;" ><strong>م</strong></td>
                <td class="style35" style="  background-color: bisque;" ><strong>السؤال</strong></td>
		                <td class="style35" style="  background-color: bisque;" ><strong> نعم / لا</strong></td>
		<td class="style25" style="  background-color: bisque;"><strong>الصورة</strong></td>
                	<td class="style35" style="  background-color: bisque;"><strong>ملاحظة</strong></td>
                
	</tr>
    
  
    <?php if(isset($questions) && $questions !=null){ $i=1;
	foreach($questions as $one){
	?>
    <tr>
     
    	<td class="style25" style="width: 1%" >	<strong><?=$i?></strong></td>
		<td class="style35" style="width: 20%" ><strong><?=$one['text']?></strong></td>
		<td class="style35" style="width: 15%" ><strong><?php echo (isset($text['choose_'.$one['id']]) && $text['choose_'.$one['id']] !=null  ?$text['choose_'.$one['id']]:''); ?> </strong></td>
		<td class="style35" style="width: 15%" ><strong><?php echo (isset($text['image_'.$one['id']]) && $text['image_'.$one['id']] !=null ?
			'<a  target="_blank" href="https://7agz.com/hotels/allcid/'.date("Ym").'/'.$text['image_'.$one['id']].'" >مشاهدة الصورة</a>':''); ?></strong></td>
        <td class="style35" style="width: 20%" ><strong><?php echo (isset($text['note_'.$one['id']]) && $text['note_'.$one['id']] !=null ?$text['note_'.$one['id']]:''); ?></strong></td>

	</tr>
 <?php $i++; }  } ?>
	
</table>

<p class="style36"><br />
</p>
<table style="width: 100%;display: none;" class="style36" style="">
	<tbody class="style36">
	<tr>
		<td class="style29">توقيع المدير المالي
      </td>
		<td class="style29">توقيع المستلم
</td>
	</tr>
	<tr>
		<td class="style29">
		.............................</td>
		<td class="style29">
		..................................</td>
	</tr>
</table>
<br /><br /><br />
<p class="style36">
<img alt="" src="http://kuwaitycar.com/Untitled-2221.jpg" width="100%" height="100" /></p>

</body>

</html>


<footer></footer></div>
<style>
   
      @media print {
    footer {page-break-after: always;}
}</style> 