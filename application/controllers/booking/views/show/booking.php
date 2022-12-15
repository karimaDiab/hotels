

<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('booking/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('booking/show/all') ?>"> الحركات</a></li>
    </ol>
</section>



<div class="row">


    <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/printbill/<?= $show['id'] ?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  طباعة الفاتورة</a> 	</div>





    </div>

    <?php
    if (count($all_book) > 1) {
        ?>     
        <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/printbillall/<?= $show['id'] ?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  طباعة فاتورة كاملة</a> 	</div>  
        </div>
        <?php
    }
    ?>


    <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/print3gd/<?= $show['id'] ?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  طباعة العقد</a> 	</div>



    </div>

    <div  style="float:right"><div  style="margin-left:10px">
            <?php if ($show['outsite'] != 'ok'): ?>
                <a href="<?= base_url() ?>/booking/Dashboard/outsite/<?= $show['id'] ?>/ok" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   خارج وراجع</a>
            <?php endif; ?>
            <?php if ($show['outsite'] == 'ok'): ?>
                <a href="<?= base_url() ?>/booking/Dashboard/outsite/<?= $show['id'] ?>/oo" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>    تم رجوع العميل</a>
                <?= $this->booking->tissme_show($show['timeoutsite']); ?>
            <?php endif; ?>
        </div>

    </div>
    
    
       <div  style="float:right"><div  style="margin-left:10px">
            <?php if ($show['inok'] != '1'): ?>
                <a href="<?= base_url() ?>/booking/Dashboard/inok/<?= $show['id'] ?>/ok" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>     لسستم </a>
            <?php endif; ?>
            <?php if ($show['inok'] == '1'): ?>
                <a href="#" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>      تم اضافته لسستم </a>
                <?= $this->booking->tissme_show($show['timeoutsite']); ?>
            <?php endif; ?>
        </div>

    </div>
    
    
    
    
</div>


<br>
<?php if ($show['bookingnew'] != ''): ?> <span class="label label-warning">عميل بوكنق</span>
    <br><br>        
<?php endif; ?>


<?php if (($this->booking->tissme_now() - $show['timeend']) > 0): ?>
    <?php echo form_open_multipart(base_url('booking/Dashboard/msgwait/' . $show['id'])); ?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">    متابعة المتاخرين </h3>
                </div>
                <div class="box-body">






                    <div class="form-group col-md-10" >

                        <input type="text" name="msgwait" placeholder=" ادخل  ملاحظه على المتاخر مثلا لم يرد.... تمديد .... اذا رجع يدفع   ..." class="form-control" required>
                    </div> <div class="form-group col-md-2" > <span class="input-group-btn"><br><br>
                            <button type="submit" class="btn btn-success form-control">  اضافة </button>
                        </span>

                    </div>
                    <div class="form-group col-md-12" >
    <table class="table table-bordered">
                        <tr>

                            <th>الملاحظة</th>
                            <th>الوقت</th>
            
                            <th>اليوزر</th>
                   

                            <th style="width: 40px"></th>

                        </tr>
                        <?php 
                                $msgwait=explode("<aln3esa>", $show['msgwait']);
                                for ($index = 0; $index < count($msgwait); $index++) {
                                    if($msgwait[$index])
                                    {
                                        
                                   
                                        $msgss=explode("||", $msgwait[$index]);
                                        
                                
                        ?>
                            <tr>
                                <td><?= $msgss[0]; ?></td>
                    
                                <td><?= $this->booking->tissme_show( $msgss[1]); ?></td>
                                <td><?= $msgss[2]; ?></td>
                          






                            </tr>
                                <?php }}
                        ?>
                        
    </table>


                    </div>


                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>

    </form>

<?php endif; ?>
<?php if (isset($msg) || validation_errors() !== ''): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa-warning"></i> خطأ</h4>
        <?= validation_errors(); ?>
        <?= isset($msg) ? $msg : ''; ?>
    </div>
<?php endif; ?>
<?php if ($show['commentnbeh'] != ''): ?>
    <div class="alert alert-warning alert-dismissible">

        <h4><i class="icon fa-warning"></i> تنبيه</h4>
        <div> </div>

        <?= isset($show['commentnbeh']) ? $show['commentnbeh'] : ''; ?>

    </div>
    <div class="row">

        <div  style="float:left"><div  style="margin-top:-60px;margin-left: 10px">
                <a href="<?= base_url() ?>/booking/Dashboard/deltnbeh/<?= $show['id'] ?>/oo" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>    مسح التنبيه  </a>
            </div></div>
    
    </div>
<?php endif; ?>




<div class="row">

    <div class="col-md-12">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right" style="width: 100%;
                /* padding-bottom: 20px; */
                margin-bottom: 20px;    border-bottom-color: #3c8dbc;">

                <li class="active"><a href="#tab_1-1" data-toggle="tab">بيانات العميل</a></li>
                   <?php
                            
                                if (count($booking_card)>0) {
                                    
                                    
                               ?>   
                      <li ><a href="#tab_1-6" data-toggle="tab"> كرت الدخول   <b> (<?= count($booking_card) ?>)</b></a>  </li>
                            <?php
                            
                                }
                                    
                               ?>  
                <li ><a href="#tab_1-5" data-toggle="tab"> المرافقين</a></li>
                <li ><a href="#tab_1-4" data-toggle="tab">الملاحظات
                        <b> (<?= count($all_groups3) ?>)</b></a> </li>
                <li><a href="#tab_2-2" data-toggle="tab">التاخيرات
                        <b> (<?= count($all_groups2) ?>)</b>
                    </a></li>
                <li><a href="#tab_3-2" data-toggle="tab">الكل
                        <b> (<?= count($all_groups) ?>)</b></a></li>
                <li class="dropdown">

                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">


                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->

                            <div class="box-body">

                                <div class="form-group col-md-6">
                                    <label >الاسم   </label>
                                    <br><?= $show['name'] ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label > التليفون	</label>
                                    <br><?= $show['mobile'] ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label > الرقم المدني	</label>
                                    <br><?= $show['cid'] ?>
                                </div>

                                <div class="form-group  col-md-6">
                                    <label >  الجنسية	</label>
                                    <br><?= $show['country'] ?>
                                </div>





                            </div>
                            <!-- /.box-body -->



                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>


                </div>
                
                
                       <div class="tab-pane " id="tab_1-6">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">   كرت الدخول </h3>
                                </div>

                    <table class="table table-bordered">
                        <tr>

                            <th>الحالة</th>
                  
                            <th>وقت اخراج الكرت</th>
                            <th >الانتهاء</th>

                

                        </tr>

                        <?php
                        $count = 0;
                        foreach ($booking_card as $row):


                       
                            ?>
                            <tr>
                                <td>     <?php if ($row['counter'] == 1){ 
                            
                            
                            echo "يعمل حاليا ";
                        }
?>              <?php if ($row['counter'] == 3){ 
                            
                            
                            echo "مفقود ";
                        }
?>           
                                    
                                        <?php if ($row['counter'] == 2){ 
                            echo "مسترجع ";
                        }
?>           </td>
      
                                <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>

                                <td>
                                
                                
                 
                                
                            <?php if ($row['counter'] == 1){ ?>
                <a href="<?= base_url() ?>/booking/Dashboard/cardlose/<?= $row['id'] ?>/3" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>    فقد العميل الكرت  </a>
        
                            <?php } ?>       
                                
                                
                                
                                
                              </td>









                            </tr>

                        <?php endforeach; ?>

                    </table>
                
                                <!-- /.box-body -->



                            </div>
                            <!-- /.box -->


                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>

                    <?php echo form_open_multipart(base_url('booking/dashboard/editcomment/' . $show['id'])); ?>
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">  اضافة مرافق </h3>
                                </div>
                                <div class="box-body">

                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1"> الاسم   </label>


                                        <input type="text" class="form-control"  placeholder=" الاسم " name="mname"  value="" required >
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label >  الرقم المدني	</label>
                                        <input type="text" class="form-control"  placeholder="الرقم المدني " name="mcid"  value=""  ><br>
                                    </div>
                                    <div class="form-group  col-md-2">
                                        <label >  التليفون	</label>
                                        <input type="text" class="form-control"  placeholder=" التلفيون " name="mmobile" value=""><br>

                                    </div>

                                    <div class="form-group  col-md-3">
                                        <label >  الجنسية	</label>
                                        <input type="text" class="form-control"  placeholder="  الجنسية " name="mcountry" value=""  ><br>

                                    </div>

                                    <div class="form-group col-md-" style="padding-top: 25px">

                                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> اضافة</button>

                                    </div>



                                </div>
                                <!-- /.box-body -->



                            </div>
                            <!-- /.box -->


                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>

                    </form>


                </div>
                <div class="tab-pane " id="tab_1-5">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">   المرافقين </h3>
                                </div>

                                <?php
                                $comment = str_replace("||||", "****", $show['comment']);
                                $comment = str_replace("|||", "###", $comment);
                                $comment = str_replace("||", "**", $comment);
                                $comment = str_replace("###", "|||", $comment);
                                $comment = explode("|||", $comment);

                                for ($i = 0; $i < count($comment); $i++):

                                    $commentdd = explode("**", $comment[$i]);
                                    if (isset($commentdd[1])):
                                        ?>
                                        <div class="box-body">

                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1"> الاسم   </label>

                                                <br><?= $commentdd[0] ?>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label >  الرقم المدني	</label>
                                                <br><?= $commentdd[1] ?>
                                            </div>
                                            <div class="form-group  col-md-2">
                                                <label >  التليفون	</label>
                                                <br><?= $commentdd[2] ?>
                                            </div>

                                            <div class="form-group  col-md-3">
                                                <label >  الجنسية	</label>
                                                <br><?= $commentdd[3] ?>
                                            </div>





                                        </div>

                                    <?php endif; endfor; ?>
                                <!-- /.box-body -->



                            </div>
                            <!-- /.box -->


                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>

                    <?php echo form_open_multipart(base_url('booking/dashboard/editcomment/' . $show['id'])); ?>
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">  اضافة مرافق </h3>
                                </div>
                                <div class="box-body">

                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1"> الاسم   </label>


                                        <input type="text" class="form-control"  placeholder=" الاسم " name="mname"  value="" required >
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label >  الرقم المدني	</label>
                                        <input type="text" class="form-control"  placeholder="الرقم المدني " name="mcid"  value=""  ><br>
                                    </div>
                                    <div class="form-group  col-md-2">
                                        <label >  التليفون	</label>
                                        <input type="text" class="form-control"  placeholder=" التلفيون " name="mmobile" value=""><br>

                                    </div>

                                    <div class="form-group  col-md-3">
                                        <label >  الجنسية	</label>
                                        <input type="text" class="form-control"  placeholder="  الجنسية " name="mcountry" value=""  ><br>

                                    </div>

                                    <div class="form-group col-md-" style="padding-top: 25px">

                                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> اضافة</button>

                                    </div>



                                </div>
                                <!-- /.box-body -->



                            </div>
                            <!-- /.box -->


                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>

                    </form>


                </div>
                <div class="tab-pane " id="tab_1-4">



                    <table class="table table-bordered">
                        <tr>

                            <th>الشقة</th>
                            <th>الايام</th>
                            <th>المبلغ</th>
                            <th>الملاحظة</th>
                            <th>الدخول</th>
                            <th >المدة</th>

                            <th style="width: 40px"></th>

                        </tr>

                        <?php
                        $count = 0;
                        foreach ($all_groups3 as $row):


                            if ($row['timeend2'])
                                $row['timeend'] = $row['timeend2'];
                            ?>
                            <tr>
                                <td><?= $row['room']; ?></td>
                                <td><?= $row['day']; ?></td>
                                <td><?= $row['bill']; ?></td>
                                <td><?= $row['comment7']; ?></td>
                                <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>

                                <td><?= $this->booking->getNiceDuration($row['timeend'] - $row['timeenter']); ?></td>



                                <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                </td>






                            </tr>

                        <?php endforeach; ?>

                    </table>


                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2-2">



                    <table class="table table-bordered">
                        <tr>

                            <th>الشقة</th>
                            <th>الايام</th>
                            <th>الغرامة</th>
                            <th>الدخول</th>
                            <th >الخروج</th>
                            <th >المبلغ</th>
                            <th style="width: 40px"></th>

                        </tr>

                        <?php
                        $count = 0;
                        foreach ($all_groups2 as $row):


                            if ($row['timeend2'])
                                $row['timeend'] = $row['timeend2'];
                            ?>
                            <tr>
                                <td><?= $row['room']; ?></td>
                                <td><?= $row['day']; ?></td>
                                <td><?= $row['comment1']; ?></td>
                                <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                                <td><?= $this->booking->tissme_show($row['timeend']); ?> </td>

                                <td><?= $row['comment2']; ?></td>
                                <td><?= $row['comment3']; ?></td>

                                <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                </td>






                            </tr>

                        <?php endforeach; ?>

                    </table>



                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3-2">


                    <table class="table table-bordered">
                        <tr>
                            <th>التليفون</th>
                            <th>الشقة</th>
                            <th>الايام</th>
                            <th>المبلغ</th>

                            <th>الدخول</th>
                            <th >مدة الاقامة</th>
                            <th style="width: 40px"></th>

                        </tr>

                        <?php
                        $count = 0;
                        foreach ($all_groups as $row):


                            if ($row['timeend2'])
                                $row['timeend'] = $row['timeend2'];
                            ?>
                            <tr>
                                <td><?= $row['mobile']; ?></td>
                                <td><?= $row['room']; ?></td>
                                <td><?= $row['day']; ?></td>
                                <td><?= $row['bill']; ?></td>
                                <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                                <td><?= $this->booking->getNiceDuration($row['timeend'] - $row['timeenter']); ?></td>

                                <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                </td>






                            </tr>

                        <?php endforeach; ?>

                    </table>



                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">  حركة العميل     بالعقد   <?= $show['3gd'] ?> -  مدة الاقامة  :    <?= $this->booking->getNiceDuration($this->booking->tissme_now() - $show['timeenter']); ?></h3>
            </div>

            <?php
            $count = 0;
            foreach ($all_book as $row):
                ?>
                <div class="box-body">

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">


                            <?php if (($row['timerenew'] != '')): ?>
                                <div class="form-group  col-md-2">
                                    <label >  التمديد	</label>
                                    <br>
                                    <?= $this->booking->tissme_show($row['timerenew']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (($row['timerenew'] == '')): ?>
                                <div class="form-group  col-md-2">
                                    <label >  الدخول	</label>
                                    <br>
                                    <?= $this->booking->tissme_show($row['timeenter']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group col-md-2">
                                <label >الشقة   </label>

                                <br><?= $row['room'] ?>
                            </div>


                            <div class="form-group col-md-2">
                                <label > الايام	</label>
                                <br><?= $row['day'] ?>
                            </div>




                            <div class="form-group col-md-2">
                                <label > المبلغ   </label>
                                <br><?= $row['bill'] ?>
                            </div>
                            <div class="form-group col-md-2">
                                <label > الكي نت	</label>
                                <br><?= $row['knet'] ?>  ( <?= $row['billprint'] ?>  )
                            </div>



                            <div class="form-group  col-md-2">
                                <label > الملاحظة  	</label>
                                <span style="color: red;font-size: 15px;" ><?= $row['comment8'] ?> <br><?= $row['comment7'] ?></span>
                            </div>



                        </div>   </div>
                    <?php if (($row['oldroom'] != '')): ?>
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="form-group col-md-2">
                                    <label > وقت النقل	</label>
                                    <br>   <?php if ($row['timemove'] != '') echo$this->booking->tissme_show($row['timemove']); ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label >    الى الشقة    </label>

                                    <br><?= $row['room'] ?>
                                </div>    <div class="form-group col-md-2">
                                    <label >    من الشقة    </label>

                                    <br><?= $row['oldroom'] ?>
                                </div>





                                <div class="form-group col-md-4">
                                    <label > السبب	</label>
                                    <br>    <span style="color: red;font-size: 20px;" > <?= $row['msgmove']; ?></span>
                                </div>



                            </div>   </div>
                        <!-- /.box-body -->





                    <?php endif; ?>


                </div>
            <?php endforeach; ?>


            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <div class="form-group  col-md-6">
                        <label >  الخروج	</label>
                        <br>
                        <span style="color: red;font-size: 20px;" >  <?= $this->booking->tissme_show($show['timeend']); ?></span>
                    </div>
                    <?php if (($show['timecleanfinsh']) != ''): ?>
                        <div class="form-group  col-md-3">
                            <label >    وقت الانتهاء من التظيف	</label>
                            <br>
                            <span style="color: red;font-size: 20px;" >  <?= $this->booking->tissme_show($show['timecleanfinsh']); ?></span>
                        </div>
                        <div class="form-group  col-md-3">
                            <label >      مدة التظيف 	</label>
                            <br>
                            <span style="color: red;font-size: 20px;" >  <?= $this->booking->getNiceDuration($show['timecleanfinsh'] - $show['timeend'], '2'); ?></span>
                        </div>
                    <?php endif; ?>
                </div>  </div>

            <!-- /.box-body -->



        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">  تفاصيل   </h3>
            </div>
            <div class="box-body">





                <div class="form-group  col-md-6">
                    <label > نوع السيارة	</label>
                    <br><?= $show['bookingid'] ?>
                </div>

                <div class="form-group  col-md-6">
                    <label > حجز بوكنق 	</label>
                    <br><?= $show['bookingnew'] ?>
                </div>



            </div>
            <!-- /.box-body -->



        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">   اسم الموظف  </h3>
            </div>
            <div class="box-body">

                <div class="form-group col-md-6">
                    <label >الدخول   </label>

                    <br><?= $show['user'] ?>
                </div>
                <div class="form-group col-md-6">
                    <label > الخروج	</label>
                    <br><?= $show['user2'] ?>
                </div>


            </div>
            <!-- /.box-body -->



        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>



<?php echo form_open_multipart(base_url('booking/dashboard/upload_file/' . $show['id'])); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">    اثبات العميل   </h3>
            </div>
            <div class="box-body">

                <div class="col-sm-4">
                    <img class="img-responsive" src="<?= base_url($show['file1']) ?>" alt="Photo">
                    <input type="file" id="exampleInputFile" name="file1">
                </div> <div class="col-sm-4">
                    <img class="img-responsive" src="<?= base_url($show['file2']) ?>" alt="Photo">
                    <input type="file" id="exampleInputFile" name="file2">
                </div>
                
                <div class="col-sm-4">
                    عقد الزواج
                    <img class="img-responsive" src="<?= base_url($show['file3']) ?>" alt="Photo">
                    <input type="file" id="exampleInputFile" name="file3">
                </div>
                <div class="col-md-2">
                    <div class="box-footer">
                        <button type="submit" class="btn  btn-primary" name="submit" value="pl"> رفع الاثبات</button>
                    </div>
                </div>

            </div>

            <!-- /.box-body -->



        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>
</form>




<?php echo form_open_multipart(base_url('booking/dashboard/commentnbeh/' . $show['id'])); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">    التنبية او الملاحظة  </h3>
            </div>
            <div class="box-body">

                <div class="form-group col-md-3">
                    <label >   الملاحظة	 على السعر</label>
                    <textarea class="form-control" rows="3" placeholder=" الملاحظة على السعر  ان وجدت   ..." name="comment8"><?= $show['comment8'] ?></textarea><br>
                </div>
                <div class="form-group col-md-3">
                    <label >   التنبيه	</label>
                    <textarea class="form-control" rows="3" placeholder=" التنبيه   ..." name="commentnbeh"><?= $show['commentnbeh'] ?></textarea><br>
                </div>
                <div class="form-group col-md-3">
                    <label >   الملاحظة	</label>
                    <textarea class="form-control" rows="3" placeholder=" الملاحظة ان وجدت   ..." name="comment7"><?= $show['comment7'] ?></textarea><br>
                </div>
                <div class="form-group col-md-3" >

                    <button type="submit" class="btn btn-primary" name="submit" value="pl"> تحديث</button>

                </div>



            </div>
            <!-- /.box-body -->



        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>

</form>


<?php if ((!$show['oldroom'] and ! $this->session->userdata('group') )or ( $this->session->userdata('group') or $this->session->userdata('editor'))): ?>
    <?php echo form_open_multipart(base_url('booking/dashboard/moveroom/' . $show['id'])); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">   نقل الشقة  </h3>
                </div>
                <div class="box-body">
                    <div class="form-group  col-md-4">
                        <label >  اختر الشقة	</label>
                        <select  name='roomnew'  dir="rtl"   style="  width: 100px;

                                 margin-top: 10px;" required>
                            <option value=''>اختر الشقة</option>


                            <?php
                            $count = 0;
                            foreach ($all_rooms as $row):
                                ?> <option value='<?= $row['name'] ?>' > شقة رقم   <?= $row['name'] ?></option>

                                <?php
                            endforeach;
                            ?>

                        </select>


                    </div>



                    <div class="form-group col-md-4">
                        <label >   السبب	</label>
                        <textarea class="form-control" rows="3" placeholder=" يرجا كتابة السبب اجباري " name="msgmove" required></textarea><br>
                    </div>
                    <div class="form-group col-md-4" >

                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> نقل</button>

                    </div>



                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>

    </form>
<?php endif; ?>



<?php
echo form_open_multipart(base_url('booking/dashboard/idrenew/' . $show['id']));




if ($show['dayfreeall'] > 0) {
    
}
?>
    
    
    
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">   التمديد  </h3>
            </div>
            <div class="box-body">  
                
                <?php
                if ($show['dayfreeall'] > 0) {
                    echo "يوجد للعميل عدد ايام بالباقة : " . $show['dayfreeall'];

                    echo "<br> لايمكن تمديد اكثر من عدد ايام الباقة";
                    ?><br><br>

                    <div class="form-group  col-md-2">
                        <label > ايام الباقة	 المتوفرة</label>
                        <input type="text" class="form-control"  placeholder="  الايام " name="dayfreeall" value="<?= $show['dayfreeall'] ?>"  disabled=""><br>   <input type="hidden" class="form-control"  placeholder="  الايام " name="dayfreeall" value="<?= $show['dayfreeall'] ?>"  ><br>

                    </div>  
                    <div class="form-group  col-md-2">
                        <label >  الايام	</label>
                        <input type="text" class="form-control"  placeholder="  الايام " name="day" value="1"  required><br>

                    </div>       
                    <div class="form-group col-md-1" style="padding-top: 25px">

                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> تمديد</button>

                    </div> 


                    <?php
                } else {
                    ?>

                    <div class="form-group  col-md-1">
                        <label >  الايام	</label>
                        <input type="text" class="form-control"  placeholder="  الايام " name="day" value="1"  required><br>

                    </div>
                    <div class="form-group col-md-1">
                        <label for="exampleInputEmail1">مبلغ الكاش   </label>
                        <input type="number" class="form-control"  placeholder=" المبلغ " name="bill"  value="" required >
                    </div>
                    <div class="form-group col-md-1">
                        <label > الكي نت	</label>
                        <input type="number" class="form-control"  placeholder=" مبلغ الكي نت " name="knet"  value=""  ><br>
                    </div>
                    <div class="form-group  col-md-2">
                        <label >  الوصل	</label>
                        <input type="text" class="form-control"  placeholder=" الوصل " name="billprint" value=""><br>

                    </div>
                     <div class="form-group  col-md-2">
                        <label >  التفويض	</label>
                        <input type="text" class="form-control"  placeholder=" التفويض " name="knetcode" value=""><br>

                    </div>
                    <div class="form-group  col-md-3">
                        <label >   ملاحظه على السعر	</label>
                        <textarea class="form-control" rows="3" placeholder=" الملاحظة ان وجدت   ..." name="comment8"></textarea><br>
                    </div>
                    <div class="form-group col-md-1" style="padding-top: 25px">

                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> تمديد</button>

                    </div>
                    <div class="form-group  col-md-12">


                    </div>

                    <?php
                }
                ?>
                <?php
                $hours = round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60), 0);
                ?></form>
                    <br>
                              <?php echo form_open_multipart(base_url('booking/booked/add3/'.$show['id'])); ?>
            
              <div class="input-group col-md-4">
                  <input type="text" name="bill" placeholder="ادخل المبلغ" class="form-control" required>
                        </div>   <div class="input-group col-md-4">
                            <input type="number" name="mobile" placeholder="رقم التلفون " class="form-control" required value="<?= $show['mobile'] ?>">
                      <span class="input-group-btn">
                          <button type="submit" class="btn btn-success btn-flat" name="submit" value="211"> ارسال رابط دفع تمديد  </button>
                      </span>
                </div>
               
                    <input type="hidden" class="form-control"  name="cid"  value="<?= $show['cid'] ?>"  >
                    <input type="hidden" class="form-control"  name="room"  value="<?= $show['id'] ?>"  >
              </form>
            </div>
            <!-- /.box-body -->



        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>




<?php   if ($show['file1'] or $show['file2']) {

                if (!file_exists($show['file1']))
                {
              
             ?>
    <div class="alert alert-danger alert-dismissible">

        <h4><i class="icon fa-danger"></i> تنبيه</h4>
        <div> يرجا رفع اثبات العميل قبل الخروج</div>

     

    </div>
    <?php 
                    
                }
    }
    
    ?>


    
    
    <?php   if ($show['inok']==1 ) {

                
              
             ?>
    <div class="alert alert-danger alert-dismissible">

        <h4><i class="icon fa-danger"></i> تنبيه</h4>
        <div> يرجا   عمل خروج يسستم الداخلية</div>

     

    </div>
    <?php 
          
    }
    
    ?>


<?php if (round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60), 0) < 9): ?>
    <?php echo form_open_multipart(base_url('booking/dashboard/idend/' . $show['id'])); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <?php
                $hours = round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60), 0);
                ?>
                <div class="box-header with-border">
                    <h3 class="box-title">    عمل خروج 

                        <?php if ((int) $show['timeend'] < (int) $this->booking->tissme_now() and $hours > 2): ?>


                        <?php endif; ?>
                    </h3>
                </div>
                <div class="box-body">

                    <div class="form-group col-md-12">

                        <textarea class="form-control" rows="3" placeholder="ملاحظة ان وجدت ..." name="comment7"><?= $show['comment7'] ?></textarea><br>
                    </div>

                    <?php if ((int) $show['timeend'] < (int) $this->booking->tissme_now() and $hours > 2): ?>
                        <div class="form-group  col-md-2">
                            <label >  مدة التاخير	</label><br>
                            <?= $this->booking->getNiceDuration($this->booking->tissme_now() - $show['timeend']); ?>
                        </div>
   <div class="form-group  col-md-2">
                            <label >  المبلغ المطلوب 	</label><br>

                        <?php
                        $billg = 35;
                        if ($hours > 2)
                            $billg = 5;
                        if ($hours > 3)
                            $billg = 10;
                        if ($hours > 4)
                            $billg = 15;
                        if ($hours > 5)
                            $billg = 20;
                        if ($hours > 6)
                            $billg = 30;
                        ?>
                            
                               المطلوب : <?= $billg ?>    </div>
                        <input type="hidden" dir="rtl" name="comment1" size="40" value="<?= $hours ?>"   />

                        <div class="form-group  col-md-2">
                            <label >  الكاش	</label>
                            <input type="number" class="form-control"  placeholder="" name="bill" value=""  required><br>
                         
                            <input type="hidden" dir="rtl" name="comment22" size="40" value="<?= $billg ?>"   />
                        </div>
                        
                           <div class="form-group col-md-1">
                        <label > الكي نت	</label>
                        <input type="number" class="form-control"  placeholder=" مبلغ الكي نت " name="knet"  value=""  ><br>
                    </div>
                    <div class="form-group  col-md-2">
                        <label >  الوصل	</label>
                        <input type="text" class="form-control"  placeholder=" الوصل " name="billprint" value=""><br>

                    </div>
                     <div class="form-group  col-md-2">
                        <label >  التفويض	</label>
                        <input type="text" class="form-control"  placeholder=" التفويض " name="knetcode" value=""><br>

                    </div>

                    <?php endif; ?>

                    <div class="col-md-12">
                        <div class="box-footer">
                            <?php
                            
                                if (count($booking_card)>0) {
                                    
                                    
                               ?>    
                            <span style=" color: green"> 
                       <input type="radio" name="card" id="optionsRadios1" value="2" required>
                  &nbsp;استلمت الكرت   &nbsp; &nbsp;&nbsp; &nbsp;
                            </span><br>      <span style=" color: red"> 
                       <input type="radio" name="card" id="optionsRadios1" value="3" required>
                  &nbsp; فقد العميل الكرت   &nbsp; &nbsp;&nbsp; &nbsp;
      </span>
                             <?php
                                } ?> 
                            <button type="submit" class="btn btn-danger" name="submit" value="pl" style="margin-top: -30px;
    height: 50px;
