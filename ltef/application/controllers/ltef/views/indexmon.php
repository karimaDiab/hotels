



<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">الاحصائيات النهائية  </h3>
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
                            <th>الجديده</th>
                             <th>الرقعي ٢</th>
                            <th>اخرى</th>
                            <th>المجموع</th>
                        </tr>


                        <tr>
                            <td>الايراد</td>   
                            <td><?= $exp1 ?></td>   
                            <td><?= $exp2 ?></td>     

                            <td><?= $exp5 ?></td>   
                            <td><?= $exp8 ?></td>  
                            <td><?= $exp9 ?></td>  
                                          <td><?= $exp11 ?></td>  
                            <td><?= $exp10 ?></td>  
                 <td><?= $exp12 ?></td> 
                            <td><?= $exp3 ?></td>  
                            <td><?= ($exp1 + $exp2 + $exp5 + $exp8 + $exp3 + $exp9 + $exp10 + $exp11+ $exp12) ?></td>   
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
                       <td><?= $out12?></td> 

                            <td><?= $out3 ?></td>  
                            <td><?= ($out1 + $out2 + $out5 + $out8 + $out9 + $out10 + $out11+ $out12) ?></td>   
                        </tr>
                        <?php if ($this->session->userdata('group')): ?>
                            <tr>
                                <td> الصافي </td>   
                                <td><?= $exp1 - $out1 ?></td>   
                                <td><?= $exp2 - $out2 ?></td>     

                                <td><?= $exp5 - $out5 ?></td> 
                                <td><?= $exp8 - $out8 ?></td> 
                                <td><?= $exp9 - $out9 ?></td> 
                                         <td> <?= $exp11 - $out11 ?></td> 
                                <td> <?= $exp10 - $out10 ?></td> 
                           <td> <?= $exp12 - $out12 ?></td> 
                                <td> </td> 
                                <td><?= (($exp1 + $exp2 + $exp5 + $exp8 + $exp9 + $exp10 + $exp11  + $exp12+ $exp3) - ($out1 + $out2 + $out5 + $out8 + $out9 + $out10 + $out11+ $out12)) ?></td>   
                            </tr>    

                            <?php
                            $rbh1 = $exp1 - ($out1);
                            $rbh2 = ($exp2 - ($out2)) / 2;
                            $rbh5 = ($exp5 - ($out5)) / 2;
                            $rbh8 = ($exp8 - ($out8)) / 2;
                            $rbh9 = ($exp9 - ($out9)) / 2;
                            $rbh10 = ($exp10 - ($out10)) / 2;
                            $rbh11 = ($exp11 - ($out11)) / 2;
                            $rbh12= ($exp12 - ($out12)) / 2;
                            $oth = ($out3 / 2);
                            $exp3 = ($exp3 / 2);
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
                              <td><?= $rbh12 ?></td>
                                <td><?= $oth ?></td>  
                                <td>
                                    <?= ($rbh1 + $rbh2 + $rbh5 + $rbh8 + $exp3 + $rbh9 + $rbh10 + $rbh11+ $rbh12) ?> 
                                    <br>
                                    <?= $outltef ?>تصدير
                                    <br>
                                    <?= ($rbh1 + $rbh2 + $rbh5 + $rbh8 + $rbh9 + $rbh10 + $rbh11+ $rbh12 + $exp3) - ($outltef + $oth ) ?> المتبقي
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
                             <td><?= $rbh12 ?></td>
                                <td><?= $oth ?></td>  
                                <td>
                                    <?= ($rbh2 + $rbh5 + $rbh8 + $exp3 + $rbh9 + $rbh11 +$rbh12+ $rbh10) ?> 
                                    <br>
                                    <?= $outbasher ?>تصدير
                                    <br>
                                    <?= ($rbh2 + $rbh5 + $rbh8 + + $rbh9 + $rbh11  + $rbh12+ $rbh10 + $exp3) - ($outbasher + $oth ) ?> المتبقي
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