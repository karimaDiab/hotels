






      
  <div class="row">
    <!-- Main content -->
      <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/users/rep/<?=$id?>/1/ok" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  دخول وخروج</a> 	</div>



        </div>


        
    
        
        

        
        
        
    
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">عرض  التقارير </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
               
                  <th>التقرير</th>
                  <th>اليوزر</th>
                        <th>الوقت</th>
                
                          </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['comment']; ?> </td>
                      <td><?= $row['user']; ?> </td>
                
                        <td><?= $this->booking->tissme_show($row['date']); ?></td>
                
            
             
                   
        
                   
                  
           
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                       <?php if($all_count>1): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$all_count;$count++):?>
                <li><a href="<?= base_url('booking/'.$this->thispage.'/rep/'.$id.'/'.$count.'/'.$noa); ?>"><?=$count?></a></li>
          
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
  
