<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('ltef/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('ltef/bills2/')?>">العهدة</a></li>
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
              
              
           <?php echo form_open_multipart(base_url('ltef/'.$thispage.'/add/')); ?>
              <div class="box-body">
            
                <div class="form-group">
                  <label > المبلغ </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" المبلغ " name="text1" required autofocus >
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
                  
                  
              
                  
                  <div class="box-footer">
                 <input type="checkbox"     value="ملاحظة"  name="addbill">اضافة في الفواتير&nbsp; &nbsp;&nbsp; &nbsp;
            </div>
                        <div class="form-group">
                      <label>القسم</label>
                 <input type="radio"     value="1"  name="text30">السالمية &nbsp; &nbsp;&nbsp; &nbsp;
        	<input type="radio"     value="2"  name="text30">حولي &nbsp; &nbsp;&nbsp; &nbsp;
        	  
        	      	      	<input type="radio"     value="7"  name="text30">الرقعي &nbsp; &nbsp;&nbsp; &nbsp;
                                    	<input type="radio"     value="8"  name="text30">الشعب &nbsp; &nbsp;&nbsp; &nbsp;
                                    		<input type="radio"     value="9"  name="text30">ريحانة &nbsp; &nbsp;&nbsp; &nbsp;
                                                               	<input type="radio"     value="11"  name="text30">الفنطاس &nbsp; &nbsp;&nbsp; &nbsp;
                                                	<input type="radio"     value="10"  name="text30">عمارتنا &nbsp; &nbsp;&nbsp; &nbsp;
            	 <input type="radio"     value="12"  name="text30">الرقعي الجديدة &nbsp; &nbsp;&nbsp; &nbsp;
            
                                                        <input type="radio"     value="4"  name="text30">لطيف &nbsp; &nbsp;&nbsp; &nbsp;
                	<input type="radio"     value="3"  name="text30">بشير &nbsp; &nbsp;&nbsp; &nbsp;
                    	<input type="radio"     value="5" checked name="text30">اخرى &nbsp; &nbsp;&nbsp; &nbsp;
		
                
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
