




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
                 <span class="description-text"> الوصلات</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                     
              <!-- /.col -->
             
                  
                      <div class="col-sm-1 border-right">
                  <div class="description-block">
             
          <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/1" class="btn btn-block btn-success"  style="margin-bottom:5px"><span class="description-text"> السالمية</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                       <div class="col-sm-1 border-right">
                  <div class="description-block">
              
                      <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/2" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> حولي</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                     <div class="col-sm-1 border-right">
                  <div class="description-block">

                         <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/7" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الرقعي</span></a>    </div>
                  <!-- /.description-block -->
                </div>
              
                     <div class="col-sm-1 border-right">
                  <div class="description-block">
                   
                         <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/8" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الشعب</span></a>    </div>
                  <!-- /.description-block -->
                </div>
                
                
                   
                     <div class="col-sm-1 border-right">
                  <div class="description-block">
                   
                         <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/9" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> ريحانه</span></a>    </div>
                  <!-- /.description-block -->
                </div>
                 <div class="col-sm-1 border-right">
                  <div class="description-block">
                   
                         <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/11" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  الفطاس</span></a>    </div>
                  <!-- /.description-block -->
                </div>
                     <div class="col-sm-1 border-right">
                  <div class="description-block">
                   
                         <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/10" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> عمارتنا حولي</span></a>    </div>
                  <!-- /.description-block -->
                </div>
              
                      <div class="col-sm-1 border-right">
                  <div class="description-block">
                   
                         <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/12" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  الرقعي الجديدة </span></a>    </div>
                  <!-- /.description-block -->
                </div>
                     <div class="col-sm-1 border-right">
                  <div class="description-block">
                 
                           <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/6" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الشركة</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                     <div class="col-sm-1 border-right">
                  <div class="description-block">
               
                           <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/5" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> اخرى</span></a>        
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

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة وصل ايجار</a> 	</div>



        </div>
            
          
            
           
            
                
            
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
                <tr>
               <th>القسم</th>  
                  <th>العنوان</th>   
                      <th>المبلغ</th>  
                         <th> التاريخ</th>
                 <th> طريقة الدفع</th>
               
          
                  
                    
                               <th> البنك </th>
                <th></th>  <th></th>
            
          
             </tr>
                
                     <?php $count=0;   $count2=0;  foreach($all_groups as $row):?>
                <tr>
                  <td><?php if($row['counter'])echo$noa[$row['counter']]?> </td>
                  
                    <td><?= $row['name']; ?>  </td>
                               <td><?= $row['text1']; ?> </td>   
                    <td><?= $row['dateadd']; ?>  </td>
                    
  
                                    <td><?= $row['text2']; ?> </td>
            
                        
                       <td><?= $row['text3']; ?> </td>
           
             
                   
                  
                         <td>        <a title="Delete" class="delete btn btn-sm btn-success pull-right " href="<?= base_url($row['text4']) ?>"  target="_block"><i class="material-icons">عرض</i></a>   </td>  
                                     <td>       
                                <a title="Delete" class="delete btn btn-sm btn-success pull-right " href="<?= base_url($row['text5']) ?>"  target="_block"><i class="material-icons">عرض</i></a>              
       </td>  
                     
                                        <td>              <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('ltef/'.$this->thispage.'/del/'.$row['id']); ?>" ><i class="material-icons">حذف</i></a>
                   
                     </td>
                    
           
                </tr>
              
                    <?php endforeach; ?>
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
  
