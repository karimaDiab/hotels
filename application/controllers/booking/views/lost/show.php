






<div class="row">

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/index/1/1" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> تم التسليم  </a> 	</div>



    </div>



    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/index/1/2" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> الارشيف  </a> 	</div>



    </div>







</div>

<div class="row">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">المفقودات  </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>

                                <th>الاسم</th>
                                <th>الهاتف</th>
                                <th>المفقودات </th>
                                <th> التاريخ</th>
                                <th>منذ</th>
                                <th style="width: 40px">الوقت</th>
                                <th style="width: 40px"></th>
                                         <th style="width: 40px">اليوزر</th>
                            </tr>

                            <?php $count = 0;
                            foreach ($all_groups as $row):
                                ?>
                                <tr>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['mobile']; ?></td>
                                    <td><?= $row['msg']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['dateadd']); ?></td>
                                    <td><?= $this->booking->getNiceDuration($row['dateadd'] - time()); ?></td>




   <?php if ($row['counter'] == '0'): ?>

                                    <td>     <a title="Edit" class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/update/' . $row['id'].'/1') ?>"><i class="material-icons">تم التسليم</i></a>
                                    </td>


                                    <td>
                                        <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/update/' . $row['id'].'/2'); ?>" ><i class="material-icons">لارشيف</i></a>
                                    </td>
                                                 <td><?= $row['user']; ?></td>
  <?php endif; ?>
                                       <?php if ($row['counter'] != '0'): ?>
                                              <td>  <?= $this->booking->tissme_show($row['datefinsh']); ?>
                                    </td>


                                    <td>
                                        
                                        
                                        
                                           <?php if ($row['counter'] == '1')echo " تم التسليم"; ?>
                                         <?php if ($row['counter'] == '2')echo " الارشيف "; ?>
                                    </td>
                                       <td><?= $row['user']; ?></td>
                                    
                                      <?php endif; ?>
                                </tr>

<?php endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
<?php if ($all_count > 2): ?>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                    <li><a href="<?= base_url('booking/' . $this->thispage . '/index/' . $count . '/' . $counter); ?>"><?= $count ?></a></li>

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

