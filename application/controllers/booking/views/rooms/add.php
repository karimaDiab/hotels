
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اضافة شقة</h3>
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
                  <label for="exampleInputEmail1">اسم الشقة </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ادخل الاسم " name="name" required autofocus>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"> الدور	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="الدور " name="door" >
                </div>
             
                   <div class="form-group">
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="noa"  value="1"  checked="">
                <label>       واحد سرير مزدوج
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="noa"  value="2">
                <label>    اثنين  سرير  مزدوج
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="noa"  value="3">
                 <label>    واحد مزدوج واثنين فردي
                    </label>
                  </div>
                         <div class="radio">
                
                      <input type="radio" name="noa"  value="4">
              <label>     اربعة فردي
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
