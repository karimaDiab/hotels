

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
                    <span class="description-text">الحركات</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill?></h5>
                    <span class="description-text">المبلغ الكلي</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                   <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"> <?=$all_cach?></h5>
                    <span class="description-text">الكاش</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
                <div class="col-sm-3">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?=$all_knet?></h5>
                    <span class="description-text">الكي نت</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
   
    <div class="col-md-4">
<form action="<?= base_url()?>/booking/<?=$this->thispage?>/all" method="get">
                <div class="input-group">
                  <input type="text" name="search" placeholder="البحث في الحركات  ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat">ابحث</button>
                      </span>
                </div>
              </form>
        
        
        
     </div>
        <!-- /.col -->
      </div>




      
  <div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الحركات   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الشقة</th>
                  <th>الاسم</th>
                   <th >الاثبات</th>
                  <th>الدخول</th> 
                  <th>الخروج</th>
                  <th style="width: 40px">الايام</th>
                  <th style="width: 40px">المبلغ</th>
                 <th>اليوزر</th>
               
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['room']; ?></td>
              <td><?= $row['name']; ?> <br><?= $row['bookingid']; ?> </td>
                  <td><?= $row['cidimage']; ?></td>
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                           <td><?= $this->booking->tissme_show($row['timeend']); ?> </td>
                
            
                <td><?= $row['day']; ?> </td>
                   
         <td>    <?= $row['bill']; ?>  </td>
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
  
