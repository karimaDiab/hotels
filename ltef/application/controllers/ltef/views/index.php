
<?php
$query = $this->db->query('SELECT * FROM `model_knet` ORDER BY `model_knet`.`id` DESC limit 1');
$blance = $query->row_array();

$url = 'http://62.150.26.41/SmsWebService.asmx/authentication';

$params = array(
    'username' => 'Electron',
    'password' => 'rRrRNcAe',
    'token' => 'hjazfzzKhahF3MHj5fznngsb',
    'sender' => 'Majestic',
    'type' => 'text',
    'coding' => 'unicode',
    'datetime' => 'now'
);

$paramsd = array(
    'username' => 'aln3esa',
    'password' => 'Dx7caYjP',
    'token' => 'Y3K3T3cFDzn3y5WkzZx6Wsbq',
    'type' => 'text',
    'coding' => 'unicode',
    'datetime' => 'now'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);


$result = curl_exec($ch);
if (curl_errno($ch) !== 0) {
    error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
}

curl_close($ch);
$result = explode(",", $result);
echo $result[1];
$dd1 = 9250;
$query = $this->db->get_where('model_billshawly', " `dateadd` LIKE '%$this->thismon%' and text1='$dd1'  and text30='2'");
$checkcc = $query->row_array();
if (isset($checkcc['text1'])){
    $dd1 = 0;
 }
$dd2 = 13000;

$query = $this->db->get_where('model_billshawly', " `dateadd` LIKE '%$this->thismon%' and text1='$dd2'  and text30='1'");
$checkcc = $query->row_array();
if (isset($checkcc['text1']))
    $dd2 = 0;
$dd3 = 1850;
$dd4 = 0;
$dd5 = 7800;
$query = $this->db->get_where('model_billshawly', " `dateadd` LIKE '%$this->thismon%' and text1='$dd5'  and text30='7'");
$checkcc = $query->row_array();
if (!isset($checkcc['text1']))
    $checkcc['text1'] = 0;
if ($checkcc['text1'] == $dd5)
    $dd5 = 0;
$dd8 = 12480;
$query = $this->db->get_where('model_billshawly', " `dateadd` LIKE '%$this->thismon%' and text1='$dd8'  and text30='8'");
$checkcc = $query->row_array();
if (!isset($checkcc['text1']))
    $checkcc['text1'] = 0;
if ($checkcc['text1'] == $dd8)
    $dd8 = 0;
$dd9 = 20000;
$query = $this->db->get_where('model_billshawly', " `dateadd` LIKE '%$this->thismon%' and text1='$dd9'  and text30='9'");
$checkcc = $query->row_array();
if (!isset($checkcc['text1']))
    $checkcc['text1'] = 0;
if ($checkcc['text1'] == $dd9)
    $dd9 = 0;


$dd10 = 5500;
$query = $this->db->get_where('model_billshawly', " `dateadd` LIKE '%$this->thismon%' and text1='$dd10'  and text30='10'");
$checkcc = $query->row_array();
if (!isset($checkcc['text1']))
    $checkcc['text1'] = 0;
if ($checkcc['text1'] == $dd10)
    $dd10 = 0;


$dd11 = 6660;
$query = $this->db->get_where('model_billshawly', " `dateadd` LIKE '%$this->thismon%' and text1='$dd11'  and text30='11'");
$checkcc = $query->row_array();
if (!isset($checkcc['text1']))
    $checkcc['text1'] = 0;
if ($checkcc['text1'] == $dd11)
    $dd11 = 0;

