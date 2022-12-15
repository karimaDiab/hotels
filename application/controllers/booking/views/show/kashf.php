
<link href="<?= base_url() ?>public/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
<div class="row">
  
   
   

              
<form action="" method="get">
       <div class="col-md-12">
               <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
              <div class="row">
                  <div class="form-group" style="display: none">
          
                    <div class="row">
                        <div class="radio col-md-4">
                            <input type="radio" name="noo3" id="optionsRadios123" value="in" checked onclick="javascript:no3(1)">
                            <label> الوصول                   </label>
                        </div>
                        <div class="radio col-md-4">
                            <input type="radio" name="noo3" id="optionsRadios223" value="out" onclick="javascript:no3(2)">
                            <label>
                       مغادرة
                            </label>
                        </div>
                      
                    </div>
                </div>
            <div class="form-group  col-md-12" id="date" >
                  <label for="exampleInputPassword1">   تاريخ الكشف 	</label>
                  <input id="dateTimeFlatpickr" name="datetext4" value="<?=date("Y-m-d")?>" class="form-control flatpickr flatpickr-input " type="text" placeholder="Select Date.."><br>
         
                </div>   
                             <button type="submit" class="btn btn-success btn-flat">عرض</button>
            
        
          </div>
        <!-- /.col -->
      </div>  </div>
        <!-- /.col -->
  
        
     </div>
        <!-- /.col -->  </form>
      </div>




                
           <?php echo form_open_multipart('booking/show/kashfprint'); ?>
  <div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">حركات الدخول   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <table class="table table-bordered">
              <tr>
                  <th style="width: 10px">الشقة</th>
                  <th>الاسم</th>
                    <th>الجنسية</th>
                        <th >رقم الاثبات</th>
                   <th > الاثبات</th>
                  <th>الدخول</th> 
                  <th>الخروج</th>
              
                     <th style="width: 40px">مدة الاقامة</th>
             
               
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
             <tr>
                    <td><?= $row['room']; ?></td>
                  <td>  <?= $row['name']; ?> <br>
                    <span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"> 
                 
      
     
                  </span></td>
                  <td><b><?= $row['country']; ?></b> </td>
                         <td><b><?= $row['cid']; ?></b> </td>
                  <td><?php if($row['cidimage']=='no')echo '<span class="label label-danger">No</span>'; else  echo '<span class="label label-success">Yes</span>';?>
                  
                  
                      <br>
                   <?php if ($row['bookingnew']!= ''): ?> <span class="label label-warning">عميل بوكنق</span>
           
      <?php endif; ?></td>
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                           <td><?= $this->booking->tissme_show($row['timeend2']); ?>
                          
                          </td>
                
            
       
                   
    
          <td><?= $this->booking->getNiceDuration($row['timeenter']-$row['timeend2']); ?></td> 
            
    
             
                            <td>
                                   <input type="hidden" id="id" name="idallold[]" value="<?= $row['id']; ?>"  >
                         <input type="checkbox" id="id" name="idall[]" value="<?= $row['id']; ?>"  <?php if($row['inok']) echo "checked";?>>
                            
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

  <div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">حركات الخروج   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <table class="table table-bordered">
              <tr>
                  <th style="width: 10px">الشقة</th>
                  <th>الاسم</th>
                    <th>الجنسية</th>
                        <th >رقم الاثبات</th>
                   <th > الاثبات</th>
                  <th>الدخول</th> 
                  <th>الخروج</th>
              
                     <th style="width: 40px">مدة الاقامة</th>
             
               
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groupout as $row):?>
             <tr>
                    <td><?= $row['room']; ?></td>
                  <td>  <?= $row['name']; ?> <br>
                    <span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"> 
                 
      
     
                  </span></td>
                  <td><b><?= $row['country']; ?></b> </td>
                         <td><b><?= $row['cid']; ?></b> </td>
                  <td><?php if($row['cidimage']=='no')echo '<span class="label label-danger">No</span>'; else  echo '<span class="label label-success">Yes</span>';?>
                  
                  
                      <br>
                   <?php if ($row['bookingnew']!= ''): ?> <span class="label label-warning">عميل بوكنق</span>
           
      <?php endif; ?></td>
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                           <td><?= $this->booking->tissme_show($row['timeend2']); ?>
                          
                          </td>
                
            
       
                   
    
          <td><?= $this->booking->getNiceDuration($row['timeenter']-$row['timeend2']); ?></td> 
            
    
             
                            <td>
                                
                                   <input type="hidden" id="id" name="idall2old[]" value="<?= $row['id']; ?>"  >
                         <input type="checkbox" id="id" name="idall2[]" value="<?= $row['id']; ?>" <?php if($row['outok'] or $row['inok']) echo "checked";?>>
                            
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

   <input  name="datetext4" type="hidden" value="<?=$datetext4?>">
                <input  name="noo3" type="hidden" value="<?=$noo3?>">      
                <button type="submit" class="btn btn-success btn-flat" name="print" style="float: 
                        left">طباعة</button>
             </form>
      <!-- /.row -->
  
   <script src="<?= base_url() ?>public/plugins/flatpickr/flatpickr.js"></script>
    <script src="<?= base_url() ?>public/plugins/noUiSlider/nouislider.min.js"></script>
     <script>
 var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
  
    dateFormat: "Y-m-d",
});
</script>