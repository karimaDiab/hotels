
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اضافة محتوى</h3>
            </div>
         
                 <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
              
           <?php echo form_open_multipart(base_url('booking/'.$thispage.'/addmhtwa/')); ?>
              <div class="box-body">
          
                  
                  
                  
                  <?php for ($count = 1; $count < 5; $count ++): ?>     
                <div class="form-group">
                  <label for="exampleInputEmail1">محتوى    <?=$count?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ادخل الاسم " name="text1-<?=$count?>" 
                         autofocus>
                  
                  <br>   <input type="text" class="form-control" id="exampleInputPassword1" placeholder="السعر " name="text6-<?=$count?>" >
               
                </div>
             
                       <?php endfor; ?>
                  <div class="form-group">
                  <label for="exampleInputPassword1">  السعر	</label>
               </div>
             
                     <div class="form-group">
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="text8"  value="1"  checked="">
                <label>       اساسي
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text8"  value="3">
                <label>    غير اساسي
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="text8"  value="2">
                 <label>    صيانة
                    </label>
                  </div>
                     
                
                </div>   
                  
           <div class="form-group">
                      <label>المكان</label>
                  <div class="radio">
                
                      <input type="radio" name="text5"  value="1"  checked="">
                <label>       الصالة
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text5"  value="2">
                <label>    الماستر
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="text5"  value="3">
                 <label>    الثانية
                    </label>
                  </div>
                      
                           <div class="radio">
                 
                      <input type="radio" name="text5"  value="7">
                 <label>     الثالثة
                    </label>
                  </div>
                         <div class="radio">
                
                      <input type="radio" name="text5"  value="4">
              <label>     المطبخ
                    </label>
                  </div>
                   <div class="radio">
                
                      <input type="radio" name="text5"  value="5">
              <label>     الحمام
                    </label>
                  </div>  
                      
                         <div class="radio">
                
                      <input type="radio" name="text5"  value="6">
              <label>     حمام الماستر
                    </label>
                  </div>   
                      
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
