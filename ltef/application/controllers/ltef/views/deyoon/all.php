



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
                 <span class="description-text"> الديون</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                        <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill3?></h5>
                 <span class="description-text"> المدفوع</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                 
                   
                     <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=($all_bill1+$all_bill2-$all_bill3)?></h5>
                 <span class="description-text"> المتبقي</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              <!-- /.col -->
             
                  
                      <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1_1?></h5>
          <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/1" class="btn btn-block btn-success"  style="margin-bottom:5px"><span class="description-text"> الكويت</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                       <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1_2?></h5>
                      <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/2" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> السعودية</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                   
                     <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1_7?></h5>
                           <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/7" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> اخرى</span></a>        
                  </div>
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

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة عميل</a> 	</div>



        </div>
            
          
            
           
            
                
            
             </div> 
                  
   
  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الديون  </h3>
            </div>
            <!-- /.box-header -->
         <div class="box-body" style="overflow-x: auto;
                     white-space: nowrap;
                     direction: rtl;">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">القسم</th>
                  <th>الاسم</th>   
                      <th>الحالة</th>  
                         <th> التليفون</th>
                 <th>المبلغ الكلي</th>
               
          
                  
                    
                               <th> المدفوع </th>
                <th>المتاخير</th>  <th>المتبقي</th>
            
                       <th style="width: 40px"></th>
             </tr>
                
                     <?php $count=0;   $count2=0;  foreach($all_groups as $row):?>
                <tr>
                  <td><?php if($row['text21'])echo$noa[$row['text21']]?> </td>
                  
                    <td><?= $row['text1']; ?>  </td><td><?php if($row['text22']==1)echo '<span class="label label-danger">غير مفعل</span> '; else  echo '<span class="label label-success">مفعل</span>';?> </td>
                 
        <td><?= $row['text2']; ?> </td>
                     <td><?= $row['text4']; ?> </td>
                        
                    <td><?php echo $row['all']; 
                                  
                         if($row['text22']!=1)$count2 =$count2+$row['all'];
                         $finsh=((intval($row['text4']) +intval($row['text14']))-($row['all']));
                                  
                                  if($row['text22']!=1)$count =$count+$finsh;?> </td>
                
                  
                  <td><?php echo $row['allold'];?> <?php if($row['numold']>0)echo '<br><span class="label label-danger">قسط '.$row['numold'].'</span>';
                  ?></td>  
             
                   
                  
                         <td><?php if($row['text22']!=1)echo $finsh; ?> </td>  
                      
             
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/show/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
                    </td>
                    
                    
           
                </tr>
              
                    <?php endforeach; ?>
                <tr><td colspan="7"></td><td><?=$count?></td></tr>
              </table>
            </div>
            <!-- /.box-body -->
                       <?php if($pages>2): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$pages;$count++):?>
                <li><a href="<?= base_url('ltef/'.$this->thispage.'/all/'.$count); ?>"><?=$count?></a></li>
          
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
  
