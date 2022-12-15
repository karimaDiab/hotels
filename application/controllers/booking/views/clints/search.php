






        <div class="row">
     <div class="col-md-8">
<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة عميل</a> 	</div>



        </div>   </div>


        
    
        
            <div class="col-md-4">
<form action="<?= base_url()?>/booking/<?=$this->thispage?>/all" method="get">
                <div class="input-group">
                  <input type="text" name="search" placeholder="البحث في العملاء  ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat">ابحث</button>
                      </span>
                </div>
              </form>
        
        
        
     </div>
    </div>
  <section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/clints/')?>">العملاء</a></li>
      </ol>
    </section>
  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  العملاء </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
           
                  <th>الاسم</th>
                      <th>الجنسية</th>
                  <th>المدني</th>
                  <th >حولي</th>
                        <th >االسالمية</th>
                        <th>الرقعي</th>
                                 <th >الشعب</th>
                                           <th >ريحانه</th>
                                  <th >الفنطاس</th>
                                        <th >حولي ٢</th>
                                           <th style="display:none;" > الحالة / السبب</th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['name']; ?></td>
                        <td><?= $row['country']; ?></td>
                  <td><?= $row['cid']; ?> </td>
             
                      
                  <td> <?php  if($row['book1']>0){?> <?= $row['mobile1']; ?><br><?php  echo $row['comment'].'<br/>'; ?><?= $row['book1']; ?> </a>
                  
                        <?php }?></td>
                            
                          <td>  <?php if($row['book2']>0){?> <?= $row['mobile2']; ?><br><?php  echo $row['comment'].'<br/>'; ?></a> 
                          
                                <?php }?></td>
                            
                          <td>  <?php if($row['book3']>0){?> <?= $row['mobile3']; ?><br><?php  echo $row['comment'].'<br/>'; ?><?= $row['book3']; ?> </a>
                          
                                <?php }?></td>
                            
                          <td>  <?php if($row['book4']>0){?> <?= $row['mobile4']; ?><br><?php  echo $row['comment'].'<br/>'; ?><?= $row['book4']; ?> </a>
                          
                                <?php }?></td>
                
                      <td>  <?php if($row['book5']>0){?> <?= $row['mobile5']; ?><br><?php  echo $row['comment'].'<br/>'; ?><?= $row['book5']; ?> </a>
                      
                            <?php }?>
                      </td>
                
            
           
       
                     
                      <td>
                          
                            <?php if($row['book6']>0){?> 
                            
                            <?= $row['mobile6']; ?><br><?php  echo $row['comment'].'<br/>'; ?><?= $row['book6']; ?> </a></td>
                      <?php }?>
             
                      <td>
                          
                          
                         <?php if($row['book7']>0){?> 
                          
                          <?= $row['mobile7']; ?><br><?php  echo $row['comment'].'<br/>'; ?><?= $row['book7']; ?> </a></td>
                          
                 <?php }?>
             
             
              <td style="display:none;">
                        <?php
                        if($row['oky']=='ok' ) {echo  "بلاك لست <br/>"; echo $row['comment']; }
                        ?>  
                           </td>
                            
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                       <?php if($all_count>1): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$all_count;$count++):?>
                <li><a href="<?= base_url('booking/'.$this->thispage.'/all/'.$count); ?>"><?=$count?></a></li>
          
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
  
