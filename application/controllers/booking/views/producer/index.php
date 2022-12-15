






<div class="row">


    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة منتجات </a> 	</div>



    </div>
    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/stat/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الاحصائيات </a> 	</div>



    </div>











</div>

<div class="row">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">المنتجات  </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>

                                <th>المحتوى</th>
                                <th>العدد الكلي</th>
                                <th> المخزن</th>
                                  <th> الاستقبال</th>
                                <th>الشقق  </th>
                                <th>التوالف</th>
                                <th style="width: 40px"></th>
                
                            </tr>

                            <?php $count = 0;
                            foreach ($all_groups as $row): ?>
                                <tr>
                                    <td><?= $row['mhtwa']; ?></td>
                                    <td><?= $row['total']; ?></td>
                                    <td> <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/all/1/' . $row['id']) ?>/200"><?= $row['total1']; ?></a></td>
                                    <td> <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/all/1/' . $row['id']) ?>/100"><?= $row['total2']; ?></a></td>
                                    <td><?= $row['total3']; ?></td>
         <td> <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/all/1/' . $row['id']) ?>/1"><?= $row['total4']; ?></a></td>




                                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/all/1/' . $row['id']) ?>"><i class="material-icons">مشاهدة</i></a>
                                    </td>



                                </tr>

<?php endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
  
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
        </div>
</div>
<!-- /.row -->

