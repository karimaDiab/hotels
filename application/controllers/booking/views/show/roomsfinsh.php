





<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> حركات الخروج   </h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">الشقة</th>
                            <th>الاسم</th>


                            <th>الخروج</th> 
                            <th>وقت التنظيف</th>
                            <th style="width: 40px">مدة التنظيف</th>



                            <th style="width: 40px">اليوزر</th>

                            <th style="width: 40px"></th>
                        </tr>

                        <?php $count = 0;
                        foreach ($all_groups as $row): ?>
                            <tr>
                                <td><?= $row['room']; ?></td>
                                <td><?= $row['name']; ?> <br><?= $row['bookingid']; ?> </td>


                                <td><?= $this->booking->tissme_show($row['timeend']); ?> </td>
                                <td><?php if ($row['timecleanfinsh']) echo$this->booking->tissme_show($row['timecleanfinsh']); ?> </td>



                                <td><?php if ($row['timecleanfinsh']) echo $this->booking->getNiceDuration($row['timecleanfinsh'] - $row['timeend'], '2'); ?></td> 


                                <td><?= $row['user2']; ?> </td>     

                                <td>
                                    <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>

                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->

<?php if ($pages > 1): ?>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $pages; $count++): ?>
                            <li><a href="<?= base_url('booking/' . $this->thispage . '/roomsfinsh/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                    </ul>
                </div>
<?php endif; ?>   
            <!-- /.box -->
        </div>
    </div>
</div>

<!-- /.row -->

