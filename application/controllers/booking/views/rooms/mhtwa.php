


<style
    
    
    
    >
    .box{
      margin-top: 70px;
    }
    </style>



<div class="row">

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/rooms/addmhtwa/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة محتوى</a> 	</div>



    </div>
    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/rooms/alledite/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  تعديل جماعي</a> 	</div>



    </div>

 <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/rooms/mhtwastat/1" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  احصائيات المحتويات  الاساسية</a> 	</div>



        </div>
    
    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/rooms/mhtwastat/2" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  احصائيات المحتويات الصيانة</a> 	</div>



        </div>
    
    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/rooms/mhtwastat/3" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  احصائيات المحتويات العادية</a> 	</div>



        </div>











</div>

    <br>
 <div class="row">

        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right" style="width: 100%;
    /* padding-bottom: 20px; */
    margin-bottom: 20px;    border-bottom-color: #3c8dbc;">
       
    <li class="active"><a href="#tab_1-1" data-toggle="tab"> الصالة</a></li>
                    <li><a href="#tab_2-2" data-toggle="tab">الماستر
                    
                        </a></li>
                    <li><a href="#tab_3-2" data-toggle="tab"> الثانية
                          </a></li>
                          
                               <li><a href="#tab_3-7" data-toggle="tab"> الثالثة
                          </a></li>
                          
                               <li><a href="#tab_3-4" data-toggle="tab"> المطبخ
                          </a></li>   
                          
                          <li><a href="#tab_3-5" data-toggle="tab"> 
                 الحمام         </a></li>
                                  <li><a href="#tab_3-6" data-toggle="tab"> حمام الماستر
                          </a></li>  
   
   
   

                  
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
                        
                        
        
           <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  المحتويات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <td style="width: 10px">الترتيب</th>
                            <th>الاسم</th>
                            <th>انجلزي</th>
                            <th>السعر</th>
                            <th>المكان</th>
                            <th>اساسي</th>   
                            <th></th>
                            <th></th>


                        </thead>

                        <?php $count = 0;
                        foreach ($all_groups1 as $row):
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>
                                <td><?= $row['text6']; ?> </td>
                                <td><?= $row['noa']; ?> </td>

                                <td><?= $row['noa2']; ?> </td>


                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/editmhtwa/' . $row['id']) ?>"><i class="material-icons">تعديل</i></a>
                                </td>

                                <td>
                                    <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/delmhtwa/' . $row['id']); ?>" ><i class="material-icons">حذف</i></a>
                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                        </ul>
                    </div>
<?php endif; ?>   
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>
                      
                    </div>
              
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2-2">


              
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  المحتويات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <td style="width: 10px">الترتيب</th>
                            <th>الاسم</th>
                            <th>انجلزي</th>
                            <th>السعر</th>
                            <th>المكان</th>
                            <th>اساسي</th>   
                            <th></th>
                            <th></th>


                        </thead>

                        <?php $count = 0;
                        foreach ($all_groups2 as $row):
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>
                                <td><?= $row['text6']; ?> </td>
                                <td><?= $row['noa']; ?> </td>

                                <td><?= $row['noa2']; ?> </td>


                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/editmhtwa/' . $row['id']) ?>"><i class="material-icons">تعديل</i></a>
                                </td>

                                <td>
                                    <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/delmhtwa/' . $row['id']); ?>" ><i class="material-icons">حذف</i></a>
                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                        </ul>
                    </div>
<?php endif; ?>   
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>

                    </div>
                    
                            <div class="tab-pane" id="tab_3-7">


              
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  المحتويات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <td style="width: 10px">الترتيب</th>
                            <th>الاسم</th>
                            <th>انجلزي</th>
                            <th>السعر</th>
                            <th>المكان</th>
                            <th>اساسي</th>   
                            <th></th>
                            <th></th>


                        </thead>

                        <?php $count = 0;
                        foreach ($all_groups7 as $row):
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>
                                <td><?= $row['text6']; ?> </td>
                                <td><?= $row['noa']; ?> </td>

                                <td><?= $row['noa2']; ?> </td>


                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/editmhtwa/' . $row['id']) ?>"><i class="material-icons">تعديل</i></a>
                                </td>

                                <td>
                                    <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/delmhtwa/' . $row['id']); ?>" ><i class="material-icons">حذف</i></a>
                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                        </ul>
                    </div>
