



<div class="row">

    <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="box-footer">
                <div class="row">





                    <?php if ($this->session->userdata('group')): ?>
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill1 ?></h5>
                                <span class="description-text"> الايراد</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill2 ?></h5>

                                <span class="description-text"> المصروفات</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill5-$all_cash ?></h5>

                                <span class="description-text"> التصدير</span>

                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_cash ?></h5>

                                <span class="description-text">تصدير الكاش</span>

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
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">الاحصائيات  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="overflow-x: auto;
                     white-space: nowrap;
                     direction: rtl;">
                    <table class="table table-bordered">
                        <tr>
                            <th >اليوم</th>
                            <th>الايراد</th>     
                            <th>المصروفات</th>
                            <th>السلفات</th>
                            <th>التصدير</th>
                            <th>الكاش</th>
                        </tr>

                        <?php $count = 0;
                        foreach ($all_groups as $row): ?>
                            <tr>
                                <td><?= $row['dateadd']; ?></td>
                                <td><?= $row['all_bill1']; ?></td>
                                <td><?= $row['all_bill2']; ?> </td>
                                <td><?= $row['all_bill4']; ?> </td>  
                                <td><?= $row['all_bill5']; ?> </td>

                                <td><?= $row['all5_last']; ?> </td>













                            </tr>

<?php endforeach; ?>
                        <tr>
                            <th >المجموع</th>
                            <th><?= $all_bill1 ?></th>     
                            <th><?= $all_bill2 ?></th>
                            <th><?= $all_bill3 ?></th>
                            <th><?= $all_bill5 ?></th>    
                            <th><?= $all_cash ?></th>
                        </tr>
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

