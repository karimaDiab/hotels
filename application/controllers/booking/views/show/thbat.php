

<div class="row">
  
  <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
              <div class="row">
          
                <div class="col-sm-3 border-right   border-bottom">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_count?></h5>
                    <span class="description-text"> شقق</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                 
                
                <!-- /.col -->
                
                <!-- /.col -->
           
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
              <h3 class="box-title">الشقق الموجرة   </h3>
              <?=$all_count?> شقق
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="
   ">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الشقة</th>
                  <th>الاسم</th>
                    <th>السيارة</th>
                   <th >المدني</th>
                  <th></th> 
                  <th></th>
         
               
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                    <td><?= $row['room']; ?></td>
                  <td>  <?= $row['name']; ?> <br>
                 </td>
                  <td><b><?= $row['country']; ?></b> </td>
                  
                  <td><?= $row['cid']; ?></td>
       
           
                   
         <td>     <img class="img-responsive" src="<?= base_url($row['file1']) ?>" alt="Photo">  </td>
          <td>  <img class="img-responsive" src="<?= base_url($row['file2']) ?>" alt="Photo"></td> 
            
          
             
                            <td>
                                <a class="update btn btn-sm btn-success pull-right" href="<?=base_url('booking/show/id/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
                            
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
  
