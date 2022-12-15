

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
   
  
        <!-- /.col -->
      </div>
<?php if (($this->booking->data_day(13)!= $this->data_day and $all_old>0) or  $all_old>0): ?>
 <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$this->thispage?>/bill/<?=$this->data_day?>/export/" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  تصدير المالية</a> 	</div>



        </div>
 </div>

<?php endif;?>
      
  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">المالية   </h3>
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
                  
                       <th>knet</th>
               
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['room']; ?></td>
                  <td><?= $row['name']; ?> </td>
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                
            
             
                      <td><?= $row['day']; ?> </td>
         <td>    <?= $row['bill']; ?>  </td>
           <td>  <?=$row['knet']?>  ( <?=$row['billprint']?>  )  <br>
           
           <?=$row['knetcode']?> 
           <?php if($row['knet']>1 and $row['knetcode']=='' and $row['bookedok']=='') echo '<span class="label label-warning"> ادخل رقم التفويض</span>';
           
           ?>
           
           
           </td>
             
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
  