function alldb($us, $db, $Monnum, $day) {

    $dbhost = "localhost"; // C?ICI?
    $dbuser = "kuwaityc_book";  // ??? ??EII? ?C?IE C?E?C?CE
    $dbpass = "Qaz*123123";     // EC????I ?C?IE C?E?C?CE
    $dbname = "kuwaityc_$db"; // ??? ?C?IE C?E?C?CE


    if (@mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
        $mysqli22 = new mysqli($dbhost, $dbuser, $dbpass, $dbname);




        $totall1 = 0;
        $totall2 = 0;
        $totall3 = 0;
        $totall6 = 0;






        $totall = 0;
$sumall=0;
        $result = mysqli_query($mysqli22, "SELECT SUM(text1) AS value_sum FROM model_billshawly  where catid='1' and  `dateadd` LIKE '%$Monnum%'");
        if($result)$row = mysqli_fetch_array($result);
        if(isset($row['value_sum']))$sumall = $row['value_sum'];

        $result = mysqli_query($mysqli22, "SELECT SUM(text1) AS value_sum FROM model_billshawly  where catid='8' and  `dateadd` LIKE '%$Monnum%'");
        if($result)$row = mysqli_fetch_array($result);
        if(isset( $row['value_sum']))  $sumall = $sumall - $row['value_sum'];
      

      



        $datasdd = strtotime(date('d-m-Y', $day) . "  00:00");
        $datasdd1 = strtotime(date('d-m-Y', $day) . "  12:00");
        $result = @mysqli_query($mysqli22, "SELECT SUM(knet) AS value_sum FROM booking   where  knet!='' and timeenter BETWEEN $datasdd AND $datasdd1  ");
        if($result)$row = @mysqli_fetch_array($result);
        if (!isset($row['value_sum']))
            $row['value_sum'] = 0;
        $sum4 = $row['value_sum'];


        

        return array('', 0,0, $sumall, $sum4);
    }
}

$Monnum = $this->thismon;
$ddd1 = alldb("booking", "booking", $Monnum, $this->booking->tissme_now());
$ddd2 = alldb("bookin2", "booking2", $Monnum, $this->booking->tissme_now());
$ddd3 = alldb("bookin3", "ltef", $Monnum, $this->booking->tissme_now());
//$ddd4=alldb("booking","bookingf",$_POST['sqlkod'],"12757716");
$ddd5 = alldb("booking", "booking4", $Monnum, $this->booking->tissme_now());

$ddd8 = alldb("booking", "booking5", $Monnum, $this->booking->tissme_now());
$ddd9 = alldb("booking", "booking6", $Monnum, $this->booking->tissme_now());

$ddd10 = alldb("booking", "booking7", $Monnum, $this->booking->tissme_now());
$ddd11 = alldb("booking", "booking8", $Monnum, $this->booking->tissme_now());
$ddd1[0] = $all_modif_2;
$ddd1[1] = $sum_modif_2;

$ddd2[0] = $all_modif_1;
$ddd2[1] = $sum_modif_1;


$ddd5[0] = $all_modif_3;
$ddd5[1] = $sum_modif_3;


$ddd8[0] = $all_modif_4;
$ddd8[1] = $sum_modif_4;


$ddd9[0] = $all_modif_5;
$ddd9[1] = $sum_modif_5;

$ddd10[0] = $all_modif_8;
$ddd10[1] = $sum_modif_8;


$ddd11[0] = $all_modif_9;
$ddd11[1] = $sum_modif_9;

$ddd3[0] = $all_modif_7 + $all_modif_6;
$ddd3[1] = $sum_modif_7 + $sum_modif_6;

$all_knetno = $ddd1[4] + $ddd2[4] + $ddd5[4];
?>

<div class="row">

    <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="box-footer">
                <div class="row">

