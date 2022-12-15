




      
  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  حجوزات بوكنق   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الشقة</th>
                  <th>الاسم</th>
                  <th>الدخول</th>
                  <th style="width: 40px">الايام</th>
                  <th style="width: 40px">المبلغ</th>
                  
                       <th>رقم الحجز</th>
               
                              
              <th style="width: 40px"></th>     
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['room']; ?></td>
                  <td><?= $row['name']; ?> </td>
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                
            
             
                      <td><?= $row['day']; ?> </td>
         <td>    <?= $row['bill']; ?>  </td>

                 <td>   <?=$row['bookingnew']?>   </td>
             
                      
             
                   
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
                <li><a href="<?= base_url('booking/'.$this->thispage.'/bookingcom/'.$count); ?>"><?=$count?></a></li>
          
          <?php endfor; ?>
              </ul>
            </div>
                <?php endif; ?>  
          <!-- /.box -->
        </div>
     </div>
      </div>

      <!-- /.row -->
  