"> خروج</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>

    </form>
<?php endif; ?>
<?php if (round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60), 0) > 3): ?>

    <?php echo form_open_multipart(base_url('booking/dashboard/gowait/' . $show['id'])); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">     تحويل ايجار لم يسترد  </h3>
                </div>
                <div class="box-body">

                    <div class="form-group col-md-4">
                        <label >   الملاحظة	</label>
                        <textarea class="form-control" rows="3" placeholder="ملاحظة ان وجدت ..." name="comment7"><?= $show['comment7'] ?></textarea><br>
                    </div>

                    <?php if ((int) $show['timeend'] < (int) $this->booking->tissme_now()): ?>
                        <div class="form-group  col-md-2">
                            <label >  مدة التاخير	</label><br>
                            <?= $this->booking->getNiceDuration($this->booking->tissme_now() - $show['timeend']); ?>
                        </div>

                        <?php
                        $billg = 35;
                        $hours = round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60), 0);
                        $daywait = round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60 / 24), 0);
                        if ($hours > 2)
                            $billg = 5;
                        if ($hours > 3)
                            $billg = 10;
                        if ($hours > 4)
                            $billg = 15;
                        if ($hours > 5)
                            $billg = 20;
                        if ($hours > 6)
                            $billg = 25;
                        if ($hours > 7)
                            $billg = 35;


                        if ($daywait > 1)
                            $billg = ($billg * $daywait) + $billg;
                        ?>
                        <input type="hidden" dir="rtl" name="comment1" size="40" value="<?= $hours ?>"   />



                    <?php endif; ?>
                    <div class="form-group  col-md-2">
                        <label >  الاثبات الموجود	</label><br>
                        <select name="nowait" dir="rtl" style="  width: 100px;

                                margin-top: 10px;">

                            <option>لايوجد اي اثبات  </option>
                            <option>بطاقة مدنية</option>
                            <option>جواز سفر</option>
                            <option>بطاقة احوال</option>
                            <option>رخصة قيادة</option>

                        </select>
                    </div>
                    <div class="form-group  col-md-2">
                        <label >  المبلغ	</label>
                        <input type="number" class="form-control"  placeholder="" name="comment2" value="<?= $billg ?>"  required><br>
                        <input type="hidden" class="form-control"  placeholder="" name="comment2old" value="<?= $billg ?>"  required><br>

                    </div>

               <div class="col-md-12">
                        <div class="box-footer">
                            <?php
                            
                                if (count($booking_card)>0) {
                                    
                                    
                               ?>    
                            <span style=" color: green"> 
                       <input type="radio" name="card" id="optionsRadios1" value="2" required>
                  &nbsp;استلمت الكرت   &nbsp; &nbsp;&nbsp; &nbsp;
                            </span><br>      <span style=" color: red"> 
                       <input type="radio" name="card" id="optionsRadios1" value="3" required>
                  &nbsp; فقد العميل الكرت   &nbsp; &nbsp;&nbsp; &nbsp;
      </span>
                             <?php
                                } ?> 
                            <button type="submit" class="btn btn-danger" name="submit" value="pl" style="margin-top: -30px;
    height: 50px;
