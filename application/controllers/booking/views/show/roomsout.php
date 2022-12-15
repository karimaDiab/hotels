       
       
<button onclick="myFunction()"  >طباعة</button>

<script>
function myFunction() {
  window.print();
}
</script>



      
  <div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الشقق المتاخرة   </h3>
              <?=$all_count?> شقق
            </div>
            <!-- /.box-header -->
                  <?php echo form_open_multipart(base_url('booking/' . $thispage . '/roomsout/')); ?>
            <div class="box-body" style="">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الشقة</th>
                  <th>الاسم</th>
                  
                  
                  <th>الدخول</th>  
                  <th style="width: 40px">الايام</th>
                  <th>اخر ملاحظة</th>
               <th>كتابة ملاحظة جديدة</th>
           
                
                   <th style="width: 40px">التاخير</th>
                              
               <th style="width: 40px"></th>
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):
                         $msgwait=explode("<aln3esa>", $row['msgwait']);
                     $msgwait2='';
                        if(isset($msgwait[count($msgwait)-2])){
                            
                            
                            
                            $msgwait2 =$msgwait[count($msgwait)-2];
                            $msgss=explode("||", $msgwait2);
                            $msgwait2=$msgss[0];
                        }
                         ?>
                <tr>
                  <td><?= $row['room']; ?></td>
                  <td><?= $row['name'].'<br />'.$row['mobile']; ?> </td>
                    
               
                      <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                         <td><?= $row['day']; ?> </td>         <td><?= $msgwait2 ?> </td>
         
                           <td>     <input type="text" name="msgwait<?= $row['id']; ?>" placeholder=" ادخل لم يرد..تمديد .... اذا رجع يدفع   ..." class="form-control"  style="width: 200px;height: 50px"></td>
           
    
                  

                   <td><?= $this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeend']); ?></td> 
             
                            <td>
                                <a class="update btn btn-sm btn-success pull-right" href="<?=base_url('booking/show/id/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
                            
                </td>
             
                   
                  
           
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
               
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">اضافة ملاحظات جماعية</button>
            </div>
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>

      <!-- /.row -->
  
