<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	
	<title>عقد اتفاق </title>


</head>
<style>
/*
 * Droid Arabic Kufi (Arabic) http://www.google.com/fonts/earlyaccess
 */
@font-face {
  font-family: 'Droid Arabic Kufi';
  font-style: normal;
  font-weight: 400;
  src: url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.eot);
  src: url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.eot?#iefix) format('embedded-opentype'),
       url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.woff2) format('woff2'),
       url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.woff) format('woff'),
       url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Regular.ttf) format('truetype');
}
@font-face {
  font-family: 'Droid Arabic Kufi';
  font-style: normal;
  font-weight: 700;
  src: url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.eot);
  src: url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.eot?#iefix) format('embedded-opentype'),
       url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.woff2) format('woff2'),
       url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.woff) format('woff'),
       url(//fonts.gstatic.com/ea/droidarabickufi/v6/DroidKufi-Bold.ttf) format('truetype');
}
    *{
	padding: 0;
	margin: 0;
	outline: hidden;
}
@font-face {
     font-family:"light";
	 src:url("fonts/ge_ss_two_light.ttf");
	 font-weight:normal;
	 font-style:normal;
}
a{
    font-weight: normal;
    font-style:normal;
}
body{
	direction: rtl;
    font-family:"light";
    font-weight:normal;
    font-style:normal;
}

#alltemplet{
    width: 1000px;
    margin: 20px auto;
    margin-left: 20px;
    padding: 20px;
    border: 5px solid #000;
    overflow: hidden;
}
h3{
    text-align: center;
    font-family: 'Droid Arabic Kufi', Helvetica, sans-serif;
    font-size: 25px;
    margin-bottom: 20px;
}
p{
    font-family:"light";
    font-size: 18px;
    line-height: 40px;
    text-align: justify;
}
.band , .band1 ,.band2 , .band3 {
    font-family: 'Droid Arabic Kufi', Helvetica, sans-serif;
    font-size: 20px;
    font-weight: bold;
}
.band1{
    float: left;
}
.band2{
    float: right;
    margin-right: 200px;
    margin-top: 20px;
    margin-bottom: 100px;
}
.band3{
    float: left;
    margin-left: 200px;
    margin-top: 20px;
    margin-bottom: 100px;
}
.dddsa{
   display: inline-block;
  width: 50px;   border: 0px solid #000000; text-align: center;padding: 3px;font-weight: bold;font-family: serif;    font-size: 22px  ;
}


</style>
<body   onload="window.print();">

    <div id="alltemplet">
       <h3>عقد إيجار</h3>     <h3 style="    float: left;
    margin-top: -50px;
    font-weight: normal;
    font-size: 20px;"><?php
  ////  $row['3gd']= trim( $row['3gd']);
  
      
        echo sprintf("%'.04d\n", intval($row['3gd']));
          echo  ' - '.date("Ym",intval($row['timeenter'])); 

 
    ?></h3>
       <p>أنه فـي يوم : ( <span style="width: 200px; " class="dddsa">  <?php
	     $day = date('D',intval( $row['timeenter']));

$days=array('Sun'=>"الاحد",'Mon'=>"الاثنين",'Tue'=>"الثلاثاء",'Wed'=>"الاربعاء",'Thu'=>"الخميس",'Fri'=>"الجمعة",'Sat'=>"السبت");
echo $days[$day];
?>  </span>	)	 الـموافـق :   ( <span style="width: 200px; " class="dddsa">  <?=date(' d / m / Y   ', 	$row['timeenter'])?> </span>	)    </p>
       


       <p>
        <span class="band">أولاً:</span> <?php

       ?>
      		  مؤسسة  ( <span style="width: 200px; " class="dddsa">  ماجيستك العقارية </span>	)     ترخيص  رقم    ( <span style="width: 200px; " class="dddsa">  2015/4337 </span>	) 
                
                <?php 
    
?>	<span class="band1">"طرف أول "</span>        
      <br>
       <span class="band">ثانياً:</span> 
 السيـــد: ( <span style=" width: 300px;  " class="dddsa"> <?php echo $row['name'];?> </span>	)  <span class="band1">"طرف ثاني "</span> 
           <br>         
            الجنسية:  ( <span style=" width: 200px;  " class="dddsa">
            
             <?php echo $row['country'];?>
              <?php
            
         $billal=$row['bill']/$row['day'];
          ///  $billal=46;
    if($billal >= 56)
{
$numf1sd=' ستون ';
$billal=60;	
}

    elseif($billal >= 51)
{
$numf1sd='خمسة وخمسون';
$billal=55;	
}
    elseif($billal >= 46)
{
$numf1sd='خمسون';
$billal=50;	
}
elseif($billal >= 41)
{
$numf1sd='خمسة واربعون ';
$billal=45;	
}
elseif($billal >=  36)
{
$numf1sd='اربعون';	
$billal=40;
}
elseif($billal >=  31)
{
$numf1sd='خمسة وثلاثون';	
$billal=35;
}
elseif($billal <= 30)
{
$numf1sd='ثلاثون';
$billal=30;
	
}
       
            ?></span>	)  / رقم البطاقة المدنية:  ( <span style=" width: 200px;  " class="dddsa"> <?php echo $row['cid'];?> </span>	)
            <br>
