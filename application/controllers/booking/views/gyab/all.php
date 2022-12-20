
  <div class="row">
	  
    <!-- Main content -->
	  <div class="row">
	     <div class="col-md-12">
          <div class="box">
			  <?php echo form_open_multipart(base_url('booking/dashboard/gyab/')); ?>
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="info-box" style=" padding: 20px">
                            <select dir=rtl name='modif' style="width: 200px"  >
                                <option value='' >اختر الموظف</option> 
									<?php
									$count = 0;
									$count2 = 0;
									foreach ($modif as $row):
										?>

                                    <option value="<?= $row['name'] ?>-<?= $row['text6'] ?>-<?= $row['text7'] ?>"><?= $row['name'] ?></option> 
                                <?php endforeach; ?>
                            </select>      <br> <br> 
							  <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" ملاحظة " name="comment" value="">

									<br> 
							   <input  name="file1" type="file" accept="image/*" capture required>
									<br> 

                            <button type="submit" class="btn btn-primary" name="submit" value="pl">حضور</button>

									
                            <button type="submit" class="btn btn-primary" name="submit2" value="pl">انصراف</button>


                            <br>    <br> 

                        </div>

                    </div>
                </div>
                </form>
			 </div>
			 </div>
	  </div>
	
	  
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
  
