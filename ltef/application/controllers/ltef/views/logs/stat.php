



<div class="row">
    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">  سجل الاتصالات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>

                            <th>التاريخ</th>

                            <th >ريحانه</th>
                            <th >الشعب</th>
                            <th>الرقعي</th>
       <th >حولي</th>
                            <th >االسالمية</th>
                     


                            <th style="width: 40px"></th>

                        </tr>

                        <?php $count = 0;
                        foreach ($all_groups as $row): ?>
                            <tr>
                                <td><?= $row['name']; ?></td>


                                <td>
                                     المجموع : <?= $row['d6']; ?><br>
                                    جديد: <?= $row['d60']; ?><br>
                                   عميل : <?= $row['d6']-$row['d60']; ?> 
                                </td>



 <td>
                                     المجموع : <?= $row['d5']; ?><br>
                                    جديد: <?= $row['d50']; ?><br>
                                   عميل : <?= $row['d5']-$row['d50']; ?> 
                                </td>
                                
                                 <td>
                                     المجموع : <?= $row['d4']; ?><br>
                                    جديد: <?= $row['d60']; ?><br>
                                   عميل : <?= $row['d4']-$row['d40']; ?> 
                                </td>
                                
                                
                                 <td>
                                     المجموع : <?= $row['d1']; ?><br>
                                    جديد: <?= $row['d10']; ?><br>
                                   عميل : <?= $row['d1']-$row['d10']; ?> 
                                </td>
                                
                                
                               
                                 <td>
                                     المجموع : <?= $row['d2']; ?><br>
                                    جديد: <?= $row['d20']; ?><br>
                                   عميل : <?= $row['d2']-$row['d20']; ?> 
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

<!-- /.col -->





