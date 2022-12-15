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
       <h3 style="font-size: 42px;text-align: center"><strong>الادارة العامة لمباحث شئون الاإقامة </strong>
           
           <br><strong>   قسم متابعة الفنادق والشقق الفندقية  </strong></h3>   
        
       <br>   <h3 style="font-size:37px;text-align: center" dir="ltr"><strong>
                
               <?php 
               
               
               if($noo3=='in')echo "   تاريخ الوصول : ";
               else echo "   تاريخ المغادرة : ";
                   ?>
               
                <?=date('d-m-Y', $datetext41)?>
                
                </strong></h3>   
       <table style="width: 90%" dir="rtl">
			
		
		</table>
                   <style type="text/css">

.style2 {
	border: 1px solid #000000;
    text-align: center;
    font-size: 32px
}
#alltemplet{
    width: 1000px;
    margin: 20px auto;
    margin-left: 20px;
    padding: 20px;
    border: 5px solid #000;
    overflow: hidden;
    min-height: 1300px
}

</style>

     <table style="width: 90%" >
			<tr>
			<td class="style2">&nbsp;  م</td>
				<td class="style2">&nbsp;  الاسم</td>
				<td class="style2">&nbsp; الجنسية </td>
				<td class="style2">&nbsp; رقم الجواز - المدني</td>
			<td class="style2">&nbsp; رقم الغرفة

</td>
			</tr> 
                          <?php
            $count = 0;
            foreach ($all_groups as $rows):
                
           $count++;
                ?>
			<tr>
                            <td class="style2"><?php echo $count;?></td>
                            	<td class="style2"><?php echo $rows['name'];?></td>
                                	<td class="style2"><?= $rows['country']; ?></td>
                                        	<td class="style2"><?php echo $rows['cid'];?></td>
                            
				<td class="style2"><?php echo $rows['room'];?></td>
				
			
                                
                 
				
			</tr>
                        
                        <?php endforeach; ?>
		</table>
 
       
   
     
    </div>

</body>

<meta http-equiv=refresh content=100;url=<?=base_url() . 'booking/dashboard/'?>>
</html>
