






        <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$thispage?>/cats/1/2" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الارشيف </a> 	</div>    </div>
    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة فاتورة مع عميل جديد</a> 	</div>

    </div>

   <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/all/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>    فواتير الكل </a> 	</div>
    </div>
    </div>
    


        
    
        
        

        
        
        
    
  <div class="row">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الموردين  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
            
                  <th>المورد</th>
             
                  
                     <th> التليفون</th>
                        <th> التاريخ</th>
                           <th>المتوفر</th>
                     <th style="width: 40px"></th>
                         
                </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['name']; ?></td>
              <td><?= $row['text1']; ?></td>
              
              
           
                            <td><?= $row['dateadd']; ?></td>
                              
                 
                       <td><?= $row['totall']; ?></td>
                   
                 
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/'.$this->thispage.'/catshow/'.$row['id'])?>"><i class="material-icons">عرض</i></a>
                    </td>
                    
                    
             
           
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                       <?php if($all_count>2): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$all_count;$count++):?>
                <li><a href="<?= base_url('booking/'.$this->thispage.'/cats/'.$count.'/'.$counter); ?>"><?=$count?></a></li>
          
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
  