أجر الطرف الأول شقة رقم : ( <span style=" width: 50px;  " class="dddsa"> <?php echo $row['room'];?> </span>	) من بناية 

      <?php
      
 
     if(@stristr($_SERVER['REQUEST_URI'],'booking3')){
           echo "   الفروانية قطعة 4 شارع 116 بالعمارة رقم 716";
        }
        elseif(@stristr($_SERVER['REQUEST_URI'],'booking2')){
             echo "   بالعمارة رقم (31) الكائنة ,بالسالمية قطعة (6) ش (8) جادة (5)";
        }
         elseif(@stristr($_SERVER['REQUEST_URI'],'booking4')){
             echo "  الرقعي ق 1 شارع 103 بناية رقم 113";
        }  elseif(@stristr($_SERVER['REQUEST_URI'],'booking5')){
             echo "  الشعب ق 8 شارع 81 بناية رقم 125";
        }
        elseif(@stristr($_SERVER['REQUEST_URI'],'booking6')){
             echo "   بالعمارة رقم (23) الكائنة ,بالسالمية قطعة (6) ش (5) ";
        }else
        { echo " حولي قطعة 1 شارع ابن رشد رقم 15";
         
        }
 
    
    ?>           
        </p>
       
       
        <h3>  ( وفقـــاً للشـــروط الـتـاليــه )</h3>
        <p><span class="band">أولاً:</span>  مده هذا العقد تبدا من تاريخ  ( <span style="width: 200px; " class="dddsa">  <?=date(' d / m / Y   ', 	$row['timeenter'])?> </span>	)  وتنتهي في تاريخ إخلاء العين المؤجرة وتسليمة للمفتاح للطرف الأول على  أن تكون العين بالحاله التى تسلمها بها الطرف الثاني صالحه للتأجر . 
        <br>
        <span class="band">ثانياً:</span>
      القيمـــة الإيجـــاريـــة المتفــــق عليهــــــا :
        <br>
أ- الأجــره اليوميــة للعـــين هــي ( <span style=" width: 200px;  " class="dddsa"> <?=$billal?> </span>	)  د.ك فقط ( <span style=" width: 200px;  " class="dddsa"> <?=$this->booking->numtoarb($billal)?> دينار  </span>	)  فقط لاغير . 
        <br>
        
ب- الأجـرة الشهريـة للعيـن هـــي ( <span style=" width: 200px;  " class="dddsa"> 900 </span>	)  د.ك فقط ( <span style=" width: 200px;  " class="dddsa"> تسعمائة دينار  </span>	)  فقط لاغير .
        <br>
ويرغب الطرف الثاني بتأجير العين بأجره شهريه وفي حال رغبته بعدم الاستمرار في التأجير لمدة شهر           تتم المحاسبه لفترة الإشغال على أساس يومي أو سداد أجرة شهر كامل أيهما أكثر  .   
       <br>
       <span class="band">ثالثاً:</span> يتم سداد الأجره مقدماً عن التوقيع على هذا العقد أو في أى مدة مجددة بشرط قبول الطرف الأول بالتجديد        .
       <br>
وفي حالة عدم سداد الأجره بعد إنتهاء المدة التي شغل بها الطرف الثاني العين بأربعة وعشرين ساعة فقط فوض وقبل الطرف الثاني بقيام الطرف الأول بإخلاء العين المؤجره وإخراج أيه موجودات ومنقولات تخصه ، مع التعهد خلال 48 ساعة وإلا حق للطرف الثاني التخلص منها مع إقرار الطرف الثاني بعدم وجود أيه أغراض ثمينه طيله فترة التأجير وبخاصة أن العين خاضعة للتنظيف اليومي بواسطة إدارة المؤسسة .   
       <br>
        <span class="band">رابعاً:</span>
يقر المستأجر بأنه عاين العين المؤجرة وتسلم جميع الأغراض الموصوفه في الكشف المرفق بحالة صالحه للإستعمال ويتعهد بالمحافظة عليها وتسليمها بالحالة التي كانت عليها عند إنتهاء التعاقد .       
       <br>
	ويتعهد بسداد قيمة أى تلف في العين بسبب سوء الإستخدام وفقاً لتحديد القيمة من قبل الطرف الأول.       
       <br>
        <span class="band">خامساً:</span>  
لا يجوز إستخدام المستأجر للعين بما ينافي القوانين والأنظمه المعمول بها في البلاد ، ومن المتفق عليه أن إستإجار العين بغرض السكن الخاص ولا يجوز أستقبال الزوار فيها ويكون ذلك فقط في اللوبي .         
       <br>
وفـي حــالة المخالفـــة يعتبـــرهــــذا العقـــد مفســـــوخاً مـــــن تلقـــاء نفســـه دون حـاجــة للتنبيــــه أو الإنـــــذار ويطبـــــق الإخـــلاء الـــوارد في البنــــد الثـــالــث .       
       <br>
        <span class="band">سادساً:</span>  


        
