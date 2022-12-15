<div class=Section1 dir=RTL   >


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><meta http-equiv="Content-Type" content="text/html; charset=cp1256">
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
<img alt="" src="http://kuwaitycar.com/Untitled-1.jpg" width="100%" height="103" /></p><br /><br />
<p class="style21"><strong>استلام راتب</strong></p><br />
<table style="width: 75%; height: 100px" align="center" class="style22">
	<tbody class="style36">
	<tr>

        
		<td class="style24" style="  background-color: bisque;"><strong>رقم البطاقة المدنية <br />Civil ID No.</strong></td>
		<td class="style35" style="  background-color: bisque;"><strong>الجنسية<br />Nationality</strong></td>
        	<td class="style35" style="  background-color: bisque;"><strong>المسمى الوظيفي <br />Jop Title</strong></td>
		<td class="style25" style="  background-color: bisque;"><strong>اسم الموظف <br /> Employee Name</strong></td>
	</tr>
	<tr>
    		<td class="style35" style="width: 35%"><strong>	<?php echo $row['text2'];?></strong></td>
		<td class="style35"><strong>	<?php echo $row['text3'];?></strong></td>
	
    
    
    
    
		<td class="style35">	<strong><?php echo $row['text12'];?></strong></td>
		<td style="width: 35%" class="style35"><strong><?=$row['text1']?><br /><?=$row['text11']?></strong></td>
	</tr>
</table>
<p class="style36"><br />
</p><br />
<p class="style30" ><strong>راتب شهر&nbsp; <?= (substr($this->thismon,4,2)).' / '.substr($this->thismon,0,4)?></strong></p>
<br />
<table style="width: 50%; direction: ltr;" class="style2" align="center">
	<tr>
		<td class="style31" style="width: 204px; ">
		<span lang="en-us" class="style32"><strong>	<?php echo $row['text4'];?></strong></span></td>
		<td class="style31" style="  background-color: bisque;"><strong>الراتب الشهري<br />Monthly Basic Salary</strong></td>
	</tr>
	<tr>
		<td class="style35" style="width: 204px;">
		<span lang="en-us"><strong>	<?php echo $row['text14'];?></strong></span></td>
		<td class="style31" style="background-color: bisque;"><strong>مكافأة وحوافز<br />Reward & Incentive</strong></td>
	</tr>
	<tr>
		<td class="style35" style="width: 204px; ">
		<span lang="en-us"><strong><?= $row['all']; ?></strong></span></td>
		<td class="style31" style="background-color: bisque;"><strong>خصومات واستقطاعات <br />Deductions</strong></td>
</tr>
	<tr>
		<td class="style35" style="width: 204px; ">
		<span lang="en-us"><strong><?= ((intval($row['text4']) +intval($row['text14']))-($row['all'])); ?> </strong></span></span></td>
		<td class="style31" style="background-color: bisque;"><strong>صافي الراتب <br />Total Salary</strong></td>
	</tr>
</table>
<p class="style36"><br />
</p>
<table style="width: 100%" class="style36">
	<tbody class="style36">
	<tr>
		<td class="style29">توقيع المدير المالي<br /><br /> Financial Manager Signature</td>
		<td class="style29">توقيع المستلم<br /><br />Receiver Signature
</td>
	</tr>
	<tr>
		<td class="style29"><br />
		.............................</td>
		<td class="style29"><br />
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