<?php endif; ?>   
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3-2">

                 
                
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  المحتويات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <td style="width: 10px">الترتيب</th>
                            <th>الاسم</th>
                            <th>انجلزي</th>
                            <th>السعر</th>
                            <th>المكان</th>
                            <th>اساسي</th>   
                            <th></th>
                            <th></th>


                        </thead>

                        <?php $count = 0;
                        foreach ($all_groups3 as $row):
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>
                                <td><?= $row['text6']; ?> </td>
                                <td><?= $row['noa']; ?> </td>

                                <td><?= $row['noa2']; ?> </td>


                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/editmhtwa/' . $row['id']) ?>"><i class="material-icons">تعديل</i></a>
                                </td>

                                <td>
                                    <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/delmhtwa/' . $row['id']); ?>" ><i class="material-icons">حذف</i></a>
                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                        </ul>
                    </div>
<?php endif; ?>   
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>

                   
                    </div>
                           <div class="tab-pane" id="tab_3-4">

                 
                
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  المحتويات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <td style="width: 10px">الترتيب</th>
                            <th>الاسم</th>
                            <th>انجلزي</th>
                            <th>السعر</th>
                            <th>المكان</th>
                            <th>اساسي</th>   
                            <th></th>
                            <th></th>


                        </thead>

                        <?php $count = 0;
                        foreach ($all_groups4 as $row):
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>
                                <td><?= $row['text6']; ?> </td>
                                <td><?= $row['noa']; ?> </td>

                                <td><?= $row['noa2']; ?> </td>


                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/editmhtwa/' . $row['id']) ?>"><i class="material-icons">تعديل</i></a>
                                </td>

                                <td>
                                    <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/delmhtwa/' . $row['id']); ?>" ><i class="material-icons">حذف</i></a>
                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                        </ul>
                    </div>
<?php endif; ?>   
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>

                   
                    </div>
                           <div class="tab-pane" id="tab_3-5">

                 
                
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  المحتويات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <td style="width: 10px">الترتيب</th>
                            <th>الاسم</th>
                            <th>انجلزي</th>
                            <th>السعر</th>
                            <th>المكان</th>
                            <th>اساسي</th>   
                            <th></th>
                            <th></th>


                        </thead>

                        <?php $count = 0;
                        foreach ($all_groups5 as $row):
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>
                                <td><?= $row['text6']; ?> </td>
                                <td><?= $row['noa']; ?> </td>

                                <td><?= $row['noa2']; ?> </td>


                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/editmhtwa/' . $row['id']) ?>"><i class="material-icons">تعديل</i></a>
                                </td>

                                <td>
                                    <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/delmhtwa/' . $row['id']); ?>" ><i class="material-icons">حذف</i></a>
                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                        </ul>
                    </div>
<?php endif; ?>   
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>
                   
                    </div>
                    
                    
                         <div class="tab-pane" id="tab_3-6">

                 
                
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  المحتويات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <td style="width: 10px">الترتيب</th>
                            <th>الاسم</th>
                            <th>انجلزي</th>
                            <th>السعر</th>
                            <th>المكان</th>
                            <th>اساسي</th>   
                            <th></th>
                            <th></th>


                        </thead>

                        <?php $count = 0;
                        foreach ($all_groups6 as $row):
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>
                                <td><?= $row['text6']; ?> </td>
                                <td><?= $row['noa']; ?> </td>

                                <td><?= $row['noa2']; ?> </td>


                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/editmhtwa/' . $row['id']) ?>"><i class="material-icons">تعديل</i></a>
                                </td>

                                <td>
                                    <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/delmhtwa/' . $row['id']); ?>" ><i class="material-icons">حذف</i></a>
                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                        </ul>
                    </div>
<?php endif; ?>   
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>
                   
                    </div>
                    
                    
                    
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>


<!-- /.row -->

