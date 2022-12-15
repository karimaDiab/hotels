








        <div class="hidden-print row ">

            <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   الموظفين</a> 	</div>



        </div>
             </div> 
                  
     <?php echo form_open_multipart(); ?>
  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الموظفين  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="
    white-space: nowrap;
    direction: rtl;">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الفرع</th>
                  <th>الاسم</th>   
                      <th>الحالة</th>   
                 <th>الراتب</th>
                    <th>المكافاة</th>
                          <th>الشون</th>
          <th style="width: 40px"></th>
                       <th style="width: 40px"></th>
             </tr>
                
                     <?php $count=0;   $count2=0;  foreach($all_groups as $row):?>
                <tr>
                  <td><?php if($row['text21'])echo$noa[$row['text21']]?> </td>
                  
                    <td><?= $row['text1']; ?>   <br><?= $row['text2']; ?> </td><td><?php if($row['text22']==1)echo '<span class="label label-danger">لايعمل</span>'; else  echo '<span class="label label-success">يعمل</span>';?> </td>
                    <td><input value="<?= $row['text4']; ?>" name="text4<?= $row['id']; ?>"  class="form-control" style="  width: 80px;"></td>
                               <td><input value="<?= $row['text14']; ?>" name="text14<?= $row['id']; ?>"  class="form-control" style="  width: 80px;"></td>
         
           <td><input value="<?= $row['text16']; ?>" name="text16<?= $row['id']; ?>"  class="form-control" style="  width: 80px;"></td>
             
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/show/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
                    </td>
                               <td>  
  
                    <a href="<?= base_url('ltef/'.$this->thispage.'/addsalf/'.$row['id'])?>" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>     سلفة </a>
                
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
     <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تحديث</button>
              </div>
           
</div> </form>

   </form>
      <!-- /.row -->
  
