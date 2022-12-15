<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('ltef/bills/')?>">الفواتير</a></li>
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
                 
                      <input type="radio" name="catid"  value="3">
                 <label>    سلفة
                    </label>
                  </div>
                         <div class="radio">
                
                      <input type="radio" name="catid"  value="5">
              <label>     تصدير          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="checkbox"  value="كاش"   name="cash">&nbsp;كاش  &nbsp; &nbsp;&nbsp; &nbsp;
        <input type="checkbox"  value="knet"   name="knet"> &nbsp; knet &nbsp; &nbsp;&nbsp; &nbsp;
        
                  <br> <input type="checkbox"  value="knet"   name="endbill"> تصدير  نهائي لمالية اليوم
           
                    </label>
                  </div>
                
                </div>   
                  
        
           
                  
               
              <div class="form-group">
                  <label>وصف</label>
                  <textarea class="form-control" rows="3" placeholder="وصف ..." name="text2"></textarea>
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
                  
        
                   <div class="box-body">
                <div class="form-group">
                    <label> اختر القسم من  اخرى	</label>

                    <select dir=rtl name='catid2'  class="form-control basic"  >
                        <option >  اختر </option>
                        <?php
                        $count = 0;
                        foreach ($cat as $row):
                            ?>    
                            <option value='<?= $row['id'] ?>'>  <?= $row['name'] ?> </option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">  او اضافة قسم  اخرى جديد  </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ادخل اسم الادارة الجديده " name="catname"  autofocus >
                </div>
                <hr>
                     
                  
                 
                 
                
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
