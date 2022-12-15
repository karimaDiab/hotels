<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('ltef/'.$thispage.'/')?>">الشيكات</a></li>
      </ol>
    </section>
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اضافة شيك</h3>
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
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" المبلغ " name="text1" required autofocus value="<?php if(isset($edit['text1']))echo $edit['text1'];?>">
                </div>
                  
                  <div class="form-group" >
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="catid"  value="1"  checked="" >
                <label>       مستحق
                    </label>
                  </div>
                  <div class="radio">
                  
                         <div class="radio">
                
                      <input type="radio" name="catid"  value="5">
              <label>     ماجلة          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
                    </label>
                  </div>
                
                </div>   
                  
        
           
                  
               
              <div class="form-group">
                  <label>الشيك باسم</label>
                               <input type="text" class="form-control"  placeholder="  الشيك باسم " name="text2" value="<?php if(isset($edit['text2']))echo $edit['text2']?>" required>

                </div>
                  
                     
              <div class="form-group">
                  <label> رقم الشيك</label>
                               <input type="text" class="form-control"  placeholder="  رقم الشيك " name="text3" value="<?=$idlast?>" required>

                </div>
                  
                    
                    <?php if(!isset($edit['text30']))$edit['text30']= 5;
                    
                    
                    ?>
                      <div class="form-group">
                      <label>النوع</label>
                 <input type="radio" required    value="1"  name="text30" <?php if($edit['text30']==1)echo "checked"?>>السالمية &nbsp; &nbsp;&nbsp; &nbsp;
        	<input type="radio"  required   value="2"  name="text30"  <?php if($edit['text30']==2)echo "checked"?>>حولي &nbsp; &nbsp;&nbsp; &nbsp;
        	  
        	      	      	<input type="radio"  required   value="7"  name="text30"  <?php if($edit['text30']==7)echo "checked"?>>الرقعي &nbsp; &nbsp;&nbsp; &nbsp;
                                    	<input type="radio"   required  value="8"  name="text30"  <?php if($edit['text30']==8)echo "checked"?>>الشعب &nbsp; &nbsp;&nbsp; &nbsp;
                                        	<input type="radio"   required  value="9"  name="text30"  <?php if($edit['text30']==9)echo "checked"?>>ريحانه &nbsp; &nbsp;&nbsp; &nbsp;
                                                               	<input type="radio"     value="11"  name="text30">الفنطاس &nbsp; &nbsp;&nbsp; &nbsp;
                                             
                                                                <input type="radio"   required  value="9"  name="text30"  <?php if($edit['text30']==10)echo "checked"?>>عمارتنا &nbsp; &nbsp;&nbsp; &nbsp;
                <input type="radio"   required  value="12"  name="text30"  <?php if($edit['text30']==12)echo "checked"?>>الرقعي الجديده &nbsp; &nbsp;&nbsp; &nbsp;
            
                                                                <input type="radio"     value="4"  name="text30" required  <?php if($edit['text30']==4)echo "checked"?>>لطيف &nbsp; &nbsp;&nbsp; &nbsp;
                	<input type="radio"  required   value="3"  name="text30"  <?php if($edit['text30']==3)echo "checked"?>>بشير &nbsp; &nbsp;&nbsp; &nbsp;
                    	<input type="radio"   required  value="5"  name="text30"  <?php if($edit['text30']==5)echo "checked"?>> اخرى &nbsp; &nbsp;&nbsp; &nbsp;
		
                
                </div>  
                  
        
                       <div class="form-group">
                  <label for="exampleInputPassword1">   اسم المستلم	 الشيك </label>
                  <input type="text" class="form-control"  placeholder="  المستلم " name="text11"
                  value="<?php if(isset($edit['text11']))echo $edit['text11']?>">
                </div>  
                  <div class="form-group">
                  <label for="exampleInputPassword1">     وذلك عن 	</label>
                  <input type="text" class="form-control"  placeholder="  الى " name="text12" value="<?php if(isset($edit['text1']))echo $edit['text12']?>">
                </div>
                  
                  
                 
                    <div class="form-group">
                  <label for="exampleInputPassword1">   الهاتف	</label>
                  <input type="number" class="form-control"  placeholder="  الهاتف " name="text13" value<?php if(isset($edit['text1']))echo $edit['text13']?>">
                </div>
               
                  <div class="form-group">
                  <label for="exampleInputPassword1">   تاريخ الاستحقاق 	</label>
               
                  <input type="text" class="form-control"  id="datepicker" placeholder="  المستلم " data-date-format="yyyymmdd"  name="dateadd" value="<?=$dateadd?>">
                  
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
