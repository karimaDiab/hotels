

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
                   <th >الاثبات</th>
                  <th>الدخول</th> 
                  <th>الخروج</th>
                  <th style="width: 40px">الايام</th>
                  <th style="width: 40px">المبلغ</th>
                     <th style="width: 40px">مدة الاقامة</th>
                 <th>اليوزر</th>
               
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                    <td><?= $row['room']; ?></td>
                  <td>  <?= $row['name']; ?> <br>
                    <span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"> 
                  <?php if ($row['outsite']== 'ok'): ?>-   غير متواجد
                   <?= $this->booking->tissme_show($row['timeoutsite']); ?>
      <?php endif; ?>
      
                    <?php if ($row['inok']== '1'): ?><span class="label label-warning">      موجود بالسستم
                    </span>
      <?php endif; ?>    
                  
                  
                  
        <?php
                                            if ($row['bookedok'] == 'wait'):?>
                         ينتظر توقيع العقد منذ : 
                      <?php  echo '  <span class="label label-danger">    '.$this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeenter'])."</span>"; endif; ?>
                  </span></td>
                  <td><b><?= $row['country']; ?></b><br> <?= $row['bookingid']; ?> </td>
                  
                  <td><?php if($row['cidimage']=='no')echo '<span class="label label-danger">No</span>'; else  echo '<span class="label label-success">Yes</span>';?>
                  
                  
                      <br>
                   <?php if ($row['bookingnew']!= ''): ?> <span class="label label-warning">عميل بوكنق</span>
           
      <?php endif; ?></td>
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                           <td><?= $this->booking->tissme_show($row['timeend']); ?>
                           <?php if($this->booking->tissme_now()>$row['timeend'])echo ' <br><span class="label label-danger"> متاخر  : '.$this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeend'])."</span>";?>
                          </td>
                
            
                <td><?= $row['day']; ?> </td>
                   
         <td>    <?= $row['bill']; ?>  </td>
          <td><?= $this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeenter']); ?></td> 
            
           <td>  <?=$row['user']?>    </td>
             
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
  
     
  <div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">لم يتم عمل لها خروج    </h3>
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
                   <th >الاثبات</th>
                  <th>الدخول</th> 
                  <th>الخروج</th>
                  <th style="width: 40px">الايام</th>
                  <th style="width: 40px">المبلغ</th>
                     <th style="width: 40px">مدة الاقامة</th>
                 <th>اليوزر</th>
               
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groupsout as $row):?>
                <tr>
                    <td><?= $row['room']; ?></td>
                  <td>  <?= $row['name']; ?> <br>
                    <span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"> 
                  <?php if ($row['outsite']== 'ok'): ?>-   غير متواجد
                   <?= $this->booking->tissme_show($row['timeoutsite']); ?>
      <?php endif; ?>
      
                    <?php if ($row['inok']== '1'): ?><span class="label label-warning">      موجود بالسستم
                    </span>
      <?php endif; ?>    
                  
                  
                  
        <?php
                                            if ($row['bookedok'] == 'wait'):?>
                         ينتظر توقيع العقد منذ : 
                      <?php  echo '  <span class="label label-danger">    '.$this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeenter'])."</span>"; endif; ?>
                  </span></td>
                  <td><b><?= $row['country']; ?></b><br> <?= $row['bookingid']; ?> </td>
                  
                  <td><?php if($row['cidimage']=='no')echo '<span class="label label-danger">No</span>'; else  echo '<span class="label label-success">Yes</span>';?>
                  
                  
                      <br>
                   <?php if ($row['bookingnew']!= ''): ?> <span class="label label-warning">عميل بوكنق</span>
           
      <?php endif; ?></td>
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                           <td><?= $this->booking->tissme_show($row['timeend']); ?>
                           <?php if($this->booking->tissme_now()>$row['timeend'])echo ' <br><span class="label label-danger"> متاخر  : '.$this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeend'])."</span>";?>
                          </td>
                
            
                <td><?= $row['day']; ?> </td>
                   
         <td>    <?= $row['bill']; ?>  </td>
          <td><?= $this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeenter']); ?></td> 
            
           <td>  <?=$row['user']?>    </td>
             
                            <td>
                            <a href="<?= base_url() ?>/booking/Dashboard/inout/<?= $row['id'] ?>/ok" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>     خروج سستم الداخليه</a>
                             
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