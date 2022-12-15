<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head><meta http-equiv="Content-Type" content="text/html; charset=cp1256">
<meta http-equiv="Content-Language" content="ar-sa" />

<title>Untitled 1</title>

</head>
<style>

.style8{
    text-align: center;
}</style>
<body style="margin: 0px;margin-left: 100px;"   onload="window.print();">
<img alt="" src="http://kuwaitycar.com/Untitled-1.jpg" width="100%" height="103"  /></p><p align="center" style="font-size: 35px;"><?php
     if(@stristr($_SERVER['REQUEST_URI'],'booking2')){
        echo "السالمية";
        } elseif(@stristr($_SERVER['REQUEST_URI'],'booking3')){
        echo "الفروانية";
        }
        elseif(@stristr($_SERVER['REQUEST_URI'],'booking4')){
        echo "الرقعي"; 
        }
           elseif(@stristr($_SERVER['REQUEST_URI'],'booking5')){
        echo "الشعب"; 
        } elseif(@stristr($_SERVER['REQUEST_URI'],'booking6')){
        echo "ريحانة"; 
        }elseif(@stristr($_SERVER['REQUEST_URI'],'booking8')){
        echo "الفنطاس"; 
        }elseif(@stristr($_SERVER['REQUEST_URI'],'booking7')){
        echo "كرستال"; 
        }
        else
        {
                  echo "حولي";
        }
 
    
    ?></p>



	  
    <table border="1" cellspacing="0" cellpadding="0" class="show_tbl" style="width: 90%; margin: 20px;" dir="rtl">
	<tr class="style5">
		<td style="width: 10%; text-align: center;background-color: #EEEEEE;" valign="middle" dir="rtl" >
		<strong><span lang="en-us">&nbsp;&nbsp; </span>التاريخ 
		</strong></td>
		<td style="width: 10%; text-align: center;" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong><?php echo ($date);?></strong></span></td>
		<td style="width: 10%; text-align: center;background-color: #EEEEEE;" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong>مجموع الايراد</strong></span></td>
		<td style="width: 10%; text-align: center;" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong><?=$sum_1?></strong></span></td>
		<td style="width: 10%; text-align: center;background-color: #EEEEEE;" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong>تصدير كاش</strong></span></td>
		<td style="width: 10%; text-align: center;" valign="middle" dir="rtl">
		<strong><?=$all5_last?></strong></td>
	</tr>
	<tr class="style5">
		<td style="width: 10%; height: 18px; text-align: center;background-color: #EEEEEE;" class="style1" valign="middle" dir="rtl">
		<strong>اليوم </strong></td>
		<td style="width: 10%; height: 18px; text-align: center;" class="style1" valign="middle" dir="rtl">
		<strong><?php echo $date;?></strong> 
		<span lang="ar-sa"><strong></strong></span></td>
		<td style="width: 10%; height: 18px; text-align: center;background-color: #EEEEEE;" class="style1" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong>المصروفات</strong></span></td>
		<td style="width: 10%; height: 18px; text-align: center;" class="style1" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong><?=$sum_2?></strong></span></td>
		<td style="width: 10%; height: 18px; text-align: center;background-color: #EEEEEE;" class="style1" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong>تصدير knet </strong></span><strong></strong></td>
		<td style="width: 10%; height: 18px; text-align: center;" class="style1" valign="middle" dir="rtl">
		<strong><?=$sum_5_knet?></strong></td>
	</tr>
        
        	<tr class="style5">
		<td style="width: 10%; height: 18px; text-align: center;background-color: #EEEEEE;" class="style1" valign="middle" dir="rtl">
		<strong>العملاء الجدد </strong></td>
		<td style="width: 10%; height: 18px; text-align: center;" class="style1" valign="middle" dir="rtl">
		<strong>
        
        
        </strong> 
		<span lang="ar-sa"><strong></strong></span></td>
		<td style="width: 10%; height: 18px; text-align: center;background-color: #EEEEEE;" class="style1" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong>الحركات</strong></span></td>
		<td style="width: 10%; height: 18px; text-align: center;" class="style1" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong></strong></span></td>
		<td style="width: 10%; height: 18px; text-align: center;background-color: #EEEEEE;" class="style1" valign="middle" dir="rtl">
		<span lang="ar-sa"><strong> متوسط الحركات </strong></span><strong></strong></td>
		<td style="width: 10%; height: 18px; text-align: center;" class="style1" valign="middle" dir="rtl">
		<strong></strong></td>
	</tr>
</table>
  
      
      <table  border="0" cellspacing="0" cellpadding="0" class="show_tbl" style="width: 90%;margin: 20px;">
<tr class="style1">
<td class="style8" style="width: 60%;text-align: center;"  valign="top">

