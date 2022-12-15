<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/bills2/')?>">العهدة</a></li>
      </ol>
    </section>
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اضافة فاتورة</h3>
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
                  <label > المبلغ </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" المبلغ " name="text1" required autofocus value="">
                </div>
                  
                     <div class="form-group">
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="catid"  value="2"  checked="">
                <label>       مصروفات
                    </label>
                  </div>
                      
                      
                  <div class="radio">
                  
                      <input type="radio" name="catid"  value="1">
                <label>    ايراد
                    </label>
                  </div>
                      
                     
                         <div class="radio">
                
                      <input type="radio" name="catid"  value="5">
              <label>     تصدير          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
                  
                  
                  
              
                    </label>
                  </div>
              
                </div>   
                  
        
           
                  
               
              <div class="form-group">
                  <label>وصف</label>
                  <textarea class="form-control" rows="3" placeholder="وصف ..." name="text2"></textarea>
                </div>
                  
                  
                       <div class="form-group">
                  <label for="exampleInputPassword1">   اسم المستلم	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  المستلم " name="text11" value="">
                </div>  
                  <div class="form-group">
                  <label for="exampleInputPassword1">    حررت الى	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  الى " name="text12" value="">
                </div>
                  
                  
                 
                    <div class="form-group">
                  <label for="exampleInputPassword1">   الهاتف	</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" placeholder="  الهاتف " name="text13" value="">
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