<?php if ($this->session->userdata('name') == 'aln3esa'): ?>


                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= ($all_bank + $all_bank2) ?></h5>

                                <a href="<?= base_url() ?>/ltef/bank/all/" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  السابق</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= ($all_bank2) ?></h5>

                                <a href="<?= base_url() ?>/ltef/bank/all/20/5/5" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  خارجية</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>




                        <div class="col-sm-2 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill ?></h5>

                                <a href="<?= base_url() ?>/ltef/bills/all/" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  الحالي</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_cach ?></h5>

                                <a href="<?= base_url() ?>/ltef/cach/all/" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الكاش</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_salry ?></h5>
                                <a href="<?= base_url() ?>/ltef/salry/all/" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> معتمدين</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_cachout ?></h5>
                                <a href="<?= base_url() ?>/ltef/cach2/all/" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> تصدير</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>


                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_ohda ?></h5>
                                <a href="<?= base_url() ?>/ltef/bills2/all/" class="btn btn-block btn-success"  style="margin-bottom:5px">    العهدة
                                </a>                   </div>
                            <!-- /.description-block -->
                        </div> 
                        <?php
                        ////   if($all_ohda<0)$all_ohda=$all_ohda-$all_ohda-$all_ohda;
                        ?>


                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_deyoon ?></h5>
                                <a href="<?= base_url() ?>/ltef/deyoon/all/" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">الديون</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= ceil($all_payment) ?></h5>
                                <a href="<?= base_url() ?>/ltef/payment/all/1/1/" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">اون لاين</span></a> 

                            </div>
                            <div class="description-block">
                                <h5 class="description-header"></h5>

                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= ($all_banknow - $all_knetno - $all_cachout - $all_deyoon - $all_ohda - $all_payment) ?></h5>
                                <h5 class="description-header"><?= ceil($blance['blance'] - ($all_banknow - $all_knetno - $all_cachout - $all_deyoon - $all_ohda - $all_payment)) ?></h5>

                                <span class="btn btn-block btn-success">  البنك</span>
                            </div>
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_knetno ?></h5>
                                <span class="description-text">  كي نت لم يصل</span>
                            </div>


                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-1 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= ($all_all + $all_bank2) ?></h5>
                                <span class="btn btn-block btn-success">  الكلي</span>
                            </div>
                            <!-- /.description-block -->
                        </div> 
                        <div class="col-sm-2 border-right">

                            <!-- /.description-block -->
                        </div>
<?php endif; ?>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>

    </div>


</div>
<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">الاحصائيات  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="overflow-x: auto;
                     white-space: nowrap;
                     direction: rtl;">
                    <table class="table table-bordered">
                        <tr>
                            <th ></th>
                            <th>حولي</th>
                            <th>السالمية</th>     

                            <th>الرقعي</th>
                            <th>الشعب</th>
                            <th>ريحانة</th>
                            <th>الفنطاس</th>
                            <th>الجديدة</th>
                            <th>الشركة</th>
                            <th>اخرى</th>
                            <th>المجموع</th>
                        </tr>


                        <tr>
                            <td>الايجار</td>   
                            <td><?= $dd1 ?></td>   
                            <td><?= $dd2 ?></td>     

                            <td><?= $dd5 ?></td> 
                            <td><?= $dd8 ?></td>

                            <td><?= $dd9 ?></td>
                            <td><?= $dd11 ?></td>
                               <td><?= $dd10 ?></td>
                            <td><?= $dd3 ?></td>  
                            <td><?= '' ?></td>  
                            <td><?= ($dd1 + $dd2 + $dd3 + $dd4 + $dd5 + $dd8 + $dd9 + $dd10+ $dd11) ?></td>   
                        </tr>
                        <tr>
                            <td>الموظفين</td>   

                            <td><?= $ddd1[0] ?></td>     
                            <td><?= $ddd2[0] ?></td>   
                            <td><?= $ddd5[0] ?></td> 
                            <td><?= $ddd8[0] ?></td> 
                            <td><?= $ddd9[0] ?></td> 
                            <td><?= $ddd11[0] ?></td> 
                            <td><?= $ddd10[0] ?></td> 
                         
                            <td><?= $all_modif_6 ?></td>   
                            <td><?= $all_modif_7 ?></td>   
                            <td><?= ($ddd1[0] + $ddd2[0] + $ddd5[0] + $ddd3[0] + $ddd8[0] + $ddd9[0] + $ddd11[0] + $ddd10[0]) ?></td>   
                        </tr>
                        <tr>
                            <td>الرواتب</td>   

                            <td><?= $ddd1[1] ?></td>     
                            <td><?= $ddd2[1] ?></td>   
                            <td><?= $ddd5[1] ?></td> 
                            <td><?= $ddd8[1] ?></td> 

                            <td><?= $ddd9[1] ?></td> 
                       
                            <td><?= $ddd11[1] ?></td> 
                                 <td><?= $ddd10[1] ?></td> 
                  
                            <td><?= $sum_modif_6 ?></td> 
                            <td><?= $sum_modif_7 ?></td> 
                            <td><?= ($ddd1[1] + $ddd2[1] + $ddd5[1] + $ddd8[1] + $ddd9[1] + $ddd3[1]) ?></td>   
                        </tr>
                        <tr>
                            <td>الالتزام</td>   

                            <td><?= $ddd1[1] + $dd1 ?></td>     
                            <td><?= $ddd2[1] + $dd2 ?></td>   
                            <td><?= $ddd5[1] + $dd5 ?></td> 
                            <td><?= $ddd8[1] + $dd8 ?></td> 
                            <td><?= $ddd9[1] + $dd9 ?></td> 
                            <td><?= $ddd11[1] + $dd11 ?></td> 
                            <td> </td>
                            <td><?= $sum_modif_6 + $dd3 ?></td>
                            <td><?= $sum_modif_7 ?></td>
                            <td><?= ($ddd1[1] + $ddd2[1] + $ddd5[1] + $ddd3[1] + $dd1 + $dd2 + $dd3 + $dd4 + $dd5 + $ddd8[1] + $dd8 + $ddd9[1] + $dd9 + $ddd11[1] + $dd11) ?>


                                <br>
