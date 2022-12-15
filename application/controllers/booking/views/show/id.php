

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

        <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url('booking/Dashboard/cleanfinsh/' . $show['id']) ?>" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   تغير الى متاحة</a> 	</div>



        </div>

        <?php if (round(((($this->booking->tissme_now() - $show['timeend2']) / 60)), 0) < 5): ?>

            <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/dashboard/backroom/<?= $show['id'] ?>" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   استرجاع التسكين</a> 	</div>



            </div>
        <?php endif; ?>








        <?php if (round(((($this->booking->tissme_now() - $show['timeend2']) / 60) / 60), 0) < 1): ?>


            <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/dashboard/idend/<?= $show['id'] ?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  طباعة الخروج </a> 	</div>



            </div>

        <?php endif; ?>
    <?php endif; ?>
</div>
<?php if ($show['counter'] == '1'): ?>
    <div class="row">

       
            <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/printbill/<?= $show['id'] ?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  طباعة الفاتورة</a> 	</div>



        </div>
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
    </div>
<?php endif; ?>

<br>

<?php if (round(((($this->booking->tissme_now() - $show['timeend2']) / 60) / 60), 0) < 3): ?>
    <?php echo form_open_multipart(base_url('booking/dashboard/commentnbeh/' . $show['id'])); ?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
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
                    <div class="form-group col-md-4" >

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
            </div></div></div>
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

                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">  المبلغ المطلوب

                        </label>
                        <input type="number" class="form-control"  placeholder=" المبلغ " name="billback"  value="<?= $show['comment2'] ?>" required >
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
                <h3 class="box-title">  حركة العميل     بالعقد   <?= $show['3gd'] ?></h3>
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


<?php if ($show['counter'] == '1'): ?>

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

    
       <?php if ((!$show['oldroom'] and ! $this->session->userdata('group') )or $this->session->userdata('group')): ?>
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
                            <textarea class="form-control" rows="3" placeholder=" سبب النقل  ..." name="msgmove" required></textarea><br>
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


    
    <?php echo form_open_multipart(base_url('booking/dashboard/idrenew/' . $show['id'])); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">   التمديد  </h3>
                </div>
                <div class="box-body">
                    <div class="form-group  col-md-2">
                        <label >  الايام	</label>
                        <input type="text" class="form-control"  placeholder="  الايام " name="day" value="1"  required><br>

                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">مبلغ الكاش   </label>
                        <input type="number" class="form-control"  placeholder=" المبلغ " name="bill"  value="" required >
                    </div>
                    <div class="form-group col-md-2">
                        <label > الكي نت	</label>
                        <input type="number" class="form-control"  placeholder=" مبلغ الكي نت " name="knet"  value=""  ><br>
                    </div>
                    <div class="form-group  col-md-2">
                        <label >  الوصل	</label>
                        <input type="text" class="form-control"  placeholder=" الوصل " name="billprint" value=""><br>

                    </div>
                    <div class="form-group  col-md-3">
                        <label >   ملاحظه على السعر	</label>
                        <textarea class="form-control" rows="3" placeholder=" الملاحظة ان وجدت   ..." name="comment8"></textarea><br>
                    </div>
  <div class="form-group col-md-1" style="padding-top: 25px">

                        <button type="submit" class="btn btn-primary" name="submit" value="pl"> تمديد</button>

                    </div>
    <div class="form-group  col-md-12">
        <?php
        
        
           $hours = round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60), 0);
     ?>
                   
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

 



    <?php if (round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60), 0) < 10): ?>
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

                        <div class="form-group col-md-6">

                            <textarea class="form-control" rows="3" placeholder="ملاحظة ان وجدت ..." name="comment7"><?= $show['comment7'] ?></textarea><br>
                        </div>
      
                        <?php if ((int) $show['timeend'] < (int) $this->booking->tissme_now() and $hours > 2): ?>
                            <div class="form-group  col-md-2">
                                <label >  مدة التاخير	</label><br>
            <?= $this->booking->getNiceDuration($this->booking->tissme_now() - $show['timeend']); ?>
                            </div>


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
                            <input type="hidden" dir="rtl" name="comment1" size="40" value="<?= $hours ?>"   />

                            <div class="form-group  col-md-2">
                                <label >  المبلغ	</label>
                                <input type="number" class="form-control"  placeholder="" name="comment2" value=""  required><br>
                                المطلوب : <?= $billg ?>
                                   <input type="hidden" dir="rtl" name="comment22" size="40" value="<?= $billg ?>"   />
                            </div>

        <?php endif; ?>

                        <div class="col-md-2">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-danger" name="submit" value="pl"> خروج</button>
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


 <?php if (round(((($this->booking->tissme_now() - $show['timeend']) / 60) / 60), 0) > 9): ?>

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

                        <div class="col-md-2">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-danger" name="submit" value="pl">      خروج</button>
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
<?php endif; ?>

<?php if ($this->session->userdata('group')): ?>

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

                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">مبلغ الكاش   </label>
                        <input type="text" class="form-control"  placeholder=" المبلغ " name="bill"  value="<?= $show['bill'] - $show['knet'] ?>" required >
                    </div>
                    <div class="form-group col-md-2">
                        <label > الكي نت	</label>
                        <input type="text" class="form-control"  placeholder=" مبلغ الكي نت " name="knet"  value="<?= $show['knet'] ?>"  ><br>
                    </div>
                    <div class="form-group  col-md-2">
                        <label >  الوصل	</label>
                        <input type="text" class="form-control"  placeholder=" الوصل " name="billprint" value="<?= $show['billprint'] ?>"><br>

                    </div>

                    <div class="form-group  col-md-3">
                        <label >  البوكنق	</label>
                        <input type="text" class="form-control"  placeholder="  البوكنق " name="bookingnew" value="<?= $show['bookingnew'] ?>"  ><br>

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
    <?php if ($show['counter'] == '2'): ?>   <div class="row">

            <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/dashboard/backroom/<?= $show['id'] ?>" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   استرجاع</a> 	</div>



            </div>
        </div>

    <?php endif; ?>
<?php endif; ?>
<!-- /.row -->



