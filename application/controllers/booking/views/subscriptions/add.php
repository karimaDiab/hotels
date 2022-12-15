<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/clints/')?>">الباقات</a></li>
      </ol>
    </section>
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اضافة باقة</h3>
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
                  <label for="exampleInputEmail1">الاسم  </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ادخل الاسم " name="name" required autofocus>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"> التليفون	</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" placeholder="التليفون " name="mobile" >
                </div>
                      <div class="form-group">
                  <label for="exampleInputPassword1"> الرقم المدني	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="الرقم المدني " name="cid" >
                </div>
                  
             
                 <div class="form-group">
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="text1"  value="1"  checked="">
                <label>       الذهبية عدد الايام  (30)  السعر (500)
                    </label>
                  </div>
              
                      
                         <div class="radio">
                 
                      <input type="radio" name="text1"  value="2">
                 <label>    الفضية عدد الايام  (15)  السعر (350)
                    </label>
                  </div>
                     
                    <div class="radio">
                  
                      <input type="radio" name="text1"  value="3">
                <label>   البرونزية عدد الايام  (10)  السعر (200)
                    </label>
                  </div>
                </div>   
                    <div class="form-group">
                  <label>وصف</label>
                  <textarea class="form-control" rows="3" placeholder="وصف ..." name="text2"></textarea>
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
