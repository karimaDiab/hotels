<?php

?><!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
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
  <h3 style="font-size: 35px;text-align: right;padding-top: 50px"><strong> السيد / مدير عام الادارة العامة لمباحث شئون الاقامة  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   المحترم</strong>
           
           <br><strong>  السيد / رئيس قسم متابعة الفنادق والشقق الفندقية &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   المحترم</strong>
    <?php 
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
      $dept=$uriSegments[1];
      if($dept == 'booking6')
  {
      $num='(152)';
  } else  if($dept == 'booking4')
  {
      $num='(157)';
  }
   else 
  {
      $num='(....)';
  }

    ?>   
       
  <br><strong>       تحية طيبه وبعد ....  </strong></h3>  </h3>   
  <br>   <h3 style="font-size: 32px;text-align: center" dir="rtl"><strong>

           الموضوع :  ماجيستك للشقق الفندقية  ملف رقم <?=$num?> </strong></h3>   
       
        <h3 style="font-size: 32px;text-align: center" dir="ltr"><strong>
                
       نرسل الى سيادتكم عدد النزلاء المغادرون    </strong></h3> 
       <table style="width: 90%" dir="rtl">
			
		
  </table>
                   <style type="text/css">

.style2 {
	border: 1px solid #000000;
    text-align: center;
}
#alltemplet{
    width: 1000px;
    margin: 20px auto;
    margin-left: 20px;
    padding: 20px;
    border: 5px solid #000;
    overflow: hidden;
    min-height: 1300px;
     
}

</style>

     <table style="width: 90%" >
			<tr>
	
				<td class="style2">&nbsp;  اليوم</td>
				<td class="style2">&nbsp; التاريخ </td>
				<td class="style2">&nbsp;عدد النزلاء </td>
			<td class="style2">&nbsp;عدد المغادرون

</td>
			</tr>
       
			<tr>
			    <?php
	

        $days = array('Sun' => "الاحد  ", 'Mon' => "الاثنين", 'Tue' => "الثلاثاء", 'Wed' => "الاربعاء", 'Thu' => "الخميس", 'Fri' => "الجمعة", 'Sat' => "السبت");
 $day = date('D', $datetext41);
			    
			    ?>
                          
                             	<td class="style2"> <?=$days[$day] ?></td>
                                	<td class="style2"> <?=date('Y-m-d', $datetext41)?></td>
                                        	<td class="style2"> <?=$all_groups_all1?></td>
                            
				<td class="style2"><?=$all_groups_all2?></td>
				
			
                                
                 
				
			</tr>
                        
                    
		</table>
<br><br>
         <h3 style="font-size: 32px;text-align: center" dir="rtl"><strong>
                
        وتقبلوا وافر التحية  ,,,        </strong></h3> 
   
     
<br><br><br><br><br><br>
         <h3 style="font-size: 32px;text-align: right" dir="rtl"><strong>
                
     المرفقات : 
         <br>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1- كشف النزلاء والمغادرون
             </strong></h3> 
</div>

</body>
<meta http-equiv=refresh content=100;url=<?=base_url() . 'booking/dashboard/'?>>
</html>
