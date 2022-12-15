



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
                 <span class="description-text"> المتوفر</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                  <?php if($this->session->userdata('group')):?>
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1?></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/1" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الايراد</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill2?></h5>
                  
                               <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/2" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> المصروفات</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
               
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill5?></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/5" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> التصدير</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                       <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill3?></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/3" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> السلف</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
            
            <?php endif;?>
                <!-- /.col -->
              </div>
             </div>
          <!-- /.widget-user -->
        </div>
   
     </div>
                      <div class="row">
          
               
                  
                  
                  
                  <?php if($this->session->userdata('group')):?>
                      <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/1" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> السالمية</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                      <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                  
                               <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/2" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> حولي</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
               
                      <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/7" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الرقعي</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                          
                                        <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/8" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الشعب</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                                  <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/9" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> ريحانة</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                
                                     <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/11" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الفنطاس</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                               <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/10" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> عمارتنا</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                             <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/12" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الرقعي الجديده</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                
                            <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/5" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  اخرى </span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                          
                                   <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/4" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  لطيف </span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                          
                                   <div class="col-sm-1 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/3" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text">  بشير </span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
            
            <?php endif;?>
                <!-- /.col -->
              </div>
         
                
                 <div class="row">
              <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
               
                  
                    
                  
                  <?php if($this->session->userdata('group') and $text30!=''):?>
                         <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_billn?></h5>
                 <span class="description-text"> المتوفر</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                                       <?php if($text30!='3' and $text30!='4' ):?>
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1n?></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/1/<?=$text30?>" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الايراد</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill2n?></h5>
                  
                               <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/2/<?=$text30?>" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> المصروفات</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
               
                
                
                
                     <?php endif;?>  
              </div>
                        <?php if($text30=='5'):?>
                 <div class="row">
                    <?php
                        $count = 0;
                        foreach ($cat as $row):
                            ?>    
                             <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"> <?= $row['all'] ?> </h5>
                  
                                <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/5/<?= $row['id'] ?>" class="btn btn-block btn-success"  style="margin-bottom:5px">   <span class="description-text">  <?= $row['name'] ?> </span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
               
                            <?php
                        endforeach;
                        ?>
                     </div>      <?php endif;?>  
                
                
                
            <?php endif;?>
                <!-- /.col -->
            
              <!-- /.row -->
                </div>
          <!-- /.widget-user -->
        </div>
   
     </div>
            </div>
      
        <!-- /.col -->
   



        <div class="row">
                 
        <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/ltef/bills2/" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  العهدة</a> 	</div>
</div>


<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة فاتورة</a> 	</div>



        </div>
            
          
                   <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/stat/<?=$this->thismon?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   الاحصائيات </a> 	</div>



       
</div>
              <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/ltef/<?= $this->thispage ?>/updatebalc/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   تحديث الرصيد </a> 	</div>
</div>
            </div>
   
  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الفواتير  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: auto;
    white-space: nowrap;
    direction: rtl;">
              <table class="table table-bordered">
                <tr>
                <th  style="width: 50px">الرصيد</th>     
                 <th  style="width: 50px">المبلغ</th>
                     <th>الوصف</th>
                  <th>النوع</th>
                    <th>القسم</th>
               <th>التاريخ</th>
                       <th style="width: 40px"></th>
             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
          
                    <td><?= $row['text5']; ?> </td>
                  <td><?= $row['text1']; ?> </td>
                  <td><?= $row['text2']; ?> </td>
                
                  
                 
             
                   
                    <td><?= $row['gruop']; ?> </td> 
                    
                    <td><?= $row['gruop2']; ?> </td>
                    
                        <td><?= $row['dateadd']; ?> </td>  
                      
             
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/show/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
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
  