"> خروج</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>

    </form>

<?php endif; ?>

<?php
if ($show['datetext4'] == $data_day) {



    echo form_open_multipart(base_url('booking/dashboard/editknet/' . $show['id']));
    ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">  تغير الكاش الى كي نت </h3>
                </div>
                <div class="box-body">
                    <div class="row">



                        <div class="form-group col-md-1">
                            <label for="exampleInputEmail1">مبلغ الكلي    </label>


                            <input type="text" class="form-control"  placeholder=" المبلغ " name="bill"  value="<?= ($show['bill'] ) ?>" required disabled="">
                        </div>

                        <div class="form-group col-md-1">
                            <label for="exampleInputEmail1">مبلغ الكاش   </label>


                            <input type="text" class="form-control"  placeholder=" المبلغ " name="bill"  value="<?= ($show['bill'] - intval($show['knet']) ) ?>" required disabled="">
                        </div>
                        <div class="form-group col-md-2">
                            <label >  مبلغ الكي نت	</label>
                            <input type="text" class="form-control"  placeholder=" مبلغ الكي نت " name="knet"  value="<?= $show['knet'] ?>"  ><br>
                        </div>
                        <div class="form-group  col-md-1">
                            <label >  الوصل	</label>
                            <input type="text" class="form-control"  placeholder=" الوصل " name="billprint" value="<?= $show['billprint'] ?>"><br>

                        </div>

                            <div class="form-group  col-md-2">
                        <label >  التفويض	</label>
                        <input type="text" class="form-control"  placeholder=" التفويض " name="knetcode" value="<?= $show['knetcode'] ?>"><br>

                    </div>
                        <div class="form-group  col-md-3">
                            <label >  السبب	</label>
                            <input type="text" class="form-control"  placeholder=" يرجا كتابة السبب اجباري " name="comment" value=""  required=""><br>

                        </div>



                        <div class="form-group col-md-" style="padding-top: 25px">

                            <button type="submit" class="btn btn-primary" name="submit" value="pl"> تعديل</button>

                        </div>


                    </div>
                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>

    </form>

<?php
}

