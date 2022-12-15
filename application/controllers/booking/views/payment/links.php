




<!-- /.box-header -->


    <div class="row">
        <div class="col-md-2 col-sm-12 col-12">
            <h4>الروبط الغير مدفوعة </h4>
        </div>  
        <div class=" col-md-2 col-sm-3 col-1">
            <a href="<?= base_url() ?>booking/payment/add/" class="btn btn-block btn-primary"  style="margin:5px; width: 150px;float: left"> اضافة</a> 
        </div>
                 <div class=" col-md-2 col-sm-3 col-1">
            <a href="<?= base_url() ?>booking/payment/index/1/4" class="btn btn-block btn-success"  style="margin:5px; width: 150px;float: left"> المدفوعة</a> 
        </div>
           <div class=" col-md-2 col-sm-3 col-1">
            <a href="<?= base_url() ?>booking/payment/index/1/2" class="btn btn-block btn-danger"  style="margin:5px; width: 150px;float: left"> الخطأ</a> 
        </div>
             <div class=" col-md-2 col-sm-3 col-1">
            <a href="<?= base_url() ?>booking/payment/all/" class="btn btn-block btn-warning"  style="margin:5px; width: 150px;float: left"> العمليات</a> 
        </div>
        <div class=" col-md-2 col-sm-6 col-6">

            <?php echo form_open_multipart(); ?>
            <div class="input-group mb-4">
                <input type="text" class="form-control" placeholder="ادخل كلمة البحث" aria-label="Recipient's username" name='search'>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" value="pl" name="submit" >بحث</button>
                </div>
            </div>
            </form>
        </div>

    </div>







<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">  العقود   </h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <table class="table table-bordered">    <thead> 
            <tr>
                <th style="width: 10px">الترتيب</th>
                <th >الاسم</th>
                <th >التليفون</th>
                <th >المبلغ</th>
                <th >  الوصف</th>     

                <th > تاريخ الاضافة</th>      
                <th >حالة الدفع</th>


                <th >  </th>
            </tr>
        </thead>
        <?php
        $count = 0;
        foreach ($all_groups as $row):
            ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?> </td>
                <td><?= $row['mobile']; ?> </td>
                <td><?= $row['amount']; ?> </td>
                <td><?= $row['comment']; ?> </td>


                <td><?= date("m-d-Y H:i ", $row['date1']); ?> </td>

                <td>
                    <?php if ($row['show1'] == '4') echo '  <span class="badge badge-success">تم الدفع</span>'; ?> 

                    <?php if ($row['show1'] == '2') echo '  <span class="badge badge-danger">محاولة خطأ</span>'; ?> 


                </td>
                <td>
                    <?php
                    if ($row['show1'] == '0' or $row['show1'] == '2') {
                        ?>
                    
                        <a href="<?= base_url() ?>booking/payment/send/<?= $row['id'] ?>/"  class="btn btn-block btn-primary" style="margin-bottom:5px"  >      ارسال رسالة   </a> 
        <?php
    }
    ?>

                </td>




            </tr>

<?php endforeach; ?>

    </table>
</div>
<!-- /.box-body -->
          <?php if ($pages > 1): ?>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $pages; $count++): ?>
                            <li><a href="<?= base_url('booking/' . $this->thispage . '/all3gd/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                    </ul>
                </div>
<?php endif; ?>  

 </div> </div> </div> </div>
<!-- /.box -->
<!-- /.box -->

<!-- /.row -->









