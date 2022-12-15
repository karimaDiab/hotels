



<div class="row">
  
    <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
              <div class="row">
          
               
                  
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill?></h5>
                 <span class="description-text"> المطلوب</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                  <?php if($this->session->userdata('group')):?>
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_billmon?></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/mon" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  مستحق  الشهر</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                          <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1?></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/1" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  المستحق</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill8?></h5>
                  
                               <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/8" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> تم  صرف</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
               
                      <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill5?></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/5" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الموجلة</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>     <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_all?></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الكل</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
            
            <?php endif;?>
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

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة شيك</a> 	</div>



        </div>
     
       
        </div>
  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الشيكات  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: auto;
    white-space: nowrap;
    direction: rtl;">
              <table class="table table-bordered">
                <tr>     <th>  </th>  
                       <th> رقم الشيك</th>       
                 <th  style="width: 50px">المبلغ</th>
                     <th>الشيك باسم</th>
                  <th>النوع</th>
               <th>التاريخ</th>
                   <th>المتبقي</th>
                       <th style="width: 40px"></th>
             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                    <td><?= $count+1; ?> </td>    
                   <td><?= $row['text3']; ?> </td>    
                  <td><?= $row['text1']; ?> </td>
                  <td><?= $row['text2']; ?> </td>
                
                  
                 
             
                   
                    <td><?= $row['gruop']; ?> </td>
                        <td><?=$row['dateadd']; ?> </td>     
                        
                        <td><?php 
                        
                        $dddd=strtotime( (substr($row['dateadd'],0,4)).'/'.substr($row['dateadd'],4,2).'/'.(substr($row['dateadd'],6,2)) );
                        
                        if($dddd>$this->booking->tissme_now())
                            echo '<span class="label label-success">'.$this->booking->getNiceDuration($dddd-$this->booking->tissme_now())."</span>";
                        else {
                          echo '<span class="label label-danger">'.$this->booking->getNiceDuration($this->booking->tissme_now()-$dddd)."</span>";
                        }
                        
                        
                      ?> </td>  
                      
             
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/show/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
                    </td>
                    
                    
           
                </tr>
              
                    <?php  $count++;  endforeach; ?>
                
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
  
