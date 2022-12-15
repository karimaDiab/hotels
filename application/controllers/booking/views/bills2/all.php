



<div class="row">

    <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="box-footer">
                <div class="row">



                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?= $all_bill ?></h5>
                            <span class="description-text"> المتوفر</span>
                        </div>
                        <!-- /.description-block -->
                    </div>

                    <?php if ($this->session->userdata('group')): ?>
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill1 ?></h5>
                                <a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/all/<?= $this->thismon ?>/1" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الايراد</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill2 ?></h5>

                                <a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/all/<?= $this->thismon ?>/2" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> المصروفات</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill5 ?></h5>

                                <a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/all/<?= $this->thismon ?>/5" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> التصدير</span></a> 
                            </div>
                            <!-- /.description-block -->
                        </div>

                    <?php endif; ?>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>


    <!-- /.col -->
</div>



<div class="row">

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة فاتورة</a> 	</div>



    </div>

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/updatebalc/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   تحديث الرصيد </a> 	</div>
</div>
  
</div>
<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">العهدة  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <table class="table table-bordered" style="max-width:100%">
                        <tr>
                            <th style="width: 10px">الرقم</th>
                            <th>الرصيد</th>     
                            <th>المبلغ</th>
                            <th>الوصف</th>
                            <th>النوع</th>
                            <th>التاريخ</th>
                            <th style="width: 40px"></th>
                        </tr>

                        <?php $count = 0;
                        foreach ($all_groups as $row): ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text5']; ?> </td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>





                                <td><?= $row['gruop']; ?> </td>
                                <td><?= $row['dateadd']; ?> </td>  



                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/show/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                </td>



                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($pages > 2): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $pages; $count++): ?>
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
<!-- /.row -->