if ($this->session->userdata('group') or  ($this->session->userdata('editor') and $show['datetext4'] == $data_day )):
    ?>

    <?php echo form_open_multipart(base_url('booking/dashboard/editbooking/' . $show['id'])); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">  تعديل </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label >  الاسم	</label>
                            <input type="text" class="form-control"  placeholder="   الاسم " name="name"  value="<?= $show['name'] ?>"  ><br>
                        </div>

                        <div class="form-group col-md-2">
                            <label >  الرقم المدني	</label>
                            <input type="text" class="form-control"  placeholder="   الاسم " name="cid"  value="<?= $show['cid'] ?>"  ><br>
                        </div>
                        <div class="form-group  col-md-2">
                            <label >  البوكنق	</label>
                            <input type="text" class="form-control"  placeholder="  البوكنق " name="bookingnew" value="<?= $show['bookingnew'] ?>"  ><br>

                        </div>

                        <div class="form-group col-md-1">
                            <label for="exampleInputEmail1">مبلغ الكاش   </label>

                            <input type="hidden" class="form-control"  placeholder=" المبلغ " name="billold"  value="<?= $show['bill'] ?>" required >
                            <input type="text" class="form-control"  placeholder=" المبلغ " name="bill"  value="<?= ($show['bill'] - intval($show['knet']) ) ?>" required >
                        </div>
                        <div class="form-group col-md-1">
                            <label > الكي نت	</label>
                            <input type="text" class="form-control"  placeholder=" مبلغ الكي نت " name="knet"  value="<?= $show['knet'] ?>"  ><br>
                        </div>
                        <div class="form-group  col-md-1">
                            <label >  الوصل	</label>
                            <input type="text" class="form-control"  placeholder=" الوصل " name="billprint" value="<?= $show['billprint'] ?>"><br>

                        </div>
    <div class="form-group  col-md-1">
                        <label >  التفويض	</label>
                        <input type="text" class="form-control"  placeholder=" التفويض " name="knetcode" value="<?= $show['knetcode'] ?>"><br>

                    </div>


                        <div class="form-group col-md-" style="padding-top: 25px">

                            <button type="submit" class="btn btn-primary" name="submit" value="pl"> تعديل</button>

                        </div>


                    </div>
                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>

    </form>

<?php endif; ?>

<?php if ($this->session->userdata('group') or $this->session->userdata('editor')): ?>

    <?php echo form_open_multipart(base_url('booking/dashboard/editwait/' . $show['id'])); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">  تحويل  من المبلغ الى ايجار لم يتمالايراد </h3>
                </div>
                <div class="box-body">


                    <div class="form-group col-md-2">
                        <label >  المبلغ المطلوب	</label>
                        <input type="text" class="form-control"  placeholder=" مبلغ الكي نت " name="comment2"  value="<?= $show['comment2'] ?>"  ><br>
                    </div>
                    <div class="form-group  col-md-2">
                        <label >  السبب	</label>
                        <input type="text" class="form-control"  placeholder=" الوصل " name="comment3" value="<?= $show['comment3'] ?>"><br>

                    </div>

                    <div class="form-group  col-md-3">
                        <label >  الاثبات	</label>
                        <input type="text" class="form-control"  placeholder="  البوكنق " name="nowait" value="<?= $show['nowait'] ?>"  ><br>

                    </div>

                    <div class="form-group col-md-" style="padding-top: 25px">

                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> تعديل</button>

                    </div>



                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>

    </form>

<?php endif; ?>
<!-- /.row -->



