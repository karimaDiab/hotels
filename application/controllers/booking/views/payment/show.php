

<link href="<?= base_url() ?>public/assets/css/elements/custom-pagination.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/forms/switches.css">
<style
    >


    .switch .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background-color: #ff0000bf;
    }
    .switch.s-success .slider:before {
        background-color: #000000;
    }
</style>



<div class="alert alert-success flash-msg alert-dismissible disabled output" style=" display: none" id="showw">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>


</div>




<!-- /.box-header -->

<div class="widget-header">

    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12 col-12">
            <h4>عمليات الدفع</h4>
        </div>  
        <div class="col-xl-3 col-md-3 col-sm-6 col-6">
            <a href="<?= base_url() ?>payment/admin/add/" class="btn btn-block btn-dark"  style="margin-bottom:5px; width: 150px;float: left"> اضافة</a> 
        </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
              
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
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
        <thead> 
           <tr>
                                <th style="width: 10px">الترتيب</th>
                                <th >المبلغ</th>
                                <th >حالة الدفع</th>
   <th > تاريخ الاضافة</th>
   <th >  TRACKING_ID</th>
 
                                <th >النتيجة</th>
                                     <th >رقم العملية</th>     <th >     TRANSACTION_ID
</th>
                           <th > تاريخ النتيجة</th>
                                    <th style=" width: 80px;">  </th>
                            </tr>
        </thead>
        <?php
        $count = 0;
        foreach ($all_groups as $row):
            ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['amount']; ?> </td>

            
          <td><?= $row['STATUS']; ?> </td>
          <td><?=date("m-d-Y H:i ",$row['date1']); ?> </td>
                    <td style="direction: ltr;text-align: left"><?= $row['TRACKING_ID']; ?> </td>
                    <td>
                    <?php if ($row['PAYMENT_STATUS'] == 'successful') echo '  <span class="badge badge-success">ناجحة</span>'; ?> 
     
                    <?php if ($row['PAYMENT_STATUS'] != 'successful') echo '  <span class="badge badge-danger">خطأ</span>'; ?> 
          
          
           </td>
              <td><?= $row['REFERENCE_ID']; ?> </td>
             <td><?= $row['TRANSACTION_ID']; ?> </td>
                


     <td><?= date("m-d-Y H:i ",$row['date2']); ?> </td>
                <td>
          <?php
          if($row['STATUS']=='wait')
          {
              
              ?>
                 
                    <?php
          }
          ?>

                </td>




            </tr>

        <?php endforeach; ?>

    </table>
</div>
<!-- /.box-body -->
<?= $pages ?>


<!-- /.box -->
<!-- /.box -->

<!-- /.row -->
<script src="<?= base_url() ?>public/assets/js/libs/jquery-3.1.1.min.js"></script>
<script>

    ///  $(".switchdemo").simpleSwitch();

    $(document).ready(function () {
        $('input[type=checkbox]').change(function () {
            var element = $(this);
            var del_id = element.attr("id");
            if (this.checked) {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url() ?>/admin/cats/showid/" + del_id,
                    success: function (data) {
                        $('#showw').html(data);
                        $("#showw").show();
                    }
                });//ajax
            } else
            {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url() ?>/admin/cats/hideid/" + del_id,
                    success: function (data) {
                        $('#showw').html(data);
                        $("#showw").show();
                    }
                });//ajax
            }




            //// $( "#content1" ).load( "ajax/test.html" );

        });




    });</script>