<?php echo($all_bill - ($dd1 + $dd2 + $dd4 + $dd5 + $dd8 + $dd9)) ?>   ايجار فقط
                            </td>   
                        </tr>

                        <tr>
                            <td>الالتزام اليومي</td>   

                            <td><?= round(($dd1 + $ddd1[1]) / 30, 0) ?></td>     
                            <td><?= round(($dd2 + $ddd2[1]) / 30, 0) ?></td>   
                            <td><?= round(($dd5 + $ddd5[1]) / 30, 0) ?></td> 
                            <td><?= round(($dd8 + $ddd8[1]) / 30, 0) ?></td> 
                            <td><?= round(($dd9 + $ddd9[1]) / 30, 0) ?></td> 
                            <td><?= round(($dd11 + $ddd11[1]) / 30, 0) ?></td> 
                            <td></td>   
                            <td><?= round(($sum_modif_6 + $dd3) / 30, 0) ?></td> 
                            <td></td>   
                            <td><?= round(($ddd1[1] + $ddd2[1] + $ddd5[1] + $ddd3[1] + $dd1 + $dd2 + $dd3 + $dd4 + $dd5 + $dd8 + $ddd8[1] + $ddd9[1] + $dd9 ) / 30, 0) ?></td>   
                        </tr>
                        <tr>
                            <td>الايراد</td>   
                            <td><?= $exp1 ?><br><?= $ddd1[3] ?></td>   
                            <td><?= $exp2 ?><br><?= $ddd2[3] ?></td>     

                            <td><?= $exp5 ?><br><?= $ddd5[3] ?></td>  
                            <td><?= $exp8 ?><br><?= $ddd8[3] ?></td>  


                            <td><?= $exp9 ?><br><?= $ddd9[3] ?></td> 


                            <td><?= $exp11 ?><br><?= $ddd11[3] ?></td>   
                            <td><?= $exp10 ?><br><?= $ddd10[3] ?></td>  
                            <td></td>   
                            <td><?= $exp3 ?></td>  
                            <td><?= ($exp1 + $exp2 + $exp5 + $exp8 + $exp9 + $exp11 + $exp10 + $exp3)
