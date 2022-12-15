<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/bills/')?>">الفواتير</a></li>
      </ol>
    </section>
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">تعديل فاتورة</h3>
            </div>
         
                 <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
              
           <?php echo form_open_multipart(base_url('booking/'.$thispage.'/editmhtwa/'.$edit['id'])); ?>
      <div class="box-body">
            
                <div class="form-group">
                  <label > الاسم عربي </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" المبلغ " name="text1" required autofocus value="<?=$edit['text1']?>">
                </div>
                <div class="form-group">
                  <label > الاسم انجليزي </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" المبلغ " name="text2" required autofocus value="<?=$edit['text2']?>">
                </div>
                <div class="form-group">
                  <label > السعر </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" المبلغ " name="text6" required autofocus value="<?=$edit['text6']?>">
                </div>
                  <div class="form-group">
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="text8"  value="1"  <?=$edit['checked'][1]?>>
                <label>       اساسي
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text8"  value="3" <?=$edit['checked'][3]?>>
                <label>    غير اساسي
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="text8"  value="2" <?=$edit['checked'][2]?>>
                 <label>    صيانة
                    </label>
                  </div>
                     
                
                </div>   
          
                  
           <div class="form-group">
                      <label>المكان</label>
                  <div class="radio">
                
                      <input type="radio" name="text5"  value="1" <?=$edit['checked2'][1]?>>
                <label>       الصالة
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text5"  value="2" <?=$edit['checked2'][2]?>>
                <label>    الماستر
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="text5"  value="3" <?=$edit['checked2'][3]?>>
                 <label>    الثانية
                    </label>
                  </div>
                           <div class="radio">
                 
                      <input type="radio" name="text5"  value="7" <?=$edit['checked2'][7]?>>
                 <label>     الثالثة
                    </label>
                  </div>
                         <div class="radio">
                
                      <input type="radio" name="text5"  value="4" <?=$edit['checked2'][4]?>>
              <label>     المطبخ
                    </label>
                  </div>
                   <div class="radio">
                
                      <input type="radio" name="text5"  value="5" <?=$edit['checked2'][5]?>>
              <label>     الحمام
                    </label>
                  </div> 
                      
                        <div class="radio">
                
                      <input type="radio" name="text5"  value="6" <?=$edit['checked2'][6]?>>
              <label>     حمام المساتر
                    </label>
                  </div> 
                      
                </div>   
                  
        
          
                
           
                  
  
              </div>  
              
             
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
