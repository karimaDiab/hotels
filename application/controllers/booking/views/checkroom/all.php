






        <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/checkroom/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة طلب صيانة</a> 	</div>



        </div>
            
            <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/checkroom/arshif/1/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الارشيف</a> 	</div>



        </div>


        
    
        
        

        
        
        
    
    </div>
   
  <div class="row">
    <!-- Main content -->
  
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">طلبات الصيانة </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
           
                  <th>الشقة</th>
                  <th>المكان</th>
                   <th> المطلوب</th>
                    <th>الملاحظة</th>
                       <th>السبب</th>
                       
                       <th> التاريخ</th>
                  <th style="width: 40px"></th>
                       <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['text1']; ?></td>
                  <td><?= $row['text2']; ?> </td>
                   <td><?= $row['text5']; ?> </td>
                      <td><?= $row['text3']; ?> </td>
                      
                         <td><?= $row['text4']; ?> </td>
                
                          <td><?= $this->booking->tissme_show($row['text7']); ?></td>
                
            
             
                   
         <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/'.$this->thispage.'/okid/'.$row['id'])?>"><i class="material-icons"> تم الانجاز</i></a>
                    </td>  
                    
                  
             
                            <td>
                              <?php if ($this->session->userdata('group')): ?>   <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/'.$this->thispage.'/del/'.$row['id']); ?>" ><i class="material-icons">حذف</i></a><?php endif; ?>
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
  