?></td>   
                        </tr>
                        <tr>
                            <td> الكاش</td>   
                            <td><?= $all_cash2 ?></td>   
                            <td><?= $all_cash1 ?></td>     

                            <td><?= $all_cash5 ?></td>  
                            <td><?= $all_cash8 ?></td> 
                            <td><?= $all_cash9 ?></td> 
                            <td><?= $all_cash11 ?></td>
                            <td><?= $all_cash10 ?></td>
                            <td></td>   
                            <td></td>  
                            <td><?= ($all_cash1 + $all_cash2 + $all_cash5 + $all_cash8 + $all_cash9 + $all_cash10 + $all_cash11) ?></td>   
                        </tr>

                        <tr>
                            <td>الكي نت</td>   
                            <td><?= $exp1knet ?></td>   
                            <td><?= $exp2knet ?></td>     

                            <td><?= $exp5knet ?></td> 
                            <td><?= $exp8knet ?></td> 
                            <td><?= $exp9knet ?></td> 
                            <td><?= $exp11knet ?></td> 
                            <td><?= $exp10knet ?></td>  
                            <td></td>  
                            <td></td>  
                            <td><?= ($exp1knet + $exp2knet + $exp5knet + $exp8knet + $exp9knet + $exp11knet + $exp10knet ) ?></td>   
                        </tr>



                        <tr>
                            <td>المصروفات</td>   
                            <td><?= $out1 ?></td>   
                            <td><?= $out2 ?></td>     

                            <td><?= $out5 ?></td>  
                            <td><?= $out8 ?></td> 
                            <td><?= $out9 ?></td> 
                            <td><?= $out11 ?></td> 
                            <td><?= $out10 ?></td> 
                            <td></td>  
                            <td><?= $out3 ?></td>  
                            <td><?= ($out1 + $out2 + $out5 + $out8 + $out9 + $out10 + $out11) ?></td>   
                        </tr>


<?php if ($this->session->userdata('name') == 'aln3esa'): ?>
                            <tr>
                                <td>الفايضمن غير الالتزامات</td>   
                                <td><?= $all_bill11 ?></td>   
                                <td><?= $all_bill22 ?></td>     

                                <td><?= $all_bill55 ?></td> 
                                <td><?= $all_bill88 ?></td> 
                                <td><?= $all_bill99 ?></td> 
                                 <td><?= $all_bill1111 ?></td>  
                               <td><?= $all_bill1010 ?></td> 
                                <td></td>  
                                <td><?= ($all_bill11 + $all_bill22 + $all_bill55 + $all_bill88 + $all_bill99 + $exp3) ?></td>   
                            </tr>    
                            <tr>
                                <td>   الفايض مع الالتزامات</td>   
                                <td><?php echo $ff = $all_bill11 - ($dd1 + $ddd1[1]); ?></td>   
                                <td><?php echo $ff2 = $all_bill22 - ($dd2 + $ddd2[1]) ?></td>     

                                <td><?php echo $ff5 = $all_bill55 - ($dd5 + $ddd5[1]) ?></td>   
                                <td><?php echo $ff8 = $all_bill88 - ($dd8 + $ddd8[1]) ?></td> 
                                <td><?php echo $ff9 = $all_bill99 - ($dd9 + $ddd9[1]) ?></td> 
                                <td><?php echo $ff11 = $all_bill1111 - ($dd11 + $ddd11[1]) ?></td> 
                                <td><?php echo $ff10 = $all_bill1010 - ($dd10 + $ddd10[1]) ?></td> 
                                <td></td>  
                                <td></td>  
                                <td>
    <?= ($ff + $ff2 + $ff5 + $ff8 + $ff9 + $ff10 + $ff11) ?><br>


    <?= ($all_bill11 + $all_bill22 + $all_bill55 + $all_bill88 + $all_bill99 + $exp3) - ($ddd1[1] + $ddd2[1] + $ddd5[1] + $ddd3[1] + $dd1 + $dd2 + $dd3 + $dd4 + $dd5 + $out3 + $dd8 + $ddd8[1] + $dd9 + $ddd9[1]) ?></td>   
                            </tr>  

    <?php
    $rbh1 = $all_bill11 - ($dd1 + $ddd1[1]);
    $rbh2 = ($all_bill22 - ($dd2 + $ddd2[1])) / 2;
    $rbh5 = ($all_bill55 - ($dd5 + $ddd5[1])) / 2;

    $rbh8 = ($all_bill88 - ($dd8 + $ddd8[1])) / 2;
    $rbh9 = ($all_bill99 - ($dd9 + $ddd9[1])) / 2;
    
      $rbh10 = ($all_bill1010 - ($dd10 + $ddd10[1])) / 2;
           $rbh11 = ($all_bill1111 - ($dd11 + $ddd11[1])) / 2;
    $rbh7 = $sum_modif_6 + $dd3;

    $exp3 = ($exp3 / 2);
    $oth = ($out3 / 2);
    $neww = ($out10 / 2);
    ?>
                            <tr>
                                <td>    لطيف </td>   
                                <td><?= $rbh1 ?></td>   
                                <td><?= $rbh2 ?></td>     

                                <td><?= $rbh5 ?></td> 
                                <td><?= $rbh8 ?></td> 
                                <td><?= $rbh9 ?></td> 
                                <td><?= $rbh11 ?></td>
                                <td><?= $rbh10 ?></td> 
                                   <td> </td> 
                                <td><?= ($oth - $exp3) ?></td>  
                                <td>
    <?= ($rbh1 + $rbh2 + $rbh5 + $rbh8 + $rbh9 + $exp3+$rbh11+$rbh10) ?> 
                                    <br>
                                    <?= $outltef ?>تصدير
                                    <br>
                                    <?= ($rbh1 + $rbh2 + $rbh5 + $rbh8 + $rbh9 + $exp3+$rbh11+$rbh10) - ($outltef + $oth ) ?> المتبقي
                                </td>   
                            </tr>  
                            <tr>
                                <td>    بشير </td>   
                                <td></td>   
                                <td><?= $rbh2 ?></td>     

                                <td><?= $rbh5 ?></td> 
                                <td><?= $rbh8 ?></td> 
                                <td><?= $rbh9 ?></td> 
                                 <td><?= $rbh11 ?></td> 
                                 <td><?= $rbh10 ?></td> 
                                      <td> </td> 
                                <td><?= ($oth - $exp3) ?></td>  
                                <td>
    <?= ($rbh2 + $rbh5 + $rbh8 + $rbh9 + $exp3+$rbh11+$rbh10) ?> 
                                    <br>
                                    <?= $outbasher ?>تصدير
                                    <br>
                                    <?= ($rbh2 + $rbh5 + $rbh8 + $rbh9 + $exp3+$rbh11+$rbh10) - ($outbasher + $oth ) ?> المتبقي
                                </td>   
                            </tr>  