<table  border="1" cellspacing="0" cellpadding="0" class="show_tbl" style="width: 90%;text-align: center;">
<tr class="style1">
		<td class="style8" style="background-color: #EEEEEE;" colspan="5"><strong>حركات الكي نت</strong></td>
	
	
	</tr>
	<tr class="style1">
		<td class="style8" style="background-color: #EEEEEE;"><strong>المبلغ</strong></td>
        	<td class="style8" style="background-color: #EEEEEE;"><strong>الوصل</strong></td>
                   	<td class="style8" style="background-color: #EEEEEE;"><strong>الوقت</strong></td>
		<td class="style8"  style="background-color: #EEEEEE;"><strong>اليوزر</strong></td>
        	<td class="style8"  style="background-color: #EEEEEE;"><strong>الشقة</strong></td>
        	<td class="style8"  style="background-color: #EEEEEE;"><strong>م</strong></td>
	
	</tr>
    
    <?php

 $is=0;
$i=1;
 foreach($knet as $result):

$is=$is+$result['knet'];

	if($result['timerenew'])$result['timeenter']=$result['timerenew'];
?>
	<tr>
	
        	<td class="style8"><?=$result['knet']?></td>
            	<td class="style8"><?=$result['billprint']?></td>
                   	<td class="style8"><?=date('d   H:i ', 	$result['timeenter'])?></td>
            
		<td class="style8"><?=$result['user']?></td>
        		<td class="style8"><?=$result['room']?></td>
	<td class="style8"><?=$i?></td>
	</tr>
    
    <?php
$i++;
       endforeach; 	
?>

	<tr>
		<td class="style3"><center><?php echo $is;?></center></td>
		<td class="style14"  colspan="3" style="background-color: #EEEEEE;"><strong>المجموع</strong></td>
	</tr>
</table><br />




</td>
<td class="style8" style="width: 40%;"   valign="top">
<table  border="1" cellspacing="0" cellpadding="0" class="show_tbl" style="width: 100%;">
<tr class="style1">
		<td class="style8" style="background-color: #EEEEEE;" colspan="5"><strong>الايرادات</strong></td>
	
	
	</tr>
	<tr class="style1">

        		<td class="style8" style="background-color: #EEEEEE;"><strong>المبلغ</strong></td>
		<td class="style8"  style="background-color: #EEEEEE;"><strong>الوصف</strong></td>
			<td class="style8" style="background-color: #EEEEEE;"><strong>م</strong></td>
	</tr>
    
    <?php



 $is=0;
$i=1;
 foreach($all1 as $result):

$is=$is+$result['text1'];


?>
	<tr>
    
		<td class="style8"><?=$result['text1']?></td>
		<td class="style8"><?=$result['text2']?></td>
		<td class="style8"><?=$i?></td>
	</tr>
    
    <?php
	$i++;
    endforeach;
   
?>

	<tr>
		<td class="style3"><center><?php echo $is;?></center></td>
		<td class="style14"  colspan="3" style="background-color: #EEEEEE;"><strong>المجموع</strong></td>
	</tr>
</table>
<br />
<?php


	if(count($all5)>1)
    {
        
    
?>

<table  border="1" cellspacing="0" cellpadding="0" class="show_tbl" style="width: 100%;">
<tr class="style1">
		<td class="style8" style="background-color: #EEEEEE;" colspan="5"><strong>التصدير</strong></td>
	
	
	</tr>
	<tr class="style1">

        		<td class="style8" style="background-color: #EEEEEE;"><strong>المبلغ</strong></td>
		<td class="style8"  style="background-color: #EEEEEE;"><strong>الوصف</strong></td>
			<td class="style8" style="background-color: #EEEEEE;"><strong>م</strong></td>
	</tr>
    
    <?php
$i=1;
$is=0;

 foreach($all5 as $result):

$is=$is+$result['text1'];



?>
	<tr>
    
		<td class="style8"><?=$result['text1']?></td>
		<td class="style8"><?=$result['text2']?></td>
		<td class="style8"><?=$i?></td>
	</tr>
    
    <?php
	$i++;
    
    endforeach;
?>

	<tr>
		<td class="style3"><center><?php echo $is;?></center></td>
		<td class="style14"  colspan="3" style="background-color: #EEEEEE;"><strong>المجموع</strong></td>
	</tr>
</table>
<?php
	}
?>

