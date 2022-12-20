

  <div class="row">
     <?php if ($this->session->userdata('group') or $this->session->userdata('editor')):
                    echo form_open_multipart(base_url('booking/dashboard/gyab/'));
                    ?>
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

                                        <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option> 
                                    <?php endforeach; ?>
                                </select>      

                                <br><br>
								<input type="text" name="note" placeholder="اضافة ملاحظة  ..." class="form-control" style=" height: 100px"><br>
                                <input type="file" id="exampleInputFile" name="file1"> <br>
                                <button type="submit" class="btn btn-primary" name="addnote" value="pl">اضافة ملاحظه</button>

                            </div>

                        </div>
                    </div>
                    </form>
                    <?php endif; ?>
   </div>


<div class="row">
  
    <div class="col-md-8">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
              <div class="row">
          
               
                  
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                      <h5 class="description-header"><?= count($all_groups)?></h5>
                 <span class="description-text"> الموظفين</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                        <?php if ($this->session->userdata('group') or $this->session->userdata('editor')):?>
                  <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة موظف</a> 	</div>



        </div>
                      <?php endif; ?>
                  <!-- /.description-block -->
                </div>
                  
              <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
   
  
        <!-- /.col -->




      
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
           
                  <th>الاسم</th>     
             
                     <th>الرقم المدني</th>  
                     <th> التليفون</th>
                       <th> البداية</th>
                          <th> النهاية</th>
         
                       <th style="width: 40px">نقل الى</th>
             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['text1']; ?></td>
             
                
                    <td><?= $row['text2']; ?> </td> 
                      <td><input type="text" dir="rtl" name="text10<?= $row['id'] ?>" size="40" value="<?= $row['text10'] ?>"  style="width:150px;" /></td>
           
                      <td><input type="text" dir="rtl" name="text6<?= $row['id'] ?>" size="40" value="<?= $row['text6'] ?>"  style="width:150px;" /></td>
                      <td><input type="text" dir="rtl" name="text7<?= $row['id'] ?>" size="40" value="<?= $row['text7'] ?>"  style="width:150px;" /></td>    <td>
                           <select dir=rtl name='text21<?= $row['id'] ?>'  class="form-control"  >
                        <option value="<?= $row['text21'] ?>" >  </option>
                        <option value="1" >  السالمية </option>
                        <option value="2">  حولي </option>
                        <option value="3">  الرقعي </option>
                             <option value="4">  الشعب </option>
                           <option value="5">  ريحانه </option>
       <option value="7">  موقوف </option>

                    </select>  </td>
                         
                    
                   
                
                  
                 
             
                   
                  
                      
             
                   
                   
                    
                    
           
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

               <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
            </div>
          <!-- /.box -->
        </div>
     </div>
      </div>
      <!-- /.row -->
  
</form>