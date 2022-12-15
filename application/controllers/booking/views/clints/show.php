

<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('booking/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('booking/clints/') ?>">العملاء</a></li>
    </ol>
</section>
 <?php if (( $show['black'] == 'ok' or $show['black'] == 'all'  ) and ($this->session->userdata('group')  or  $this->session->userdata('editor'))): ?>
    <div class="row">    <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/dashboard/blacklist/<?= $show['id'] ?>" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   ازالة  البلاك لست</a> 	</div>
            </div>  </div>
    
    <?php endif; ?>
<div class="row">
    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">  عرض عميل </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>

                            <th  colspan="4">البيانات</th>

                        </tr>

                        <tr>
                            <td>الاسم</td>
                            <td><?= $show['name']; ?></td>
                            <td>الجنسية</td>
                            <td><?= $show['country']; ?></td>
                        </tr>

                        <tr>
                            <td>المدني</td>
                            <td><?= $show['cid']; ?> </td>
                            <td>التليفون</td>
                            <td><?= $show['mobile']; ?> </td>




                        </tr>

                        <tr>
                            <td>النوع</td>
                            <td><?= $show['oky']; ?> </td>
                            <td>الوصف</td>
                            <td><?= $show['comment']; ?> </td>




                        </tr>
                        <tr>

                            <td colspan="4">
                                <div class="col-sm-4">
                                    <img class="img-responsive" src="<?= base_url($show['file1']) ?>" alt="Photo">
                                </div> 
                                <div class="col-sm-4">
                                    <img class="img-responsive" src="<?= base_url($show['file2']) ?>" alt="Photo">
                                </div>
                                      <div class="col-sm-4"> عقد زواج
                                    <img class="img-responsive" src="<?= base_url($show['file3']) ?>" alt="Photo">
                                </div>
                            </td>




                        </tr>

                        <tr>





                        </tr>



                    </table>

                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="pull-rigth header"><i class="fa fa-th"></i>    الحركات <i class="fa fa-th"></i> </li>

                    <li class="active"><a href="#tab_1-1" data-toggle="tab">الملاحظات  <b> (<?=
count($all_groups3 )?>)</b></a></li>
                    <li><a href="#tab_2-2" data-toggle="tab">التاخيرات  <b> (<?=
count($all_groups2 )?>)</b></a></li>
                    <li><a href="#tab_3-2" data-toggle="tab">الكل  <b> (<?=
count($all_groups )?>)</b></a></li>
                    
                           <li><a href="#tab_3-4" data-toggle="tab">الباقات  <b> (<?=
count($all_sub )?>)</b></a></li>
                    <li class="dropdown">

                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">



                        <table class="table table-bordered">
                            <tr>

                                <th>الشقة</th>
                                <th>الايام</th>
                                <th>المبلغ</th>
                                 <th>الملاحظة</th>
                                <th>الدخول</th>
                                <th >الخروج</th>
                               
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
                                    <td><?= $this->booking->tissme_show($row['timeend']); ?> </td>



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
                                <th >الخروج</th>
                                <th >المبلغ</th>
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
                                    <td><?= $this->booking->tissme_show($row['timeend']); ?> </td>



                                    <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   


                   
                    </div>
                    <div class="tab-pane" id="tab_3-4"><br><br>
                 <div style="font-size: 25px" class="row">
                            <?php
                            $count = 0;
                            foreach ($all_sub as $rowss):

if($rowss['text1']==1)echo "ذهبية";
if($rowss['text1']==2)echo "فضية";
if($rowss['text1']==3)echo "برونزية";
if($rowss['text1']==4)echo "عادية";
                           
                                ?></div>
                 <?php endforeach; ?><br><br>
                        <table class="table table-bordered">
                            <tr>

                                <th>الشقة</th>
                                <th>الايام</th>
                                <th>المبلغ</th>
                                <th>الدخول</th>
                                <th >الخروج</th>
                                <th >المبلغ</th>
                                <th style="width: 40px"></th>

                            </tr>

                            <?php
                            $count = 0;
                            foreach ($all_sub_booking as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                                    <td><?= $row['room']; ?></td>
                                    <td><?= $row['day']; ?></td>
                                    <td><?= $row['bill']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                                    <td><?= $this->booking->tissme_show($row['timeend']); ?> </td>



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

<?php if ($this->session->userdata('group')): ?>

        <!-- /.row -->

        <br>
        <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/edit/' . $show['id']) ?>"><i class="material-icons">تعديل </i></a>

     

        <br> <br>     <!-- /.box -->

    <?php endif; ?>
    <!-- /.box -->
<?php 



if ($show['black'] != 'ok' and $show['black'] != 'all' ): ?>

    <?php echo form_open_multipart(base_url('booking/clints/clint_blacklist/' . $show['id'])); ?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">    تغير بلاك لست   </h3>
                    </div>
                    <div class="box-body">
<?php     if (stristr($_SERVER['REQUEST_URI'], '/booking4/') and ! $this->session->userdata('editor') and !$this->session->userdata('group')) { 

echo 'لايمكن وضع بلاك لست فقط مسؤل الفرع';

}else{?>
                        <div class="form-group col-md-6">
                            <label >السبب   </label>
                            <textarea class="form-control" rows="3" placeholder=" السبب  ..." name="comment"></textarea><br>
                        </div>
                        <div class="form-group col-md-6">

                        </div>

                        <div class="col-md-2">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-danger" name="submit" value="ok">  بلاك لست</button>
                                <?php     if (  $this->session->userdata('editor') or $this->session->userdata('group')) { 


?><button type="submit" class="btn btn-danger" name="submit" value="all">   بلاك لست لجميع الفروع</button>
                                    <?php } ?>
                            </div>
                        </div>
                        
                        <?php } ?>
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