<?php

        
    	if(count($all2)>0)
        {
?>

<table  border="1" cellspacing="0" cellpadding="0" class="show_tbl" style="width: 100%;">
<tr class="style1">
		<td class="style8" style="background-color: #EEEEEE;" colspan="5"><strong>المصروفات</strong></td>
	
	
	</tr>
	<tr class="style1">

        		<td class="style8" style="background-color: #EEEEEE;"><strong>المبلغ</strong></td>
		<td class="style8"  style="background-color: #EEEEEE;"><strong>الوصف</strong></td>
			<td class="style8" style="background-color: #EEEEEE;"><strong>م</strong></td>
	</tr>
    
    <?php
$i=1;

 foreach($all2 as $result):





?>
	<tr>
    
		<td class="style8"><?=$result['text1']?></td>
		<td class="style8"><?=$result['text2']?></td>
		<td class="style8"><?=$i?></td>
	</tr>
    
    <?php
	$i++;
    
    endforeach;
?>

	<tr>
		<td class="style3"><center><?php echo $sum_2;?></center></td>
		<td class="style14"  colspan="3" style="background-color: #EEEEEE;"><strong>المجموع</strong></td>
	</tr>
</table><br />
<?php
        }
 
 	if(count($bookedok)>0)  {
        
    

    ?>




<table  border="1" cellspacing="0" cellpadding="0" class="show_tbl" style="width: 100%;text-align: center;">
<tr class="style1">
		<td class="style8" style="background-color: #EEEEEE;" colspan="5"><strong>حركات   روابط الدفع</strong></td>
	
	
	</tr>
	<tr class="style1">
		<td class="style8" style="background-color: #EEEEEE;"><strong>المبلغ</strong></td>
        	<td class="style8" style="background-color: #EEEEEE;"><strong>الوصل</strong></td>
                   	<td class="style8" style="background-color: #EEEEEE;"><strong>الوقت</strong></td>
		<td class="style8"  style="background-color: #EEEEEE;"><strong>اليوزر</strong></td>
        	<td class="style8"  style="background-color: #EEEEEE;"><strong>الشقة</strong></td>
        	<td class="style8"  style="background-color: #EEEEEE;"><strong>م</strong></td>
	
	</tr>
    
    <?php

 $is=0;
$i=1;
 foreach($bookedok as $result):

$is=$is+$result['knet'];

	if($result['timerenew'])$result['timeenter']=$result['timerenew'];
?>
	<tr>
	
        	<td class="style8"><?=$result['knet']?></td>
            	<td class="style8"><?=$result['billprint']?></td>
                   	<td class="style8"><?=date('d   H:i ', 	$result['timeenter'])?></td>
            
		<td class="style8"><?=$result['user']?></td>
        		<td class="style8"><?=$result['room']?></td>
	<td class="style8"><?=$i?></td>
	</tr>
    
    <?php
$i++;
       endforeach; 	
?>

	<tr>
		<td class="style3"><center><?php echo $is;?></center></td>
		<td class="style14"  colspan="3" style="background-color: #EEEEEE;"><strong>المجموع</strong></td>
	</tr>
</table><br />

<?php
}
 	if(count($all3)>0)  {
        
    
?>

<table  border="1" cellspacing="0" cellpadding="0" class="show_tbl" style="width: 100%;">
<tr class="style1">
		<td class="style8" style="background-color: #EEEEEE;" colspan="5"><strong>المتسرجع</strong></td>
	
	
	</tr>
	<tr class="style1">

        		<td class="style8" style="background-color: #EEEEEE;"><strong>المبلغ</strong></td>
		<td class="style8"  style="background-color: #EEEEEE;"><strong>الوصف</strong></td>
			<td class="style8" style="background-color: #EEEEEE;"><strong>م</strong></td>
	</tr>
    
    <?php
$i=1;
$is=0;

 foreach($all3 as $result):





?>
	<tr>
    
		<td class="style8"><?=$result['text1']?></td>
		<td class="style8"><?=$result['text2']?></td>
		<td class="style8"><?=$i?></td>
	</tr>
    
    <?php
	$i++;
    
    endforeach;	
?>

	<tr>
		<td class="style3"><center><?php echo $sum_3;?></center></td>
		<td class="style14"  colspan="3" style="background-color: #EEEEEE;"><strong>المجموع</strong></td>
	</tr>
</table>
<?php
	}
?>
</td>
	</tr>
</table>
      <table style="width: 90%; height: 89px;text-align: center;" >
	<tr>
		<td style="height: 119px" class="style13"><span class="style8"><strong>
		</strong></span><span style="color: rgb(0, 0, 0); font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;" class="style10"><strong>توقيع 
		المدير المالي<br />
		<br />
		..............................</strong></span></td>
		<td style="height: 119px; orphans: auto; widows: 1; -webkit-text-stroke-width: 0px; float: none" class="style8">
		<strong>توقيع المستلم <br />
		<br />
		..............................</strong></td>
		<td style="height: 119px; orphans: auto; widows: 1; -webkit-text-stroke-width: 0px; float: none" class="style8">
		<strong>موظف الاستقبال <br />
		<br />
		..............................</strong></td>
	</tr>
</table>
      
      
<img alt="" src="http://kuwaitycar.com/Untitled-2221.jpg" width="100%" height="100" />
 <footer></footer></div>
      <style>
   
      @media print {
    footer {page-break-after: always;}
}</style>      

<meta http-equiv=refresh content=1;url=<?=base_url() . 'booking/bills/'?>>