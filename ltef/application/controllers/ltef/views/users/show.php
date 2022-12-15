






        <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/users/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة عضو</a> 	</div>



        </div>
            
              <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/users/msgs/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   المرسلة </a> 	</div>



        </div>
            <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/users/sendmsg/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  ارسال رسالة </a> 	</div>



        </div>
            
  <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/users/rep/all" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   التقارير </a> 	</div>



        </div>

        
    
        
        

        
        
        
    
    </div>
   
  <div class="row">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الاعضاء  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الترتيب</th>
                  <th>الاسم</th>
                  <th>المجموعة</th>
                 <th style="width: 40px"></th>
                       <th style="width: 40px"></th>
                            <th style="width: 40px"></th>
                </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['id']; ?></td>
                  <td><?= $row['name']; ?> </td>
                
                 
             
                   
                    <td><?= $row['gruop']; ?> </td>
             
                      
                <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('ltef/'.$this->thispage.'/rep/'.$row['id'])?>"><i class="material-icons"> التقارير</i></a>
                    </td>  
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/edit/'.$row['id'])?>"><i class="material-icons">تعديل</i></a>
                    </td>
                    
                    
                          <td>
                                <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/'.$this->thispage.'/del/'.$row['id']); ?>" ><i class="material-icons">حذف</i></a>
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
  
