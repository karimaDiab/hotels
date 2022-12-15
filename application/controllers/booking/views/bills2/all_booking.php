

<div class="row">

    <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <table class="box-footer">
                <div class="row">

                    <td class="col-sm-3 border-right   border-bottom">
                        <div class="description-block">
                            <h5 class="description-header"><?= $all_count ?></h5>
                            <span class="description-text">الحركات</span>
                        </div>
                        <!-- /.description-block -->
                    </td>

                    <td class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?= $all_bill ?></h5>
                            <span class="description-text">المبلغ الكلي</span>
                        </div>
                        <!-- /.description-block -->
                    </td>
                    <td class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header"> <?= $all_cach ?></h5>
                            <span class="description-text">الكاش</span>
                        </div>
                        <!-- /.description-block -->
                    </td>
                    <!-- /.col -->

                    <!-- /.col -->
                    <td class="col-sm-3">
                        <div class="description-block border-right">
                            <h5 class="description-header"><?= $all_knet ?></h5>
                            <span class="description-text">الكي نت</span>
                        </div>
                        <!-- /.description-block -->
                    </td>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </div>
        </table>
        <!-- /.widget-user -->
    </div>


    <!-- /.col -->
</div>



حركات اقل من 35

<table class="table table-bordered" style="direction: rtl;width: 100%">
    <tr>
        <th style="width: 10px">الشقة</th>
        <th>الاسم</th>
        <th >الاثبات</th>
        <th>الدخول</th> 

        <th style="width: 40px">الايام</th>
        <th style="width: 40px">المبلغ</th>
        <th>اليوزر</th>


        <th style="width: 40px"></th>
    </tr>

    <?php $count = 0;
    foreach ($all_groups as $row):



        if ($row['bill'] < 35):
            ?>
            <tr>
                <td><?= $row['room']; ?></td>
                <td><?= $row['name']; ?> </td>
                <td><?= $row['cidimage']; ?></td>
                <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>


                <td><?= $row['day']; ?> </td>

                <td> <?= $row['bill']; ?>  </td>
                <td>  <?= $row['user'] ?>    </td>
                <td>  <?= $row['comment8'] ?>    </td>

                <td>


                </td>




            </tr>
    <?php endif; ?>
<?php endforeach; ?>

</table>
غير موجود الاثبات
<table class="table table-bordered" style="direction: rtl;width: 100%">
    <tr>
        <th style="width: 10px">الشقة</th>
        <th>الاسم</th>
        <th >الاثبات</th>
        <th>الدخول</th> 

        <th style="width: 40px">الايام</th>
        <th style="width: 40px">المبلغ</th>
        <th>اليوزر</th>


        <th style="width: 40px"></th>
    </tr>

    <?php $count = 0;
    foreach ($all_groups as $row):



        if ($row['cidimage'] == 'no'):
            ?>
            <tr>
                <td><?= $row['room']; ?></td>
                <td><?= $row['name']; ?> </td>
                <td><?= $row['cidimage']; ?></td>
                <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>


                <td><?= $row['day']; ?> </td>

                <td>    <?= $row['bill']; ?>  </td>
                <td>  <?= $row['user'] ?>    </td>
                <td>  <?= $row['comment8'] ?>    </td>

                <td>


                </td>




            </tr>
    <?php endif; ?>
<?php endforeach; ?>

</table>
غرامات التاخيرات
<table class="table table-bordered" style="direction: rtl;width: 100%">
    <tr>
        <th style="width: 10px">الشقة</th>
        <th>الاسم</th>
        <th >الاثبات</th>
        <th>الدخول</th> 

        <th style="width: 40px">الايام</th>
        <th style="width: 40px">المبلغ</th>
        <th>اليوزر</th>


        <th style="width: 40px"></th>
    </tr>

    <?php $count = 0;
    foreach ($all_groups as $row):



        if ($row['bill'] < 35):
            ?>
            <tr>
                <td><?= $row['room']; ?></td>
                <td><?= $row['name']; ?> </td>
                <td><?= $row['cidimage']; ?></td>
                <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>


                <td><?= $row['day']; ?> </td>

                <td>    <?= $row['bill']; ?>  </td>
                <td>  <?= $row['user'] ?>    </td>
                <td>  <?= $row['comment8'] ?>    </td>

                <td>


                </td>




            </tr>
    <?php endif; ?>
<?php endforeach; ?>

</table>


<!-- /.row -->