<?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>
</div>
<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">الميزان  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="overflow-x: auto;
                     white-space: nowrap;
                     direction: rtl;">
                    <table class="table table-bordered">
                        <tr>
                            <th >اليوم</th>
                            <th>الايراد</th> 
                            <th>knet</th>
                            <th>المصروفات</th>

                            <th> الكاش من الفروع</th>
                            <th>مصروفات  الكاش</th>
                            <th>ايداع الكاش</th>
                            <th> الميزان</th>
                        </tr>

<?php
$count = 0;
$allaa = 0;
foreach ($all_groupsstat as $row):
    ?>
                            <tr>
                                <td><?= $row['dateadd']; ?></td>
                                <td><?= $row['all_bill1']; ?></td>
                                <td><?= $row['all_bill5knet']; ?> </td>  
                                <td><?= $row['all_bill2']; ?> </td>

                                <td><?= $row['all_bill5']; ?> </td>
                                <td><?= $row['all5_last2']; ?> </td>
                                <td><?= $row['all5_last']; ?> </td>


                                <td><?php
                        echo $pp = $row['all_bill1'] - ($row['all_bill5knet'] + $row['all_bill2'] + $row['all5_last2'] + $row['all5_last']);

                        echo "</td>  <td>";
                        echo $allaa = $pp + $allaa;
    ?> </td>














                            </tr>

<?php endforeach; ?>
                        <tr>
                            <th >المجموع</th>
                            <th><?= $all_bill1 ?></th>     
                            <th><?= $all_bill2 ?></th>
                            <th><?= $all_bill3 ?></th>
                            <th><?= $all_bill5 ?></th>    
                            <th><?= $all_cash ?></th>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>
</div>