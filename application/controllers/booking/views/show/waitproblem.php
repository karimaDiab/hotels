

<div class="row">
  
    <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
              <div class="row">
              <div class="col-sm-3 border-right   border-bottom">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill?></h5>
                    <span class="description-text"> الكل </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-3 border-right   border-bottom">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_count?></h5>
                    <span class="description-text"> المتاخرين</span>
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
              <h3 class="box-title"> غرامات التاخير   </h3>
        
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الشقة</th>
                  <th>الاسم</th>
                  
                  
                  <th>الدخول</th> 
                  <th>الخروج</th>
                  <th style="width: 40px">الايام</th>
                  <th style="width: 40px">المبلغ</th>
              
                   <th style="width: 40px">التاخير</th>
                       <th style="width: 40px">الغرامة</th>
                       <th style="width: 40px">اليوزر</th>
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['room']; ?></td>
                  <td><?= $row['name']; ?> </td>
                    
               
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                           <td><?= $this->booking->tissme_show($row['timeend']); ?> </td>
         
           
             <td><?= $row['day']; ?> </td>            
         <td>    <?= $row['bill']; ?>  </td>
   
                    <td><?= $this->booking->getNiceDuration($row['timeend2']-$row['timeendout']); ?></td> 
                    <td><?= $row['comment2']; ?><Br><?= $row['comment3']; ?><Br><?= $row['nowait']; ?> </td>
                              <td><?= $row['user2']; ?> </td>     
                    
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

             <?php if($pages>1): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$pages;$count++):?>
                <li><a href="<?= base_url('booking/'.$this->thispage.'/waitproblem/'.$count); ?>"><?=$count?></a></li>
          
          <?php endfor; ?>
              </ul>
            </div>
                <?php endif; ?>   
          <!-- /.box -->
        </div>
     </div>
      </div>

      <!-- /.row -->
  