للطـــرف الأول وحــده حــــق قبـول تجديـد العقـد وتحديــد الأجـــرة الجديدة ويحق له دائماً طلب إخلاء العين في أي وقت يراه دون إبداء الأسباب.       
       <br>
       <br>
        <span class="band2">الطرف الأول</span> 
        <span class="band3">الطرف الثاني</span> 
    </div>
	<div align="right"  dir="ltr">

            اسم المستخدم:	<?php echo $row['user'];?>  <br> -             <?= $this->booking->tissme_show($row['timeenter']); ?><br> <?=$row['id']?><footer></footer></div>
    
      <style>
   
      @media print {
    footer {page-break-after: always;}
}</style>      

>

<br /><br />
          <br /><br />   <div id="alltemplet">
       <h3> </h3>     

       


   
       
       
        <h3 style="    font-size: 45px;">  ( إقرار وتعهد )</h3><br /><br />
        <p style="    font-size: 35px;"> <span class="band">أقر انا ( <span style=" width: 300px;  " class="dddsa"> <?php echo $row['name'];?> </span>	) أحمل <?php echo $row['noa'];?>  رقم  ( <span style=" width: 200px;  " class="dddsa"> <?php echo $row['cid'];?> </span>	)  بأننى قد أجرت شقة رقم ( <span style=" width: 200px;  " class="dddsa"> <?php echo $row['room'];?> </span>	)
        
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
        
       
           وعلى علم تام بما فيها من محتويات ، وأتعهد بتحمل مسئولية فقدان أى من أغراضى الخاصة ، والإلتزام بمواعيد الخروج بالوقت المحدد الساعة 12 ظهراً ، وان ألتزم بعدم استقبال الزوار ،  ومراعاتى كافة الشروط والتعليمات التى تصدر من الإدارة والمسؤلين بها ، وفى حالة مخالفتى لهذه الشروط تتخذ الإدارة الاجراء اللازم فى ألغاء العقد وأكون متحملا المسئولية كاملة .
        <br /><br /> <h3> 
وهذا اقرار منى بذلك</h3>     

</span>   <br>
     
    <br /><br />   <span class="band">المقر بما ورد أعلاه</span> <br /><br /><br />
        <span class="band" align="right">الاسم  : ......................................................................................</span> <br /><br />
        <br /><br />
           <span class="band">التوقيع  : ......................................................................................</span> 
    </div>
 <div id="alltemplet">
       <h3 style="font-size: 35px;"><strong>فاتورة </strong></h3>     
       
       
       <table style="width: 90%" dir="rtl">
			
			<tr>
			
					<td valign="top" style="text-align: right;">
			<p>	اسم العميل : &nbsp;&nbsp;( <span style=" width: 350px;  " class="dddsa"> <?php echo $row['name'];?> </span>	)<br />
		الجنسية&nbsp; : &nbsp;&nbsp;( <span style=" width: 75px;  " class="dddsa">

<?php echo $row['country'];?> 
                
                </span> )<br />
			رقم <?php echo $row['noa'];?> :&nbsp;&nbsp; ( <span style=" width: 150px;  " class="dddsa"> <?php echo $row['cid'];?> </span>	)</p>	 </td>
            <td  valign="top" style="width: 300px;">
			 <p>	رقم الفاتورة: <span  class="dddsa"><?=($row['id'])?></span><br />
				تاريخ الفاتورة : <span style=" width: 150px;  " class="dddsa"><?=date(' d / m / Y   ', 	$row['timeenter'])?> </span> </p></td>
			
			
			</tr>
		</table>
                   <style type="text/css">

.style2 {
	border: 1px solid #000000;
    text-align: center;
}

</style>
 <p>استملنا نحن مؤسسة ماجيستك العقارية  مبلغ وقدره   ( <span style="width: 50px;font-size: 35px " class="dddsa"> <?=$row['bill']?> </span>  )    د.ك فقط    ( <span style="width: 300px; " class="dddsa"> <?=$this->booking->numtoarb($row['bill'])?> دينار كويتي</span> )وذلك عن  :  </p>
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
      <h3 style="    font-size: 30px;"> المبلغ المدفوع غير قابل للاسترجاع</h3> 
   
   
        
        
        <p class="dddsa" style="width: 100%;margin-top: -150px;">
        
                <?php
                //     <span class="band3">توقيع الموظف<br />......................</span> 
     if(!@stristr($_SERVER['REQUEST_URI'],'booking2')){
      //     echo "   بالعمارة رقم (15) الكائنة ,بحولي شارع ابن رشد قطعة (1) )";
        }else
        {
     //       echo "  العنوان : السالمية متفرع من ش البحرين خلف مطعم الريف المصرى قطعة 6 ش 8 جادة 5 عمارة رقم 31                 <br /> ت/ 65668010  ";
        }
 
    
    ?>
        
        
       </p>
    </div>
</body>
</html>
<meta http-equiv=refresh content=1;url=<?=base_url() . 'booking/dashboard/'?>>
<?php
	////
	
?>