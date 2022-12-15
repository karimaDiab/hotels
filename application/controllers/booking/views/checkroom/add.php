
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اضافة طلب صيانة</h3>
            </div>
         
                 <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
              
           <?php echo form_open_multipart(base_url('booking/'.$thispage.'/add/')); ?>
              <div class="box-body">
          
                <div class="form-group">
                  <label for="exampleInputEmail1">اختر  الشقة </label>
                  <br>
                   <select  name='text1' class="form-control"  dir="rtl"   style="

                                     margin-top: 10px;" required> 
                                <option value=''>اختر الشقة</option> 
  <option > الربشن</option> 
 <option > الوبي</option> 
 <option > المواقف</option> 
  <option > المكتب</option> 
                                <?php
                                $count = 0;
                                foreach ($all_rooms as $row):
                                    ?> <option  > <?= $row['name'] ?></option>

                                    <?php
                                endforeach;
                                ?>

                            </select>
                </div>
                <div class="form-group">
                      <label>المكان</label>
                  <div class="radio">
                
                      <input type="radio" name="text2"  value="الصالة"  checked="">
                <label>       الصالة
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text2"  value="الماستر">
                <label>    الماستر
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="text2"  value="الصغيرة">
                 <label>    الصغيرة
                    </label>
                  </div>
                         <div class="radio">
                
                      <input type="radio" name="text2"  value="المطبخ">
              <label>     المطبخ
                    </label>
                  </div>
                   <div class="radio">
                
                      <input type="radio" name="text2"  value=" الحمام الرئيسي">
              <label>     الحمام الرئيسي
                    </label>
                  </div>   
                      <div class="radio">
                
                      <input type="radio" name="text2"  value=" الحمام الماستر">
              <label>     الحمام الماستر
                    </label>
                  </div>  
                      
                </div>   
            <div class="form-group ">
                        <label >   الملاحظة	</label>
                        <textarea class="form-control" rows="3" placeholder=" الملاحظة ان وجدت   ..." name="text3" required></textarea><br>
                    </div>
                        <div class="form-group">
                      <label>المطلوب</label>
                  <div class="radio">
                
                      <input type="radio" name="text5"  value="سباك"  checked="">
                <label>       سباك
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text5"  value="كهربائي">
                <label>    كهربائي
                    </label>
                  </div>
                          <div class="radio">
                  
                      <input type="radio" name="text5"  value="نجار">
                <label>    نجار
                    </label>
                  </div>
                          <div class="radio">
                  
                      <input type="radio" name="text5"  value="تكيف">
                <label>    تكيف
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="text5"  value="صباغ">
                 <label>    صباغ
                    </label>
                  </div>
                         <div class="radio">
                
                      <input type="radio" name="text5"  value="ستلايت">
              <label>     ستلايت
                    </label>
                  </div>
                   <div class="radio">
                
                      <input type="radio" name="text5"  value="ورق جدران">
              <label>   ورق جدران
                    </label>
                  </div>   
                       <div class="radio">
                  
                      <input type="radio" name="text5"  value="تنظيف">
                <label>    تنظيف
                    </label>
                  </div>
                      
                </div>   
                    <div class="form-group ">
                        <label >   السبب	</label>
                        <textarea class="form-control" rows="3" placeholder=" السبب ان وجدت   ..." name="text4"></textarea><br>
                    </div>
             
            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">اضافة</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
