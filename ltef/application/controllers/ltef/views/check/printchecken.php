 <!DOCTYPE html>
<html lang="ar"  >
    <head>
        <meta charset="utf-8">
  

</head>
<style >
    
    @page {size: landscape}
    @media print{@page {size: landscape}}

</style>
<body   onload="window.print();" style="  
    font-size: 19px;width: 750px   ; direction: rtl;
   "  >



<div style=" background-color: red;margin-top: 320px; height: 100px ">
    
    
<div  style="    background-color: beige;
    text-align: right;
    padding-right: 20px;">              <?= (substr($show['dateadd'],0,4)).'/'.substr($show['dateadd'],4,2).'/'.(substr($show['dateadd'],6,2))?></div>


   <div  style="  
          text-align: right;
  
          padding-right: 20px;

   padding-top: 40px;
  

    background-color: green;">       #<?=$show['text1']?>#
</div>
<div  style=" 
        text-align: right;
    margin-right: 150px;
    margin-top: -135px;
    height: 75px;
    width: 350px;
    float: right;
    font-size: 16px;
    background-color: blue;"><table style="width: 100%;
    height: 100%;">

  <tr>
      <td valign="bottom" style="direction: ltr;text-align: left">             <?=$show['text2']?>        </td>
  </tr>
</table>   </div>
    
    <div  style="      text-align: right;
    margin-right: 215px;
     margin-top: -50px;
    height: 75px;
    width: 400px;
    float: right;
    background-color: yellow;">    <table style="width: 100%;
    height: 100%;">

  <tr>
    <td valign="top">              <?=$first_sum?> 
                                      
    دينار كويتي  
 <?php if(strlen($secound_sum)>2){?>
                                                          و
                                                           <?=  $secound_sum?>
                                                            فلس
                                                                <?php } ?> لاغير   </td>
  </tr>
</table>  </div>
    <div style="padding-top: 50px;">
 
        </div>
</body>
<meta http-equiv=refresh content=300;url=<?=base_url() . 'ltef/check/'?>>
</html>