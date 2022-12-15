 <!DOCTYPE html>
<html lang="ar"  >
    <head>
        <meta charset="utf-8">
  
<style>
div.ex1 {
   width: 340px;
    margin: auto;
    /*border: 3px solid #000;*/
    height: 680px;
    float: left;
    /*color: red;*/
}

.div_date
{
    width: 98px;
    /* border: 3px solid #000; */
    transform: rotate(270deg);
    margin-top: 45px;
    margin-left: 33px;
}
.div_name
{
    margin-top: 386px;
    width: 350px;
    /* border: 3px solid #000; */
    position: relative;
    transform: rotate(270deg);
    margin-left: -115px;
    text-align: right;
}
.div_money_number{
    width: 463px;
    /* border: 3px solid #000; */
    transform: rotate(270deg);
    margin-top: 35px;
    text-align: right;
    margin-left: -79px;


}
.div_money_txt
{
width: 350px;
    text-align: right;
    /* border: 3px solid #000; */
    transform: rotate(270deg);
    margin-top: -430px;
    margin-left: 10px;
    font-size: 30px;
}
</style>
</head>

<body  onload="window.print();" style="margin: 1px;   margin-left: 390px;
    font-size: 30px;
    margin-top: 45px;"  >

<div class="ex1">
    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class=" div_date" style="; ">
            <?= (substr($show['dateadd'],0,4)).'/'.substr($show['dateadd'],4,2).'/'.(substr($show['dateadd'],6,2))?>
        </div>
        <div  dir="rtl" lang="ar" class="div_name" style="width: 400px; ">
         <?=$show['text2']?>
        </div>
        <div  dir="rtl" lang="ar" class="div_money_number" style=" ">
           <?=$first_sum?> 
                                      
    دينار كويتي 
 <? if(strlen($secound_sum)>2){?>
                                                          و
                                                           <?=  $secound_sum?>
                                                            فلس
                                                                <?}?> لاغير
        </div>
        <div class="div_money_txt" style=" ">
          #<?=$show['text1']?>#
        </div>
    </div>
<!--    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class=" div_date" style="; ">
          
        </div>
        <div class="div_name" style=" ">
           ali ahmed ali 
        </div>
    </div>
    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class=" div_date" style="; ">
          
        </div>
        <div class="div_name" style=" ">
           ali ahmed ali 
        </div>
    </div>-->
</div>
<br>



</body>
<meta http-equiv=refresh content=1000;url=<?=base_url() . 'ltef/check/'?>>
</html>