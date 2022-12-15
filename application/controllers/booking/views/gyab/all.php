




   
   
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
       
                  <th>الاسم</th>     
                            <th> البداية</th>
                          <th> النهاية</th>
                <th> عدد حضور الشهر</th>
                       <th style="width: 40px"></th>
             </tr>
                
                     <?php $count=0; foreach($modif as $row):?>
                <tr>
               
                    <td><?= $row['name']; ?> </td>
                
                           <td><?= $row['enterdev']; ?> </td>
                                  <td><?= $row['outdev']; ?> </td>
                                  
                                          <td><?= $row['mongyab']; ?> </td>
               
                
                  
                 
             
                   
                  
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/'.$this->thispage.'/show/'.$row['id'].'/'.$this->thismon)?>"><i class="material-icons">التفاصيل</i></a>
                    </td>
                    
                    
           
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                 
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>
      <!-- /.row -->
  
