<?php

?><!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	
	<title>عقد اتفاق </title>
	<link rel="stylesheet" type="text/css" href="../Mktba/Models/booking/style.css">

</head>
<style>
.dddsa {
    display: inline-block;
    width: 50px;
    border: 0px solid #000000;
    text-align: center;
    /* padding: 3px; */
    font-weight: bold;
    font-family: serif;
    font-size: 15px;
}p {
    font-family: "light";
    font-size: 15px;
    line-height: 30px;
    text-align: justify;
}


</style>
<body style=" direction: rtl" onload="window.print();">

    <div id="alltemplet">
       <h3 style="font-size: 35px;text-align: center"><strong>فاتورة </strong></h3>     
       
       
       <table style="width: 90%" dir="rtl">
			
			<tr>
			
					<td valign="top" style="text-align: right;">
			<p>	اسم العميل : &nbsp;&nbsp;( <span style=" width: 350px;  " class="dddsa"> <?php echo $row['name'];?> </span>	)<br />
		الجنسية&nbsp; : &nbsp;&nbsp;( <span style=" width: 75px;  " class="dddsa"> <?php 
            
        
           echo $row['country'];

           
?></span> )<br />
			رقم <?php echo $row['noa'];?> :&nbsp;&nbsp; ( <span style=" width: 150px;  " class="dddsa"> <?php echo $row['cid'];?> </span>	)</p>	 </td>
            <td  valign="top" style="width: 300px;">
			 <p>	رقم الفاتورة: <span  class="dddsa"><?=($row['id'])?></span><br />
				تاريخ الفاتورة : <span style=" width: 100px;  " class="dddsa"><?=date(' d / m / Y   ', 	$row['timeenter'])?> </span> </p></td>
			
			
			</tr>
		</table>
                   <style type="text/css">

.style2 {
	border: 1px solid #000000;
    text-align: center;
}

</style>
 <p>استملنا نحن مؤسسة ماجيستك العقارية  مبلغ وقدره   ( <span style="width: 50px; " class="dddsa"> <?=$row['bill']?> </span>  )    د.ك فقط    ( <span style="width: 250px; " class="dddsa"> <?=$this->booking->numtoarb($row['bill'])?> دينار كويتي</span> )وذلك عن  :  </p>
     <table style="width: 90%" >
			<tr>
				<td class="style2">&nbsp;شقة رقم

</td>
				<td class="style2">&nbsp;فترة الاقامة</td>
				<td class="style2">&nbsp;تاريخ الدخول</td>
				<td class="style2">&nbsp;تاريخ الخروج</td>
	
			</tr>
			<tr>
				<td class="style2"><?php echo $row['room'];?></td>
				<td class="style2"><?php if($row['day']==1)echo " يوم واحد  \n"; 

if($row['day']==2)echo"  يومين  \n"; 

if(intval($row['day'])>2)echo      $row['day']."  ايام \n "; 

	if($row['timeend2'])$row['timeend']=$row['timeend2'];

 ?></td>
				<td class="style2"><?=$this->booking->tissme_show($row['timeenter'])?></td>
				<td class="style2"><?=$this->booking->tissme_show($row['timeend'])?></td>
	
			</tr>
		</table>

     
 <p>
      <h3 style="    font-size: 30px;"> المبلغ المدفوع غير قابل للاسترجاع</h3> <br>  
   
        <span class="band3">توقيع الموظف<br />......................</span> 
        <p class="dddsa" style="width: 100%;margin-top: -150px ; direction: rtl">العنوان  :
             <?php
     if(@stristr($_SERVER['REQUEST_URI'],'booking3')){
           echo "   الفروانية قطعة 4 شارع 116 بالعمارة رقم 716";
        }
        elseif(@stristr($_SERVER['REQUEST_URI'],'booking2')){
             echo "   بالعمارة رقم (31) الكائنة ,بالسالمية قطعة (6) ش (8) جادة (5)";
        } elseif(@stristr($_SERVER['REQUEST_URI'],'booking4')){
             echo "  الرقعي ق 1 شارع 103 بناية رقم 113";
        }elseif(@stristr($_SERVER['REQUEST_URI'],'booking5')){
             echo "  الشعب ق 8 شارع 81 بناية رقم 125";
        }  elseif(@stristr($_SERVER['REQUEST_URI'],'booking6')){
             echo "   بالعمارة رقم (23) الكائنة ,بالسالمية قطعة (6) ش (5) ";
        }elseif(@stristr($_SERVER['REQUEST_URI'],'booking8')){
             echo "   بالعمارة رقم (11) الكائنة ,بالفنطاس قطعة (3) ش (7) ";
        }else
        { echo "   بالعمارة رقم (15) الكائنة ,بحولي شارع ابن رشد قطعة (1) )";
         
        }
 
    
    ?>
            
        </p>
    </div>

</body>
<meta http-equiv=refresh content=1;url=<?=base_url() . 'booking/dashboard/'?>>
</html>
