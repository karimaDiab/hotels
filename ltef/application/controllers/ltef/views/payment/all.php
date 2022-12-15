


<div class="row">
  
    <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
              <div class="row">
          
               
                  
                      <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_count?></h5>
                 <span class="description-text"> عمليات الدفع اون لاين</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                     
              <!-- /.col -->
             
                  
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
             <?=$all_bill1?>
          <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/1/1" class="btn btn-block btn-success"  style="margin-bottom:5px"><span class="description-text"> مقبولة لم تستلم </span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
              
                     <div class="col-sm-1 border-right">
                  <div class="description-block">
             <?=$all_bill4?>
          <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/1/4" class="btn btn-block btn-success"  style="margin-bottom:5px"><span class="description-text"> مقبلوة استلمت </span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                       <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <?=$all_bill2?>
                      <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/1/2" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> المرفوضة</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                     <div class="col-sm-1 border-right">
                  <div class="description-block">
      <?=$all_bill3?>
                         <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/1/3" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> تحت الانتظار</span></a>    </div>
                  <!-- /.description-block -->
                </div>
              
           
          
              <!-- /.col -->
              </div>
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
              <h3 class="box-title">الوصلات  </h3>
            </div>
            <!-- /.box-header -->
         <div class="box-body" style="overflow-x: auto;
                     white-space: nowrap;
                     direction: rtl;">
              <table class="table table-bordered">
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
                   <?php echo form_open_multipart(); ?>
                     <?php $count=0;   $count2=0; $day=0; foreach($all_groups as $row):
                        
                         
                         if($day!=date("d",$row['date1'])  )
                         {
                            
                        
                             
                         
                                 if($day!=0)
                                {
                                    
                               
                                    echo '          <tr>
                         <td >'.$day.'</td>  <td>'.($count2-($count*0.100)).'</td> <td colspan="9">'.$count.' </td>';
                                }
                              $day=date("d",$row['date1']);
                                $count2=0;
                                $count=0; 
                         }
                         
                              $count2=$row['amount']+0.100+$count2;
                         
                         ?>
                     <tr>
                <td ><?= $row['id']; ?></td>
                <td><?= $row['amount']; ?> </td>

            
          <td><?= $row['STATUS']; ?> </td>
          <td><?=date("m-d-Y H:i ",$row['date1']); ?> </td>
                    <td style="direction: ltr;text-align: left"><?= $row['TRACKING_ID']; ?> </td>
                    <td>
                    <?php if ($row['PAYMENT_STATUS'] == 'successful') echo '  <span class="label label-success">ناجحة</span>'; ?> 
     
                    <?php if ($row['STATUS']=='ok'  and $row['PAYMENT_STATUS'] != 'successful') echo '  <span class="label label-danger">خطأ</span>'; ?>    
                        
                        
                        <?php if ($row['STATUS']=='wait'  ) echo '  <span class="label-warning">انتظار</span>'; ?> 
          
          
           </td>
              <td><?= $row['REFERENCE_ID']; ?> </td>
              <td ><?= $row['TRANSACTION_ID']; ?> </td>
            


     <td><?= date("m-d-Y H:i ",$row['date2']); ?> </td>
                <td>
          <?php
          if($row['STATUS']=='ok'  and $row['PAYMENT_STATUS'] == 'successful')
          {
              if(date("d",$row['date1']) !=date("d") )
              {
                  
           
              ?>
                    
                    <input type="checkbox" name="id<?=$row['id']?>" value="aln3esa_numbber" checked=""><?php
    }
          }
          ?>

                </td>




            </tr>
              
                    <?php $count++;  endforeach; ?>
             </table>
             
             <div class="box-footer" style="text-align: left">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">استلمت</button>
            </div>
          </div>
            </form>
            <!-- /.box-body -->
                       <?php if($pages>2): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$pages;$count++):?>
                <li><a href="<?= base_url('ltef/'.$this->thispage.'/all/'.$count."/$counter"); ?>"><?=$count?></a></li>
          
          <?php endfor; ?>
              </ul>
            </div>
                <?php endif; ?>   
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>
      <!-- /.row -->
  
