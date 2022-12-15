<?php

$namecheck='';
        if ($this->session->userdata('checkout'))$namecheck=$this->session->userdata('name');

?>

<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('booking/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('booking/show/') ?>"> الحركات</a></li>
    </ol>
</section>
<br>
<div class="row">
    <?php if ($show['counter'] == '2'): ?>
  <?php if (($show['checkout'] )): ?>
        
        
          <?php echo form_open_multipart(base_url('booking/Dashboard/cleanfinsh/'.$show['id'])); ?>
            
              <div class="input-group col-md-4">
                  <input type="text" name="checkclean" placeholder=" ادخل اسم المشيك بعد التنظيف  ..." class="form-control" value="<?=$show['checkclean']?>">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat">تغير الى متاحة </button>
                      </span>
                </div>
              </form>
     
        <?php endif; ?>
        



       

      








        <?php if (round(((($this->booking->tissme_now() - $show['timeend2']) / 60) / 60), 0) < 1): ?>


            <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/dashboard/idend/<?= $show['id'] ?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  طباعة الخروج </a> 	</div>



            </div>

        <?php endif; ?>
    <?php endif; ?>
</div>

         <?php if (!$show['checkout']): ?>
          <?php echo form_open_multipart(base_url('booking/Dashboard/checkout/'.$show['id'])); ?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">   التشيك على الشقة قبل الخروج    </h3>
                </div>
                <div class="box-body">



        
                    
                        <div class="form-group col-md-5">
                        <label >   المفقودات	</label>
                        <textarea class="form-control" rows="3" placeholder=" المفقودات ان وجدت   ..." name="lost"   ></textarea><br>ليست اجبارية ان وجدت
                    </div>
                    <div class="form-group col-md-2" >
      <label >   اسم المشيك	</label>
                     <input type="text" name="checkout" placeholder=" ادخل اسم المشيك   ..." class="form-control" required>
                   <br>  <span class="input-group-btn"><br><br>
                        <button type="submit" class="btn btn-warning btn-flat">تغير الى نظافة </button>
                      </span>

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

<br>
   <div class="row">  <div class="col-md-8">
<?php if (round(((($this->booking->tissme_now() - $show['timeend2']) / 60) / 60), 0) < 3): ?>
    <?php echo form_open_multipart(base_url('booking/dashboard/commentnbeh/' . $show['id'])); ?>

 
        <!-- left column -->
      
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">     الملاحظة على التسكين</h3>
                </div>
                <div class="box-body">



                    <div class="form-group col-md-8">
                        <label >   الملاحظة	</label>
                        <textarea class="form-control" rows="3" placeholder=" الملاحظة ان وجدت   ..." name="comment7" required><?= $show['comment7'] ?></textarea><br>
                    </div>
                    
                  
                    <div class="form-group col-md-2" >

                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> تحديث</button>

                    </div>



                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->


        
        
        
        
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
  

    </form>

<?php endif; ?>
    
        </div>
         <?php if (round(((($this->booking->tissme_now() - $show['timeend2']) / 60)), 0) < 5): ?>

              
              
              
                        <?php echo form_open_multipart(base_url('booking/Dashboard/backroom/'.$show['id'])); ?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <!-- general form elements -->
            <div class="box box-primary">
   
                <div class="box-body">



        
                    
                        <div class="form-group col-md-12">
                        <label >   سبب الاسترجاع 	</label>
                        <textarea class="form-control" rows="3" placeholder="  االسبب اجباري    ..." name="comment"   required=""></textarea><br>   
                    </div>
                    <div class="form-group col-md-2" >
 <span class="input-group-btn"><br><br>
                        <button type="submit" class="btn btn-danger btn-flat"> استرجاع التسكين   </button>
                      </span>

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
  </div>
<?php if (isset($msg) || validation_errors() !== ''): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa-warning"></i> خطأ</h4>
        <?= validation_errors(); ?>
        <?= isset($msg) ? $msg : ''; ?>
    </div>
<?php endif; ?>


<?php if ($show['comment5'] == 'wait'): ?>


    <?php echo form_open_multipart(base_url('booking/dashboard/idbackwait/' . $show['id'])); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">   ايجار لم يسترد  </h3>
                </div>
                <div class="box-body">

                       <div class="form-group  col-md-2">
                            <label >  المبلغ المطلوب 	</label><br>
                            <?= $show['comment2'] ?>
                            
                              </div>
                       <div class="form-group  col-md-2">
                            <label >  الكاش	</label>
                            <input type="number" class="form-control"  placeholder="" name="bill" value=""  required><br>
                         
                     
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
              
                    <input type="hidden" class="form-control"  placeholder=" المبلغ " name="billbackold"  value="<?= $show['comment2'] ?>" required >
                    <div class="form-group col-md-6">   <label >  <?= $show['comment2'] ?>
                            دينار
                            - بسبب تاخير
                            <?= $this->booking->getNiceDuration($show['timeend2'] - $show['timeendout']); ?>
                            <br>
                            عند الاسترجاع سوف يتم زالة البلاك لست تلقائي</label>
                    </div>



                    <div class="form-group col-md-" style="padding-top: 25px">

                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> استرجاع </button>

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


<div class="row">

    <div class="col-md-12">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right" style="width: 100%;
                /* padding-bottom: 20px; */
                margin-bottom: 20px;    border-bottom-color: #3c8dbc;">

                <li class="active"><a href="#tab_1-1" data-toggle="tab">بيانات العميل</a></li>
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
                
                
                $comment=str_replace("||||","****",$show['comment']);
$comment=str_replace("|||","###",$comment);
$comment=str_replace("||","**",$comment);
$comment=str_replace("###","|||",$comment);
           $comment=explode("|||",$comment);

	for($i=0;$i<count($comment);$i++):

       $commentdd=explode("**",$comment[$i]);
                if(isset($commentdd[1])):
                ?>
                <div class="box-body">

                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> الاسم   </label>
                        
                       <br><?=$commentdd[0]?>
                  </div>
                    <div class="form-group col-md-2">
                        <label >  الرقم المدني	</label>
                        <br><?=$commentdd[1]?>
                    </div>
                    <div class="form-group  col-md-2">
                        <label >  التليفون	</label>
                      <br><?=$commentdd[2]?>
                    </div>

                    <div class="form-group  col-md-3">
                        <label >  الجنسية	</label>
                      <br><?=$commentdd[3]?>
                    </div>

                   



                </div>
                
                <?php endif;        endfor;?>
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
                <h3 class="box-title">  حركة العميل     بالعقد   <?= $show['3gd'] ?> -  مدة الاقامة  :    <?= $this->booking->getNiceDuration($show['timeenter']-$show['timeend']); ?></h3>
            </div>

<?php $count = 0;
foreach ($all_book as $row): ?>
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

                    <div class="form-group  col-md-3">
                        <label >  الخروج	</label>
                        <br>
                        <span style="color: red;font-size: 20px;" >  <?= $this->booking->tissme_show($show['timeend']); ?></span>
                    </div>
                     <div class="form-group  col-md-2">
                            <label > اسم المشيك</label>
                            <br>
                            <span style="color: red;font-size: 20px;" >  <?= ($show['checkout']); ?></span>
                        </div>
<?php if (($show['timecleanfinsh']) != ''): ?>
                    
                    
                      
                    
                        <div class="form-group  col-md-3">
                            <label >    وقت الانتهاء من التظيف	</label>
                            <br>
                            <span style="color: red;font-size: 20px;" >  <?= $this->booking->tissme_show($show['timecleanfinsh']); ?></span>
                        </div>
                        <div class="form-group  col-md-2">
                            <label >      مدة التظيف 	</label>
                            <br>
                            <span style="color: red;font-size: 20px;" >  <?= $this->booking->getNiceDuration($show['timecleanfinsh'] - $show['timeend'], '2'); ?></span>
                        </div>
                     <div class="form-group  col-md-2">
                            <label > اسم مشيك النظافة</label>
                            <br>
                            <span style="color: red;font-size: 20px;" >  <?= ($show['checkclean']); ?></span>
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



    <?php echo form_open_multipart(base_url('booking/dashboard/editbillprint/' . $show['id'])); ?>
 <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">  تعديل رقم الوصل والتفويض </h3>
                </div>
                <div class="box-body">
                    <div class="row">
               
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
 





<?php if ($this->session->userdata('group') or  ($this->session->userdata('editor') and $show['datetext4'] == $data_day )): ?>

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
                        <input type="text" class="form-control"  placeholder=" المبلغ " name="bill"  value="<?= ($show['bill'] - intval($show['knet']) )?>" required >
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
 <?php if ($this->session->userdata('group')  or  $this->session->userdata('editor') ): ?>
    <?php if ($show['counter'] == '2' ): ?>   <div class="row">

            <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/dashboard/backroom/<?= $show['id'] ?>" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   استرجاع</a> 	</div>



            </div>
        </div>

    <?php endif; ?>
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



